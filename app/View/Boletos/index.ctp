<div class="panel panel-default">

	<div class="panel-heading">
        <h3><?php echo __('Remessa/Retorno');?>
        	<small><?php echo __('Integração bancária') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons('Mensalidade', $this->params['action']); ?>
        </h3>
    </div>
	
	<div class="panel-body">
    	<div id="content">
				<ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
	                <li class="active">
	                    <a href="#tabRem" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Remessa</a>
	                </li>
	                <li >
	                    <a href="#tabRet" data-toggle="tab"><i class="fa fa-comments"></i>&nbsp;Retorno</a>
	                </li>
		        </ul>
		        
				<div class="panel panel-default">
				  <div class="panel-body">
			    	<div id="my-tab-content" class="tab-content">
		                <div class="tab-pane active" id="tabRem">
							<div class="boletos form">
								<?php echo $this->Form->create('Boleto', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'gerar')); ?>
								<fieldset>
									<div class="form-group" id="cursos">
								       <?php echo $this->Form->input('Curso',array('multiple' => 'checkbox', 'class' => 'col-sm-10', 'label'=>array('text' => 'Cursos', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
								                                    );?>
								    </div><!-- .form-group -->
									<div class="form-group" id="disciplinas">
								       <?php echo $this->Form->input('Disciplina',array('multiple' => 'checkbox', 'class' => 'col-sm-10', 'label'=>array('text' => 'Disciplinas', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="	">', 'after'=>'</div>')
								                                    );?>
								    </div><!-- .form-group -->
									<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Gerar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
								
								</fieldset>
								<?php echo $this->Form->end(); ?>
							</div><!-- /.form -->
						</div>
		                <div class="tab-pane" id="tabRet">
							<div class="boletos form">
								<?php echo $this->Form->create('Boleto', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'retorno')); ?>
								<fieldset>
									<div class="form-group" id="cursos">
								       <?php echo $this->Form->input('Curso',array('multiple' => 'checkbox', 'class' => 'col-sm-10', 'label'=>array('text' => 'Cursos', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
								                                    );?>
								    </div><!-- .form-group -->
									<div class="form-group" id="disciplinas">
								       <?php echo $this->Form->input('Disciplina',array('multiple' => 'checkbox', 'class' => 'col-sm-10', 'label'=>array('text' => 'Disciplinas', 'class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="	">', 'after'=>'</div>')
								                                    );?>
								    </div><!-- .form-group -->
									<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Processar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
								</fieldset>
								<?php echo $this->Form->end(); ?>
							</div><!-- /.form -->
						</div>
		    	  </div>
		        </div>
		    </div>
	    </div>
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#tabs').tab();
        });
    </script>
