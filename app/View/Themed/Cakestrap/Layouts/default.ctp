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

			echo $this->fetch('css');
			
			echo $this->Html->script('libs/jquery-1.10.2.min');
			echo $this->Html->script('libs/bootstrap.min');
			
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
                <a class="navbar-brand" href="/reinandus/"><?php echo __('Sistema Pós-Graduação')?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                   <!--
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
                   -->
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
           <!--             <li>
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
                        </li>-->
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
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
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>-->
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!--<li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>-->
                   <!-- <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>-->
                    <li>
<a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Cadastros');?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
<li><?php echo $this->Html->link(__('Alunos'),array('controller'=>'Alunos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Professores'),array('controller'=>'Professors','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Cursos'),array('controller'=>'Cursos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Disciplinas'),array('controller'=>'Disciplinas','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Empresas/Pessoas'),array('controller'=>'Pessoas','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Cidades'),array('controller'=>'Cidades','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Contas'),array('controller'=>'Contas','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Formas de Pagamento'),array('controller'=>'FormasPagamentos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Grupos'),array('controller'=>'Grupos','action'=>''));?></li>

                        </ul>
                    </li>
                    <li>
<a href="javascript:;" data-toggle="collapse" data-target="#sec"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Secretaria');?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="sec" class="collapse">
<li><?php echo $this->Html->link(__('Avisos, Materiais e Noticias'),array('controller'=>'Avisos','action'=>'index'));?></li>
<li><?php echo $this->Html->link(__('Contrato Alunos'),array('controller'=>'Contratos',''=>''));?></li>
<li><?php echo $this->Html->link(__('Contrato Professores'),array('controller'=>'Contratos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Notas e Frequencias'),array('controller'=>'NotasFreq','action'=>''));?></li>
                        </ul>
                    </li>
                    <li>
<a href="javascript:;" data-toggle="collapse" data-target="#fin"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Financeiro');?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="fin" class="collapse">
<li><?php echo $this->Html->link(__('Mensalidades'),array('controller'=>'Avisos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Contas a Pagar'),array('controller'=>'Contratos',''=>''));?></li>
<li><?php echo $this->Html->link(__('Gerar Mensalidades'),array('controller'=>'Contratos','action'=>''));?></li>
                        </ul>
                    </li>
                    <li>
<a href="javascript:;" data-toggle="collapse" data-target="#con"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Controladoria');?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="con" class="collapse">
<li><?php echo $this->Html->link(__('Plano de Contas'),array('controller'=>'PlanoDeContas','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Lancamentos'),array('controller'=>'Lancamentos',''=>''));?></li>
                        </ul>
                    </li>
        <li>
<a href="javascript:;" data-toggle="collapse" data-target="#rel"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Relatorios');?><i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="rel" class="collapse">
<li><?php echo $this->Html->link(__('Alunos'),array('controller'=>'Relatorios','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Cursos'),array('controller'=>'Relatorios',''=>''));?></li>
<li><?php echo $this->Html->link(__('Declaracoes'),array('controller'=>'Relatorios',''=>''));?></li>
<li><?php echo $this->Html->link(__('Gerenciamento de Alunos'),array('controller'=>'Relatorios',''=>''));?></li>
<li><?php echo $this->Html->link(__('Mensalidades'),array('controller'=>'Relatorios','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Contas a Pagar'),array('controller'=>'Relatorios',''=>''));?></li>
<li><?php echo $this->Html->link(__('Gerencial'),array('controller'=>'Relatorios','action'=>''));?></li>
            </ul>
        </li>
                    <li>
<a href="javascript:;" data-toggle="collapse" data-target="#cfg"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Configuracoes');?><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="cfg" class="collapse">
<li><?php echo $this->Html->link(__('Parametros'),array('controller'=>'Parametros','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Usuarios'),array('controller'=>'Users',''=>''));?></li>
<li><?php echo $this->Html->link(__('Acessos de Alunos'),array('controller'=>'Acessos','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Permissoes de Usuarios'),array('controller'=>'Permissoes','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Cabecalhos'),array('controller'=>'Cabecalhos',''=>''));?></li>
<li><?php echo $this->Html->link(__('Enumerados'),array('controller'=>'Enumerados','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Estados'),array('controller'=>'Estados','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Instituto'),array('controller'=>'Instituto','action'=>''));?></li>
<li><?php echo $this->Html->link(__('Programas'),array('controller'=>'Programas','action'=>''));?></li>
                        </ul>
                    </li>

                    <!--<li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>-->
                </ul>
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
	</body>

</html>