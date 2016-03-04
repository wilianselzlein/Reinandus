<style type="text/css">
<!--
.tabelas{
	border: #FFFFFF 1px solid;
	background-color:#FFF
}
.tabelas td {
	border:1px solid #FFFFFF;
	padding: 3px 3px 3px 3px;
	margin: 3px 3px 3px 3px;
}
-->
</style>
<?php 
    
    $site = $alunos['Curso']['calendario'];
    
    // Habilita todas mensagens de erros que possa acontecer
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Declaração de variáveis
    $encontrouDiv = false;
    // Pega o conteúdo do site (retornado como string) e coloca dentro de uma variável
    $urlContent = file_get_contents($site);
    
    //<div class="tabelas_alinhamento">
    //<table class="tabelas">

    // Pega tudo o que há na DIV com id='testeB' com id exp utilizando expressão regular
    $reg = '/<table class="tabelas".*>(.|\s)+?<\/table>/i';
    if(preg_match($reg, $urlContent, $resultado)){
        $encontrouDiv = true;
        $conteudoDiv = $resultado[0];
    }

    if($encontrouDiv){
        echo $conteudoDiv;
    }else{
        echo 'Calendário não encontrado!';
    }
?>