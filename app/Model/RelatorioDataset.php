<?php
App::uses('AppModel', 'Model');

class RelatorioDataset extends AppModel {   
      
   public $useTable = 'relatorios_datasets';
   
	public $displayField = 'nome';

	public $validate = array(
		'nome' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')			
			),
		),
                'sql' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty')			
			),
		)
	);
  public $hasMany = array(
     'RelatorioFiltro' => array(
			'className' => 'RelatorioFiltro',
			'foreignKey' => 'relatorio_dataset_id',
			'dependent' => true			
		),
  );
   
  public $belongsTo = array(
		'Relatorio' => array(
			'className' => 'Relatorio',
			'foreignKey' => 'relatorio_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}