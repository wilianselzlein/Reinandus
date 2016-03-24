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

    public function GerarDeSituacao(&$valores) {
        $consulta = $this->Grafico->query("
SELECT s.*
  FROM (SELECT Q1.valor, Q1.quant
          FROM (SELECT e.valor, Count(a.id) AS quant
                  FROM enumerado e
                  JOIN aluno a
                    ON a.situacao_id = e.id
                 WHERE e.nome = 'aluno'
                   AND e.referencia = 'situacao_id'
                   AND e.is_ativo = 1
                 GROUP BY e.valor) Q1
         ORDER BY Q1.quant DESC LIMIT 5) s
UNION ALL
SELECT s.*
  FROM (SELECT 'Outras', Q1.quant
          FROM (SELECT Count(a.id) AS quant
                  FROM aluno a
                 WHERE a.situacao_id IS NULL
                    or a.situacao_id NOT IN
                       (SELECT Q2.situacao_id
                          FROM (SELECT Q3.*
                                  FROM (SELECT a.situacao_id, Count(a.id) AS quant
                                          FROM enumerado e
                                          JOIN aluno a
                                            ON a.situacao_id = e.id
                                         WHERE e.nome = 'aluno'
                                           AND e.referencia = 'situacao_id'
                                           AND e.is_ativo = 1
                                         GROUP BY a.situacao_id) Q3
                                 ORDER BY Q3.quant DESC LIMIT 5) Q2)) Q1) s
");
        $valores = [];
        foreach ($consulta as $item) {
            $valor = [];
            $valor['valor'] = "'" . $item[0]['valor'] . "'";
            $valor['quant'] = $item[0]['quant'];
            $valores[] = $valor;
        }

        //debug($valores); die;
    }

}