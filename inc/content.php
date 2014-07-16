
<?php while(has_sub_field("section")): $e++; ?>
	<section <?php if(get_sub_field('background')): ?>style="background: url('<?php the_sub_field('background'); ?>')"<?php endif; ?>>
		<div class="section-inner">
			<!-- <h1 class="title"><?php the_sub_field('section_title'); ?></h1>	 -->

			<?php if( have_rows('add_row') ): ?>

				<?php while ( have_rows('add_row') ) : the_row();  ?>
					<div class="row">
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
								<a href="<?php the_sub_field('box_link'); ?>" class="<?php the_sub_field('title_position') ?> <?php if (!the_sub_field('box_image')) {
								echo full;
								} ?>" style="background: url('<?php the_sub_field('box_image'); ?>')">
									<span class="title">
										<?php the_sub_field('box_title'); ?>
									</span>
								</a>
							</div>
						<?php endwhile; ?>        
					</div>
			    <?php endwhile;  ?>

			<?php endif; ?>
		</div>
	</section>
<?php endwhile; ?>

<?php while(has_sub_field("content")): $e++; ?>
<?php $layout = get_row_layout(); ?>

	<?php if(get_row_layout() == "row"): ?>

	<div class="columns clearfix">
		<?php $total_columns = count( get_sub_field('column')); ?>
		<?php while (has_sub_field('column')) : ?>

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
			case 1:
			default:
				$class = 'ten';
				break;
		} ?>
			<div class="break-on-mobile span <?php echo $class; ?>" style="<?php the_sub_field('css'); ?>;">
				<div class="inner equal-height">
					<div class="content clearfix">
						<?php the_sub_field('content'); ?>
					</div>
						<?php if(get_sub_field('link_to')): ?>
						<a href="<?php the_sub_field('link_to'); ?>" class="button"><?php _e('Tell me more')?></a>
					<?php endif?>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
<?php endwhile; ?>