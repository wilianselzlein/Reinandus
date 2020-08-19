<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Pessoa $Pessoa
 * @property Role $Role
 * @property Aviso $Aviso
 * @property Mensalidade $Mensalidade
 * @property Permissao $Permissao
 */
class User extends AppModel {

   /**
 * Use table
 *
 * @var mixed False or table name
 */
   public $useTable = 'user';

   /**
 * Display field
 *
 * @var string
 */
   public $displayField = 'username';


   /**
 * Validation rules
 *
 * @var array
 */
   public $validate = array(
      'username' => array(
         'notEmpty' => array(
            'rule' => array('notEmpty'),
            'message' => 'VALIDATE_BLANK',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
         )
      )/*,
      'password' => array(
         'notEmpty' => array(
            'rule' => array('notEmpty'),
            'message' => 'VALIDATE_BLANK',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
         )
      )*/
   );

   //The Associations below have been created with all possible keys, those that are not needed can be removed

   /**
 * belongsTo associations
 *
 * @var array
 */
   public $belongsTo = array(
      'Pessoa' => array(
         'className' => 'Pessoa',
         'foreignKey' => 'pessoa_id',
         'conditions' => '',
         'fields' => '',
         'order' => ''
      ),
      'Role' => array(
         'className' => 'Role',
         'foreignKey' => 'role_id',
         'conditions' => '',
         'fields' => '',
         'order' => ''
      )
   );

   /**
 * hasMany associations
 *
 * @var array
 */
   public $hasMany = array(
      'Aviso' => array(
         'className' => 'Aviso',
         'foreignKey' => 'user_id',
         'dependent' => false,
         'conditions' => '',
         'fields' => '',
         'order' => '',
         'limit' => '',
         'offset' => '',
         'exclusive' => '',
         'finderQuery' => '',
         'counterQuery' => ''
      ),
      'Mensalidade' => array(
         'className' => 'Mensalidade',
         'foreignKey' => 'user_id',
         'dependent' => false,
         'conditions' => '',
         'fields' => '',
         'order' => '',
         'limit' => '',
         'offset' => '',
         'exclusive' => '',
         'finderQuery' => '',
         'counterQuery' => ''
      ),
      'ContaPagar' => array(
         'className' => 'ContaPagar',
         'foreignKey' => 'user_id',
         'dependent' => false,
         'conditions' => '',
         'fields' => '',
         'order' => '',
         'limit' => '',
         'offset' => '',
         'exclusive' => '',
         'finderQuery' => '',
         'counterQuery' => ''
      ),
      'Permissao' => array(
         'className' => 'Permissao',
         'foreignKey' => 'user_id',
         'dependent' => false,
         'conditions' => '',
         'fields' => '',
         'order' => '',
         'limit' => '',
         'offset' => '',
         'exclusive' => '',
         'finderQuery' => '',
         'counterQuery' => ''
      )
   );

   public function beforeSave($options = array()) {
      if ((isset($this->data[$this->alias]['password'])) && (strlen($this->data[$this->alias]['password']) <= 20)) {
         $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
      }
      return true;
   }


   /**
    * Checks to see if the username is already taken.
    * @return boolean
    */
   public function beforeValidate($options = array()) {
       if (!$this->id) {
           $num = $this->find('count', array('conditions' => 
               array('User.username' => $this->data['User']['username'])));
           if ($num > 0) {
               $this->invalidate('username_unique');
               return false;
           }
       }
       return true;
   }
}
