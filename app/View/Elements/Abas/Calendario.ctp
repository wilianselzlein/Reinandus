<h4><?php echo $alunos['valuno']['curso_nome']; ?></h4>
<?php 
    $site = $alunos['valuno']['curso_calendario'];

    print("<a href='$site'  target='_blank'>Clique aqui para visualizar.</a>");

    /*    
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    

    $encontrouDiv = false;
    $file_headers = @get_headers($site);
    if (($site != '') && ($file_headers[0] != 'HTTP/1.1 404 Not Found')) {
        $urlContent = file_get_contents($site, false); 
        $h3 = strpos($urlContent, "<h3>");
        $cal = substr($urlContent, $h3, strpos($urlContent, "<p>&nbsp;</p>") - $h3);
        $cal = iconv('iso-8859-1', 'utf-8', $cal);
        print($cal);
        $reg = '/<p\>(.|\s)+?<\/p>/i';
        
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
   */ 
?>