<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class ResponsavelSemDoc implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select distinct pessoa.id, a.nome, cnpjcpf, fantasia, razaosocial 
                from mensalidade m 
                join aluno a on m.aluno_id = a.id 
                join pessoa on a.responsavel_id = pessoa.id
                where cnpjcpf is null or cnpjcpf = ""';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Responsável sem Documento';
	}

   /* public function Correcao($id = null) {
        $sql = 'update mensalidade 
                set desconto = 0,
                modified = now() 
                where id = ' . $id;
        return $sql;
    }*/

}
?>