<?php
/**
 * The Template for displaying products in a product category.
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header('shop');

// Obtener el objeto de la categoría actual
$term = get_queried_object();
$category_featured_image_url = '';
$category_header_image_url = '';

if ($term && is_tax('product_cat')) {
	// Obtener el ID de la imagen destacada desde el meta de la categoría
	$featured_image_id = get_term_meta($term->term_id, 'category_featured_image', true);

	// Obtener el ID de la imagen de encabezado desde el meta de la categoría
	$header_image_id = get_term_meta($term->term_id, 'category_header_image', true);

	// Si existe un ID de imagen destacada, obtenemos la URL de la imagen adjunta
	if ($featured_image_id) {
		$category_featured_image_url = wp_get_attachment_url($featured_image_id);
	}

	// Si existe un ID de imagen de encabezado, obtenemos la URL de la imagen adjunta
	if ($header_image_id) {
		$category_header_image_url = wp_get_attachment_url($header_image_id);
	}
}

// Mostrar la imagen de encabezado
// if ($category_header_image_url) {
// 	echo '<img src="' . esc_url($category_header_image_url) . '" alt="Imagen de encabezado de la categoría">';
// } else {
// 	echo 'No hay imagen de encabezado asignada a esta categoría.';
// }

// Mostrar la imagen destacada
// if ($category_featured_image_url) {
// 	echo '<img src="' . esc_url($category_featured_image_url) . '" alt="Imagen destacada de la categoría">';
// } else {
// 	echo 'No hay imagen destacada asignada a esta categoría.';
// }

?>

<!-- Mostrar la imagen de encabezado como fondo de la sección si existe -->
<section id="category-header"
	class="container-fluid main-header parallax-header d-flex align-content-center justify-content-center align-items-center"
	style="background-image: url('<?php echo esc_url($category_header_image_url); ?>');">
	<h1 class="typo"><?php echo esc_html($term->name); ?></h1>
</section>

<!-- Mostrar la descripción de la categoría -->
<?php if (is_tax('product_cat')): ?>
	<div class="category-description container-fluid text-center my-4">
		<?php
		$term = get_queried_object();
		echo term_description($term->term_id, 'product_cat');
		?>
	</div>
<?php endif; ?>

<!-- MAIN CONTENT -->
<section id="main-content">
	<div class="container-fluid tax-background"
		style="background-image: url('<?php echo esc_url($category_featured_image_url); ?>');">
		<div class="woocommerce-notices-wrapper">
			<?php wc_print_notices(); ?>
		</div>
		<div class="row">

			<?php if (woocommerce_product_loop()): ?>
				<div class="row">
					<?php
					woocommerce_product_loop_start();

					if (wc_get_loop_prop('total')) {
						while (have_posts()) {
							the_post();

							// Modificar el layout de los productos
							echo '<div class="col-md-3 col-sm-6 mb-4 d-flex justify-content-center align-items-center flex-column tax-products">'; // Ajustar a 4 productos por fila
							wc_get_template_part('content', 'product'); // Plantilla de producto individual
							echo '</div>';
						}
					}

					woocommerce_product_loop_end();
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="price-list container">
			<h3 class="typo additional-info-txt">* The prices shown are per item. We offer <strong class="highlight">discounts of up to 30%</strong> when purchasing larger
				quantities. If you’d like to see the full price list, <strong class="highlight"><a href="">click here</a>.</strong>
				These prices will be automatically applied to your shopping cart based on the number of items you add.
			</h3>
		</div>


	</div>
</section>

<!-- Parallax effect script (como en rimmers.php) -->
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const parallaxElement = document.querySelector("#category-header");

		if (parallaxElement) {
			function updateParallax() {
				let windowWidth = window.innerWidth;
				if (windowWidth > 375) {
					window.addEventListener("scroll", function () {
						let scrollPosition = window.pageYOffset;
						parallaxElement.style.backgroundPositionY = -(scrollPosition * 2.5) + "px";
					});
				} else {
					parallaxElement.style.backgroundPositionY = "center";
				}
			}

			updateParallax();
			window.addEventListener("resize", updateParallax);
		}
	});
</script>

<?php
get_footer('shop');
?>