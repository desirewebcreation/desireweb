<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'NibiruCRM: Lets convert leads.');
$cakeVersion = __d('cake_dev', 'NibiruCRM %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->css('bootstrap');     
		//	echo $this->Html->css('bootstrap.min'); 
		echo $this->Html->css('font-awesome'); 
		echo $this->Html->css('jquery-ui'); 
		echo $this->Html->css('bootstrap-theme.min');   
		echo $this->Html->css('fullcalendar.min'); 
		echo $this->Html->css('fullcalendar.print');  
		echo $this->Html->css('custom');  
				
		echo $this->Html->css('jquery.mCustomScrollbar');  
		echo $this->fetch('script');
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('jquery.min-1.2');
		//echo $this->Html->script('jquery-1.10.2 ');
		//echo $this->Html->script('jquery');
		 
		echo $this->Html->script('moment.min');   
		echo $this->Html->script('fullcalendar.min');
		
		echo $this->Html->script('jquery-ui'); 
		
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('jquery.mCustomScrollbar.concat.min');
	?>
</head>
<body>
	
		
               <?php echo $this->element('header/header'); ?>
		
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		  <?php echo $this->element('footer/footer'); ?>
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
<?php echo $this->element('sql_dump');?>