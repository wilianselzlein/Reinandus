    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
                <li class="active">
                    <a href="#tabCurs" data-toggle="tab"><i class="fa fa-graduation-cap"></i>&nbsp;Curso</a>
                </li>
                <li >
                    <a href="#tabIndi" data-toggle="tab"><i class="fa fa-comments"></i>&nbsp;Indica&ccedil;&atilde;o</a>
                </li>
                <li>
                    <a href="#tabDocs" data-toggle="tab"><i class="fa fa-newspaper-o"></i></span>&nbsp;Documentos</a>
                </li>
                <li>
                    <a href="#tabBloq" data-toggle="tab"><i class="fa fa-lock"></i></span>&nbsp;Bloqueio</a>
                </li>
                <li>
                    <a href="#tabMono" data-toggle="tab"><i class="fa fa-file-text-o"></i>&nbsp;Monografia</a>
                </li>
        </ul>
    	<div class="panel panel-default">
		  <div class="panel-body">
	    	<div id="my-tab-content" class="tab-content">
                <div class="tab-pane active" id="tabCurs">
		            <div class="form-group">
		               <?php echo $this->Form->input('curso_id',
		                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
		            </div><!-- .form-group -->
					<div class="form-group">
					   <?php echo $this->Form->input('curso_inicio',
					         array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Início', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
					   <?php echo $this->Form->input('curso_fim',
					         array('type' => 'text', 'class' => 'form-control datepicker-end', 'label'=>array('text' => 'Fim', 'class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->

				</div>
				<div class="tab-pane" id="tabIndi">
					<div class="form-group">
					   	<?php echo $this->Form->input('indicacao_id',
					         array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-6">', 'after'=>'</div>')); ?>
          				<?php echo $this->Form->input('indicacao_valor',
                                             array('class' => 'form-control currency', 'type'=>'text','label'=>array('text' => 'Valor', 'class'=>'col-sm-1 control-label'), 'div'=>false,'wrap'=>false, 'between'=>'<div class="col-sm-3"><div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div></div>')
                                            ); ?>
					</div><!-- .form-group -->
					<div class="form-group">
					   <?php echo $this->Form->input('indicacao_nome',
					         array('class' => 'form-control', 'label'=>array('text' => 'Nome', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-6">', 'after'=>'</div>')); ?>
						<?php echo $this->Form->label(__('Pago'), null, array('text' => 'Pago', 'class'=>'col-sm-1 control-label'));
		                   echo $this->Form->input('indicacao_pago',
		                            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
		                                  'before'=>'<div class="col-sm-2" align="right">',
		                                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
					</div><!-- .form-group -->
                </div>
                <div class="tab-pane" id="tabDocs">
		            <div class="form-group">
						<?php echo $this->Form->label(__('entregou_diploma'), null,
								array('class'=>'col-sm-1 control-label', 'style' => 'width: 250px;'));
						   echo $this->Form->input('entregou_diploma',
						            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
						                  'before'=>'<div class="col-sm-3" align="center" style="width: 50px;">',
						                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
						<?php echo $this->Form->label(__('emitir_carteirinha'), null,
								array('text' => 'Emitir Carteira', 'class'=>'col-sm-1 control-label', 'style' => 'width: 250px;'));
						   echo $this->Form->input('emitir_carteirinha',
						            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
						                  'before'=>'<div class="col-sm-3" align="center" style="width: 50px;">',
						                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
		            </div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->label(__('entregou_cpf'), null,
								array('class'=>'col-sm-1 control-label', 'style' => 'width: 250px;'));
						   echo $this->Form->input('entregou_cpf',
						            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
						                  'before'=>'<div class="col-sm-3" align="center" style="width: 50px;">',
						                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
						<?php echo $this->Form->label(__('entregou_rg'), null,
								array('class'=>'col-sm-1 control-label', 'style' => 'width: 250px;'));
						   echo $this->Form->input('entregou_rg',
						            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
						                  'before'=>'<div class="col-sm-3" align="center" style="width: 50px;">',
						                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
					</div><!-- .form-group -->
					<div class="panel panel-default">
						<div class="panel-heading">Certificado:</div>
							<div class="panel-body">
								<div class="form-group">
								   <?php echo $this->Form->input('cert_solicitado',
								         array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Solicitado', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
								   <?php echo $this->Form->input('cert_entrega',
								         array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Entregue', 'class'=>'col-sm-1 control-label', 'style' => 'padding-left: 0px;'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
								</div><!-- .form-group -->
							</div>
						</div>

				</div>
                <div class="tab-pane" id="tabBloq">
		            <div class="form-group">
		               <?php echo $this->Form->input('bloqueado_data',
		                     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Data', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
		            </div><!-- .form-group -->
		            <div class="form-group">
		             <?php echo $this->Form->label(__('bloqueado'), null, array('class'=>'col-sm-2 control-label'));
		                   echo $this->Form->input('bloqueado',
		                            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
		                                  'before'=>'<div class="col-sm-2">',
		                                  'after'=>'</div>', 'div'=>false, 'label'=>false, 'checked'=>true)); ?>
		            </div><!-- .form-group -->
                </div>
                <div class="tab-pane" id="tabMono">
		            <div class="form-group">
		               <?php echo $this->Form->input('professor_id',
		                     array('class' => 'form-control combobox', 'label'=>array('text' => 'Coordenador', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
		            </div><!-- .form-group -->
					<div class="form-group">
					   <?php echo $this->Form->input('mono_titulo',
					         array('class' => 'form-control', 'label'=>array('text' => 'Título', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
					   <?php echo $this->Form->input('mono_data',
					         array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Data', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
					   <?php echo $this->Form->input('mono_prazo',
					         array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('text' => 'Prazo', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
					   <?php echo $this->Form->input('mono_nota',
					         array('class' => 'form-control', 'label'=>array('text' => 'Nota', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->

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
