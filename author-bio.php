<?php
    /**
     * The template for displaying Author bios
     *
     * @package Lemon
     * @since Lemon 1.0
     */
?>
<div class="author-info">
    <h2 class="author-heading"><?php _e( 'Published by', 'lemon' ); ?></h2>

    <div class="media">
        <div class="media-left author-avatar">
            <a href="#">
                <?php
            /**
             * Filter the author bio avatar size.
             *
             * @since Lemon 1.0
             *
             * @param int $size The avatar height and width size in pixels.
             */
            $author_bio_avatar_size = apply_filters( 'lemon_author_bio_avatar_size', 56 );
            echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
        ?>
            </a>
        </div><!-- .author-avatar -->
        <div class="media-body author-description">
            <h4 class="media-heading author-title"><?php echo get_the_author(); ?></h4>
            <p class="author-bio">
            <?php the_author_meta( 'description' ); ?>
            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s', 'lemon' ), get_the_author() ); ?>
            </a>
            </p><!-- .author-bio -->
        </div><!-- .author-description -->
    </div>
</div><!-- .author-info -->
