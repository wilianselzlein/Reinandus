
<div class="panel panel-default">

  <div class="panel-body">  
	<div class="panel panel-default">
	  <div class="panel-heading">
	     <h3 class="panel-title">Alunos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoAlunoSituacao');?>
	    <div id="GraficoAlunoSituacao" class="grafico grafico30"></div>
	    <?php echo $this->element('GraficoAlunoCidade');?>
	    <div id="GraficoAlunoCidade" class="grafico grafico70"></div>
	    <?php echo $this->element('GraficoAlunoTotal');?>
	    <div id="GraficoAlunoTotal" class="grafico grafico30"></div> 
	    <?php echo $this->element('GraficoAlunoPorAno');?>
	    <div id="GraficoAlunoPorAno" class="grafico grafico70"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Cursos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoCursoAlunos');?>
	    <div id="GraficoCursoAlunos" class="grafico grafico50"></div>
	    <?php echo $this->element('GraficoCursoRentavel');?>
	    <div id="GraficoCursoRentavel" class="grafico grafico50"></div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mensalidade</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoMensAbertaPagaMensal');?>
	    <div id="GraficoMensAbertaPagaMensal" class="grafico grafico33"></div>
	    <?php echo $this->element('GraficoMensAbertaPagaSemestral');?>
	    <div id="GraficoMensAbertaPagaSemestral" class="grafico grafico33"></div>
	    <?php echo $this->element('GraficoMensAbertaPagaAnual');?>
	    <div id="GraficoMensAbertaPagaAnual" class="grafico grafico33"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Contas a Pagar</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoPagarAbertaPagaMensal');?>
	    <div id="GraficoPagarAbertaPagaMensal" class="grafico grafico33"></div>
	    <?php echo $this->element('GraficoPagarAbertaPagaSemestral');?>
	    <div id="GraficoPagarAbertaPagaSemestral" class="grafico grafico33"></div>
	    <?php echo $this->element('GraficoPagarAbertaPagaAnual');?>
	    <div id="GraficoPagarAbertaPagaAnual" class="grafico grafico33"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Comparativos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoComparativoRecebPagarMes');?>
	    <div id="GraficoComparativoRecebPagarMes" class="grafico grafico50"></div>
	    <?php echo $this->element('GraficoComparativoRecebPagarAno');?>
	    <div id="GraficoComparativoRecebPagarAno" class="grafico grafico50"></div>
	    <?php echo $this->element('GraficoComparativoRecDespMes');?>
	    <div id="GraficoComparativoRecDespMes" class="grafico grafico50"></div>
	    <?php echo $this->element('GraficoComparativoRecDespAno');?>
	    <div id="GraficoComparativoRecDespAno" class="grafico grafico50"></div>
	  </div>
	</div>

  </div>

</div>
<?php echo $this->Html->script('highcharts/highcharts');?>
<?php echo $this->Html->script('highcharts/highcharts-3d');?>
<?php echo $this->Html->script('highcharts/modules/exporting');?>
<?php echo $this->Html->script('highcharts/highcharts-more');?>
