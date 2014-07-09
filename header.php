<!DOCTYPE html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>   
	<?php wp_head(); ?>
	<!--[if lt IE 8]> <script src="<?php bloginfo('template_url')?>/js/lte-ie7.js"></script> <![endif]-->
	<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->
    <script type="text/javascript">
		var themeUrl = '<?php bloginfo( 'template_url' ); ?>';
		var baseUrl = '<?php bloginfo( 'url' ); ?>';
	</script>	
</head>

<body <?php body_class(); ?>>
	<div id="wrap">
		<header id="header" role="banner" class="clearfix container">
			<a href="/" class="logo-container span two">
				<img src="<?php bloginfo( 'template_url' ); ?>/images/logos/header.png" alt="<?php bloginfo( 'title' ); ?>" title="<?php bloginfo( 'title' ); ?>">
			</a>
			<div class="navigation-container span eight">
				<div class="information">
					<div class="buttons">
						<a href="" class="get-in-touch">
							<?php _e('Get in touch'); ?>
						</a>
						<a href="" class="live-chat">
							<?php _e('Live chat'); ?>
						</a>
					</div>				
					<p><?php _e('For friendly advice or technical support, call: ') ?><span><?php _e('01622 769692') ?></span></p>
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
								<a class="btn logout-btn" href="<?php echo wp_logout_url($redirect_url); ?>"><?php _e("Logout", 'ivip'); ?></a>
							</li>
							<li class="account">
								<a class="btn account-btn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><?php _e("My Account", 'ivip'); ?></a>
							</li>
							<?php else: ?>
							<li class="login">
								<a class="btn logout-btn" href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"><?php _e("Login", 'ivip'); ?></a>	
							</li>
						<?php endif; ?>						
						<?php global $woocommerce; ?> 
							<li class="cart">
								<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
									<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?>
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