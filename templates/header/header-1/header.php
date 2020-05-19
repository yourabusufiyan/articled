
<header>

    <div class="header-logo">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="logo-wrap col-md-10">
                    <div class="site-logo">

                        <div class="site-info">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url('/') ) ?>">
                            <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                            </a>
                        </h1>
                        <p class="site-description">
                            <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                        </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="lowest row justify-content-md-center">
                <div class="col-md-12">

                <div class="bottom-bar">

                    <div class="bottom-desk-nav" role="navigation">
                            <div class="bottom-nav">
                            <?php
                            $topmob_nav_a = array(
                                'theme_location'  => 'main-menu',
                                'menu'            => __( 'Main Navigation', 'articled' ),
                                'container'       => 'nav',
                                'container_class' => '',
                                'menu_class'      => '',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => ' <span class="menu-title"> ',
                                'link_after'      => '</span>',
                                'items_wrap'      => '<ul id="%1$s" class="%2$s main-nav" role="menubar">%3$s</ul>',
                                'depth'           => 4,
                            );
                            $topmob_nav = wp_nav_menu( $topmob_nav_a );
                            ?>
                        </div>
                    </div><!-- Main Menu ENd -->
                    <div class="show-mobile pull-left">
                        <p class="mobile-nav-title"><?php esc_html_e( 'Main Menus' , 'articled' ) ?></p>
                    </div>
                    <div class="slider pull-right">
                        <div class="slide">
                            <i class="fa fa-align-center author-info-data" id="sliders"></i>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="mobile-menu">
                    <?php
                    $topmob_nav_a = array(
                        'theme_location'  => 'main-menu',
                        'container'       => 'nav',
                        'container_class' => '',
                        'menu_class'      => '',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => ' <span class="mobile-nav-title"> ',
                        'link_after'      => '</span>',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s mobile-nav" role="menubar">%3$s</ul>',
                        'depth'           => 3,
                    );
                    $topmob_nav = wp_nav_menu( $topmob_nav_a );
                    ?>
                </div>
            </div>
        </div><!-- lowest end -->
    </div>

</header>