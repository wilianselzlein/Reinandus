<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class LancamentoContabilSemMensalidade implements InterfaceMonitoramento
{
	public function PegarSql(){
		$lancamento_contabil = 'LancamentoContabil.id, LancamentoContabil.data, LancamentoContabil.valor, LancamentoContabil.complemento';

        $sql = 'select ' . $lancamento_contabil . ' from 
        		(select ' . $lancamento_contabil . ', 
    				mensalidade_valor.id as mensalidade_valor_id, 
    				mensalidade_desconto.id as mensalidade_desconto_id,
    				mensalidade_juro.id as mensalidade_juro_id
        		from lancamento_contabil LancamentoContabil
        		join aluno on LancamentoContabil.complemento = 
        			concat(aluno.nome, "-", aluno.id) 
        		left join mensalidade mensalidade_valor on LancamentoContabil.id = mensalidade_valor.lancamento_valor_id
        		left join mensalidade mensalidade_desconto on LancamentoContabil.id = mensalidade_desconto.lancamento_desconto_id
        		left join mensalidade mensalidade_juro on LancamentoContabil.id = mensalidade_juro.lancamento_juro_id
				where LancamentoContabil.data > "2018.05.01") as LancamentoContabil
				where LancamentoContabil.mensalidade_valor_id is null
				and LancamentoContabil.mensalidade_desconto_id is null
				and LancamentoContabil.mensalidade_juro_id is null
				limit 100;';
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