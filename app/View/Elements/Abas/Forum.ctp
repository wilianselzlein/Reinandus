<div class="page-header" style="margin-top: 0px;">
  <h1 style="margin-top: 0px;">Tema do forum <small>Aberto</small></h1>
</div>

<div class="alert alert-info" role="alert">
Conteúdo do forum<br/>
Conteúdo do forum<br/>
Conteúdo do forum<br/>
</div>

<ul class="list-group">
<?php for ($i = 1; $i <= 5; $i++) { ?>
    <li class="list-group-item">
    	<h4 class="list-group-item-heading"><?php echo date('d/m/y'); ?></h4>
   	 	<p class="list-group-item-text"><pre>'Mensagem <?php echo $i; ?> do forum'</pre></p>
   	 	<button class="btn btn-large btn-primary" type="button" id="btn_forum"><i class="fa fa-plus"></i>&nbsp;Comentar</button>
    </li>
<?php } ?>
</ul>
