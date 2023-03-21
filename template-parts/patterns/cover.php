<?php
/***
 * cover block pattern template
 * @package Teacher
 */

 $cover_style=sprintf('background-image:url(%s);',esc_url(TEACHER_BUILD_IMG_URI.'/patterns/cover.jpg'));
 ?>

<!-- wp:cover {"url":"<?php echo esc_url(TEACHER_BUILD_IMG_URI.'/patterns/img/cover.jpg') ?>","id":95,"dimRatio":50,"minHeight":648,"align":"full"} -->
<div class="wp-block-cover alignfull" style="min-height:648px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-95" alt="" src="<?php echo esc_url(TEACHER_BUILD_IMG_URI.'/patterns/cover.jpg'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size">Never stop dreaming</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Click here</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->