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

const SEM_FLASH = false;

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
	public function valor($id = null, $usa_cache = true) {
		$variavel = 'Parametros.' . $id;
		$valor = CakeSession::read($variavel);
		if (! $usa_cache) 
			$valor = null;
		if ($valor == null) {
			if (!$this->exists($id)) {
				App::import('Controller', 'Parametros');
				$Parametros = new ParametrosController();

				$Parametros->AdicionarPararametrosSeNecessario(SEM_FLASH);
				if (!$this->exists($id)) 
					throw new NotFoundException(__('The record could not be found.') . ' - Parametro ');
			}
			$options = array('conditions' => array('Parametro.' . $this->primaryKey => $id));
			$parametro = $this->find('first', $options);
			$valor = $parametro['Parametro']['valor'];
			CakeSession::write($variavel, $valor);
		}
        return $valor;
	}
	
}
