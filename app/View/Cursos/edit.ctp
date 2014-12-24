



<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Curso'); ?>                    
         <small><?php echo __('Edit') ?></small>


         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete'), array('action' => 'delete', $this->Form->value('Curso.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value('Curso.id'))); ?></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Cursos'), array('action' => 'index'),array('escape'=>false)); ?></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Alunos'), array('controller' => 'alunos', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Aluno'), array('controller' => 'alunos', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Pessoas'), array('controller' => 'pessoas', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Pessoa'), array('controller' => 'pessoas', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Professors'), array('controller' => 'professors', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Professor'), array('controller' => 'professors', 'action' => 'add'),array('escape'=>false)); ?> </li>
            </ul>
         </div>
      </h3>
   </div>




   <div class="panel-body">



      <div class="cursos form">

         <?php echo $this->Form->create('Curso', array('role' => 'form', 'class'=>'form-horizontal')); ?>

         <fieldset>

            <div class="form-group">
               <?php echo $this->Form->input('id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('nome', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('turma', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('num_turma', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sigla', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('carga', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('pessoa_id', 
                                             array('class' => 'form-control', 'label'=>array('text' => 'Secretaria', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('professor_id', 
                                             array('class' => 'form-control', 'label'=>array('Coordenador', 'class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('horario', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('valor', 
                                             array('class' => 'form-control currency', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('percentual', 
                                             array('class' => 'form-control percentage', 'type'=>'text','label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('desconto', 
                                             array('class' => 'form-control currency','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('liquido', 
                                             array('class' => 'form-control currency','type'=>'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="input-group"><span class="input-group-addon">R$</span>', 'after'=>'</div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('dia_vencimento', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10"><div class="input-group">', 'after'=>'<span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('inicio', 
                                             array('type' => 'text', 'class' => 'form-control datepicker-start', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fim', 
                                             array('type' => 'text', 'class' => 'form-control datepicker-end', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('sistema_aval', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('criterios_aval', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('grupo_id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('tipo_id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('periodo_id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="panel panel-default">
               <div class="panel-heading"><i class="fa fa-link"></i> Links</div>
               <div class="panel-body">
                  <div class="form-group">
                     <?php echo $this->Form->input('site', 
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('monografia', 
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('aviso', 
                                                   array('type' => 'text', 'class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
                  <div class="form-group">
                     <?php echo $this->Form->input('calendario', 
                                                   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                                  ); ?>
                  </div><!-- .form-group -->
               </div>
            </div>
            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
