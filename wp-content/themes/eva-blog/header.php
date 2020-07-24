<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php do_action( 'wp_body_open' ); ?>

		<span id="top"></span>
		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- logo -->
					<div class="logo">
						<a href="<?php echo esc_url( home_url()); ?>">
							<?php bloginfo('title'); ?>
						</a>
					</div>
		
					<!-- Site description -->
					<div class="site-description">
						<p><?php bloginfo('description'); ?></p>
					</div>

					<!-- Mobile menu button -->
					<div class="mobile-menu-button">
						<a href="#" id="show-mobile-menu-btn">[<?php esc_html_e('Menu', 'eva-blog'); ?>]</a>
					</div>

					<!-- nav -->
					<nav id="main-site-menu" class="nav main-menu" role="navigation">
						<?php eva_blog_nav(); ?>
					</nav>
			</header>
