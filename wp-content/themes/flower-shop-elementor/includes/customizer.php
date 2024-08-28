<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));


	Kirki::add_field( 'theme_config_id', [
		'label'       => esc_html__( 'Logo Size','flower-shop-elementor' ),
		'section'     => 'title_tagline',
		'priority'    => 9,
		'type'        => 'range',
		'settings'    => 'logo_size',
		'choices' => [
			'step'             => 5,
			'min'              => 0,
			'max'              => 100,
			'aria-valuemin'    => 0,
			'aria-valuemax'    => 100,
			'aria-valuenow'    => 50,
			'aria-orientation' => 'horizontal',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'flower-shop-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'flower-shop-elementor' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_logo_settings_premium_features',
		'section'     => 'title_tagline',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Unlock More Features in the Premium Version!', 'flower-shop-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customizable Text Logo', 'flower-shop-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Enhanced Typography Options', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Priority Support', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'flower-shop-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/flowers-wordpress-theme', 'flower-shop-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'flower-shop-elementor' ) .'</a></div>',
	) );

	// TYPOGRAPHY SETTINGS
	Kirki::add_panel( 'flower_shop_elementor_typography_panel', array(
		'priority' => 10,
		'title'    => __( 'Typography', 'flower-shop-elementor' ),
	) );

	//Heading 1 Section

	Kirki::add_section( 'flower_shop_elementor_h1_typography_setting', array(
		'title'    => __( 'Heading 1', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h1_typography_heading',
		'section'     => 'flower_shop_elementor_h1_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 1 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h1_typography_font',
		'section'   =>  'flower_shop_elementor_h1_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h1',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 2 Section

	Kirki::add_section( 'flower_shop_elementor_h2_typography_setting', array(
		'title'    => __( 'Heading 2', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h2_typography_heading',
		'section'     => 'flower_shop_elementor_h2_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 2 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h2_typography_font',
		'section'   =>  'flower_shop_elementor_h2_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'font-size'       => '',
			'variant'       =>  '700',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h2',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 3 Section

	Kirki::add_section( 'flower_shop_elementor_h3_typography_setting', array(
		'title'    => __( 'Heading 3', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h3_typography_heading',
		'section'     => 'flower_shop_elementor_h3_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 3 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h3_typography_font',
		'section'   =>  'flower_shop_elementor_h3_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h3',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 4 Section

	Kirki::add_section( 'flower_shop_elementor_h4_typography_setting', array(
		'title'    => __( 'Heading 4', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h4_typography_heading',
		'section'     => 'flower_shop_elementor_h4_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 4 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h4_typography_font',
		'section'   =>  'flower_shop_elementor_h4_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h4',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 5 Section

	Kirki::add_section( 'flower_shop_elementor_h5_typography_setting', array(
		'title'    => __( 'Heading 5', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h5_typography_heading',
		'section'     => 'flower_shop_elementor_h5_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 5 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h5_typography_font',
		'section'   =>  'flower_shop_elementor_h5_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h5',
				'suffix' => '!important'
			],
		],
	) );

	//Heading 6 Section

	Kirki::add_section( 'flower_shop_elementor_h6_typography_setting', array(
		'title'    => __( 'Heading 6', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_h6_typography_heading',
		'section'     => 'flower_shop_elementor_h6_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading 6 Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_h6_typography_font',
		'section'   =>  'flower_shop_elementor_h6_typography_setting',
		'default'   =>  [
			'font-family'   =>  '"Playfair Display", serif',
			'variant'       =>  '700',
			'font-size'       => '',
			'line-height'   =>  '',
			'letter-spacing'    =>  '',
			'text-transform'    =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   =>  'h6',
				'suffix' => '!important'
			],
		],
	) );

	//body Typography

	Kirki::add_section( 'flower_shop_elementor_body_typography_setting', array(
		'title'    => __( 'Content Typography', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_typography_panel',
		'priority' => 0,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_body_typography_heading',
		'section'     => 'flower_shop_elementor_body_typography_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content  Typography', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'  =>  'typography',
		'settings'  => 'flower_shop_elementor_body_typography_font',
		'section'   =>  'flower_shop_elementor_body_typography_setting',
		'default'   =>  [
			'font-family'   =>  'Montserrat',
			'variant'       =>  '',
		],
		'transport'     =>  'auto',
		'output'        =>  [
			[
				'element'   => 'body',
				'suffix' => '!important'
			],
		],
	) );

	// Theme Options Panel
	Kirki::add_panel( 'flower_shop_elementor_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'flower-shop-elementor' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'flower_shop_elementor_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'flower-shop-elementor' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'flower-shop-elementor' ),
	    'panel'    => 'flower_shop_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_sticky_header',
		'label'       => esc_html__( 'Enable/Disable Sticky Header', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_section_header',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );
	
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_cart_button',
		'label'       => esc_html__( 'Enable/Disable Cart Button', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_account_button',
		'label'       => esc_html__( 'Enable/Disable My Account', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_section_header',
		'default'     => 'on',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'tab'      => 'header',
		'settings'    => 'flower_shop_elementor_logo_settings_premium_features_header',
		'section'     => 'flower_shop_elementor_section_header',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Enhance your header design now!', 'flower-shop-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Customize your header background color', 'flower-shop-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Adjust icon and text font sizes', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Explore enhanced typography options', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'flower-shop-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/flowers-wordpress-theme', 'flower-shop-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'flower-shop-elementor' ) .'</a></div>',
	) );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'flower_shop_elementor_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'flower-shop-elementor' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'flower-shop-elementor' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'flower_shop_elementor_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => 'false',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_shop_page_layout',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'flower-shop-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'flower-shop-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'flower_shop_elementor_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_products_per_row',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => '4',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_products_per_page',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'flower_shop_elementor_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_single_product_sidebar_layout',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'flower-shop-elementor' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'flower-shop-elementor' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'flower_shop_elementor_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_products_button_border_radius_heading',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'flower_shop_elementor_products_button_border_radius',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_sale_badge_position_heading',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'flower_shop_elementor_sale_badge_position',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'flower-shop-elementor' ),
			'left' => esc_html__( 'Left', 'flower-shop-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_products_sale_font_size_heading',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'flower_shop_elementor_products_sale_font_size',
		'section'     => 'flower_shop_elementor_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'flower_shop_elementor_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'flower-shop-elementor' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_theme_options_panel',
		'priority'       => 10,
		'tabs'  => [
			'general' => [
				'label' => esc_html__( 'General', 'flower-shop-elementor' ),
			],
			'header-image'  => [
				'label' => esc_html__( 'Header Image', 'flower-shop-elementor' ),
			],
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'flower_shop_elementor_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'flower_shop_elementor_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '0',
		'priority'    => 10,
		'tab'      => 'general',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'general',
		'settings'    => 'flower_shop_elementor_single_page_layout_heading',
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'general',
		'settings'    => 'flower_shop_elementor_single_page_layout',
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'flower-shop-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'flower-shop-elementor' ),
			'One Column' => esc_html__( 'One Column', 'flower-shop-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'flower_shop_elementor_header_background_attachment_heading',
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'header-image',
		'settings'    => 'flower_shop_elementor_header_background_attachment',
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'flower-shop-elementor' ),
			'fixed' => esc_html__( 'Fixed', 'flower-shop-elementor' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'header-image',
		'settings'    => 'flower_shop_elementor_header_overlay_heading',
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_header_overlay_setting',
		'tab'      => 'header-image',
		'label'       => __( 'Overlay Color', 'flower-shop-elementor' ),
		'type'        => 'color',
		'section'     => 'flower_shop_elementor_additional_setting',
		'transport' => 'auto',
		'default'     => '#00000061',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.header-image-box:before',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'flower_shop_elementor_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'header-image',
		'settings'    => 'flower_shop_elementor_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'flower_shop_elementor_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'flower-shop-elementor' ),
		'description'    => esc_html__( 'Here you can add post information.', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_theme_options_panel',
		'tabs'  => [
			'blog-post' => [
				'label' => esc_html__( 'Blog Post', 'flower-shop-elementor' ),
			],
			'single-post'  => [
				'label' => esc_html__( 'Single Post', 'flower-shop-elementor' ),
			],
		],
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_post_layout_heading',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_post_layout',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'flower-shop-elementor' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'flower-shop-elementor' ),
			'One Column' => esc_html__( 'One Column', 'flower-shop-elementor' ),
			'Three Columns' => esc_html__( 'Three Columns', 'flower-shop-elementor' ),
			'Four Columns' => esc_html__( 'Four Columns', 'flower-shop-elementor' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_length_setting_heading',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'tab'      => 'blog-post',
		'settings'    => 'flower_shop_elementor_length_setting',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'flower_shop_elementor_single_post_date_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Date', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'flower_shop_elementor_single_post_author_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Author', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'flower_shop_elementor_single_post_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Single Post Comment', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_single_post_tag',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'flower-shop-elementor' ),
		'settings'    => 'flower_shop_elementor_single_post_category',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'tab'      => 'single-post',
		'settings'    => 'flower_shop_elementor_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'tab'      => 'single-post',
		'settings'    => 'flower_shop_elementor_single_post_radius',
		'section'     => 'flower_shop_elementor_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'flower-shop-elementor' ),
		'type'        => 'text',
		'tab'      => 'single-post',
		'section'     => 'flower_shop_elementor_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// No Results Page Settings

	Kirki::add_section( 'flower_shop_elementor_no_result_section', array(
		'title'          => esc_html__( '404 & No Results Page Settings', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_page_not_found_title_heading',
		'section'     => 'flower_shop_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Title', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'flower_shop_elementor_page_not_found_title',
		'section'  => 'flower_shop_elementor_no_result_section',
		'default'  => esc_html__('404 Error!', 'flower-shop-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_page_not_found_text_heading',
		'section'     => 'flower_shop_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Page Text', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'flower_shop_elementor_page_not_found_text',
		'section'  => 'flower_shop_elementor_no_result_section',
		'default'  => esc_html__('The page you are looking for may have been moved, deleted, or possibly never existed.', 'flower-shop-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'     => 'custom',
		'settings' => 'flower_shop_elementor_page_not_found_line_break',
		'section'  => 'flower_shop_elementor_no_result_section',
		'default'  => '<hr>',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_no_results_title_heading',
		'section'     => 'flower_shop_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Title', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'flower_shop_elementor_no_results_title',
		'section'  => 'flower_shop_elementor_no_result_section',
		'default'  => esc_html__('Nothing Found', 'flower-shop-elementor'),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_no_results_content_heading',
		'section'     => 'flower_shop_elementor_no_result_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Results Content', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'flower_shop_elementor_no_results_content',
		'section'  => 'flower_shop_elementor_no_result_section',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'flower-shop-elementor'),
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'flower_shop_elementor_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'flower-shop-elementor' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'flower-shop-elementor' ),
        'panel'    => 'flower_shop_elementor_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_text_heading',
		'section'     => 'flower_shop_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'flower_shop_elementor_footer_text',
		'section'  => 'flower_shop_elementor_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_enable_heading',
		'section'     => 'flower_shop_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'flower_shop_elementor_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'flower-shop-elementor' ),
			'off' => esc_html__( 'Disable', 'flower-shop-elementor' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_background_widget_heading',
		'section'     => 'flower_shop_elementor_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'flower_shop_elementor_footer_background_widget',
		'type'        => 'background',
		'section'     => 'flower_shop_elementor_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_copright_color_heading',
		'section'     => 'flower_shop_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Background Color', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_footer_copright_color',
		'type'        => 'color',
		'label'       => __( 'Background Color', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#121212',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => '.footer-copyright',
				'property' => 'background',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_copright_text_color_heading',
		'section'     => 'flower_shop_elementor_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Copyright Text Color', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_footer_copright_text_color',
		'type'        => 'color',
		'label'       => __( 'Text Color', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_footer_section',
		'transport' => 'auto',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => array( '.footer-copyright a', '.footer-copyright p'),
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_logo_settings_premium_features_footer',
		'section'     => 'flower_shop_elementor_footer_section',
		'priority'    => 50,
		'default'     => '<h3 style="color: #2271b1; padding:5px 20px 5px 20px; background:#fff; margin:0;  box-shadow: 0 2px 4px rgba(0,0,0, .2); ">' . esc_html__( 'Elevate your footer with premium features:', 'flower-shop-elementor' ) . '</h3><ul style="color: #121212; padding: 5px 20px 20px 30px; background:#fff; margin:0;" ><li style="list-style-type: square;" >' . esc_html__( 'Tailor your footer layout', 'flower-shop-elementor' ) . '</li><li style="list-style-type: square;" >'.esc_html__( 'Integrate an email subscription form', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( 'Personalize social media icons', 'flower-shop-elementor' ) .'</li><li style="list-style-type: square;" >'.esc_html__( '....and Much More', 'flower-shop-elementor' ) . '</li></ul><div style="background: #fff; padding: 0px 10px 10px 20px;"><a href="' . esc_url( __( 'https://www.wpelemento.com/products/flowers-wordpress-theme', 'flower-shop-elementor' ) ) . '" class="button button-primary" target="_blank">'. esc_html__( 'Upgrade for more', 'flower-shop-elementor' ) .'</a></div>',
	) );

	// Footer Social Icons Section

	Kirki::add_section( 'flower_shop_elementor_footer_social_media_section', array(
		'title'          => esc_html__( 'Footer Social Icons', 'flower-shop-elementor' ),
		'panel'    => 'flower_shop_elementor_theme_options_panel',
		'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_footer_social_icon_hide_heading',
		'section'     => 'flower_shop_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable or Disable your Footer Social Icon', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'flower_shop_elementor_footer_social_icon_hide',
		'label'       => esc_html__( 'Enable or Disable Social Icon.', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_footer_social_media_section',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'flower_shop_elementor_enable_footer_socail_link_align_heading',
		'section'     => 'flower_shop_elementor_footer_social_media_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Text Align', 'flower-shop-elementor' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'flower_shop_elementor_enable_footer_socail_link_align',
		'type'        => 'select',
		'priority'    => 10,
		'label'       => __( 'Text Align', 'flower-shop-elementor' ),
		'section'     => 'flower_shop_elementor_footer_social_media_section',
		'default'     => 'left',
		'choices'     => [
			'center' => esc_html__( 'center', 'flower-shop-elementor' ),
			'right' => esc_html__( 'right', 'flower-shop-elementor' ),
			'left' => esc_html__( 'left', 'flower-shop-elementor' ),
		],
		'output' => array(
			array(
				'element'  => array( '.footer-links'),
				'property' => 'text-align',
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'priority'    => 10,
		'settings'    => 'flower_shop_elementor_enable_footer_socail_link',
		'section'     => 'flower_shop_elementor_footer_social_media_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Social Media Link', 'flower-shop-elementor' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'priority'    => 10,
		'section'     => 'flower_shop_elementor_footer_social_media_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icons', 'flower-shop-elementor' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'flower-shop-elementor' ),
		'settings'     => 'flower_shop_elementor_social_links_settings_footer',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'flower-shop-elementor' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'flower-shop-elementor' ). ' <a href="https://fontawesome.com/search?o=r&m=free&f=brands" target="_blank"><strong>' . esc_html__( 'View All', 'flower-shop-elementor' ) . ' </strong></a>',
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'flower-shop-elementor' ),
				'description' => esc_html__( 'Add the social icon url here.', 'flower-shop-elementor' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	load_template( trailingslashit( get_template_directory() ) . '/includes/logo/logo-resizer.php' );
}
