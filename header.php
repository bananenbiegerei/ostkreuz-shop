<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php get_template_part('head'); ?>

<body <?php body_class(); ?>>
    <header id="site-header" class="site-header" role="banner">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell medium-auto">
                    <nav>
                        <?php
                        wp_nav_menu(array(
                            'container' => '',
                            'menu' => 'top',
                            'menu_class' => 'menu menu-offset-left',
                            'theme_location' => 'top',
                            'walker' => new F6_Main_Menu_Walker(),
                        ));
                        ?>
                    </nav>
                </div>
                <div class="cell medium-shrink">
                    <a href="<?php echo home_url(); ?>">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ostkreuz-logo-small.png" alt="Logo">
                    </a>
                </div>

            </div>
        </div>
    </header>
    <main id="main-content" class="main-content">