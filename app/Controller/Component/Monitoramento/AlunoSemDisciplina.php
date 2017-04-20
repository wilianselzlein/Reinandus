<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class AlunoSemDisciplina implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.id, a.nome 
                from aluno a 
                left join aluno_disciplinas d on a.id = d.aluno_id 
                where d.aluno_id is null  
                order by a.nome';
        return $sql;

    }

}
?>