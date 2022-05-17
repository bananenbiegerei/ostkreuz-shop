<?php
function site_scripts() {
    //JS
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/dist/js/app.js', array( 'jquery' ), '', false );

    // CSS
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/dist/css/app.css', array(), '', 'all' );
    wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css', array(), '', 'all' );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

add_action( 'wp_print_styles', 'deregister_my_styles', 100 );
 
function deregister_my_styles() {
    wp_deregister_style( 'wpc-filter-everything' );
}

