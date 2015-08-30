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

<div class="panel panel-default">
   <div class="panel-heading">
      <h3>
         <span class="fa <?php echo __($relatorio['Relatorio']['icone']);?>"></span> <?php echo __($relatorio['Relatorio']['nome']);?>
         <?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], 'index'); ?>
      </h3>
   </div>
</div>

<div class="row">
   <div class="col-xs-6">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h2 class="panel-title"><?php echo __('Filtros Disponiveis:');?></h2>
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
               <?php foreach ($relatorioFiltrosDisponiveis as $filtro): 
$tipo = $filtro['RelatorioFiltro']['tipo_filtro'] - 50;
$isObrigatorio = $filtro['RelatorioFiltro']['is_obrigatorio'] == '1' ? 'true' : 'false';
$campoObrigatorioPrefix = $isObrigatorio == 'true' ? '* ' : '';
               ?>
               <!--@foreach (var filtro in Model.RelatorioFiltro.ToList())
{-->
               <option value='
                              <?php
                                 echo "{";
                                 echo '"Id":'.'"'.$filtro['RelatorioFiltro']['id'] .'",'; 
                                 echo '"Field":'.'"'.$filtro['RelatorioFiltro']['campo'].'",'; 
                                 echo '"Alias":'.'"'.$campoObrigatorioPrefix.$filtro['RelatorioFiltro']['campo_alias'].'",'; 
                                 echo '"Tipo":'.'"'.$tipo.'",';
                                 echo '"Modelo":'.'"'.$filtro['RelatorioFiltro']['modelo'].'",';
                                 echo '"Obrigatorio":'.'"'.$isObrigatorio.'"'; 
                                 echo "}";
                              ?>'>
                  <?php echo h($campoObrigatorioPrefix.$filtro['RelatorioFiltro']['campo_alias']); ?>
               </option>
               <!--<php endforeach; ?>-->
               <?php endforeach; ?>
            </select>

         </div>
         <script>
            function checkForm(){
               //var options = jQuery.parseJSON($('#dynamic-list option').e());
               var _filtrosObrigatorios = [];                

               $('#dynamic-list option').each(function(){
                  var testeCampo = jQuery.parseJSON($(this).val());
                  if(testeCampo.Obrigatorio == "true"){
                     _filtrosObrigatorios.push(testeCampo.Tipo+','+testeCampo.Field);              
                  }
               });

               var _filtrosSelecionados = [];

               $('#da-middle input').each(function(){ 
                  _filtrosSelecionados.push($(this).attr('name'));
               });

               var camposObrigatoriosPreenchidos = true;

               for(var i = 0, len = _filtrosObrigatorios.length; i < len; ++i) {
                  if(jQuery.inArray( _filtrosObrigatorios[i] , _filtrosSelecionados ) > -1){                                      //camposObrigatoriosPreenchidos = true;
                     //alert(_filtrosObrigatorios[i]);                  
                  }
                  else
                  {
                     camposObrigatoriosPreenchidos = false;
                  }

                  if(!camposObrigatoriosPreenchidos){
                     alert('Campos obrigatórios não preenchidos!');
                     return false;
                  }else{
                     //alert('Filtros Ok!');
                  }
               }               
            }

            //$('#my-form').valid();
         </script>

      </div>
   </div>
   <div class="col-xs-6">
      <div class="panel panel-default">
         <div class="panel-heading">
            <h2 class="panel-title"><?php echo __('Filtro Selecionado:');?></h2>
         </div>
         <div class="panel-body">
            <form id='formulario' onsubmit='return false;' role='form'>
               <div id="dynamic-content">
               </div>
               <input id="btn-add" type="submit" class="btn btn-default" value="Adicionar filtro" >
            </form>
         </div>
      </div>
   </div>
</div>



<?php echo $this->Form->create('Relatorio', array('url' => array('action' => 'download', $relatorio['Relatorio']['id']), 'onsubmit'=>'return checkForm();')); ?>


<div id="row">
   <div class="panel panel-default">
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
