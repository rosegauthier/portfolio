<?php get_header();  ?>

<div class="main">
  <div class="container">

	<section class="portfolio-piece">

	  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	  	<?php $do_not_duplicate = $post->ID; ?>
		<?php $featurePortfolioImage = hackeryou_featured_image_url($post); ?>
		<a href="http://<?php the_field('project_url'); ?>" class="demo-image-link" target="_blank">
			<div class="feature-portfolio-image">
				<?php if ( $post->ID == 9 ){ ?>
					<div class="divider-wrapper desktop-only">
					  <div class="code-wrapper" style="background: url(<?php bloginfo( 'template_url' ) ?>/images/darkheading2-compressor.png); background-size: cover; background-repeat: no-repeat;">
					    <div class="design-wrapper">
					      <div class="design-image" style="background: url(<?php bloginfo( 'template_url' ) ?>/images/lightheading-compressor.png); background-size: cover; background-repeat: no-repeat;"></div>
					    </div>
					  </div>
					  <div class="divider-bar"></div>
					</div>
					<div class="slider-caption desktop-only">User can upload their own content and choose the colour scheme for a completely unique style using the same theme</div>
					<img src="<?php echo $featurePortfolioImage; ?>" class="mobile-only">
				<?php } else { ?>
					<img src="<?php echo $featurePortfolioImage; ?>">
				<?php } ?>
			</div>
		</a>
		<h2 class="portfolio-title"><?php the_title(); ?></h2>
		<div class="live-demo">
			<a href="http://<?php the_field('project_url'); ?>" class="link-to-view-live" target="_blank">View Live Demo</a>
		</div>
		<ul>
			<li><p>Date :</p><p><?php the_field('port_date'); ?></p></li>
			<li><p>Skills :</p><p><?php the_field('skills'); ?></p></li>
		</ul>
		<div class="project-info-container clearfix">
			<div class="project-info">
				<p class="about-project">About Project</p>
				<div class="project-desc">
					<?php the_content(); ?>
				</div>
				<div class="share-project">
					<span>Share :</span>
					<a href="https://twitter.com/home?status=http%3A//<?php the_field('project_url'); ?>"><i class="fa fa-twitter"></i></a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A//<?php the_field('project_url'); ?>"><i class="fa fa-facebook"></i></a>
				</div>
			</div>
			<?php while(have_rows('images')) : the_row(); ?>
			 	<?php $image = get_sub_field('image'); ?>
			 	<div class="single-port-mockup">
					<img src="<?php echo $image['url'] ?>">
				</div>
			<?php endwhile ?>
		</div>
	<?php endwhile; // end the loop?>

		<div class="related">
			<h2>Related Projects</h2>
			<div class="portfolio-container related-container">
				<?php $portfolio = new WP_Query(
					array(
						'post_type' => 'portfolio',
						'posts_per_page' => -1,
						'order' => 'ASC'
					) 
				); 
				?>
				<?php if($portfolio->have_posts()): ?>
					<?php while($portfolio->have_posts()) : $portfolio->the_post(); ?>
						<?php if( $post->ID == $do_not_duplicate ) continue; ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" class="related-portfolio-item" title="Permanent Link to <?php the_title_attribute(); ?>">
						<div class="portfolio-item">
							<?php while(have_rows('images')) : the_row(); ?>
								<div class="fp-portfolio-image-container">
						 			<?php $image = get_sub_field('image'); ?>
									<img src="<?php echo $image['url'] ?>">
									<div class="fp-portfolio-overlay">
										<p><?php the_field('short_desc') ?></p>
									</div>
								</div>
								<div class="fp-portfolio-info-container">
									<h3><?php the_title(); ?></h3>
									<p class="skills-used"><?php the_sub_field('caption'); ?></p>
								</div>
							<?php endwhile ?>

						</div> <!-- .portfolio-item -->
						</a>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>		


	</section>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>