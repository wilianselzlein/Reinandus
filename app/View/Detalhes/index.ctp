<style>
   .modal-open {
      overflow: auto;
   }  
   .modal-dialog{
      margin-top: 30px;
   }
   #lightbox .modal-content {
      display: inline-block;
      text-align: center;   
   }

   #lightbox .close {
      opacity: 1;
      color: rgb(255, 255, 255);
      background-color: rgb(25, 25, 25);
      padding: 5px 8px;
      border-radius: 30px;
      border: 2px solid rgb(255, 255, 255);
      position: absolute;
      top: -15px;
      right: -55px;

      z-index:1032;
   }
   .thumbnail:hover{
      text-decoration: none;
      -webkit-transition: all 1s ease-in-out;
      -moz-transition: all 1s ease-in-out;
      -o-transition: all 1s ease-in-out;
      -ms-transition: all 1s ease-in-out;
      transition: all 1s ease-in-out;

      -webkit-animation-direction: normal;
      -webkit-animation-duration: 2s;
      -webkit-animation-iteration-count: infinite;
      -webkit-animation-name: blink;
      -webkit-animation-timing-function: ease-in-out;   
   }
   @-webkit-keyframes 'blink' {
      0% {
         opacity:1;
      }
      50% {
         opacity:0;
      }
      100% {
         opacity:1;
      }
   }
</style>
<div class="panel panel-default">

	<div class="panel-heading"><h3><span class="fa fa-info"></span> <?php echo __('Detalhes'); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('aluno_id'); ?></th>
							<th><?php echo $this->Paginator->sort('foto'); ?></th>
							<th><?php echo $this->Paginator->sort('ocorrencias'); ?></th>
							<th><?php echo $this->Paginator->sort('hist_escolar'); ?></th>
							<th><?php echo $this->Paginator->sort('neg_financeira'); ?></th>
							<th><?php echo $this->Paginator->sort('egresso'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($detalhes as $detalhe): ?>
	<tr>
		<td><?php echo h($detalhe['Detalhe']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalhe['Aluno']['nome'], array('controller' => 'alunos', 'action' => 'view', $detalhe['Aluno']['id'])); ?>
		</td>
		<td>
          <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
            <?php echo $this->Html->image('detalhes/thumbs/'.$detalhe['Detalhe']['foto'], array('width'=>'100','height'=>'50')); ?>&nbsp;
         </a>
      </td>
		<td><?php echo h($detalhe['Detalhe']['ocorrencias']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['hist_escolar']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['neg_financeira']); ?>&nbsp;</td>
		<td><?php echo h($detalhe['Detalhe']['egresso']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $detalhe, 'model' => 'Detalhe')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
