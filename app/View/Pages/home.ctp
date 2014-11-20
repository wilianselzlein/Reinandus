<?php
/**
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */

if (!Configure::read('debug')):
	throw new NotFoundException();
endif;

App::uses('Debugger', 'Utility');
?>
<h2><?php echo __d('cake_dev', 'Sistema Reinandus de Gestao - %s.', Configure::version()); ?></h2>
<?php
if (Configure::read('debug') > 0):
	Debugger::checkSecurityKeys();
endif;
?>
<?php if (file_exists(WWW_ROOT . 'css' . DS . 'cake.generic.css')): ?>
	<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;">
		<?php echo __d('cake_dev', 'URL rewriting is not properly configured on your server.'); ?>
		1) <a target="_blank" href="http://book.cakephp.org/2.0/en/installation/url-rewriting.html" style="color:#fff;">Help me configure it</a>
		2) <a target="_blank" href="http://book.cakephp.org/2.0/en/development/configuration.html#cakephp-core-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
	</p>
<?php endif; ?>

<h3><?php echo __('Alunos'); ?></h3>
<p>
<ul>
	<li>
		<?php echo $this->Html->link('Ativos', '') ?>:
		<?php echo __('XX cadastrado(s).'); ?>
	</li>
	<li>
		<?php echo $this->Html->link('Inativos', '') ?>:
		<?php echo __('XX cadastrado(s).'); ?>
	</li>
</ul>
</p>
<h3><?php echo __('Cursos'); ?></h3>
<p>
<ul>
	<li>
		<?php echo $this->Html->link('Gestao Empresarial', '') ?>:
		<?php echo __('XX aluno(s) cadastrado(s).'); ?>
	</li>
	<li>
		<?php echo $this->Html->link('Controladoria e Financas', '') ?>:
		<?php echo __('XX cadastrado(s).'); ?>
	</li>
</ul>
</p>
<h3><?php echo __('Financeiro'); ?></h3>
<p>
<ul>
	<li>
		<?php echo $this->Html->link('Receber', '') ?>:
		<?php echo __('R$ 0,00 na semana.'); ?>
	</li>
	<li>
		<?php echo $this->Html->link('Pagar', '') ?>:
		<?php echo __('R$ 0,00 na semana.'); ?>
	</li>
</ul>
</p>