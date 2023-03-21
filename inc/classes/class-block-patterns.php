<?php

/**block patterns
 * 
 * 
 * 
 * @package Teacher
*/

namespace TEACHER_THEME\Inc;
use TEACHER_THEME\Inc\Traits\Singleton;

class Block_Patterns{

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

         add_action('init',[$this,'register_block_patterns']);
         add_action('init',[$this,'register_block_pattern_categories']);
        
    }

    public function register_block_patterns(){


        if (function_exists('register_block_pattern')){

            /**Cover pattern */

            $cover_content=$this->get_pattern_content('template-parts/patterns/cover');
            register_block_pattern(
                'Teacher/cover1',
                [
                    'title'=>__('Teacher cover1','Teacher'),
                    'description'=>__('Teacher cover block with image and description','Teacher'),
                    'categories'=>['cover'],
                    'content'=>$cover_content,
                ]

            );

            /**Two column pattern */

            $two_column_content=$this->get_pattern_content('template-parts/patterns/twocolumn');
            register_block_pattern(
                'Teacher/twocolumn',
                [
                    'title'=>__('Teacher two column','Teacher'),
                    'description'=>__('Teacher two column block with heading and text','Teacher'),
                    'categories'=>['twocolumn'],
                    'content'=>$two_column_content,
                ]

            );
        }
    }

    public function get_pattern_content($template_path){
            ob_start();

            get_template_part($template_path);
            $pattern_content=ob_get_contents();
            ob_clean();
            return $pattern_content;
    }


    public function register_block_pattern_categories(){

        $pattern_categories=[
            'cover'=>__('Cover','Teacher'),
            'carousel'=> __('Carousel','Teacher'),
            'twocolumn'=> __('Twocolumn','Teacher'),
        ];
        if(!empty($pattern_categories) && is_array($pattern_categories)){

            foreach ($pattern_categories as $pattern_category=> $pattern_category_label){
                register_block_pattern_category(
                    $pattern_category,
                    ['label'=> $pattern_category_label]

                );
            }
        }
    }


    

   
}
