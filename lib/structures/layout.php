<?php

function roboto_remove_parent_after_content(){
	remove_action( 'genesis_after_content', 'genesis_get_sidebar', 10 );
}

add_action('init','roboto_remove_parent_after_content');

?>