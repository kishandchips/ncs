	</div><!-- #main -->

		<?php
		global $wp_query;
		$post_id = $wp_query->post->ID; ?>



		<?php if(is_front_page() || get_post_meta($post_id, 'show_newsletter_signup_box', true)): ?>
			<div id="newsletter">
				<div class="container">
					<?php gravity_form(1, true, true, false, '', true); ?>
				</div>				
			</div>
		<?php endif; ?>		

		<?php wp_reset_query(); ?>	<!-- #newsletter -->
	<footer id="footer"  role="contentinfo">
		<div class="container">
			<div class="span two">
				<?php dynamic_sidebar( 'footer-first' ); ?>
			</div>
			<div class="span two">
				<?php dynamic_sidebar( 'footer-second' ); ?>
			</div>
			<div class="span six break-on-mobile">
				<?php dynamic_sidebar( 'footer-third' ); ?>
			</div>
		</div> 		
	</footer><!-- #colophon -->
	<div id="follow">
		<div class="container">
			<span class="title"><?php _e('Follow NCS on:') ?></span>
			<a class="facebook" href="<?php the_field('facebook_profile_url', 'option'); ?>" target="_blank"><?php _e('Facebook') ?></a>
			<a class="twitter" href="<?php the_field('twitter_profile_url', 'option'); ?>" target="_blank"><?php _e('Twitter') ?></a>
			<a class="linkedin" href="<?php the_field('linkedin_profile_url', 'option'); ?>" target="_blank"><?php _e('LinkedIn') ?></a>
			<a class="youtube" href="<?php the_field('youtube_profile_url', 'option'); ?>" target="_blank"><?php _e('Youtube') ?></a>
		</div>
	</div>	
	<div class="credits">
		<div class="container">
			<div class="span seven">
				<span class="copyright">
					&copy; <?php bloginfo('title'); ?> <?php the_time(Y); ?>
				</span>
				<?php wp_nav_menu( array( 'theme_location' => 'footer-credits', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
			</div>
			<div class="span three siteby">
				<?php _e('Site by ') ?><a href="http://www.kishandchips.com" target="_blank"><?php _e('Kish and Chips') ?></a>
			</div>
		</div>
	</div>
</div><!-- #wrap -->
<?php wp_footer(); ?>
</body>
</html>