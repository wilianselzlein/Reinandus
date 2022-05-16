<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<style rel="stylesheet" type="text/css">
	.menu { float: left; width: 80%; }
	.conteudo { margin-left: 90%; margin-top: 20px;}
</style>

<div  class="jumbotron">
	<div class="menu"><h2>Ooops...deu erro!</h2></div>
	<div class="conteudo"><i class="fa fa-frown-o fa-3x"></i></div>
	<br>
	<h4><?php echo $message; ?></h4>
	<span class="label label-info">Volte para a tela anterior e tente novamente (500).</span>
	<br>
	<br>
</div>
<?php
if (Configure::read('debug') > 0):
	printf(__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>");
	
	echo $this->element('exception_stack_trace');
endif;
?>

