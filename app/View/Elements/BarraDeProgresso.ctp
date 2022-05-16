<?php 
if (isset($nome)) {
    if ($nome == '') 
        $nome = 'loading';
} else {
    $nome = 'loading';
}
echo $this->Html->image('load.gif', array('id' => $nome, 'width'=>'100%', 'height' => '20px', 'style'=> 'display:none;')); 
?>