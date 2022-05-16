<?php
App::uses('AppModel', 'Model');

class RelatorioFiltro extends AppModel {   

    public $useTable = 'relatorios_filtros';
   
	public $displayField = 'campo_alias';

	public $validate = array(
			'campo' => array(
							'notEmpty' => array(
										'rule' => array('notEmpty')
								),
						),
            'campo_alias' => array(
                              'notEmpty' => array(
                                      'rule' => array('notEmpty')
                              ),
                    	),
            'tipo_filtro' => array(
                              'notEmpty' => array(
                                      'rule' => array('notEmpty')
                              ),
            'numeric' => array(
                                      'rule' => array('numeric')
            )
        )
	);

	public $belongsTo = array(
		'RelatorioDataset' => array(
			'className' => 'RelatorioDataset',
			'foreignKey' => 'relatorio_dataset_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tipo' => array(
			'className' => 'Enumerado',
			'foreignKey' => 'tipo_filtro',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);

}