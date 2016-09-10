<?php get_header(); ?>

<div class="main">
  <div class="container">
	<section class="blog-section single-blog-section">
	  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
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
			  </div>

			  <div class="entry-content">
				<?php the_content(); ?>
				<?php wp_link_pages(array(
				  'before' => '<div class="page-link"> Pages: ',
				  'after' => '</div>'
				)); ?>
			  </div><!-- .entry-content -->

			  <div class="tags">Tags:  <?php echo get_the_tag_list(); ?></div>
		  </div>
		</div><!-- #post-## -->

		<div id="nav-below" class="navigation clearfix">
		  <p class="nav-previous"><?php previous_post_link('%link', '&larr; PREV POST'); ?></p>
		  <p class="nav-next"><?php next_post_link('%link', 'NEXT POST &rarr;'); ?></p>
		</div><!-- #nav-below -->

		<?php comments_template( '', true ); ?>

	  <?php endwhile; // end of the loop. ?>

	</section>

	<?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>