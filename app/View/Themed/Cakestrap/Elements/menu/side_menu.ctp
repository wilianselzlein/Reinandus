<ul class="nav navbar-nav side-nav">
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Cadastros');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="demo" class="collapse">
         <li><?php echo $this->Html->link(__('Alunos'),                       array('controller'=>'Alunos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Professores'),                  array('controller'=>'Professores','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Cursos'),                       array('controller'=>'Cursos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Disciplinas'),                  array('controller'=>'Disciplinas','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Empresas/Pessoas'),             array('controller'=>'Pessoas','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Cidades'),                      array('controller'=>'Cidades','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Contas'),                       array('controller'=>'Contas','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Formas de Pagamento'),          array('controller'=>'FormasPagamentos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Grupos'),                       array('controller'=>'Grupos','action'=>'index'));?></li>

      </ul>
   </li>
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#sec"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Secretaria');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="sec" class="collapse">
         <li><?php echo $this->Html->link(__('Avisos, Materiais e Noticias'), array('controller'=>'Avisos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Contrato Alunos'),              array('controller'=>'Contratos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Contrato Professores'),         array('controller'=>'Contratos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Notas e Frequencias'),          array('controller'=>'Notas','action'=>'index'));?></li>
      </ul>
   </li>
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#fin"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Financeiro');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="fin" class="collapse">
         <li><?php echo $this->Html->link(__('Mensalidades'),                 array('controller'=>'Mensalidades','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Contas a Pagar'),               array('controller'=>'Pagar','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Gerar Mensalidades'),           array('controller'=>'Contratos','action'=>'index'));?></li>
      </ul>
   </li>
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#con"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Controladoria');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="con" class="collapse">
         <li><?php echo $this->Html->link(__('Histórico Padrão'),              array('controller'=>'HistoricoPadrao','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Plano de Contas'),              array('controller'=>'PlanoContas','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Lancamentos'),                  array('controller'=>'Lancamentos','action'=>'index'));?></li>
      </ul>
   </li>
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#rel"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Relatorios');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="rel" class="collapse">
         <li><?php echo $this->Html->link(__('Alunos'),                       array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Cursos'),                       array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Declaracoes'),                  array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Gerenciamento de Alunos'),      array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Mensalidades'),                 array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Contas a Pagar'),               array('controller'=>'Relatorios','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Gerencial'),                    array('controller'=>'Relatorios','action'=>'index'));?></li>
      </ul>
   </li>
   <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#cfg"><i class="fa fa-fw fa-arrows-v"></i><?php echo __('Configuracoes');?><i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="cfg" class="collapse">
         <li><?php echo $this->Html->link(__('Parametros'),                   array('controller'=>'Parametros','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Usuarios'),                     array('controller'=>'Usuarios', 'action' => 'index'));?></li>
         <li><?php echo $this->Html->link(__('Acessos de Alunos'),            array('controller'=>'Acessos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Permissoes de Usuarios'),       array('controller'=>'Permissoes','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Cabecalhos'),                   array('controller'=>'Cabecalhos','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Enumerados'),                   array('controller'=>'Enumerados','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Estados'),                      array('controller'=>'Estados','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Instituto'),                    array('controller'=>'Instituto','action'=>'index'));?></li>
         <li><?php echo $this->Html->link(__('Programas'),                    array('controller'=>'Programas','action'=>'index'));?></li>
      </ul>
   </li>
</ul>