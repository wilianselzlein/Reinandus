<?php if (count($convenios) == 0) { ?> 
  <div class="alert alert-info" role="alert">
    <b>Nenhum convênio cadastrado.</b>
  </div>
<?php } ?>
<div class="panel panel-default">
<table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Empresa</th>
            <th>Contato</th>
            <th>Telefone</th>
            <th>Desconto</th>
          </tr>
        </thead>
        <tbody>
<?php foreach ($convenios as $convenio): ?>
          <tr>
            <td>
<?php
if (count($convenio['Logo']) > 0) {
  //echo $this->Html->image(Router::url(array('controller' => 'logos', 'action' => 'logo', convenio['Logo'][0]['id'],)));
  //echo $convenio['Logo'][0]['imagem'];
  echo $this->Html->image('logos/thumbs/'.$convenio['Logo'][0]['logo'], 
    array('align'=> 'center', 'height' => '50', 'width' => '50')); 
}
?>
            </td>
            <td>
            <?php 
              if ($convenio['Pessoa']['fantasia'] == '')
                 echo $convenio['Pessoa']['razaosocial'];
              else
                 echo $convenio['Pessoa']['fantasia'];
            ?>
            </td>
            <td><?php echo $convenio['Pessoa']['contato']; ?></td>
            <td><?php echo $convenio['Pessoa']['fone']; ?></td>
            <td><?php echo $convenio['Pessoa']['desconto']; ?>%</td>
          </tr>

<?php endforeach; ?>
        </tbody>
      </table>

</div>