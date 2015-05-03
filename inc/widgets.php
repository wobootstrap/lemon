<?php
    /**
     * Register widget area.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_sidebar
     */
    function lemon_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'Main Sidebar', 'lemon' ),
            'id'            => 'sidebar-1',
            'description'   => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        ) );
        register_sidebar( array(
		'name' => __( 'Page Sidebar', 'lemon' ),
		'id' => 'sidebar-2',
		'description' => __( 'The sidebar for the optional Page Template', 'lemon' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
        register_sidebar( array(
        'name' => __( 'Footer Area One', 'lemon' ),
        'id' => 'sidebar-3',
        'description' => __( 'An optional widget area for your site footer', 'lemon' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
        register_sidebar( array(
        'name' => __( 'Footer Area Two', 'lemon' ),
        'id' => 'sidebar-4',
        'description' => __( 'An optional widget area for your site footer', 'lemon' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
        register_sidebar( array(
        'name' => __( 'Footer Area Three', 'lemon' ),
        'id' => 'sidebar-5',
        'description' => __( 'An optional widget area for your site footer', 'lemon' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Area Four', 'lemon' ),
        'id' => 'sidebar-6',
        'description' => __( 'An optional widget area for your site footer', 'lemon' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }
    add_action( 'widgets_init', 'lemon_widgets_init' );
?>
