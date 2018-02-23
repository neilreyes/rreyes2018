<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Framework
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

/**
 * Used to initialize the framework in the various template files.
 *
 * It pulls in all the necessary components like header and footer, the basic
 * markup structure, and hooks.
 *
 * @since 1.3.0
 */
function roboto() {

	get_header();

	do_action( 'genesis_before_content_sidebar_wrap' );

	/*genesis_markup( array(
		'open'   => '<div %s>',
		'context' => 'content-sidebar-wrap',
	) );*/
		do_action( 'genesis_before_content' );
		genesis_markup( array(
			'open'   => '<div %s>',
			'context' => 'content',
		) );
			do_action( 'genesis_before_loop' );
			do_action( 'genesis_loop' );
			do_action( 'genesis_after_loop' );
		genesis_markup( array(
			'close' => '</div>', // End .content.
			'context' => 'content',
		) );
		do_action( 'genesis_after_content' );

	/*genesis_markup( array(
		'close'   => '</div>',
		'context' => 'content-sidebar-wrap',
	) );*/

	do_action( 'genesis_after_content_sidebar_wrap' );

	get_footer();

}
