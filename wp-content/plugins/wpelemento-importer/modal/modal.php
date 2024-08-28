<?php
add_action( 'elementor/editor/after_enqueue_scripts', 'wp_elemento_templates_enqueue_scripts' );
function wp_elemento_templates_enqueue_scripts() {
    wp_register_script(
        'elemento-modal-templates-script', 
        EDI_URL . 'assets/js/modal-script.js', 
        array('jquery'), 
        time()
    );

    wp_localize_script('elemento-modal-templates-script', 'modal_templates_script',[
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    ]);

    wp_enqueue_script('elemento-modal-templates-script');

    if ( did_action('elementor/loaded') ) {
        if (isset($_GET['elementor-preview']) || \Elementor\Plugin::$instance->editor->is_edit_mode()) {
            wp_enqueue_style('wpel-elementor-editor-styles', EDI_URL . 'assets/css/wpel-elementor-editor-styles.css', array(), time());
        }
    }
}

function get_collections() {
    $remote_post_data = array(
        'body' => array()
    );

    $response = wp_remote_post( WPEI_SHOPIFY_LICENCE_ENDPOINT . 'getCollections', $remote_post_data);

    if (is_wp_error($response)) {
        
        $error_message = $response->get_error_message();
        wp_send_json_error(
            array(
                'collections' => [],
                'code'  => 100,
                'msg' => "Something went wrong!"
            )
        );
        
    } else {

        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        $collections = array();
        if (isset($response_body->data) && isset($response_body->data)) {
            $collections = $response_body->data;
        }

        wp_send_json_success(
            array(
                'collections' => $collections,
                'code'  => 200,
                'msg'   => 'Collections Fetched'
            )
        );
    }
}

add_action('wp_ajax_get_collections','get_collections');
add_action('wp_ajax_nopriv_get_collections','get_collections');

function get_filtered_products() {

    $handle = isset($_POST['handle']) ? $_POST['handle'] : '';
    $collectionIds = isset($_POST['collectionIds']) ? $_POST['collectionIds'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : 0;

    $remote_post_data = array(
        'productHandle' => $handle,
        'paginationParams' => array(
            "page" => $page,
            "size" => 24
        ),
        "collectionIds" => $collectionIds
    );
    $body = wp_json_encode($remote_post_data);

    $options = ['body' => $body, 'headers' => ['Content-Type' => 'application/json', ]];

    $response = wp_remote_post( WPEI_SHOPIFY_LICENCE_ENDPOINT . 'getFilteredProducts', $options);

    if (is_wp_error($response)) {
        
        $error_message = $response->get_error_message();
        wp_send_json_error(
            array(
                'products' => [],
                'code'  => 100,
                'msg' => "Something went wrong!"
            )
        );
        
    } else {

        $response_body = wp_remote_retrieve_body($response);
        $response_body = json_decode($response_body);

        $products = array();
        if (isset($response_body->data) && isset($response_body->data->products)) {
            $products = $response_body->data->products;
        }

        $totalCount = isset($response_body->data->totalCount) ? $response_body->data->totalCount : 0;
        $paginationParams = isset($response_body->data->paginationParams) ? $response_body->data->paginationParams : '';

        wp_send_json_success(
            array(
                'products' => $products,
                'pagination' => $paginationParams,
                'totalCount' => $totalCount,
                'code'  => 200,
                'msg'   => 'Products Fetched'
            )
        );
    }

    wp_die();
}

add_action('wp_ajax_get_filtered_products','get_filtered_products');
add_action('wp_ajax_nopriv_get_filtered_products','get_filtered_products');