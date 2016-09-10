		<footer>
			<div class="container">
			  <div class="footer-info" id="contact">
			  	<div class="footer-left">
			  		<h3>See More Work</h3>
		  			<?php while(have_rows('footer_port', 'option')) : the_row(); ?>
		  				<div class="outside-work">
	  						<a href="<?php the_sub_field('port_link'); ?>"><?php the_sub_field('port_icon') ?><p><?php the_sub_field('port_link_title'); ?></p></a>
	  					</div>
		  			<?php endwhile ?>
			  	</div>
			  	<div class="footer-middle">
			  		<div class="logo-container">
			  			<img src="<?php bloginfo( 'template_url' ) ?>/images/wallpaper.jpg" alt="" class="macbook">
			  			<div class="logo-overlay" id="drawing-2"></div>
			  		</div>
			  		<h2>Rose Gauthier</h2>
			  		<p>Web Developer</p>
			  		<?php 
			  			wp_nav_menu( array(
			  				'container' => false,
			  				'theme_location' => 'social'
			  			) );
			  		?>
			  	</div>
			  	<div class="back-to-top" id="scroll">
			  		<img src="<?php bloginfo( 'template_url' ) ?>/images/back-to-top.svg" alt="back to top arrow">
			  	</div>
			  	<div class="footer-right">
			  		<h3>Contact</h3>
			  		<p>Have questions? Let's chat!</p>
			  		<p>I'd love to hear from you.</p>
			  		<a href="mailto:hello@roselgauthier.com">hello [at] roselgauthier.com</a>
			  	</div>
			  </div>
			</div>
			<div class="footer-bottom">
				<p>Copyright &copy; <span>Rose Gauthier</span> <?php echo date('Y'); ?></p>
			</div>
		</footer>
	</div> <!-- .outer-wrapper -->

	<script>
	// scripts.js, plugins.js and jquery are enqueued in functions.php
	/* Google Analytics! */
	 var _gaq=[["_setAccount","UA-XXXXX-X"],["_trackPageview"]]; // Change UA-XXXXX-X to be your site's ID
	 (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	 g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
	 s.parentNode.insertBefore(g,s)}(document,"script"));
	</script>

	<?php wp_footer(); ?>
</body>
</html>