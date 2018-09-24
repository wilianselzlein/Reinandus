<div class="panel panel-default">
   <div class="panel-heading">
      <h3><span class="fa fa-copy"></span>&nbsp;<?php echo __('Contrato'); ?>
         <small><?php echo __('Gerenciar') ?></small>
         <?php echo $this->ButtonsActions->MakeButtons('Mensalidades', 'add'); ?>
      </h3>
   </div>
   <div class="panel-body">
      <div class="Contrato form">
            
            <div class="list-group">
               <?php 
                  $modelos = $this->Contratos->PegarArquivosDeModelos('');
                  asort($modelos);
               ?>
               <?php foreach ($modelos as $modelo): ?>
                  <a href="/contratos/<?php echo basename($modelo); ?>" class="list-group-item"><?php echo $modelo; ?></a>
               <?php endforeach; ?>
            </div>

            <div class="panel panel-default">
              <div class="panel-body">
              	   	<h4>Enviar novo contrato: </h4>
            			<?php echo $this->Form->create('Cabecalho', array('role' => 'form', 'class'=>'form-horizontal','enctype' => 'multipart/form-data')); ?>
            
            				<fieldset>
            
            				<div class="form-group">
               			   <?php echo $this->Form->input('arquivo', array('type' => 'file','class' => 'form-control', 
            				      'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
                        </div>
            
         					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Enviar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
            
            				</fieldset>
            
            			<?php echo $this->Form->end(); ?>
            		
                  </div><!-- /.form -->
               </div>
            </div>
   </div><!-- /#page-content .col-sm-9 -->
</div><!-- /#page-container .row-fluid -->