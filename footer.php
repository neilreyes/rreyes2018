<?php

genesis_structural_wrap( 'site-inner', 'close' );

do_action( 'genesis_before_footer' );
do_action( 'genesis_footer' );
do_action( 'genesis_after_footer' );

genesis_markup( array(
	'close'   => '</div>',
	'context' => 'site-inner',
) );

genesis_markup( array(
	'close'   => '</div>',
	'context' => 'site-container',
) );

do_action( 'genesis_after' );
wp_footer(); // We need this for plugins.

genesis_markup( array(
	'close'   => '</body>',
	'context' => 'body',
) );

?>
</html>