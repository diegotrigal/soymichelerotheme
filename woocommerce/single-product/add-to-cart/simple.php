<?php
/**
	* Simple product add to cart
	*
	* @see https://woocommerce.com/document/template-structure/
	* @package WooCommerce\Templates
	* @version 7.0.1
	*/

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<style>
		.cart-wrapper {
			display: flex;
			flex-direction: column; /* Coloca el input y el botón en columnas */
			gap: 15px; /* Espacio entre el input y el botón */
			width: 100%;
}

.quantity-container,
.cart-button-wrapper {
	width: 100%; /* Ambos elementos ocupan el ancho completo */
}

.quantity .input-text.qty {
	width: 100%; /* El input de cantidad ocupa el ancho completo */
	box-sizing: border-box; /* Evita que el padding afecte el ancho */
}

.single_add_to_cart_button {
	width: 100%; /* El botón ocupa el ancho completo */
	text-align: center; /* Alineación centrada */
}
	</style>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<!-- Estructura nueva -->
		<div class="cart-wrapper">
			<!-- Input de cantidad -->
			<div class="quantity-container">
				<?php
				do_action( 'woocommerce_before_add_to_cart_quantity' );

				woocommerce_quantity_input(
					array(
						'min_value' => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
						'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
						'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(),
					)
				);

				do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>
			</div>

			<!-- Botón de añadir al carrito -->
			<div class="cart-button-wrapper">
				<button type="submit" name="add-to-cart"
					value="<?php echo esc_attr( $product->get_id() ); ?>"
					class="single_add_to_cart_button button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>">
					<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
				</button>
			</div>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
