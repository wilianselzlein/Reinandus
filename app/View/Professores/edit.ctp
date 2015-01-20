



<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Professor'); ?>                    <small><?php echo __('Edit') ?></small>


         <div class="btn-group pull-right">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
               <?php echo __('Actions');?> <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
               <li><?php echo $this->Form->postLink('<i class="fa fa-times"></i>'.' '.__('Delete'), array('action' => 'delete', $this->Form->value('Professor.id')), array('escape'=>false), __('Are you sure you want to delete # %s?', $this->Form->value('Professor.id'))); ?></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List') .' '.__('Professores'), array('action' => 'index'),array('escape'=>false)); ?></li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cidades'), array('controller' => 'cidades', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Cidade'), array('controller' => 'cidades', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Cursos'), array('controller' => 'cursos', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Curso'), array('controller' => 'cursos', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Detalhes'), array('controller' => 'detalhes', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '.__('List').' '.__('Users'), array('controller' => 'users', 'action' => 'index'),array('escape'=>false)); ?> </li>
               <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New').' '.__('User'), array('controller' => 'users', 'action' => 'add'),array('escape'=>false)); ?> </li>
            </ul>
         </div>
      </h3>
   </div>




   <div class="panel-body">



      <div class="professores form">

         <?php echo $this->Form->create('Professor', array('role' => 'form', 'class'=>'form-horizontal')); ?>

         <fieldset>

            <div class="form-group">
               <?php echo $this->Form->input('id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('nome', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('endereco', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('numero', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('bairro', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cidade_id', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cep', 
                                             array('class' => 'form-control cep', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fone', 
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fax', 
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('celular', 
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('email', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('emailalt', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cpf', 
                                             array('class' => 'form-control cpf', 'label'=>array('text' => 'CPF', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('rg', 
                                             array('class' => 'form-control', 'label'=>array('text' => 'RG', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
              <?php    echo $this->Form->label(__('notafiscal'), null, array('text' => 'Nota Fiscal', 'class'=>'col-sm-2 control-label')); 
                             echo $this->Form->input('notafiscal', 
                                                  array('type' => 'checkbox', 'class' => 'form-control  checkbox2',                                              
                                                        'before'=>'<div class="col-sm-10">', 
                                                        'after'=>'</div>',
                                                        'div'=>false, 
                                                        'label'=>false, 
                                                        'checked'=>true)); 
                    ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('obs', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('curriculum', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('titulacao', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('resumotitulacao', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('lattes', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
          <div class="form-group">
            <?php    echo $this->Form->label(__('vinculo'), null, array('class'=>'col-sm-2 control-label')); 
                           echo $this->Form->input('vinculo', 
                                                array('type' => 'checkbox', 'class' => 'form-control  checkbox2',                                              
                                                      'before'=>'<div class="col-sm-10">', 
                                                      'after'=>'</div>',
                                                      'div'=>false, 
                                                      'label'=>false, 
                                                      'checked'=>true)); 
                  ?>
          </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('formacao', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
           <div class="form-group">
               <?php echo $this->Form->input('dadosfin', 
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->

            <div class="form-group">
               <?php echo $this->Form->input('Disciplina',array('multiple' => 'checkbox', /*'class' => 'form-control',*/ 'label'=>array('text' => 'Disciplinas', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            );?>
            </div><!-- .form-group -->

            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->


