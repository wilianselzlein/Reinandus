<div class="panel panel-default">

<div class="panel-heading">
            <h3><?php echo __('Importar');?>
            	<small><?php echo __('Registros') ?></small>
				<?php echo $this->ButtonsActions->MakeButtons('Aluno', $this->params['action']); ?>
            </h3>
        </div>
	
	<div class="panel-body">

		<div class="importador form">
		
			<?php echo $this->Form->create('Importador', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'importar')); ?>

				<fieldset>

<?php echo $this->Form->input('Caminho', array('value' => 'D:\\Delphi\\PosGraduacao\\exe\\BANCO.FDB')); ?>

<div id="importados">
	<div class="importar">
		<?php //echo $this->Form->input('Programas', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Estados', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Cidades', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Grupos', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Disciplinas', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('HistoricosPadrao', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('PlanosDeContas', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('FormasDePagamento', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('ContasBancarias', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('EmpresasPessoas', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Usuarios', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Professor', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Cursos', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('CursoDisciplina', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('DisciplinaProfessor', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Avisos', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('AvisoCurso', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Alunos', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Acessos', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Mensalidades', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php //echo $this->Form->input('Parametros', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('AlunoDisciplina', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('AlunoFoto', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Logo', array('type' => 'checkbox')); ?>
	</div>
	<div class="importar">
		<?php echo $this->Form->input('Lancamentos', array('type' => 'checkbox')); ?>
	</div>
</div>

<?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Importar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

				</fieldset>

			<?php echo $this->Form->end(); ?>

<?php echo $this->Html->link('<i class="fa fa-print"></i> Relatório', array('controller' => 'importador', 'action' => 'relatorio'), array('class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Relatório'), 'data-toggle'=>'tooltip')); ?>


		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
