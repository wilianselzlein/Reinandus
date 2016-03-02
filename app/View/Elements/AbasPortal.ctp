    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
                <li class="active">
                    <a href="#tabAvi" data-toggle="tab" alt="Mural de Avisos"><i class="fa fa-bullhorn fa-4x"></i>&nbsp;</a>
                </li>
                <li >
                    <a href="#tabMat" data-toggle="tab" alt="Materiais do Aluno"><i class="fa fa-download fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabNot" data-toggle="tab" alt="Notas e Frequência"><i class="fa fa-list fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabMen" data-toggle="tab" alt="Controle de Mensalidades"><i class="fa fa-dollar fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabMan" data-toggle="tab" alt="Manual do Aluno"><i class="fa fa-bookmark fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabCon" data-toggle="tab" alt="Convênios e Descontos"><i class="fa fa-cutlery fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabVag" data-toggle="tab" alt="Vagas de Emprego"><i class="fa fa-suitcase fa-4x"></i>&nbsp;</a>
                </li>
                <!--<li>
                    <a href="#tabTcc" data-toggle="tab"></span>Envio <br>de TCC</a>
                </li>-->
                <li>
                    <a href="#tabPro" data-toggle="tab" alt="Protocolo"><i class="fa fa-life-ring fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabFor" data-toggle="tab" alt="Fórum"><i class="fa fa-comments fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabCal" data-toggle="tab" alt="Calendário"><i class="fa fa-calendar fa-4x"></i>&nbsp;</a>
                </li>
                <li>
                    <a href="#tabPes" data-toggle="tab" alt="Pesquisa"><i class="fa fa-star-half-o fa-4x"></i>&nbsp;</a>
                </li>
        </ul>
    	<div class="panel panel-default">
		  <div class="panel-body">
	    	<div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="tabAvi">
<?php echo $this->element('Abas/Avisos'); ?>
				</div>
				<div class="tab-pane" id="tabMat">
<?php echo $this->element('Abas/Materiais'); ?>
                </div>
                <div class="tab-pane" id="tabNot">
<?php echo $this->element('Abas/Notas'); ?>
				</div>
                <div class="tab-pane" id="tabMen">
<?php echo $this->element('Abas/Mensalidades'); ?>
                </div>
                <div class="tab-pane" id="tabMan">
<?php echo $this->element('Abas/Manual'); ?>
                </div>
                <div class="tab-pane" id="tabCon">
<?php echo $this->element('Abas/Convenios'); ?>
                </div>
                <div class="tab-pane" id="tabVag">
<?php echo $this->element('Abas/Vagas'); ?>
                </div>
                <div class="tab-pane" id="tabPro">
<?php echo $this->element('Abas/Protocolo'); ?>
                </div>
                <div class="tab-pane" id="tabTcc">
<?php echo $this->element('Abas/Tcc'); ?>
                </div>
                <div class="tab-pane" id="tabFor">
<?php echo $this->element('Abas/Forum'); ?>
                </div>
                <div class="tab-pane" id="tabPes">
<?php echo $this->element('Abas/Pesquisa'); ?>
                </div>
                <div class="tab-pane" id="tabCal">
<?php echo $this->element('Abas/Calendario'); ?>
                </div>
        	</div>
    	  </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#tabs').tab();
        });
    </script> 
