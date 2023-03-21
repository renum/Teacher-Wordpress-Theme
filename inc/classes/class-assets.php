<?php

/**enqueue theme assets 
 * 
 * 
 * 
 * @package Teacher
*/

namespace TEACHER_THEME\Inc;
use TEACHER_THEME\Inc\Traits\Singleton;

class Assets{

    use Singleton;
    protected function __construct(){
        //load class.
        $this->setup_hooks();
    }


    protected function setup_hooks(){
        //actions and filters
        /**Actions
         * 
         */
        add_action('wp_enqueue_scripts',[$this,'register_styles']);
        add_action('wp_enqueue_scripts',[$this,'register_scripts']);
    }

    public function register_styles(){
            //Register styles
           // wp_register_style('style-css',get_stylesheet_uri(),[],filemtime(TEACHER_DIR_PATH.'/style.css'),'all');
            wp_register_style('bootstrap-css',TEACHER_DIR_URI.'/assets/src/library/css/bootstrap.min.css',[],false,'all');
            wp_register_style( 'main-css', TEACHER_BUILD_CSS_URI . '/main.css', ['bootstrap-css'], filemtime( TEACHER_BUILD_CSS_DIR_PATH . '/main.css' ), 'all' );
           // wp_enqueue_style('fonts-css',TEACHER_DIR_URI.'/assets/src/library/fonts/fonts.css',[],false,'all');
            //Enqueue styles
            wp_enqueue_style('style-css');
            wp_enqueue_style('bootstrap-css');
            wp_enqueue_style('main-css');

    
    }


    public function register_scripts(){
            //Register scripts
            wp_register_script('main-js',TEACHER_BUILD_JS_URI.'/main.js',["jquery"],filemtime(TEACHER_BUILD_JS_DIR_PATH.'/main.js'),true);
            wp_register_script('bootstrap-js',TEACHER_DIR_URI.'/assets/src/library/js/bootstrap.bundle.min.js',array("jquery"),false,true);
            //Enqueue scripts
            wp_enqueue_script('main-js');
            wp_enqueue_script('bootstrap-js');

            wp_localize_script('main-js','siteConfig',
                ['ajaxUrl'=>admin_url('admin-ajax.php'),
                'ajax_nonce'=>wp_create_nonce('loadmore_post_nonce'),  //nonce action name
                ]
            );

    }

}
