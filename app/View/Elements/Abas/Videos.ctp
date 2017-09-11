<ul class="list-group">
<?php 
if (isset($videos[0])) {
foreach ($videos as $video): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo date('d/m/Y', strtotime($video['vvideos']['video_data'])); ?></h4>
	<iframe src="https://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
	</div>

  </li>
<?php endforeach; ?>
</ul>
<?php } else { ?>
<div class="alert alert-info" role="alert">
	<b>Nenhum vídeo cadastrado.</b>
</div>
<?php } ?>