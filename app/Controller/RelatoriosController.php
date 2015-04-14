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
        $options = array('order' => array('Relatorio.Tipo', 'Relatorio.Id'));
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
		$this->set('relatorio', $this->Relatorio->find('first', $options));
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
             foreach ($dataset['RelatorioFiltro'] as $filtro){    
               $sql .= $this->appendFilters($filtro);
             }
             
             $sql .= ' ' . $dataset['order'];
             
             $queryResult = $this->Relatorio->query($sql);            
             
             $this->set($dataset['nome'], $queryResult);  
             
          }
       }
       $this->layout = '/pdf/default';
       $this->render('/Relatorios/pdfs/'.$relatorio['Relatorio']['arquivo']);
    }
       
   function appendFilters($filtro){
      $filtros = "";
      
      if (isset($this->request->data)) {             
            foreach ($this->request->data as $key => $value){                    
               $compositeKey = explode(",", $key);
               $compositeValue = explode(",", $value);
               
               $tipoFiltro = $compositeKey[0];
               
               $campo = $compositeKey[1];    
               
               if($campo == $filtro['campo']){
                  switch($tipoFiltro){
                     case 7:
                     {
                        $filtros .= " AND ".str_replace("_",".", $campo)." LIKE '%".$compositeValue[0]."%'";                                   
                        break;
                     }   
                     case 8:
                     {
                        $filtros .= " 
                        AND cast(".$campo." as DATE) BETWEEN STR_TO_DATE('".$compositeValue[0]."','%d/%m/%Y') ";           
                        $filtros .= " AND STR_TO_DATE('".$compositeValue[1]."','%d/%m/%Y') ";
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
    //debug($this->params['data']['model']); die;
    $modelo = $this->params['data']['model'];
    $dados = array();
    $this->layout = null;

    $Class = ClassRegistry::init($modelo);
    $dados = $Class->find('list', array('order' => array($Class->displayField)));
    
    $this->set(compact('dados'));
}

}
