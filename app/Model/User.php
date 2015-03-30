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
      ),
      'password' => array(
         'notEmpty' => array(
            'rule' => array('notEmpty'),
            'message' => 'VALIDATE_BLANK',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
         )
      )
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
      if (isset($this->data[$this->alias]['password'])) {
         $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
      }
      return true;
   }

}
