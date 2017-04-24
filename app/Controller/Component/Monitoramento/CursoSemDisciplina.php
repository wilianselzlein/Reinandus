<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class CursoSemDisciplina implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select c.id, c.nome
                from curso c
                left join curso_disciplinas d on c.id = d.curso_id
                where d.curso_id is null 
                order by c.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Curso sem disciplina';
	}

}
?>