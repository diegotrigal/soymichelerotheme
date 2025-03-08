<?php /* Template Name: Mi Cuenta */ ?>

<?php get_header(); ?>

<div class="container mt-5 mb-5">
    <h1 class="text-center">Mi Cuenta</h1>

    <div class="woocommerce">
        <?php echo do_shortcode('[woocommerce_my_account]'); ?>
    </div>
</div>

<?php get_footer(); ?>