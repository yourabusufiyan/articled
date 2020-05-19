<?php
/**
*
* Single.php's Blog info
*
* @package Articled
* @subpackage parts
* @since Articled 1.0
*
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
  exit( '<div style="font-family: monospace;color: red;display: flex;justify-content: center;
  align-items: center;width: 100%;height: 100%;font-size: 40px;font-weight: 600;">Direct script access denied.</div>' );
}
?>

<!-- Author Info -->
<div class="author-info row align-items-center">

	<!-- Author Avatar -->
	<div class="author-avatar col-md-2">
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="">
		    <?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
		</a>
	</div>
	<!-- End Author Avatar -->


	<div class="author-about col-md-10">

		<!-- Author Name -->
		<h3 class="author-title">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php echo get_the_author() ?>
			</a>
		</h3>
		<!-- End Author Name -->

		<!-- Author Bio -->
		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p>
		<!-- End Author Bio -->

		<!-- Author Links -->
    <div class="social-icons-list">

				<!-- Author Site URL -->
				<?php if ( !empty(get_the_author_meta('url')) ) : ?>
					<a rel="nofollow" href="<?php echo esc_url( get_the_author_meta('url') ) ?>" target="_blank" >
            <i class="fa fa-globe"></i>
          </a>
        <?php endif; ?>

				<!-- Author Facebook URL -->
        <?php if (!empty(get_the_author_meta('articled_facebook_url'))) : ?>
					<?php if (!strstr(get_the_author_meta('articled_facebook_url'), 'facebook.com') && !strstr(get_the_author_meta('articled_facebook_url'), 'fb.com')) : ?>
						<a href="https://facebook.com/<?php echo esc_url( get_the_author_meta('articled_facebook_url') ) ?>" target="_blank" rel="nofollow">
					<?php else : ?>
						<a href="<?php echo esc_url( get_the_author_meta('articled_facebook_url') ) ?>" target="_blank" rel="nofollow">
					<?php endif; ?>
					<i class="fab fa-facebook-square"></i></a>
        <?php endif; ?>

				<!-- Author Twitter URL -->
				<?php $articled_twitter = get_the_author_meta('articled_twitter_url');
				if (!empty($articled_twitter)) : ?>
					<?php if ( !strrpos($articled_twitter, 'twitter.com') && !strrpos($articled_twitter, 'twt.com')) : ?>
							<?php $twitter_replaced = str_replace('@', '', $articled_twitter); ?>
							<a href="httpss://twitter.com/<?php echo esr_attr($twitter_replaced); ?>" target="_blank" rel="nofollow">
					<?php  else : ?>
						<a href="<?php echo esc_url( $articled_twitter ) ?>" target="_blank" rel="nofollow">
					<?php endif; ?>
					<i class="fab fa-twitter-square"></i></a>
        <?php endif; ?>

				<!-- Author Google URL -->
				<?php $articled_google = get_the_author_meta('articled_google_url');
				if (!empty($articled_google)) : ?>
					<?php if ( !strrpos($articled_google, 'google.com') && !strrpos($articled_google, 'plus.google.com')) : ?>
						<?php $google_replaced = str_replace('+', '', $articled_google); ?>
					 	<a href="https://plus.google.com/+<?php echo esc_attr( $google_replaced ) ?>" target="_blank" rel="nofollow">
					<?php  else : ?>
						 <a href="<?php echo esc_url( $articled_google ) ?>" target="_blank" rel="nofollow">
					<?php endif; ?>
					<i class="fab fa-google-plus-square"></i></a>
        <?php endif; ?>

				<!-- Author Pinterest URL -->
				<?php if (get_the_author_meta('articled_pinterest_url') != "") :?>
					<a href="<?php echo esc_url( get_the_author_meta('articled_pinterest_url') ) ?>" target="_blank" rel="nofollow">
            <i class="fab fa-pinterest-square"></i>
          </a>
				<?php endif; ?>

				<!-- Author Linkedin URL -->
        <?php if (get_the_author_meta('articled_linkedin_url') != "") { ?>
    	     <a href="<?php echo esc_url( get_the_author_meta('articled_linkedin_url') ) ?>" target="_blank" rel="nofollow">
             <i class="fab fa-linkedin"></i>
           </a>
        <?php } ?>

				<!-- Author Reddit URL -->
        <?php if (get_the_author_meta('articled_reddit_url') != "") { ?>
    	     <a href="<?php echo esc_url( get_the_author_meta('articled_reddit_url') ) ?>" target="_blank" rel="nofollow">
             <i class="fab fa-reddit-square"></i>
           </a>
        <?php } ?>

				<!-- Author WhatsApp URL -->
        <?php if (get_the_author_meta('articled_whatsapp_url') != "") { ?>
    	     <a href="<?php echo esc_url( get_the_author_meta('articled_whatsapp_url') ) ?>" target="_blank" rel="nofollow">
             <i class="fab fa-whatsapp-square"></i>
           </a>
        <?php } ?>

    </div>
		<!-- Author Links -->

	</div>
</div>
<!-- End Author Info -->
