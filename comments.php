<?php
/**
* @package Articled
* @since Articled 1.0
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">' . __( 'Direct script access denied.', 'articled') . '</div>' );
}

if ( post_password_required() ) { return; }

 ?>

<!-- Comments Wrap -->
<section id="comments" class="comments-area">

  <?php global $post; $comments_number = get_comments_number( $post->ID);?>

  <!-- Comments Helper -->
	<div class="row comments-control">
		<div class="col-md-4">
  			<div class="comments-button">
            <?php if($comments_number): ?>
                <span class="comments-text-show">
                    <?php esc_html_e( 'Show', 'articled') ?>
                </span>
                <span class="comments-text-hide">
                    <?php esc_html_e( 'Hide', 'articled') ?>
                </span>
            <?php endif;

              // showing comments text for one or onemore coments
              if( $comments_number ) {
                echo esc_html( _n( 'Comment', 'Comments', $comments_number, 'articled' ) );
              } else {
                esc_html_e('No Comments', 'articled' );
              }

             ?>
  			</div>
		</div>
		<?php if($comments_number): ?>
		<div class="col-md-4"></div>
		<div class="col-md-4">
  			<h2 class="comments-counts">
				<?php articled_comments_count(); ?>
  			</h2>
		</div>
		<?php endif ?>
	</div>
  <!-- Comments Helper End -->

  <!-- Comments -->
  <?php if ( have_comments() ) : ?>
  	<ul class="comments-list col-md-12">
		<?php
		  
    	    wp_list_comments(array(
				'callback' => 'articled_comments',
				'style' => 'li',
				'avatar_size' => '40',
				'max_depth' => 4,
			));
				
		// Are there comments to navigate through?
		if ( get_comment_pages_count() > 1  || intval( get_option( 'page_comments' ) ) ) : ?>

			<nav class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'articled' ); ?></h2>
				<div class="nav-links">
					<?php
						if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'articled' ) ) ) :
							printf( '<div class="nav-previous">%s</div>', $prev_link );
						endif;

						if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'articled' ) ) ) :
							printf( '<div class="nav-next">%s</div>', $next_link );
						endif;
					?>
				</div>
			</nav>

		<?php endif; ?>
		
  	</ul>
  <?php endif; ?>
  <!-- Comments End -->

  <?php
  // If comments are closed and there are comments, let's leave a little note, shall we?
  if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
    echo '<p class="btn danger-border">'. esc_html__( 'Sorry, Comments are closed.', 'articled' ) . '</p>';
  };
  ?>

  <?php
  // Comment form. e.g Name, website, comment fields.
		if (is_user_logged_in()) {
			$args = array(
					'id_form' => 'commentform',
					'id_submit' => 'submit',
                           // single post comment replying title text
					'title_reply' => __('Leave a reply', 'articled') . ':',
					'title_reply_to' => __('Leave a Reply to %s', 'articled'),
					'cancel_reply_link' => __('Cancel Reply', 'articled'),
                            // single post comment submit button text
					'label_submit' => __('Post Comment', 'articled'),
					'comment_field' => '<div class="comment_textarea clearfix col-md-12"><textarea id="comment" name="comment" aria-required="true" class="col-md-12" rows="8"></textarea></div></div>',
					'must_log_in' => '<p class="must-log-in">'.sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'articled' ), wp_login_url(apply_filters('the_permalink',get_permalink())) ).'</p>',
					'logged_in_as' => '<div class="row">',
					'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'articled') . '</p><div class="row">',
					'comment_notes_after' => '',
					'fields' => apply_filters('comment_form_default_fields', array(
							'author' => '<div class="col-md-4"><input id="author" name="author" class="form-control col-md-12" type="text" placeholder="'.__('Name', 'articled').'"></div>',
							'email' => '<div class="col-md-4"><input id="email" name="email" class="form-control col-md-12" type="text" placeholder="'.__('Email', 'articled').'"></div>',
							'url' => '<div class="col-md-4"><input id="url" name="url" class="form-control col-md-12" type="text" placeholder="'.__('Website', 'articled').'"></div></div>')
					)
			);
		} else {
				$args = array(
				    'id_form' => 'commentform',
				    'id_submit' => 'submit',
				    'title_reply' => __('Leave a reply', 'articled') . ':',
				    'title_reply_to' => __('Leave a Reply to %s', 'articled'),
                                // single post comment 'cancel replying' title text
				    'cancel_reply_link' => __('Cancel Reply', 'articled'),
				    'label_submit' => __('Post Comment', 'articled'),
				    'comment_field' => '<div class="comment_textarea clearfix col-md-12"><textarea id="comment" name="comment" aria-required="true" class="col-md-12" rows="7"></textarea></div></div>',
				    'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'articled' ), wp_login_url(apply_filters('the_permalink',get_permalink())) ).'</p>',
				    'logged_in_as' => '',
				    'comment_notes_before' => '<p class="comment-notes">' . __('Your email address will not be published.', 'articled') . '</p><div class="row">',
				    'comment_notes_after' => '',
				    'fields' => apply_filters('comment_form_default_fields', array(
				        'author' => '<div class="row comments-fields"><div class="col-md-4"><input id="author" name="author" class="form-control col-md-12" type="text" placeholder="'.__('Name', 'articled').'"></div>',
				        'email' => '<div class="col-md-4"><input id="email" name="email" class="form-control col-md-12" type="text" placeholder="'.__('Email', 'articled').'"></div>',
				        'url' => '<div class="col-md-4"><input id="url" name="url" class="form-control col-md-12" type="text" placeholder="'.__('Website', 'articled').'"></div></div>')
				    )
				);
	}
	comment_form($args);
?>

</section>
<!-- Comments Wrap End -->
