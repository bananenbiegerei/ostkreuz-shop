<?php
// Title Tag
add_theme_support( 'title-tag' );

// Post Thumbnails also for pages and custom posts
add_theme_support('post-thumbnails');

// %%%%%%%%%% Custom Excerpt Length %%%%%%%%%
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' … <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( '' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// Disable admin bar in site view
show_admin_bar(false);

// ACF Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

// Responsivness e.g. youtube block
add_theme_support( 'responsive-embeds' );
