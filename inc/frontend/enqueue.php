<?php

// Enqueues every themes css file
if( ! function_exists('articled_enqueue_style') ) {
  function articled_enqueue_style() {
    global $articled_options;

    $articled_min = ! WP_DEBUG ? '.min' : '';
    wp_enqueue_style('bootstrap-grid', ARTICLED_VENDOR . 'bootstrap/bootstrap-grid' . $articled_min  . '.css', '', '4.0.0', 'all');
    wp_enqueue_style('bootstrap-reboot', ARTICLED_VENDOR . 'bootstrap/bootstrap-reboot' . $articled_min  . '.css', '', '4.0.0', 'all');
    
    wp_enqueue_style('fontawesome', ARTICLED_VENDOR . 'fontawesome/css/all.min.css', '', '5.6.0', 'all');
    wp_enqueue_style('articled',  get_stylesheet_uri(), array(), time(), 'all');
    wp_enqueue_style('articled-animation-style',  ARTICLED_CSS . 'articled-animation', '', time(), 'all');
    wp_enqueue_style('articled-mobile',  ARTICLED_CSS . 'responsive', '', time(), 'all');

      if( !is_single() ){
        $blog_layout = intval( abu_ekey('articled_blog_post_layout', $articled_options, '4') );
        if( $blog_layout == 3 || $blog_layout == 4 ) {
          wp_enqueue_style('blog-post-classic', get_template_directory_uri() . '/assets/css/blog-post-classic' .$articled_min . '.css',[], time(), 'all');
        }
      }

  }
  add_action('wp_enqueue_scripts', 'articled_enqueue_style');
}


// Enqueues every themes js file
if( ! function_exists('articled_enqueue_sripts') ) {
 function articled_enqueue_sripts() {

    $articled_min = ! WP_DEBUG ? '.min' : '';
    wp_enqueue_script('jquery');
    wp_enqueue_script('lazy-loading', ARTICLED_JS . 'lazyload' . $articled_min . '.js', array(), '1.8.2', false);
    wp_enqueue_script('articled',     ARTICLED_JS . 'articled' . $articled_min . '.js', [], time(), false);
 
 }
 add_action('wp_enqueue_scripts', 'articled_enqueue_sripts');
}