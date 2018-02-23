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
	
	genesis_markup(array(
		'open'=>'<a %s>',
		'context'=>'project-link',
	));

	the_post_thumbnail('full',array('class'=>' project-img'));
}

function roboto_add_project_link_url_attr( $attributes ){
	$attributes['href'] = get_permalink();
	return $attributes;
}

add_filter('genesis_attr_project-link','roboto_add_project_link_url_attr');

add_action('genesis_before_entry_content','roboto_before_entry_content');

function roboto_featured_project_do_content(){

	genesis_markup(array(
		'open'=>'<div %s>',
		'context'=>'project-meta'
	));

		if( function_exists('have_rows') && have_rows('project_tags') ){

			genesis_markup(array(
				'open'=>'<ul %s>',
				'context'=>'project-tags'
			));

				while( have_rows('project_tags') ) {
					the_row();
					
					genesis_markup(array(
						'open'=>'<li %s>',
						'context'=>'tags-entry',
					));
					the_sub_field('tag');

					genesis_markup(array(
						'close'=>'</li>',
						'context'=>'tags-entry',
					));
				}

			genesis_markup(array(
				'close'=>'</ul>',
				'context'=>'project-tags'
			));
		}

	genesis_markup(array(
		'close'=>'</div>',
		'context'=>'project-meta'
	));

	echo esc_html(the_title('<h2 class="project-title">','</h2>'));
	if( function_exists('get_field') && get_field('project_caption') ){
		printf( '<p class="project-caption">%s</p>',esc_html( get_field('project_caption') ) );
	}
}

add_action('roboto_featured_project_entry_content','roboto_featured_project_do_content');

function roboto_after_entry_content(){
	genesis_markup(array(
		'close'=>'</a>',
		'context'=>'project-link',
	));

	echo '</div>';
}

add_action('genesis_after_entry_content','roboto_after_entry_content');

function roboto_front_featured_project_after_while(){
	echo '</section>';
	echo '</div>';
}

add_action( 'genesis_after_endwhile', 'roboto_front_featured_project_after_while');