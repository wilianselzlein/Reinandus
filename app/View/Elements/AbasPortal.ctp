<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
    <li class="active">
        <a href="#Avisos" data-toggle="tab" title="Mural de Avisos" data-tt="tooltip"><i class="fa fa-bullhorn fa-4x"></i>&nbsp;</a>
    </li>
    <li >
        <a href="#Materiais" class="" title="Materiais" data-toggle="tab" data-tt="tooltip"><i class="fa fa-download fa-4x"></i></a>
    </li>
    <li>
        <a href="#Notas" data-toggle="tab" title="Notas e Frequência" data-tt="tooltip"><i class="fa fa-list fa-4x"></i>&nbsp;</a>
    </li>
    <li>
        <a href="#Mensalidades" data-toggle="tab" title="Controle de Mensalidades" data-tt="tooltip"><i class="fa fa-dollar fa-4x"></i>&nbsp;</a>
    </li>
    <!--<li>
        <a href="#Manual" data-toggle="tab" title="Manual do Aluno" data-tt="tooltip"><i class="fa fa-book fa-4x"></i>&nbsp;</a>
    </li>-->
    <li>
        <a href="#Convenios" data-toggle="tab" title="Convênios e Descontos" data-tt="tooltip"><i class="fa fa-thumbs-o-up fa-4x"></i>&nbsp;</a>
    </li>
    <li>
        <a href="#Vagas" data-toggle="tab" title="Vagas de Emprego" data-tt="tooltip"><i class="fa fa-suitcase fa-4x"></i>&nbsp;</a>
    </li>
    <!--<li>
        <a href="#Tcc" data-toggle="tab" title="Envio de TCC" data-tt="tooltip"></span>Envio <br>de TCC</a>
    </li>-->
    <li>
        <a href="#Protocolo" data-toggle="tab" title="Protocolo" data-tt="tooltip"><i class="fa fa-envelope-o fa-4x"></i>&nbsp;</a>
    </li>
    <!--<li>
        <a href="#Forum" data-toggle="tab" title="Fórum" data-tt="tooltip"><i class="fa fa-comments fa-4x"></i>&nbsp;</a>
    </li>-->
    <li>
        <a href="#Calendario" data-toggle="tab" title="Calendário" data-tt="tooltip"><i class="fa fa-calendar fa-4x"></i>&nbsp;</a>
    </li>
    <li>
        <a href="#Videos" data-toggle="tab" title="Vídeos" data-tt="tooltip"><i class="fa fa-video-camera fa-4x"></i>&nbsp;</a>
    </li>
    <?php if ($pesquisa_ativa) { ?>
        <li>
            <a href="#Pesquisa" data-toggle="tab" title="Pesquisa" data-tt="tooltip"><i class="fa fa-star-half-o fa-4x"></i>&nbsp;</a>
        </li>
    <?php } ?>
    <!--<li>
        <a href="#Facebook" data-toggle="tab" title="Facebook" data-tt="tooltip"><i class="fa fa-facebook fa-4x"></i>&nbsp;</a>
    </li>-->
</ul>
<div class="panel panel-default">
  <div class="panel-body">
	<div id="my-tab-content" class="tab-content" style="display: table; width: 100%;">
        <div class="tab-pane active" id="Avisos">
<?php echo $this->element('Abas/Avisos'); ?>
		</div>
		<div class="tab-pane" id="Materiais">
<?php echo $this->element('Abas/Materiais'); ?>
        </div>
        <div class="tab-pane" id="Notas">
<?php echo $this->element('Abas/Notas'); ?>
		</div>
        <div class="tab-pane" id="Mensalidades">
<?php echo $this->element('Abas/Mensalidades'); ?>
        </div>
        <!--<div class="tab-pane" id="Manual">
<?php echo $this->element('Abas/Manual'); ?>
        </div>-->
        <div class="tab-pane" id="Convenios">
<?php echo $this->element('Abas/Convenios'); ?>
        </div>
        <div class="tab-pane" id="Vagas">
<?php echo $this->element('Abas/Vagas'); ?>
        </div>
        <div class="tab-pane" id="Protocolo">
<?php echo $this->element('Abas/Protocolo'); ?>
        </div>
        <!--<div class="tab-pane" id="Tcc">
<?php echo $this->element('Abas/Tcc'); ?>
        </div>-->
        <div class="tab-pane" id="Forum">
<?php echo $this->element('Abas/Forum'); ?>
        </div>
        <div class="tab-pane" id="Pesquisa">
<?php echo $this->element('Abas/Pesquisa'); ?>
        </div>
        <div class="tab-pane" id="Calendario">
<?php echo $this->element('Abas/Calendario'); ?>
        </div>
        <div class="tab-pane" id="Videos">
<?php echo $this->element('Abas/Videos'); ?>
        </div>
        <!--<div class="tab-pane" id="Facebook">
<?php echo $this->element('Abas/Facebook'); ?>
        </div>-->
	</div>
  </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#tabs').tab();
    });
</script> 