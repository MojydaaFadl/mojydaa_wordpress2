<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       flawlessthemes.com
 * @since      1.0.0
 *
 * @package    Flawless_Demo_Importer
 * @subpackage Flawless_Demo_Importer/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Flawless_Demo_Importer
 * @subpackage Flawless_Demo_Importer/includes
 * @author     Flawless Themes <info@flawlessthemes.com>
 */
class Flawless_Demo_Importer {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Flawless_Demo_Importer_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'FLAWLESS_DEMO_IMPORTER_VERSION' ) ) {
			$this->version = FLAWLESS_DEMO_IMPORTER_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'flawless-demo-importer';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Flawless_Demo_Importer_Loader. Orchestrates the hooks of the plugin.
	 * - Flawless_Demo_Importer_i18n. Defines internationalization functionality.
	 * - Flawless_Demo_Importer_Admin. Defines all hooks for the admin area.
	 * - Flawless_Demo_Importer_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flawless-demo-importer-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-flawless-demo-importer-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-flawless-demo-importer-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-flawless-demo-importer-public.php';

		$this->loader = new Flawless_Demo_Importer_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Flawless_Demo_Importer_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Flawless_Demo_Importer_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Flawless_Demo_Importer_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Flawless_Demo_Importer_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Flawless_Demo_Importer_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}




if (!function_exists('flawlessthemes_importer_import_files')) {

    function flawlessthemes_importer_import_files()
    {
	function ocdi_plugin_intro_text( $default_text ) {
	    $default_text .= '<div class="ocdi__intro-text"><h2>Flawless Themes One Click Demo Import<h2></div>';

	    return $default_text;
	}
	add_filter( 'pt-ocdi/plugin_intro_text', 'ocdi_plugin_intro_text' );
        return array(
			array(
                'import_file_name' => esc_html__('Job Stack Theme', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/jobstack/jobstack.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/jobstack/jobstack.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/jobstack/jobstack.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/jobstack.png',
                'import_notice' => esc_html__('Make Sure you are using the Job Stack Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/jobstack/'),
            ),
            array(
                'import_file_name' => esc_html__('Music Artist/ Music Guru', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/music-artist-free/music-artist-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/music-artist-free/music-artist-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/music-artist-free/music-artist-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/music-artist-free.png',
                'import_notice' => esc_html__('Make Sure you are using the Music Artist / Music Guru Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/music-artist-free/'),
			),
			array(
                'import_file_name' => esc_html__('Espy Jobs Theme', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/espyjobs/espyjobs.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/espyjobs/espyjobs.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/espyjobs/espyjobs.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/espyjobs.png',
                'import_notice' => esc_html__('Make Sure you are using the Espy Jobs Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/espyjobsfree'),
            ),
			array(
                'import_file_name' => esc_html__('Podcast Guru', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/podcast/podcast.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/podcast/podcast.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/podcast/podcast.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/podcast.png',
                'import_notice' => esc_html__('Make Sure you are using the Podcast Guru Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/podcast-guru-free'),
            ),
			array(
                'import_file_name' => esc_html__('Lawyer Firm', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lawyer/lawyer.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lawyer/lawyer.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lawyer/lawyer.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/lawyer.png',
                'import_notice' => esc_html__('Make Sure you are using the Lawyer Firm Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/lawyerfirm/'),
            ),
			array(
                'import_file_name' => esc_html__('Flawless Recipe', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/flawlessrecipe/flawlessrecipe.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/flawlessrecipe/flawlessrecipe.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/flawlessrecipe/flawlessrecipe.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/flawlessrecipe.png',
                'import_notice' => esc_html__('Make Sure you are using the Flawless Recipe Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/flawlessrecipe'),
            ),
			array(
                'import_file_name' => esc_html__('Coursemax', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/coursemax/coursemax.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/coursemax/coursemax.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/coursemax/coursemax.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/coursemax.png',
                'import_notice' => esc_html__('Make Sure you are using the Coursemax Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/coursemax/'),
            ),
			array(
                'import_file_name' => esc_html__('Prato Store', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/prato-store/prato-store.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/prato-store/prato-store.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/prato-store/prato-store.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/prato-store.png',
                'import_notice' => esc_html__('Make Sure you are using the Prato Store Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/pratostore/'),
            ),
			array(
                'import_file_name' => esc_html__('Ekta Directory', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ekta/ekta.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ekta/ekta.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ekta/ekta.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/ekta.png',
                'import_notice' => esc_html__('Make Sure you are using the Ekta Directory Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.ektadirectory.com/ekta-directory-free/'),
            ),
        	array(
                'import_file_name' => esc_html__('FT Charity NGO', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-charity-ngo-free/charity-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-charity-ngo-free/charity-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-charity-ngo-free/charity-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/charity-free.png',
                'import_notice' => esc_html__('Make Sure you are using the FT Charity NGO Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/ft-charity-ngo-free'),
            ),
			array(
                'import_file_name' => esc_html__('Awe Blog', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/awe-blog-free/awe-blog-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/awe-blog-free/awe-blog-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/awe-blog-free/awe-blog-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/awe-blog-free.png',
                'import_notice' => esc_html__('Make Sure you are using the Awe Blog Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/awe-blog-free'),
            ),
            array(
                'import_file_name' => esc_html__('Hotel Vivanta', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/vivanta-free/vivanta-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/vivanta-free/vivanta-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/vivanta-free/vivanta-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/hotel-vivanta-free.jpg',
                'import_notice' => esc_html__('Make Sure you are using the Hotel Vivanta Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/vivanta-free/'),
            ),
            array(
                'import_file_name' => esc_html__('LMS Academic', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lms-free/lms-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lms-free/lms-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/lms-free/lms-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/lms-academic-free.png',
                'import_notice' => esc_html__('Make Sure you are using the LMS Academic Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/lms-academic-free'),
            ),
            array(
                'import_file_name' => esc_html__('FT Directory Listing', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-directory-free/ft-directory-free.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-directory-free/ft-directory-free.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/ft-directory-free/ft-directory-free.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/ft-directory-free.png',
                'import_notice' => esc_html__('Make Sure you are using the FT Directory Listing Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/ft-directory-listing/'),
            ),
            array(
                'import_file_name' => esc_html__('Hotel Inn', 'flawless-demo-importer'),
                'import_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/inn-free/inn.xml',
                'import_widget_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/inn-free/inn.wie',
                'import_customizer_file_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/demo/inn-free/inn.dat',
                'import_preview_image_url' => trailingslashit( plugin_dir_url( dirname( __FILE__ ) ) ) . 'public/img/hotel-inn.png',
                'import_notice' => esc_html__('Make Sure you are using the Hotel Inn Theme (Free Version)', 'flawless-demo-importer'),
                'preview_url' => ('https://demo.flawlessthemes.com/hotelinn-free/'),
            )
        );
    }
}
if (in_array('one-click-demo-import/one-click-demo-import.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    add_filter('pt-ocdi/import_files', 'flawlessthemes_importer_import_files');
    add_action( 'pt-ocdi/after_import', 'flawlessthemes_importer_after_import_setup' );
}
else{
	function sample_admin_notice__error() {
	    $class = 'notice notice-error';
	    $message = __( 'You have not installed or activated the One Click Demo Import Plugin', 'flawless-demo-importer' );
	 
	    printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) ); 
	}
	add_action( 'admin_notices', 'sample_admin_notice__error' );
}



function flawlessthemes_importer_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Primary', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
        )
    );
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
