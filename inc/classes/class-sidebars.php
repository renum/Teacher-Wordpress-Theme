<?php

/**Theme sidebars
 * 
 * 
 * 
 * @package Teacher
*/

namespace TEACHER_THEME\Inc;
use TEACHER_THEME\Inc\Traits\Singleton;

class Sidebars{

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

         add_action('after_setup_theme',[$this,'register_sidebars']);
         add_action('widgets_init',[$this,'register_widgets']);
         
        
    }

    public function register_sidebars(){
        register_sidebar( [
            'name'          => __( 'Sidebar', 'Teacher' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'main sidebar', 'Teacher' ),
            'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Footer', 'Teacher' ),
            'id'            => 'sidebar-2',
            'description'   => __( 'Footer sidebar', 'Teacher' ),
            'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
    }

    public function register_widgets(){
        register_widget('TEACHER_THEME\Inc\Clock_Widget');
    }
}


    
