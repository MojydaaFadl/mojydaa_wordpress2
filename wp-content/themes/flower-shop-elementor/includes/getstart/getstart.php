<?php
//about theme info
add_action( 'admin_menu', 'flower_shop_elementor_gettingstarted' );
function flower_shop_elementor_gettingstarted() {
	add_theme_page( esc_html__('Flower Shop Elementor', 'flower-shop-elementor'), esc_html__('Flower Shop Elementor', 'flower-shop-elementor'), 'edit_theme_options', 'flower_shop_elementor_about', 'flower_shop_elementor_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function flower_shop_elementor_admin_theme_style() {
	wp_enqueue_style('flower-shop-elementor-custom-admin-style', esc_url(get_template_directory_uri()) . '/includes/getstart/getstart.css');
	wp_enqueue_script('flower-shop-elementor-tabs', esc_url(get_template_directory_uri()) . '/includes/getstart/js/tab.js');
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
}
add_action('admin_enqueue_scripts', 'flower_shop_elementor_admin_theme_style');

// Changelog
if ( ! defined( 'FLOWER_SHOP_ELEMENTOR_CHANGELOG_URL' ) ) {
    define( 'FLOWER_SHOP_ELEMENTOR_CHANGELOG_URL', get_template_directory() . '/readme.txt' );
}

function flower_shop_elementor_changelog_screen() {	
	global $wp_filesystem;
	$flower_shop_elementor_changelog_file = apply_filters( 'flower_shop_elementor_changelog_file', FLOWER_SHOP_ELEMENTOR_CHANGELOG_URL );
	if ( $flower_shop_elementor_changelog_file && is_readable( $flower_shop_elementor_changelog_file ) ) {
		WP_Filesystem();
		$flower_shop_elementor_changelog = $wp_filesystem->get_contents( $flower_shop_elementor_changelog_file );
		$flower_shop_elementor_changelog_list = flower_shop_elementor_parse_changelog( $flower_shop_elementor_changelog );
		echo wp_kses_post( $flower_shop_elementor_changelog_list );
	}
}

function flower_shop_elementor_parse_changelog( $flower_shop_elementor_content ) {
	$flower_shop_elementor_content = explode ( '== ', $flower_shop_elementor_content );
	$flower_shop_elementor_changelog_isolated = '';
	foreach ( $flower_shop_elementor_content as $key => $flower_shop_elementor_value ) {
		if (strpos( $flower_shop_elementor_value, 'Changelog ==') === 0) {
	    	$flower_shop_elementor_changelog_isolated = str_replace( 'Changelog ==', '', $flower_shop_elementor_value );
	    }
	}
	$flower_shop_elementor_changelog_array = explode( '= ', $flower_shop_elementor_changelog_isolated );
	unset( $flower_shop_elementor_changelog_array[0] );
	$flower_shop_elementor_changelog = '<div class="changelog">';
	foreach ( $flower_shop_elementor_changelog_array as $flower_shop_elementor_value) {
		$flower_shop_elementor_value = preg_replace( '/\n+/', '</span><span>', $flower_shop_elementor_value );
		$flower_shop_elementor_value = '<div class="block"><span class="heading">= ' . $flower_shop_elementor_value . '</span></div><hr>';
		$flower_shop_elementor_changelog .= str_replace( '<span></span>', '', $flower_shop_elementor_value );
	}
	$flower_shop_elementor_changelog .= '</div>';
	return wp_kses_post( $flower_shop_elementor_changelog );
}

//guidline for about theme
function flower_shop_elementor_mostrar_guide() { 
	//custom function about theme customizer
	$flower_shop_elementor_return = add_query_arg( array()) ;
	$flower_shop_elementor_theme = wp_get_theme( 'flower-shop-elementor' );
?>

    <div class="top-head">
		<div class="top-title">
			<h2><?php esc_html_e( 'Flower Shop Elementor', 'flower-shop-elementor' ); ?></h2>
		</div>
		<div class="top-right">
			<span class="version"><?php esc_html_e( 'Version', 'flower-shop-elementor' ); ?>: <?php echo esc_html($flower_shop_elementor_theme['Version']);?></span>
		</div>
    </div>

    <div class="inner-cont">

	    <div class="tab-sec">
	    	<div class="tab">
				<button class="tablinks" onclick="flower_shop_elementor_open_tab(event, 'wpelemento_importer_editor')"><?php esc_html_e( 'Setup With Elementor', 'flower-shop-elementor' ); ?></button>
				<button class="tablinks" onclick="flower_shop_elementor_open_tab(event, 'setup_customizer')"><?php esc_html_e( 'Setup With Customizer', 'flower-shop-elementor' ); ?></button>
				<button class="tablinks" onclick="flower_shop_elementor_open_tab(event, 'changelog_cont')"><?php esc_html_e( 'Changelog', 'flower-shop-elementor' ); ?></button>
			</div>

			<div id="wpelemento_importer_editor" class="tabcontent open">
				<?php if(!class_exists('WPElemento_Importer_ThemeWhizzie')){
					$flower_shop_elementor_plugin_ins = Flower_Shop_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();
					$flower_shop_elementor_actions = $flower_shop_elementor_plugin_ins->flower_shop_elementor_recommended_actions;
					?>
					<div class="flower-shop-elementor-recommended-plugins ">
							<div class="flower-shop-elementor-action-list">
								<?php if ($flower_shop_elementor_actions): foreach ($flower_shop_elementor_actions as $flower_shop_elementor_key => $flower_shop_elementor_actionValue): ?>
										<div class="flower-shop-elementor-action" id="<?php echo esc_attr($flower_shop_elementor_actionValue['id']);?>">
											<div class="action-inner plugin-activation-redirect">
												<h3 class="action-title"><?php echo esc_html($flower_shop_elementor_actionValue['title']); ?></h3>
												<div class="action-desc"><?php echo esc_html($flower_shop_elementor_actionValue['desc']); ?></div>
												<?php echo wp_kses_post($flower_shop_elementor_actionValue['link']); ?>
											</div>
										</div>
									<?php endforeach;
								endif; ?>
							</div>
					</div>
				<?php }else{ ?>
					<div class="tab-outer-box">
						<h3><?php esc_html_e('Welcome to WPElemento Theme!', 'flower-shop-elementor'); ?></h3>
						<p><?php esc_html_e('Click on the quick start button to import the demo.', 'flower-shop-elementor'); ?></p>
						<div class="info-link">
							<a  href="<?php echo esc_url( admin_url('admin.php?page=wpelementoimporter-wizard') ); ?>"><?php esc_html_e('Quick Start', 'flower-shop-elementor'); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div id="setup_customizer" class="tabcontent">
				<div class="tab-outer-box">
				  	<div class="lite-theme-inner">
						<h3><?php esc_html_e('Theme Customizer', 'flower-shop-elementor'); ?></h3>
						<p><?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'flower-shop-elementor'); ?></p>
						<div class="info-link">
							<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'flower-shop-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Help Docs', 'flower-shop-elementor'); ?></h3>
						<p><?php esc_html_e('The complete procedure to configure and manage a WordPress Website from the beginning is shown in this documentation .', 'flower-shop-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'flower-shop-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Need Support?', 'flower-shop-elementor'); ?></h3>
						<p><?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'flower-shop-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'flower-shop-elementor'); ?></a>
						</div>
						<hr>
						<h3><?php esc_html_e('Reviews & Testimonials', 'flower-shop-elementor'); ?></h3>
						<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'flower-shop-elementor'); ?></p>
						<div class="info-link">
							<a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'flower-shop-elementor'); ?></a>
						</div>
						<hr>
						<div class="link-customizer">
							<h3><?php esc_html_e( 'Link to customizer', 'flower-shop-elementor' ); ?></h3>
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','flower-shop-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','flower-shop-elementor'); ?></a>
									</div>
								</div>
							
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=header_image') ); ?>" target="_blank"><?php esc_html_e('Header Image','flower-shop-elementor'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','flower-shop-elementor'); ?></a>
									</div>
								</div>
							</div>
						</div>
				  	</div>
				</div>
			</div>

			<div id="changelog_cont" class="tabcontent">
				<div class="tab-outer-box">
					<?php flower_shop_elementor_changelog_screen(); ?>
				</div>
			</div>
			
		</div>

		<div class="inner-side-content">
			<h2><?php esc_html_e('Premium Theme', 'flower-shop-elementor'); ?></h2>
			<div class="tab-outer-box">
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png" alt="" />
				<h3><?php esc_html_e('Flower Shop Elementor WordPress Theme', 'flower-shop-elementor'); ?></h3>
				<div class="iner-sidebar-pro-btn">
					<span class="premium-btn"><a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Premium', 'flower-shop-elementor'); ?></a>
					</span>
					<span class="demo-btn"><a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'flower-shop-elementor'); ?></a>
					</span>
					<span class="doc-btn"><a href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e('Theme Bundle', 'flower-shop-elementor'); ?></a>
					</span>
				</div>
				<hr>
				<div class="premium-coupon">
					<div class="premium-features">
						<h3><?php esc_html_e('premium Features', 'flower-shop-elementor'); ?></h3>
						<ul>
							<li><?php esc_html_e( 'Multilingual', 'flower-shop-elementor' ); ?></li>
							<li><?php esc_html_e( 'Drag and drop features', 'flower-shop-elementor' ); ?></li>
							<li><?php esc_html_e( 'Zero Coding Required', 'flower-shop-elementor' ); ?></li>
							<li><?php esc_html_e( 'Mobile Friendly Layout', 'flower-shop-elementor' ); ?></li>
							<li><?php esc_html_e( 'Responsive Layout', 'flower-shop-elementor' ); ?></li>
							<li><?php esc_html_e( 'Unique Designs', 'flower-shop-elementor' ); ?></li>
						</ul>
					</div>
					<div class="coupon-box">
						<h3><?php esc_html_e('Use Coupon Code', 'flower-shop-elementor'); ?></h3>
						<a class="coupon-btn" href="<?php echo esc_url( FLOWER_SHOP_ELEMENTOR_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('UPGRADE NOW', 'flower-shop-elementor'); ?></a>
						<div class="coupon-container">
							<h3><?php esc_html_e( 'elemento20', 'flower-shop-elementor' ); ?></h3>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>

<?php } ?>