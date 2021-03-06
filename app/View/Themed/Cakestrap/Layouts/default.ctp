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
      <?php echo $cakeDescription; ?>: <?php echo $title_for_layout; ?>
   </title>
   <?php
   echo $this->Html->meta('icon');
   echo $this->fetch('meta');
   echo $this->Html->css('bootstrap.min');
   
   echo $this->Html->css('sb-admin');
   echo $this->Html->css('bootstrap-dialog');
   echo $this->Html->css('datepicker3');
   echo $this->Html->css('bootstrap-datetimepicker');
   echo $this->Html->css('font-awesome.min');
   echo $this->Html->css('bootstrap-combobox');

   echo $this->fetch('css');
   echo $this->Html->script('libs/jquery-2.1.4.min');
   echo $this->Html->script('libs/bootstrap.min');
   echo $this->Html->script('libs/bootstrap-dialog');   
   echo $this->Html->script('libs/bootstrap-datepicker');
   echo $this->Html->script('libs/bootstrap-datetimepicker');
   echo $this->Html->script('libs/locales/bootstrap-datetimepicker.pt-BR');
   echo $this->Html->script('libs/locales/bootstrap-datepicker.pt-BR');
   echo $this->Html->script('libs/jquery.mask');
   echo $this->Html->script('libs/jquery.jeditable.mini');
   echo $this->Html->script('libs/bootstrap-combobox');
   echo $this->Html->script('libs/datetimepicker');
   echo $this->Html->script('datetimepicker');
   echo $this->fetch('script');
   ?>
   <script type="text/javascript">
      function __loadMostra(){
        var objLoader = document.getElementById("carregador_pai");
        objLoader.style.display = "block";
        objLoader.style.visibility = "visible";
      }
   </script>
</head>

<body>
   <div id="carregador_pai" style="display: none; visibility: hidden;">
      <br/><br/><br/>
      <?php echo $this->Html->image('carregando.gif'); ?>
   </div>
   <div id="wrapper">
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <a href="#" class="navbar-brand" id="fechar_menu" title="Esconder menu" data-tt="tooltip" data-placement="right"><b>&larr;</b></a>
            <a href="#" class="navbar-brand" id="mostrar_menu" title="Mostrar menu" data-tt="tooltip" data-placement="right"><b>&rarr;</b></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <?php if (isset($nome_sistema)) echo $this->Html->Link($nome_sistema, array('controller' => 'Pages', 'action' => 'display'), array('class' => 'navbar-brand')); ?>
         </div>
         <!-- Top Menu Items -->
         <ul class="nav navbar-right top-nav">
            <?php if ($usuario_logado['username'] == 'Master') { ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Monitoramento" data-tt="tooltip" data-placement="left"><i class="fa fa-bug"></i> <b class="caret"></b></a>
               <ul class="dropdown-menu message-dropdown">
                  <li class="message-footer">
                     <?php echo $this->Html->link('<i class="fa fa-fw fa-bug"></i>'.' Monitoramento', 
                     array('controller' => 'Monitoramentos', 'action' => 'index'), array('class' => '', 'escape'=>false)); ?>
                  </li>
               </ul>
            </li>
            <?php } ?>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Últimos alunos cadastrados" data-tt="tooltip" data-placement="down"><i class="fa fa-male"></i> <b class="caret"></b></a>
               <ul class="dropdown-menu message-dropdown">
                  <li class="message-preview">
                     <?php echo $this->Html->link('<i class="fa fa-fw fa-male"></i>'.' Ir para o espaço dos '.__('Alunos'), 
                     array('controller' => 'aluno', 'action' => 'portal'), array('class' => '', 'escape'=>false)); ?>
                  </li>
                  <?php echo $this->UltimosAlunosCadastrados->GerarLista(); ?>
               </ul>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Recados internos" data-tt="tooltip" data-placement="left"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
               <ul class="dropdown-menu message-dropdown">
                  <?php echo $this->UltimosAvisosDoUsuario->GerarLista($usuario_logado['id']); ?>
                  <li class="message-footer">
                     <?php echo $this->Html->link('<i class="fa fa-fw fa-comment"></i>'.' Ir para '.__('Avisos'), 
                     array('controller' => 'avisos', 'action' => 'index'), array('class' => '', 'escape'=>false)); ?>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notificações" data-tt="tooltip" data-placement="left"><i class="fa fa-bell"></i> <b class="caret"></b></a>
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Perfil" data-tt="tooltip" data-placement="left"><i class="fa fa-user"></i> 
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
                  <?php echo $this->element('subir'); ?>
                  <?php echo $this->element('sql_dump'); ?>
               </div><!-- /#content .container -->
            </div>

            <div id="footer" class="container">
               <?php //Silence is golden ?>

            </div><!-- /#footer .container -->

   </div><!-- /#main-container -->
   <script>
      $(document).ready(function(){ 
         $('[data-tt=tooltip]').tooltip();
         $('[data-toggle=tooltip]').tooltip();
      });
      $("[data-tt=tooltip]").tooltip();
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