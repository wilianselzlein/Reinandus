<?php 
$menus = [1 => 'MenVal', 2 => 'MenDes', 3 => 'MenJur', 4 => 'PagVal', 5 => 'PagDes', 6 => 'PagJur']; 
$nomes = [1 => 'Mens. Valor', 2 => 'Mens. Desconto', 3 => 'Mens. Juro', 4 => 'Pagar Valor', 5 => 'Pagar Desc.', 6 => 'Pagar Juro']; 

?>

<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
        <?php foreach ($menus as $menu => $key) { ?>
            <li class="">
                <a href="#tab<?php echo $key; ?>" data-toggle="tab"><i class="fa fa-file-text-o"></i>&nbsp;<?php echo $nomes[$menu]; ?></a>
            </li>
        <?php } ?>
    </ul>
	<div class="panel panel-default">
	  <div class="panel-body">
    	<div id="my-tab-content" class="tab-content">
    	    <?php foreach ($menus as $menu) { ?>
                <div class="tab-pane" id="tab<?php echo $menu; ?>">
    	            <div class="form-group">
    	               <?php echo $this->Form->input($menu . 'Deb',
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label', 'text' => 'Débito'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'options' => $debitos)); ?>
    	            </div><!-- .form-group -->
    	            <div class="form-group">
    	               <?php echo $this->Form->input($menu . 'Cre',
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label', 'text' => 'Crédito'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'options' => $creditos)); ?>
    	            </div><!-- .form-group -->
    	            <div class="form-group">
    	               <?php echo $this->Form->input($menu . 'His',
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label', 'text' => 'Histórico'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>', 'options' => $historicos)); ?>
    	            </div><!-- .form-group -->
    			</div>
    		<?php } ?>
    	</div>
	  </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#tabs').tab();
    });
</script>
