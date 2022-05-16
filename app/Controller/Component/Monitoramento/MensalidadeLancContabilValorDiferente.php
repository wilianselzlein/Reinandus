<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeLancContabilValorDiferente implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select Lancamento_Contabil.id, mensalidade.id as Mensalidade_Id, mensalidade.vencimento, mensalidade.valor - mensalidade.desconto as valor, mensalidade.documento, Lancamento_Contabil.valor as Lancamento_Valor
				from mensalidade mensalidade
				join lancamento_contabil Lancamento_Contabil on mensalidade.lancamento_valor_id = Lancamento_Contabil.id
				where mensalidade.valor - mensalidade.desconto <> Lancamento_Contabil.valor';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com Controladoria valores diferentes';
	}

    public function Correcao($id = null) {
        $sql = 'update lancamento_contabil set valor = 
        		(select m.valor - m.desconto
        		from mensalidade m 
        		where m.lancamento_valor_id = '. $id . '),
                modified = now()
                where id = ' . $id;
        return $sql;
    }

}
?>