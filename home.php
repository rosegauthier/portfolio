<?php get_header();  ?>

<div class="main">
	<div class="container clearfix">

		<section class="blog-section">
			<?php // Start the loop ?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="blog-post">
					<div class="blog-image">
						<?php
						if ( has_post_thumbnail() ) {
							$featuredImage = hackeryou_featured_image_url($post);
						} 
						?>
						<img src="<?php echo $featuredImage ?>">
					</div>
					<div class="blog-info">
						<h3 class="category"><?php the_category(); ?></h3>
						<h3 class="blog-title"><a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title(); ?></a></h3>
						<p class="logistics"> Posted on
							<?php echo get_the_date(); ?> // 
							<a href="<?php comments_link(); ?>" class="comments-counter"><?php comments_number(); ?></a>
						</p>
						<a href="<?php the_permalink() ?>" rel="bookmark" ><?php echo wp_trim_words( get_the_content(), 100, '...' ); ?></a>
					</div>
				</div>

			<?php endwhile; // end the loop?>
			<?php the_posts_pagination( array(
		    'prev_text' => __( 'Prev', 'textdomain' ),
			) ); ?> 
		</section> <!-- /.blog-section -->

		<?php get_sidebar(); ?>

	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>