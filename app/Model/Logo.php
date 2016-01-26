<?php
App::uses('AppModel', 'Model');
/**
 * Logo Model
 *
 * @property Pessoa $Pessoa
 */
class Logo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'logo';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'pessoa_id';
   
   public $actsAs = array('Uploader.ImageUpload' => array(
      'logo' => array(
         'required'               => false,
         'directory'           => 'img/uploads/',
         'allowed_mime'        => array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png'),
         'allowed_extension'   => array('.jpg', '.jpeg', '.png', '.gif'),
         'allowed_size'        => 2097152,
         'random_filename'     => true,
         'resize' => array(
            'thumb' => array(
               'directory' => 'img/uploads/thumbs/',
               'phpThumb' => array(
                  'far' => 1,
                  'bg'  => 'FFFFFF',
                  'zc' => 0
               ),
               'width' => 230,
               'height' => 150
            ),
            'max' => array(
               'directory' => 'img/uploads/thumbs/',
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
		'Pessoa' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'pessoa_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
