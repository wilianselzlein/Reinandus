<ul class="list-group">
<?php 
if (isset($videos[0])) {
foreach ($videos as $video): ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo date('d/m/Y', strtotime($video['vvideos']['video_data'])); ?></h4>
    <a><?php echo $video['vvideos']['video_video']; ?></a><br>
	<iframe src="<?php echo $video['vvideos']['video_video']; ?>"></iframe>
	</div>

  </li>
<?php endforeach; ?>
</ul>
<?php } else { ?>
<div class="alert alert-info" role="alert">
	<b>Nenhum vídeo cadastrado.</b>
</div>
<?php } ?>