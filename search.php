<?php
    /**
     * The template for displaying search results pages.
     *
     * @package Lemon
     */
    get_header();
?>
<div id="content" class="site-content">
    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'lemon' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </div> 
    </header><!-- .page-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 pull-right">
                <section id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>
                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php
                            /**
                             * Run the loop for the search to output the results.
                             * If you want to overload this in a child theme then include a file
                             * called content-search.php and that will be used instead.
                             */
                            get_template_part( 'content', 'search' );
                        ?>
                        <?php endwhile; ?>
                        <?php the_posts_navigation(); ?>
                        <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                        <?php endif; ?>
                    </main><!-- #main -->
                </section><!-- #primary -->
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div><!-- #content -->
<?php get_footer(); ?>
