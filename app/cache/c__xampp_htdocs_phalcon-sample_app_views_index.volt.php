<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon Sample</title>
		<?php echo $this->tag->stylesheetLink('css/application.css'); ?>
	</head>
	<body>
		<div class="navbar navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php echo $this->tag->linkTo(array(null, 'class' => 'navbar-brand', 'Phalcon Sample')); ?>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav nav-pills pull-right">
						<li>
							<?php echo $this->tag->linkTo(array('posts', 'Blog')); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<?php echo $this->getContent(); ?>
		</div>
	</body>
</html>