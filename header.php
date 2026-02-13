<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<?php get_template_part('head'); ?>

<body <?php body_class(); ?> <?php if (!is_tax('photographer')) : ?> data-turbo="false" <?php endif; ?>
    data-controller="darkmode"
    data-darkmode-isdark-value="<?php echo isset($_COOKIE['isdark']) ? $_COOKIE['isdark'] : 'false' ; ?>">
    <header id="site-header" class="site-header desktop-header show-for-large" role="banner">
        <div class="grid-container fluid" id="top">
            <div class="grid-x grid-margin-x align-middle">
                <div class="cell shrink">
                    <nav>
                        <?php wp_nav_menu([
                          "theme_location" => "top",
                          "container" => false,
                          "depth" => 0,
                          "items_wrap" =>
                            '<ul class="menu menu-offset-left dropdown" data-dropdown-menu data-click-open=true>%3$s</ul>',
                          "walker" => new insertcart_walker([
                            "in_top_bar" => true,
                            "item_type" => "li",
                            "menu_type" => "main-menu",
                          ]),
                        ]); ?>
                    </nav>
                </div>
                <div class="cell auto"></div>
                <div class="cell shrink cart-container">
                    <ul class="menu">
                        <li>
                            <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                                <?php echo is_user_logged_in() ? 'Mein Konto' : 'Anmelden'; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo wc_get_cart_url() ?>" class="custom-cart">Warenkorb</a>
                        </li>
                    </ul>
                </div>
                <div class="cell shrink">
                    <a href="<?php echo home_url(); ?>">
                        <div class="logo">
                            <?php echo file_get_contents(get_template_directory(). "/src/img/ostkreuz-logo-small.svg.php"); ?>
                        </div>
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
                        <div class="logo">
                            <?php echo file_get_contents(get_template_directory(). "/src/img/ostkreuz-logo-small.svg.php"); ?>
                        </div>
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
                        <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
                            <?php echo is_user_logged_in() ? 'Mein Konto' : 'Anmelden'; ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo wc_get_cart_url() ?>" class="custom-cart">Warenkorb
                            <span><?php echo $woocommerce->cart->cart_contents_count ?></span></a>
                    </li>
                </ul>
            </div>
            <div class="cell small-12 cart-container">
                <!-- <ul class="menu align-center">
                    <li>
                        <button class="button clear" data-action="darkmode#toggle">
                            <svg id="darkmode-moon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>

                            <svg id="darkmode-sun" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>
                    </li>
                </ul> -->
            </div>
        </div>
    </header>

    <div x-data="{ open: false }" class="help" :class="{ 'active': open }">
        <div class="help-label" @click="open = !open">
            Hilfe
        </div>
        <div>
            <h5>Benötigen Sie Hilfe bei der Bestellung oder haben Sie Schwierigkeiten?</h5>
            <p>Zögern Sie nicht uns zu kontaktieren:<br>
                <a href="mailto:shop@ostkreuz.de">
                    E-Mail
                </a><br>
                <a href="tel:+493047373930">
                    Tel.: 030 - 473 73 930
                </a>
            </p>
        </div>
    </div>
    <main id="main-content" class="main-content">