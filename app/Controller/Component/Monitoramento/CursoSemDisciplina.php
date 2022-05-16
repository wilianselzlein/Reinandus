<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class CursoSemDisciplina implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select curso.id, curso.nome
                from curso curso
                left join curso_disciplinas d on curso.id = d.curso_id
                where d.curso_id is null 
                order by curso.nome';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Curso sem disciplina';
	}

}
?>