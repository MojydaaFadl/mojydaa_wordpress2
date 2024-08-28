<?php
if ( ! class_exists( 'Flower_Shop_Elementor_Plugin_Activation_WPElemento_Importer' ) ) {
    /**
     * Flower_Shop_Elementor_Plugin_Activation_WPElemento_Importer initial setup
     *
     * @since 1.6.2
     */

    class Flower_Shop_Elementor_Plugin_Activation_WPElemento_Importer {

        private static $flower_shop_elementor_instance;
        public $flower_shop_elementor_action_count;
        public $flower_shop_elementor_recommended_actions;

        /** Initiator **/
        public static function get_instance() {
          if ( ! isset( self::$flower_shop_elementor_instance) ) {
            self::$flower_shop_elementor_instance = new self();
          }
          return self::$flower_shop_elementor_instance;
        }

        /*  Constructor */
        public function __construct() {

            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

            // ---------- wpelementoimpoter Plugin Activation -------
            add_filter( 'flower_shop_elementor_recommended_plugins', array($this, 'flower_shop_elementor_recommended_elemento_importer_plugins_array') );

            $flower_shop_elementor_actions                   = $this->flower_shop_elementor_get_recommended_actions();
            $this->flower_shop_elementor_action_count        = $flower_shop_elementor_actions['count'];
            $this->flower_shop_elementor_recommended_actions = $flower_shop_elementor_actions['actions'];

            add_action( 'wp_ajax_create_pattern_setup_builder', array( $this, 'create_pattern_setup_builder' ) );
        }

        public function flower_shop_elementor_recommended_elemento_importer_plugins_array($flower_shop_elementor_plugins){
            $flower_shop_elementor_plugins[] = array(
                    'name'     => esc_html__('WPElemento Importer', 'flower-shop-elementor'),
                    'slug'     =>  'wpelemento-importer',
                    'function' => 'WPElemento_Importer_ThemeWhizzie',
                    'desc'     => esc_html__('We highly recommend installing the WPElemento Importer plugin for importing the demo content with Elementor.', 'flower-shop-elementor'),               
            );
            return $flower_shop_elementor_plugins;
        }

        public function enqueue_scripts() {
            wp_enqueue_script('updates');      
            wp_register_script( 'flower-shop-elementor-plugin-activation-script', esc_url(get_template_directory_uri()) . '/includes/getstart/js/plugin-activation.js', array('jquery') );
            wp_localize_script('flower-shop-elementor-plugin-activation-script', 'flower_shop_elementor_plugin_activate_plugin',
                array(
                    'installing' => esc_html__('Installing', 'flower-shop-elementor'),
                    'activating' => esc_html__('Activating', 'flower-shop-elementor'),
                    'error' => esc_html__('Error', 'flower-shop-elementor'),
                    'ajax_url' => esc_url(admin_url('admin-ajax.php')),
                    'wpelementoimpoter_admin_url' => esc_url(admin_url('admin.php?page=wpelemento-importer-tgmpa-install-plugins')),
                    'addon_admin_url' => esc_url(admin_url('admin.php?page=wpelementoimporter-wizard'))
                )
            );
            wp_enqueue_script( 'flower-shop-elementor-plugin-activation-script' );

        }

        // --------- Plugin Actions ---------
        public function flower_shop_elementor_get_recommended_actions() {

            $flower_shop_elementor_act_count  = 0;
            $flower_shop_elementor_actions_todo = get_option( 'recommending_actions', array());

            $flower_shop_elementor_plugins = $this->flower_shop_elementor_get_recommended_plugins();

            if ($flower_shop_elementor_plugins) {
                foreach ($flower_shop_elementor_plugins as $flower_shop_elementor_key => $flower_shop_elementor_plugin) {
                    $flower_shop_elementor_action = array();
                    if (!isset($flower_shop_elementor_plugin['slug'])) {
                        continue;
                    }

                    $flower_shop_elementor_action['id']   = 'install_' . $flower_shop_elementor_plugin['slug'];
                    $flower_shop_elementor_action['desc'] = '';
                    if (isset($flower_shop_elementor_plugin['desc'])) {
                        $flower_shop_elementor_action['desc'] = $flower_shop_elementor_plugin['desc'];
                    }

                    $flower_shop_elementor_action['name'] = '';
                    if (isset($flower_shop_elementor_plugin['name'])) {
                        $flower_shop_elementor_action['title'] = $flower_shop_elementor_plugin['name'];
                    }

                    $flower_shop_elementor_link_and_is_done  = $this->flower_shop_elementor_get_plugin_buttion($flower_shop_elementor_plugin['slug'], $flower_shop_elementor_plugin['name'], $flower_shop_elementor_plugin['function']);
                    $flower_shop_elementor_action['link']    = $flower_shop_elementor_link_and_is_done['button'];
                    $flower_shop_elementor_action['is_done'] = $flower_shop_elementor_link_and_is_done['done'];
                    if (!$flower_shop_elementor_action['is_done'] && (!isset($flower_shop_elementor_actions_todo[$flower_shop_elementor_action['id']]) || !$flower_shop_elementor_actions_todo[$flower_shop_elementor_action['id']])) {
                        $flower_shop_elementor_act_count++;
                    }
                    $flower_shop_elementor_recommended_actions[] = $flower_shop_elementor_action;
                    $flower_shop_elementor_actions_todo[]        = array('id' => $flower_shop_elementor_action['id'], 'watch' => true);
                }
                return array('count' => $flower_shop_elementor_act_count, 'actions' => $flower_shop_elementor_recommended_actions);
            }

        }

        public function flower_shop_elementor_get_recommended_plugins() {

            $flower_shop_elementor_plugins = apply_filters('flower_shop_elementor_recommended_plugins', array());
            return $flower_shop_elementor_plugins;
        }

        public function flower_shop_elementor_get_plugin_buttion($slug, $name, $function) {
                $flower_shop_elementor_is_done      = false;
                $flower_shop_elementor_button_html  = '';
                $flower_shop_elementor_is_installed = $this->is_plugin_installed($slug);
                $flower_shop_elementor_plugin_path  = $this->get_plugin_basename_from_slug($slug);
                $flower_shop_elementor_is_activeted = (class_exists($function)) ? true : false;
                if (!$flower_shop_elementor_is_installed) {
                    $flower_shop_elementor_plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $slug,
                        ),
                        self_admin_url('update.php')
                    );
                    $flower_shop_elementor_plugin_install_url = wp_nonce_url($flower_shop_elementor_plugin_install_url, 'install-plugin_' . esc_attr($slug));
                    $flower_shop_elementor_button_html        = sprintf('<a class="flower-shop-elementor-plugin-install install-now button-secondary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($flower_shop_elementor_plugin_install_url),
                        sprintf(esc_html__('Install %s Now', 'flower-shop-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Install & Activate', 'flower-shop-elementor')
                    );
                } elseif ($flower_shop_elementor_is_installed && !$flower_shop_elementor_is_activeted) {

                    $flower_shop_elementor_plugin_activate_link = add_query_arg(
                        array(
                            'action'        => 'activate',
                            'plugin'        => rawurlencode($flower_shop_elementor_plugin_path),
                            'plugin_status' => 'all',
                            'paged'         => '1',
                            '_wpnonce'      => wp_create_nonce('activate-plugin_' . $flower_shop_elementor_plugin_path),
                        ), self_admin_url('plugins.php')
                    );

                    $flower_shop_elementor_button_html = sprintf('<a class="flower-shop-elementor-plugin-activate activate-now button-primary button" data-slug="%1$s" href="%2$s" aria-label="%3$s" data-name="%4$s">%5$s</a>',
                        esc_attr($slug),
                        esc_url($flower_shop_elementor_plugin_activate_link),
                        sprintf(esc_html__('Activate %s Now', 'flower-shop-elementor'), esc_html($name)),
                        esc_html($name),
                        esc_html__('Activate', 'flower-shop-elementor')
                    );
                } elseif ($flower_shop_elementor_is_activeted) {
                    $flower_shop_elementor_button_html = sprintf('<div class="action-link button disabled"><span class="dashicons dashicons-yes"></span> %s</div>', esc_html__('Active', 'flower-shop-elementor'));
                    $flower_shop_elementor_is_done     = true;
                }

                return array('done' => $flower_shop_elementor_is_done, 'button' => $flower_shop_elementor_button_html);
            }
        public function is_plugin_installed($slug) {
            $flower_shop_elementor_installed_plugins = $this->get_installed_plugins(); // Retrieve a list of all installed plugins (WP cached).
            $flower_shop_elementor_file_path         = $this->get_plugin_basename_from_slug($slug);
            return (!empty($flower_shop_elementor_installed_plugins[$flower_shop_elementor_file_path]));
        }
        public function get_plugin_basename_from_slug($slug) {
            $flower_shop_elementor_keys = array_keys($this->get_installed_plugins());
            foreach ($flower_shop_elementor_keys as $flower_shop_elementor_key) {
                if (preg_match('|^' . $slug . '/|', $flower_shop_elementor_key)) {
                    return $flower_shop_elementor_key;
                }
            }
            return $slug;
        }

        public function get_installed_plugins() {

            if (!function_exists('get_plugins')) {
                require_once ABSPATH . 'wp-admin/includes/plugin.php';
            }

            return get_plugins();
        }
        public function create_pattern_setup_builder() {

            $edit_page = admin_url().'post-new.php?post_type=page&create_pattern=true';
            echo json_encode(['page_id'=>'','edit_page_url'=> $edit_page ]);

            exit;
        }

    }
}
/**
 * Kicking this off by calling 'get_instance()' method
 */
Flower_Shop_Elementor_Plugin_Activation_WPElemento_Importer::get_instance();