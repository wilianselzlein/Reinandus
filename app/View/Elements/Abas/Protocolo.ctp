<div class="panel panel-default">
  <div class="panel-body">
      <div class="alunos form">
         <?php echo $this->Form->create('Aluno', array('role' => 'form', 'class'=>'form-horizontal')); ?>
         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('nome',
                     array('class' => 'form-control', 'default' => $alunos['Aluno']['nome'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-7">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('matricula',
                     array('class' => 'form-control', 'default' => $alunos['Aluno']['id'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-3">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('email',
                     array('class' => 'form-control', 'default' => $alunos['Aluno']['email'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-7">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('telefone',
                     array('class' => 'form-control', 'default' => $alunos['Aluno']['celular'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-3">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('curso',
                     array('class' => 'form-control', 'default' => $alunos['Curso']['nome'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-7">', 'after'=>'</div>')); ?>
               <?php echo $this->Form->input('turma',
                     array('class' => 'form-control', 'default' => $alunos['Curso']['turma'], 'readonly' => 'readonly', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-3">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <?php $options = array(
                            'A' => 'Declaração de frequência / matrícula', 
                            'B' => 'Declaração de regularidade de pagamentos',
                            'C' => 'Solicitação de histórico escolar',
                            'D' => 'Solicitação de certificado de conclusão de curso',
                            'E' => 'Solicitação de trabalhos fora do prazo',
                            'F' => 'Solicitação para elaboração de TCC fora do prazo',
                            'G' => 'Solicitação de 2ª via da carteirinha de estudante',
                            'H' => 'Verificação de nota / frequência',
                            'I' => 'Dispensa de disciplina (anexo certificado)',
                            'J' => 'Trancamento de matricula',
                            'K' => 'Outro');
                        $attributes = array('legend' => false, 'text' => 'O abaixo assinado vem requerer:');
                        echo $this->Form->radio('requerimento', $options, $attributes); ?>
                    </div><!-- .form-group -->
                </div>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('jusitificativa',
                    array('type' => 'textarea', 'class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
         </fieldset>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
  </div>
</div>