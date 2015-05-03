<?php
    /**
     * The template for displaying all single posts.
     *
     * @package Lemon
     */
    get_header();
?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 pull-right">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                        <?php the_post_pager(); ?>
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>
                        <?php endwhile; // end of the loop. ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div><!-- #content -->
<?php get_footer(); ?>
