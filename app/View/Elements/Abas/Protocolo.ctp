<div class="panel panel-default">
  <div class="panel-body">
      <div class="portal form">
         <?php echo $this->Form->create('portal', array('role' => 'form', 'class'=>'form-horizontal', 'action' => 'protocolo')); ?>
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
            <b>O abaixo assinado vem requerer:</b>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <?php $options = array(
        'Declaração de frequência / matrícula' => 'Declaração de frequência / matrícula', 
        'Declaração de regularidade de pagamentos' => 'Declaração de regularidade de pagamentos',
        'Solicitação de histórico escolar' => 'Solicitação de histórico escolar',
        'Solicitação de certificado de conclusão de curso' => 'Solicitação de certificado de conclusão de curso',
        'Solicitação de trabalhos fora do prazo' => 'Solicitação de trabalhos fora do prazo',
        'Solicitação para elaboração de TCC fora do prazo' => 'Solicitação para elaboração de TCC fora do prazo',
        'Solicitação de 2ª via da carteirinha de estudante' => 'Solicitação de 2ª via da carteirinha de estudante',
        'Verificação de nota / frequência' => 'Verificação de nota / frequência',
        'Dispensa de disciplina (anexo certificado)' => 'Dispensa de disciplina (anexo certificado)',
        'Trancamento de matricula' => 'Trancamento de matricula',
        'Outro' => 'Outro');
                        $attributes = array('legend' => false, 'text' => 'O abaixo assinado vem requerer:');
                        echo $this->Form->radio('requerimento', $options, $attributes); ?>
                    </div><!-- .form-group -->
                </div>
            </div>
            <div class="form-group">
                <?php echo $this->Form->input('justificativa',
                    array('type' => 'textarea', 'class' => 'form-control', 'label'=>array('class'=>'col-sm-1 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')); ?>
            </div><!-- .form-group -->
         </fieldset>
         <?php echo $this->Form->button('<i class="fa fa-share"></i>'.' '.__('Enviar'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>
         <?php echo $this->Form->end(); ?>
      </div><!-- /.form -->
  </div>
</div>