<?php
    /**
     * Lemon Scripts and Styles
     *
     * @package Lemon
     */
    function lemon_scripts() {
        // Add custom fonts, used in the main stylesheet.
        wp_enqueue_style( 'lemon-fonts', lemon_fonts_url(), array(), NULL );
        // Load Bootstrap main stylesheet.
        wp_enqueue_style( 'lemon-bootstrapcss', get_template_directory_uri() . '/components/bootstrap/css/bootstrap.min.css', array(), '3.3.1' );
        // Load Font Awesome main stylesheet.
        wp_enqueue_style( 'lemon-fontawesome', get_template_directory_uri() . '/components/fontawesome/css/font-awesome.min.css', array(), '4.2.0' );
        // Load Genericons main stylesheet.
        wp_enqueue_style( 'lemon-genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3.0' );
        // Load our main stylesheet.
        wp_enqueue_style( 'lemon-style', get_stylesheet_uri() );
        // Load Bootstrap main script.
        wp_enqueue_script( 'lemon-bootstrapjs', get_template_directory_uri() . '/components/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.1', true );
        // Load Lemon main script.
        wp_enqueue_script( 'lemon-script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
        // Load Lemon navigation script.
        wp_enqueue_script( 'lemon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        // Load Lemon skip link script.
        wp_enqueue_script( 'lemon-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        // Load Lemon comment reply script.
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }    
    }
    add_action( 'wp_enqueue_scripts', 'lemon_scripts' );
?>
