<?php
/***
 * template part for displaying a message that post cant be found
 * @package Teacher
 */

 ?>
<section class="no-result">
    <header class="page-header">
        <h1 class="page-title"> <?php esc_html_e('Nothing found','Teacher');?></h1>

    </header>
    <div class="page-content">
        <?php if(is_home() && current_user_can('publish_posts')){ ?>
                <p>
                    <?php
                        printf(
                            wp_kses(
                                __('Ready to publish your first post? <a href="%s"> Get started here</a>','Teacher'),
                                [
                                    'a'=>[
                                        'href'=> []
                                    ]
                                ]
                            ),
                            esc_url(admin_url('post-new.php'))
                        )
                    ?>
                </p>
        <?php 
                } 
                elseif(is_search()){ ?>
                    <p><?php esc_html_e('Sorry but nothing matched your search criteria. Please try  again with some different keyword.','Teacher') ?></p>
                    <?php get_search_form();?>
                <?php 
                } 
                else{  ?>
                    <p><?php esc_html_e('It seems that we cannot find what you are looking for . Perhaps search can help', 'Teacher') ?></p>
                    <?php get_search_form();
                } ?>  
        


    </div>
</section>


