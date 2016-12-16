<?php
App::uses('AppModel', 'Model');
/**
 * Cidade Model
 *
 * @property Estado $Estado
 * @property Aluno $Aluno
 * @property Pessoa $Pessoa
 * @property Professor $Professor
 */
class Cidade extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cidade';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nome';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'estado_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'VALIDATE_NUMERIC',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Estado' => array(
			'className' => 'Estado',
			'foreignKey' => 'estado_id',
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
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'cidade_id',
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
		'Pessoa' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'cidade_id',
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
		'Professor' => array(
			'className' => 'Professor',
			'foreignKey' => 'cidade_id',
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

/*
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
   		$modificado = $this->data[$this->alias]['modified2'];
   		$modificado = strtotime($modificado);
       if ($this->id > 0) {
           $datahora = $this->find('first', array('recursive' => -1, 'conditions' => 
           		array($this->alias . '.id' => $this->data[$this->alias]['id']),
           		'fields' => array($this->alias . '.modified')));
           $datahora = $datahora['Cidade']['modified'];
           $datahora = strtotime($datahora);
           if ($datahora > $modificado) {
               $this->invalidate('JA_ALTERADO');
               return false;
            }
       }
       return true;
   }

}
