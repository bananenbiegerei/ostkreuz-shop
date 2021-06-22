<?php
// Register Navigation Menus
function custom_navigation_menus() {

    $locations = array(
        'top' => __( 'Top', 'text_domain' ),
        'footer' => __( 'Footer', 'text_domain' ),
    );
    register_nav_menus( $locations );

}
add_action( 'init', 'custom_navigation_menus' );

/*
 * Foundation Nav Walker to support "nested"
 * needs wp_nav_menu() to use args('menu_class' => 'vertical menu')
 */
class F6_Main_Menu_Walker extends Walker_Nav_menu {
  function start_lvl(&$output, $depth = 0, $args = NULL) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"nested vertical menu depth_$depth\">\n";
  }
}
