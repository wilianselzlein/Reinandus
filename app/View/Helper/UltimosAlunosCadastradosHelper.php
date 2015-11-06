<?php 
App::uses('AppHelper', 'View/Helper'); 

class UltimosAlunosCadastradosHelper extends AppHelper { 

	public $helpers = array('Html', 'Form'); 

	public function GerarLista() { 

		$aluno = ClassRegistry::init('Aluno');
		$aluno->unbindModel(array('belongsTo' => array('Naturalidade', 'Situacao', 'EstadoCivil', 'Indicacao', 'Professor', 'Responsavel')));
		$alunos = $aluno->find('all', array('recursive' => 0, 'limit' => 5, 'order' => array('Aluno.created DESC') 
			,'fields' => array('Aluno.id', 'Aluno.nome', 'Aluno.created', 'Cidade.nome', 'Curso.nome')
			));

		$return = '';
		for ($i = 0; $i < count($alunos); $i++){

			$texto = 
				'<div class="media">' .
			      '<span class="pull-left">' .
			         '<img class="media-object" src="http://placehold.it/50x50" alt="">' .
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


