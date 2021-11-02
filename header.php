<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php get_template_part('head'); ?>

<body <?php body_class(); ?> <?php if (!is_tax('photographer')) : ?> data-turbo="false"<?php endif; ?>>
    <header id="site-header" class="site-header desktop-header show-for-large" role="banner">
        <div class="grid-container fluid" id="top">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell shrink">
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
                <div class="cell auto cart-container">
                    <ul class="menu">
                        <li>
                            <a href="<?php echo wc_get_cart_url() ?>" class="custom-cart">Warenkorb <span><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="cell shrink">
                    <a href="<?php echo home_url(); ?>">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ostkreuz-logo-small.svg" alt="Logo">
                    </a>
                </div>

            </div>
        </div>
    </header>
    <header id="site-header" class="site-header mobile-header hide-for-large" role="banner">
        <div class="grid-container fluid" id="top">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell auto">
                    <button class="icon-font clear margin-bottom-0 hamburger-icon" data-toggle="mobile-menu">
                        
                    </button>
                </div>
                <div class="cell shrink">
                    <a href="<?php echo home_url(); ?>">
                    <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/ostkreuz-logo-small.svg" alt="Logo">
                    </a>
                </div>
            </div>
        </div>
        <div class="grid-container mobile-menu" id="mobile-menu" data-toggler data-animate="fade-in fade-out">
            <div class="cell small-12">
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'container' => '',
                        'menu' => 'top',
                        'menu_class' => 'menu vertical align-center',
                        'theme_location' => 'top',
                        'walker' => new F6_Main_Menu_Walker(),
                    ));
                    ?>
                </nav>
            </div>
            <div class="cell small-12 cart-container">
                <ul class="menu vertical align-center">
                    <li>
                        <a href="<?php echo wc_get_cart_url() ?>" class="custom-cart">Warenkorb <span><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main id="main-content" class="main-content">