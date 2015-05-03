<?php
/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Lemon 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function lemon_search_form_modify( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div>
    <label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
	<input type="search" class="search-field form-control" placeholder="' . esc_attr_x( 'Search …', 'placeholder' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label' ) . '" />
	<input type="submit" class="search-submit screen-reader-text" value="'. esc_attr_x( 'Search', 'submit button' ) .'" />
	</div>
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'lemon_search_form_modify' );
