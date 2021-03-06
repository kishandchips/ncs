<?php
/**
 * Content templates
 * @package ncs
 * @since ncs 1.0
 */
?>

<?php
/********************************
 * Front Page - Section template
********************************/
?>
<?php if (is_front_page()): ?>
	<div class="page-content">
	<?php if(get_field('introduction')): ?>
		<div class="span seven break-on-mobile">
			<?php the_field('introduction') ?>
		</div>
	<?php endif; ?>
	<?php if(get_field('support')): ?>
		<div class="span three break-on-mobile hide-on-mobile">
			<aside id="" class="widget_support_widget"> 
				<div class="support">
					<?php the_field('support') ?>
				</div>
			</aside>
		</div>
	<?php endif; ?>
	</div>


	<?php while(has_sub_field("section")): $e++; ?>
		<section <?php if(get_sub_field('background')): ?>style="background: url('<?php the_sub_field('background'); ?>')"<?php endif; ?>>
			<div class="section-inner">
				<h1 class="section-title"><?php the_sub_field('section_title'); ?></h1>

				<?php if( have_rows('add_row') ): ?>

					<?php while ( have_rows('add_row') ) : the_row();  ?>
							<?php while (have_rows('add_box')) : the_row(); ?>
								<?php 						
									if ( get_sub_field('box_size') == 'small') {
										$boxclass = 'two';
									} elseif (get_sub_field('box_size') == 'medium') {
										$boxclass = 'four half';
									} else {
										$boxclass = 'four';
									}

									if (get_sub_field('vertical_align') == 'bottom') {
										$valign = 'valign-bottom';
									} else {
										$valign = 'valign-top';
									}
								 ?>
								<div class="span <?php echo $boxclass; ?> <?php echo $valign; ?> <?php the_sub_field('row_class') ?>" <?php if ( get_sub_field('box_margin')): ?>style="margin: <?php the_sub_field('box_margin'); ?>"<?php endif; ?> >
									<a <?php if(get_sub_field('box_link')): ?>href="<?php the_sub_field('box_link'); ?>"<?php endif; ?> class="<?php the_sub_field('title_position') ?> <?php if (get_sub_field('video_link')) { echo 'popup-youtube'; } ?>" style="background-image: url('<?php the_sub_field('box_image'); ?>')">
										<?php if (get_sub_field('box_title')): ?>
											<div class="title <?php the_sub_field('box_color'); ?>">
												<?php the_sub_field('box_title'); ?>
											</div>									
										<?php endif; ?>									
									</a>
								</div>
							<?php endwhile; ?>        
				    <?php endwhile;  ?>

				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	<?php
	/****************************************
	 * Front Page - Offers & Bundles template
	****************************************/
	?>
	<?php while(has_sub_field("offers_bundle_deals")): $e++; ?>
		<section id="offers" class="offers">
			<div class="section-inner">
				<div class="title"><?php the_sub_field('section_title'); ?></div>

				<?php if( have_rows('add_box') ): ?>
					<?php while (have_rows('add_box')) : the_row(); ?>
						<?php 						
							if ( get_sub_field('box_size') == 'small') {
								$boxclass = 'third';
							} else {
								$boxclass = 'third large';
							}
						 ?>
						<div class="span <?php echo $boxclass; ?>">
							<a href="<?php the_sub_field('box_link'); ?>" style="background-image: url('<?php the_sub_field('box_image'); ?>')">
								<?php if (get_sub_field('box_title')): ?>
									<h1 class="offer-title <?php the_sub_field('box_color'); ?>">
										<?php the_sub_field('box_title'); ?>
									</h1>									
								<?php endif; ?>									
							</a>
						</div>
					<?php endwhile; ?>        
				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php 
/********************************
 * Regular Content
********************************/
 ?>

<?php $id = (isset($id)) ? $id : $post->ID; ?>
<?php $i = 0; ?>
<?php if(get_field('content', $id)): ?>
<?php while (has_sub_field('content', $id)) : ?>
<?php
	$layout = get_row_layout();
	switch($layout){

		case 'row':	
		if(get_sub_field('column')): ?>
					
			<div class="row" style="
				<?php if (get_sub_field('background_color')): ?>background-color: <?php the_sub_field('background_color'); ?>; <?php endif; ?>
				<?php if (get_sub_field('background_image')): ?>background-image: url('<?php the_sub_field('background_image'); ?>');<?php endif; ?>
				<?php if (get_sub_field('css')):?><?php the_sub_field('css'); ?><?php endif; ?>
				">
				<div class="inner container">
				<?php if (get_sub_field('row_title')):?>
					<h1 class="row-title"><?php the_sub_field('row_title'); ?></h1>
				<?php endif; ?>
				
				<?php $total_columns = count( get_sub_field('column', $id)); ?>
				<?php while (has_sub_field('column', $id)) : ?>
					<?php
					switch($total_columns){
						case 2:
							$class = 'five';
							break;
						case 3:
							$class = 'one-third';
							break;
						case 4:
							$class = 'one-fourth';
							break;
						case 5:
							$class = 'one-fifth';
							break;
						case 6:
							$class = 'one-sixth';
							break;
						case 1:
						default:
							$class = 'ten';
							break;
					} ?>
					<div class="break-on-tablet span <?php if (get_sub_field('column_width')):?><?php the_sub_field('column_width'); ?><?php else: ?><?php echo $class; ?><?php endif; ?>" style="
					<?php if (get_sub_field('text_color')):?>color: <?php the_sub_field('text_color'); ?>;<?php endif; ?>
					">
						<?php the_sub_field('column-content'); ?>
					</div>
				<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
		
		
	<?php } ?>

<?php $i++; ?>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php
/****************************************
 * About US Infographics
****************************************/
?>
<?php if(get_field('include_about_us_inforgraphics_on_page', $id)): ?>
<div id="about-us">
	<div class="row">
		<div class="span five bespoke">
			<div class="top">
				<div class="desc">
					<?php the_field('bespoke_desc'); ?>
				</div>
			</div>
			<div class="bottom">
				<h2><?php _e('Since 2004 we have installed and powered:') ?></h2>
				<div class="span five">
					<div class="cabling">
						<span>
							<?php the_field('cabling'); ?>	
						</span>
						<?php _e('of Cabling') ?>
					</div>					
				</div>
				<div class="span five">
					<div class="screens">
						<div class="span six">
							<span>
								<?php the_field('interactive_screens'); ?>
							</span>
						</div>
						<div class="span four">
							<?php _e('Interactive<br>Screens') ?>
						</div>
						
					</div>
					<div class="lighting">
						<span>
							<?php the_field('lighting_systems'); ?>
						</span>
						<?php _e('100w light bulbs'); ?><br>
						<?php _e('per year'); ?>
					</div>					
				</div>
			</div>
		</div>
		<div class="span five quality">
			<div class="top">
				<div class="desc">
					<?php the_field('high_quality_desc'); ?>
				</div>
			</div>
			<div class="bottom">
				<h4>
					<?php _e('Over the years we have provided services for:'); ?>
				</h4>
				<div class="span third">
					<div class="span five break-on-mobile illustration"><img src="<?php bloginfo('template_directory') ?>/images/icons/school.png" alt=""></div>
					<div class="span five num"><?php the_field('school_num_kent'); ?></div>
					<?php the_field('school_num_kent_description'); ?>					
				</div>
				<div class="span third">
					<div class="span five break-on-mobile illustration"><img src="<?php bloginfo('template_directory') ?>/images/icons/school.png" alt=""></div>
					<div class="span five num"><?php the_field('school_num'); ?>	</div>
					<?php the_field('school_num_description'); ?>
				</div>
				<div class="span third">
					<div class="span five break-on-mobile illustration"><img src="<?php bloginfo('template_directory') ?>/images/icons/commercial.png" alt=""></div>
					<div class="span five num"><?php the_field('school_num_commercial'); ?></div>
					<?php the_field('school_num_commercial_description'); ?>
					
				</div>
			</div>
		</div>
		<div class="span five support">
			<div class="top">
				<div class="desc">
					<?php the_field('excellent_desc'); ?>	
				</div>	
			</div>
			<div class="bottom">
				<div class="span five left">
				<img src="<?php bloginfo('template_directory') ?>/images/icons/including.jpg" alt="">
				<span><?php the_field('staff'); ?></span><br>
				<?php _e('Staff') ?>
				</div>
				<div class="span five right">
					<div>
						<span><img src="<?php bloginfo('template_directory') ?>/images/icons/engineer.png" alt=""></span>
						<span class="num"><?php the_field('engineers'); ?></span><?php _e('Engineers'); ?>
					</div>
					<div>
						<span><img src="<?php bloginfo('template_directory') ?>/images/icons/support.png" alt=""></span>
						<span class="num"><?php the_field('support'); ?></span><?php _e('Support'); ?>
					</div>
					<div>
						<span><img src="<?php bloginfo('template_directory') ?>/images/icons/business.png" alt=""></span>
						<span class="num"><?php the_field('operation_team_'); ?></span><?php _e('Operation Team'); ?>
					</div>
					<div>
						<span><img src="<?php bloginfo('template_directory') ?>/images/icons/engineer.png" alt=""></span>
						<span class="num"><?php the_field('sales_marketing_'); ?></span><?php _e('Sales Marketing'); ?>
					</div>
					<div>
						<span><img src="<?php bloginfo('template_directory') ?>/images/icons/account.png" alt=""></span>
						<span class="num"><?php the_field('accounts'); ?></span><?php _e('Accounts'); ?>
					</div>	
				</div>				
			</div>		
		</div>
		<div class="span five environment">
			<div class="top">
				<div class="desc">
					<?php the_field('environment_desc'); ?>
				</div>
			</div>
			<div class="bottom">
				<div class="span five">
					<div class="image">
					<img src="<?php bloginfo('template_directory') ?>/images/icons/solar_panels.png" alt="">
					<span><?php the_field('solar_num'); ?></span>	
					</div>			
					<?php _e('Solar panels are fitted on our rooftop'); ?>
				</div>
				<div class="span five">
					<div class="image">
						<img src="<?php bloginfo('template_directory') ?>/images/icons/ecovans.png" alt="">
						<span><?php the_field('ecovans_num'); ?></span>						
					</div>					
					<?php _e('Ecovans keeping emmisions down'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row this-week">
		<h2><?php _e('This week in the office…'); ?></h2>
		<div class="span two-and-half support">
			<div class="image">
				<img src="<?php bloginfo('template_directory') ?>/images/icons/week-support.png" alt="">
				<span><?php the_field('support_calls_answered'); ?></span>
			</div>
			<?php _e('Support calls Answered'); ?>
		</div>
		<div class="span two-and-half cabling">
			<div class="image">
				<img src="<?php bloginfo('template_directory') ?>/images/icons/week-cabling.png" alt="">
				<span><?php the_field('meters_of_cabling_installed'); ?></span>
			</div>
			<?php _e('Meters of cabling installed'); ?>
		</div>
		<div class="span two-and-half energy">
			<div class="image">
				<img src="<?php bloginfo('template_directory') ?>/images/icons/week-energy.png" alt="">
				<span><?php the_field('energy_generated_by_solar_panels'); ?></span>
			</div>		
			<?php _e('Energy generated by Solar Panels'); ?>
		</div>
		<div class="span two-and-half tea">
			<div class="image">
				<img src="<?php bloginfo('template_directory') ?>/images/icons/week-tea.png" alt="">
				<span><?php the_field('cups_of_tea_made'); ?></span>
			</div>		
			<?php _e('Cups of tea made'); ?> 
		</div>
	</div>
</div>

	<?php if( have_rows('meet_the_team') ): ?>
	<div id="meet-the-team">
		<h1 class="section-title"><?php _e('Meet the Team'); ?></h1>
		<?php while( have_rows('meet_the_team') ): the_row(); ?>
			<div class="row">
				<div class="span five break-on-mobile">
					<?php the_sub_field('team_image'); ?>	
				</div>
				<div class="span five break-on-mobile">
					<?php the_sub_field('team_description'); ?>	
				</div>
			</div>
		<?php endwhile; ?> 
		<?php wp_reset_postdata(); ?>
	 </div>	
	<?php endif; ?>	

	 <?php if( have_rows('testimonial') ): ?>
		 <div id="quotes">
		 	<?php the_field('testiomonials_title'); ?>
		 	<?php while( have_rows('testimonial') ): the_row(); ?>
				<div class="span two-and-half break-on-mobile">
					<div class="testimonial">
						<div class="quote">
							<?php the_sub_field('body'); ?>	
						</div>
						<div class="meta">
							<span class="author">
								<?php the_sub_field('author'); ?>	
							</span>
							<span class="position">
								<?php the_sub_field('position'); ?>	
							</span>
						</div>
					</div>
				</div>		 		
		 	<?php endwhile; ?>
		 	<?php wp_reset_postdata(); ?>
		 </div>
	<?php endif; ?>

	<?php if(get_field('credentials')): ?>
		<div id="credentials">
			<?php the_field('credentials'); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php
/****************************************
 * Environmental Policy
****************************************/
?>
<?php if(get_field('environmental_policy_articles', $id)): ?>
<div id="environmental-policy">
	<?php $i = 1; ?>
	<?php while( have_rows('environmental_policy_articles') ): the_row(); ?>
		<?php if (get_sub_field('article')): ?>
			<h1 class="title"><?php the_sub_field('article'); ?></h1>
		<?php endif; ?>

		<div class="span <?php the_sub_field('box_size'); ?> image-<?php the_sub_field('image_position'); ?>">
			<div class="image">
				<?php 
					$attachment_id = get_sub_field('article_image');
					$size = "medium-large"; 
					$image = wp_get_attachment_image_src( $attachment_id, $size );
				?>					
				<img src="<?php echo $image[0]; ?>" alt="">
				<?php if($i == 1): ?>
					<div class="ncs-saved">
						<div class="top">
							<?php the_field('ncs_saved_box_content'); ?>
						</div>
					<div class="bottom">
						<div class="span five break-mobile saved">
							<div class="img">
								<img src="<?php bloginfo('template_directory') ?>/images/icons/ncs-saved.png" alt="">
								<span><?php the_field('energy_generated_by_solar_panels'); ?></span>	
							</div>
							<p><?php _e('Energy generated by Solar Panels'); ?></p>
						</div>
						<div class="span five break-mobile paying">
							<div class="img">
								<img src="<?php bloginfo('template_directory') ?>/images/icons/not-paying.png" alt="">
								<span><?php the_field('not_paying_for_energy'); ?></span>
							</div>
							<p><?php _e('Not paying for energy'); ?> <?php the_field('not_paying_for_energy'); ?> <?php _e('/ day'); ?> </p>
						</div>
					</div>
					</div>
					
				<?php endif; ?>				

			</div>
			<div class="body">
				<div class="copy">
					<?php the_sub_field('article_body'); ?>
					<div class="quote">
						<?php if (get_sub_field('article_quote')): ?>
							<blockquote>
								<?php the_sub_field('article_quote'); ?>
							</blockquote>
						<?php endif; ?>
						<?php if (get_sub_field('author_image')): ?>
							<?php 
								$attachment_id = get_sub_field('author_image');
								$size = "thumbnail"; 
								$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>								
							<img class="author-image" src="<?php echo $image[0]; ?>" alt="">
							<div class="meta">
								<span class="author">					
									<?php the_sub_field('quote_author'); ?>
								</span>
								<span class="position">
									<?php the_sub_field('quote_position'); ?>
								</span>						
							</div>							
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php $i++; ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
</div>	
<?php endif; ?>


<?php
/****************************************
 * Expertise Pages
****************************************/
?>
<?php if(get_field('rows', $id)): ?>
	<div id="expertise">
		<?php if (get_field('sections_title')): ?>
			<h1 class="section-title"><?php the_field('sections_title'); ?></h1>
		<?php endif; ?>
		<?php while( have_rows('rows') ): the_row(); ?>		
			<div class="row <?php if (get_sub_field('content_alignment')):?>right<?php endif; ?><?php if (get_sub_field('full_width')):?>no-image<?php endif; ?>  <?php the_sub_field('row_class') ?>">
				<div class="image" <?php if (get_sub_field('background')):?>style="background-image: url('<?php the_sub_field('background'); ?>');"<?php endif; ?>>
				</div>
				<div class="span <?php if (get_sub_field('full_width')):?>ten<?php else: ?>four<?php endif; ?>" style="<?php if (get_sub_field('content_background_color')):?>background-color: <?php the_sub_field('content_background_color'); ?>;<?php endif; ?><?php if (get_sub_field('content_color')):?>color: <?php the_sub_field('content_color'); ?>;<?php endif; ?>">
					<?php the_sub_field('content'); ?>
					<?php if (get_sub_field('box_link')): ?>
						<a class="more-about" href="<?php bloginfo('url'); ?><?php the_sub_field('box_link') ?>"><?php _e('Read More'); ?></a>
					<?php endif; ?>
					
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>

<?php endif; ?>


<?php
/****************************************
 * Articles & Related Case Studies
****************************************/
?>
<?php if(get_field('show_related_case_studies', $id)): ?>
	<div class="related-cs">
		<?php 
	 
		$related = get_field('select_related_case_studies');
	 
		if( $related ): ?>
				<h1 class="case-studies-title">Related Articles & Case Studies</h1>
				<div id="case-studies" class="related clearfix">	
				<?php $i = 1; ?>
				<?php foreach( $related as $p ): // variable must NOT be called $post (IMPORTANT) ?>
					<article class="study span one-third equal-height break-on-mobile <?php if($i % 6 == 3): ?>wide<?php endif; ?>">
						<a href="<?php echo get_permalink( $p->ID ); ?>">
							<?php  ?>

							<?php 
								echo get_the_post_thumbnail($p->ID,array(330, 240, 'bfi_thumb' => true) );
							 ?>						

							<div class="title">
								<h2 class="entry-title"><?php echo get_the_title($p->ID ); ?></h2>
							</div>
							<span class="readmore"><?php _e('Read our Case Study') ?></span>
						</a>
					</article>
				<?php $i++; ?>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>

				</div>
		<?php endif; ?>
	</div>
<?php endif; ?>



