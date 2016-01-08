<?php 
if (isset($nome)) {
    if ($nome == '') 
        $nome = 'loading';
} else {
    $nome = 'loading';
}
echo $this->Html->image('load.gif', array('id' => $nome, 'style'=> 'display:none')); 
?>