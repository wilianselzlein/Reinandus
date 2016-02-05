<?php
App::uses('AppModel', 'Model');
/**
 * Parametro Model
 *
 */
class Parametro extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'parametro';

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
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'VALIDATE_BLANK',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor' => array(
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
	
/**
 * valor method
 *
 * @throws NotFoundException
 * @param string $id
 * @return string
 */
	public function valor($id = null) {
		if (!$this->exists($id)) {
			throw new NotFoundException(__('The record could not be found.'));
		}
		$options = array('conditions' => array('Parametro.' . $this->primaryKey => $id));
		$parametro = $this->find('first', $options);
                return $parametro['Parametro']['valor'];
	}
	
}
