<?php /* Template Name: Mixers */ ?>

<?php get_header(); ?>

<body id="mixers-page" <?php body_class(); ?>>
    <!-- HEADER con efecto de parallax -->
    <section id="header"
        class="container-fluid main-header parallax-header d-flex align-content-center justify-content-center align-items-center">
        <h1 class="typo">Drinks Mixer</h1>
    </section>

    <!-- MAIN CONTENT -->
    <section id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 mango-side">
                    <div class="radial-overlay"></div>
                    <div class="grunge-overlay"></div>
                    <h1 class="typo">Drink Mixer Mango</h1>
                    <div class="row container-fluid">
                        <div class=" d-flex justify-content-center align-content-center align-items-center flex-column">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/mixermango@0.5x.png" class="product-image" alt="">
                            <h3 class="typo">33.8 fl oz (1 l)</h3>
                            <h3 class="typo">9 pieces per box</h3>
                            <div class="button-image">
                                <h3 class="typo"><a href="#">Shop!</a></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 cubana-side">
                    <div class="radial-overlay"></div>
                    <div class="grunge-overlay"></div>
                    <h1 class="typo">Drink Mixer Cubana</h1>
                    <div class="row container-fluid">
                        <div class=" d-flex justify-content-center align-content-center align-items-center flex-column">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/mixercubana@0.5x.png" class="product-image" alt="">
                            <h3 class="typo">33.8 fl oz (1 l)</h3>
                            <h3 class="typo">9 pieces per box</h3>
                            <div class="button-image">
                                <h3 class="typo"><a href="#">Shop!</a></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 blueberry-side">
                    <div class="radial-overlay"></div>
                    <div class="grunge-overlay"></div>
                    <h1 class="typo">Drink Mixer Blueberry</h1>
                    <div class="row container-fluid">
                        <div class=" d-flex justify-content-center align-content-center align-items-center flex-column">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/media/products/mixerblueberry@0.5x.png" class="product-image" alt="">
                            <h3 class="typo">33.8 fl oz (1 l)</h3>
                            <h3 class="typo">9 pieces per box</h3>
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
            const parallaxElement = document.querySelector("#mixers-page .parallax-header");

            if (parallaxElement) {
                function updateParallax() {
                    let windowWidth = window.innerWidth;
                    if (windowWidth > 375) { // Solo aplica parallax si el ancho de la ventana es mayor a 375px
                        window.addEventListener("scroll", function () {
                            let scrollPosition = window.pageYOffset;
                            parallaxElement.style.backgroundPositionY = -(scrollPosition * 0.4) + "px"; // Dirección contraria
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