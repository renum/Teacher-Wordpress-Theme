<?php
/**Theme functions**/

use TEACHER_THEME\Inc\TEACHER_THEME;

/*@package Teacher */

/*

* Constants

*/

if(!defined('TEACHER_DIR_PATH')){
    define('TEACHER_DIR_PATH',untrailingslashit(get_template_directory()));
}

if(!defined('TEACHER_DIR_URI')){
    define('TEACHER_DIR_URI',untrailingslashit(get_template_directory_uri()));
}

/* Build dirs **/

if ( ! defined( 'TEACHER_BUILD_URI' ) ) {
	define( 'TEACHER_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( ! defined( 'TEACHER_BUILD_PATH' ) ) {
	define( 'TEACHER_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

if ( ! defined( 'TEACHER_BUILD_JS_URI' ) ) {
	define( 'TEACHER_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( ! defined( 'TEACHER_BUILD_JS_DIR_PATH' ) ) {
	define( 'TEACHER_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}

if ( ! defined( 'TEACHER_BUILD_IMG_URI' ) ) {
	define( 'TEACHER_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}

if ( ! defined( 'TEACHER_BUILD_CSS_URI' ) ) {
	define( 'TEACHER_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( ! defined( 'TEACHER_BUILD_CSS_DIR_PATH' ) ) {
	define( 'TEACHER_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}

if ( ! defined( 'TEACHER_BUILD_LIB_URI' ) ) {
	define( 'TEACHER_BUILD_LIB_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/library' );
}



require_once TEACHER_DIR_PATH.'/inc/helpers/autoloader.php';
require_once TEACHER_DIR_PATH.'/inc/helpers/template-tags.php';
//require_once TEACHER_DIR_PATH.'/inc/classes/class-teacher-theme.php';
function teacher_get_theme_instance(){
   TEACHER_THEME::get_instance();

}


teacher_get_theme_instance();

//echo '<pre>';
//print_r(TEACHER_DIR_PATH); echo '<br\>';
//wp_die();
//print_r(filemtime(get_template_directory().'/style.css'));
//print_r(get_template_directory());
//print_r(get_template_directory_uri());

//Remove gutenberg block library css
function remove_block_styles()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wp-block-style');//Remove woocommerce block css


}

add_action('wp_enqueue_scripts','remove_block_styles',100);

?>