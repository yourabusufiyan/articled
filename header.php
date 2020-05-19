<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <meta charset="<?php esc_attr( bloginfo( 'charset' ) ) ?>">
    <meta http-equiv="content-type" content="text/html; <?php esc_attr( bloginfo( 'charset' ) ) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	  <link rel="pingback" href="<?php esc_attr( bloginfo( 'pingback_url' ) ) ?>">

    <!-- WP Head Start -->
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head();?>
    
  </head>
  <body <?php body_class(); ?>>

    <!-- Slider Container -->
  	<div id="slider-container" class="slider-container">
  		<span class="sliderclose"><i class="fas fa-times"></i></span>
  		<div class="slider-content">
        <?php get_template_part( 'templates/slider' ) ?>
  		</div>
  	</div>
    <!-- End Slider Container -->

    <div class="body-data">
      <?php articled_header() ?>