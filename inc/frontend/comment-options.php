<?php
/**
*
*  Comments callback function
*
* @package Articled
* @subpackage inc
* @since Articled 1.0
*
*/


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
}




function articled_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>

    <<?php echo $tag; ?>  <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php esc_attr( comment_ID() ) ?>"><?php
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php esc_attr( comment_ID() ) ?>" class="comment-body clearfix"><?php
    } ?>

       <?php
        
        // getting avatar of user
        if ( $args['avatar_size'] != 0 ) {
          echo get_avatar( $comment, $args['avatar_size'] );
        }
        ?>


        <div class="media-body">

            <?php if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation">
                  <?php _e( 'Your comment is awaiting moderation.', 'articled' ); ?>
                </em><br/>
            <?php } ?>

            <div class="comment-meta ">
              <span class="comment-author">
                <?php echo get_comment_author_link(); ?>
              </span>
              <span class="date">
                <a href="<?php echo esc_attr( get_comment_link( $comment->comment_ID ) ); ?>">
                  <time><?php printf(__('%1$s at %2$s', 'articled'), esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?></time>
                </a>
              </span>

              <?php if( comments_open() ) echo ' - '; ?>

              <span class="reply">
                <?php
                comment_reply_link( array_merge(
                     $args, array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        ))
                  ); ?>
              </span>

              <?php edit_comment_link( __( 'Edit', 'articled' ), '<span class="comment-edit"> - ', '</span>' ); ?>
              
           </div>

           <div class="comments-text">
            <p><?php comment_text(); ?></p>
           </div>

        </div>

          <?php if ( 'div' != $args['style'] ) : ?>
        </div>
      <?php endif;
}

?>
