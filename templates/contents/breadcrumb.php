<?php
/**
*
* Single post's breadcrumb
*
* @package Articled
* @subpackage parts
* @since Articled 1.0
*
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
}



global $post;
echo '<ul class="breadcrumbs">';
if (!is_home()) {
    echo '<li><a href="' . esc_url( home_url('/') ) . '">';
    if( 'no' == 'both' ){
      echo ' <i class="fas fa-home"></i> ' . esc_html__( 'Home', 'articled' );
    } elseif ( 'alsono' == 'text') {
      _e('Home', 'articled');
    } else {
      echo '<i class="fas fa-home"></i>';
    }
    echo '</a></li>';
    if ( is_category() || is_single() ){
        echo '<li>';
        the_category(' </li><li> ');
        if (is_single()) {
            echo '</li>';
            echo '<li>'.esc_html( get_the_title() ).'</li>';
        }
    } elseif( is_page() ){
        if($post->post_parent){
            $anc = get_post_ancestors( $post->ID );
            $atitle = get_the_title();
            foreach ( $anc as $ancestor ) {
                $output = '<li><a href="'.esc_url( get_permalink($ancestor) ).'"
                           title="'.esc_attr( get_the_title($ancestor) ).'">'.esc_html( get_the_title($ancestor) ).'</a> <span class="separator">/</span> </li>';
            }
            echo esc_html( $output );
            echo '<strong class="current-page" title="'.esc_attr( $atitle ).'"> '.esc_html( $atitle ).'</strong>';
        } else {
            echo '<li><strong class="current-page"> '.esc_html( get_the_title() ).'</strong></li>';
        }
    }
} elseif ( is_tag() ) {
   single_tag_title();
} elseif ( is_day() ) {
  echo "<li>".esc_html__('Archive for', 'articled').esc_html( get_option( 'date_format' ) ).'</li>';
} elseif ( is_month() ) {
  echo "<li>".esc_html__('Archive for', 'articled').esc_html( get_option( 'date_format' ) ).'</li>';
} elseif ( is_year() ) {
  echo "<li>".esc_html__('Archive for', 'articled').esc_html( get_option( 'date_format' ) ).'</li>';
} elseif ( is_author() ) {
  echo '<li>'.esc_html__('Author Archive', 'articled').'</li>';
} elseif ( is_date() ) {
  echo '<li>'.esc_html__('Archive for', 'articled').'</li>';
} elseif ( isset($_GET['paged'] ) && !empty($_GET['paged'])) {
  echo '<li>'.esc_html__('Archive for', 'articled').'</li>';
} elseif ( is_search() ) {
  echo '<li>'.esc_html__('Search Results', 'articled').'</li>';
}
echo '</ul>';
