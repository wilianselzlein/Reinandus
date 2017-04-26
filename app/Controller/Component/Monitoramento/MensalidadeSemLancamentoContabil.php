<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeSemLancamentoContabil implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select a.nome, m.vencimento, m.pagamento, m.liquido, f.nome
                from mensalidade m
                join aluno a on a.id = m.aluno_id
                join formapgto f on f.id = m.formapgto_id
                where ((m.pago > 0) or (m.pagamento is not null))
                and (m.lancamento_valor_id is null)
                and year(m.vencimento) >= 2016
                order by a.nome, m.vencimento';
        return $sql;

    }

	public function PegarDescricao() {
		return 'Mensalidade sem lançamento contábil';
	}

    public function Correcao() {
        //gerar o lançamento contábil
    }

}
?>