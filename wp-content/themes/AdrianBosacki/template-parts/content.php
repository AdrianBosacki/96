<?php
/**
 * Template part for displaying posts on Blog page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AdrianBosacki
 */
?>

<article class="posts_list__article">
    <?php if(has_post_thumbnail()) : // Display thumbnail only if it exists ?>
        <div class="posts_list_img-wrap">
            <a href=" <?php the_permalink(); ?>">
                <img class="posts_list_image js-lazy-image"  data-src="<?php the_post_thumbnail_url('main_list'); ?>" src="/images/resources/placeholder.jpg" alt="<?php the_title(); ?> image" >
            </a>
        </div>
    <?php endif; ?> 
        <div class="small_text1" >LIFESTYLEs</div>
        <h2 class="posts_list__h2" ><a href=" <?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
        <p><?php the_excerpt(); ?></p>
</article>

