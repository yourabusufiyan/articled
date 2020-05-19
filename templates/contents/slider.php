<?php
/**
*
*  Slider contents
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

<div class="slider-wid">
  <?php dynamic_sidebar( 'articled-slider-sidebar' ); ?>
</div>