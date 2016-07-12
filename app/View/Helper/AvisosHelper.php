<?php 
App::uses('AppHelper', 'View/Helper'); 

class AvisosHelper extends AppHelper { 

	public $helpers = array('Html', 'Form', 'Session'); 

	public function Mensalidades($css, $tipo) { 

		$conta = CakeSession::read('Avisos.' . $tipo);
	    if ($conta == null) {
			$mensalidade = ClassRegistry::init('Mensalidade');
			$mensalidade->recursive = -1;
			$mensalidade->unbindModel(array('belongsTo' => array('Conta', 'Formapgto', 'User', 'Aluno', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
			$condicoes = array();
			if ($tipo == 'Recebidas')
				$condicoes['Mensalidade.pagamento'] = date('Y-m-d');
	
			if ($tipo == 'Receber')
				$condicoes['Mensalidade.vencimento'] = date('Y-m-d');
			$conta = $mensalidade->find('count', array('recursive' => false, 'conditions' => $condicoes));
			CakeSession::write('Avisos.' . $tipo, $conta . ' ');
	    }
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span>&nbsp;' . $tipo;

		return $this->Html->link($texto, array('controller' => 'mensalidades', 'action' => 'index', $tipo), array('class' => '', 'escape'=>false));
	}

	public function Pagar($css, $tipo) { 

		$conta = CakeSession::read('Avisos.' . $tipo);
	    if ($conta == null) {
			$pagar = ClassRegistry::init('ContaPagar');
			$pagar->recursive = -1;
	        $pagar->unbindModel(array('belongsTo' => array('Conta', 'Formapgto', 'User', 'Aluno', 'Tipo', 'Pessoa', 'Situacao', 'LancamentoContabilValor', 'LancamentoContabilDesconto', 'LancamentoContabilJuro')));
			$condicoes = array();
			if ($tipo == 'Pagas')
				$condicoes['ContaPagar.pagamento'] = date('Y-m-d');
			
			if ($tipo == 'Pagar')
				$condicoes['ContaPagar.vencimento'] = date('Y-m-d');
			$conta = $pagar->find('count', array('conditions' => $condicoes));
			CakeSession::write('Avisos.' . $tipo, $conta . ' ');
	    }
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span>&nbsp;' . $tipo;

		return $this->Html->link($texto, array('controller' => 'contaspagar', 'action' => 'index', $tipo), array('class' => '', 'escape'=>false));
	}

	public function Alunos($css) { 

        $conta = CakeSession::read('Avisos.Aniver');
	    if ($conta == null) {
	    	$aluno = ClassRegistry::init('Aluno');
			$condicoes = array();
			$condicoes['Aluno.data_nascimento'] = date('Y-m-d');
			$aluno->unbindModel(array('belongsTo' => array('Naturalidade', 'Situacao', 'EstadoCivil', 'Indicacao', 'Curso', 'Professor', 'Cidade', 'Responsavel')));
			$conta = $aluno->find('count', array('recursive' => false, 'conditions' => $condicoes));
			CakeSession::write('Avisos.Aniver', $conta . ' ');
	    }
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span>&nbsp;Aluno(s)';

		return $this->Html->link($texto, array('controller' => 'Alunos', 'action' => 'index', 'Aniver'), array('class' => '', 'escape'=>false));
	}

	public function Professores($css) { 

        $conta = CakeSession::read('Avisos.Professores');
        if ($conta == null) {
			$prof = ClassRegistry::init('Professor');
			$condicoes = array();
			$condicoes['Professor.data_nascimento'] = date('Y-m-d');
			$prof->unbindModel(array('belongsTo' => array('Cidade')));
			$conta = $prof->find('count', array('recursive' => false, 'conditions' => $condicoes));
			CakeSession::write('Avisos.Professores', $conta . ' ');
        }
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span>&nbsp;Professor(es)';

		return $this->Html->link($texto, array('controller' => 'Professores', 'action' => 'index', 'Aniver'), array('class' => '', 'escape'=>false));
	}

} 

?>


