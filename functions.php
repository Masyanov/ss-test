<?php
/**
 * ss-test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ss-test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ss_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ss-test, use a find and replace
		* to change 'ss-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ss-test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ss-test' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ss_test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ss_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ss_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ss_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'ss_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ss_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ss-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ss-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ss_test_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ss_test_scripts() {
	wp_enqueue_style( 'ss-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ss-test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ss-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ss_test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Подключаем плагин carbon-fields
 */
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

/**
 * Подключаем настройки произвольных полей. Все произвольные поля находятся в inc/carbon-fields-options
 */

add_action('carbon_fields_register_fields', 'register_carbon_fields');
function register_carbon_fields()
{
    /** Настройки темы */
    require_once(get_template_directory() . '/inc/carbon-fields-options/theme-options.php');
    /** Настройки товара */
    require_once(get_template_directory() . '/inc/carbon-fields-options/product.php');
}
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
// Включить галерею твоаров
add_action( 'after_setup_theme', 'gallery_theme_setup' );
function gallery_theme_setup() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_filter( 'woocommerce_variable_price_html', 'truemisha_variation_price', 20, 2 );

function truemisha_variation_price( $price, $product ) {

    $min_regular_price = $product->get_variation_regular_price( 'min', true );
    $min_sale_price = $product->get_variation_sale_price( 'min', true );
    $max_regular_price = $product->get_variation_regular_price( 'max', true );
    $max_sale_price = $product->get_variation_sale_price( 'max', true );

    if ( ! ( $min_regular_price == $max_regular_price && $min_sale_price == $max_sale_price ) ) {
        if ( $min_sale_price < $min_regular_price ) {
            $price = sprintf( '', wc_price( $min_regular_price ), wc_price( $min_sale_price ) );
        } else {
            $price = sprintf( 'от %1$s', wc_price( $min_regular_price ) );
        }
    }

    return $price;

}
add_action( 'woocommerce_single_product_summary', 'masyanov_action_tags', 20 );

function masyanov_action_tags() {
    global $product;
    $tags = $product->get_tags('');
    echo '<span class="product_tags">';
    echo $tags;
    echo'</span>';
}
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );   // Remove the additional information tab
    return $tabs;
}


add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {
    $tabs['description']['callback'] = 'woo_custom_description_tab_content';    // Custom description callback
    return $tabs;
}

function woo_custom_description_tab_content() {
    global $product;

    echo '<div class="description">';
    the_content();
    echo '</div>';

}
/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

    $tabs['description']['title'] = __( 'Рекомендации агроному' );		// Rename the description tab
    return $tabs;

}
/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

    // Adds the new tab

    $tabs['test_tab'] = array(
        'title' 	=> __( 'Регионы допуска', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'woo_new_product_tab_content'
    );
    $tabs['test_tab_obr'] = array(
        'title' 	=> __( 'Обработка', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'woo_new_product_tab_content_obr'
    );
    $tabs['test_tab_upak'] = array(
        'title' 	=> __( 'Упаковка', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'woo_new_product_tab_content_upak'
    );
    $tabs['test_tab_dost'] = array(
        'title' 	=> __( 'Доставка', 'woocommerce' ),
        'priority' 	=> 50,
        'callback' 	=> 'woo_new_product_tab_content_dost'
    );
    return $tabs;

}

function woo_new_product_tab_content()
{

    // The new tab content
    global $product;
    echo '<h2>Регионы допуска</h2>';
    echo '<div class="tab__content">';
    echo carbon_get_post_meta(get_the_ID(), 'regions');
    echo '</div>';

}
function woo_new_product_tab_content_obr()
{

    // The new tab content
    global $product;
    echo '<h2>Обработка</h2>';
    echo '<div class="tab__content">';
    echo carbon_get_post_meta(get_the_ID(), 'obrabotka');
    echo '</div>';

}
function woo_new_product_tab_content_upak()
{

    // The new tab content
    global $product;
    echo '<h2>Упаковка</h2>';
    echo '<div class="tab__content">';
    echo carbon_get_post_meta(get_the_ID(), 'upakovka');
    echo '</div>';

}
function woo_new_product_tab_content_dost()
{

    // The new tab content
    global $product;
    echo '<h2>Доставка</h2>';
    echo '<div class="tab__content">';
    echo carbon_get_post_meta(get_the_ID(), 'dostavka');
    echo '</div>';

}

