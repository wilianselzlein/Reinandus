<ul class="list-group">
<?php 
if (isset($videos[0])) {
foreach ($videos as $video): 
  $url = $video['vvideos']['video_video']; ?>
  <li class="list-group-item">
    <h4 class="list-group-item-heading"><?php echo date('d/m/Y', strtotime($video['vvideos']['video_data'])); ?></h4>
    <i class="fa fa-youtube-play fa-1x"></i>&nbsp;
    <a href="<?php echo $url; ?>" target="_blank">
    	<b><?php echo $url; ?></b>
    </a><br>
    <p class="list-group-item-text">
    	<pre>
    	<?php if (isset($video['vvideos']['video_mensagem'])) 
    			echo $video['vvideos']['video_mensagem']; ?>
    	</pre>
    </p>
    <?php echo $this->element('YouTube', array('url' => $video['vvideos']['video_video'])); ?>
  </li>
<?php endforeach; ?>
</ul>
<?php } else { ?>
<div class="alert alert-info" role="alert">
	<b>Nenhum vídeo cadastrado.</b>
</div>
<?php } ?>