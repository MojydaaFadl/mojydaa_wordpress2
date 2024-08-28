<?php
	
require get_template_directory() . '/includes/tgm/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function flower_shop_elementor_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'flower-shop-elementor' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WPElemento Importer', 'flower-shop-elementor' ),
			'slug'             => 'wpelemento-importer',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'flower-shop-elementor' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'ShopLentor – WooCommerce Builder ', 'flower-shop-elementor' ),
			'slug'             => 'woolentor-addons',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	flower_shop_elementor_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'flower_shop_elementor_register_recommended_plugins' );
