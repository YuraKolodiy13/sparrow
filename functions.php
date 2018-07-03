
<?php

add_action ('wp_enqueue_scripts', 'theme_styles');
add_action ('wp_enqueue_scripts', 'theme_scripts');
add_action ('after_setup_theme', 'myMenu');
add_action ('widgets_init', 'myWidgets');

function myWidgets(){
    register_sidebar( array(
        'name'          => 'Right Sidebar',
        'id'            => 'right_sidebar',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => "</h5>\n",
    ) );
}

function myMenu(){
    register_nav_menu('headerNav', 'menu in top');
    register_nav_menu('footerNav', 'menu in bottom');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails', array('post'));
    add_image_size('post_thumb', 1300, 500, true);
}

function theme_styles(){
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('media', get_template_directory_uri() . '/assets/css/media-queries.css');
}

function theme_scripts(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js', ['jquery'], null, true);
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js', ['jquery'], null, true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', null, null, false);
}
