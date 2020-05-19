<?php get_header(); ?>

<section id="main-content" class="site-content">
    <div class="container">
        <div class="row">
            <main class="posts-contents col-md-9" role="complementary">
            
                <?php articled_loop($e_blog_layout); ?>
                <?php articled_pagination(); ?>
                <div class="clearfix"></div>

            </main>
            <?php articled_sidebar(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>