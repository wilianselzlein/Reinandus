<?php
/**
 * Image Upload Behavior
 *
 * This is not the final version of this code, it still needs more work to be 100% stable
 *
 * @author Michael Houghton <michael@cakecoded.com>
 * @license MIT
 */
App::import('Core', array('Folder', 'File'));
App::import('Vendor', 'phpThumb', array('file' => 'phpThumb' . DS . 'phpthumb.php'));

class ImageUploadBehavior extends ModelBehavior {
    public $options = array(
        'required'		    => false,
		'directory'         => 'img/uploads',
		'allowed_mime' 	    => array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png'),
		'allowed_extension' => array('.jpg', '.jpeg', '.png', '.gif'),
		'allowed_size'	    => 1048576,
		'random_filename'   => true,
        'resize' => array(
            'max' => array(
                'directory' => 'img/uploads/max',
                'width' => 640,
                'height' => 480,
                'phpThumb' => array(
                    'zc' => 0
                )
            ),

            'thumb' => array(
                'directory' => 'img/uploads/thumbs',
                'width' => 320,
                'height' => 240,
                'phpThumb' => array(
                    'zc' => 0
                )
            )
        )
    );

    /**
	 * Array of errors
	 */
	public $errors = array();

    public $__fields;

    public function setup(Model $model, $config = array()){
        if ($model->actsAs['Uploader.ImageUpload']) {
            $config = $model->actsAs['Uploader.ImageUpload'];
        }

        $config_temp = array();

        foreach ($config as $field => $options){
            // Check if given field exists
            if (!$model->hasField($field)){
                unset($config[$field]);
                unset($model->data[$model->name][$field]);

                continue;
            }

            if(substr($options['directory'], -1) != '/'){
                $options['directory'] = $options['directory'] . DS;
            }

            $config_temp[$field] = $options;
        }

        $this->__fields = $config_temp;

        return $config_temp;
    }

    public function beforeSave(Model $model, $options = array()) {
        // there is a CakePHP issue here so we need to reload this manually
        $this->__fields = $this->setup($model, $options);

        if (count($this->__fields) > 0) {
            foreach($this->__fields as $field => $options) {
                // Check for model data whether has been set or not
                if (!isset($model->data[$model->name][$field])){
                    continue;
                }

                // lets see if the ingore upload it set!
                if (!empty($model->data[$model->name]['noUpload'])){
                    continue;
                }

                // lets see if we are deleting this image
                if (!empty($model->data[$model->name][$field]['delete']) || !empty($model->data[$model->name][$field . '_delete'])) {
                    $model->recursive = -1;
                    if (!empty($model->data[$model->name][$field]['delete'])) {
                       $current = $model->findById($model->data[$model->name][$field]['delete']);
                    } else {
                        $current = $model->findById($model->data[$model->name][$field.'_delete']);
                    }

                    if (!empty($current[$model->name][$field])) {
                        $this->removeImages($current[$model->name][$field], $options);
                    }
                }

                // Check the data if it's not an array
                if (isset($model->data) && !is_array($model->data[$model->name][$field])){
                    unset($model->data[$model->name][$field]);
                    continue;
                }

                // Check any error occur
                if ($model->data[$model->name][$field]['error'] > 0) {
                    // if error == 4 then we are not loading a file, so lets see if we want to delete it
                    if (!empty($model->data[$model->name][$field]['delete']) || !empty($model->data[$model->name][$field.'_delete'])) {
                    	$model->data[$model->name][$field] = '';
                    } else {
                    	unset($model->data[$model->name][$field]);
                    }
                    continue;
                }

                // Lets remove any file which did exist for this model
                if (!empty($model->data[$model->name]['id'])) {
                    $model->recursive = -1;
                    $current = $model->findById($model->data[$model->name]['id'], $field);

                    // lets delete the old images
                    if (!empty($current[$model->name][$field])) {
                        $this->removeImages($current[$model->name][$field], $options);
                    }
                }

                // Create final save path
                if (!isset($options['random_filename']) || !$options['random_filename']) {
                    $saveAs = realpath($options['directory']) . DS . $model->data[$model->name][$field]['name'];
                } else {
                    // Lets remove any file which did exist for this model
                    if (!empty($model->data[$model->name]['id'])) {
						$model->recursive = -1;
                        $current = $model->findById($model->data[$model->name]['id'], $field);

                        // lets delete the old images
                       	if (!empty($current[$model->name][$field])) {
                            $this->removeImages($current[$model->name][$field], $options);
                       	}
                    }

                    if (!isset($options['random_filename']) || !$options['random_filename']) {
                    	$saveAs = realpath(WWW_ROOT . $options['directory']) .DS. $model->data[$model->name][$field]['name'];
                	} else {
	                    $uniqueFileName = sha1(uniqid(rand(), true));
	                    $extension = explode('.', $model->data[$model->name][$field]['name']);
	                    $saveAs    = realpath(WWW_ROOT . $options['directory']) .DS. $uniqueFileName . '.' . $extension[count($extension)-1];
                    }
                }

                // Attempt to move uploaded file
               //debug($saveAs); 
               if (!move_uploaded_file($model->data[$model->name][$field]['tmp_name'],$saveAs)) {
                    throw new LogicException('There was a problem uploading the image, please ensure the folder path is writable.');
                }

                // Update model data
                $model->data[$model->name]['type'] = $model->data[$model->name][$field]['type'];
                $model->data[$model->name]['size'] = $model->data[$model->name][$field]['size'];
                $model->data[$model->name][$field] = basename($saveAs);

                if (!empty($options['resize'])) {
                    foreach ($options['resize'] as $name => $resize) {
                        $this->generateThumbnail($saveAs, $resize);
                    }
                }
            }
        }

        return true;
    }

    public function beforeValidate(Model $model, $options = array()) {
        // there is a CakePHP issue here so we need to reload this manually
        $this->__fields = $this->setup($model, $options);

        foreach ($this->__fields as $field => $options) {
            if (!empty($model->data[$model->name][$field]['type']) && !empty($options['allowed_mime'])) {
                // Check extensions
                if (count($options['allowed_extension']) > 0) {
                    $matches = 0;
                    foreach ($options['allowed_extension'] as $extension){
                        if (strtolower(substr($model->data[$model->name][$field]['name'],-strlen($extension))) == $extension){
                            $matches++;
                        }
                    }

                    if ($matches == 0) {
                        $allowed_ext = implode(', ', $options['allowed_extension']);
                        $model->invalidate($field, sprintf(__('Invalid file type. Only %s allowed.'), $allowed_ext));
                        continue;
                    }
                }

                // Check mime
                if (count($options['allowed_mime']) > 0 && !in_array($model->data[$model->name][$field]['type'], $options['allowed_mime'])) {
                    $model->invalidate($field, __('Invalid file type'));
                    continue;
                }

                // Check the size
                if ($model->data[$model->name][$field]['size'] > $options['allowed_size']) {
                    $model->invalidate($field, sprintf(__('The image you uploaded exceeds the maximum file size of %d bytes'), $options['allowed_size']));
                    continue;
                }
            } else {
                if (is_array($options['required'])) {
                	foreach ($options['required'] as $action => $required) {
                        $empty = false;

                		switch($action){
                            case 'add':
                                if ($required == true && empty($mode->data[$model->name]['id'])) {
                                    $empty = true;
                                    continue;
                                }
                            break;

                            case 'edit':
                                if ($required == true && !empty($mode->data[$model->name]['id'])) {
                                    $empty = true;
                                    continue;
                                }
                            break;
                        }

                        if ($empty){
                            $model->invalidate($field, sprintf(__('%s is required.'), Inflector::humanize($field)));
                            continue;
                        }
                	}
                } elseif ($options['required'] == true) {
                    $model->invalidate($field, sprintf(__('%s is required.'), Inflector::humanize($field)));
                    continue;
                }
            }
        }
    }

    public function beforeDelete(Model $model, $cascade = true) {
        // there is a CakePHP issue here so we need to reload this manually
        $this->__fields = $this->setup($model);

        if (count($this->__fields) > 0){
            $model->recursive = -1;
            $model->read(null, $model->id);
            if (isset($model->data)) {
                foreach($this->__fields as $field => $options){
                    if (!empty($model->data[$model->name][$field])) {
                    	$count = $model->find('count', array('conditions' => array($field => $model->data[$model->name][$field]), 'recursive' => -1));
                    	if ($count == 1) {
                    		$this->removeImages($model->data[$model->name][$field], $options);
                    	}
                    }
                }
            }
        }

        return true;
    }

    public function removeImages($file, $options) {
        // we should only delete this image if it only exists once in this model
        // this code needs to be added here

        $file_with_ext = WWW_ROOT . $options['directory'] . $file;
		if (file_exists($file_with_ext)) {
			unlink($file_with_ext);
		}

        foreach ($options['resize'] as $name => $resize) {
            $resizePath = WWW_ROOT . $resize['directory'] . DS . $file;
            if (file_exists($resizePath)){
                unlink($resizePath);
            }
        }
    }

	public function generateThumbnail($saveAs, $options){
        $destination = WWW_ROOT . $options['directory'] . DS . basename($saveAs);

        $ext = substr(basename($saveAs), strrpos(basename($saveAs), '.') + 1);
        if ($ext == '.jpg' || $ext == '.jpeg') {
            $format = 'jpeg';
        } elseif($ext == 'png') {
            $format = 'png';
        } elseif($ext == 'gif') {
            $format = 'gif';
        } else {
            $format = 'jpeg';
        }

        $phpThumb = new phpthumb();
        $phpThumb->setSourceFilename($saveAs);
        $phpThumb->setCacheDirectory(CACHE);

        $size = @getimagesize($saveAs);
        if ($size[0] > $options['width'] || !empty($options['phpThumb']['far']) || empty($size)) {
            $phpThumb->setParameter('w', $options['width']);
        }

        if ($size[1] > $options['height'] || !empty($options['phpThumb']['far']) || empty($size)) {
            $phpThumb->setParameter('h', $options['height']);
        }

        $phpThumb->setParameter('f', $format);

        if (!empty($options['phpThumb'])) {
            foreach($options['phpThumb'] as $name => $value){
                if(!empty($value)){
                    $phpThumb->setParameter($name, $value);
                }
            }
        }

        if ($phpThumb->generateThumbnail()) {
			if ($phpThumb->RenderToFile($destination)) {
                chmod($destination, 0644);
				return true;
			} else {
                return false;
            }
		} else {
			return false;
		}
	}

    public function resize(Model $Model, $saveAs, $options) {
        return $this->generateThumbnail($saveAs, $options);
    }
}