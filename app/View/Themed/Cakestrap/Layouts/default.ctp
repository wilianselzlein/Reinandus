<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Reinandus');
$components = array('Paginator', 'Session');
$usuario_logado = $this->Session->read('Auth.User');

?>
<?php echo $this->Html->docType('html5'); ?> 
<html>
<head>
   <?php echo $this->Html->charset(); ?>
   <title>
      <?php echo $cakeDescription ?>:
      <?php echo $title_for_layout; ?>
   </title>
   <?php
   echo $this->Html->meta('icon');
   echo $this->fetch('meta');
   echo $this->Html->css('bootstrap.min');
   
   echo $this->Html->css('sb-admin');
   echo $this->Html->css('bootstrap-dialog');
   echo $this->Html->css('datepicker3');
   echo $this->Html->css('font-awesome.min');
   echo $this->Html->css('bootstrap-combobox');

   echo $this->fetch('css');
   echo $this->Html->script('libs/jquery-1.10.2.min');
   echo $this->Html->script('libs/bootstrap.min');
   echo $this->Html->script('libs/bootstrap-dialog');   
   echo $this->Html->script('libs/bootstrap-datepicker');
   echo $this->Html->script('libs/locales/bootstrap-datepicker.pt-BR');
   echo $this->Html->script('libs/jquery.mask');
   echo $this->Html->script('libs/bootstrap-combobox');
   echo $this->fetch('script');
   ?>
</head>

<body>

   <div id="wrapper">


      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <?php echo $this->Html->Link('Sistema Pós-Graduação', array('controller' => 'Pages', 'action' => 'display'), arraY('class' => 'navbar-brand')); ?>
         </div>
         <!-- Top Menu Items -->
         <ul class="nav navbar-right top-nav">
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-male"></i> <b class="caret"></b></a>
               <ul class="dropdown-menu message-dropdown">
                  <li class="message-preview">
                     <?php echo $this->Html->link('<i class="fa fa-fw fa-male"></i>'.' Ir para o espaço dos '.__('Alunos'), 
                     array('controller' => 'portal', 'action' => 'index'), array('class' => '', 'escape'=>false)); ?>
                  </li>
                  <?php echo $this->UltimosAlunosCadastrados->GerarLista(); ?>
               </ul>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
               <ul class="dropdown-menu message-dropdown">
                  <?php echo $this->UltimosAvisosDoUsuario->GerarLista($usuario_logado['id']); ?>
                  <li class="message-footer">
                     <?php echo $this->Html->link('<i class="fa fa-fw fa-comment"></i>'.' Ir para '.__('Avisos'), 
                     array('controller' => 'avisos', 'action' => 'index'), array('class' => '', 'escape'=>false)); ?>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu alert-dropdown">
                     <li>
                        <?php echo $this->Avisos->Alunos('default'); ?>
                     </li>
                     <li>
                        <?php echo $this->Avisos->Professores('success'); ?>
                     </li>
                     <li class="divider"></li>
                     <li>
                        <?php echo $this->Avisos->Mensalidades('primary', 'Recebidas'); ?>
                     </li>
                     <li>
                        <?php echo $this->Avisos->Mensalidades('info', 'Receber'); ?>
                     </li>
                     <li>
                        <?php echo $this->Avisos->Pagar('warning', 'Pagas'); ?>
                     </li>
                     <li>
                        <?php echo $this->Avisos->Pagar('danger', 'Pagar'); ?>
                     </li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                     <?php echo $usuario_logado['username']; ?>
                     <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu">
                     <li>
                        <?php echo $this->Html->link('<i class="fa fa-fw fa-user"></i>'.' '.__('Perfil'), 
                        array('controller' => 'pessoas', 'action' => 'view', $usuario_logado['pessoa_id']), array('class' => '', 'escape'=>false)); ?>
                     </li>
                     <li>
                        <?php echo $this->Html->link('<i class="fa fa-fw fa-envelope"></i>'.' '.__('Inbox'), 
                        array('controller' => 'avisos', 'action' => 'index', $usuario_logado['id']), array('class' => '', 'escape'=>false)); ?>
                     </li>
                     <li>
                        <?php echo $this->Html->link('<i class="fa fa-fw fa-gear"></i>'.' '.__('Configurações'), 
                        array('controller' => 'usuarios', 'action' => 'view', $usuario_logado['id']), array('class' => '', 'escape'=>false)); ?>
                     </li>
                     <li class="divider"></li>
                     <li>
                        <?php echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i>'.' '.__('Logout'), 
                        array('controller' => 'usuarios', 'action' => 'logout'), array('class' => '', 'escape'=>false)); ?>
                     </li>
                  </ul>
                  </li
               </ul>
               <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
               <div class="collapse navbar-collapse navbar-ex1-collapse">
                  <?php echo $this->element('menu/side_menu');?>
               </div>
               <!-- /.navbar-collapse -->
            </nav>


            <div id="page-wrapper">
               <div  class="container-fluid">
                  <?php echo $this->Session->flash(); ?>
                  <?php echo $this->fetch('content'); ?>
                  <?php echo $this->element('sql_dump'); ?>
               </div><!-- /#content .container -->
            </div>

            <div id="footer" class="container">
               <?php //Silence is golden ?>

            </div><!-- /#footer .container -->

         </div><!-- /#main-container -->		

         <script>
            $(document).ready(function(){ $('[data-toggle=tooltip]').tooltip()});
            $(document).ready(function(){ $('.combobox').combobox(); });
         </script>
         <?php echo $this->Html->script('cfg-datepicker');?>
         <?php echo $this->Html->script('cfg-currency');?>
         <?php echo $this->Html->script('cfg-percentage');?>
         <?php echo $this->Html->script('cfg-cep');?>
         <?php echo $this->Html->script('cfg-cpf');?>
         <?php echo $this->Html->script('cfg-cnpj');?>
         <?php echo $this->Html->script('cfg-dddphone');?>
      </body>

      </html>