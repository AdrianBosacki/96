<?php
/**
 * Template part for displaying blog page content in Blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AdrianBosacki
 */

?>

<?php if(has_post_thumbnail()) : ?>
<div class="header__image-wrap">
    <img class="header__image" src="<?php the_post_thumbnail_url('header_top'); ?>" alt="Header image">
</div>
<?php endif; ?>


<article class="article-top" >
        <div class="small_text1">PHOTODIARY</div>
        <h1 class="large_text1"><?php the_title( ); ?></h1>
        <div class="article-top__content" ><p><?php  the_content(); ?></p></div>
        <div class="small_text1">LEAVE A COMMENT</div>
</article>