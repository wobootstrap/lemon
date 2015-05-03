<?php
        /**
         * Custom template tags for this theme.
         *
         * Eventually, some of the functionality here could be replaced by core features.
         *
         * @package Lemon
         */
    if ( ! function_exists( 'the_posts_navigation' ) ) :
    /**
     * Display navigation to next/previous set of posts when applicable.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function the_posts_navigation() {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }
?>
<nav class="navigation posts-navigation" role="navigation">
    <h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'lemon' ); ?></h2>
    <div class="nav-links">
        <?php if ( get_next_posts_link() ) : ?>
        <div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'lemon' ) ); ?></div>
        <?php endif; ?>
        <?php if ( get_previous_posts_link() ) : ?>
        <div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'lemon' ) ); ?></div>
        <?php endif; ?>
    </div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
        }
        endif;
    
    if ( ! function_exists( 'the_post_navigation' ) ) :
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function the_post_navigation() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );
        if ( ! $next && ! $previous ) {
            return;
        }
?>
<nav class="navigation post-navigation" role="navigation">
    <h2 class="screen-reader-text"><?php _e( 'Post navigation', 'underscores' ); ?></h2>
    <div class="nav-links">
        <?php
            previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
            next_post_link( '<div class="nav-next">%link</div>', '%title' );
        ?>
    </div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
    }
    endif;
    
    if ( ! function_exists( 'the_post_pager' ) ) :
    /**
     * Display navigation to next/previous post when applicable.
     *
     * @todo Remove this function when WordPress 4.3 is released.
     */
    function the_post_pager() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );
        if ( ! $next && ! $previous ) {
            return;
        }
?>
<nav class="navigation post-navigation" role="navigation">
    <h2 class="screen-reader-text"><?php _e( 'Post navigation', 'underscores' ); ?></h2>
    <ul class="nav-links pager">
        <?php
            previous_post_link( '<li class="previous">%link</li>', '%title' );
            next_post_link( '<li class="next">%link</li>', '%title' );
        ?>
    </ul><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
    }
    endif;
    
            if ( ! function_exists( 'the_archive_title' ) ) :
            /**
             * Shim for `the_archive_title()`.
             *
             * Display the archive title based on the queried object.
             *
             * @todo Remove this function when WordPress 4.3 is released.
             *
             * @param string $before Optional. Content to prepend to the title. Default empty.
             * @param string $after  Optional. Content to append to the title. Default empty.
             */
            function the_archive_title( $before = '', $after = '' ) {
                if ( is_category() ) {
                    $title = sprintf( __( 'Category: %s', 'lemon' ), single_cat_title( '', false ) );
                } elseif ( is_tag() ) {
                    $title = sprintf( __( 'Tag: %s', 'lemon' ), single_tag_title( '', false ) );
                } elseif ( is_author() ) {
                    $title = sprintf( __( 'Author: %s', 'lemon' ), '<span class="vcard">' . get_the_author() . '</span>' );
                } elseif ( is_year() ) {
                    $title = sprintf( __( 'Year: %s', 'lemon' ), get_the_date( _x( 'Y', 'yearly archives date format', 'lemon' ) ) );
                } elseif ( is_month() ) {
                    $title = sprintf( __( 'Month: %s', 'lemon' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'lemon' ) ) );
                } elseif ( is_day() ) {
                    $title = sprintf( __( 'Day: %s', 'lemon' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'lemon' ) ) );
                } elseif ( is_tax( 'post_format' ) ) {
                    if ( is_tax( 'post_format', 'post-format-aside' ) ) {
                        $title = _x( 'Asides', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
                        $title = _x( 'Galleries', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
                        $title = _x( 'Images', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
                        $title = _x( 'Videos', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
                        $title = _x( 'Quotes', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
                        $title = _x( 'Links', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
                        $title = _x( 'Statuses', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
                        $title = _x( 'Audio', 'post format archive title', 'lemon' );
                    } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
                        $title = _x( 'Chats', 'post format archive title', 'lemon' );
                    }
                } elseif ( is_post_type_archive() ) {
                    $title = sprintf( __( 'Archives: %s', 'lemon' ), post_type_archive_title( '', false ) );
                } elseif ( is_tax() ) {
                    $tax = get_taxonomy( get_queried_object()->taxonomy );
                    /* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
                    $title = sprintf( __( '%1$s: %2$s', 'lemon' ), $tax->labels->singular_name, single_term_title( '', false ) );
                } else {
                    $title = __( 'Archives', 'lemon' );
                }
                /**
                 * Filter the archive title.
                 *
                 * @param string $title Archive title to be displayed.
                 */
                $title = apply_filters( 'get_the_archive_title', $title );
                if ( ! empty( $title ) ) {
                    echo $before . $title . $after;
                }
            }
            endif;
    
            if ( ! function_exists( 'the_archive_description' ) ) :
            /**
             * Shim for `the_archive_description()`.
             *
             * Display category, tag, or term description.
             *
             * @todo Remove this function when WordPress 4.3 is released.
             *
             * @param string $before Optional. Content to prepend to the description. Default empty.
             * @param string $after  Optional. Content to append to the description. Default empty.
             */
            function the_archive_description( $before = '', $after = '' ) {
                $description = apply_filters( 'get_the_archive_description', term_description() );
                if ( ! empty( $description ) ) {
                    /**
                     * Filter the archive description.
                     *
                     * @see term_description()
                     *
                     * @param string $description Archive description to be displayed.
                     */
                    echo $before . $description . $after;
                }
            }
            endif;
    
    
            if ( ! function_exists( 'lemon_entry_meta' ) ) :
            /**
             * Prints HTML with meta information for the categories, tags.
             *
             * @since Lemon 1.0
             */
            function lemon_entry_meta() {
                $format = get_post_format();
                if ( current_theme_supports( 'post-formats', $format ) ) {
                    printf( '<span class="entry-format"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s</a></span>',
                        _x( 'Format', 'Used before post format.', 'lemon' ),
                        esc_url( get_post_format_link( $format ) ),
                        get_post_format_string( $format )
                    );
                }
                if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
                    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
                    }
                    $time_string = sprintf( $time_string,
                        esc_attr( get_the_date( 'c' ) ),
                        esc_html( get_the_date() ),
                        esc_attr( get_the_modified_date( 'c' ) ),
                        esc_html( get_the_modified_date() )
                    );
                    printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
                        _x( 'Posted on', 'Used before publish date.', 'lemon' ),
                        esc_url( get_permalink() ),
                        $time_string
                    );
                }
                // Hide category and tag text for pages.
                if ( 'post' == get_post_type() ) {
                    if ( is_singular() || is_multi_author() ) {
                        printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
                            _x( 'Author', 'Used before post author name.', 'lemon' ),
                            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                            get_the_author()
                        );
                    }
                    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'lemon' ) );
                    if ( $categories_list && lemon_categorized_blog() ) {
                        printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                            _x( 'Posted in', 'Used before category names.', 'lemon' ),
                            $categories_list
                        );
                    }
                    $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'lemon' ) );
                    if ( $tags_list ) {
                        printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
                            _x( 'Tagged', 'Used before tag names.', 'lemon' ),
                            $tags_list
                        );
                    }
                }
                if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                    echo '<span class="comments-link">';
                    comments_popup_link( __( 'Leave a comment', 'lemon' ), __( '1 Comment', 'lemon' ), __( '% Comments', 'lemon' ) );
                    echo '</span>';
                }
            }
            endif;
    
    
            /**
             * Returns true if a blog has more than 1 category.
             *
             * @return bool
             */
            function lemon_categorized_blog() {
                if ( false === ( $all_the_cool_cats = get_transient( 'lemon_categories' ) ) ) {
                    // Create an array of all the categories that are attached to posts.
                    $all_the_cool_cats = get_categories( array(
                        'fields'     => 'ids',
                        'hide_empty' => 1,
                        // We only need to know if there is more than one category.
                        'number'     => 2,
                    ) );
                    // Count the number of categories that are attached to the posts.
                    $all_the_cool_cats = count( $all_the_cool_cats );
                    set_transient( 'lemon_categories', $all_the_cool_cats );
                }
                if ( $all_the_cool_cats > 1 ) {
                    // This blog has more than 1 category so lemon_categorized_blog should return true.
                    return true;
                } else {
                    // This blog has only 1 category so lemon_categorized_blog should return false.
                    return false;
                }
            }
    
            /**
             * Flush out the transients used in lemon_categorized_blog.
             */
            function lemon_category_transient_flusher() {
                if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                    return;
                }
                // Like, beat it. Dig?
                delete_transient( 'lemon_categories' );
            }
            add_action( 'edit_category', 'lemon_category_transient_flusher' );
            add_action( 'save_post',     'lemon_category_transient_flusher' );
    
    
            if ( ! function_exists( 'lemon_post_thumbnail' ) ) :
            /**
             * Display an optional post thumbnail.
             *
             * Wraps the post thumbnail in an anchor element on index views, or a div
             * element when on single views.
             *
             * @since Lemon 1.0
             */
            function lemon_post_thumbnail() {
                if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
                    return;
                }
                if ( is_singular() ) :
?>
<div class="post-thumbnail">
    <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-responsive' ) ); ?>
</div><!-- .post-thumbnail -->
<?php else : ?>
<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
    <?php
        the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title(), 'class' => 'img-responsive' ) );
    ?>
</a>
<?php
     endif; // End is_singular()
    }
    endif;
    
    
     /**
     * Modify the default html of comment template.
     *
     * @since Lemon 1.0
     */
    
    if ( ! function_exists( 'mytheme_comment' ) ) :
    function mytheme_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);
    
        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'actions';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
<?php if ( 'div' != $args['style'] ) : ?>
<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard avatar">
        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="content">
        <?php comment_author_link(); ?>
        <a class="author"><?php comment_author_link(); ?></a>
        <div class="metadata">
            <div class="date"><?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></div>
        </div>
        <div class="text">
            <?php if ( $comment->comment_approved == '0' ) : ?>
            <p><small><em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em></small></p>
            <?php endif; ?>
            <?php comment_text(); ?>
        </div>
        <div id="actions-<?php comment_ID() ?>" class="actions">
            <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            <?php edit_comment_link(); ?>
        </div>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
</div>
<?php endif; ?>
<?php
            }
            endif;
    
    
         /**
         * Modify the default html of comment template.
         *
         * @since Lemon 1.0
         */
            class zipGun_walker_comment extends Walker_Comment {
                public function start_lvl( &$output, $depth = 0, $args = array() ) {
                    $GLOBALS['comment_depth'] = $depth + 1;
                    switch ( $args['style'] ) {
                        case 'div':
                            $output .= '<div class="comments">' . "\n";
                            break;
                        case 'ol':
                            $output .= '<ol class="children">' . "\n";
                            break;
                        case 'ul':
                        default:
                            $output .= '<ul class="children">' . "\n";
                            break;
                    }
                }
                public function end_lvl( &$output, $depth = 0, $args = array() ) {
                    $GLOBALS['comment_depth'] = $depth + 1;
                    switch ( $args['style'] ) {
                        case 'div':
                            $output .= '</div>' . "\n";
                            break;
                        case 'ol':
                            $output .= "</ol><!-- .children -->\n";
                            break;
                        case 'ul':
                        default:
                            $output .= "</ul><!-- .children -->\n";
                            break;
                    }
                }
            }
    
         /**
         * Modify the default html of comment form.
         *
         * @since Lemon 1.0
         */
        function lemon_comment_form() {
                $commenter = wp_get_current_commenter();
                $req = get_option( 'require_name_email' );
                $aria_req = ( $req ? " aria-required='true'" : '' );
    
                $fields =  array(        
                  'author' =>
                    '<div class="form-group">' .
                    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span></label>' : '</label>' ) .
                    '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' /></p>' .
                    '</div>',
    
                  'email' =>
                    '<div class="form-group">' .
                    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) .
                    ( $req ? '<span class="required">*</span></label>' : '</label>' ) .
                    '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' /></p>' .
                    '</div>',
    
                  'url' =>
                    '<div class="form-group">' .
                    '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
                    '<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                    '" size="30" /></p>' .
                    '</div>'
                );        
                $comments_args = array(     
                  'comment_field' =>
                    '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
                    '</label><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true">' .
                    '</textarea></p>',
    
                  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
                );
    
                ob_start();
                comment_form($comments_args);
                $comment_form_html = ob_get_clean();
                $comment_form_html = str_replace('id="submit"', 'id="submit" class="btn btn-default"', $comment_form_html);
                echo $comment_form_html;
            }
    
         /**
         * Count the number of footer sidebars to enable dynamic classes for the footer.
         *
         * @since Lemon 1.0
         */
        function lemon_footer_sidebar_class() {
            $count = 0;
            if ( is_active_sidebar( 'sidebar-3' ) )
                $count++;
            if ( is_active_sidebar( 'sidebar-4' ) )
                $count++;
            if ( is_active_sidebar( 'sidebar-5' ) )
                $count++;
            $class = '';
            switch ( $count ) {
                case '1':
                    $class = 'one';
                    break;
                case '2':
                    $class = 'two';
                    break;
                case '3':
                    $class = 'three';
                    break;
            }
            if ( $class )
                echo 'class="' . $class . '"';
        }
    
        function loop_pagination() {
            global $wp_query;
    
            $big = 999999999; // need an unlikely integer
    
            $pages = paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'type' => 'array'
            ));
    
            if( is_array( $pages ) ) {
                $pagination = '<ul class="pagination">';
                foreach ( $pages as $page ) {
                    $pagination .= "<li>$page</li>";
                }
               $pagination .= '</ul>';
            }
    
            echo $pagination;
        }
    
    
    if ( ! function_exists( 'lemon_get_link_url' ) ) :
    /**
     * Return the post URL.
     *
     * Falls back to the post permalink if no URL is found in the post.
     *
     * @since Lemon 1.0
     *
     * @see get_url_in_content()
     *
     * @return string The Link format URL.
     */
    function lemon_get_link_url() {
        $has_url = get_url_in_content( get_the_content() );
        return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
    }
    endif;
