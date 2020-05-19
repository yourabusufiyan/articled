      <footer>
        <!-- copyright Wrapper -->
          <div class="copyright-warp">
            <div class="container">
              <p id="copyright">
                <?php 
                  global $articled_options;
                  echo wp_kses( abu_ekey( 'footer_text', $articled_options,
                    sprintf( __( 'Copyright &copy; %1$u <a href="%2$s">%3$s</a> - All Rights Reserved', 'articled' ) , esc_attr( date('Y') ) , esc_url( home_url('/') ), esc_html( get_bloginfo('name') ) )
                  ), wp_kses_allowed_html('post') );
                ?>
              </p>
            </div>
          </div>
        <!-- copyright Wrapper End -->
      </footer>  

    </div>
    <?php wp_footer(); ?>
  </body>
</html>