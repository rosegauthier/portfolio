<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="icon" type="image/png" href="<?php bloginfo( 'template_url' ) ?>/images/favicon.ico" sizes="16x16">
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<div class="outer-wrapper">
	<?php if( is_front_page() ) { ?>
		<header class="front-header">
			<div class="nav-bar clearfix">

				<div class="logo-container">
					<img src="<?php bloginfo( 'template_url' ) ?>/images/wallpaper.jpg" alt="" class="macbook">
					<div class="logo-overlay" id="drawing"></div>
				</div>
				<div class="hamburger">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</div>
				<?php wp_nav_menu( array(
				  'container' => false,
				  'theme_location' => 'primary'
				)); ?>
			</div> <!-- .nav-bar -->
			<h1> Hi! I'm <?php bloginfo( 'name' ); ?>, Web Developer.</h1>
			<div class="gallery" data-flickity='{ "wrapAround": true, "imagesLoaded": true }'>
				<?php while(have_rows('macbook_gallery')) : the_row(); ?>
					<div class="gallery-item">
						<div class="macbook-image">
							<img src="<?php bloginfo( 'template_url' ) ?>/images/elements.png" alt="" class="macbook">
							<?php $macbook_image = get_sub_field('macbook_image'); ?>
							<img src="<?= $macbook_image['url'] ?>" class="portfolio-mockup">
						</div>
						<div class="live-demo">
							<a href="<?php the_sub_field( 'portfolio_post' ); ?>" class="link-to-view-live" target="_blank">View Live Demo</a>
						</div>
					</div>
				<?php endwhile ?>
			</div> <!-- flickety-gallery -->
		</header><!--/.header-->
	<?php 
	}else{
	?>
		<header class="secondary-header">
			<div class="nav-bar clearfix">
				<div class="logo-container">
					<img src="<?php bloginfo( 'template_url' ) ?>/images/wallpaper.jpg" alt="" class="macbook">
					<div class="logo-overlay" id="drawing"></div>
				</div>
				<div class="hamburger">
				  <span></span>
				  <span></span>
				  <span></span>
				  <span></span>
				</div>
				<?php wp_nav_menu( array(
				  'container' => false,
				  'theme_location' => 'secondary'
				)); ?>
			</div> <!-- .nav-bar -->
			<div class="header-container container">
				<div class="header-box"></div>
				<div class="headings">
					<?php if(is_home()) {
						?>
						<h1> <?php echo get_the_title(77) ?> </h1>
						<h3>Home // <?php echo get_the_title(77); ?></h3>
						<?php
					} 
					else {
					?>	
					<h1><?php echo get_the_title(); ?></h1>
					<h3>Home // <?php echo get_the_title(); ?></h3>
					<?php	
					} ?>
				</div>
			</div>
		</header>
	<?php } ?>
	<script>
		var wpPath = '<?php bloginfo( 'template_url' ) ?>';
	</script>

