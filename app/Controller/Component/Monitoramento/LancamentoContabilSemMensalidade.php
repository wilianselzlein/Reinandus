<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class LancamentoContabilSemMensalidade implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select LancamentoContabil.* from lancamento_contabil LancamentoContabil  
				where not exists (
					select 1 from mensalidade where LancamentoContabil.id = lancamento_valor_id)
				and not exists( 
					select 1 from mensalidade where LancamentoContabil.id = lancamento_desconto_id)
				and LancamentoContabil.complemento in (
					select CONCAT(aluno.nome, "-", aluno.id) from aluno)
				and 1 = 2';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Lançamento contabil sem mensalidade associada';
	}

    public function Correcao($id = null) {
        $sql = 'delete from lancamento_contabil 
        		where id = ' . $id; 
        return $sql;
    }
    
}
?>