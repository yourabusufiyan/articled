<?php
/**
*
* Blog Type Classic
*
* @package Articled
* @subpackage post-show-type
* @since Articled 1.0
*
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
}?>

<section class="index-excerpt blog-type-classic">

  <!-- Post Thumbnail -->
  <div class="post-thumbnail" id="box">
    <?php
      if(  ! class_exists( 'articled_classic_thumbnail' ) ) {
        echo '<a href="' . esc_url( get_the_permalink() ) . '">' . articled_classic_thumbnail('articled_full_thumbnail','articled_related_thumbnail_srcset') . '</a>';
      } else {
        ( new articled_classic_thumbnail() )->output( true );
      }
    ?>
  </div>
  <!-- End Post Thumbnail -->


  <!-- Post Information -->
  <div class="post-info">
  
    <div class="post-header">
      <?php articled_title(); ?>
      <?php get_template_part( 'templates/contents/post-meta'); ?>
    </div>

    <div class="post-excerpt">
      <?php the_excerpt(); ?>
    </div>

  </div>
  <!-- End Post Information -->
  <div class="clearfix"></div>
</section>
