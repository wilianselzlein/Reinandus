<?php

App::import('Controller/Component/Monitoramento', 'InterfaceMonitoramento');

class MensalidadeSemLancamentoContabil implements InterfaceMonitoramento
{
	public function PegarSql(){

        $sql = 'select mensalidade.id, aluno.nome, mensalidade.vencimento, mensalidade.pagamento, mensalidade.liquido, formapgto.nome
                from mensalidade mensalidade
                join aluno aluno on aluno.id = mensalidade.aluno_id
                join formapgto formapgto on formapgto.id = mensalidade.formapgto_id
                where ((mensalidade.pago > 0) or (mensalidade.pagamento is not null))
                and (mensalidade.lancamento_valor_id is null)
                and year(mensalidade.vencimento) >= 2016
                order by mensalidade.pagamento, aluno.nome
                limit 200;';
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