<?php

function soymichelero_setup()
{
    // Cargar las traducciones del tema desde el directorio /languages
    load_theme_textdomain('soymichelero', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'soymichelero_setup');
function enqueue_custom_styles()
{
    // Encolar Bootstrap desde CDN
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Encolar FontAwesome desde CDN
    wp_enqueue_style('font-awesome', 'https://kit.fontawesome.com/3ac3e96584.css', array(), null);

    // Encolar tu hoja de estilos personalizada
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom-style.css', array(), wp_get_theme()->get('Version'));

    // Encolar otras hojas de estilo personalizadas
    wp_enqueue_style('test-stuff', get_template_directory_uri() . '/assets/css/test-stuff.css', array(), wp_get_theme()->get('Version'));

    // Encolar tu hoja de estilos de productos
    wp_enqueue_style('products-style', get_template_directory_uri() . '/assets/css/products.css', array(), wp_get_theme()->get('Version'));

    // Encolar la fuente Typekit "poster"
    wp_enqueue_style('typekit-font', 'https://use.typekit.net/mti1hhh.css', array(), null);

    // Encolar estilos solo para la página de la tienda
    if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
        wp_enqueue_style('archive-product-style', get_template_directory_uri() . '/assets/css/store-style.css', array(), wp_get_theme()->get('Version'));
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

add_action('wp_enqueue_scripts', 'enqueue_woocommerce_scripts');
function enqueue_woocommerce_scripts()
{
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('wc-cart');
    }
}

function woocommerce_support()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'woocommerce_support');

// Hook para agregar la clase "row" al <ul> de los productos en la tienda
function add_bootstrap_row_class_to_products_loop()
{
    echo '<ul class="products columns-4 row">';
}
add_action('woocommerce_product_loop_start', 'add_bootstrap_row_class_to_products_loop', 1);

// Hook para cerrar el <ul> correctamente
function close_bootstrap_row_class_to_products_loop()
{
    echo '</ul>';
}
add_action('woocommerce_product_loop_end', 'close_bootstrap_row_class_to_products_loop', 1);

// Agregar la clase "display-product-item" a los <li> de productos en WooCommerce
function add_custom_class_to_product_li($classes, $product)
{
    if (is_shop() || is_product_category() || is_product_tag()) {
        $classes[] = 'display-product-items';
    }
    return $classes;
}
add_filter('post_class', 'add_custom_class_to_product_li', 10, 2);

// Añadir un div wrapper con la clase "col-md-4 mb-4" alrededor de cada producto
function add_bootstrap_div_wrapper_start()
{
    echo '<div class="element-div">';
}
add_action('woocommerce_before_shop_loop_item', 'add_bootstrap_div_wrapper_start', 5);

function add_bootstrap_div_wrapper_end()
{
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'add_bootstrap_div_wrapper_end', 5);

// Función para envolver precio y botón "Añadir al carrito" en un div con clases Bootstrap
function custom_wrap_price_add_to_cart_start()
{
    echo '<div class="row justify-content-between align-items-center product-price-cart-wrapper">';
}

// Cerrar el div de la envoltura después del botón "Añadir al carrito"
function custom_wrap_price_add_to_cart_end()
{
    echo '</div>';
}

// Eliminar el botón "Añadir al carrito" original de WooCommerce
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Añadir de nuevo el botón dentro del contenedor personalizado
add_action('woocommerce_after_shop_loop_item_title', 'custom_wrap_price_add_to_cart_start', 9);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 11);
add_action('woocommerce_after_shop_loop_item_title', 'custom_wrap_price_add_to_cart_end', 12);

// Eliminar el sidebar solo en la tienda y categorías de productos
function remove_woocommerce_sidebar_on_specific_pages()
{
    if (is_shop() || is_product_category() || is_product_tag()) {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
    }
}
add_action('wp', 'remove_woocommerce_sidebar_on_specific_pages');

add_filter('woocommerce_product_loop_start', 'custom_woocommerce_product_loop_start', 10);

function custom_woocommerce_product_loop_start($ul)
{
    // Modifica las clases del ul aquí
    $ul = '<ul class="custom-products-list row justify-content-center">';
    return $ul;
}

// Añadir categorías al breadcrumb
add_filter('woocommerce_breadcrumb_defaults', 'personalizar_breadcrumb');
function personalizar_breadcrumb($defaults)
{
    // $defaults['delimiter'] = ' > ';
    $defaults['wrap_before'] = '<nav class="woocommerce-breadcrumb" aria-label="breadcrumb"><ul>';
    $defaults['wrap_after'] = '</ul></nav>';
    $defaults['before'] = '<li>';
    $defaults['after'] = '</li>';
    return $defaults;
}

// Mostrar la categoría actual en el breadcrumb
add_filter('woocommerce_get_breadcrumb', 'agregar_categoria_breadcrumb', 20, 2);
function agregar_categoria_breadcrumb($crumbs, $breadcrumb)
{
    if (is_product_category() || is_product()) {
        $taxonomy = 'product_cat';
        $terms = get_the_terms(get_the_ID(), $taxonomy);

        if ($terms && !is_wp_error($terms)) {
            $main_term = $terms[0]; // Tomar la primera categoría
            $parent_terms = get_ancestors($main_term->term_id, $taxonomy);
            $parent_terms = array_reverse($parent_terms);

            foreach ($parent_terms as $parent_id) {
                $parent_term = get_term($parent_id, $taxonomy);
                $crumbs[] = array($parent_term->name, get_term_link($parent_term));
            }

            // Añadir la categoría actual
            // $crumbs[] = array($main_term->name, get_term_link($main_term));
        }
    }

    return $crumbs;
}

function encolar_woocommerce_scripts()
{
    if (class_exists('WooCommerce')) {
        wp_enqueue_style('woocommerce-general');
        wp_enqueue_script('woocommerce');
        wp_enqueue_script('wc-cart');
        wp_enqueue_script('wc-checkout');
        wp_enqueue_script('wc-add-to-cart');
    }
}
add_action('wp_enqueue_scripts', 'encolar_woocommerce_scripts');

function enqueue_woocommerce_ajax_add_to_cart()
{
    if (class_exists('WooCommerce')) {
        wp_enqueue_script('wc-add-to-cart');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_woocommerce_ajax_add_to_cart');

function register_custom_menus()
{
    register_nav_menus(array(
        'top-menu' => __('Top Menu', 'your-theme-textdomain'),
        'main-menu' => __('Main Menu', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_custom_menus');

// Función para cambiar el idioma
function change_language() {
    if (isset($_GET['lang'])) {
        $lang = sanitize_text_field($_GET['lang']);
        $available_languages = ['es_MX', 'en_US']; // Idiomas disponibles
        if (in_array($lang, $available_languages)) {
            // Guardar el idioma seleccionado en una cookie
            setcookie('site_language', $lang, time() + (30 * DAY_IN_SECONDS), COOKIEPATH, COOKIE_DOMAIN);

            // Redirigir a la página actual sin parámetros
            wp_redirect(remove_query_arg('lang'));
            exit;
        }
    }
}
add_action('init', 'change_language');

// Función para cargar el idioma
function load_language() {
    if (isset($_COOKIE['site_language'])) {
        $lang = sanitize_text_field($_COOKIE['site_language']);
        if (in_array($lang, ['es_MX', 'en_US'])) {
            switch_to_locale($lang);
            load_textdomain('soymichelero', get_template_directory() . '/languages/' . $lang . '.mo');
        }
    }
}
add_action('after_setup_theme', 'load_language');
