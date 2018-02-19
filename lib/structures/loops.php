<?php
function roboto_remove_parent_loop(){
	remove_action('genesis_loop', 'genesis_do_loop', 10);
}

add_action('init','roboto_remove_parent_loop');

function roboto_do_loop(){

	if ( is_page_template( 'page_blog.php' ) ) {

		$include = genesis_get_option( 'blog_cat' );
		$exclude = genesis_get_option( 'blog_cat_exclude' ) ? explode( ',', str_replace( ' ', '', genesis_get_option( 'blog_cat_exclude' ) ) ) : '';
		$paged   = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		// Easter Egg.
		$query_args = wp_parse_args(
			genesis_get_custom_field( 'query_args' ),
			array(
				'cat'              => $include,
				'category__not_in' => $exclude,
				'showposts'        => genesis_get_option( 'blog_cat_num' ),
				'paged'            => $paged,
			)
		);

		genesis_custom_loop( $query_args );

	} elseif ( is_front_page() ) {

		echo get_template_part( '/lib/template-parts/front-page/sections' );

	} elseif ( is_404() ) {
		
	} else {

		genesis_standard_loop();

	}

}

add_action('genesis_loop', 'roboto_do_loop');

?>