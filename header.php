<!doctype html>
<html <?php language_attributes(); ?> class="no-js" lang="es">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
		<!-- icons -->
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
			
		<!-- css + javascript -->
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/stylesheets/app.css">

	</head>
	<body <?php body_class(); ?>>
	
		<!-- wrapper -->
		<div class="wrapper">
	
			<!-- header -->
			<header class="header clear" role="banner">
				
					<!-- logo -->
					<div class="logo">
						<h1>
							<a href="<?php echo home_url(); ?>">
								<?php echo get_bloginfo('name') ?>
								<small><?php echo get_bloginfo('description') ?></small>
							</a>
						</h1>
					</div>
					<!-- /logo -->
					
					<!-- nav -->
					<nav class="animenu" role="navigation">
						<input type="checkbox" id="button">
    					<label for="button" onclick>Menu</label>
						<?php html5blank_nav(); ?>
					</nav>
					<!-- /nav -->
			
			</header>
			<!-- /header -->