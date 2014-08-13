<div class="sharethis">
    <?php $title = get_the_title(); ?>
    <?php $shareurl = get_permalink(); ?>

	<span class="title"><?php _e('Share This Article:') ?></span>
	<a class="facebook share-popup-btn" href="http://www.facebook.com/share.php?u=<?php echo urlencode($shareurl); ?>&title=<?php echo urlencode($title); ?>" target="_blank"></a>
	<a class="twitter share-popup-btn" href="http://twitter.com/home?status=<?php echo urlencode($title); ?>+<?php echo urlencode($shareurl); ?>" target="_blank"></a>
	<a class="linkedin share-popup-btn" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($shareurl); ?>&title=<?php echo urlencode($title); ?>&source=<?php echo site_url();?>" target="_blank"></a>
	<a class="googleplus share-popup-btn" href="https://plus.google.com/share?url=<?php echo urlencode($shareurl); ?>" target="_blank"></a>


</div>