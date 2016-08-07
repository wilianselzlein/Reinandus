<div class="panel-footer">
	<h3><?php echo __('Detalhes').' ' ?> 
		<small><?php echo __('do aluno') ?></small>
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
           <?php echo __('Actions'); ?> <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu">  
           <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i>'.' '.__('New')  .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'add', $detalhes[0]['Detalhe']['aluno_id']), array('escape'=>false)); ?>   </li>
           <?php if (! empty($detalhes[0])): ?>
           <li><?php echo $this->Html->link('<i class="fa fa-list-alt"></i>'.' '   .__('Edit') .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'edit', $detalhes[0]['Detalhe']['id']), array('escape'=>false)); ?>   </li>
           <li>
             <?php echo $this->Form->postLink('<i class="fa fa-times"></i>'. ' ' .__('Delete') .' '.__('Detalhe'), array('controller' => 'detalhes', 'action' => 'delete', $detalhes[0]['Detalhe']['id'], $detalhes[0]['Detalhe']['id']), array('style' => 'margin: 10px;', 'class' => 'btn btn-default btn-xs','escape'=>false, 'title'=>__('Delete'), 'data-toggle'=>'tooltip'), __('Are you sure you want to delete # %s?', $detalhes[0]['Detalhe']['id'])); ?>
         </li>
          <?php endif; ?>
        </ul>       
     </div>
	</h3>
</div>   
	<?php if (!empty($detalhes)): ?>
	<ul class="list-group">
	<?php foreach ($detalhes as $detalhe): ?>
		<div class="panel-body">
	    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Ocorrências</h4>
	   	 	<p class="list-group-item-text"><pre><?php echo $detalhe['Detalhe']['ocorrencias']; ?></pre></p>
	    </li>
	    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Histórico Escolar</h4>
	   	 	<p class="list-group-item-text"><pre><?php echo $detalhe['Detalhe']['hist_escolar']; ?></pre></p>
	    </li>
	    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Negociação Financeira</h4>
	   	 	<p class="list-group-item-text"><pre><?php echo $detalhe['Detalhe']['neg_financeira']; ?></pre></p>
	    </li>
	    <li class="list-group-item">
	    	<h4 class="list-group-item-heading">Egresso</h4>
	   	 	<p class="list-group-item-text"><pre><?php echo $detalhe['Detalhe']['egresso']; ?></pre></p>
	    </li>
      	<?php echo $this->Html->image('detalhes/thumbs/'.$detalhe['Detalhe']['foto']); ?>
		</div>  
	<?php endforeach; ?>
	</ul>
<?php endif; ?>
</div><!-- /.related Detalhes -->