<?php
function load_css_and_js() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'load_css_and_js' );

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_post_type_support( 'page', 'excerpt' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
?>
