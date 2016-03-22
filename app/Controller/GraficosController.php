<?php
/**
 * Document   : app/Controller/GraficosController.php
 * Created on : 2016-03-21 12:30 AM
 *
 * @author Wilian.Ivo
 */

App::uses('AppController', 'Controller');

class GraficosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $components = array('TransformarArray', 'Session');

    //Cache
    public function GerarDeCidades(&$nomes, &$valores) {
        $consulta = $this->Grafico->query("
SELECT s.*
  FROM (SELECT Q1.nome, Q1.quant
          FROM (SELECT c.nome, Count(a.id) AS quant
                  FROM cidade c
                  JOIN aluno a
                    ON a.cidade_id = c.id
                 GROUP BY c.nome) Q1
         ORDER BY Q1.quant DESC LIMIT 5) s
UNION ALL
SELECT s.*
  FROM (SELECT 'Outras', Q1.quant
          FROM (SELECT Count(a.id) AS quant
                  FROM aluno a
                 WHERE a.cidade_id IS NULL
                    or a.cidade_id NOT IN
                       (SELECT Q2.cidade_id
                          FROM (SELECT Q3.*
                                  FROM (SELECT a.cidade_id, Count(a.id) AS quant
                                          FROM aluno a
                                      GROUP BY a.cidade_id) Q3
                                 ORDER BY Q3.quant DESC LIMIT 5) Q2)) Q1) s
");
        $nomes = [];
        $valores = [];
        foreach ($consulta as $item) {
            $nomes[] = "'" . $item[0]['nome'] . "'";
            $valores[] = $item[0]['quant'];
        }

        $nomes = implode(', ', $nomes);
        $valores = implode(', ', $valores);
    }

}