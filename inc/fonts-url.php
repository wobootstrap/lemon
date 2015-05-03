<?php
    /**
     * Lemon fonts url.
     *
     * @package Lemon
     */
    if ( ! function_exists( 'lemon_fonts_url' ) ) :
    function lemon_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
        /* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'lemon' ) ) {
            $fonts[] = 'Noto+Sans:400,700,400italic,700italic';
        }
        /* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'lemon' ) ) {
            $fonts[] = 'Noto+Serif:400,700,400italic,700italic';
        }
        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'lemon' ) ) {
            $fonts[] = 'Montserrat:700,400';
        }
        /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
        $subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'lemon' );
        if ( 'cyrillic' == $subset ) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ( 'greek' == $subset ) {
            $subsets .= ',greek,greek-ext';
        } elseif ( 'devanagari' == $subset ) {
            $subsets .= ',devanagari';
        } elseif ( 'vietnamese' == $subset ) {
            $subsets .= ',vietnamese';
        }
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
    endif;
?>