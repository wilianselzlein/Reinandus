			<?php 
	    	echo $this->Ajax->link('<i class="fa fa-' . $icone . '"></i>', 
	    			array('controller' => $controller, 
	    				'action' => $nome, $id), 
		    		array('id' => $nome . 'jx' . $id, 
		    			'update' => $nome . 'td' . $id, 
		    			'indicator' => 'loading',
		    			'class' => 'btn btn-default btn-xs','escape'=>false, 
		    			'title'=>__('Mostrar ' . $nome . 's'), 'data-toggle'=>'tooltip',
		    			'complete' => 
		    				'document.getElementById("' .$nome . 'bt' . $id . '").style.display= ""; 
		    				 document.getElementById("' .$nome . 'jx' . $id . '").style.display= "none";'
	    				)
	    		);
			?>

			<a href="#" 
				<?php echo ' id="' . $nome . 'bt' . $id . '"'; ?>
				<?php echo ' onclick="ShowHide(\'' . $nome . '\',' . $id . ');"'; ?>
				class="btn btn-default btn-xs" title="" data-toggle="tooltip" 
				<?php echo ' data-original-title= "Esconder ' . $nome . '"'; ?> 
				style="display: none">
				<i class="fa fa-eye-slash"></i>
			</a>
