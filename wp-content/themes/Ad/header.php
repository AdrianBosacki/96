<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AdrianBosacki
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- defer blocking css -->
	<link rel="preload" href="https://fonts.googleapis.com/css?family=Playfair+Display|Ubuntu&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Ubuntu&display=swap"></noscript>
    <link rel="preload" href="/wp-includes/css/dist/block-library/style.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="/wp-includes/css/dist/block-library/style.min.css"></noscript>
    <!-- defer blocking css END -->

    <script src="/scripts/jquery-3.4.1.min.js" defer></script>
    <script src="/scripts/ajax_call_lazy_load.js" defer></script>


	<?php wp_head(); ?>
</head>

<body>

    <header class="header">
        <div class="header__top"> 
           <a href="/"> <img src="/images/resources/logo.png" alt="Logo">   </a>    
            <nav class="header__nav">
                <div>LIFESTYLE</div>
                <div>PHOTODIARY</div>
                <div>MUSIC</div>
                <div>TRAVEL</div>
            </nav>
        </div>
        
    </header>
	

	






