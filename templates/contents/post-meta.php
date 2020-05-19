<?php
/**
*
* Post Meta for single and blog posts
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


?>

<!--  Blog Post Meta -->
<div class="blog-post-meta">
    <p>
      <?php if( (get_theme_mod('articled_post_format_icon', true) == true) ): ?>
         <span class="type">
            <a href="<?php echo esc_url( get_permalink() );?>">
               <?php get_template_part( 'parts/post-type-icons');?>
            </a>
         </span>
      <?php endif?>

      <?php  if(get_theme_mod('articled_post_meta_date', true) == true) echo articled_clickable_date(); ?>

      <?php if(get_theme_mod('articled_post_meta_time', true) == true): ?>
          <span class="time"> <?php esc_html_e( 'at', 'articled' ) ?> <?php esc_html(the_time(get_option('time_format')) ); ?></span>
      <?php endif; ?>

      <?php if( (get_theme_mod('articled_post_meta_categories', true) == true) && ( get_post_type() != 'page') ): ?>
        <span class="category"><?php _e('In ', 'articled'); the_category(', '); ?></span>
      <?php endif; ?>

      <?php if( (get_theme_mod('articled_post_meta_comments', true) == true) && ( get_post_type() != 'page')): ?>
        <span class="comments">
          <a href="<?php the_permalink() ?>#comments">
            <?php articled_comments_count( get_comments_number() );?>
          </a>
        </span>
      <?php endif; ?>

      <?php if(get_theme_mod('articled_post_meta_author', true) == true):
        if ( true ) {
          printf( '<span class="author"><span class="author vcard"><a href="%2$s">%1$s</a> <a href="%2$s">%3$s</a></span></span>',
            get_avatar( get_the_author_meta('ID'), 25),
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
            get_the_author()
          );
        }
       endif; ?>

      <?php articled_edit_delete_post(); ?>

     </p>
 </div>
 <!-- End Blog Post Meta -->
