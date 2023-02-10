<?php
/**
 * 
 * Bootstraps the theme
 * 
 * @package Teacher
 */


namespace TEACHER_THEME\Inc;

use TEACHER_THEME\Inc\Traits\Singleton;


class TEACHER_THEME{
    use Singleton;


    protected function __construct(){
        //load class.

        //wp_die('hello');
        /**All classes will be loaded here */
        Assets::get_instance();
        $this->setup_hooks();
    }
  
    protected function setup_hooks(){
        //actions and filters


        /**Actions
         * 
         */

        add_action('after_Setup_theme',[$this,'setup_theme']);
       
    }

    public function setup_theme(){
            add_theme_support('title-tag');
    }
   

}





