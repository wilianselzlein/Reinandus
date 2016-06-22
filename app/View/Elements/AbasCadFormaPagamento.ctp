<?php $menus = ['MenVal', 'MenDes', 'MenJur', 'PagVal', 'PagDes', 'PagJur']; ?>

<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs" style=" border-bottom-width: 0px;">
        <?php foreach ($menus as $menu) { ?>
            <li class="">
                <a href="#tab<?php echo $menu; ?>" data-toggle="tab"><i class="fa fa-file-text-o"></i>&nbsp;CAPTION <?php echo $menu; ?></a>
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
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
    	            </div><!-- .form-group -->
    	            <div class="form-group">
    	               <?php echo $this->Form->input($menu . 'Cre',
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
    	            </div><!-- .form-group -->
    	            <div class="form-group">
    	               <?php echo $this->Form->input($menu . 'His',
    	                     array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>false, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
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
