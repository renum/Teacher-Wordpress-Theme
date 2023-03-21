<?php
/** Template for entry content
 * 
 * To be used inside wordpress The Loop
 
* @Package Teacher

*/
?>

<div class="entry-content">
    <?php 

        if(is_single()){
            the_content(
               sprintf(
                    wp_kses(
                        __('Continue Reading %s <span class="meta-nav">&rarr;</span>','Teacher'),
                        [
                            'span'=>[
                                'class'=> []
                            ]
                        ]
                    ),
                    the_title('<span class="screen-reader-text">"','"</span>',false)

               ) 
            );

            wp_link_pages(
                [
                    'before'=>'<div class="page-links">'.esc_html__('Pages:' ,'Teacher'),
                    'after'=>'</div>'
                ]
            );

        }

        else{
            teacher_the_excerpt(45);
            echo teacher_excerpt_more();

        }
    ?>
</div>