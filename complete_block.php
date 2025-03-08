<!DOCTYPE html>
<html lang="es" style="width:100vw; overflow-x:hidden;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soy Michelero 2024</title>


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
                            <a
                                href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>"><?php echo esc_html($current_user->display_name); ?></a>
                    <?php else: ?>
                            <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>">Login</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item tp-link"><i class="fa-solid fa-location-arrow"></i></li>
                <li class="nav-item tp-link"><a href="#">TX</a></li>
                <li class="nav-item tp-link"><i class="fa-duotone fa-solid fa-language"></i></li>
                <li class="nav-item tp-link"><a href="#">ENG</a></li>
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
                        <!-- <a class="navbar-brand" href="#">
                            <img src="assets/media/logo/sm-flat-dark@4x.png" alt="" width="200px">
                        </a> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <ul class="navbar-nav d-flex align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>#products">products</a>
                                </li>
                                <li class="nav-item">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/media/logo/color-light.png"
                                        alt="">
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>#dealers">Dealers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>/tienda">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo home_url(); ?>/faq">F.A.Q</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- NAV MENU -->

        <?php get_header(); ?>
        
        <!-- VIDEO BACKGROUND -->
        <div class="container-fluid main-bg video-background d-flex justify-content-start">
            <video autoplay muted loop>
                <source src="<?php echo get_template_directory_uri() ?>/assets/media/video/rimmer-sauce.mp4" type="video/mp4">
                Your browser deas not support the video tag. Try using Google Chrome / Brave Browser / Firefox.
            </video>
            <div class="content-overlay d-flex flex-column justify-content-center align-items-center welcome-message">
                <h1 class="typo big-sized">Welcome Michelero!</h1>
                <p class="typo">You are very close to enjoying <br> moments full of joy with Soy Michelero.</p>
                <div class="button-image">
                    <h3 class="typo"><a href="#about">Start!</a></h3>
                </div>
            </div>
        </div>
        <!-- VIDEO BACKGROUND -->
        
        <!-- SECTION ONE (ABOUT) -->
        <div id="about" class="container-fluid section-one">
            <div class="background-overlay"></div>
            <div class="parallax-texture"></div>
        
            <div class="row d-flex justify-content-center align-items-center content-section">
                <!-- Primera columna (izquierda) - Información como quienes somos -->
                <div class="col-12 col-md-4 text-center text-md-start" style="padding-left: 100px;">
                    <h1 class="typo">About us</h1>
                    <p class="typo">Soy Michelero LLC is a company dedicated to crafting QUALITY products. Ensuring an
                        unforgettable experience of enjoying your michelada. We aim to convey the love and pride of our Mexican
                        roots.</p>
        
                    <p class="typo">We are committed to
                        creating moments of joy
                        and connection by providing
                        mixers and rimmers that
                        reflect the authenticity and
                        warmth of our culture,
                        allowing our customers to
                        enjoy and share their
                        heritage with every sip.</p>
                </div>
        
                <!-- Segunda columna (centro) - Imagen de Micheleitor -->
                <div class="col-12 col-md-4 text-center">
                    <div class="about-image">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/common/micheleitor.png"
                            alt="Micheleitor" class="img-fluid" style="max-width: 70%;">
                    </div>
                </div>
        
                <!-- Tercera columna (derecha) - Información adicional -->
                <div class="col-12 col-md-4 text-center text-md-end" style="padding-right: 100px;">
                    <h2 class="typo">Know Micheleitor!</h2>
                    <p class="typo">Micheleitor is a Mexican jaguar, a symbol of strength and pride, representing the
                        authenticity and tradition of Soy Michelero LLC.</p>
                </div>
            </div>
        </div>
        <!-- SECTION ONE (ABOUT) -->
        
        <!-- SEPARATOR -->
        <div class="container-fluid separator bg-dark">
        
            <div class="centered-logo">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/logo/flat-light.png" alt="">
            </div>
        
        </div>
        <!-- SEPARATOR -->
        
        <!-- SECTION TWO (PRODUCTS) -->
        <div id="products" class="container-fluid section-two">
            <div class="background-overlay"></div> <!-- Fondo radial -->
        
            <!-- Título de la sección -->
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="typo">Our Products</h1>
                </div>
            </div>
        
            <!-- Fila de productos -->
            <div class="row justify-content-center mt-4">
        
                <!-- Rimmers (producto 1) -->
                <div class="col-12 col-md-4 text-center product-card">
                    <div class="product-image">
                        <a href="<?php echo esc_url(get_term_link('rimmers', 'product_cat')); ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/product-th/rimmers@0.5x.png"
                                alt="Rimmers" class="img-fluid">
                        </a>
                    </div>
        
                    <div class="card-image-1 d-flex flex-column">
                        <h3 class="typo">Rimmers</h3>
                        <p class="typo" style="width: 80%;">Our rimmer sauce and powder will make your micheladas or drinks
                            shine to the fullest.</p>
                    </div>
        
                </div>
        
                <!-- Drink Mixer (producto 2) -->
                <div class="col-12 col-md-4 text-center product-card">
                    <div class="product-image">
                        <a href="<?php echo esc_url(get_term_link('drink-mixer', 'product_cat')); ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/product-th/drink-mix@0.5x.png"
                                alt="Drink Mixer" class="img-fluid">
                        </a>
                    </div>
        
                    <div class="card-image-2 d-flex flex-column">
                        <h3 class="typo">Drink Mixers</h3>
                        <p class="typo" style="width: 80%;">Ideal for micheladas, margaritas, Italian sodas, and all types of
                            drinks with or without alcohol!</p>
                    </div>
        
                </div>
        
                <!-- Michelada Mix (producto 3) -->
                <div class="col-12 col-md-4 text-center product-card">
                    <div class="product-image">
                        <a href="<?php echo esc_url(get_term_link('michelada-mix', 'product_cat')); ?>">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/product-th/michelada-mix@0.5x.png"
                                alt="Michelada Mix" class="img-fluid">
                        </a>
                    </div>
        
                    <div class="card-image-3 d-flex flex-column">
                        <h3 class="typo">Michelada Mix</h3>
                        <p class="typo" style="width: 80%;">The perfect mix to make micheladas a delight. They are also great
                            for bloody marys.</p>
                    </div>
        
                </div>
        
            </div>
        </div>
        <!-- SECTION TWO (PRODUCTS) -->
        
        <!-- SEPARATOR -->
        <div class="container-fluid separator bg-dark">
            <div class="instructions-container">
                <h1 class="typo" style="text-align: center;">Instructions</h1>
                <ul class="instructions-ul d-flex flex-row">
        
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/1@2x.png" alt="">
                        <p class="typo instruction-thumbs">Rim a mug or glass with soy michelero rimmer sauce</p>
                    </li>
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/2@2x.png" alt="">
                        <p class="typo instruction-thumbs">Deep it through our rimmer powder</p>
                    </li>
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/3@2x.png" alt="">
                        <p class="typo instruction-thumbs">Add ice (highly recommended)</p>
                    </li>
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/4@2x.png" alt="">
                        <p class="typo instruction-thumbs">Fill 10% of your mug or glass with SOY MICHELERO flavor and
                            the rest with your favorite drink</p>
                    </li>
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/6@2x.png" alt="">
                        <p class="typo instruction-thumbs">You can choose between beer or soda for non alcoholic drinks
                        </p>
                    </li>
                    <li class="instruction-thumbnails">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/7@2x.png" alt="">
                        <p class="typo instruction-thumbs">Stir and enjoy!</p>
                    </li>
        
                </ul>
            </div>
        </div>
        <!-- SEPARATOR -->
        
        <!-- SECTION THREE (DEALERS) -->
        <div id="dealers" class="container-fluid section-three">
            <div class="background-overlay"></div> <!-- Fondo radial -->
            <!-- Título de la sección -->
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="typo">Dealers</h1>
                </div>
            </div>
            <p class="typo">
                We're thrilled that you can now find our products online! But the best part is, you can also become a
                distributor in your area. That way, Micheleros will have us even closer! Interested in becoming a
                distributor?
            </p>
        </div>
        <!-- SECTION THREE (DEALERS) -->
        
        <?php get_footer(); ?>
        
        <script>
            window.addEventListener('scroll', function () {
                const sectionOne = document.querySelector('.section-one');
                const parallaxElement = document.querySelector('.parallax-texture');

                // Obtener la posición del scroll y la posición de la sección
                const sectionTop = sectionOne.offsetTop;
                const sectionHeight = sectionOne.offsetHeight;
                const scrollY = window.scrollY;
                const windowHeight = window.innerHeight;

                const offset = scrollY - (sectionTop - windowHeight);

                // Calcular el efecto de parallax solo si el scroll está dentro de la sección
                if (scrollY >= sectionTop - windowHeight && scrollY < (sectionTop + sectionHeight)) {
                    const offset = scrollY - sectionTop;
                    const movementFactor = 0.5; // Ajustar para mayor o menor efecto
                    parallaxElement.style.transform = `translateY(${offset * movementFactor}px)`;
                }
            });

        </script>