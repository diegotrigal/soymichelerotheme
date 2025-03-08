<?php
/* Template Name: Finalizar Compra */

get_header(); ?>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Finalizar compra</h1>

    <div class="woocommerce-notices-wrapper"></div>

    <?php
    // Mostrar el formulario de finalizar compra usando el shortcode
    echo do_shortcode('[woocommerce_checkout]');
    ?>
</div>

<?php get_footer(); ?>