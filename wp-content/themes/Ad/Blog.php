<?php /* Template Name: Blog */ ?>

<?php get_header(); ?>

        <?php
        if ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content-blog-page');

        endif; ?>
        



    <section class="posts_list">

        <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $query = new WP_Query( array(
                'posts_per_page' => 6, 
                'orderby'         => 'name',
                'order'           => 'ASC',               
                'paged' => $paged
            ) );
        ?>


        <?php if ( $query->have_posts() ) : ?>
        <!-- begin loop -->
        <?php
        $count=1;
        while ( $query->have_posts() ) : $query->the_post();
        
         ?>

            <?php if (  $count==5) : // add newsletterbox ?>
                </section>
                <section class="newsletter-box">
                    <div class="newsletter-box__wrapper">
                        <div class="newsletter-box__title">
                            Sign up for our newsletter!
                        </div>    
                        <form class="newsletter-box__form" >
                        <input placeholder="Enter valid email adress" >

                        <button ><div><img src="/images/resources/send_icon.png"></div></button>
                    </form>
                    </div>
                
                </section>
                <section class="posts_list" id="sec_posts_list">

             <?php endif;    
        
             get_template_part( 'template-parts/content' );

        
        
            $count=$count+1;
             endwhile; ?>


        <?php endif; ?>    


    </section>



<div class="section-load-more" >
    <button id="load_more_button">
        Load more
    </button>
</div>


<?php
get_footer(); ?>




