<?php
/***
 * single post template
 * @package Teacher
 */

 get_header();
 ?>

   <div class="" id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                        <?php if (have_posts()): ?>
                            <div class="post-wrap">
                                <?php
                                    if(is_home() && !is_front_page()){
                                ?>
                                    <header class="mb-5">
                                        <h1 class="page-title">
                                            <?php single_post_title();?>
                                        </h1>
                                    </header>
                                    <?php 
                                    } 
                                    ?>

                                    <?php while (have_posts()):the_post(); ?>
                                    
                                            <?php get_template_part('template-parts/content'); ?>
                                    
                                    
                                    <?php endwhile; ?>
                                
                            </div>
                        <?php else: 
                            get_template_part('template-parts/content-none'); 
                        ?>
                        <?php endif;?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
        

       
        <div class="container">
            <?php
                previous_post_link();
                next_post_link();
            ?>
        </div>
        
    </main>
   </div>
    
    <?php
        get_footer();

 