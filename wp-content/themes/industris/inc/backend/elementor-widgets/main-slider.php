<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Main Slider 
 */
class Industris_MainSlider extends Widget_Base {

	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'imainslider';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Main Slider', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-slides';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->section_content();
		$this->section_style();
	}

	// Tab Content
	protected function section_content() {
		$this->section_content_slides();
		$this->section_content_option();
	}

	protected function section_content_slides() {
		$this->start_controls_section(
			'section_slides',
			[
				'label' => esc_html__( 'Slides', 'industris' ),
			]
		);

		$repeater = new Repeater();

		$repeater->start_controls_tabs( 'slides_repeater' );

		$repeater->start_controls_tab( 'background', [ 'label' => esc_html__( 'Background', 'industris' ) ] );

		$repeater->add_control(
			'background_color',
			[
				'label'     => esc_html__( 'Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#cadbe8',
				'selectors' => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_responsive_control(
			'background_image',
			[
				'label'     => _x( 'Image', 'Background Control', 'industris' ),
				'type'      => Controls_Manager::MEDIA,
				'selectors' => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-bg' => 'background-image: url({{URL}})',
				],
			]
		);

		$repeater->add_responsive_control(
			'background_size',
			[
				'label'     => _x( 'Background Size', 'Background Control', 'industris' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'cover',
				'options'   => [
					'cover'   => _x( 'Cover', 'Background Control', 'industris' ),
					'contain' => _x( 'Contain', 'Background Control', 'industris' ),
					'auto'    => _x( 'Auto', 'Background Control', 'industris' ),
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-bg' => 'background-size: {{VALUE}}',
				],
			]
		);

		$repeater->add_responsive_control(
			'background_position',
			[
				'label'     => esc_html__( 'Background Position', 'industris' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''              => esc_html__( 'Default', 'industris' ),
					'left top'      => esc_html__( 'Left Top', 'industris' ),
					'left center'   => esc_html__( 'Left Center', 'industris' ),
					'left bottom'   => esc_html__( 'Left Bottom', 'industris' ),
					'right top'     => esc_html__( 'Right Top', 'industris' ),
					'right center'  => esc_html__( 'Right Center', 'industris' ),
					'right bottom'  => esc_html__( 'Right Bottom', 'industris' ),
					'center top'    => esc_html__( 'Center Top', 'industris' ),
					'center center' => esc_html__( 'Center Center', 'industris' ),
					'center bottom' => esc_html__( 'Center Bottom', 'industris' ),
				],
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-bg' => 'background-position: {{VALUE}};',
				],

			]
		);

		$repeater->add_responsive_control(
			'background_position_xy',
			[
				'label'              => esc_html__( 'Custom Background Position', 'industris' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'allowed_dimensions' => [ 'top', 'left' ],
				'size_units'         => [ 'px', '%' ],
				'default'            => [],
				'selectors'          => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-bg' => 'background-position: {{LEFT}}{{UNIT}} {{TOP}}{{UNIT}};',
				],
			]
		);

		$repeater->add_control(
			'background_ken_burns',
			[
				'label'      => esc_html__( 'Ken Burns Effect', 'industris' ),
				'type'       => Controls_Manager::SWITCHER,
				'default'    => '',
				'separator'  => 'before',
				'conditions' => [
					'terms' => [
						[
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'zoom_direction',
			[
				'label'      => esc_html__( 'Zoom Direction', 'industris' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'in',
				'options'    => [
					'in'  => esc_html__( 'In', 'industris' ),
					'out' => esc_html__( 'Out', 'industris' ),
				],
				'conditions' => [
					'terms' => [
						[
							'name'     => 'background_ken_burns',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'background_overlay',
			[
				'label'      => esc_html__( 'Background Overlay', 'industris' ),
				'type'       => Controls_Manager::SWITCHER,
				'default'    => '',
				'separator'  => 'before',
				'conditions' => [
					'terms' => [
						[
							'name'     => 'background_image[url]',
							'operator' => '!=',
							'value'    => '',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'background_overlay_color',
			[
				'label'      => esc_html__( 'Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'default'    => 'rgba(0,0,0,0.5)',
				'conditions' => [
					'terms' => [
						[
							'name'  => 'background_overlay',
							'value' => 'yes',
						],
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-background-overlay' => 'background-color: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'background_overlay_blend_mode',
			[
				'label'      => esc_html__( 'Blend Mode', 'industris' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => [
					''            => esc_html__( 'Normal', 'industris' ),
					'multiply'    => 'Multiply',
					'screen'      => 'Screen',
					'overlay'     => 'Overlay',
					'darken'      => 'Darken',
					'lighten'     => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'color-burn'  => 'Color Burn',
					'hue'         => 'Hue',
					'saturation'  => 'Saturation',
					'color'       => 'Color',
					'exclusion'   => 'Exclusion',
					'luminosity'  => 'Luminosity',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'background_overlay',
							'value' => 'yes',
						],
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-background-overlay' => 'mix-blend-mode: {{VALUE}}',
				],
			]
		);

		$repeater->add_control(
			'bg_animation',
			[
				'label'   => esc_html__( 'Background Animation', 'industris' ),
				'type'    => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
				''    	  => esc_html__( 'Inherit', 'industris' ),
				] + $this->list_animation(),
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'content', [ 'label' => esc_html__( 'Content', 'industris' ) ] );

		$repeater->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'industris' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Slide Subtitle', 'industris' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'heading',
			[
				'label'       => esc_html__( 'Title', 'industris' ),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Slide Heading', 'industris' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'   => esc_html__( 'Description', 'industris' ),
				'type'    => Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'I am slide content. Click edit button to change this text. 
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'industris' ),
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'   => esc_html__( 'Button Text 1', 'industris' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'About us', 'industris' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link Button 1', 'industris' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'industris' ),
			]
		);

		$repeater->add_control(
			'button_text2',
			[
				'label'   => esc_html__( 'Button Text 2', 'industris' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '', 'industris' ),
			]
		);

		$repeater->add_control(
			'link2',
			[
				'label'       => esc_html__( 'Link Button 2', 'industris' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'industris' ),
			]
		);

		$repeater->add_control(
			'content_animation',
			[
				'label'   => esc_html__( 'Content Animation', 'industris' ),
				'type'    => Controls_Manager::SELECT2,
				'default' => '',
				'options' => [
				''    	  => esc_html__( 'Inherit', 'industris' ),
				] + $this->list_animation(),
			]
		);



		$repeater->end_controls_tab();

		$repeater->start_controls_tab( 'style', [ 'label' => esc_html__( 'Style', 'industris' ) ] );

		$repeater->add_control(
			'custom_style',
			[
				'label'       => esc_html__( 'Custom', 'industris' ),
				'type'        => Controls_Manager::SWITCHER,
				'description' => esc_html__( 'Set custom style that will only affect this specific slide.', 'industris' ),
			]
		);

		$repeater->add_responsive_control(
			'slide_margin',
			[
				'label'      => esc_html__( 'Margin', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .industris-slide-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_responsive_control(
			'slide_padding',
			[
				'label'      => esc_html__( 'Padding', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .industris-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_responsive_control(
			'horizontal_position',
			[
				'label'                => esc_html__( 'Horizontal Position', 'industris' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => [
					'left'   => [
						'title' => esc_html__( 'Left', 'industris' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'industris' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'industris' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'default'              => 'left',
				'selectors'            => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-slide-content' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left'   => 'margin-right: auto',
					'center' => 'margin: 0 auto',
					'right'  => 'margin-left: auto',
				],
				'conditions'           => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_responsive_control(
			'vertical_position',
			[
				'label'                => esc_html__( 'Vertical Position', 'industris' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => [
					'top'    => [
						'title' => esc_html__( 'Top', 'industris' ),
						'icon'  => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'industris' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'industris' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'selectors'            => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner' => 'align-items: {{VALUE}}',
				],
				'selectors_dictionary' => [
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				],
				'conditions'           => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_responsive_control(
			'text_align',
			[
				'label'       => esc_html__( 'Text Align', 'industris' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'left'   => [
						'title' => esc_html__( 'Left', 'industris' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'industris' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'industris' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors'   => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner' => 'text-align: {{VALUE}}',
				],
				'conditions'  => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'subtitle_custom_color',
			[
				'label'      => esc_html__( 'Subtitle Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-slide-subtitle' => 'color: {{VALUE}}',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
				'separator'  => 'before',
			]
		);

		$repeater->add_control(
			'heading_custom_color',
			[
				'label'      => esc_html__( 'Heading Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-slide-heading' => 'color: {{VALUE}}',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
				'separator'  => 'before',
			]
		);

		$repeater->add_control(
			'content_custom_color',
			[
				'label'      => esc_html__( 'Content Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .industris-slide-description' => 'color: {{VALUE}}',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
				'separator'  => 'before',
			]
		);

		$repeater->add_control(
			'button_custom_color',
			[
				'label'      => esc_html__( 'Button 1 Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .slide-button_1' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
				'separator'  => 'before',
			]
		);

		$repeater->add_control(
			'button_custom_bg_color',
			[
				'label'      => esc_html__( 'Button 1 Background Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .slide-button_1' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->add_control(
			'button2_custom_color',
			[
				'label'      => esc_html__( 'Button 2 Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .slide-button_2' => 'color: {{VALUE}}; border-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
				'separator'  => 'before',
			]
		);

		$repeater->add_control(
			'button2_custom_bg_color',
			[
				'label'      => esc_html__( 'Button 2 Background Color', 'industris' ),
				'type'       => Controls_Manager::COLOR,
				'selectors'  => [
					'{{WRAPPER}} .industris-slides {{CURRENT_ITEM}} .slick-slide-inner .slide-button_2' => 'background-color: {{VALUE}};',
				],
				'conditions' => [
					'terms' => [
						[
							'name'  => 'custom_style',
							'value' => 'yes',
						],
					],
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'slides',
			[
				'label'      => esc_html__( 'Slides', 'industris' ),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields'     => $repeater->get_controls(),
				'default'    => [
					[
						'subtitle'         => esc_html__( 'Slide 1 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 1 Heading', 'industris' ),
						'description'      => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'industris' ),
						'button_text'      => esc_html__( 'Click Here', 'industris' ),
						'background_color' => '#cadbe8',
						'content_animation'
					],
					[
						'subtitle'         => esc_html__( 'Slide 2 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 2 Heading', 'industris' ),
						'description'      => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'industris' ),
						'button_text'      => esc_html__( 'Click Here', 'industris' ),
						'background_color' => '#cadbe8',
					],
					[
						'subtitle'         => esc_html__( 'Slide 3 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 3 Heading', 'industris' ),
						'description'      => esc_html__( 'Click edit button to change this text. Lorem ipsum dolor sit amet consectetur adipiscing elit dolor', 'industris' ),
						'button_text'      => esc_html__( 'Click Here', 'industris' ),
						'background_color' => '#cadbe8',
					],
				],
			]
		);

		$this->add_responsive_control(
			'slides_height',
			[
				'label'      => esc_html__( 'Height', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 100,
						'max' => 1000,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default'    => [
					'size' => 600,
				],
				'size_units' => [ 'px', 'vh', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slick-slide' => 'height: {{SIZE}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function section_content_option() {
		$this->start_controls_section(
			'section_slider_options',
			[
				'label' => esc_html__( 'Slider Options', 'industris' ),
				'type'  => Controls_Manager::SECTION,
			]
		);

		$this->add_responsive_control(
			'navigation',
			[
				'label'   => esc_html__( 'Navigation', 'industris' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'both',
				'options' => [
					'both'   => esc_html__( 'Arrows and Dots', 'industris' ),
					'arrows' => esc_html__( 'Arrows', 'industris' ),
					'dots'   => esc_html__( 'Dots', 'industris' ),
					'none'   => esc_html__( 'None', 'industris' ),
				],
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label'   => esc_html__( 'Pause on Hover', 'industris' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__( 'Autoplay', 'industris' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'     => esc_html__( 'Autoplay Speed', 'industris' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
				'selectors' => [
					// '{{WRAPPER}} .industris-slides .slick-slide-bg' => 'animation-duration: calc({{VALUE}}ms*1.2); transition-duration: calc({{VALUE}}ms)',
				],
			]
		);

		$this->add_control(
			'infinite',
			[
				'label'   => esc_html__( 'Infinite Loop', 'industris' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);

		$this->add_control(
			'transition',
			[
				'label'   => esc_html__( 'Transition', 'industris' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'slide',
				'options' => [
					'slide' => esc_html__( 'Slide', 'industris' ),
					'fade'  => esc_html__( 'Fade', 'industris' ),
				],
			]
		);

		$this->add_control(
			'transition_speed',
			[
				'label'   => esc_html__( 'Transition Speed', 'industris' ) . ' (ms)',
				'type'    => Controls_Manager::NUMBER,
				'default' => 500,
			]
		);

		$this->add_control(
			'slide_animation',
			[
				'label'   => esc_html__( 'Content Animation', 'industris' ),
				'type'    => Controls_Manager::SELECT2,
				'default' => 'fadeInUp',
				'options' => [
				''    	  => esc_html__( 'None', 'industris' ),
				] + $this->list_animation(),
			]
		);

		$this->end_controls_section();

	}

	// Tab Style
	protected function section_style() {
		$this->section_style_slides();
		$this->section_style_subtitle();
		$this->section_style_title();
		$this->section_style_desc();
		$this->section_style_button_1();
		$this->section_style_button_2();
		$this->section_style_arrow();
		$this->section_style_dot();
	}

	protected function section_style_slides() {
		$this->start_controls_section(
			'section_style_slides',
			[
				'label' => esc_html__( 'Slides', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'slides_max_width',
			[
				'label'          => esc_html__( 'Slides Width', 'industris' ),
				'type'           => Controls_Manager::SLIDER,
				'range'          => [
					'px' => [
						'min' => 0,
						'max' => 1903,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units'     => [ '%', 'px' ],
				'default'        => [
					'size' => '1170',
					'unit' => 'px',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'selectors'      => [
					'{{WRAPPER}} .industris-slides .slick-slide-inner' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_max_width',
			[
				'label'          => esc_html__( 'Content Width', 'industris' ),
				'type'           => Controls_Manager::SLIDER,
				'range'          => [
					'px' => [
						'min' => 0,
						'max' => 1903,
					],
					'%'  => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units'     => [ '%', 'px' ],
				'default'        => [
					'size' => '80',
					'unit' => '%',
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'selectors'      => [
					'{{WRAPPER}} .industris-slides .industris-slide-content' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slides_margin',
			[
				'label'      => esc_html__( 'Margin', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .industris-slide-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'slides_padding',
			[
				'label'      => esc_html__( 'Padding', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .industris-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'banner_border',
				'label'     => esc_html__( 'Border', 'industris' ),
				'selector'  => '{{WRAPPER}} .industris-slides',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slides_horizontal_position',
			[
				'label'        => esc_html__( 'Horizontal Position', 'industris' ),
				'type'         => Controls_Manager::CHOOSE,
				'label_block'  => false,
				'default'      => 'left',
				'options'      => [
					'left'   => [
						'title' => esc_html__( 'Left', 'industris' ),
						'icon'  => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'industris' ),
						'icon'  => 'eicon-h-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'industris' ),
						'icon'  => 'eicon-h-align-right',
					],
				],
				'prefix_class' => 'industris--h-position-',
				'separator'    => 'before',
			]
		);

		$this->add_control(
			'slides_vertical_position',
			[
				'label'        => esc_html__( 'Vertical Position', 'industris' ),
				'type'         => Controls_Manager::CHOOSE,
				'label_block'  => false,
				'default'      => 'middle',
				'options'      => [
					'top'    => [
						'title' => esc_html__( 'Top', 'industris' ),
						'icon'  => 'eicon-v-align-top',
					],
					'middle' => [
						'title' => esc_html__( 'Middle', 'industris' ),
						'icon'  => 'eicon-v-align-middle',
					],
					'bottom' => [
						'title' => esc_html__( 'Bottom', 'industris' ),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'prefix_class' => 'industris--v-position-',
			]
		);

		$this->add_control(
			'slides_text_align',
			[
				'label'       => esc_html__( 'Text Align', 'industris' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'left'   => [
						'title' => esc_html__( 'Left', 'industris' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'industris' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'industris' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'     => 'left',
				'selectors'   => [
					'{{WRAPPER}} .industris-slides .slick-slide-inner' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function section_style_subtitle() {
		// Subtitle
		$this->start_controls_section(
			'section_style_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'subtitle_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slick-slide-inner .industris-slide-subtitle:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .industris-slide-subtitle' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .industris-slide-subtitle',
			]
		);

		$this->end_controls_section();

	}

	protected function section_style_title() {
		// Title
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'heading_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slick-slide-inner .industris-slide-heading:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .industris-slide-heading' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'heading_typography',
				'selector' => '{{WRAPPER}} .industris-slides .industris-slide-heading',
			]
		);

		$this->end_controls_section();
	}

	protected function section_style_desc() {
		// Description
		$this->start_controls_section(
			'section_style_description',
			[
				'label' => esc_html__( 'Description', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'description_spacing',
			[
				'label'     => esc_html__( 'Spacing', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slick-slide-inner .industris-slide-description:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .industris-slide-description' => 'color: {{VALUE}}',

				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .industris-slides .industris-slide-description',
			]
		);

		$this->end_controls_section();
	}

	protected function section_style_button_1() {
		$this->start_controls_section(
			'section_style_button_1',
			[
				'label' => esc_html__( 'Button 1', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .industris-slides .slide-button_1',
			]
		);

		$this->add_control(
			'button_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'button_tabs' );

		$this->start_controls_tab( 'button_normal', [ 'label' => esc_html__( 'Normal', 'industris' ) ] );

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'button_hover', [ 'label' => esc_html__( 'Hover', 'industris' ) ] );

		$this->add_control(
			'button_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_1:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_1:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_1:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_1:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();		

		$this->end_controls_section();
	}

	protected function section_style_button_2() {
		$this->start_controls_section(
			'section_style_button_2',
			[
				'label' => esc_html__( 'Button 2', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button2_typography',
				'selector' => '{{WRAPPER}} .industris-slides .slide-button_2',
			]
		);

		$this->add_control(
			'button2_border_width',
			[
				'label'     => esc_html__( 'Border Width', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'border-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button2_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'after',
			]
		);

		$this->add_responsive_control(
			'button2_padding',
			[
				'label'      => esc_html__( 'Padding', 'industris' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'button2_tabs' );

		$this->start_controls_tab( 'button2_normal', [ 'label' => esc_html__( 'Normal', 'industris' ) ] );

		$this->add_control(
			'button2_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button2_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button2_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'button2_hover', [ 'label' => esc_html__( 'Hover', 'industris' ) ] );

		$this->add_control(
			'button2_hover_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_2:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button2_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_2:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button2_hover_border_color',
			[
				'label'     => esc_html__( 'Border Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slide-button_2:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .industris-slides .slide-button_2:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function section_style_arrow() {
		// Arrows
		$this->start_controls_section(
			'section_style_arrows',
			[
				'label' => esc_html__( 'Arrows', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'arrows_position',
			[
				'label'   => esc_html__( 'Position', 'industris' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'in'  => esc_html__( 'Full Width', 'industris' ),
					'out' => esc_html__( 'Boxed', 'industris' ),
				],
				'default' => 'inside',
				'toggle'  => false,
			]
		);

		$this->add_control(
			'arrows_size',
			[
				'label'     => esc_html__( 'Arrows Size', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'px' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .arrows-wrapper .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'arrows_spacing',
			[
				'label'      => esc_html__( 'Spacing', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides-wrapper .slick-prev-arrow' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .industris-slides-wrapper .slick-next-arrow' => 'right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'arrows_tabs' );

		$this->start_controls_tab( 'arrows_normal', [ 'label' => esc_html__( 'Normal', 'industris' ) ] );

		$this->add_control(
			'arrows_color',
			[
				'label'     => esc_html__( 'Arrows Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .arrows-wrapper .slick-arrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'arrows_hover', [ 'label' => esc_html__( 'Hover', 'industris' ) ] );

		$this->add_control(
			'arrows_hover_color',
			[
				'label'     => esc_html__( 'Arrows Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .arrows-wrapper .slick-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function section_style_dot() {
		// Dots
		$this->start_controls_section(
			'section_style_dots',
			[
				'label' => esc_html__( 'Dots', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'dots_position',
			[
				'label'     => esc_html__( 'Position', 'industris' ),
				'type'      => Controls_Manager::CHOOSE,
				'default'   => '',
				'options'   => [
					'left'   => [
						'title' => esc_html__( 'Left', 'industris' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'industris' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'industris' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slick-dots' => 'text-align: {{VALUE}};',
				],
				'toggle'    => false,
			]
		);

		$this->add_responsive_control(
			'dots_vertical_offset',
			[
				'label'      => esc_html__( 'Vertical Offset', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slick-dots' => 'bottom:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_horizontal_offset',
			[
				'label'      => esc_html__( 'Horizontal Offset', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slick-dots' => 'left: {{SIZE}}{{UNIT}}; right: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [
					'dots_position' => [ 'left', 'right' ],
				],
			]
		);

		$this->add_control(
			'dots_spacing',
			[
				'label'      => esc_html__( 'Spacing', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slick-dots li' => 'margin: 0 {{SIZE}}{{UNIT}};',
				],
				'separator'  => 'before',
			]
		);

		$this->add_control(
			'dots_width',
			[
				'label'      => esc_html__( 'Width', 'industris' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ 'px' ],
				'selectors'  => [
					'{{WRAPPER}} .industris-slides .slick-dots li button:before' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'dots_border_radius',
			[
				'label'     => esc_html__( 'Border Radius', 'industris' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => [
					'%' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .industris-slides .slick-dots li button:before' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'dots_tabs' );

		$this->start_controls_tab( 'dots_normal', [ 'label' => esc_html__( 'Normal', 'industris' ) ] );

		$this->add_control(
			'dots_background_color',
			[
				'label'     => esc_html__( 'Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .slick-dots li button:before' => 'background-color: {{VALUE}};',
				],

			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'dots_hover', [ 'label' => esc_html__( 'Hover', 'industris' ) ] );

		$this->add_control(
			'dots_hover_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .slick-dots li button:hover:before' => 'background-color: {{VALUE}};',
				],
				'default'   => '',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'dots_active', [ 'label' => esc_html__( 'Active', 'industris' ) ] );

		$this->add_control(
			'dots_active_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .industris-slides-wrapper .slick-dots li.slick-active button:before' => 'background-color: {{VALUE}};'
				],
				'default'   => '',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();
	}

	protected function list_animation() {
		return [
			'fadeIn'            => esc_html__( 'Fade In', 'industris' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'industris' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'industris' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'industris' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'industris' ),
			'zoomIn'            => esc_html__( 'Zoom', 'industris' ),
			'zoomInDown'        => esc_html__( 'Zoom In Down', 'industris' ),
			'zoomInLeft'        => esc_html__( 'Zoom In Left', 'industris' ),
			'zoomInRight'       => esc_html__( 'Zoom In Righ', 'industris' ),
			'zoomInUp'          => esc_html__( 'Zoom In Up', 'industris' ),
			'slideInDown'       => esc_html__( 'Slide In Down', 'industris' ),
			'slideInLeft'       => esc_html__( 'Slide In Left', 'industris' ),
			'slideInRight'      => esc_html__( 'Slide In Right', 'industris' ),
			'slideInUp'         => esc_html__( 'Slide In Up', 'industris' ),
			'rotateIn'          => esc_html__( 'Rotate In', 'industris' ),
			'rotateInDownLeft'  => esc_html__( 'Rotate In Down Left', 'industris' ),
			'rotateInDownRight' => esc_html__( 'Rotate In Down Right', 'industris' ),
			'rotateInUpLeft'    => esc_html__( 'Rotate In Up Left', 'industris' ),
			'rotateInUpRight'   => esc_html__( 'Rotate In Up Right', 'industris' ),
			'bounce'            => esc_html__( 'Bounce', 'industris' ),
			'flash'             => esc_html__( 'Flash', 'industris' ),
			'pulse'             => esc_html__( 'Pulse', 'industris' ),
			'rubberBand'        => esc_html__( 'Rubber Band', 'industris' ),
			'shake'             => esc_html__( 'Shake', 'industris' ),
			'headShake'         => esc_html__( 'Head Shake', 'industris' ),
			'swing'             => esc_html__( 'Swing', 'industris' ),
			'tada'              => esc_html__( 'Tada', 'industris' ),
			'wobble'            => esc_html__( 'Wobble', 'industris' ),
			'jello'             => esc_html__( 'Jello', 'industris' ),
			'lightSpeedIn'      => esc_html__( 'Light Speed In', 'industris' ),
			'rollIn'            => esc_html__( 'Roll In', 'industris' ),
		];
	}

	/**
	 * Render icon box widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( empty( $settings['slides'] ) ) {
			return;
		}

		$nav        = $settings['navigation'];
		$nav_tablet = empty( $settings['navigation_tablet'] ) ? $nav : $settings['navigation_tablet'];
		$nav_mobile = empty( $settings['navigation_mobile'] ) ? $nav : $settings['navigation_mobile'];

		$classes = [
			'industris-slides-wrapper',
			'navigation-' . $nav,
			'navigation-tablet-' . $nav_tablet,
			'navigation-mobile-' . $nav_mobile,
		];

		$this->add_render_attribute( 'wrapper', 'class', $classes );
		$this->add_render_attribute( 'button', 'class', [ 'industris-slide-button', 'slide-button_1' , 'btn' ] );
		$this->add_render_attribute( 'button2', 'class', [ 'industris-slide-button', 'slide-button_2' , 'btn' ] );

		$slides      = [];
		$slide_count = 0;

		foreach ( $settings['slides'] as $slide ) {
			$slide_html       = '';
			$btn_attributes   = '';
			$btn_attributes2  = '';
			$slide_element    = 'div';
			$btn_element      = 'div';
			$btn_element2     = 'div';
			$slide_url        = $slide['link']['url'];
			$slide_url_2      = $slide['link2']['url'];

			if ( ! empty( $slide_url ) ) {
				$this->add_render_attribute( 'slide_link' . $slide_count, 'href', $slide_url );

				if ( $slide['link']['is_external'] ) {
					$this->add_render_attribute( 'slide_link' . $slide_count, 'target', '_blank' );
				}

				$btn_element    = 'a';
				$btn_attributes = $this->get_render_attribute_string( 'slide_link' . $slide_count );
			}

			if ( ! empty( $slide_url_2 ) ) {
				$this->add_render_attribute( 'slide_link2' . $slide_count, 'href', $slide_url_2 );

				if ( $slide['link2']['is_external'] ) {
					$this->add_render_attribute( 'slide_link2' . $slide_count, 'target', '_blank' );
				}

				$btn_element2    = 'a';
				$btn_attributes2 = $this->get_render_attribute_string( 'slide_link2' . $slide_count );
			}
			if ( $slide['bg_animation'] ) {
				$bg_animation = $slide['bg_animation'];
			}else{
				$bg_animation = 'inherit';
			}


			if ( 'yes' === $slide['background_overlay'] ) {
				$slide_html .= '<div class="industris-background-overlay"></div>';
			}
			
			if ( $slide['content_animation'] ) {
				$slide_html .= '<div class="industris-slide-content" data-animation="' . $slide['content_animation'] .'">';
			}else{
				$slide_html .= '<div class="industris-slide-content" data-animation="inherit">';
			}

			if ( $slide['subtitle'] ) {
				$slide_html .= '<div class="industris-slide-subtitle">' . $slide['subtitle'] . '</div>';
			}

			if ( $slide['heading'] ) {
				$slide_html .= '<div class="industris-slide-heading">' . $slide['heading'] . '</div>';
			}

			if ( $slide['description'] ) {
				$slide_html .= '<div class="industris-slide-description">' . $slide['description'] . '</div>';
			}

			if ( $slide['button_text'] ) {
				$slide_html .= '<' . $btn_element . ' ' . $btn_attributes . ' ' . $this->get_render_attribute_string( 'button' ) . '>' . $slide['button_text'] . '</' . $btn_element . '>';
			}

			if ( $slide['button_text2'] ) {
				$slide_html .= '<' . $btn_element2 . ' ' . $btn_attributes2 . ' ' . $this->get_render_attribute_string( 'button2' ) . '>' . $slide['button_text2'] . '</' . $btn_element2 . '>';
			}

			$ken_class = '';

			if ( '' != $slide['background_ken_burns'] ) {
				$ken_class = ' industris-ken-' . $slide['zoom_direction'];
			}

			$slide_html .= '</div>';
			$slide_html = '<div class="slick-slide-bg' . $ken_class . '" data-animation="' . $bg_animation . '"></div><' . $slide_element . ' class="slick-slide-inner">' . $slide_html . '</' . $slide_element . '>';
			$slides[]   = '<div class="elementor-repeater-item-' . $slide['_id'] . ' slick-slide">' . $slide_html . '</div>';
			$slide_count ++;
		}

		$is_rtl    = is_rtl();
		$direction = $is_rtl ? 'rtl' : 'ltr';
		$fade      = $settings['transition'] == 'fade' ? true : false;
		$show_dots = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) );
		$show_arrows = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) );

		$slick_options = [
			'slidesToShow'  => absint( 1 ),
			'autoplaySpeed' => absint( $settings['autoplay_speed'] ),
			'autoplay'      => ( 'yes' === $settings['autoplay'] ),
			'infinite'      => ( 'yes' === $settings['infinite'] ),
			'pauseOnHover'  => ( 'yes' === $settings['pause_on_hover'] ),
			'speed'         => absint( $settings['transition_speed'] ),
			'arrows'        => $show_arrows,
			'dots'          => $show_dots,
			'rtl'           => $is_rtl,
			'fade'          => $fade
		];

		$carousel_classes = [
			'industris-slides'
		];

		$this->add_render_attribute(
			'slides', [
				'class'               => $carousel_classes,
				'data-slider_options' => wp_json_encode( $slick_options ),
				'data-animation'      => $settings['slide_animation'],
			]
		);

		$this->add_render_attribute( 'wrapper', 'dir', $direction );

		$arrows_container = $settings['arrows_position'] == 'in' ? 'container' : 'container container-bigger';

		echo sprintf(
			'<div %s>
				<div class="arrows-wrapper"><div class="arrows-inner %s"></div></div>
				<div %s>%s</div>
			</div>',
			$this->get_render_attribute_string( 'wrapper' ),
			esc_attr( $arrows_container ),
			$this->get_render_attribute_string( 'slides' ),
			implode( '', $slides )
		);
	}

	/**
	 * Render icon box widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 */
	protected function _content_template() {

	}

}
// After the Industris_MainSlider class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_MainSlider() );