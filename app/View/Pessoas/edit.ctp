<div class="panel panel-default">

   <div class="panel-heading">
      <h3><?php echo __('Pessoa'); ?>                    <small><?php echo __('Edit') ?></small>
<?php echo $this->ButtonsActions->MakeButtons($this->params['controller'], $this->params['action'], $this->params['pass'][0]); ?>
      </h3>
   </div>

   <div class="panel-body">

      <div class="pessoas form">

         <?php echo $this->Form->create('Pessoa', array('role' => 'form', 'class'=>'form-horizontal'));
               $hidden = "";

               if($this->request->data['Pessoa']['pessoa'] == 'F'){
                  $hidden = "hidden";
               }
         ?>

         <fieldset>
            <div class="form-group">
               <?php echo $this->Form->input('pessoa',
                                             array('class' => 'form-control', 'autofocus' => 'autofocus', 'options' => array('F' => 'Fisica', 'J' => 'Juridica'), 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('fantasia',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('razaosocial',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('empresa',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('endereco',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('numero',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('bairro',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cidade_id',
                                             array('class' => 'form-control combobox', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('cep',
                                             array('class' => 'form-control cep', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fone',
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fax',
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('celular',
                                             array('class' => 'form-control dddphone', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('email',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('emailalt',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('site',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->

            <div class="form-group">
               <?php echo $this->Form->input('cnpjcpf',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
	             <?php echo $this->Form->label(__('conveniada'), null, array('class'=>'col-sm-2 control-label'));
                      echo $this->Form->input('conveniada',
                            array('type' => 'checkbox', 'class' => 'form-control checkbox2',
                                  'before'=>'<div class="col-sm-2">',
                                  'after'=>'</div>', 'div'=>false, 'label'=>false)); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('resumo',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('obs',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('contato',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('ie',
                                             array('class' => 'form-control', 'label'=>array('text' => 'Inscriçao Estadual', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('im',
                                             array('class' => 'form-control', 'label'=>array('text' => 'Inscriçao Municipal', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('orgao',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('orgaonum',
                                             array('class' => 'form-control', 'label'=>array('text' => 'Numero', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('ramo',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('secundario',
                                             array('class' => 'form-control', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group">
               <?php echo $this->Form->input('fundacao',
                                             array('class' => 'form-control datepicker-start', 'type' => 'text', 'label'=>array('class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('juntacomercial',
                                             array('class' => 'form-control', 'label'=>array('text' => 'Junta Comercial', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->
            <div class="form-group pessoa-juridica <?php echo $hidden;?>">
               <?php echo $this->Form->input('desconto',
                                             array('class' => 'form-control', 'label'=>array('text' => 'Desconto', 'class'=>'col-sm-2 control-label'), 'div'=>true, 'between'=>'<div class="col-sm-10">', 'after'=>'</div>')
                                            ); ?>
            </div><!-- .form-group -->

            <?php echo $this->Form->button('<i class="fa fa-save"></i>'.' '.__('Submit'), array('class' => 'btn btn-large btn-primary', 'type'=>'submit')); ?>

         </fieldset>

         <?php echo $this->Form->end(); ?>

      </div><!-- /.form -->

   </div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
<script>
   $('#PessoaPessoa').change(function(){
      if($(this).val()=='F'){
         //$('#PessoaCnpjcpf').removeClass('cnpj');
         //$('#PessoaCnpjcpf').addClass('cpf');
         $('.pessoa-juridica').addClass('hidden');
      }else{
         //$('#PessoaCnpjcpf').removeClass('cpf');
         //$('#PessoaCnpjcpf').addClass('cnpj');
         $('.pessoa-juridica').removeClass('hidden');
      }
   });
   $(function(){
       $('#PessoaPessoa').trigger('change');
   });
</script>