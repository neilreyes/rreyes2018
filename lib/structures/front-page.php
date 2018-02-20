<?php

function roboto_front_featured_project_before_while(){
	genesis_markup(array(
		'open'=>'<section id="hero" %s>',
		'context'=>'panel',
	));

		echo sprintf('<div class="%s">','hero-container');
		if( function_exists('the_field') ) { 
			the_field('hero_banner');
		};
		echo '</div>';

	genesis_markup(array(
		'close'=>'</section>',
		'context'=>'panel',
	));

	echo sprintf('<section id="%s" class="%s">','projects','panel');
	echo sprintf('<div class="%s">','projects-container');
}

add_action( 'genesis_before_while', 'roboto_front_featured_project_before_while' );

function roboto_before_entry_content(){
	printf('<div class="%s" style="background-color:%s">','project-container',get_field('project_color'));
	printf('<a href="%s" class="%s">',esc_url(get_permalink()), 'project-link');
	the_post_thumbnail('full',array('class'=>' project-img'));
}

add_action('genesis_before_entry_content','roboto_before_entry_content');

function roboto_after_entry_content(){
	echo '</a>';
	echo '</div>';
}

add_action('genesis_after_entry_content','roboto_after_entry_content');

function roboto_front_featured_project_after_while(){
	echo '</section>';
	echo '</div>';
}

add_action( 'genesis_after_endwhile', 'roboto_front_featured_project_after_while');