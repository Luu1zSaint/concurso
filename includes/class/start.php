<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class AC_TERREIRO {

    public static function init() {

        // Timezone
        date_default_timezone_set('America/Sao_Paulo');

        // Includes
        self::ac_includes();

        // Actions
        add_action( 'init', array(__CLASS__, 'ac_create_cpt') ); // CTP
        add_action( 'init', array(__CLASS__, 'ac_ajax_endpoints') ); // AJAX ENDPOINTS
        add_action( 'elementor/widgets/register', array(__CLASS__, 'ac_run_widgets') ); // Widgets
        add_action( 'wp_enqueue_scripts', array(__CLASS__, 'ac_run_scripts'), 100 ); // Scripts
        add_action( 'admin_enqueue_scripts', array(__CLASS__, 'ac_run_scripts_admin'), 100 ); // Scripts ADMIN
        add_action( 'add_meta_boxes', array(__CLASS__, 'ac_metaboxes') ); // CTP METABOX
        add_action( 'save_post', array(__CLASS__, 'ac_save_metaboxes') ); // CTP METABOX ANUNCIOS SAVE
        add_action( 'elementor/elements/categories_registered',  array(__CLASS__, 'ac_add_elementor_categories') ); // WIDGET CATEGORIES

        // Create Database && Websockets
        // register_activation_hook( __FILE__, array( 'AC_TERREIRO', 'ac_create_tables' ) );
        // self::ac_create_tables();
    }

    public static function ac_includes(){
        include_once( AC_TERREIRO_PATH_SERVER.'includes/metaboxes.php' );
        include_once( AC_TERREIRO_PATH_SERVER.'includes/functions.php' );
        include_once( AC_TERREIRO_PATH_SERVER.'includes/ajax.php' );
    }

    public static function ac_run_widgets( $widgets_manager ){  
        
        require_once( AC_TERREIRO_PATH_SERVER . 'widgets/main.php' );
        $widgets_manager->register( new \widget_elementor_ac_main() );
    }

    public static function ac_run_scripts() {
        
        wp_register_script(
            'ac_terreiro_toastr',
            AC_TERREIRO_PATH.'includes/js/toastr.js',
            array('jquery'),
            AC_TERREIRO_VERSION,
            true
        );
        
        wp_register_script(
            'ac_terreiro_mask',
            AC_TERREIRO_PATH.'includes/js/mask.js',
            array('jquery'),
            AC_TERREIRO_VERSION,
            true
        );

        wp_register_script(
            'ac_terreiro_script',
            AC_TERREIRO_PATH.'includes/js/script.js',
            array('jquery','ac_terreiro_toastr','ac_terreiro_mask'),
            AC_TERREIRO_VERSION,
            true
        );

        wp_register_style(
            'ac_terreiro_style_toastr',
            AC_TERREIRO_PATH.'includes/css/toastr.css',
            '',
            AC_TERREIRO_VERSION
        );

        wp_register_style(
            'ac_terreiro_style',
            AC_TERREIRO_PATH.'includes/css/style.css',
            '',
            AC_TERREIRO_VERSION
        );
        
        wp_localize_script('ac_terreiro_script', 'ac_data', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce('ac_nonce')
        ));
        wp_enqueue_script('ac_terreiro_script');
        wp_enqueue_style('ac_terreiro_style_toastr');
        wp_enqueue_style('ac_terreiro_style');
    }

    public static function ac_run_scripts_admin() {
    }

    public static function ac_create_cpt() {
        $labels = array(
            'name'                  => __( 'Concursos de sorte', AC_TERREIRO_SLUG ),
            'singular_name'         => __( 'Concurso de sorte', AC_TERREIRO_SLUG ),
            'menu_name'             => __( 'Concursos de sorte', AC_TERREIRO_SLUG ),
            'name_admin_bar'        => __( 'Concursos de sorte', AC_TERREIRO_SLUG ),
            'archives'              => __( 'Arquivos de concursos', AC_TERREIRO_SLUG ),
            'attributes'            => __( 'Atributos de concursos', AC_TERREIRO_SLUG ),
            'all_items'             => __( 'Concursos de sorte', AC_TERREIRO_SLUG ),
            'add_new_item'          => __( 'Novo concurso', AC_TERREIRO_SLUG ),
            'add_new'               => __( 'Novo concurso', AC_TERREIRO_SLUG ),
            'new_item'              => __( 'Novo concurso', AC_TERREIRO_SLUG ),
            'edit_item'             => __( 'Editar concurso', AC_TERREIRO_SLUG ),
            'update_item'           => __( 'Editar concurso', AC_TERREIRO_SLUG ),
            'view_item'             => __( 'Ver concurso', AC_TERREIRO_SLUG ),
            'view_items'            => __( 'Ver concursos de sorte', AC_TERREIRO_SLUG ),
            'search_items'          => __( 'Procurar concurso', AC_TERREIRO_SLUG ),
            'not_found'             => __( 'Nenhum concurso foi encontrado', AC_TERREIRO_SLUG ),
            'not_found_in_trash'    => __( 'Nenhum concurso foi encontrado na lixeira', AC_TERREIRO_SLUG ),
            'featured_image'        => __( 'Imagem principal', AC_TERREIRO_SLUG ),
            'set_featured_image'    => __( 'Definir a imagem principal', AC_TERREIRO_SLUG ),
            'remove_featured_image' => __( 'Remover a imagem principal', AC_TERREIRO_SLUG ),
            'use_featured_image'    => __( 'Usar como imagem principal', AC_TERREIRO_SLUG ),
            'filter_items_list'     => __( 'Filtrar concursos de sorte', AC_TERREIRO_SLUG )
        );
        
        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-sos',
            'supports' => array('title', 'editor', 'thumbnail'),
        );
        
        register_post_type('concursos_de_sorte', $args);
    }
    
    public static function ac_metaboxes() {

        // Anuncios
        // add_meta_box('anuncios_data', 'Dados do anúncio', 'ac_metabox_about', 'anuncios', 'normal', 'high');
        // add_meta_box('anuncios_auctions', 'Dados do leilão', 'ac_metabox_auctions', 'anuncios', 'normal', 'high');
        // add_meta_box('anuncios_history', 'Histórico de lances', 'ac_metabox_history', 'anuncios', 'normal', 'low');
        // add_meta_box('anuncios_history_date', 'Histórico de adiamentos', 'ac_metabox_history_date', 'anuncios', 'normal', 'low');
    }
    
    public static function ac_save_metaboxes($post_id) {

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
            return;
        }

        if ($parent_id = wp_is_post_revision($post_id)){
            $post_id = $parent_id;
        }

        $post_type = get_post_type($post_id);
        if ('anuncios' == $post_type && !current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        
        $fields = array('autor', 'status', 'modalidade', 'cep', 'uf', 'cidade', 'bairro', 'logradouro', 'numero', 'complemento', 'juiz', 'comacar_uf', 'comarca', 'processo', 'link_processo', 'avaliacao', 'parcelas', 'sinalmin', 'exequente', 'reu', 'falida', 'executada', 'acao', 'vara', 'main_lote', 'leilao', 'lance_inicial', 'op_1', 'op_2', 'op_3', 'encerramento', 'multi_image', 'multi_docs', 'videos');
        $docs = array('multi_image', 'multi_docs');
        $array = array('lance_inicial', 'op_1', 'op_2', 'op_3', 'encerramento','videos');
        $money = array('lance_inicial', 'avaliacao', 'op_1', 'op_2', 'op_3');

        foreach ($fields as $field) {
            if (array_key_exists($field, $_POST)) {
                $post_field = isset($_POST[$field]) ? $_POST[$field] : '';
                $value = in_array($field, $money) ? ac_decimal($post_field) : $post_field;

                if($field == 'main_lote' && !empty($value)){
                    update_post_meta($post_id, '_' . $field, $value);
                    // wp_update_post( array( 'ID' => $post_id, 'post_parent' => $value ) );                
                } elseif(in_array($field, $docs)){
                    // $docs = explode(',', $value);
                    // if (count($docs) > 0) {
                    //     foreach ($docs as $k => $v) {
                    //         wp_update_post(array('ID' => $v, 'post_parent' => $post_id));
                    //         update_post_meta($v, '_inuse', 'true');
                    //     }
                    // }
                    update_post_meta($post_id, '_' . $field, $value);
                } elseif(in_array($field, $array)){
                    update_post_meta($post_id, '_' . $field, $value);
                } else {
                    update_post_meta($post_id, '_' . $field, sanitize_text_field($value));
                }
            }
        }
    }

    public static function ac_ajax_endpoints(){
        add_action( 'wp_ajax_consultar_cnpj', 'ac_consultar_cnpj' );
        add_action( 'wp_ajax_nopriv_consultar_cnpj', 'ac_consultar_cnpj' );
    }

    public static function ac_create_tables($value=''){
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        
        $table_name = $wpdb->prefix.'lances';
        $sql = "CREATE TABLE $table_name (
            ID bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
            post_id bigint(20) UNSIGNED NOT NULL,
            user_id bigint(20) UNSIGNED NOT NULL,
            auction int(11) DEFAULT '1',
            value decimal(20,6) NOT NULL,
            type varchar(30) DEFAULT 'manual',
            auto_id bigint(20) DEFAULT '0',
            partial_id bigint(20) DEFAULT '0',
            date_created datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            date_updated datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (ID)
        ) $charset_collate;";
        dbDelta( $sql );
    }
    public static function ac_add_elementor_categories( $elements_manager ) {

        $elements_manager->add_category(
            'devalisson',
            [
                'title' => esc_html__( 'DevAlisson.com', 'textdomain' ),
                'icon' => 'fa fa-plug',
            ]
        );
    }
}