



    <div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Usuario'); ?>                    <small><?php echo __('Add') ?></small>


                <div class="btn-group pull-right">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <?php echo __('Actions');?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Usuarios'),       array('action' => 'index'),                                    array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Roles'),          array('controller' => 'roles',         'action' => 'index'),   array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Role'),           array('controller' => 'roles',         'action' => 'add'),     array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Permissoes'),     array('controller' => 'permissoes',    'action' => 'index'),   array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Permissao'),      array('controller' => 'permissoes',    'action' => 'add'),     array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Pessoas'),        array('controller' => 'pessoas',       'action' => 'index'),   array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Pessoa'),         array('controller' => 'pessoas',       'action' => 'add'),     array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Mensalidades'),   array('controller' => 'mensalidades',  'action' => 'index'),   array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Mensalidade'),    array('controller' => 'mensalidades',  'action' => 'add'),     array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('List') .' '.__('Avisos'),         array('controller' => 'avisos',        'action' => 'index'),   array('escape'=>false)); ?>   </li>
                        <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Aviso'),          array('controller' => 'avisos',        'action' => 'add'),     array('escape'=>false)); ?>   </li>
                    </ul>
                </div>
            </h3>
        </div>



	
	<div class="panel-body">

		

		<div class="grupos form">
		
			<?php echo $this->Form->create('User', array('role' => 'form', 'class'=>'form-horizontal')); ?>

				<fieldset>					
					<div class="form-group">
						<?php echo $this->Form->input('username',    array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
					<div class="form-group">
						<?php echo $this->Form->input('password',    array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('re-password', array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'type'=>'password')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('pessoa_id',   array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               <div class="form-group">
						<?php echo $this->Form->input('role_id',     array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
					</div><!-- .form-group -->
               
					<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
