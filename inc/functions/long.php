<?php

// if( ! function_exists('')){
//     function (){

//     }
// }

if( ! function_exists('articled_loop')){
    function articled_loop($path = '', $page = 'index', $defaut = '') {

        
        // Dispaly <div> tag for Masonary blog post
        articled_is_masonry('top');

            // started WordPress loop
            if( have_posts() ) {
                while( have_posts() ) :
                    the_post();
                    echo '<article '; post_class(); echo ' id="post-' . get_the_ID() . '">';
                        echo load_template( apply_filters( 'articled_blog_' . $page, $path ), false );
                    echo '</article>';
                endwhile;
            } else {
                echo '<h2>' . _e('Opppp! Sorry No Content', 'articled') . '</h2>';
            }

        articled_is_masonry('bottom');

    }
}


if( ! function_exists('articled_pagination') ){
    function articled_pagination(){

        // blog post Pagination e.g page 1 2 3 4
        $paginate_args = [
            'prev_text'          => '<i class="fas fa-angle-left"></i>',
            'next_text'          => '<i class="fas fa-angle-right"></i>',
            'type'               => 'list',
            'add_args'           => false,
            'add_fragment'       => '',
            'before_page_number' => '<span class="nada">',
            'after_page_number'  => '</span>'
        ];
        echo '<div class="page-pagination">' . paginate_links( $paginate_args ) . '</div>';
    
    }
}


if( ! function_exists('articled_sidebar') ){
    function articled_sidebar($opt = true){
        if( ! $opt ) return;
        echo '<!-- Page Sidebar -->';
           echo '<div class="col-md-3">';
               echo '<aside class="sidebar">';
                   get_sidebar();
               echo '</aside>';
           echo '</div>';
        echo '<!-- Page Sidebar End -->';
        return;
    }
}


// Thumbnail Images function_exists
if( !function_exists('articled_classic_thumbnail') ) :
function articled_classic_thumbnail( $data_src = 'thumbnail', $scr = 'thumbnail', $default = null) {

   if( has_image_size( $scr )){
      $img_src = esc_url( get_the_post_thumbnail_url( get_the_ID(), $scr ) );
   } else {
     $img_src = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium' ) );
   }

   $img_data_data   = esc_url( get_the_post_thumbnail_url( get_the_ID(), $data_src ) );
   $data_src_small  = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'articled_data_src_small' ) );
   $data_src_medium = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'articled_data_src_medium' ) );
   $data_src_large  = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'articled_data_src_large' ) );

   if ( !$default = null ) {
     $thumbnail = $default;
   }

   $img_title = get_the_title( get_post_thumbnail_id() );
   $img_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
   if(!empty($img_alt)){
     $img_alt = $img_alt;
   } else {
     $img_alt = $img_title;
   }

   if ( has_post_thumbnail() && strlen(get_the_post_thumbnail()) ) {
      // If Post has Thumbnail
      $thumbnail = '<img data-src="' . esc_url( $img_data_data ) .  '" src="' . esc_url( $img_src ) 
      . '" data-src-small="' . esc_url( $data_src_small ) . '" data-src-medium="'. esc_url( $data_src_medium ) .'" data-src-large="'.esc_url($data_src_large).'"'
      .' alt="'.esc_attr( $img_alt ).'" title="'.esc_attr( $img_title ).'"/>'
      .'<!-- Fallback for non JavaScript browsers -->'
      .'<noscript><img src="'.esc_url( get_the_post_thumbnail_url( get_the_ID(), 'medium_large' ) ).'" alt="'.esc_attr( get_the_title(get_the_ID()) ).'" /></noscript>';
   } else {
      // If, It is not page
      if(!is_page()){
        // If Post doesn't has Thumbnail, then SHow default Images
        $thumbnail = '<img src="' . esc_url( ARTICLED_IMG . 'classic-default-thumbnail.jpg' ) . '" data-src="' . esc_url( ARTICLED_IMG . 'classic-default-thumbnail.jpg') . '"/>';
      }
   }

   // return final thumnail to echo out
   return $thumbnail;

}
endif;

if( ! function_exists('articled_header')){
    function articled_header( $header = '' ){
        global $articled_options;
        $header = ARTICLED_HEADER .  'header-' . ( empty( $header ) ? abu_ekey( 'header_type', $articled_options, '1' ) : $header ) . '/header.php';
        $header = apply_filters( 'articled_header_path', $header );
        return load_template( $header, true );
    }
}   