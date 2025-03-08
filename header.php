<!-- ¡Hola! Esto es solo una prueba visual para la versión 2.0 -->

<!DOCTYPE html>
<html lang="es" style="width:100vw; overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php _e('Soy Michelero 2025', 'soymichelero'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <main>

        <!-- TOP MENU -->
        <div class="container-fluid top-menu">
            <ul class="nav top-nav d-flex align-items-center">
                <?php
                $current_user = wp_get_current_user();
                ?>
                <li class="nav-item tp-link"><i class="fa-solid fa-user"></i></li>
                <li class="nav-item tp-link">
                    <?php if (is_user_logged_in()): ?>
                        <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">
                            <?php echo esc_html($current_user->display_name); ?>
                        </a>
                    <?php else: ?>
                        <a
                            href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>"><?php _e('Login', 'soymichelero'); ?></a>
                    <?php endif; ?>
                </li>
                <li class="nav-item tp-link"><i class="fa-duotone fa-solid fa-language"></i></li>
                <li class="nav-item tp-link dropdown">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo strtoupper(get_locale() == 'en_US' ? 'ENG' : 'ESP'); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?lang=es_MX">ESP</a></li>
                        <li><a class="dropdown-item" href="?lang=en_US">ENG</a></li>
                    </ul>
                </li>
                <li class="nav-item tp-link"><i class="fa-solid fa-shopping-cart"></i></li>
                <li class="nav-item tp-link">
                    <a href="<?php echo wc_get_cart_url(); ?>"><?php echo WC()->cart->get_cart_contents_count(); ?></a>
                </li>
                <?php if (is_user_logged_in()): ?>
                    <li class="nav-item tp-link">
                        <a href="<?php echo wp_logout_url(home_url()); ?>">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- TOP MENU -->

        <!-- NAV MENU -->
        <div class="container-fluid menu-principal sticky-top">
            <div class="row justify-content-center">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light menu-principal">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="<?php _e('Toggle navigation', 'soymichelero'); ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>"><?php _e('INICIO', 'soymichelero'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>#about"><?php _e('ACERCA', 'soymichelero'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>#products"><?php _e('PRODUCTOS', 'soymichelero'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/media/logo/color-light.png"
                                        alt="">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>#dealers"><?php _e('DISTRIBUIDORES', 'soymichelero'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>/tienda"><?php _e('TIENDA', 'soymichelero'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="<?php echo home_url(); ?>/f-a-q"><?php _e('F.A.Q', 'soymichelero'); ?></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- NAV MENU -->