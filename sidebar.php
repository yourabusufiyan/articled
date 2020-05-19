<?php
 /**
 * main side bar
 *
 * @package Scribe
 * @since 1.0
 */
 
 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
 }

?>

<?php if ( ! is_active_sidebar( 'articled-main-sidebar' ) ) :?>
    <?php wp_meta() ?>
<?php endif;?>

<div class="sidebar-contents ">
  <?php dynamic_sidebar('articled-main-sidebar'); ?>
</div>
