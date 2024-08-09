<?php

class widget_elementor_ac_main extends \Elementor\Widget_Base {

	public function get_name() {
		return 'ac_main';
	}

	public function get_title() {
		return esc_html__( 'Detalhes do concurso', 'elementor-oembed-widget' );
	}

	public function get_icon() {
		return 'eicon-site-identity';
	}

	public function get_custom_help_url() {
		return 'https://devalisson.com/';
	}

	public function get_categories() {
		return [ 'devalisson' ];
	}

	public function get_keywords() {
		return [ 'form', 'usuario', 'painel' ];
	}

	protected function register_controls() {

		// $this->start_controls_section(
		// 	'section_config',
		// 	[
		// 		'label' => esc_html__( 'Geral', 'textdomain' ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
		// 	]
		// );

		// $this->add_control(
		//     'modo_exibicao',
		//     [
		//         'label' => esc_html__( 'Minha conta', 'textdomain' ),
		//         'type' => \Elementor\Controls_Manager::SELECT,
		//         'default' => 'false',
		//         'options' => [
		//             'true' => esc_html__( 'Sim', 'textdomain' ),
		//             'false' => esc_html__( 'Não', 'textdomain' ),
		//         ]
		//     ]
		// );
		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'section_style',
		// 	[
		// 		'label' => esc_html__( 'Style', 'textdomain' ),
		// 		'tab' => \Elementor\Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'form-main_color',
		// 	[
		// 		'label' => esc_html__( 'Color principal', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => '#0B8185',
		// 		'selectors' => [
		// 			'*' => '--ac_form_color_main: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'form-text_color',
		// 	[
		// 		'label' => esc_html__( 'Cor de texto', 'textdomain' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'default' => '#fff',
		// 		'selectors' => [
		// 			'*' => '--ac_form_color_text: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		include( AC_TERREIRO_PATH_SERVER."includes/templates/concursos/details.php");

	}

}