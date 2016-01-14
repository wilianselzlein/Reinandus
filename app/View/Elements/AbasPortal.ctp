    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
                <li class="active">
                    <a href="#tabAvi" data-toggle="tab">Mural de<br>Avisos</a>
                </li>
                <li >
                    <a href="#tabMat" data-toggle="tab">Materiais <br> do Aluno</a>
                </li>
                <li>
                    <a href="#tabNot" data-toggle="tab"></span>Notas e <br>Frequência</a>
                </li>
                <li>
                    <a href="#tabMen" data-toggle="tab"></span>Controle de <br>Mensalidades</a>
                </li>
                <li>
                    <a href="#tabMan" data-toggle="tab">Manual do <br>Aluno</a>
                </li>
                <li>
                    <a href="#tabCon" data-toggle="tab"></span>Convênios e<br> Descontos<br></a>
                </li>
                <li>
                    <a href="#tabVag" data-toggle="tab"></span>Vagas de <br>Emprego</a>
                </li>
                <li>
                    <a href="#tabPro" data-toggle="tab"></span>Protocolo <br> &nbsp; </a>
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
        	</div>
    	  </div>
        </div>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#tabs').tab();
        });
    </script> 
