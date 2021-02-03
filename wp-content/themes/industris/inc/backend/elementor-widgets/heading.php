<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Heading 
 */
class Industris_Heading extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iheading';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Heading', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-heading';
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
				'label' => __( 'Heading', 'industris' ),
			]
		);

		$this->add_responsive_control(
			'align',
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
				// 'prefix_class' => 'industris%s-align-',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);

		$this->add_control(
			'sub',
			[
				'label' => __( 'Subtitle & Title', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'THE SUBTITLE', 'industris' ),
				'placeholder' => __( 'Enter your subtitle', 'industris' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => '',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'The Title', 'industris' ),
				'placeholder' => __( 'Enter your title', 'industris' ),
				'show_label' => false,
				'label_block' => true,
			]
		);

		$this->add_control(
			'ctitle',
			[
				'label' => '',
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '', 'industris' ),
				'placeholder' => __( 'Enter your color title', 'industris' ),
				'show_label' => false,
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Heading', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Subtitle
		$this->add_control(
			'heading_stitle',
			[
				'label' => __( 'Subtitle', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_responsive_control(
			'stitle_bottom_space',
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
					'{{WRAPPER}} .section-head h6' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .section-head h6' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'stitle_typography',
				'selector' => '{{WRAPPER}} .section-head h6',
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
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .section-head h2' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .section-head h2',
			]
		);

		//Title Color
		$this->add_control(
			'heading_ctitle',
			[
				'label' => __( 'Title Color', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'ctitle!' => '',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'ctitle_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .section-head h2 span' => 'color: {{VALUE}};',
				],
				'condition' => [
					'ctitle!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'ctitle_typography',
				'selector' => '{{WRAPPER}} .section-head h2 span',
				'condition' => [
					'ctitle!' => '',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="section-head">
	        <?php if( !empty($settings['sub']) ) { ?>
	            <h6 class="text-primary"><?php echo $settings['sub']; ?></h6>
	        <?php }if($settings['title']) { ?>
	        <h2 class="section-title"><?php echo $settings['title']; ?> <span class="text-primary"><?php echo $settings['ctitle']; ?></span></h2>
	        <?php } ?>
	    </div>
	    <?php
	}

	protected function _content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Heading() );