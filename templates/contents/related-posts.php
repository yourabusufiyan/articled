<?php
/**
*
* Single post's related post
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

// Getting query ready for related posts
$args = array(
  'orderby' => 'rand',
  'posts_per_page' => get_theme_mod( 'articled_single_related_count', '3'),
  'ignore_sticky_posts' => 1,
  'meta_query' => array(
    array(
      'key' => '_thumbnail_id',
      'value'   => '',
      'compare' => '!=', )
    )
  );
$related_post_query = new WP_Query($args);
if( $related_post_query->have_posts() ) :
?>

<div class="row related-posts">
  <div class="related-posts-title">
    <h4 class="screen-reader-text"><?php _e('You May Also Like it.', 'articled') ?></h4>
  </div>
  <?php
    // Related Posts
    if ( $related_post_query->have_posts() ) :
        while ( $related_post_query->have_posts() ) : $related_post_query->the_post(); ?>

          <div id="post-<?php echo esc_attr( the_ID() ) ?>" <?php post_class(' effect col-md-4 clearfix '); ?> >
            <div class="related-post clearfix">
               <a title="<?php echo esc_attr( get_the_title() ) ?>" href="<?php echo esc_url( get_permalink() ); ?>">
                <?php
                 if ( has_post_thumbnail() && strlen( get_the_post_thumbnail() ) ) {
                    echo articled_classic_thumbnail( 'articled_related-thumbnail', 'articled_thumbnail_very_low', esc_attr( get_the_ID() ) );
                 } else {
                    echo '<img class="top" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/classic-default-thumbnail.jpg"/>';
                 }
                ?>
               </a>
               <div class="related-post-title ">
                 <h2 title="<?php echo the_title_attribute()?>">
                   <a href="<?php echo esc_url( get_permalink() ) ?>"><?php echo the_title_attribute()?></a>
                 </h2>
               </div>
            </div>
          </div>

        <?php
        endwhile;
        wp_reset_postdata();
    endif;
  ?>
</div>

<?php endif; ?>
