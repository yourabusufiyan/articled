<?php 
/**
 *
 * Check value exit in array
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'abu_ekey' ) ) {
   function abu_ekey($value = null, $array = null, $false = null) {

      if( is_array( $value ) ) {
         foreach ($value as $values) {
           if( isset($array) && is_array($array) && array_key_exists($values, $array) ) {
             return $array[$values];
           }
         }
      } else {
         if( isset($array) && is_array($array) && array_key_exists($value, $array) ) {
            return $array[$value];
         } 
      }

      return $false;

   }
}

global $articled_options, $e_blog_layout;
$get_blog_layout = abu_ekey('articled_blog_post_layout', $articled_options, '4');
$e_blog_layout = '';
switch($get_blog_layout) {
    case 1 :
    case 2 :
    $e_blog_layout = 'list';
    break;
    case 3 :
    case 4 :
    $e_blog_layout = 'classic';
    break;
    case 5 :
    case 6 :
    $e_blog_layout = 'masonry';
    break;
default:
    $e_blog_layout = 'list';
}
$e_blog_layout = ARTICLED_PARTS . 'type-' . $e_blog_layout . '.php' ;
$e_blog_layout = apply_filters( 'articled_blog_post', $e_blog_layout );

articled_load( 'functions', ARTICLED_FUNC ); 
articled_load( 'frontend', ARTICLED_FRONT );
articled_load( 'widgets', ARTICLED_INC ); 
articled_load( 'classes/notice.class', ARTICLED_INC );


function articled_theme_menu() {
    add_theme_page( __('Articled Theme', 'articled'), __('Articled Theme', 'articled'), 'edit_theme_options', 'articled-theme', 'articled_theme_page' );
}
add_action( 'admin_menu', 'articled_theme_menu' );
 
function articled_theme_page() {
   echo '<div class="wrap about__container"><h1></h1>';
      get_template_part( 'templates/theme-page' );
   echo '</div>';
}

