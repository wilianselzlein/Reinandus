<p>Caro(a) <?php echo $User['User']['email']; ?>,</p>

<p>Você pode trocar a sua senha através do link abaixo:</p>
<?php $url = 'https://' . env('SERVER_NAME') . '/users/reset_password_token/' . $User['User']['reset_password_token']; ?>
<p><?php echo $html->link($url, $url); ?></p>

<p>Sua senha não vai poder ser alterada enquanto não acessar pelo link acima.</p>
<p>Obrigado e bom dia!</p>