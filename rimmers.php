<?php /* Template Name: Rimmers */ ?>

<?php get_header(); ?>
<body id="rimmers-page" <?php body_class(); ?>>
<!-- HEADER con efecto de parallax -->
        <section id="rimmers-header" class="container-fluid main-header parallax-header d-flex align-content-center justify-content-center align-items-center"><h1 class="typo">Rimmers</h1></section>

        <!-- MAIN CONTENT -->
        <section id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 sauce-side">
                        <div class="radial-overlay"></div>
                        <div class="grunge-overlay"></div>
                        <h1 class="typo">Rimmer Sauce</h1>
                        <div class="row container-fluid">
                            <div
                                class="col-md-6 d-flex justify-content-center align-content-center align-items-center flex-column">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/sauce240@0.5x.png" class="product-image" alt="">
                                <h3 class="typo">8.4 oz (240g)</h3>
                                <h3 class="typo">20 Pieces per box</h3>
                                <div class="button-image">
                                    <h3 class="typo"><a href="#">Shop!</a></h3>
                                </div>
                            </div>
                            <div
                                class="col-md-6 d-flex justify-content-center align-content-center align-items-center flex-column">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/sacue850@0.5x.png" class="product-image" alt="">
                                <h3 class="typo">33.8 fl oz (1 l)</h3>
                                <h3 class="typo">16 Pieces per box</h3>
                                <div class="button-image">
                                    <h3 class="typo"><a href="#">Shop!</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 powder-side">
                        <div class="radial-overlay"></div>
                        <div class="grunge-overlay"></div>
                        <h1 class="typo">Rimmer Powder</h1>
                        <div class="row container-fluid">
                            <div
                                class="col-md-6 d-flex justify-content-center align-content-center align-items-center flex-column">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/powder240@0.5x.png" class="product-image" alt="">
                                <h3 class="typo">8.4 oz (240g)</h3>
                                <h3 class="typo">20 Pieces per box</h3>
                                <div class="button-image">
                                    <h3 class="typo"><a href="#">Shop!</a></h3>
                                </div>
                            </div>
                            <div
                                class="col-md-6 d-flex justify-content-center align-content-center align-items-center flex-column">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/powder850@0.5x.png" class="product-image" alt="">
                                <h3 class="typo">29 oz (850g)</h3>
                                <h3 class="typo">16 Pieces per box</h3>
                                <div class="button-image">
                                    <h3 class="typo"><a href="#">Shop!</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const parallaxElement = document.querySelector("#rimmers-page .parallax-header");

            if (parallaxElement) {
                function updateParallax() {
                    let windowWidth = window.innerWidth;
                    if (windowWidth > 375) { // Solo aplica parallax si el ancho de la ventana es mayor a 375px
                        window.addEventListener("scroll", function () {
                            let scrollPosition = window.pageYOffset;
                            parallaxElement.style.backgroundPositionY = -(scrollPosition * 0.2) + "px"; // Dirección contraria
                        });
                    } else {
                        // Resetea el fondo si el ancho es menor a 375px
                        parallaxElement.style.backgroundPositionY = "center";
                        window.removeEventListener("scroll", updateParallax);
                    }
                }

                // Ejecuta la función al cargar la página
                updateParallax();

                // Re-ejecuta la función al redimensionar la ventana
                window.addEventListener("resize", updateParallax);
            }
        });
    </script>

<?php get_footer(); ?>