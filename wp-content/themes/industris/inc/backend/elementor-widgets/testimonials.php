<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Testimonial Slider
 */
class Industris_Testimonials extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'itestimonials';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Testimonial Slider', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_testimonials',
			[
				'label' => __( 'Testimonials', 'industris' ),
			]
		);

		$repeater = new Repeater();
		$repeater->add_control(
			'tcontent',
			[
				'label' => __( 'Content', 'industris' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => '10',
				'default' => '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."',
			]
		);

		$repeater->add_control(
			'timage',
			[
				'label' => __( 'Avatar', 'industris' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/testi1.png',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label' => __( 'Name', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Emilia Clarke',
			]
		);

		$repeater->add_control(
			'tjob',
			[
				'label' => __( 'Job', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Developer',
			]
		);

		$this->add_control(
		    'testi_slider',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		             	'tcontent' => __( '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."', 'industris' ),
		                'timage'  => [
							'url' => get_template_directory_uri().'/images/testi1.png',
						],
						'tname'	  => 'Emilia Clarke',
						'tjob'	  => 'Developer'
		 
		            ],
		            [
		             	'tcontent' => __( '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."', 'industris' ),
		                'timage'  => [
							'url' => get_template_directory_uri().'/images/testi1.png',
						],
						'tname'	  => 'Emilia Clarke',
						'tjob'	  => 'Developer'
		 
		            ],
		            [
		             	'tcontent' => __( '"I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment."', 'industris' ),
		                'timage'  => [
							'url' => get_template_directory_uri().'/images/testi1.png',
						],
						'tname'	  => 'Emilia Clarke',
						'tjob'	  => 'Developer'
		 
		            ]
		            
		        ],
		        'fields'      => array_values( $repeater->get_controls() ),
		        'title_field' => '{{{title}}}',
		    ]
		);

		$this->add_control(
			'tshow',
			[
				'label' => __( 'Slides to Show', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1' => __( '1', 'industris' ),
					'2' => __( '2', 'industris' ),
					'3' => __( '3', 'industris' ),
				]
			]
		);
		$this->add_control(
			'tarrow',
			[
				'label' => __( 'Nav Slider', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => __( 'Yes', 'industris' ),
					'false' => __( 'No', 'industris' ),
				]
			]
		);
		$this->add_control(
			'tdots',
			[
				'label' => __( 'Dots Slider', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => __( 'Yes', 'industris' ),
					'false' => __( 'No', 'industris' ),
				]
			]
		);
		$this->add_control(
			'tbox_shadow',
			[
				'label' => __( 'Box Shadow', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'is_fade',
			[
				'label' => __( 'Slide Fade', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'industris' ),
				'label_off' => __( 'No', 'industris' ),
				'return_value' => 'true',
				'default' => 'true',
				'condition' => [
					'tshow' => '1'
				]
			]
		);


		$this->end_controls_section();

		// Styling.
		$this->start_controls_section(
			'style_tcontent',
			[
				'label' => __( 'Content', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tcontent_bg',
			[
				'label' => __( 'Background Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap .ttext' => 'background: {{VALUE}};',
					'{{WRAPPER}} .testimonial-wrap .ttext:after' => 'border-left-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tcontent_color',
			[
				'label' => __( 'Text Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap .ttext' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .testimonial-wrap .ttext',
			]
		);

		$this->add_control(
			'padding_content',
			[
				'label' => __( 'Padding', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap .ttext' => 'padding: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Image.
		$this->start_controls_section(
			'style_timage',
			[
				'label' => __( 'Avatars', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'image_size',
			[
				'label' => __( 'Size', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap img' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .testimonial-wrap img',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'spacing_img',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap img' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Name.
		$this->start_controls_section(
			'style_tname',
			[
				'label' => __( 'Name', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .testimonial-wrap h6',
			]
		);

		$this->add_control(
			'spacing_name',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Job.
		$this->start_controls_section(
			'style_tjob',
			[
				'label' => __( 'Job', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'job_color',
			[
				'label' => __( 'Text Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-wrap span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'selector' => '{{WRAPPER}} .testimonial-wrap span',
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
					'tarrow' => 'true',
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

		$this->end_controls_section();

		// Dots.
		$this->start_controls_section(
			'style_dots',
			[
				'label' => __( 'Dots', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'tdots' => 'true'
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
		<div class="testi-slider iarrow <?php if( $settings['pos_nav'] == 'mid' ) echo 'arrow-s2'; if( !$settings['tbox_shadow'] ) echo ' no_shadow'; ?>" data-show="<?php echo $settings['tshow']; ?>" data-arrow="<?php echo $settings['tarrow']; ?>" data-dots="<?php echo $settings['tdots']; ?>" data-fade="<?php echo $settings['is_fade']; ?>">
			<?php if ( ! empty( $settings['testi_slider'] ) ) : foreach ( $settings['testi_slider'] as $testi ) : ?>
			<div>
				<div class="testimonial-wrap">
			        <div class="ttext">
			        	<?php echo $testi['tcontent']; ?>
			        </div>
			        <div class="tclient dtable">
			        	<?php if($testi['timage']['url']) { ?><img class="dcell" src="<?php echo $testi['timage']['url']; ?>" alt="<?php echo $testi['tname']; ?>"><?php } ?>
			        	<div class="cinfo dcell">
			        		<h6><?php echo $testi['title']; ?></h6>
			        		<?php if($testi['tjob']) { ?><span><?php echo $testi['tjob']; ?></span><?php } ?>
			        	</div>
			        </div>
			        <?php if( !$settings['tbox_shadow'] ){ ?>
			        	<i class="ion-md-quote"></i>
			        <?php } ?>
			    </div>
			</div>
			<?php endforeach; endif; ?>
	    </div>
	    <?php
	}

	protected function _content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Testimonials() );