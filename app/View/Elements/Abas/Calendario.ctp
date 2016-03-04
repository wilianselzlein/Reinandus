<h4><?php echo $alunos['Curso']['nome']; ?></h4>
<?php 
//<h2 style="margin-top: 0px;">Calendário</h2>
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
    if (preg_match($reg, $urlContent, $resultado)) {
        $encontrouDiv = true;
        $conteudoDiv = $resultado[0];
    }
    
    if ($encontrouDiv) {
        $conteudoDiv = str_replace('class="tabelas"', " class='table'", $conteudoDiv);
        echo $conteudoDiv;
    } else {
        echo 'Calendário não encontrado!';
    }
?>