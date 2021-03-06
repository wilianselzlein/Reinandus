<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
   

	function ValorEntre($valor, $campo, $max){
		$valor = $valor[$campo];
		return ($valor >= 0) && ($valor <= $max);
	}

	public function findAsCombo($order = 'asc', $conditions = array(), $add_null = true) {
		if ($add_null)
			$list[''] = '';
		$list[] = $this->find('combo', 
			array('order' => $this->displayField . ' ' . $order, 'conditions' => $conditions));
		return $list;
	}

	public function findAsComboCampo($campo, $valor) {
		$conditions = [];
		if ($valor != null)
			$conditions = array($campo => $valor);
		$list = $this->find('combo', array('conditions' => $conditions));
		return $list;
	}

	/**
	* Verificar se não foi alterado por outro usuário
	* @return boolean
	*/
	public function beforeValidate($options = array()) {
		if (! isset($this->data[$this->alias]['modified2']))
			return true;

		$modificado = $this->data[$this->alias]['modified2'];
		$modificado = strtotime($modificado);
	 	if ($this->id > 0) {
			$datahora = $this->find('first', array('recursive' => -1, 'conditions' => 
				array($this->alias . '.id' => $this->data[$this->alias]['id']),
				'fields' => array($this->alias . '.modified')));
			$datahora = $datahora[$this->alias]['modified'];
			$datahora = strtotime($datahora);
			if ($datahora > $modificado) {
				$this->invalidate('JA_ALTERADO');
				return false;
			}
		}
		return true;
	}

}
