<?php 
// Enable widgetable sidebar
// You might need to tweak theme files, more info here - http://codex.wordpress.org/Widgetizing_Themes
if( ! function_exists('articled_side_bar_widgets') ) {
  function articled_side_bar_widgets() {
    register_sidebar( array(
      'name'          => __( 'Main Sidebar', 'articled' ),
      'id'            => 'articled-main-sidebar',
      'description'   => __( 'Widgets Appear in Sidebar.', 'articled' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h3 class="widget-titles"><span class="screen-text">',
      'after_title'   => '</span></h3>',
    ) );

    register_sidebar(array(
      'name' => __('Slider', 'articled'),
      'id' => 'articled-slider-sidebar',
      'description' => __( 'You can add widget for displaying on slider.', 'articled' ),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>",
      'before_title' => '<h4 class="slider-titles"><span class="screen-text">',
      'after_title' => '</span></h4>',
    ));

  	register_sidebar(array(
      'name' => __('404 Sidebar', 'articled'),
      'id' => 'articled-sidebar-404',
      'description' => __('Add widgets to 404 Error Page.'  , 'articled'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>",
      'before_title' => '<h3 class="widget-title-404"><span class="screen-text">',
      'after_title' => '</span></h3>',
  	));

  	register_sidebar(array(
      'name' => __('Footer Widgets 1', 'articled'),
      'id' => 'articled-footer-1',
      'description' => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>",
      'before_title' => '<h4 class="widget-titles"><span class="screen-text">',
      'after_title' => '</span></h4>',
  	));

  	register_sidebar(array(
      'name' => __('Footer Widgets 2', 'articled'),
      'id' => 'articled-footer-2',
      'description' => '',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => "</div>",
      'before_title' => '<h4 class="widget-titles"><span class="screen-text">',
      'after_title' => '</span></h4>',
  	));

  }
  add_action( 'widgets_init', 'articled_side_bar_widgets' );
}