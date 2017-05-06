<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeLancContabilDescontoDiferente implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select Lancamento_Contabil.id, mensalidade.id as Mensalidade_Id, mensalidade.vencimento, mensalidade.desconto, Lancamento_Contabil.valor as Lancamento_Desconto
				from mensalidade mensalidade
				join lancamento_contabil Lancamento_Contabil on mensalidade.lancamento_desconto_id = Lancamento_Contabil.id
				where mensalidade.desconto <> Lancamento_Contabil.valor';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade com Controladoria desconto diferentes';
	}

    public function Correcao($id = null) {
        $sql = 'update lancamento_contabil set valor = 
        		(select m.desconto 
        		from mensalidade m 
        		where m.lancamento_desconto_id = '. $id . ')
                modified = now()
                where id = ' . $id;
        return $sql;
    }

}
?>