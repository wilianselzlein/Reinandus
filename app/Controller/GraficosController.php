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

    public function GerarPorSituacao(&$valores, $situacao_id) {
        $consulta = $this->Grafico->query("SELECT count(1) as quant from aluno where situacao_id = " . $situacao_id);
        $valores = $consulta[0][0]['quant'];
    }

    public function GerarDeAlunosPorCurso(&$nomes, &$valores) {
        $consulta = $this->Grafico->query("
select T.*, (ano1 + ano2 + ano3 + ano4) as Total
from (select distinct c.sigla,
  (select count(a1.id)
     from aluno a1
    inner join curso c1
       on a1.curso_id = c1.id
    where c1.sigla = c.sigla
      and c1.turma =
          (select max(ano.turma) from curso ano) - 0) as ano1,
  (select count(a1.id)
     from aluno a1
    inner join curso c1
       on a1.curso_id = c1.id
    where c1.sigla = c.sigla
      and c1.turma =
          (select max(ano.turma) from curso ano) - 1) as ano2,
  (select count(a1.id)
     from aluno a1
    inner join curso c1
       on a1.curso_id = c1.id
    where c1.sigla = c.sigla
      and c1.turma =
          (select max(ano.turma) from curso ano) - 2) as ano3,
  (select count(a1.id)
     from aluno a1
    inner join curso c1
       on a1.curso_id = c1.id
    where c1.sigla = c.sigla
      and c1.turma =
          (select max(ano.turma) from curso ano) - 3) as ano4,
  (select max(ano.turma) from curso ano) as maximo
from curso c
having ano1 > 0 or ano2 > 0 or ano3 > 0 or ano4 > 0) T
 order by Total desc
");
        $nomes = [];
        $valores = [];
        foreach ($consulta as $item) {
            //debug($item); die;
            $valor = [];
            $valor['valor'] = "'" . $item['T']['sigla'] . "'";
            $valor['quant'] = $item['T']['ano1'] . ',' . $item['T']['ano2'] . ',' . $item['T']['ano3'] . ',' . $item['T']['ano4'];
            $valores[] = $valor;
        }

        //debug($valores); die;
        $maximo = ((integer) $item['T']['maximo']);
        $nomes[] = "'" . $maximo . "'";
        $nomes[] = "'" . ($maximo - 1) . "'";
        $nomes[] = "'" . ($maximo - 2) . "'";
        $nomes[] = "'" . ($maximo - 3) . "'";
        $nomes[] = "'" . ($maximo - 4) . "'";
        $nomes = implode(', ', $nomes);
        //debug($nomes); die;
    }

}