<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */
$cakeDescription = __d('cake_dev', 'Sistema de Pós-Graduação');
$copyright = 'GuildSoft';
?>
<?php echo $this->Html->docType('html5'); ?> 
<!DOCTYPE html>
<html>
   <head>
      <?php echo $this->Html->charset(); ?>
      <title>
         <?php echo $cakeDescription ?>:
         <?php echo $title_for_layout; ?>
      </title>
      <?php
            echo $this->Html->meta('icon');
            echo $this->fetch('meta');
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('sb-admin');
            echo $this->Html->css('bootstrap-dialog');
            echo $this->Html->css('font-awesome.min');
            echo $this->fetch('css');
            echo $this->Html->script('libs/jquery-1.10.2.min');
            echo $this->Html->script('libs/bootstrap.min');
            echo $this->Html->script('libs/bootstrap-dialog');
            echo $this->fetch('script');
      ?>
   </head>
   <body>
      <div id="container">
         <div class="container-fluid">                
            <?php echo $this->fetch('content'); ?>
         </div>
      </div>
   </body>
</html>