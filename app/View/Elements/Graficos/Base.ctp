
<div class="panel panel-default">

  <div class="panel-body">  
	<div class="panel panel-default">
	  <div class="panel-heading">
	     <h3 class="panel-title">Alunos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('Graficos/AlunoSituacao');?>
	    <div id="GraficoAlunoSituacao" class="grafico grafico30"></div>
	    <?php echo $this->element('Graficos/AlunoCidade');?>
	    <div id="GraficoAlunoCidade" class="grafico grafico70"></div>
	    <?php echo $this->element('Graficos/AlunoTotal');?>
	    <div id="GraficoAlunoTotal" class="grafico grafico30"></div> 
	    <?php echo $this->element('Graficos/AlunoTcc');?>
	    <div id="GraficoAlunoPendenteMatricula" class="grafico grafico30"></div> 
	    <?php echo $this->element('Graficos/AlunoPendenteMatricula');?>
	    <div id="GraficoAlunoTcc" class="grafico grafico30"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Cursos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('Graficos/CursoAlunos');?>
	    <div id="GraficoCursoAlunos" class="graficovertical grafico100"></div>
	    <?php echo $this->element('Graficos/CursoRentavel');?>
	    <div id="GraficoCursoRentavel" class="graficovertical grafico100"></div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mensalidade</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('Graficos/MensAbertaPagaMensal');?>
	    <div id="GraficoMensAbertaPagaMensal" class="grafico grafico33"></div>
	    <?php echo $this->element('Graficos/MensAbertaPagaSemestral');?>
	    <div id="GraficoMensAbertaPagaSemestral" class="grafico grafico33"></div>
	    <?php echo $this->element('Graficos/MensAbertaPagaAnual');?>
	    <div id="GraficoMensAbertaPagaAnual" class="grafico grafico33"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Contas a Pagar</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('Graficos/AbertaPagaMensal');?>
	    <div id="GraficoPagarAbertaPagaMensal" class="grafico grafico33"></div>
	    <?php echo $this->element('Graficos/PagarAbertaPagaSemestral');?>
	    <div id="GraficoPagarAbertaPagaSemestral" class="grafico grafico33"></div>
	    <?php echo $this->element('Graficos/PagarAbertaPagaAnual');?>
	    <div id="GraficoPagarAbertaPagaAnual" class="grafico grafico33"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Comparativos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('Graficos/ComparativoRecebPagarMes');?>
	    <div id="GraficoComparativoRecebPagarMes" class="grafico grafico50"></div>
	    <?php echo $this->element('Graficos/ComparativoRecebPagarAno');?>
	    <div id="GraficoComparativoRecebPagarAno" class="grafico grafico50"></div>
	    <?php echo $this->element('Graficos/ComparativoRecDespMes');?>
	    <div id="GraficoComparativoRecDespMes" class="grafico grafico50"></div>
	    <?php echo $this->element('Graficos/ComparativoRecDespAno');?>
	    <div id="GraficoComparativoRecDespAno" class="grafico grafico50"></div>
	  </div>
	</div>

  </div>

</div>
<?php echo $this->Html->script('highcharts/highcharts');?>
<?php echo $this->Html->script('highcharts/highcharts-3d');?>
<?php echo $this->Html->script('highcharts/modules/exporting');?>
<?php echo $this->Html->script('highcharts/highcharts-more');?>
