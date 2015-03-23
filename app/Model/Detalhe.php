<?php
App::uses('AppModel', 'Model');
/**
 * Detalhe Model
 *
 * @property Aluno $Aluno
 * @property Pessoa $Pessoa
 */
class Detalhe extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'detalhe';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'aluno_id';
   
   public $actsAs = array('Uploader.ImageUpload' => array(
      'foto' => array(
         'required'               => false,
         'directory'           => 'img/alunos/',
         'allowed_mime'        => array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png'),
         'allowed_extension'   => array('.jpg', '.jpeg', '.png', '.gif'),
         'allowed_size'        => 2097152,
         'random_filename'     => true,
         'resize' => array(
            'thumb' => array(
               'directory' => 'img/alunos/thumbs/',
               'phpThumb' => array(
                  'far' => 1,
                  'bg'  => 'FFFFFF',
                  'zc' => 0
               ),
               'width' => 230,
               'height' => 150
            ),
            'max' => array(
               'directory' => 'img/alunos/thumbs/',
               'phpThumb' => array(
                  //'far' => 1,
                  //'bg'  => 'FFFFFF',
                  'zc' => 0
               ),
               'width' => 400,
               'height' => 300
            )
         )
      ),      
      )
   );

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Aluno' => array(
			'className' => 'Aluno',
			'foreignKey' => 'aluno_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)/*,
		'Pessoa' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'pessoa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)*/
	);
}
