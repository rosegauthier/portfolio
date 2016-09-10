<?php get_header();  ?>

<div class="main">
	<?php // Start the loop ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

	<?php endwhile; // end the loop?>


	<section class="social">
		<h2>Socialize</h2>
		<ul class="social-list">
			<?php while(have_rows('social')) : the_row(); ?>
				<li>
					<a href="<?php the_sub_field('social_link'); ?>">
						<div class="icon-container">
							<i class="fa fa-<?php the_sub_field('social_icon'); ?>"></i>
						</div>
						<h3><?php the_sub_field('social_name'); ?></h3>
					</a>
				</li>
			<?php endwhile ?>
		</ul>
	</section>

	<section class="about" id="about">
		<div class="about-image">
			<?php $about_image = get_field('about_image'); ?>
			<img src="<?php echo $about_image['url']; ?>">
		</div>
		<div class="about-info">
			<h2><?php the_field('about_lead'); ?></h2>
			<h3><?php the_field('about_sub_lead'); ?></h3>
			<?php the_field('about_info'); ?>
		</div>
	</section>
	
	<section class="skills">
		<h2>Skills</h2>
		<div class="skill-container">
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-git"></span>
					<p>Git</p>
				</div>	
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-github_badge"></span>
					<p>Github</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-sublime"></span>
					<p>Sublime</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-jquery"></span>
					<p>jQuery</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-sass"></span>
					<p>Sass</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-css3"></span>
					<p>CSS3</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-html5"></span>
					<p>HTML5</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-wordpress"></span>
					<p>WordPress</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-gulp"></span>
					<p>Gulp</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-javascript_badge"></span>
					<p>JavaScript</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-terminal_badge"></span>
					<p>Terminal</p>
				</div>
			</div>
			<div class="single-skill">
				<div class="skill-info">
					<span class="devicons devicons-responsive"></span>
					<p>Responsive Design</p>
				</div>
			</div>
		</div>
	</section>
	
	<section class="portfolio" id="portfolio">
		<h2>Featured Work</h2>
		<div class="portfolio-container container">
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
					<div class="single-item">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<div class="portfolio-item">
								<?php while(have_rows('images')) : the_row(); ?>
									<div class="fp-portfolio-image-container">
							 			<?php $image = get_sub_field('image'); ?>
										<img src="<?php echo $image['url'] ?>">
										<div class="fp-portfolio-overlay">
											<p><?php the_field('short_desc') ?></p>
										</div>
									</div>
								<h3><?php the_title(); ?></h3>
								<p class="skills-used"><?php the_sub_field('caption'); ?></p>
								<?php endwhile ?>
							</div> <!-- .portfolio-item -->
						</a>
						<div class="live-demo">
							<a href="http://<?php the_field( 'project_url' ); ?>" class="link-to-view-live" target="_blank">View Live Demo</a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
			</div> <!-- .portfolio-container -->
	</section>

	<section class="fp-blog">
		<h2>From The Blog</h2>
		<div class="fp-blog-container container clearfix">
			<?php $blog = new WP_Query(
				array(
				  'post_type' => 'post',
				  'posts_per_page' => 2,
				  'order' => 'ASC'
				) 
			); 
		  	?>
			<?php if($blog->have_posts()): ?>
				<?php while($blog->have_posts()) : $blog->the_post(); ?>
					<div class="fp-single-post">
						<div class="fp-blog-image">
							<?php
							if ( has_post_thumbnail() ) {
								$featuredImage = hackeryou_featured_image_url($post);
								?> <img src="<?php echo $featuredImage ?>">
							<?php
							} 
							?>
						</div>
						<div class="fp-blog-info">
							<h3 class="category"><?php the_category(); ?></h3>
							<h3 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
							<p class="date">Posted on <?php echo get_the_date(); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</section>

	<section class="action">
		<h3>Interested in Working With Me?</h3>
		<p>I'm always looking for new challenges and interesting projects.</p>
		<a href="mailto:hello@roselgauthier.com">Get in Touch &rarr;</a>
	</section>

</div> <!-- /.main -->

<?php get_footer(); ?>