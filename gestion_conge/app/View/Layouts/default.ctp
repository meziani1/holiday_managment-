<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'ESPACE CONGEE');

?>
<?php
echo $this->Html->script('C:\wamp64\www\proj_2\app\webroot\js\jquery-3.6.0.min.js');
echo $this->Html->script('C:\wamp64\www\proj_2\app\webroot\js\jquery-ui.min.js');
echo $this->Html->css('C:\wamp64\www\proj_2\app\webroot\css\jquery-ui.css');
?>



<?php echo $this->Html->css('styles'); ?>
<?php echo $this->Html->script('C:\wamp64\www\proj_2\app\webroot\css\app.js') ?>
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
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo 'Espace congée';
			?>
		
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
