<?php
/**
 * Document   : app/Controller/PortalController.php
 * Created on : 2015-06-29 12:30 AM
 *
 * @author Pedro Escobar
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class PortalController extends AppController {

   public function index() {
      $dados = $this->Session->read('Auth');
      $id = $dados['Aluno']['id'];
      
      $Aluno = ClassRegistry::init('Aluno');
      $options = array('recursive' => 0, 'conditions' => array('Aluno.id' => $id));
      $alunos = $Aluno->find('all', $options);
      $alunos = $alunos[0];
      //debug($alunos); die;

      $AvisoCurso = ClassRegistry::init('AvisoCurso');
      $options = array('fields' => array('AvisoCurso.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoCurso.curso_id' => $alunos['Aluno']['curso_id']));
      $avisoscurso = $AvisoCurso->find('list', $options);
      sort($avisoscurso);
      if (empty($avisoscurso)) $avisoscurso[] = 0;
      //debug($avisoscurso); die;

      $AvisoGrupo = ClassRegistry::init('AvisoGrupo');
      $options = array('fields' => array('AvisoGrupo.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoGrupo.grupo_id' => $alunos['Curso']['grupo_id']));
      $avisosgrupo = $AvisoGrupo->find('list', $options);
      sort($avisosgrupo);
      if (empty($avisosgrupo)) $avisosgrupo[] = 0;
      //debug($avisosgrupo); die;

      $registros = array_merge($avisoscurso, $avisosgrupo);
      //debug($registros); die;

      /*$Aviso = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.id >= ' => min($registros), 'Aviso.id <= ' => max($registros), 'AND' => array('Aviso.id' => $registros), 'Aviso.tipo_id' => 21), 'order' => array('Aviso.Data DESC'));
      $avisos = $Aviso->find('all', $options);*/
      //debug($avisos); die;

      $Material = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.id >= ' => min($registros), 'Aviso.id <= ' => max($registros), 'AND' => array('Aviso.id' => $registros), 'Aviso.tipo_id' => 22), 'order' => array('Aviso.Data DESC'));
      $materiais = $Material->find('all', $options);

      $Vaga = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.tipo_id' => 24), 'order' => array('Aviso.Data DESC'));
      $vagas = $Vaga->find('all', $options);

      $Convenio = ClassRegistry::init('Pessoa');
      $options = array('recursive' => -1, 'conditions' => array('Pessoa.desconto >= ' => 0), 'order' => array('Pessoa.fantasia'));
      $convenios = $Convenio->find('all', $options);

      $Nota = ClassRegistry::init('AlunoDisciplina');
      $options = array('conditions' => array('AlunoDisciplina.aluno_id' => $id));
      $notas = $Nota->find('all', $options);

      $Grupo = ClassRegistry::init('Grupo');
      $grupos = $Grupo->findAsCombo();

      $this->set(compact('alunos', /*'avisos',*/ 'avisoscurso', 'grupos', 'materiais', 'notas', 'vagas', 'convenios'));
   }

   public function login(){
      $this->layout = 'login';
        // Verifica o tipo de requisição, se for POST(form submit) tenta logar.
      if($this->request->is('post')) {           
         //debug($this->Auth->authenticate);
         //debug($this->Auth->redirect());
         //die();
          if ($this->Auth->login()) {
              return $this->redirect($this->Auth->redirect());
          } else {
              $this->Session->setFlash(__('Invalid username or password, try again'), 'flash/error');
          }
      }
   }

   public function logout() {
        $this->redirect($this->Auth->logout());
   }

   public function protocolo() {
        $this->SendEmail($this->request->data);
   }

  private function SendEmail($dados) {

      $emails = array('secretaria@facet.br', 'wilianselzlein@gmail.com');

      $Email = new CakeEmail('smtp');
      $Email->emailFormat('html');
      $Email->to($emails);
      $Email->subject('Protocolo');

      $Email->send(
        'Protocolo do Portal:<br>' . 
        'Data: ' . Date('Y/m/d H:i') . '<br>' .
        'Aluno: ' . $dados['portal']['nome'] . '<br>' .
        'Matricula: ' . $dados['portal']['matricula'] . '<br>' .
        'Email: ' . $dados['portal']['email'] . '<br>' .
        'Telefone: ' . $dados['portal']['telefone'] . '<br>' .
        'Curso: ' . $dados['portal']['curso'] . '<br>' .
        'Turma: ' . $dados['portal']['turma'] . '<br>' .
        '<br>'.
        'Requerimento: ' . $dados['portal']['requerimento'] . '<br>' .
        'Justificativa: ' . $dados['portal']['justificativa'] . '<br>' .
        '<br>'.
        'Email automático, apenas leitura, favor não responder no mesmo.<br>');
    }
    
    public function avisos() {
      $grupo = $this->request->data;
//debug($grupo);
//echo $grupo['Post']['grupo'];

      $cursos = explode(',', $grupo['Post']['cursos']);
//debug($cursos); die;
      $AvisoCurso = ClassRegistry::init('AvisoCurso');
      $options = array('fields' => array('AvisoCurso.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoCurso.aviso_id >= ' => min($cursos), 'AvisoCurso.aviso_id <= ' => max($cursos), 'AND' => array('AvisoCurso.aviso_id' => $cursos)));
      $avisoscurso = $AvisoCurso->find('list', $options);
      sort($avisoscurso);
      if (empty($avisoscurso)) $avisoscurso[] = 0;
//debug($avisoscurso); die;

      $AvisoGrupo = ClassRegistry::init('AvisoGrupo');
      $options = array('fields' => array('AvisoGrupo.aviso_id'), 'recursive' => -1, 'conditions' => array('AvisoGrupo.grupo_id' => $grupo['Post']['grupo']));
      $avisosgrupo = $AvisoGrupo->find('list', $options);
      sort($avisosgrupo);
      if (empty($avisosgrupo)) $avisosgrupo[] = 0;
//debug($avisosgrupo); die;

      $registros = array_merge($avisoscurso, $avisosgrupo);
//debug($registros); die;
      $Aviso = ClassRegistry::init('Aviso');
      $options = array('recursive' => -1, 'conditions' => array('Aviso.id >= ' => min($registros), 'Aviso.id <= ' => max($registros), 'AND' => array('Aviso.id' => $registros), 'Aviso.tipo_id' => 21), 'order' => array('Aviso.Data DESC'));
      $avisos = $Aviso->find('all', $options);
//debug($avisos); die;

      $this->set(compact('avisos'));

        //$this->layout = false;
    }
}