<?php
    /**
     * The template for displaying the footer.
     *
     * Contains the closing of the #content div and all content after
     *
     * @package Lemon
     */
?>
<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
        /*
         * A sidebar in the footer? Yep. You can can customize
         * your footer with three columns of widgets.
         */
        // if ( ! is_404() )
            get_sidebar( 'footer' );
    ?>
    <div class="site-info-wrap">
        <div class="container">
            <div class="site-info">
                <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'lemon' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'lemon' ), 'WordPress' ); ?></a>
                <span class="sep"> | </span>
                <?php printf( __( 'Theme: %1$s by %2$s.', 'lemon' ), 'Lemon', '<a href="http://wobootstrap.com/" rel="designer">Wobootstrap.com</a>' ); ?>
            </div><!-- .site-info -->
        </div>
    </div>
</footer><!-- #colophon -->
        </div><!-- #page -->
<?php wp_footer(); ?>
    </body>
</html>
