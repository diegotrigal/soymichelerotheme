<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 */

defined('ABSPATH') || exit;

get_header('shop'); ?>


<style>
	/* Input de cantidad */
	.cart-form .quantity {
		width: 100%; 
	}

	.cart-button-wrapper {
		width: 100%;         
		margin-top: 10px;    
	}

	.single_add_to_cart_button {
		width: 100%;
		text-align: center;  
	}

	/* Imagen del producto en móviles */
	@media (max-width: 768px) {
		.woocommerce-product-gallery__image,
		.woocommerce-product-gallery__image img {
			width: 100% !important;
			height: auto !important;
			object-fit: contain;
			margin-bottom: 15px;
		}
	}
</style>

<div id="primary" class="content-area container-fluid primary-store-container mt-5">
	<main id="main" class="site-main container main-store-container" role="main">

		<!-- Breadcrumb -->
		<?php woocommerce_breadcrumb(); ?>
		<div class="woocommerce-notices-wrapper">
			<?php wc_print_notices(); ?>
		</div>

		<?php while (have_posts()): ?>
			<?php the_post(); ?>

			<hr>

			<div class="row single-content-row">
				<!-- Imagen del producto -->
				<div class="col-md-6 left-side">
					<?php woocommerce_show_product_images(); ?>
				</div>

				<div class="col-md-6 right-side">
					<div class="summary entry-summary">
						<!-- Metadatos del producto -->
						<div class="product_meta">
							<span class="posted_in">Categoría/Category:
								<?php echo wc_get_product_category_list(get_the_ID()); ?></span>
						</div>
						<!-- Título del producto -->
						<h1 class="product_title entry-title"><?php the_title(); ?></h1>
						<?php
						// Obtener el valor del metabox "piezas por caja"
						$net_content = rwmb_meta('net_content');
						if ($net_content) {
							echo '<p class="pieces-per-box">Contenido Neto/Net Content: ' . esc_html($net_content) . '</p>';
						}
						?>
						<span class="woocommerce-Price-amount amount"><bdi><span
									class="woocommerce-Price-currencySymbol">$</span><?php echo wc_get_price_to_display($product); ?></bdi></span>

						<p class="stock in-stock mb-0"><?php echo $product->get_stock_quantity(); ?> disponibles/available
						</p>
						<div class="cart-form">
							<!-- Formulario de añadir al carrito -->
							<form class="cart" action="<?php echo esc_url(get_permalink()); ?>" method="post"
								enctype="multipart/form-data">
								<div class="row">
									<!-- Columna izquierda: Input de cantidad -->
									<div class="col-md-12 d-flex flex-column align-items-start">
										<div class="quantity w-100 mb-3">
											<label class="screen-reader-text"
												for="quantity_<?php echo esc_attr($product->get_id()); ?>">
												<?php echo esc_html($product->get_name()); ?> cantidad/quantity
											</label>
											<input type="number" id="quantity_<?php echo esc_attr($product->get_id()); ?>"
												class="input-text qty text w-100" name="quantity" value="1"
												aria-label="Cantidad de productos" size="4" min="1"
												max="<?php echo esc_attr($product->get_stock_quantity()); ?>" step="1"
												placeholder="" inputmode="numeric" autocomplete="off">
										</div>

										<!-- Botón debajo del input de cantidad -->
										<div class="cart-button-wrapper w-100">
											<button type="submit" name="add-to-cart"
												value="<?php echo esc_attr($product->get_id()); ?>"
												class="single_add_to_cart_button button alt w-100">
												Añadir al carrito/Add to cart
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>

						<!-- Descripción del producto -->
						<div class="product-description">
							<?php the_content(); // Muestra la descripción completa del producto ?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>

		<hr>

		<!-- Productos relacionados por etiqueta -->
		<div id="related-tag-products" class="row related-tag-products">
			<h2 class="text-center">Productos relacionados</h2>
			<div class="related-divs">
				<div class="col-md-12">
					<?php
					// Obtener las etiquetas del producto actual
					$terms = get_the_terms($post->ID, 'product_tag');

					if ($terms && !is_wp_error($terms)) {
						// Obtener los IDs de las etiquetas
						$tag_ids = wp_list_pluck($terms, 'term_id');

						// Definir los argumentos para obtener productos relacionados con la misma etiqueta
						$related_args = array(
							'post_type' => 'product',
							'posts_per_page' => 4, // Número de productos que deseas mostrar
							'post__not_in' => array($post->ID), // Excluir el producto actual
							'tax_query' => array(
								array(
									'taxonomy' => 'product_tag',
									'field' => 'term_id',
									'terms' => $tag_ids, // Mostrar productos relacionados con la misma etiqueta
								),
							),
						);

						$related_products = new WP_Query($related_args);

						if ($related_products->have_posts()) {
							echo '<div class="d-flex flex-row justify-content-between">';
							while ($related_products->have_posts()) {
								$related_products->the_post();
								wc_get_template_part('content', 'product'); // Mostrar el producto relacionado
							}
							echo '</div>';
						} else {
							echo '<p>No hay productos relacionados para esta etiqueta.</p>';
						}

						// Restablecer la consulta global de WP
						wp_reset_postdata();
					}
					?>
				</div>
			</div>
		</div>

		<hr>

	</main>
</div>

<?php
get_footer('shop');
?>