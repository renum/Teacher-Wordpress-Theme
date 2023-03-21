<?php

/***
 * Main template file.
 * @package Teacher
 * 
 */
   
    get_header();
 ?>

   <div class="" id="primary">
    <main class="site-main mt-5" id="main" role="main">

        <?php if (have_posts()): ?>
                <div class="container">
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
                    <div class="row">
                     
                        <?php while (have_posts()):the_post(); ?>
                        
                         
                                <div class="col-lg-4 col-md-6 col-sm-12">
                          
                          
                                   <?php get_template_part('template-parts/content'); ?>
                          
                                </div>
                       
                        <?php endwhile; ?>
                       
                    </div>
               
        <?php else: 
               get_template_part('template-parts/content-none'); 
        ?>
        <?php endif;?>
        <?php
            teacher_pagination();
        ?>
         </div>
        
    </main>
   </div>
    
    <?php
        get_footer();

 