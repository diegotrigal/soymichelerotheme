<!-- FOOTER -->

    <div class="sticky-div">
        <a href="https://wa.me/17133140911" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
    </div>

<footer class="container-fluid bg-dark text-white py-4">
    <div class="row d-none d-sm-flex">
        <!-- Columna 1: Imagen (visible en dispositivos mayores a 640px) -->
        <div class="col-sm-4 d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() ?>/assets/media/common/micheleitor.png" width="250px"
                alt="Michelero" class="img-fluid">
        </div>

        <!-- Columna 2: Contenido -->
        <div class="col-sm-4 d-flex flex-column justify-content-center align-items-center">
            <div class="row w-100">
                <div class="col-12 text-center">
                    <h5 class="light-color">
                    SOY MICHELERO LLC | v<?php echo esc_html(wp_get_theme()->get('Version')); ?>
                    </h5>
                </div>
                <div class="col-12 text-center">
                    <p class="light-color">801 Travis Street, Suite 2101, PMB 1092, Houston, TX 77002</p>
                    <p class="light-color tyc"><a href="<?php echo home_url(); ?>/terms-and-conditions">
                    <?php _e('Términos y condiciones', 'soymichelero'); ?>
                </a></p>
                </div>
                <div class="col-12">
                    <ul class="footer-items d-flex justify-content-center flex-row flex-wrap">
                        <li class="footer-elements">
                            <a href="https://www.tiktok.com/@soymichelero" target="_blank"><i class="fa-brands fa-tiktok"></i>TikTok</a>
                        </li>
                        <li class="footer-elements">
                            <a href="https://www.instagram.com/soymichelero/" target="_blank"><i class="fa-brands fa-instagram"></i>Instagram</a>
                        </li>
                        <li class="footer-elements">
                            <a href="https://wa.me/17133140911" target="_blank"><i class="fa-brands fa-whatsapp"></i>WhatsApp</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Columna 3: Imagen (visible en dispositivos mayores a 640px) -->
        <div class="col-sm-4 d-flex justify-content-center">
            <img src="<?php echo get_template_directory_uri() ?>/assets/media/logo/fc-dbg@2x.png" width="340px"
                alt="Imagen 2" class="img-fluid">
        </div>
    </div>

    <!-- Contenido solo para dispositivos menores a 640px -->
    <div class="row d-sm-none">
        <div class="col-12 text-center">
            <h2 class="light-color">
                SOY MICHELERO LLC | v<?php echo esc_html(wp_get_theme()->get('Version')); ?>
            </h2>
            <p class="light-color">801 Travis Street, Suite 2101, PMB 1092, Houston, TX 77002</p>
            <p class="light-color tyc">
                <a href="<?php echo home_url(); ?>/terms-and-conditions">
                    <?php _e('Términos y condiciones', 'soymichelero'); ?>
                </a>
            </p>
        </div>
        <div class="col-12">
            <ul class="footer-items d-flex justify-content-center flex-column align-items-center">
                <li class="footer-elements mb-2">
                    <a href="#"><i class="fa-brands fa-tiktok"></i>TikTok</a>
                </li>
                <li class="footer-elements mb-2">
                    <a href="#"><i class="fa-brands fa-instagram"></i>Instagram</a>
                </li>
                <li class="footer-elements mb-2">
                    <a href="#"><i class="fa-brands fa-whatsapp"></i>WhatsApp</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<!-- FOOTER -->

</main>

<!-- Modal WooCommerce Notification -->
<div class="modal fade" id="wcNotificationModal" tabindex="-1" aria-labelledby="wcNotificationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wcNotificationModalLabel">Notificación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="wcNotificationContent">
                <!-- Aquí se mostrarán las notificaciones de WooCommerce -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        function showModalWithNotifications() {
            var notifications = document.querySelectorAll('.woocommerce-error, .woocommerce-message, .woocommerce-info');
            if (notifications.length > 0) {
                var modalBody = document.getElementById('wcNotificationContent');
                modalBody.innerHTML = '';
                notifications.forEach(function (notification) {
                    modalBody.innerHTML += notification.outerHTML;
                });
                var wcModal = new bootstrap.Modal(document.getElementById('wcNotificationModal'));
                wcModal.show();
            }
        }
        jQuery(document.body).on('added_to_cart wc_cart_button_updated', function () {
            showModalWithNotifications();
        });
        jQuery(document.body).on('wc_fragments_refreshed wc_fragments_loaded', function () {
            showModalWithNotifications();
        });
        jQuery(document.body).on('updated_cart_totals', function () {
            showModalWithNotifications();
        });
        showModalWithNotifications();
    });
</script>

<?php wp_footer(); ?>
</body>

</html>

<script src="<?php echo get_template_directory_uri() ?>/assets/js/custom-scripts.js"></script>
<!-- SCRIPTS -->


<?php wp_footer(); ?>

</body>

</html>