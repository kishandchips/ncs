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