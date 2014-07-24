<?php if (!is_front_page()): ?>
	<?php 
		$parent = array_reverse(get_post_ancestors($post->ID));
		$first_parent = get_page($parent[0]);
		$top_parent =  $first_parent->ID;
		$top_parent_title = $first_parent->post_title;
		$page_title = get_the_title($post->ID);

		if (is_woocommerce()) {
			$top_parent_title = 'Products';
		} 
		if ( is_product_category() ) {
			$product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );
			$page_title = $product_cats[0]->name;
		}

		if (is_home()) {
			$top_parent_title = 'News';
			$page_title = '';
		}

		if (is_single() || is_category()) {
			$top_parent_title = 'News';
		}
	 ?>	

	<div id="page-header" class="clearfix">
		<div class="container">
			<div id="parent-title" class="span two">
				<h2><?php echo $top_parent_title; ?></h2>	
			</div>
			<div id="page-title" class="span eight">
				<a class="nav-btn" id="nav-open-btn" href="#nav"><span></span></a>
				<a class="nav-btn" id="nav-close-btn" href="#nav">Close</a>
				<h1><?php echo $page_title; ?></h1>
			</div>
		</div>
	</div>		 	
<?php endif; ?>