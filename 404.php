<?php
 /**
 *
 * This file will be called. when user visit unfounded links.
 *
 * @package Articled
 * @since Articled 1.0
 */

 // Exit if accessed directly.
 if ( ! defined( 'ABSPATH' ) ) {
   exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
   align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
 }
 

 get_header();
?>

<section id="main-content" class="site-content">
  <div class="container">
      <main class="contents-404 row" role="complementary">

        <div class="col-md-6">
          <div class="wrap-404">
              <span><?php esc_html_e('4', 'articled') ?><i class="far fa-frown"></i><?php esc_html_e('4', 'articled') ?></span>
          </div>
          <div class="text-404">
            <h1><?php esc_html_e( 'You seem lost.', 'articled') ?></h1>
            <p><?php
                 // Display text for user. user url is not found.
                 echo ( sprintf(
                   __( 'Requested URL %s was not found.' , 'articled'),
                   '<span id="p404"></span>'
                 ) ) ;
             ?></p>
          </div>
        </div>

        <div class="col-md-6">
            <div class="form-404">

              <h2><?php esc_html_e('Maybe try a search?', 'articled') ?></h2>
              <form class="searchform field" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" autocomplete="on" role="search">
                <input type="text" placeholder="<?php esc_attr_e( 'What\'re we looking for', 'articled' ); ?> " name="s" id="s">
                <button type="submit"><i class="fa fa-search"></i></button>
              </form>

            </div>
            <div class="sidebar-404">

                <div class="sidebar-contents">
                  <?php
                    if ( !is_active_sidebar( 'articled-sidebar-404') ) {
                       wp_meta();
                    } else {
                       dynamic_sidebar('articled-sidebar-404');
                    }
                  ?>
                </div>

            </div>
        </div>

        <div class="clearfix"></div>
      </main>
  </div>
</section>

<script> document.getElementById("p404").innerHTML = window.location.pathname; </script>
<?php get_footer(); ?>
