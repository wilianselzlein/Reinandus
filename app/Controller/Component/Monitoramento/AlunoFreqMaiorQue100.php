<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoFreqMaiorQue100 implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome, ad.id, d.nome, p.nome
                from aluno a
                join aluno_disciplinas ad on a.id = ad.aluno_id
                join disciplina d on d.id = ad.disciplina_id
                join professor p on p.id = ad.professor_id
                where ad.frequencia > 100
                order by a.nome, d.nome, p.nome';
        return $sql;

    }

}
?>