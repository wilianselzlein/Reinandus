<?php
App::uses('AppModel', 'Model');
/**
 * Cabecalho Model
 *
 */
class Cabecalho extends AppModel {

   /**
 * Use table
 *
 * @var mixed False or table name
 */
   public $useTable = 'cabecalho';

   /**
 * Display field
 *
 * @var string
 */
   public $displayField = 'cabecalho';

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
      'figura' => array(
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
      )
   )
                         );

}
