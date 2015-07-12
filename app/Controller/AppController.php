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
      'Security',
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

   protected function AdicionarFiltrosLike($model) {
      $tabela = $model->name . '.';
      $operador = array('operator' => 'LIKE');      

      $colunas = array_keys($model->getColumnTypes());

      foreach ($colunas as $coluna) {
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

      if ($this->name =='Portal') {
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
      } 
   }

   // Before Render
   function beforeRender() {
      if($this->name == 'CakeError') {
         $this->layout = null;
      }
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






}                                      