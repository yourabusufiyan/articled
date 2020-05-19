<?php /**
 * The template for displaying all single posts and attachments and so
 *
 * @package Articled
 * @since Articled 1.0
 */
?>
<?php get_header();?>

<?php  global $post_type_icon, $post;?>
<section id="main-content" class="site-content">
  <div class="container">

    <!-- Post Thumbnail, Video, Audio, or Galler ect. -->
    <div class="single-post-thumb">
      <?php
         if( ! class_exists( 'articled_single_thubmnail' ) || has_post_format() ) {
           echo articled_classic_thumbnail( 'full_thumbnail','related_thumbnail_srcset' );
         }
      ?>
    </div>
    <!-- Post Thumbnail, Video, Audio, or Galler ect. -->

    <!-- Post Info  -->
    <div class="single-post-info">
         <!-- Post Title  -->
           <h1> <?php
               if( ! get_the_title() == '' ) {
                   echo esc_attr( get_the_title() );
               } else {
                echo '<span class="no-title">'.__( 'This Post has not Title', 'articled').'</span>' ;
               } ?>
           </h1>
         <!-- End Post Title  -->

         <!-- Post Meta  -->
          <div class="single-post-meta">
              <p></span>
                  <?php echo get_the_date( get_option( 'date_format' ) , get_the_id() ) ?><span class="time"> <?php esc_html_e( 'at', 'articled' ) ?> <?php the_time( get_option( 'time_format' ) ); ?></span>
                  <span class="category"> <?php esc_html_e( 'In', 'articled' ) ?> <?php the_category(', '); ?></span>
                  <span class="comments"><a href="<?php the_permalink()?>#single-comments"><?php articled_comments_count( get_comments_number() );?></a></span>
                  <?php
                    if ( !is_multi_author() ) {
                      printf( '<span class="author"><span class="author vcard"><a href="%2$s">%1$s</a> <a href="%2$s">%3$s</a></span></span>',
                        get_avatar( get_the_author_meta('ID'), 25),
                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                        get_the_author()
                      );
                    }
                    articled_edit_delete_post();
                  ?>
                </p>
          </div>
        <!-- End Post Meta  -->
    </div>
    <!-- End Post Info  -->
    <div class="clearfix"></div>

    <!-- Breadcrumb  -->
      <?php get_template_part( 'templates/breadcrumb' ); ?>
    <!-- End Breadcrumb  -->

    <main class="posts-contents row" role="complementary">
        <!-- content or Full content -->
        <div class="col-md-9">
           <?php if( have_posts() ) : while( have_posts() ) : the_post()  ?>
           <article <?php post_class(); ?> id="<?php the_ID(); ?>">

                <?php function articled_single_content() { ?>
                <!-- Post Content  -->
                <div class="single-post-content entry-content">
                      <?php the_content(); ?>
                      <?php
                        $articled_link_pages = array(
                          'before'           => '<div class="link-pages">' . __( 'Pages :   ', 'articled' ),
                          'after'            => '</div>',
                          'link_before'      => '<span class="post-page-num">',
                          'link_after'       => '</span>',
                          'next_or_number'   => 'number',
                          'separator'        =>  ' ',
                          'nextpagelink'     => __( 'Next page', 'articled'),
                          'previouspagelink' => __( 'Previous page', 'articled' ),
                          'pagelink'         => '%',
                          'echo'             => 1
                        );
                        wp_link_pages( $articled_link_pages );
                      ?>
                </div>
                <!-- End Post Content  -->
              <?php } ?>

              <?php function articled_single_share_icon() { global $post;?>
                 <!-- Social Share Button -->
                  <?php $postlink = esc_url( get_permalink( $post ) ); $posturl =  urlencode_deep( $postlink ); ?>
                  <div class="social-share">
                      <div class="shareicons">
                          <a style="color: #000; margin: 5px"><i class="fas fa-share-alt <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="http://www.facebook.com/sharer.php?u=<?php echo $posturl ;?>" rel="nofollow" target="_blank"><i class="fab fa-facebook-f <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="http://twitter.com/share?text=<?php the_title(); ?>&url=<?php echo $postlink; ?>" rel="nofollow" target="_blank"><i class="fab fa-twitter <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="https://plus.google.com/share?url=<?php echo $posturl;?>" rel="nofollow" target="_blank"><i class="fab fa-google-plus-g <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $posturl;?>" rel="nofollow" target="_blank"><i class="fab fa-linkedin-in <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="http://www.reddit.com/submit?url=<?php echo $posturl;?>" rel="nofollow" target="_blank"><i class="fab fa-reddit-alien <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                          <a href="mailto:?subject=<?php the_title_attribute(); ?>&body=Check out this post : <?php echo $posturl;?>" rel="nofollow" target="_blank"><i class="far fa-envelope <?php echo get_theme_mod('articled_single_icon_style', 'scrb-ti-round');?>"></i></a>
                      </div>
                  </div>
                  <!-- End Social Share Button -->
              <?php }?>


              <?php function articled_single_tags() { global $post;?>
                <!-- Tags -->
                <div class="single-post-tags-area">
                    <h3> <?php _e('Tags', 'articled'); ?> : </h3>
                    <?php 
                      $tags = get_the_tags($post->ID); 
                      if ( count($tags) > 0 ) {
                        echo '<ul class="single-post-tags">';
                        foreach($tags as $tag){
                            echo '<li>';
                              echo '<a class="single-tag" href="'. home_url() .'/tag/'. esc_attr( $tag->slug ) . '">';
                                echo esc_html( $tag->name );
                              echo '</a>';
                            echo '</li>';
                          } 
                        echo '</ul>';
                      } else {
                        echo '<h4 style="display: inline">"' . __('Oppps! Empty', 'articled') . ' <i class="fas fa-frown"></i>"</h4>';
                      }
                    ?>
                </div>
                <!-- End Tags -->
              <?php }?>


              <?php function articled_single_author_details() { ?>
                  <!-- Post Author  -->
                  <div class="post-author-info">
                      <?php get_template_part('templates/author-info') ?>
                  </div>
                  <!-- End Post Author  -->
              <?php }?>


              <?php
                // Content Arrenged by
                $content_arrenged =  get_theme_mod( 'articled_single_content_arrenged_item', 'content,share_icon,tags,author_details' );
                $content_arrenged = explode(',',$content_arrenged);
                foreach ($content_arrenged as $key => $value) {
                  $func_ = 'articled_single_'.$value;
                  echo $func_();
                }
              ?>

              <?php endwhile; else :  // echo out if, Page Doet found ?>
                 <h2><?php _e('Opppp! Sorry No Content', 'articled') ?></h2>
              <?php endif; ?>
           </article>
        </div>
        <!-- End content or Full content -->

        <?php if( true ) : ?>
           <!-- Sidebar -->
             <aside class="col-md-3 sidebar">
               <div class="sidebar-content">
                 <?php if (get_theme_mod('articled_single_cussideb', false) === true) {
                       dynamic_sidebar('articled-post-single');
                   } else {
                      get_sidebar();
                   }?>
               </div>
             </aside>
           <!-- end Sidebar -->
        <?php endif; ?>

    </main>

    <?php function articled_bottom_related_post() { ?>
    <!-- Releted Posts -->
      <?php get_template_part('templates/related-posts') ?>
    <!-- End Releted Posts -->
    <?php } ?>

    <?php function articled_bottom_comments() { ?>
      <!-- Comments -->
      <div class="single-comments">
          <?php 
            echo '<!-- WordPress Comments -->';
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            } else {
              echo '<p class="btn danger-border">'. __( 'Sorry, Comments are closed.', 'articled' ) . '</p>';
            }
            echo '<!-- End WordPress Comments -->';
          ?>
      </div>
      <!-- End Comments -->
    <?php }?>


    <?php function articled_bottom_post_nav() { ?>
      <!-- Next and Previous Posts -->
      <div class="post-navigations">
         <?php get_template_part('templates/post-nav') ?>
      </div>
      <!-- End Next and Previous Posts -->
    <?php } ?>

    <?php
      $bottom_arrenged =  get_theme_mod( 'articled_single_bottom_arrenged_item', 'related_post,comments,post_nav' );
      $bottom_arrenged = explode(',',$bottom_arrenged);
      foreach ($bottom_arrenged as $key => $value) {
        $func_ = 'articled_bottom_'.$value;
        echo $func_();
      }
    ?>

  </div>
</section>
<?php get_footer(); ?>
