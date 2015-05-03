<?php
    /**
     * The template for displaying all pages.
     *
     * This is the template that displays all pages by default.
     * Please note that this is the WordPress construct of pages
     * and that other 'pages' on your WordPress site will use a
     * different template.
     *
     * @package Lemon
     */
    get_header();
?>
    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="page-title"><?php echo get_the_title(); ?></h1>                  
                </div>
                <div class="col-md-6">
                    <?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail( array( 'labels' => array( 'browse' => __( 'You are here:', 'lemon' ) ) ) ); ?>
                </div>
            </div>
        </div>
    </header><!-- .page-header -->
<div id="content" class="site-content">    
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
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
</div><!-- #content -->
<?php get_footer(); ?>
