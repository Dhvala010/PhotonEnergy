<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Button
 */
class Industris_Slides_2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'islides2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Slides 2', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-banner';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		//Content Service box
		$this->start_controls_section(
			'slides_section',
			[
				'label' => __( 'Slides', 'industris' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'background_image',
			[
				'label'     => _x( 'Image', 'Background Control', 'industris' ),
				'type'      => Controls_Manager::MEDIA,
				'default'	=> [
					'url' => get_template_directory_uri().'/images/banner1.jpg',
				],
			]
		);

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

		$this->add_control(
			'slides',
			[
				'label'      => esc_html__( 'Slides', 'industris' ),
				'type'       => Controls_Manager::REPEATER,
				'show_label' => true,
				'fields'     => $repeater->get_controls(),
				'default'    => [
					[
						'background_image'=>  [
							'url' => get_template_directory_uri().'/images/banner1.jpg',
						],
						'subtitle'         => esc_html__( 'Slide 1 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 1 Heading', 'industris' ),
						'description'      => esc_html__( 'We are building a smarter, safer, and more sustainable world. That’s the Power of Connected. That’s the Power of Industris', 'industris' ),
					],
					[
						'background_image'=>  [
							'url' => get_template_directory_uri().'/images/banner2.jpg',
						],
						'subtitle'         => esc_html__( 'Slide 2 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 2 Heading', 'industris' ),
						'description'      => esc_html__( 'We are building a smarter, safer, and more sustainable world. That’s the Power of Connected. That’s the Power of Industris', 'industris' ),
					],
					[
						'background_image'=>  [
							'url' => get_template_directory_uri().'/images/banner3.jpg',
						],
						'subtitle'         => esc_html__( 'Slide 3 Subtitle', 'industris' ),
						'heading'          => esc_html__( 'Slide 3 Heading', 'industris' ),
						'description'      => esc_html__( 'We are building a smarter, safer, and more sustainable world. That’s the Power of Connected. That’s the Power of Industris', 'industris' ),
					],
				],
			]
		);

		$this->add_control(
			'text_btn_scroll',
			[
				'label' => __( 'Text Button Scroll', 'industris' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Scroll to explore <i class="icon ion-ios-arrow-dropdown"></i>', 'industris' ),
				'placeholder' => __( 'Click here', 'industris' ),
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_slides_section',
			[
				'label' => __( 'Content', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_bg',
			[
				'label' => __( 'Background', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slides-content-inner' => 'background: {{VALUE}};',
				],
			]
		);

		//Sub title
		$this->add_control(
			'heading_stitle',
			[
				'label' => __( 'Sub Title', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'stitle_space',
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
					'{{WRAPPER}} .sli-title-des h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'stitle_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .sli-title-des h6' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_typography',
				'selector' => '{{WRAPPER}} .sli-title-des h6',
			]
		);

		//Sub title
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
					'{{WRAPPER}} .sli-title-des h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .sli-title-des h2' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .sli-title-des h2',
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
					'{{WRAPPER}} .sli-title-des p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'des_typography',
				'selector' => '{{WRAPPER}} .sli-title-des p',
			]
		);

		//Button scroll
		$this->add_control(
			'heading_button',
			[
				'label' => __( 'Button Scroll', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'text_btn_scroll!' => '',
				]
			]
		);

		$this->add_control(
			'bscroll_bg',
			[
				'label' => __( 'Background', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .verticle' => 'background: {{VALUE}};',
				],
				'condition' => [
					'text_btn_scroll!' => '',
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
					'{{WRAPPER}} .verticle' => 'color: {{VALUE}};',
				],
				'condition' => [
					'text_btn_scroll!' => '',
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .verticle',
				'condition' => [
					'text_btn_scroll!' => '',
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
					'{{WRAPPER}} .verticle i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'text_btn_scroll!' => '',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'style_slides_arrow',
			[
				'label' => __( 'Arrow', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'spacing_nav',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -200,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .prev-nav' => 'left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .next-nav' => 'right: {{SIZE}}{{UNIT}};',
				],
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

	}

	protected function render() {

		$settings = $this->get_settings_for_display();
		if ( empty( $settings['slides'] ) ) {
			return;
		}

		?>
		
		<div class="industris-slides-s2-wrapper" data-arrow="true" data-dots="false">
			<div class="item-slides-bg iarrow arrow-s2">
				<?php foreach( $settings['slides'] as $slide ){ ?>
					<div>
						<div class="image-item relative">
							<img src="<?php echo esc_url( $slide['background_image']['url'] ); ?>" alt="">
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="item-slides-content-wraper">
				<div class="slides-content-inner">
					<?php foreach( $settings['slides'] as $slide ){ ?>
					<div>
						<div class="sli-title-des">
							<?php if( $slide['subtitle'] ){ ?><h6><?php echo $slide['subtitle']; ?></h6><?php } ?>
							<?php if( $slide['heading'] ){ ?><h6><h2><?php echo $slide['heading']; ?></h2><?php } ?>
							<?php if( $slide['description'] ){ ?><p><?php echo $slide['description']; ?></p><?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
				<nav class="slide-controls-s2 iarrow dtable">
					<div class="controls-arrow">
			        	<button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>
			        	<button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>
			        </div>
			        <div class="controls-overlay"></div>
			    </nav>
			    <?php if( $settings['text_btn_scroll'] ){ ?>
			    <div class="verticle"><p id="scroll-next"><?php echo $settings['text_btn_scroll'] ; ?></p></div>
			    <?php } ?>
			</div>
		</div>
	    <?php
	}

	protected function _content_template() {}
}
// After the Industris_Slides_2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Slides_2() );