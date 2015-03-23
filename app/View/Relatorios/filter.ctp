<style>
    .dashboard-icon
    {
        float:left;
        margin:15px;
        width:10%;
        border:0px solid red;
        -moz-transition:-moz-transform 0.2s ease-in; 
        -webkit-transition:-webkit-transform 0.2s ease-in; 
        -o-transition:-o-transform 0.2s ease-in;           
    }                
    .dashboard-icon img, .dashboard-icon span
    {
        width:100%;
        text-align: center;
        display: block;
    }        
    .dashboard-icon:hover
    {
        -moz-transform:scale(2); 
        -webkit-transform:scale(2);
        -o-transform:scale(2);
    } 
</style>
<style>
    #dynamic-list {
        max-width: 100%;
    }
</style>

<h2><?php echo $relatorio['Relatorio']['nome'];  ?></h2>

<div class="row">
    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Filtros Disponiveis:');?></h3>
            </div>
            <div class="panel-body">
               <?php

//foreach ($relatorioFiltrosDisponiveis as $filtro){
//   debug($filtro['RelatorioFiltro']['campo_alias']);
//}
//debug($relatorioFiltrosDisponiveis);
               ?>
                <select id="dynamic-list" class="form-control">
                   <!--<php foreach ($relatorio['RelatorioDataset'] as $dataset): ?>-->
                     <?php foreach ($relatorioFiltrosDisponiveis as $filtro): ?>
                    <!--@foreach (var filtro in Model.RelatorioFiltro.ToList())
                    {-->
                        <option value='
<?php
   echo "{";
   echo '"Id":'.'"'.$filtro['RelatorioFiltro']['id'].'",'; 
   echo '"Field":'.'"'.$filtro['RelatorioFiltro']['campo'].'",'; 
   echo '"Alias":'.'"'.$filtro['RelatorioFiltro']['campo_alias'].'",'; 
   echo '"Tipo":'.'"'.$filtro['RelatorioFiltro']['tipo_filtro'].'"';
   echo "}";
?>'>    
                           <?php echo h($filtro['RelatorioFiltro']['campo_alias']); ?>
                        </option>
                    <!--<php endforeach; ?>-->
                   <?php endforeach; ?>
                </select>

            </div>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Filtro Selecionado:');?></h3>
            </div>
            <div class="panel-body">
                <form id='formulario' onsubmit='return false;' role='form'>
                    <div id="dynamic-content">
                    </div>
                    <input id="btn-add" type="submit" class="btn btn-default" value="Adicionar filtro">
                </form>
            </div>
        </div>
    </div>
</div>



   <?php echo $this->Form->create('Relatorio',
                                  array('url' => array('action' => 'download', $relatorio['Relatorio']['id'])
                                 )); ?>
    

    <div id="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Filtros Aplicados:');?></h3>
            </div>
            <div id="da-middle" class="panel-body">
                <table class="table table-striped">
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-default" formtarget="_blank">
        <i class="fa fa-eye"></i> Visualizar
    </button>
    <?php /*<div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-default" formtarget="_blank">
                <i class="glyphicon glyphicon-search"></i>Visualizar
            </button>            
        </div>
        <br/>
    </div>*/?>

<?php echo $this->Form->end(); ?>
<?php 
	echo $this->Html->script("libs/PeterXHtmlHelper"); 
	echo $this->Html->script("libs/report-beta"); 
	echo $this->Html->script("cfg-datepicker"); 
?>
