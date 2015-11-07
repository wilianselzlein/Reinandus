<div class="panel panel-default ">
   <div class="panel-heading">
      <h2><?php echo __('Pessoa'); ?>                <small><?php echo __('View'); ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h2>
   </div>

   <div class="pessoas view pandel-body">
      <?php echo $this->Form->create('Pessoa', array('role' => 'form', 'class'=>'form-horizontal'));
$hidden = "";
if($pessoa['Pessoa']['pessoa'] == 'F'){
   $hidden = "hidden";
}
      ?>
      <div class="table-responsive">
         <table class="table table-hover table-condensed">
            <tbody>
               <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['id']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Pessoa'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['pessoa']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('Fantasia'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['fantasia']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Razaosocial'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['razaosocial']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Endereco'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['endereco']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Numero'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['numero']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['bairro']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
                  <td>
                     <?php echo $this->Html->link($pessoa['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $pessoa['Cidade']['id']), array('class' => '')); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['cep']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Fone'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['fone']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Fax'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['fax']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Celular'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['celular']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['email']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Emailalt'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['emailalt']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Site'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['site']); ?>
                     &nbsp;
                  </td>
               </tr>

               <tr>		<td><strong><?php echo __('Cnpjcpf'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['cnpjcpf']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Resumo'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['resumo']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Obs'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['obs']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Empresa'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['empresa']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Contato'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['contato']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('IE'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['ie']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('IM'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['im']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('Orgao'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['orgao']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('Orgaonum'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['orgaonum']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Ramo'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['ramo']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Secundario'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['secundario']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">	<td><strong><?php echo __('Fundacao'); ?></strong></td>
                  <td>
                     <?php echo date('d/m/Y', strtotime($pessoa['Pessoa']['fundacao'])); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">		<td><strong><?php echo __('Juntacomercial'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['juntacomercial']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr class=" <?php echo $hidden;?>">    <td><strong><?php echo __('Desconto'); ?></strong></td>
                  <td>
                     <?php echo h($pessoa['Pessoa']['desconto']); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                  <td>
                     <?php echo date('d/m/Y H:i:s', strtotime($pessoa['Pessoa']['created'])); ?>
                     &nbsp;
                  </td>
               </tr>
               <tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                  <td>
                     <?php echo date('d/m/Y H:i:s', strtotime($pessoa['Pessoa']['modified'])); ?>
                     &nbsp;
                  </td>
               </tr>					</tbody>
         </table><!-- /.table table-striped table-bordered -->
      </div><!-- /.table-responsive -->

   </div><!-- /.view -->
<?php echo $this->element('ViewRelatedsCursos', array('array' => $cursos)); ?>
<?php echo $this->element('ViewRelatedsUsuarios', array('array' => $usuarios)); ?>

</div><!-- /#page-container .row-fluid -->