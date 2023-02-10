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

require_once TEACHER_DIR_PATH.'/inc/helpers/autoloader.php';
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



?>