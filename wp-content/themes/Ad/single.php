<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AdrianBosacki
 */

get_header();
?>
 <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content-page');

            /*
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            */

        endwhile; // End of the loop.
		?>


<section class="section-see-also" >
	<div class="section-see-also__wrapper">
		<div class="small_text1">YOU MAY ALSO LIKE</div>
		<div class="section-see-also__list" >
       
       
       <?php global $post;
             $myposts = get_posts( array( 'posts_per_page' => 3,  
        'orderby'          => 'rand',
       ) );
 
    if ( $myposts ) {  foreach ( $myposts as $post ) :   setup_postdata( $post ); ?>
         
     

               
         <div class="section-see-also__item" >
                <?php if(has_post_thumbnail()) : ?>
                    <div class="section-see-also__image-wrapper">
                    <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('see_also'); ?>" alt="<?php the_title(); ?> image" ></a>
                    </div>
                <?php endif; ?>
				<div class="section-see-also__title" >
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>				
			</div>
               

           
                   
        <?php  endforeach;   wp_reset_postdata(); }  ?>

		</div>
	</div>    
</section>















<section class="section-comments">
<div  class="small_text1 section-comments__counter">2 COMMENTS</div>

<div class="section-comments__comment">
    <div class="section-comments__img-wrap"><img src="/images/resources/profile1.jpg" alt="profile picture" ></div> 
    <div>
        <div class="section-comments__name">John Doe</div>
        <div class="section-comments__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo!
        </div>
        <div class="small_text1 section-comments__reply">REPLY</div>
    </div>
</div>

<div class="section-comments__comment">
    <div class="section-comments__img-wrap"><img src="/images/resources/profile2.jpg" alt="profile picture"></div> 
    <div>
        <div class="section-comments__name">Jane Doe</div>
        <div class="section-comments__text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo!
        </div>
        <div class="small_text1 section-comments__reply">REPLY</div>
    </div>
</div>


<div class="section-comments__comment">
    <div class="section-comments__img-wrap"><img src="/images/resources/profile3.jpg" alt="profile picture" ></div> 
    <textarea class="section-comments__textarea" placeholder="JOIN THE DISCUSSION"></textarea>
</div>

<div class="section-comments__connect-with" >
    <div  class="small_text1 section-comments__connect-text">CONNECTED WITH</div>

    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfjCBwXOyEfCSr5AAABSklEQVQoz23Qu2uTARiF8d/75UsirYgFEUu9gCJ4oYR2KQ7iWlwFwUGXqqOLi+AfoZOIGRRaR128DU5dBJGiqHjDIA6iqK1dREqS73WotAH7rM85HDhxHtywylmhklIoQG0qbhk34TnOoWOkFaccDfUv1ZCtMdMyVdysupUGVtRO5FU78dO94HZt8nheyc3FC39SpRjNtv1gyIRGfCgsKl2q7sRJ23vssc86r9wv42nOm3Ysj3hfW8hCfd3Ho/xaZiua2VXXMG7cIF1LFL7l3sHWAIs+hmL5ZVz2WW4QeBafQjEiHseC3n96JWarlb4Sy9nZoH83HoRSbVL2a/Pe2W1sQD+JC77TVtpmuBrLQ3asyfQwLmanbxilA87ktF3/5G9vYjbmql89m1xDzLDFQYdzVMQPb72ulgqp4frqWac1pZQIgaau9treX0ybbEeD6xxMAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE5LTA4LTI4VDIzOjU5OjMzKzAwOjAwFB09lwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxOS0wOC0yOFQyMzo1OTozMyswMDowMGVAhSsAAAAASUVORK5CYII=" class="section-comments__connect-img--opacity">

    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAADsQAAA7EAZUrDhsAAAAHdElNRQfjCBwXOyEfCSr5AAAAvklEQVQoz83PMUoDcRDF4W+WNY3YrYVYpfASsbCxSieIB9DSGwS7kMJLbBlBsNOjSEpJIaIG7ELAhL9FNtlkLWx91czwm/d4odKVJI7SrVN7GDsxLpGvgJDtLHrONLQGklQ4Vq+bwOXy0tICQ4+mJg0HRPX75O53ROFGW4Fwresj+r42gV0XDqq5o2NkEFsOcy/Yl2Ni5jmm2xHvzrXdO5T0PfiOmYbDm9wcfHqte+ZQLqtmdZty3SLzh/4D8ANJzyu1e4IzbgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxOS0wOC0yOFQyMzo1OTozMyswMDowMBQdPZcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTktMDgtMjhUMjM6NTk6MzMrMDA6MDBlQIUrAAAAAElFTkSuQmCC">            
</div>

</section>

<?php
get_sidebar();
get_footer();
