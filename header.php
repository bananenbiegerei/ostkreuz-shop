<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php get_template_part('head'); ?>

<body <?php body_class(); ?>>
    <header id="site-header" class="site-header" role="banner">
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell medium-auto">
                    <img class="logo show-for-medium" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/assets/img/Bananenbiegerei-Logo.png" alt="Logo">
                </div>
                <div class="cell medium-shrink">
                    <nav>
                        <ul class="menu align-right">
                            <li>
                                <a href="">About</a>
                                <a href="">Projects</a>
                                <a href="">Contact</a>
                            </li>
                        </ul>
                        <?php
/* wp_nav_menu(array(
                            'container' => '',
                            'menu' => 'main',
                            'menu_class' => 'vertical menu align-right',
                            'theme_location' => 'main',
                            'walker' => new F6_Main_Menu_Walker(),
                        )); */
?>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main id="main-content" class="main-content">