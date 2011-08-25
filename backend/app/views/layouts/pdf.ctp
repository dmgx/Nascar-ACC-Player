<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('NASCAR ACC Video Player PDF File'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
            &nbsp;
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
            <p><?php echo $this->Html->link(__('ACC 2011 &copy All Rights Reserved', true), 'http://www.theacc.com/',array('escape'=>false)); ?></p>
            <p><?php echo $this->Html->link(__('DMGx', true), 'http://www.dmgx.com/'); ?></p>
		</div>
	</div>
</body>
</html>