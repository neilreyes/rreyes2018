<?php

function roboto_remove_parent_header(){
	remove_action('genesis_header','genesis_do_header',10);
	remove_action('genesis_after_header','genesis_do_nav',10);
}

add_action('init','roboto_remove_parent_header');

function roboto_do_header(){ 
	genesis_markup(array(
		'open'=>'<div %s>',
		'context'=>'site-header-container',
	));

		genesis_markup(array(
			'open'=>'<div %s>',
			'context'=>'site-branding',
			'content'=> '<a href="'.esc_url( home_url( '/' )).'" rel="home" id="logo" class="logo--header">Portfolio</a>',
			'echo'=>true,
			'close'=>'</div>'
		));

		genesis_markup(array(
			'open'=>'<button id="mobile-btn">',
			'context'=>'mobile-btn',
			'content'=>'Toggle',
			'close'=>'</button>',
		));

		genesis_nav_menu( array(
			'theme_location' => 'primary',
			'container' => 'nav',
			'container_class' => 'primary-navigation-container',
			'container_id' => 'header-primary-navigation',
			'menu_class' => 'main-navigation main-navigation--header',
			'menu_id' => 'header-site-navigation',
			'echo' => true,
			'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
			'depth' => 0,
			'walker' => ''
		) );
		
	genesis_markup(array(
		'close'=>'</div>',
		'context'=>'site-header-container',
	));
}

add_action('genesis_header','roboto_do_header');