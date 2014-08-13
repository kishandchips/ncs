<?php if (!is_front_page()): ?>
	<?php 
		$parent = array_reverse(get_post_ancestors($post->ID));
		$first_parent = get_page($parent[0]);
		$top_parent =  $first_parent->ID;
		$top_parent_title = $first_parent->post_title;
		$page_title = get_the_title($post->ID);

		if (is_woocommerce()) {
			$top_parent_title = 'Products';
			$page_title = 'Products';	
		} 
		if ( is_product_category() ) {
			$queried_object = get_queried_object(); 
			$queried_object_name = $queried_object->name;
			$page_title = $queried_object_name;		
		}

		if (is_home()) {
			$top_parent_title = 'News';
			$page_title = '';
		}

		if (is_single() || is_category()) {
			$top_parent_title = 'News';
			$page_title = 'Articles';
		}

		if ( is_singular( 'service' ) ) {
			$top_parent_title = 'Services';
			$page_title = get_the_title($post->ID);
		}	

		if ( is_singular( 'case_study' ) ) {
			$top_parent_title = '';
			$page_title = 'Case Studies';
		}		
	 ?>	

	<div id="page-header" class="clearfix <?php if (is_page(43)):?>environmental-policy<?php endif; ?>">
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