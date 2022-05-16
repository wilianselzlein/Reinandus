# CakePHP Uploader Plugin
File and Image Uploader for CakePHP

# Installing

As this Plugin uses GIT submodules, the best way to install this Plugin is via GIT.

1) In terminal / command line go to cd app/Plugin

2) Type:

```
git clone https://github.com/MichaelHoughton/cakephp-file-uploader.git Uploader
```

Or, if you have an existing GIT repository:

```
git submodule add https://github.com/MichaelHoughton/cakephp-file-uploader.git Uploader
```

3) Browse to the Plugin
```
cd Uploader
```

4) The Uploader uses PHPThumb for image resizing.  Download PHPThumb using git submodule

```
git submodule init
git submodule update
```

5) Finally, in your app/Config/bootstrap.php file, load the plugin:

```php
CakePlugin::load('Uploader');
```

# Configuration

```php
public $actsAs = array('Uploader.ImageUpload' => array(
                            'yourFieldName' => array(
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
```

#Explaining the Configuration

yourFieldName = this is the name of the database field you want to save the image in, e.g. image

You will see a variable called "phpThumb" in the array.  You can set different PHPTHUMB options, these can be found here:
http://phpthumb.sourceforge.net/demo/docs/phpthumb.readme.txt

There are a couple of other options you can call when required:

If you want to have a check box to delete the image, you can set that like this:

```php
<?php echo $this->Form->checkbox('yourFieldName.delete', array('label' => 'Delete this image')); ?>
```

This is handy if you want to say give the user the option to delete the image already loaded.

If you want to load an image outside the behaviour, or perhaps you just want to load an image name without uploading an image, just add the following to your $this->request->data array before saving the data:

```php
$this->request->data['Model']['noUpload'] = true;
```

This will ignore the behaviour.

The behavior will also automatically delete the image file (and resized files) when you delete that row.  It will first check that that image file name isn't used in other rows in the model, before deleting the file for good!