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

		global $wp_query, $more;

		$args = array(
			'post_type' => 'projects',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		);

		$wp_query = new WP_Query( $args );

		// Only set $more to 0 if we're on an archive.
		$more = is_singular() ? $more : 0;

		roboto_front_featured_project_loop();

		// Restore original query.
		wp_reset_query();

	} elseif ( is_404() ) {
		
	} else {

		genesis_standard_loop();

	}

}

add_action('genesis_loop', 'roboto_do_loop');

function roboto_front_featured_project_loop() {

	// Use old loop hook structure if not supporting HTML5.
	if ( ! genesis_html5() ) {
		genesis_legacy_loop();
		return;
	}

	if ( have_posts() ) :

		do_action( 'genesis_before_while' );
		while ( have_posts() ) : the_post();

			do_action( 'genesis_before_entry' );

			printf( '<article %s>', genesis_attr( 'entry' ) );

				do_action( 'genesis_before_entry_content' );

				printf( '<div %s>', genesis_attr( 'class', array('class'=>'entry-content project-content') ) );

					do_action( 'genesis_entry_header' );

					do_action( 'genesis_entry_content' );

					do_action( 'genesis_entry_footer' );
				
				echo '</div>';

				do_action( 'genesis_after_entry_content' );

			echo '</article>';

			do_action( 'genesis_after_entry' );

		endwhile; // End of one post.
		do_action( 'genesis_after_endwhile' );

	else : // If no posts exist.
		do_action( 'genesis_loop_else' );
	endif; // End loop.

}
