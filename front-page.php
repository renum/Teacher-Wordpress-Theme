<?php
/***
 * front page template
 * @package Teacher
 */

 ?>
<?php get_header();?>
<div class="" id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <div class="home-page-wrap">
                      
                        <?php if (have_posts()): ?>
                            <?php while (have_posts()):the_post(); ?>
                                    
                                <?php get_template_part('template-parts/content','page'); ?>
                                    
                                    
                            <?php endwhile; ?>
                        <?php else: 
                            get_template_part('template-parts/content-none'); 
                        ?>
                        <?php endif;?>
              
                
        </div>
        

       
        
    </main>
   </div>
 <?php get_footer();?>