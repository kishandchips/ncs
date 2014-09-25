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
<!-- ClickDesk Live Chat Service for websites -->
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyDwsSBXVzZXJzGIrgvs0FDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
<!-- End of ClickDesk -->
</body>
</html>