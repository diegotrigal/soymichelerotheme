<?php get_header(); ?>

<!-- VIDEO BACKGROUND -->
<div class="container-fluid main-bg video-background d-flex justify-content-start">
    <video autoplay muted loop>
        <source src="<?php echo get_template_directory_uri() ?>/assets/media/video/rimmer-sauce.mp4" type="video/mp4">
        <?php _e('Your browser does not support the video tag. Try using Google Chrome / Brave Browser / Firefox.', 'soymichelero'); ?>
    </video>
    <div class="content-overlay d-flex flex-column justify-content-center align-items-center welcome-message">
        <h1 class="typo big-sized"><?php _e('Bienvenido Michelero!', 'soymichelero'); ?></h1>
        <p class="typo">
            <?php _e('Estás muy cerca de disfrutar <br> momentos llenos de alegría con Soy Michelero.', 'soymichelero'); ?>
        </p>
        <div class="button-image">
            <h3 class="typo"><a href="#about"><?php _e('Start!', 'soymichelero'); ?></a></h3>
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
            <h1 class="typo"><?php _e('Sobre nosotros', 'soymichelero'); ?></h1>
            <p class="typo">
                <?php _e('Soy Michelero LLC es una empresa dedicada a elaborar productos de CALIDAD. Garantizamos una experiencia inolvidable al disfrutar tu michelada. Nuestro objetivo es transmitir el amor y orgullo por nuestras raíces mexicanas.', 'soymichelero'); ?>
            </p>

            <p class="typo">
                <?php _e('Estamos comprometidos en crear momentos de alegría y conexión al ofrecer mixers y escarchadores que reflejan la autenticidad y calidez de nuestra cultura, permitiendo que nuestros clientes disfruten y compartan su herencia en cada sorbo.', 'soymichelero'); ?>
            </p>
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
            <h2 class="typo"><?php _e('¡Conoce a Micheleitor!', 'soymichelero'); ?></h2>
            <p class="typo">
                <?php _e('Micheleitor es un jaguar mexicano, símbolo de fuerza y orgullo, que representa la autenticidad y tradición de Soy Michelero LLC.', 'soymichelero'); ?>
            </p>
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
            <h1 class="typo"><?php _e('Nuestros Productos', 'soymichelero'); ?></h1>
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
                <h3 class="typo"><?php _e('Escarchadores', 'soymichelero'); ?></h3>
                <p class="typo" style="width: 80%;">
                    <?php _e('Nuestra salsa y polvo para escarchar harán que tus micheladas o bebidas brillen al máximo.', 'soymichelero'); ?>
                </p>
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
                <h3 class="typo"><?php _e('Drink Mixers', 'soymichelero'); ?></h3>
                <p class="typo" style="width: 80%;">
                    <?php _e('¡Ideal para micheladas, margaritas, sodas italianas y todo tipo de bebidas con o sin alcohol!', 'soymichelero'); ?>
                </p>
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
                <h3 class="typo"><?php _e('Michelada Mix', 'soymichelero'); ?></h3>
                <p class="typo" style="width: 80%;">
                    <?php _e('El mix perfecto para hacer de tus micheladas una delicia. También son excelentes para Bloody Marys.', 'soymichelero'); ?>
                </p>
            </div>

        </div>

    </div>
</div>
<!-- SECTION TWO (PRODUCTS) -->

<!-- SEPARATOR -->
<div class="container-fluid separator bg-dark">
    <div class="instructions-container">
        <h1 class="typo" style="text-align: center;"><?php _e('Instrucciones', 'soymichelero'); ?></h1>
        <ul class="instructions-ul d-flex flex-row">

            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/1@2x.png" alt="">
                <p class="typo instruction-thumbs">
                    <?php _e('Escarcha un vaso o tarro con nuestro escarchador en salsa', 'soymichelero'); ?></p>
            </li>
            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/2@2x.png" alt="">
                <p class="typo instruction-thumbs">
                    <?php _e('Pásalo por nuestro escarchador en polvo', 'soymichelero'); ?></p>
            </li>
            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/3@2x.png" alt="">
                <p class="typo instruction-thumbs"><?php _e('Agrega hielo (altamente recomendado)', 'soymichelero'); ?>
                </p>
            </li>
            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/4@2x.png" alt="">
                <p class="typo instruction-thumbs">
                    <?php _e('Llena el 10% de tu tarro o vaso con el sabor de SOY MICHELERO de tu preferencia y el resto con tu bebida favorita', 'soymichelero'); ?>
                </p>
            </li>
            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/6@2x.png" alt="">
                <p class="typo instruction-thumbs">
                    <?php _e('Puedes elegir entre cerveza o refresco para bebidas sin alcohol', 'soymichelero'); ?></p>
            </li>
            <li class="instruction-thumbnails">
                <img src="<?php echo get_template_directory_uri() ?>/assets/media/instructions/7@2x.png" alt="">
                <p class="typo instruction-thumbs"><?php _e('¡Mezcla y disfruta!', 'soymichelero'); ?></p>
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
            <h1 class="typo"><?php _e('Dealers', 'soymichelero'); ?></h1>
        </div>
    </div>
    <p class="typo">
        <?php _e('¡Estamos emocionados de que ahora puedas encontrar nuestros productos en línea! Pero lo mejor de todo es que también puedes convertirte en distribuidor en tu área. ¡Así los Micheleros nos tendrán aún más cerca! ¿Te interesa convertirte en distribuidor?', 'soymichelero'); ?>
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