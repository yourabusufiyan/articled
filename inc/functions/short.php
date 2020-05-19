<?php

// if( ! function_exists('')){
//     function (){

//     }
// }

if( ! function_exists('articled_is_masonry')){
    function articled_is_masonry($place = null, $masonry = '1', $echo = true){
        
        $o = null;
        if( $place == 'top' ) {
            if( $masonry == '6' || $masonry == '5' ) {
                $o = '<div class="posts-masonry">';
            };
        } else {
            $o = ( ( $masonry == '6' || $masonry == '5' ) ? '</div>' : '');
        }

        if( $echo ) echo  $o ;
        return esc_attr( $o );

  }
}

if( ! function_exists('articled_title')){
    function articled_title() {
        echo '<!-- Blog Post Title -->';
        echo '<a href="'; the_permalink(); echo '">';
          echo '<h3 class="blog-post-title">';
                if( ! empty(get_the_title()) ) {
                    the_title();
                } else {
                    echo '<span class="no-title">' . esc_html__( 'This Post has not Title', 'articled' ) . '</span>';
                }
          echo '</h3>';
        echo '</a>';
        echo '<!-- End Blog Post Title -->';
        return;
    }
}


if ( ! function_exists( 'articled_clickable_date' ) )   {
  function articled_clickable_date() {
    $o = '<span class="date">';
      $p = '<a href="' . esc_attr( get_home_url('/') ) . '/' . esc_attr( get_the_date('Y') ) . '/' . esc_attr( get_the_date('m') ) .  '/' . '"> ' . esc_attr( get_the_date('M') ) . '</a>';
      $p = '<a href="' . esc_attr( get_home_url('/') ) . '/' . esc_attr( get_the_date('Y') ) . '/' . esc_attr( get_the_date('m') ) . '/'  . esc_attr( get_the_date('j') ) . '/"> ' . esc_attr( get_the_date('j') ) . ',</a>';
      $p = '<a href="' . esc_attr( get_home_url('/') ) . '/' . esc_attr( get_the_date('Y') ) . '/"> ' . esc_attr( get_the_date('Y') ) . '</a>';
      $o .= esc_attr( get_the_date() );
    $o .= '</span>';
    return $o;
  }
}

if( !function_exists('articled_comments_count') ) :
function articled_comments_count( $comments_number = null ){
    if( $comments_number == null) {
      global $post;
      $comments_number = get_comments_number( $post->ID);
    } else {
      $comments_number = $comments_number;
    }
    if($comments_number > 1) {
      printf( _x('%1$s comments','plural comments','articled'), number_format_i18n( $comments_number ) );
    } elseif  ( $comments_number ) {
      echo _x( 'One Comment', 'singular comment', 'articled' );
    } else {
      _e('No Comments', 'articled' );
    }

}
endif;

// init actions for logged in user
if( !function_exists('articled_delete_post_url') ):
  function articled_delete_post_url() {
      // run only for single post page
      if (is_single() && in_the_loop() && is_main_query() || is_home()  || is_author() ) {
          // add query arguments: action, post, nonce
          $url = add_query_arg(array(
                  'action' => 'articled_delete_post',
                  'post'   => get_the_ID(),
                  'nonce'  => wp_create_nonce('articled_delete_post_nonce'),
              ),
              home_url()
          );
          return esc_url($url);
      }
      return null;
  }
endif;

if( !function_exists('articled_edit_delete_post') ) :
function articled_edit_delete_post(){
  if( is_user_logged_in() &&  current_user_can( 'edit_posts' ) ) {
    echo '<span class="edit-links">[';
    edit_post_link( sprintf( __( '%sEdit', 'articled' ), '<i class="far fa-edit"></i>' ) , '<span>', '</span>', null, 'edit-post-link' );
    echo '<span><a href="' . esc_url( articled_delete_post_url() ) . '" ><i class="fas fa-trash-alt"></i>'.__( 'Delete', 'articled' ).'</a></span>]</span>' ;
  };
}
endif;