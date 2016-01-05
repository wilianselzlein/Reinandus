<?php 
if ($nome == '') $nome = 'loading';
echo $this->Html->image('load.gif', array('id' => $nome, 'style'=> 'display:none')); 
?>