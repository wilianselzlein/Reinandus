<?php
/**
    * Application level Controller
    *
    * This file is application-wide controller file. You can put all
    * application-wide controller-related methods here.
    *
    * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
    * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
    *
    * Licensed under The MIT License
    * For full copyright and license information, please see the LICENSE.txt
    * Redistributions of files must retain the above copyright notice.
    *
    * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
    * @link          http://cakephp.org CakePHP(tm) Project
    * @package       app.Controller
    * @since         CakePHP(tm) v 0.2.9
    * @license       http://www.opensource.org/licenses/mit-license.php MIT License
    */

App::uses('Controller', 'Controller');
App::uses('PermissoesController', 'Controller');

/**
    * Application Controller
    *
    * Add your application-wide methods in the class below, your controllers
    * will inherit them.
    *
    * @package		app.Controller
    * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
    */
class AppController extends Controller {
   public $theme = "Cakestrap";

   public $helpers = array('Form' => array('className' => 'Bs3Helpers.Bs3Form'),
                           'Wysiwyg.Wysiwyg' => array('_editor' => 'Ck'),
                           'FilterResults.Search' => array(
                              'operators' => array(
                                 'LIKE'       => 'containing',
                                 'NOT LIKE'   => 'not containing',
                                 'LIKE BEGIN' => 'starting with',
                                 'LIKE END'   => 'ending with',
                                 '='  => 'equal to',
                                 '!=' => 'different',
                                 '>'  => 'greater than',
                                 '>=' => 'greater or equal to',
                                 '<'  => 'less than',
                                 '<=' => 'less or equal to'
                              )
                           )
                          );

   public $components = array(
      // -------OBS: ver esse link http://goo.gl/yvxl5Q ---- //'Security',
      'Cookie',
      'Session',
      'Auth',
      'FilterResults.Filter' => array(
         'auto' => array(
            'paginate' => false,
            'explode'  => true,  // recommended
         ),
         'explode' => array(
            'character'   => ' ',
            'concatenate' => 'AND',
         )
      ),
      'RequestHandler'
   );

   protected function AdicionarFiltrosLike($model, $ignorados = null) {
      $tabela = $model->name . '.';
      $operador = array('operator' => 'LIKE', 'explode'  => false);

      $colunas = array_keys($model->getColumnTypes());
      foreach ($colunas as $coluna) {
         if ((is_null($ignorados)) || (! (in_array($coluna, $ignorados))))
            $array[$tabela . $coluna] = $operador;
      }

      $relacionamentos = $model->belongsTo;
      foreach ($relacionamentos as $relacionamento => $classeModel) {
         $classe = ClassRegistry::init($classeModel['className']);
         $array[$relacionamento . '.' . $classe->displayField] = $operador;
      }

      return $array;
   }

   /*
   function beforeFilter() {

      if($this->params['controller']=='Portal')
      {
         $this->Auth->userModel = 'Aluno';
         $this->Auth->fields = array('username' => 'numero', 'password' => 'senha');
         $this->Auth->loginAction = array('controller' => 'Portal', 'action' => 'login');
         $this->Auth->loginRedirect = array('controller' => 'Portal', 'action' => 'index');
         $this->Auth->logoutRedirect = array('controller' => 'Portal', 'action' => 'login');
         //$this->Auth->allow('display','login','logout');
         $this->Auth->authorize = 'portal';
         //$this->Auth->userScope = array('GroupUser.active' => 1);

         //$this->Session->write('Auth.redirect','/groups/index');
      }else{
         $this->Auth->userModel = 'User';
         $this->Auth->loginAction = array('controller' => 'usuarios', 'action' => 'login');
         $this->Auth->loginRedirect = array('controller' => 'usuarios', 'action' => 'index');
         $this->Auth->logoutRedirect = array('controller' => 'usuarios', 'action' => 'login');
         //$this->Auth->allow('display','login','logout');
         //$this->Auth->authorize = 'portal';
         //$this->Auth->userScope = array('User.active' => 1);

         //$this->Session->write('Auth.redirect','/users/index');
      }
   }
   */
   //public $components = array('Security','Cookie','Session','Auth','RequestHandler');
   //public $helpers = array('Cache','Html','Session','Form');

   function beforeFilter() {

      if ($this->request->prefix == 'aluno') {
         //debug($this->params);
         $this->layout = 'portal_aluno';

         AuthComponent::$sessionKey = 'Auth.Aluno';
         $this->Auth->loginAction = array('controller'=>'portal','action'=>'login');
         $this->Auth->loginRedirect = array('controller'=>'portal','action'=>'index');
         $this->Auth->logoutRedirect = array('controller'=>'portal','action'=>'login');
         $this->Auth->authorize = 'Controller';
         $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
               'userModel' => 'Aluno',
               'fields' => array(
                  'username' => 'id',
                  'password' => 'senha'
               ),
               'scope' => array(
                  'Aluno.is_ativo' => 1,
               ),
            ),
            'Form',
         );
         $this->Auth->allow('login');

      } else {//if ($this->request->prefix == 'phys') {

         AuthComponent::$sessionKey = 'Auth.User';
         $this->Auth->loginAction = array('controller'=>'usuarios','action'=>'login');
         $this->Auth->logoutRedirect = '/';
         $this->Auth->authenticate = array(
            'Form' => array(
               'userModel' => 'User',
            )
         );
         //$this->Auth->allow('index', 'importar', 'relatorio');
         $this->VerificarPermissaoDeAcesso();
    //}
      }
   }

   function beforeRender() {
      if($this->name == 'CakeError') {
         $this->layout = null;
      }
      
		$this->MontarMenu();
   }

   public function isAuthorized($user){
      //debug($this->name);
      //debug($this->Session->read('Auth.Aluno'));
      //debug($this->Session->read('Auth.User'));
      if($this->name != 'Portal' && $this->Session->read('Auth.User') == null)
      {
         $this->Session->setFlash(__('Acesso restrito'), 'flash/error');
         return false;
      }
      // You can have various extra checks in here, if needed.
      // We'll just return true though. I'm pretty certain this method has to exist, even if it just returns true.
      return true;
   }

  private function VerificarParametroPermissoesEstaHabilitado() {
      $parametro = ClassRegistry::init('Parametro');
      return $parametro->valor(8) == 'S';
  }

  private function VerificarPermissaoDeAcesso() {

      $user_id = $this->Auth->user('id');
      $model = $this->modelClass;
      $view = $this->view;
      if (($user_id != '') && ($this->VerificarParametroPermissoesEstaHabilitado()) &&
          (($model != 'Page') && ($view != 'display')) &&
          (($model != 'User') && ($view != 'logout')) &&
          (($model != 'User') && ($view != 'login'))) {

          $permissoes = $this->ConsultarPermissoes($user_id, $model);

          if ((isset($permissoes)) && (count($permissoes) > 0)) {
              $acesso = false;
              switch ($view) {
                  case "index":
                  case "view":
                  case "edit":
                  case "add":
                  case "delete":
                      $acesso = $permissoes['Permissao'][$view];
                      break;
                  default:
                      $acesso = $permissoes['Permissao']['index']; //0; //negar todas as exceçoes
                      break;
              }
              $acesso = (bool) $acesso;
              if (! $acesso) {
                  //throw new NotFoundException(__('The record could not be found.'));
                  $this->Session->setFlash(__('__PERMISSAO') . ' M="' . $model . '" V="' . $view . '"', 'flash/error'); //$this->Auth->user('role')
                  $this->redirect(array('controller' => 'Pages', 'action' => 'display'));
              }
          }
      }
  }

  private function ConsultarPermissoes($user_id, $model) {
      $variavel = 'Permissoes';
      $permissoes = CakeSession::read($variavel);

      if ($permissoes == null) {
          $Permissao = ClassRegistry::init('Permissao');
          $options = array('fields' => array('Programa.nome', 'Permissao.index', 'Permissao.view', 'Permissao.edit', 'Permissao.add', 'Permissao.delete'), 'conditions' => array('Permissao.user_id' => $user_id));
            $permissoes = $Permissao->find('all', $options);
          $permissoes = serialize($permissoes);
          CakeSession::write($variavel, $permissoes);
      }

      $permissoes = unserialize($permissoes);
      $filtro = [];

      foreach ($permissoes as $permissao) {
         if ($permissao['Programa']['nome'] == $model) {
            $filtro = $permissao;
         }
      }
      return $filtro;
  }

	private function MontarMenu() {
		
      $dados = $this->Session->read('Auth');
      if (isset($dados['User'])) {
         $user_id = $dados['User']['id'];
           
         $Permissoes = new PermissoesController;
         $permissoes = $Permissoes->ConsultarPermissoesParaMontarOMenu($user_id);
   
   		$this->set(compact('permissoes'));
      }
	}

  public function copy($id) {

      if (! $this->{$this->modelClass}->exists($id)) {
          throw new NotFoundException(__('The record could not be found.'));
      }

      $options = array('recursive' => -1, 'conditions' => array($this->modelClass . '.' . $this->{$this->modelClass}->primaryKey => $id));


      $registro = $this->{$this->modelClass}->find('first', $options);

      unset($registro[$this->modelClass]['id']);
      if (isset($registro[$this->modelClass]['created']))
        unset($registro[$this->modelClass]['created']);
      if (isset($registro[$this->modelClass]['modified']))
        unset($registro[$this->modelClass]['modified']);
      if (isset($registro[$this->modelClass]['username']))
          $registro[$this->modelClass]['username'] = 'Copiado';

      /*debug($this->name); 
      debug($this->modelClass); 
      debug($this->methods);
      debug($this->request->params['pass'][0]);
      debug($registro); die;*/

      $this->{$this->modelClass}->create();
      if ($this->{$this->modelClass}->save($registro)) {
        $novo = $this->{$this->modelClass}->getLastInsertID();

        $this->beforeCopy($id, $novo);
        $this->Session->setFlash(__('The record has been saved'), "flash/success");
        $this->redirect(array('action' => 'edit', $novo));  
      } else {
        $this->Session->setFlash(__('The record could not be saved. Please, try again.'), 'flash/error');
        $this->redirect(array('action' => 'index'));
      } 


  }

  public function beforeCopy($de_id, $para_id) {

  }

/**
 * download method
 *
 * @return void
 */
  public function download($caminho, $arquivo) {
        $this->response->file($caminho . $arquivo, array('download' => true, 'name' => $arquivo));
        return $this->response;
  }

}
