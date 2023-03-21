<?php
/**
 * Page template
 *
 * @package Teacher
 */

use TEACHER_THEME\Inc\Loadmore_Posts;

get_header();

$loadmore_posts = Loadmore_Posts::get_instance();

?>

<div class="container">
	<h1 class="mb-4">Loadmore/Infinite Scroll Demo</h1>
	<?php $loadmore_posts->post_script_load_more(); //calling php function directly here ?>  
</div>

<?php get_footer(); ?>
