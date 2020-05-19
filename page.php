<?php /**
 * The template for displaying default page tamplate
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
      <div class="row">

         <main class="posts-contents col-md-12" role="complementary">

           <h1 style="mb-4">
              <?php echo esc_html( get_the_title() ); ?>
           </h1>

           <div class="single-post-thumb">
             <?php echo articled_classic_thumbnail('full_thumbnail','related_thumbnail_srcset'); ?>
           </div>


            <!-- Breadcrumb  -->
              <?php get_template_part( 'templates/breadcrumb' ); ?>
            <!-- End Breadcrumb  -->

           <?php if( have_posts() ) : while( have_posts() ) : the_post()  ?>
            <article <?php post_class(); ?> id="<?php the_ID(); ?>">
            <?php the_content();
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
            </article>
           <?php endwhile; else :?>
               <h2><?php __('Opppp! Sorry No Content', 'articled'); ?></h2>
           <?php endif; ?>
           <div class="clearfix"></div>
         </main>

      </div>
   </div>
</section>

<?php get_footer(); ?>
