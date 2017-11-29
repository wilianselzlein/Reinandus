<?php
  echo $this->Form->create('Portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'matricula', 'target' => '_blank')); 
  echo $this->Form->hidden('id', array('value' => $alunos['valuno']['aluno_id']));
  echo $this->Form->hidden('nome', array('value' => $alunos['valuno']['aluno_nome']));
  echo $this->Form->hidden('curso', array('value' => $alunos['valuno']['curso_id']));
  echo $this->Form->hidden('curso_nome', array('value' => $alunos['valuno']['curso_nome']));
  echo $this->Form->hidden('curso_turma', array('value' => $alunos['valuno']['curso_turma']));
  echo $this->Form->hidden('pessoa_razaosocial', array('value' => $alunos['valuno']['pessoa_razaosocial']));
  echo $this->Form->hidden('user_assinatura', array('value' => $alunos['valuno']['user_assinatura']));
  echo $this->Form->hidden('curso_inicio', array('value' => $alunos['valuno']['aluno_curso_inicio']));
  echo $this->Form->hidden('curso_fim', array('value' => $alunos['valuno']['aluno_curso_fim']));
  echo $this->Form->hidden('situacao', array('value' => $alunos['valuno']['situacao_valor']));
  echo $this->Form->button('<i class="fa fa-print"></i>'.' '.__('Imprimir Declaração de Matrícula'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit', 'id' => 'btn_materiais'));
  echo $this->Form->end();
?>
<br/>
<?php if (count($notas) == 0) { ?> 
  <div class="alert alert-info" role="alert">
    <b>Nenhuma nota lançada.</b>
  </div>
<?php } else { ?>
<div class="panel panel-default">
<table class="table">
  <thead>
    <tr>
      <th>Disciplina</th>
      <th>Professor</th>
      <th>Titulação</th>
      <th>Datas</th>
      <th>CH</th>
      <th>Freq. (%)</th>
      <th>Nota</th>
    </tr>
  </thead>
  <tbody>
<?php 
$ha = 0;
$nt = 0;
$fr = 0;
foreach ($notas as $nota):  
$ha += $nota['vdisciplinas']['aluno_disciplina_horas_aula'];
$nt += $nota['vdisciplinas']['aluno_disciplina_nota']; 
$fr += $nota['vdisciplinas']['aluno_disciplina_frequencia']; 
?>
    <tr>
      <td><?php echo $nota['vdisciplinas']['disciplina_nome']; ?>&nbsp;</td>
      <td><?php echo $nota['vdisciplinas']['professor_nome']; ?>&nbsp;</td>
      <td><?php echo $nota['vdisciplinas']['professor_resumo_titulacao']; ?>&nbsp;</td>
      <?php 
        $data = $nota['vdisciplinas']['aluno_disciplina_data'];
        if ($data != '') 
          $data = date('d/m/Y', strtotime($nota['vdisciplinas']['aluno_disciplina_data']));
      ?>
      <td><?php echo $data; ?>&nbsp;</td>
      <td><?php echo $nota['vdisciplinas']['aluno_disciplina_horas_aula']; ?>&nbsp;</td>
      <td><?php echo $nota['vdisciplinas']['aluno_disciplina_frequencia']; ?>&nbsp;</td>
      <td><?php echo $nota['vdisciplinas']['aluno_disciplina_nota']; ?>&nbsp;</td>
    </tr>
<?php endforeach; ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo $ha; ?>&nbsp;</td>
      <td><?php echo round($fr / count($notas), 2);?>&nbsp;</td>
      <td><?php echo round($nt / count($notas), 2);?>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>TCC: &nbsp;</td>
      <td><?php echo $alunos['valuno']['aluno_mono_nota']; ?>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
<?php } ?>