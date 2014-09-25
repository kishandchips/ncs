<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!--

 __   .__       .__                       .___     .__    .__              
|  | _|__| _____|  |__ _____    ____    __| _/____ |  |__ |__|_____  ______
|  |/ /  |/  ___/  |  \\__  \  /    \  / __ |/ ___\|  |  \|  \____ \/  ___/
|    <|  |\___ \|   Y  \/ __ \|   |  \/ /_/ \  \___|   Y  \  |  |_> >___ \ 
|__|_ \__/____  >___|  (____  /___|  /\____ |\___  >___|  /__|   __/____  >
     \/       \/     \/     \/     \/      \/    \/     \/   |__|       \/                      
                                                                                                                                                     
Designed & Developed by Kish and Chips
- - -
http://kishandchips.com
http://facebook.com/kishandchips
@kc_create
- - -

-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<![endif]-->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'> 
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->

	<!-- LeadForensics -->
	<script type="text/javascript" src="http://trackercloud.net/js/14438.js"></script>
	<noscript><img src="http://trackercloud.net/images/track/14438.png?trk_user=14438&trk_tit=jsdisabled&trk_ref=jsdisabled&trk_loc=jsdisabled" height="0px" width="0px" style="display:none;" /></noscript>

    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>		
</head>

<body <?php body_class(); ?>>
	<div id="wrap">
		<header id="header" role="banner" class="clearfix container">
			<a href="<?php bloginfo('url'); ?>" class="logo-container span two">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/logos/header.png" alt="<?php bloginfo( 'title' ); ?>" title="<?php bloginfo( 'title' ); ?>">
			</a>
			<div class="navigation-container span eight">
				<div class="information">
					<div class="buttons">
						<a href="<?php bloginfo('url'); ?>/get-in-touch/" class="get-in-touch">
							<?php _e('Get in touch'); ?>
						</a>
						<a href="" class="live-chat ClickdeskChatLink" image="false">
							<?php _e('Live chat'); ?>
						</a>
					</div>				
					<p><?php _e('For friendly advice or technical support, call: ') ?><span><?php the_field('phone_number', 'option'); ?></span></p>
				</div>
				<nav class="top-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary_header', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
					<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url'); ?>">
							<input type="text" value="" name="s" id="s" placeholder="Search...">
							<input type="submit" id="searchsubmit" value="Search">
					</form>					

					<div class="woo-nav">
						<ul>
						<?php if ( is_user_logged_in() ): ?>
							<li class="logout">
								<?php $redirect_url = (isset($post->ID)) ? get_permalink($post->ID) : home_url(); ?>
								<a class="btn logout-btn" href="<?php echo wp_logout_url($redirect_url); ?>"><span><?php _e("Logout", 'ivip'); ?></span></a>
							</li>
							<li class="account">
								<a class="btn account-btn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><span><?php _e("My Account", 'ivip'); ?></span></a>
							</li>
							<?php else: ?>
							<li class="login">
								<a class="btn logout-btn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><span><?php _e("Login", 'ivip'); ?></span></a>	
							</li>
						<?php endif; ?>						
						<?php global $woocommerce; ?> 
							<li class="cart">
								<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><span>
									<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span>
								</a>
							</li>
						</ul>
					</div>
				</nav>	        	
				<nav role="navigation" class="main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary_header', 'menu_class' => 'clearfix menu', 'container' => false ) ); ?>
				</nav>	        	
			</div>
		</header><!-- #masthead -->
		<div id="main" role="main">
		<?php get_template_part('titles'); ?>