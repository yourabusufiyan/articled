<?php
if( ! function_exists( 'a' ) ) {
   function a($value = null) {
       var_dump($value);
   }
}
if( ! function_exists( 'ad' ) ) {
   function ad($value = null) {
       wp_die( var_dump($value) );
   }
}
if( ! function_exists( 'b' ) ) {
   function b($value = null) {
       return '<pre>' . var_export( $value,1 ) . '</pre><br />' ;
   }
}
if( ! function_exists( 'bd' ) ) {
   function bd($value = null) {
      wp_die( '<pre>' . htmlentities2( var_export( $value,1 ) ) . '</pre><br />', '',[ 'back_link' => 1 ] );
   }
}

// Fires after the theme is loaded.

function after_articled_setup() {
   // Roohani supports
    $_logo_defaults = array(
        'height'      => 150,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'title-tag' ); // Enable support for title tags.
    add_theme_support( 'post-thumbnails' ); // Enable support for post thumbnails and featured images.
    add_theme_support( 'post-formats', array(
                      'status', 'quote', 'gallery',   // Enable support for the following post formats:
                      'image' , 'video', 'audio',    // aside, gallery, quote, image, and video
                      'link'  , 'aside', 'chat'
                      ) );
    add_theme_support( 'html5', array(
                        'comment-list',
                        'commwwent-form',
                        'search-form',
                        'gallery', 'caption'));
    add_theme_support( 'automatic-feed-links' );
    add_editor_style( 'editor-style.css' );

  	add_image_size('articled_masonry_thumbnail', 455, 310, true);
  	add_image_size( 'articled_60x60', 60, 60, true );

  	add_image_size('articled_full_thumbnail', 900, 420, true);

  	add_image_size('articled_list_thumbnail', 250, 250, false);
    add_image_size('articled_list_thumbnail_srcset', 50, 50, false);

    add_image_size( 'articled_thumbnail_very_low', 44, 22, false );
    add_image_size( 'articled_related-thumbnail', 280, 193, array( 'center', 'center' ) );
    add_image_size( 'articled_related_thumbnail_srcset', 100, 65, false );

    add_image_size('articled_data_src_small', 350, 165, false);
    add_image_size('articled_data_src_medium', 445, 225, false);
    add_image_size('articled_data_src_large', 625, 293, false);



}
add_action( 'after_setup_theme', 'after_articled_setup' );


if( ! function_exists( 'articled_dir' ) ) {
  function articled_dir($dirname = null, $echo = false) {
    $dirname = str_replace('\\\\', '/', $dirname);
    $dirname = str_replace('\\', '/', $dirname);
    $dirname = wp_normalize_path( preg_replace('/([^:])(\/{2,})/', '$1/', $dirname) );
    if ( $echo ) {
      echo $dirname;
    } else {
      return $dirname;
    }
  }
}

if( ! function_exists( 'articled_load' ) ) {
  function articled_load( $template_path = null, $dirConts = '', $exten = 'php', $require_once = true, $backup = '' ) {

    
    $output = '';
    global $wp_query;
    
    $output .= articled_dir( $dirConts . '/' . $template_path . '.' . $exten );

    if ( empty($output) ) return false;

    if( ! empty($backup) && !file_exists($output)) $output = $backup;

    if( is_object( $wp_query ) && function_exists( 'load_template' ) ) {
      
      return load_template( $output, $require_once );
      
    } else {
      
      if( $require_once ) {
        return require_once( $output );
      } else {
        return include_once( $output );
      }
      
    }
    
    return false;

  }
}


defined('ARTICLED_DIR')      or define('ARTICLED_DIR',  get_template_directory() .'/' );
defined('ARTICLED_URI' )     or define('ARTICLED_URI',  get_template_directory_uri().'/' );

// assets
defined('ARTICLED_CSS')      or define('ARTICLED_CSS',     articled_dir( ARTICLED_URI . 'assets/css/'));
defined('ARTICLED_IMG')      or define('ARTICLED_IMG',     articled_dir( ARTICLED_URI . 'assets/img/'));
defined('ARTICLED_JS')       or define('ARTICLED_JS',      articled_dir( ARTICLED_URI . 'assets/js/'));
defined('ARTICLED_VENDOR')   or define('ARTICLED_VENDOR',  articled_dir( ARTICLED_URI . 'assets/vendor/'));

defined('ARTICLED_JSON')     or define('ARTICLED_JSON',    articled_dir( ARTICLED_DIR . 'assets/json/'));
defined('ARTICLED_INC')      or define('ARTICLED_INC',     articled_dir( ARTICLED_DIR . 'inc/'));
defined('ARTICLED_FUNC')     or define('ARTICLED_FUNC',    articled_dir( ARTICLED_DIR . 'inc/functions/'));
defined('ARTICLED_CLASSES')  or define('ARTICLED_CLASSES', articled_dir( ARTICLED_DIR . 'inc/classes/'));
defined('ARTICLED_FRONT')    or define('ARTICLED_FRONT',   articled_dir( ARTICLED_DIR . 'inc/frontend/'));

defined('ARTICLED_TEMPLATES')or define('ARTICLED_TEMPLATES',articled_dir( ARTICLED_DIR . 'templates/'));
defined('ARTICLED_HEADER')   or define('ARTICLED_HEADER',  articled_dir( ARTICLED_TEMPLATES . 'header/'));
defined('ARTICLED_FOOTER')   or define('ARTICLED_FOOTER',  articled_dir( ARTICLED_TEMPLATES . 'footer/'));
defined('ARTICLED_PARTS')    or define('ARTICLED_PARTS',   articled_dir( ARTICLED_TEMPLATES . 'blog/'));


// articled wp website contents width
if( !isset($content_width) ) $content_width = 900;

global $articled_options;
$articled_options = get_option( 'articled_theme', [] );
articled_load( 'inc', ARTICLED_INC );
articled_load( 'templates', ARTICLED_TEMPLATES );

// Register Navigations
function articled_register_menus () {
   register_nav_menus( array(
    'top-menu'   => __( 'Top Bar Menus', 'articled'),
    'main-menu' => __( 'Main Menus', 'articled')
   ));
};
add_action('init', 'articled_register_menus');