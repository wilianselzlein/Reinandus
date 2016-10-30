<div class="panel panel-default">
	<div class="panel-heading">
		<h3><?php echo __('Conta'); ?>                        <small><?php echo __('Edit') ?></small>
			<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
		</h3>
	</div>
	<div class="panel-body">
		<div class="conta form">
			<?php echo $this->Form->create('Contum', array('role' => 'form', 'class'=>'form-horizontal')); ?>
			<fieldset>
				<div class="form-group">
					<?php echo $this->Form->input('banco',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label', 'text' => 'Descrição'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php
						$insideAgenciaDigito = $this->Form->input('agencia_dig', array('class' => 'form-control', 'label'=>false, 'wrap'=>false ,'div'=>false, 'between'=>'<div class="col-sm-2">', 'after'=>'</div>'));
						$insideAgenciaDigito .= '</div>';
						
						echo $this->Form->input('agencia',
							array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap' =>array('class'=>'col-sm-8'), 'between'=>'<div class="col-sm-10">', 'after'=>$insideAgenciaDigito)
							); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php
						$insideContaDigito =  $this->Form->input('conta_dig', array('class' => 'form-control', 'label'=>false, 'div'=>false, 'wrap' => false,'between'=>'<div class="col-sm-2">', 'after'=>'</div>' ));
						$insideContaDigito .= '</div>';
						
						echo $this->Form->input('conta',
							array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap' =>array('class'=>'col-sm-8'), 'between'=>'<div class="col-sm-10">', 'after'=>$insideContaDigito)
							);  ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('contato',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('email',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('fone',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('fax',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('celular',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('nome_no_banco',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('num_banco',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<div class="form-group">
					<?php
						$insideCendenteDigito =  $this->Form->input('cedente_dig', array('class' => 'form-control', 'label'=>false, 'div'=>false, 'wrap' => false,'between'=>'<div class="col-sm-2">', 'after'=>'</div>' ));
						$insideCendenteDigito .= '</div>';
						
						echo $this->Form->input('cedente',
							array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'wrap' =>array('class'=>'col-sm-8'), 'between'=>'<div class="col-sm-10">', 'after'=>$insideCendenteDigito)
							);  ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('carteira',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('dia_emissao',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('dia_multa',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('dia_desconto',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('aceite',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('mensagem',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mensagem1',
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('formapgto_id',
						array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<div class="form-group">
					<?php echo $this->Form->input('tipo', 
						array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'<br><br>(N)ormal - (I)nativa - (P)adrão</div>')
						); ?>
				</div>
				<!-- .form-group -->
				<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
			</fieldset>
			<?php echo $this->Form->end(); ?>
		</div>
		<!-- /.form -->
	</div>
	<!-- /#page-content .col-sm-9 -->
</div>
<!-- /#page-container .row-fluid -->