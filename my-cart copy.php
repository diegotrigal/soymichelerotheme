<?php /* Template Name: Mi Carrito */ ?>

<?php get_header(); ?>

<?php

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="container-fluid cart-content mt-5">
    <div class="background-overlay"></div>

    <!-- Mostrar mensajes de WooCommerce -->
    <div class="woocommerce-notices-wrapper">
        <?php wc_print_notices(); ?>
    </div>

    <!-- Formulario del carrito -->
    <div class="cart-content-div container">
        <form class="woocommerce-cart-form container" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>
            <table class="table table-striped shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <thead class="table-dark">
                    <tr>
                        <th class="product-remove"><?php esc_html_e('Remove', 'woocommerce'); ?></th>
                        <th class="product-thumbnail"><?php esc_html_e('Thumbnail', 'woocommerce'); ?></th>
                        <th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
                        <th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
                        <th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
                        <th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php do_action('woocommerce_before_cart_contents'); ?>
                    <?php
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                            ?>
                            <tr class="woocommerce-cart-form__cart-item">
                                <td class="product-remove">
                                    <?php
                                    echo apply_filters(
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="btn btn-danger" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_attr(sprintf(__('Remove %s from cart', 'woocommerce'), $_product->get_name())),
                                            esc_attr($product_id),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </td>
                                <td class="product-thumbnail">
                                    <?php
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                                    if (!$product_permalink) {
                                        echo $thumbnail;
                                    } else {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail);
                                    }
                                    ?>
                                </td>
                                <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                    <?php
                                    if (!$product_permalink) {
                                        echo wp_kses_post($_product->get_name());
                                    } else {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                    }
                                    echo wc_get_formatted_cart_item_data($cart_item);
                                    ?>
                                </td>
                                <td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                    <?php echo WC()->cart->get_product_price($_product); ?>
                                </td>
                                <td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                    <?php
                                    if ($_product->is_sold_individually()) {
                                        $min_quantity = 1;
                                        $max_quantity = 1;
                                    } else {
                                        $min_quantity = 0;
                                        $max_quantity = $_product->get_max_purchase_quantity();
                                    }
                                    $product_quantity = woocommerce_quantity_input(
                                        array(
                                            'input_name' => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'max_value' => $max_quantity,
                                            'min_value' => $min_quantity,
                                        ),
                                        $_product,
                                        false
                                    );
                                    echo $product_quantity;
                                    ?>
                                </td>
                                <td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                                    <?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    <?php do_action('woocommerce_cart_contents'); ?>
                    <tr>
                        <td colspan="6" class="actions">
                            <?php if (wc_coupons_enabled()) { ?>
                                <div class="coupon mb-3">
                                    <label for="coupon_code"><?php esc_html_e('Coupon:', 'woocommerce'); ?></label>
                                    <div class="input-group">
                                        <input type="text" name="coupon_code" class="form-control" id="coupon_code"
                                            placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
                                        <button type="submit" class="btn btn-primary"
                                            name="apply_coupon"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
                                    </div>
                                    <?php do_action('woocommerce_cart_coupon'); ?>
                                </div>
                            <?php } ?>
                            <button type="submit" class="btn btn-secondary"
                                name="update_cart"><?php esc_attr_e('Update cart', 'woocommerce'); ?></button>
                            <?php do_action('woocommerce_cart_actions'); ?>
                            <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                        </td>
                    </tr>
                    <?php do_action('woocommerce_after_cart_contents'); ?>
                </tbody>
            </table>
            <?php do_action('woocommerce_after_cart_table'); ?>
        </form>
        <div class="container mt-4 mb-4">
            <div class="row">
                <!-- Productos de ventas cruzadas o cross-sell -->
                <div class="d-flex justify-content-end">
                    <?php
                    /**
                     * Muestra productos de ventas cruzadas o cross-sell
                     * Hooked: woocommerce_cross_sell_display
                     */
                    do_action('woocommerce_cart_collaterals');
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php do_action('woocommerce_after_cart'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const enableCartUpdateButton = function () {
            const updateCartButton = document.querySelector('button[name="update_cart"]');
            const quantityInputs = document.querySelectorAll('input.qty');

            // Habilitar el botón si la cantidad cambia
            quantityInputs.forEach(input => {
                input.addEventListener('change', function () {
                    updateCartButton.disabled = false;
                });
            });

            // Forzar la habilitación del botón al cargar la página
            updateCartButton.disabled = false;
        };

        // Ejecutar al cargar la página
        enableCartUpdateButton();

        // Rehabilitar los eventos después de que WooCommerce actualiza el carrito por AJAX
        jQuery(document.body).on('updated_cart_totals', function () {
            enableCartUpdateButton();
        });
    });
</script>

<?php get_footer(); ?>