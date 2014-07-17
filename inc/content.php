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
								<div class="span <?php echo $boxclass; ?> <?php echo $valign; ?>" <?php if ( get_sub_field('box_margin')): ?>style="margin: <?php the_sub_field('box_margin'); ?>"<?php endif; ?> >
									<a href="<?php the_sub_field('box_link'); ?>" class="<?php the_sub_field('title_position') ?> <?php if (get_sub_field('video_link')) { echo 'popup-youtube'; } ?>" style="background-image: url('<?php the_sub_field('box_image'); ?>')">
										<?php if (get_sub_field('box_title')): ?>
											<span class="title <?php the_sub_field('box_color'); ?>">
												<?php the_sub_field('box_title'); ?>
											</span>									
										<?php endif; ?>									
									</a>
								</div>
							<?php endwhile; ?>        
				    <?php endwhile;  ?>

				<?php endif; ?>
			</div>
		</section>
	<?php endwhile; ?>

	<?php
	/****************************************
	 * Front Page - Offers & Bundles template
	****************************************/
	?>

	<?php while(has_sub_field("offers_bundle_deals")): $e++; ?>
		<section class="offers">
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
<?php endif; ?>