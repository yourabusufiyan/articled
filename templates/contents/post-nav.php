<?php
/**
*
* Single Post Navigation e.g Next Post and Previous Post
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




$articled_next_post = get_next_post();
$articled_prev_post = get_previous_post();

if ( !empty($articled_prev_post) || !empty($articled_next_post) ) {

	echo "<div class='post-navs'>";
	echo '<h3 class="screen-reader-text">' . __('Post Navigation', 'articled') . '</h3>';

	if ( !empty($articled_prev_post) ) : ?>
		<div class="post-nav post-nav-left pull-left col-md-6">

			<a class="nav-arrow" href="<?php echo esc_url(get_the_permalink($articled_prev_post->ID)); ?>" title="<?php echo esc_attr( get_the_title($articled_prev_post->ID) ) ?>" rel="prev">
			  <i class="fa fa-angle-double-left"></i>
			</a>

			<div class="post-nav-thumbnail">
				<a href="<?php echo esc_url(get_the_permalink($articled_prev_post->ID)); ?>" title="<?php echo esc_attr( get_the_title($articled_prev_post->ID) ) ?>" rel="prev">
					<?php if ( has_post_thumbnail($articled_prev_post->ID) && strlen(get_the_post_thumbnail()) ) {
						echo get_the_post_thumbnail( $articled_prev_post->ID, 'articled_60x60', array("class" => "img-responsive") );
					} else {
						echo '<img src="' . esc_url( ARTICLED_IMG . '/post-nav-thumbnail.png' ) . '" alt="' . esc_attr( get_the_title($articled_prev_post->ID) ) . '" >';
					} ?>
				</a>
			</div>

			<div class="post-nav-info">
				<a href="<?php echo esc_url(get_the_permalink($articled_prev_post->ID)); ?>" title="<?php echo esc_attr( get_the_title($articled_prev_post->ID) ) ?>" rel="prev">
				  <span class="post-nav-title"><?php _e('Previous Post:', 'articled') ?></span>
				</a>
				<h4 class="post-title">
					<a href="<?php echo esc_url(get_the_permalink($articled_prev_post->ID));; ?>">
						<?php echo esc_attr( get_the_title($articled_prev_post->ID) ) ?>
					</a>
				</h4>
			</div>

		</div>
	<?php	endif; // $articled_prev_post End

	if ( !empty( $articled_next_post ) ) {?>
		<div class="post-nav post-nav-right pull-right col-md-6">

      		<a class="nav-arrow" href="<?php echo esc_url( get_the_permalink($articled_next_post->ID) ); ?>" title="<?php echo esc_attr( get_the_title($articled_next_post->ID) ) ?>" rel="next">
			  <i class="fa fa-angle-double-right"></i>
			</a>

			<div class="post-nav-thumbnail">
				<a href="<?php echo esc_url( get_the_permalink($articled_next_post->ID) ); ?>" title="<?php echo esc_attr( get_the_title($articled_next_post->ID) ) ?>" rel="next">
  				<?php if ( has_post_thumbnail($articled_next_post->ID) && strlen(get_the_post_thumbnail()) ) {
					echo get_the_post_thumbnail($articled_next_post->ID, 'articled_60x60', array("class" => "img-responsive") );
				} else {
              		echo '<img src="' . esc_url( ARTICLED_IMG . '/post-nav-thumbnail.png' ) .'" alt="' . get_the_title($articled_prev_post->ID) . '">';
				} ?>
				</a>
			</div>

			<div class="post-nav-info">
				<a href="<?php echo esc_url( get_the_permalink($articled_next_post->ID) ); ?>" title="<?php echo esc_attr( get_the_title($articled_next_post->ID) ) ?>" rel="next">
				  <span class="post-nav-title "><?php _e('Next Post:', 'articled') ?></span>
				</a>
				<h4 class="post-title"><a href="<?php echo esc_url( get_the_permalink($articled_next_post->ID) ); ?>">
					<?php echo esc_attr( get_the_title($articled_next_post->ID) )?>
				</a></h4>
			</div>

		</div>
		<?php
	}
	echo "</div>"; // end post_navigation and row
}
