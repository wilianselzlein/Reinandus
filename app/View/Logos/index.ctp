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

	<div class="panel-heading"><h3><span class="fa fa-info"></span> <?php echo __('Logos'); ?>
	<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action']); ?>
            </h3></div>

<div class="panel-body">
<?php echo $this->element('pesquisa/simples');?>
			<div class="table-responsive">
				 <table class="table table-bordered table-hover table-condensed" >
                <thead>
                    <tr class="active">
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('pessoa_id'); ?></th>
							<th><?php echo $this->Paginator->sort('logo'); ?></th>
							<th><?php echo $this->Paginator->sort('imagem'); ?></th>
							<th class="actions text-center"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
<?php foreach ($logos as $logo): ?>
	<tr>
		<td><?php echo h($logo['Logo']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($logo['Pessoa']['razaosocial'], array('controller' => 'pessoas', 'action' => 'view', $logo['Pessoa']['id'])); ?>
		</td>
		<td>
          <a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox"> 
            <?php echo $this->Html->image('logos/thumbs/'.$logo['Logo']['logo'], array('width'=>'100','height'=>'50')); ?>&nbsp;
         </a>
      </td>
      <td><?php echo h($logo['Logo']['imagem']); ?>&nbsp;</td>
		<?php echo $this->element('BotoesDeAcaoDoIndex', array('objeto' => $logo, 'model' => 'Logo')); ?>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->

</div>
<?php echo $this->element('Paginator'); ?>
</div>
