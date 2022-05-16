<h4><?php echo $alunos['valuno']['curso_nome']; ?></h4>
<?php 
    $site = $alunos['valuno']['curso_calendario'];
    
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    
    $encontrouDiv = false;
    $file_headers = @get_headers($site);
    if (($site != '') && ($file_headers[0] != 'HTTP/1.1 404 Not Found')) {
        $urlContent = file_get_contents($site, false); 
        $reg = '/<table.*class="tabelas".*>(.|\s)+?<\/table>/i';
        if (preg_match($reg, $urlContent, $resultado)) {
            $encontrouDiv = true;
            $conteudoDiv = $resultado[0];
        }
    }
    if ($encontrouDiv) {
        $conteudoDiv = str_replace('class="tabelas"', " class='table'", $conteudoDiv);
        echo $conteudoDiv;
    } else {
        echo 'Calendário não encontrado!';
    }
    
?>