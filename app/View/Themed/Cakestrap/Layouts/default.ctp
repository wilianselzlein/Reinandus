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
echo $this->Html->css('bootstrap');
echo $this->Html->css('sb-admin');
echo $this->Html->css('bootstrap-dialog');
echo $this->Html->css('datepicker3');
echo $this->Html->css('font-awesome.min');
echo $this->fetch('css');
echo $this->Html->script('libs/jquery-1.10.2.min');
echo $this->Html->script('libs/bootstrap.min');
echo $this->Html->script('libs/bootstrap-dialog');
echo $this->Html->script('libs/bootstrap-datepicker');
echo $this->Html->script('libs/locales/bootstrap-datepicker.pt-BR');
echo $this->Html->script('libs/jquery.mask');
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu message-dropdown">
                     <li class="message-preview">
                        <a href="#">
                           <div class="media">
                              <span class="pull-left">
                                 <img class="media-object" src="http://placehold.it/50x50" alt="">
                              </span>
                              <div class="media-body">
                                 <h5 class="media-heading"><strong>John Smith</strong>
                                 </h5>
                                 <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                 <p>Lorem ipsum dolor sit amet, consectetur...</p>
                              </div>
                           </div>
                        </a>
                     </li>
                     <li class="message-preview">
                        <a href="#">
                           <div class="media">
                              <span class="pull-left">
                                 <img class="media-object" src="http://placehold.it/50x50" alt="">
                              </span>
                              <div class="media-body">
                                 <h5 class="media-heading"><strong>John Smith</strong>
                                 </h5>
                                 <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                 <p>Lorem ipsum dolor sit amet, consectetur...</p>
                              </div>
                           </div>
                        </a>
                     </li>
                     <li class="message-preview">
                        <a href="#">
                           <div class="media">
                              <span class="pull-left">
                                 <img class="media-object" src="http://placehold.it/50x50" alt="">
                              </span>
                              <div class="media-body">
                                 <h5 class="media-heading"><strong>John Smith</strong>
                                 </h5>
                                 <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                 <p>Lorem ipsum dolor sit amet, consectetur...</p>
                              </div>
                           </div>
                        </a>
                     </li>
                     <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                     </li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                  <ul class="dropdown-menu alert-dropdown">
                     <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                     </li>
                     <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                     </li>
                     <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                     </li>
                     <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                     </li>
                     <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                     </li>
                     <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                     </li>
                     <li class="divider"></li>
                     <li>
                        <a href="#">View All</a>
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
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
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
               </div><!-- /#content .container -->
            </div>

            <div id="footer" class="container">
               <?php //Silence is golden ?>
            </div><!-- /#footer .container -->

            </div><!-- /#main-container -->		
         <script>$(document).ready(function(){ $('[data-toggle=tooltip]').tooltip()});</script>
         <?php echo $this->Html->script('cfg-datepicker');?>
         <?php echo $this->Html->script('cfg-currency');?>
         <?php echo $this->Html->script('cfg-percentage');?>
         <?php echo $this->Html->script('cfg-cep');?>
         <?php echo $this->Html->script('cfg-cpf');?>
         <?php echo $this->Html->script('cfg-cnpj');?>
         </body>

      </html>