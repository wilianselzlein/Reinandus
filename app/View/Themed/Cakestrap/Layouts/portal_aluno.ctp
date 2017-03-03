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
$usuario_logado = $this->Session->read('Auth.Aluno');

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
echo $this->Html->css('user-bar');
echo $this->Html->css('bootstrap-dialog');
echo $this->Html->css('datepicker3');
echo $this->Html->css('font-awesome.min');
echo $this->Html->css('fonte');
echo $this->fetch('css');
echo $this->Html->script('libs/jquery-2.1.4.min');
echo $this->Html->script('libs/bootstrap.min');
echo $this->Html->script('libs/bootstrap-dialog');
echo $this->Html->script('libs/bootstrap-datepicker');
echo $this->Html->script('libs/locales/bootstrap-datepicker.pt-BR');
echo $this->Html->script('libs/jquery.mask');
echo $this->Html->script('libs/fonte');
echo $this->fetch('script');
      ?>
   </head>
   <body>
      <div id="wrappera">
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <?php echo $this->Html->Link('Portal do Aluno', array('controller' => 'portal', 'action' => 'index', 'aluno' => true ), arraY('class' => 'navbar-brand')); ?>
            </div>
            <ul class="nav navbar-nav navbar-right">
               <li class="">
                  <a href="#" title="Diminuir fonte" class="dec-font" data-toggle="tooltip" data-placement="bottom">
                     A <i class="fa fa-minus-square fa"></i>
                  </a>
               </li>
               <li class="">
                  <a href="#" title="Aumentar fonte" class="inc-font" data-toggle="tooltip" data-placement="bottom">
                     A <i class="fa fa-plus-square fa"></i>
                  </a>
               </li>
               <?php if (isset($manual)) { ?>
               <li class="">
                  <a href="<?php echo $manual; ?>" title="Manual do Aluno" data-toggle="tooltip" data-placement="bottom">
                     <i class="fa fa-book fa-2x"></i>
                  </a>
               </li>
               <?php } ?>
               <li class="">
                  <a href="https://www.facebook.com/PosFACET" title="Facebook" data-toggle="tooltip" data-placement="bottom">
                     <i class="fa fa-facebook fa-2x"></i>
                  </a>
               </li>
               <!--<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>

               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
               </li>-->
               <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-placement="bottom">
                  <img id="gravatar-img" src="//www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.Aluno.email') ) ) ) ?>?s=30" >
                  <!-- php echo $this->Html->image('alunos/thumbs/'.$detalhes[0]['Detalhe']['foto'], array('width'=>'50','height'=>'50')); ?>-->
                  <?php echo $this->Session->read('Auth.Aluno.nome'); ?>
                  <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                     <li>
                        <div class="navbar-content">
                           <div class="row">
                              <div class="col-md-5">
                                 <img id="gravatar-img" src="//www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $this->Session->read('Auth.Aluno.email') ) ) ) ?>"
                                      class="img-responsive" />
                              </div>
                              <div class="col-md-7">
                                 <span><?php echo $usuario_logado['nome']; ?></span>
                                 <p class="text-muted small"><?php echo $usuario_logado['email']; ?></p>
                                 <div class="divider"></div>
                                 <?php //echo $this->Html->link(__('Alguma coisa'), array('controller' => 'portal', 	'action' => 'index'), array('class'=>'btn btn-primary btn-sm active'))?>
                                 <div class="divider"></div>
                              </div>
                           </div>
                        </div>
                        <div class="navbar-footer">
                           <div class="navbar-footer-content">
                              <div class="row">
                                 <div class="col-md-6">
                                    <?php echo $this->Html->link(__('Alterar senha'), 	array('controller' => 'portal','action' => 'forgot_password'), array('class'=>'btn btn-default btn-sm'));?>
                                 </div>
                                 <div class="col-md-6">
                                    <?php echo $this->Html->link(__('Logout'), 	array('controller' => 'portal', 	'action' => 'logout'), array('class'=>'btn btn-default btn-sm pull-right'));?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
               <!--<php echo $this->element('menu/side_menu');?>-->
            </div>
            <!-- /.navbar-collapse -->
         </nav>


         <div id="page-wrapper" style="padding-top: 0">
            <div class="container-fluid">
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
         $(document).ready(function(){ 
            $('[data-toggle=tooltip]').tooltip()});
            $("[data-tt=tooltip]").tooltip();
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
