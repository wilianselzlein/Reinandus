<?php 
App::uses('AppHelper', 'View/Helper'); 

class UltimosAlunosCadastradosHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function GerarLista() { 
		$alunos = CakeSession::read('Avisos.Alunos');
		
		if ($alunos == null) {
			$aluno = ClassRegistry::init('Aluno');
			$aluno->unbindModel(array(
				'belongsTo' => array('Naturalidade', 'Situacao', 'EstadoCivil', 'Indicacao', 'Professor', 'Responsavel'),
				'hasMany' => array('Acesso', 'AlunoDisciplina', 'Mensalidade')));
			$aluno->bindModel(array('belongsTo' => array('Cidade', 'Curso')));
			$alunos = $aluno->find('all', array('recursive' => 1, 'limit' => 5, 'order' => array('Aluno.created DESC') 
				,'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.created', 'Cidade.nome', 'Curso.nome')
				));
			$alunos = serialize($alunos);
			CakeSession::write('Avisos.Alunos', $alunos);
		}
		$alunos = unserialize($alunos);

		$return = '';
		for ($i = 0; $i < count($alunos); $i++){

			if ((isset($alunos[$i]['Detalhe'][0])) && ($alunos[$i]['Detalhe'][0]['foto'] != ''))
				$imagem = $this->Html->image('detalhes/thumbs/'.$alunos[$i]['Detalhe'][0]['foto'], array('width'=>'50','height'=>'50')) . ' &nbsp; ';
			else
				$imagem = '<img class="media-object" src="/img/50x50.png" alt="">';

			$texto = 
				'<div class="media">' .
			      '<span class="pull-left">' .
			         $imagem .
			      '</span>' . 
			      '<div class="media-body">' .
			         '<h5 class="media-heading"><strong>' . $alunos[$i]['Aluno']['nome'] . '</strong>' .
			         '</h5>' .
			         '<p class="small text-muted"><i class="fa fa-clock-o"></i> ' . $alunos[$i]['Aluno']['created'] . '</p>' .
			         '<p>' . $alunos[$i]['Curso']['nome'] . '<br>' . $alunos[$i]['Cidade']['nome'] . '</p>' .
			      '</div>' .
				'</div>';

			$return .=  
				'<li class="message-preview">' .
					 $this->Html->link($texto, array('controller' => 'alunos', 'action' => 'view', $alunos[$i]['Aluno']['id']), array('class' => '', 'escape'=>false)) .
				'</li>';

		}
		return $return;
	}
} 

?>


