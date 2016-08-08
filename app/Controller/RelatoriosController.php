<?php

App::uses('AppController', 'Controller');

/**
 * Servicos Controller
 *
 * @property Servico $Servico
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatoriosController extends AppController {

    public $uses = array('Relatorio', 'RelatorioDataset', 'RelatorioFiltro', 'Cabecalhos');

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    
    public function index() {
        $options = array(
            'order' => array('Relatorio.Tipo', 'Relatorio.Nome'),
            'conditions' => array('NOT' => array('Relatorio.programa_id' => $this->PegarProgramasNaoPermitidosDoUsuarioLogado())));
        $this->Relatorio->unbindModel(array('hasMany' => array('RelatorioDataset')));
        $relatorios = $this->Relatorio->find('all', $options);
        $this->set(compact('relatorios'));
    }

/**
 * configurar method
 *
 * @return void
 */
	public function configurar() {
        $this->Filter->addFilters(
                array('filter1' => array('OR' => array(                           
                        'Relatorio.id' => array('operator' => 'LIKE'),
                        'Relatorio.nome' => array('operator' => 'LIKE'),
                        'Relatorio.tipo' => array('operator' => 'LIKE'),
                        'Relatorio.arquivo' => array('operator' => 'LIKE')
                        )
                    )
                )
        );
        $this->Filter->setPaginate('conditions', $this->Filter->getConditions());
        $this->Relatorio->recursive = 0;
		$this->set('relatorios', $this->paginate());
	}

    public function filter($id = null) {
        $this->Relatorio->id = $id;
        if (!$this->Relatorio->exists($id)) {
            throw new NotFoundException(__('The record could not be found.'));
        }
        $options = array('recursive'=>'2', 'conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
        $relatorio = $this->Relatorio->find('first', $options);
        $programa = $relatorio['Relatorio']['programa_id'];
        $programas = $this->PegarProgramasNaoPermitidosDoUsuarioLogado();
        $localizou = array_search($programa, $programas);
        if ($localizou) {
            $this->Session->setFlash(__('__PERMISSAO'), 'flash/error');
             $this->redirect($this->referer());
            //throw new NotFoundException(__('__PERMISSAO'));
        }
        $this->set('relatorio', $relatorio);
        $this->set('relatorioFiltrosDisponiveis', 
            $this->RelatorioFiltro->find('all', array('conditions' => array('Relatorio_id' => $id), 'group'=>array('RelatorioFiltro.campo')))
        );
    }
   
    public function download($id = null){
       if ($this->request->is('post') || $this->request->is('put')) {
          $this->Relatorio->id = $id;
		    if (!$this->Relatorio->exists($id)) {
			   throw new NotFoundException(__('The record could not be found.'));
		    }
   
          $options = array('recursive' => '2','conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
          $relatorio = $this->Relatorio->find('first', $options);   
          $this->set(compact('relatorio'));
	
          foreach ($relatorio['RelatorioDataset'] as $dataset){                          
             $sql = $dataset['sql'];
             //debug($dataset); //die;
             foreach ($dataset['RelatorioFiltro'] as $filtro){    
               $sql .= $this->appendFilters($filtro);
             }

             $sql .= ' ' . $dataset['order'];
             $queryResult = $this->Relatorio->query($sql); 
             
             if ($this->VerificarParametroDebugarSqlRelatoriosAtivo()) {
                debug($queryResult);
                debug($sql); 
                die;
             }

             $this->set($dataset['nome'], $queryResult);  
             
          }
          $this->layout = '/pdf/default';
          $this->render('/Relatorios/pdfs/'.$relatorio['Relatorio']['arquivo']);
       } else {
           $this->redirect($this->referer());
       }
    }

  private function VerificarParametroDebugarSqlRelatoriosAtivo() {
      $parametro = ClassRegistry::init('Parametro');
      $nao_usar_cache = false;
      return $parametro->valor(9, $nao_usar_cache) == 'S';
  }

   function appendFilters($filtro){
      $filtros = "";
      
      if (isset($this->request->data)) {             
            foreach ($this->request->data as $key => $value){                    
               $originalValue = $value;
               $compositeKey = explode(",", $key);
               $compositeValue = explode(",", $value);
               
               $tipoFiltro = $compositeKey[0];
               $campo = $compositeKey[1];
                
               if (($campo == $filtro['campo']) || ($campo == '_')) {
                  switch($tipoFiltro){
                     case 1: //FAIXAS_NUMERACAO
                     {
                        $filtros .= " AND " . str_replace("_",".", $campo) ." BETWEEN ".$compositeValue[0]." AND ".$compositeValue[1];
                        break;
                     }
                     case 2: //FAIXAS_STRING
                     {
                        AQUI
                        $filtros .= " AND " . str_replace("_",".", $campo) ." BETWEEN '".$compositeValue[0]."'' AND '".$compositeValue[1]."'";
                        break;
                     }
                     case 3: //OPCOES_FINITAS
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." in (".$originalValue.")";
                        break;
                     }
                     case 4: //FAIXA_CODIGO_CAMPO_ADICIONAL
                     {
                        $filtros .= " AND " . str_replace("_",".", $campo) ." = '".$compositeValue[0]."'' AND '".$compositeValue[1]."'";
                        break;
                     }
                     case 5: //CODIGO_CAMPO_ADICIONAL
                     {
                        $filtros .= " AND ".$compositeValue[0];
                        break;
                     }
                     case 6: //CAMPO_UNICO_INTEIRO
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." = ".$compositeValue[0];
                        break;
                     }
                     case 7: //OPCOES_FINITAS
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." LIKE '%".$compositeValue[0]."%'";
                        break;
                     }
                     case 8: //FAIXA_DATAS
                     {
                        $filtros .= "AND cast(".str_replace("_",".", $campo)." as DATE) BETWEEN STR_TO_DATE('".$compositeValue[0]."','%d/%m/%Y') ";
                        $filtros .= " AND STR_TO_DATE('".$compositeValue[1]."','%d/%m/%Y') ";
                        break;
                     }
                    case 9: //DATA
                     {
                        $filtros .= "AND cast(".str_replace("_",".", $campo)." as DATE) = STR_TO_DATE('".$compositeValue[0]."','%d/%m/%Y') ";
                        break;
                     }
                    case 10: //BOOLEAN
                     {
                        if ($campo == '_') {
                            $branco = $compositeValue[0];
                            $this->set(compact('branco'));
                        }
                        else
                            $filtros .= " AND ".str_replace("_",".", $campo)." = '".$compositeValue[0]."'";
                        break;
                     }
                     case 11: //FAIXA_VALORES
                     {
                        $filtros .= " AND " . str_replace("_",".", $campo) ." BETWEEN ".$compositeValue[0]." AND ".$compositeValue[1];
                        break;
                     }
                     case 12: //VALOR_QTD
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." = ".$compositeValue[0];
                        break;
                     }
                     case 13; //VALOR_PERCENTUAL
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." = ".$compositeValue[0];
                        break;
                     }
                  }  
               }
            }
          }
      return $filtros;
   }
   
    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Relatorio->create();
            if ($this->Relatorio->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'configurar'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        }
        $programas = $this->Relatorio->Programa->findAsCombo();
        $this->set(compact('programas'));
    }  
    
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Relatorio->id = $id;
        if (!$this->Relatorio->exists($id)) {
            throw new NotFoundException(__('The record could not be found.?>'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Relatorio->save($this->request->data)) {
                $this->Session->setFlash(__('The record has been saved'), 'flash/success');
                $this->redirect(array('action' => 'configurar'));
            } else {
                $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
            }
        } else {
            $options = array('conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
            $this->request->data = $this->Relatorio->find('first', $options);
        }
        $programas = $this->Relatorio->Programa->findAsCombo();
        $this->set(compact('programas'));
    }
    
/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Relatorio->id = $id;
		if (!$this->Relatorio->exists()) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		if ($this->Relatorio->delete()) {
			$this->Session->setFlash(__('Record deleted'), 'flash/success');
			$this->redirect(array('action' => 'configurar'));
		}
		$this->Session->setFlash(__('The record was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'configurar'));
	}
        

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Relatorio->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('recursive' => 2, 'conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
		$this->set('relatorio', $this->Relatorio->find('first', $options));
	}


/**
 * dados method
 *
 * @throws NotFoundException
 * @return void
 */
    function dados() {
        //$Class = ClassRegistry::init('Sigla');
        //$dados = $Class->find('list', array('recursive' => -1, 'order' => array($Class->displayField)));
        //debug($dados); die;

        //debug($this->params['data']['model']); die;
        $modelo = $this->params['data']['model'];
        $dados = array();
        $this->layout = null;

        $Class = ClassRegistry::init($modelo);
        $options = [];
        if ($modelo == 'Enumerado')
            $options = array('Enumerado.referencia' => 'situacao_id', 'Enumerado.nome' => 'aluno');
        $dados = $Class->find('list', array('recursive' => -1, 'conditions' => $options, 
            'order' => array($Class->displayField)));

        $this->set(compact('dados'));
    }

/**
 * dados method
 *
 * @throws PegarProgramasNaoPermitidosDoUsuarioLogado
 * @return array
 */
    private function PegarProgramasNaoPermitidosDoUsuarioLogado() {
        $dados = $this->Session->read('Auth');
        if (isset($dados['User']))
            $user_id = $dados['User']['id'];
            
        $options = array(
            'conditions' => array('Permissao.User_id' => $user_id, 'Permissao.Index' => false),
            'fields' => array('Permissao.Programa_id'));
        $permissoes = ClassRegistry::init('Permissao');
        return $permissoes->find('list', $options);
    }

}
