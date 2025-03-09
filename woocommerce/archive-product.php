<?php
/**
 * Template for displaying product archives (archive-products.php)
 */
defined('ABSPATH') || exit;

get_header('shop'); // Carga el header específico de la tienda

?>

<div id="primary" class="content-area container-fluid primary-store-container mt-5">
	<main id="main" class="site-main container main-store-container" role="main">

		<!-- Breadcrumb -->
		<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">
			<a href="<?php echo home_url(); ?>">Inicio</a> &nbsp;/&nbsp; Tienda
		</nav>

		<!-- Header de la tienda -->
		<header class="woocommerce-products-header text-center mb-4">
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
		</header>

		<!-- Mensajes y notificaciones de WooCommerce -->

		<div class="woocommerce-notices-wrapper">
			<?php wc_print_notices(); ?>
		</div>

		<!-- Filtros de orden y resultados -->
		<div class="container row mb-4 wc-tm">
			<div class="col-md-6">
				<?php
				woocommerce_result_count();
				?>
			</div>
			<div class="col-md-6 text-md-end d-flex align-items-center justify-content-end">
				<form class="woocommerce-ordering" method="get">
					<?php woocommerce_catalog_ordering(); ?>
				</form>
			</div>
		</div>

		<!-- Listado de productos -->
		<?php if (woocommerce_product_loop()): ?>
			<!-- <div class="row"> -->
			<?php
			woocommerce_product_loop_start();

			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();

					// Obtener la imagen de la categoría del producto
					$product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
					$category_image_url = '';

					if ($product_cats && !is_wp_error($product_cats)) {
						$category = $product_cats[0]; // Tomamos la primera categoría
						$category_image_id = get_term_meta($category->term_id, 'category_featured_image', true);

						// Si existe una imagen destacada para la categoría, obtenemos la URL
						if ($category_image_id) {
							$category_image_url = wp_get_attachment_url($category_image_id);
						}
					}

					// Aplicar la imagen de la categoría como fondo al div con clase display-product-item
					echo '<div class="col-md-4 col-sm-4 mb-4">';
					echo '<div class="display-product-item" style="background-image: url(' . esc_url($category_image_url) . '); background-size: cover; background-position: center;">';
					wc_get_template_part('content', 'product');
					echo '</div>';
					echo '</div>';
				}
			}

			woocommerce_product_loop_end();
			?>
			<!-- </div> -->

			<!-- Paginación -->
			<div class="row">
				<div class="col-12">
					<?php
					/**
					 * Hook: woocommerce_after_shop_loop.
					 * @hooked woocommerce_pagination - 10
					 */
					do_action('woocommerce_after_shop_loop');
					?>
				</div>
			</div>

		<?php else: ?>
			<!-- No hay productos -->
			<div class="row">
				<div class="col-12">
					<?php
					/**
					 * Hook: woocommerce_no_products_found.
					 * @hooked wc_no_products_found - 10
					 */
					do_action('woocommerce_no_products_found');
					?>
				</div>
			</div>
		<?php endif; ?>
	</main>
</div>

<?php
/**
 * Hook: woocommerce_sidebar.
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');