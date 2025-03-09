<?php
/**
 * The template for displaying product content within loops.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit();

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<li <?php wc_product_class( '', $product ); ?>>

    <!-- Imagen del producto -->
    <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        <?php
        woocommerce_show_product_loop_sale_flash();
        woocommerce_template_loop_product_thumbnail();
        ?>
    </a>

    <!-- Título del producto -->
    <a href="<?php the_permalink(); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
        <?php woocommerce_template_loop_product_title(); ?>
    </a>

    <!-- Contenido neto -->
    <?php
	// Obtener el valor del metabox "piezas por caja"
	$net_content = rwmb_meta('net_content');
	if ($net_content) {
		echo '<p class="pieces-per-box">Contenido Neto/Net Content: ' . esc_html($net_content) . '</p>';
	}
	?>

    <!-- Piezas por caja -->
    <?php
    // Obtener el valor del metabox "piezas por caja"
    // $pieces_per_box = rwmb_meta('pieces_per_box');
    // if ($pieces_per_box) {
    //     echo '<p class="pieces-per-box">Pieces per box: ' . esc_html($pieces_per_box) . '</p>';
    // }
    ?>

    <!-- Precio del producto -->
    <div class="woocommerce-product-price">
        <?php woocommerce_template_loop_price(); ?>
    </div>

    <!-- Botón añadir al carrito -->
    <div class="woocommerce-add-to-cart">
        <?php woocommerce_template_loop_add_to_cart(); ?>
    </div>

</li>