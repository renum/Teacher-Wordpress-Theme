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
        Menus::get_instance();
        Meta_Boxes::get_instance();
        
        Sidebars::get_instance();
        Block_Patterns::get_instance();
        Loadmore_Posts::get_instance();
        $this->setup_hooks();
        
    }
  
    protected function setup_hooks(){
        //actions and filters


        /**Actions
         * 
         */

        add_action('after_setup_theme',[$this,'setup_theme']);
       
    }

    public function setup_theme(){
            add_theme_support('title-tag');
            add_theme_support('custom-logo',[
                'height' => 50,
                'width'=> 100,
                'flex-width' => false, /*will always drop and display 250*150 logo. If true, will show the actual size of image chosen*/
                'flex-height' => false,
                'header-text' => ['site-title','site-description']
            ]);

            add_theme_support('custom-background',[
                'default-color'=> 'fff',
                'default-image'=> '',
                'default-repeat'=>'no-repeat'
            ]);
            add_theme_support('post-thumbnails');
            //Register image sizes
            add_image_size('featured-thumbnail',350,233,true);
            add_image_size('single-featured-thumbnail',1200,900,true);
            add_theme_support('customize-selective-refresh-widgets');//selective refresh for preview change
            add_theme_Support('automatic-feed-links');
            add_theme_support( 'html5', array( 
                'comment-list', 
                'comment-form', 
                'search-form', 
                'gallery', 
                'caption', 
                'style', 
                'script' ) );

            add_editor_style('assets/build/css/editor.css');//Tiny MCE editor stylesheet support. point to editor.css
            add_theme_support('wp-block-styles');  //add wp-block-library-theme-css to head section.
            add_theme_support( 'editor-styles' );
            add_theme_support('widgets');
            add_theme_support('widgets-block-editor');
            add_theme_support('align-wide');//alignwide/full width options for blocks
            //Remove core block patterns

            remove_theme_support('core-block-patterns');
            global $content_width;
            if(! isset($content_width)){
                $content_width=1240;  //max width for content
            }

    }
   

}





