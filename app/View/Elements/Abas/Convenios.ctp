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
<img src="http://intranet.iepg.edu.br:8080/Alunos/imagem.jsp?imgID=558" align="center" height="50" width="50" alt="">
            </td>
            <td><?php echo $convenio['Pessoa']['fantasia']; ?></td>
            <td><?php echo $convenio['Pessoa']['contato']; ?></td>
            <td><?php echo $convenio['Pessoa']['fone']; ?></td>
            <td><?php echo $convenio['Pessoa']['desconto']; ?></td>
          </tr>

<?php endforeach; ?>
        </tbody>
      </table>

</div>