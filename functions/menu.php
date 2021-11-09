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

// %%%%%%%%%% Custom Walker for foundation 6 menu %%%%%%%%%%
class insertcart_walker extends Walker_Nav_Menu
{
    /*
     * Add vertical menu class and submenu data attribute to sub menus
     */

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"vertical menu\" data-submenu>\n";
    }
}
//Optional fallback
function f6_topbar_menu_fallback($args)
{
    /*
     * Instantiate new Page Walker class instead of applying a filter to the
     * "wp_page_menu" function in the event there are multiple active menus in theme.
     */

    $walker_page = new Walker_Page();
    $fallback = $walker_page->walk(get_pages(), 0);
    $fallback = str_replace("<ul class='children'>", '<ul class="children submenu menu vertical" data-submenu>', $fallback);

    echo '<ul class="dropdown menu data-dropdown-menu">'.$fallback.'</ul>';
}