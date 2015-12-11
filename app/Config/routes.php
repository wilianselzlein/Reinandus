<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

$leads = array('user', 'users', 'User', 'Users');
foreach ($leads as $key) {
	Router::connect('/' .$key, array('controller' => 'usuarios', 'action' => 'index'));
	Router::connect('/' . $key . '/add', array('controller' => 'usuarios', 'action' => 'add'));
	Router::connect('/' . $key . '/add/', array('controller' => 'usuarios', 'action' => 'add'));
	Router::redirect('/' . $key . '/view/*', array('controller' => 'usuarios', 'action' => 'view'), array('persist'=>array('id')), array('persist' => true));
	Router::redirect('/' . $key . '/edit/*', array('controller' => 'usuarios', 'action' => 'edit'), array('persist'=>array('id')), array('persist' => true));
}

//Router::connect('/Users', array('controller' => 'usuarios', 'action' => 'index'));
//Router::connect('/Users/add/', array('controller' => 'usuarios', 'action' => 'add'));
//Router::redirect('/Users/view/*', array('controller' => 'usuarios', 'action' => 'view'), array('persist'=>array('id')), array('persist' => true));
//Router::redirect('/Users/edit/*', array('controller' => 'usuarios', 'action' => 'edit'), array('persist'=>array('id')), array('persist' => true));
//Router::connect('/Users/edit/*', array('controller' => 'usuarios', 'action' => 'edit', array('id' => '[0-9]+')));
//Router::connect("/{$prefix}/:action/*",  array('prefix' => $prefix, $prefix => true));
//Router::connect('/Users/view/:id', array('controller' => 'usuarios', 'action' => 'view'), array('pass' => array('id')));
//Router::connect('/Users/:action/*', array('controller' => 'usuarios'));
//Router::connect('/Users/:action/:id', array('controller' => 'usuarios', 'action' => 'action'), array('id' => '[0-9]+')
//Router::connect('/Users/:action/:id', array('controller' => 'usuarios', 'action' => 'action'), array('pass' => array('id'), 'id' => '[0-9]+'));
//Router::connect("/User/:id", array('controller' => 'usuarios', "action" => "view", "[method]" => "PUT"), array("id" => "[0-9]+"));
//Router::redirect('/Users/{$prefix}/*', array('controller' => 'usuarios', 'action' => $prefix), array('persist'=>array('id')), arra(y'persist' => true));
//Router::redirect('/Users/:action/*', array('controller' => 'usuarios'), array('persist' => array('id')), array('persist' => true));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

Router::parseExtensions('pdf');
