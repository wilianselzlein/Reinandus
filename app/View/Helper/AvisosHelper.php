<?php 
App::uses('AppHelper', 'View/Helper'); 

class AvisosHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function Mensalidades($css, $tipo) { 

		$mensalidade = ClassRegistry::init('Mensalidade');
		$condicoes = array();
		if ($tipo == 'Recebidas')
			$condicoes['Mensalidade.pagamento'] = date('Y-m-d');
		
		if ($tipo == 'Receber')
			$condicoes['Mensalidade.vencimento'] = date('Y-m-d');
		$conta = $mensalidade->find('count', array('conditions' => $condicoes));
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span> ' . $tipo;

		return $this->Html->link($texto, array('controller' => 'mensalidades', 'action' => 'index', $tipo), array('class' => '', 'escape'=>false));
	}

	public function Pagar($css, $tipo) { 

		$pagar = ClassRegistry::init('ContaPagar');
		$condicoes = array();
		if ($tipo == 'Pagas')
			$condicoes['ContaPagar.pagamento'] = date('Y-m-d');
		
		if ($tipo == 'Pagar')
			$condicoes['ContaPagar.vencimento'] = date('Y-m-d');
		$conta = $pagar->find('count', array('conditions' => $condicoes));
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span> ' . $tipo;

		return $this->Html->link($texto, array('controller' => 'contaspagar', 'action' => 'index', $tipo), array('class' => '', 'escape'=>false));
	}

	public function Alunos($css) { 

		$aluno = ClassRegistry::init('Aluno');
		
		$condicoes = array();
		$condicoes['Aluno.data_nascimento'] = date('Y-m-d');

		$conta = $aluno->find('count', array('conditions' => $condicoes));
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span> Aluno(s)';

		return $this->Html->link($texto, array('controller' => 'Alunos', 'action' => 'index', 'Aniver'), array('class' => '', 'escape'=>false));
	}

	public function Professores($css) { 

		$prof = ClassRegistry::init('Professor');

		$condicoes = array();
		$condicoes['Professor.data_nascimento'] = date('Y-m-d');
		$conta = $prof->find('count', array('conditions' => $condicoes));
		$texto = '<span class="label label-' . $css . '">' . $conta . '</span> Professor(es)';

		return $this->Html->link($texto, array('controller' => 'Professores', 'action' => 'index', 'Aniver'), array('class' => '', 'escape'=>false));
	}

} 

?>


