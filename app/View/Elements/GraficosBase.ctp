<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<div class="panel panel-default">

  <div class="panel-body">  
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Alunos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoAlunoSituacao');?>
	    <div id="GraficoAlunoSituacao" style="float: left; height: 200px; width: 29%;"></div>
	    <?php echo $this->element('GraficoAlunoCidade');?>
	    <div id="GraficoAlunoCidade" style="float: left; height: 200px;width: 69%;"></div>
	    <?php echo $this->element('GraficoAlunoTotal');?>
	    <div id="GraficoAlunoTotal" style="float: left; height: 200px; width: 29%;"></div> 
	    <?php echo $this->element('GraficoAlunoPorAno');?>
	    <div id="GraficoAlunoPorAno" style="float: left; height: 200px; width: 69%;"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Cursos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoCursoAlunos');?>
	    <div id="GraficoCursoAlunos" style="float: left; height: 200px; width: 49%;"></div>
	    <?php echo $this->element('GraficoCursoRentavel');?>
	    <div id="GraficoCursoRentavel" style="float: left; height: 200px;width: 49%;"></div>
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mensalidade</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoMensAbertaPagaMensal');?>
	    <div id="GraficoMensAbertaPagaMensal" style="float: left; height: 200px; width: 33%;"></div>
	    <?php echo $this->element('GraficoMensAbertaPagaSemestral');?>
	    <div id="GraficoMensAbertaPagaSemestral" style="float: left; height: 200px;width: 33%;"></div>
	    <?php echo $this->element('GraficoMensAbertaPagaAnual');?>
	    <div id="GraficoMensAbertaPagaAnual" style="float: left; height: 200px; width: 33%;"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Contas a Pagar</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoPagarAbertaPagaMensal');?>
	    <div id="GraficoPagarAbertaPagaMensal" style="float: left; height: 200px; width: 33%;"></div>
	    <?php echo $this->element('GraficoPagarAbertaPagaSemestral');?>
	    <div id="GraficoPagarAbertaPagaSemestral" style="float: left; height: 200px;width: 33%;"></div>
	    <?php echo $this->element('GraficoPagarAbertaPagaAnual');?>
	    <div id="GraficoPagarAbertaPagaAnual" style="float: left; height: 200px; width: 33%;"></div> 
	  </div>
	</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Comparativos</h3>
	  </div>
	  <div class="panel-body">
	    <?php echo $this->element('GraficoComparativoRecebPagarMes');?>
	    <div id="GraficoComparativoRecebPagarMes" style="float: left; height: 200px; width: 49%;"></div>
	    <?php echo $this->element('GraficoComparativoRecebPagarAno');?>
	    <div id="GraficoComparativoRecebPagarAno" style="float: left; height: 200px;width: 49%;"></div>
	    <?php echo $this->element('GraficoComparativoRecDespMes');?>
	    <div id="GraficoComparativoRecDespMes" style="float: left; height: 200px; width: 49%;"></div>
	    <?php echo $this->element('GraficoComparativoRecDespAno');?>
	    <div id="GraficoComparativoRecDespAno" style="float: left; height: 200px;width: 49%;"></div>
	  </div>
	</div>

  </div>

</div>

<script src="/reinandus/js/highcharts/highcharts.js"></script>
<script src="/reinandus/js/highcharts/highcharts-3d.js"></script>
<script src="/reinandus/js/highcharts/modules/exporting.js"></script>
<script src="/reinandus/js/highcharts/highcharts-more.js"></script>
