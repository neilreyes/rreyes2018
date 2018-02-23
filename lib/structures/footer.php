<?php

function roboto_remove_parent_footer(){
    remove_action('genesis_footer','genesis_do_footer',10);
}

add_action('init','roboto_remove_parent_footer');

function roboto_do_footer(){
    $the_year = date('Y');
    
    $copyright = '';

    genesis_markup(array(
        'open'=>'<div %s>',
        'context'=>'site-footer-container',
    ));

        genesis_markup(array(
            'open'=>'<div %s>',
            'context'=>'site-info',
        ));

            echo sprintf('<p class="copyright">©%s <a href="%s" rel="home">Roboto</a></p>',$the_year, esc_url(home_url('/')) );

		genesis_markup(array(
            'close'=>'</div>',
            'context'=>'site-info',
        ));

        genesis_markup(array(
            'open'=>'<div %s>',
            'context'=>'site-branding--footer',
        ));

            echo sprintf('<a href="%s" rel="home" id="logo" class="logo--footer">Roboto</a></p>',esc_url(home_url('/')) );

        genesis_markup(array(   
            'close'=>'</div>',
            'context'=>'site-branding--footer',
        ));

        genesis_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'primary-navigation-container',
            'container_id' => 'footer-primary-navigation',
            'menu_class' => 'main-navigation main-navigation--footer',
            'menu_id' => 'footer-site-navigation',
            'echo' => true,
            'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
            'depth' => 0,
            'walker' => ''
        ));

    genesis_markup(array(
        'close'=>'</div>',
        'context'=>'site-footer-container',
    ));
}

add_action('genesis_footer','roboto_do_footer');

?>