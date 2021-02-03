<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Icon Box
 */
class Industris_IconBox_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iiconbox_carousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Icon Box Carousel', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-icon-box';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Icon Box', 'industris' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'icon_type',
			[
				'label' => __( 'Icon Type', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'font',
				'options' => [
					'font' 	=> __( 'Font Icon', 'industris' ),
					'image' => __( 'Image Icon', 'industris' ),
				]
			]
		);

		$repeater->add_control(
			'icon_font',
			[
				'label' => __( 'Icon', 'industris' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'icon_type' => 'font',
				]
			]
		);

		$repeater->add_control(
	       'icon_image',
	        [
	            'label' => esc_html__( 'Photo', 'industris' ),
	            'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/icon-service2.png',
			  	],
			  	'condition' => [
					'icon_type' => 'image',
				]
		    ]
	    );

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Title', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Oil & Gas Exploited', 'industris' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'des',
			[
				'label' => 'Description',
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'By specializing in the transportation of goods in and around the Midwestern United States, we are able to...', 'industris' ),
			]
		);

		$repeater->add_control(
			'label_link',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'View details <i class="icon ion-md-add-circle-outline"></i>', 'industris' ),
			]
		);

		$repeater->add_control(
			'link',
			[
				'label' => __( 'Link', 'industris' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'industris' )
			]
		);

		$this->add_control(
		    'iconbox_slide',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		             	'title' => esc_html__( 'Transportation & Distribution', 'industris' ),
		             	'des' => __( 'By specializing in the transportation of goods in and around the Midwestern United States, we are able to...', 'industris' ),
		             	'label_link' => __( 'View details <i class="icon ion-md-add-circle-outline"></i>', 'industris' ),
		            ],
		            [
		             	'title' => esc_html__( 'Oil & Gas exploited', 'industris' ),
		             	'des' => __( 'By specializing in the transportation of goods in and around the Midwestern United States, we are able to...', 'industris' ),
		             	'label_link' => __( 'View details <i class="icon ion-md-add-circle-outline"></i>', 'industris' ),
		            ],
		            [
		             	'title' => esc_html__( 'Automotive Manufacturing', 'industris' ),
		             	'des' => __( 'By specializing in the transportation of goods in and around the Midwestern United States, we are able to...', 'industris' ),
		             	'label_link' => __( 'View details <i class="icon ion-md-add-circle-outline"></i>', 'industris' ),
		            ]
		        ],
		        'fields'      => array_values( $repeater->get_controls() ),
		        'title_field' => '{{{title}}}',
		    ]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Slide To Show', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2' => __( '2', 'industris' ),
					'3' => __( '3', 'industris' ),
					'1' => __( '1', 'industris' ),
				],
			]
		);

		$this->add_control(
            'auto',
            [
                'label' => __('Autoplay', 'industris'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'industris'),
                'label_off' => __('No', 'industris'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

        $this->add_control(
			'arrows',
			[
				'label' => __( 'Arrows Slide', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
			'dots',
			[
				'label' => __( 'Dots Slide', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'true',
				'default' => 'true',
			]
		);

		$this->add_control(
	       'img_rotate',
	        [
	            'label' => esc_html__( 'Photo Rotate', 'industris' ),
	            'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/img_rotate.png',
			  	]
		    ]
	    );

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_icon_section',
			[
				'label' => __( 'Icon', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-top i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'icon_type' => 'font',
				]
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Size', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-top i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'icon_type' => 'font',
				]
			]
		);
		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'industris' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'industris' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'industris' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'industris' ),
						'icon' => 'fa fa-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} ' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

        $this->add_responsive_control(
			'content_padd',
			[
				'label' => __( 'Padding', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .icon-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_control(
			'content_bg',
			[
				'label' => __( 'Background', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box' => 'background: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'line_spacing',
			[
				'label' => __( 'Line Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .img_rotate > div:after' => 'left: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'line_ani',
			[
				'label' => __( 'Line', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .img_rotate > div:after' => 'background: {{VALUE}};',
				]
			]
		);


		//Title
		$this->add_control(
			'heading_title',
			[
				'label' => __( 'Title', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'title_space',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box h4' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .icon-box h4',
			]
		);

		//Description
		$this->add_control(
			'heading_des',
			[
				'label' => __( 'Description', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'des_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .icon-box p',
			]
		);

		//Button
		$this->add_control(
			'heading_button',
			[
				'label' => __( 'Button', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'label_link!' => '',
				]
			]
		);
		$this->add_responsive_control(
			'btn_space',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon-box .btn-details' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'label_link!' => '',
				]
			]
		);
		$this->add_control(
			'btn_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon-box .btn-details' => 'color: {{VALUE}};',
				],
				'condition' => [
					'label_link!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .icon-box .btn-details',
				'condition' => [
					'label_link!' => '',
				]
			]
		);
		$this->add_responsive_control(
			'btn_icon_size',
			[
				'label' => __( 'Icon Size', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .btn-details i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'label_link!' => '',
				]
			]
		);

		$this->end_controls_section();

		// Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrow', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'arrows' => 'true',
				]
			]
		);

		$this->add_control(
			'pos_nav',
			[
				'label' => __( 'Position Arrows', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => __( 'Top', 'industris' ),
					'mid' => __( 'Middle', 'industris' ),
				]
			]
		);
		$this->add_responsive_control(
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => 'top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pos_nav' => 'top',
				]
			]
		);
		$this->add_responsive_control(
			'spacing_nav_s2',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .prev-nav' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .next-nav' => 'right: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'pos_nav' => 'mid',
				]
			]
		);
		$this->add_control(
			'nav_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'nav_hcolor',
			[
				'label' => __( 'Hover', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Dots', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'dots' => 'true'
				]
			]
		);

		$this->add_responsive_control(
			'align_dots',
			[
				'label' => __( 'Alignment', 'industris' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'industris' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'industris' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'industris' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'spacing_dots',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
					'%' => [
						'min' => -100,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="icon-box-slider-wraper">
			<div class="icon-box-slider iarrow <?php if( $settings['pos_nav'] == 'mid' ) echo 'arrow-s2';?> row" data-show="<?php echo esc_attr($settings['number']); ?>" data-auto="<?php echo esc_attr($settings['auto']); ?>" data-dots="<?php echo esc_attr($settings['dots']); ?>" data-arrow="<?php echo esc_attr($settings['arrows']); ?>">
				<?php if( !empty( $settings['iconbox_slide'] ) ) : foreach ( $settings['iconbox_slide'] as $iconbox ) : ?>
				<div>
					<div class="icon-box">
						<div class="icon-top">
					        <?php if( $iconbox['icon_type'] == 'font' && $iconbox['icon_font']['value'] ) { ?><i class="<?php echo esc_attr( $iconbox['icon_font']['value'] ); ?>"></i><?php } ?>
					        <?php if( $iconbox['icon_type'] == 'image' && $iconbox['icon_image']['url'] ) { ?> <img src="<?php echo $iconbox['icon_image']['url']; ?>" alt=""><?php } ?>
				        </div>
				        <div class="content-box">
				            <?php if( $iconbox['title'] ){ ?><h4><?php echo $iconbox['title']; ?></h4><?php } ?>
				            <?php if( $iconbox['des'] ){ ?><p><?php echo $iconbox['des']; ?></p><?php } ?>
				            <?php if( $iconbox['label_link'] ) { ?><a class="btn-details" href="<?php echo $iconbox['link']['url']; ?>"><?php echo $iconbox['label_link']; ?></a><?php } ?>
				        </div>
				    </div>
				</div>
				<?php endforeach; endif; ?>
			</div>
			<?php if( $settings['img_rotate']['url'] ){ ?>
			<div class="img_rotate">
				<div>
					<img src="<?php echo $settings['img_rotate']['url']; ?>" alt="">
				</div>
			</div>
			<?php } ?>
		</div>
	    <?php 
	}

	protected function _content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_IconBox_Carousel() );