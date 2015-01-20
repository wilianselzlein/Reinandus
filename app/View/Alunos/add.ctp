<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Aluno'); ?>                    <small><?php echo __('Add') ?></small>


         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Alunos'), array('action' => 'index'),array('escape'=>false)); ?></li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Detalhes'), array('controller' => 'detalhes', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li class="divider"></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'),array('escape'=>false)); ?> </li>
            </ul>
         </div>
      </h3>
   </div>

   <div class="panel-body">

      <div class="alunos form">

         <?php echo $this->Form->create('Aluno', array('role' => 'form', 'class'=>'form-horizontal')); ?>

         <fieldset>

            <div class="form-group">
               <?php echo $this->Form->input('nome', 
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('nome_pai', 	
                     array('class' => 'form-control', 'label'=>array('text' => 'Pai', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('nome_mae', 	
                     array('class' => 'form-control', 'label'=>array('text' => 'Mãe', 'style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('responsavel_id', 
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-7">', 'after'=>'</div>')); ?>
 				<?php echo $this->Form->input('sexo', 
                     array('class' => 'form-control', 'options' => array('M' => 'M', 'F' => 'F'), 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-2">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('situacao_id', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('formacao', 	
                     array('class' => 'form-control', 'label'=>array('style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('naturalidade_id', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('nacionalidade', 	
                     array('class' => 'form-control', 'label'=>array('text' => 'Nacional.', 'style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('data_nascimento', 	
                     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('estado_civil_id', 	
                     array('class' => 'form-control', 'label'=>array('style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('identidade', 	
                     array('class' => 'form-control', 'label'=>array('text' => 'RG', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('orgao_expedidor', 	
                     array('class' => 'form-control', 'label'=>array('style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('data_expedicao', 	
                     array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('cpf', 	
                     array('class' => 'form-control cpf', 'label'=>array('text' => 'CPF', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('endereco', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('numero', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('bairro', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('cep', 
                     array('class' => 'form-control cep', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cidade_id', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('residencial', 	
                     array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('comercial', 	
                     array('class' => 'form-control dddphone', 'label'=>array('style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
					<?php echo $this->Form->input('celular', 	
                     array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('senha', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('email', 	
                     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('emailalt', 	
                     array('class' => 'form-control', 'label'=>array('style' => 'padding-left: 0px;', 'text' => 'Alternativo', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('bolsa', 
                                             array('class' => 'form-control currency', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-5"><div class="input-group"><span class="input-group-addon">%</span>', 'after'=>'</div></div>')
                                            ); ?>
               <?php echo $this->Form->input('desconto', 
                                             array('class' => 'form-control currency', 'type'=>'text','label'=>array('style' => 'padding-left: 0px;', 'class'=>'col-sm-1 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-4"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')
                                            ); ?>
            </div><!-- .form-group -->
			<?php echo $this->element('AbasCadAlunos'); ?>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
