<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Process Bar
 */
class Industris_Process extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iprocess';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Process', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-sitemap';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		//Content
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Process Bar', 'industris' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'type_icon',
			[
				'label' => __( 'Icon Type', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'icustom',
				'options' => [
					'ifont' 	=> __( 'Icon Fontawesome', 'industris' ),
					'icustom' => __( 'Icon Custom', 'industris' ),
				]
			]
		);

		$repeater->add_control(
			'selected_icon',
			[
				'label' => __( 'Step Icon', 'industris' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'type_icon' => 'ifont',
				],
			]
		);

		$repeater->add_control(
			'icustom',
			[
				'label' => __( 'Icon (name/class)', 'industris' ),
				'description' => __( 'Get icon class at this link: https://ionicons.com/ , ex: ribbon/ribbon ion-ios-ribbon', 'industris' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 1,
				'default' => __( 'ribbon', 'industris' ),
				'condition' => [
					'type_icon' => 'icustom',
				],
			]
		);

		$repeater->add_control(
			'title',
		    [
		        'label'   => esc_html__( 'Step Title', 'industris' ),
		        'type'    => Controls_Manager::TEXTAREA,
		        'default' => esc_html__( 'Receive and Evaluate the project overview', 'industris' ),
		    ]
		);

		$this->add_control(
		    'process_bar',
		    [
		        'label'       => '',
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => false,
		        'default'     => [
		            [
		             	'title' => esc_html__( 'Receive and Evaluate', 'industris' ),
		                'selected_icon'  => [
							'value' 	=> 'fas fa-briefcase',
							'library' 	=> 'fa-solid',
						],
		 
		            ],
		            [
		             	'title' => esc_html__( 'Research and detailed Planning', 'industris' ),
		                'selected_icon'  => [
							'value' 	=> 'fas fa-cog',
							'library' 	=> 'fa-solid',
						],
		 
		            ],
		            [
		             	'title' => esc_html__( 'Deploy and complete the project', 'industris' ),
		                'selected_icon'  => [
							'value' 	=> 'fas fa-rocket',
							'library' 	=> 'fa-solid',
						],
		 
		            ],
		            [
		             	'title' => esc_html__( 'Evaluation and project handover', 'industris' ),
		                'selected_icon'  => [
							'value' 	=> 'fas fa-wallet',
							'library' 	=> 'fa-solid',
						],
		 
		            ]
		        ],
		        'fields'      => array_values( $repeater->get_controls() ),
		        'title_field' => '{{{title}}}',
		    ]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Process Bar', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		//Icon
		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
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
					'{{WRAPPER}} .process-bar i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .process-bar i' => 'color: {{VALUE}};',
				],
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
					'{{WRAPPER}} .process-bar h6' => 'margin-top: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .process-bar h6' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .process-bar h6',
			]
		);

		//Bar
		$this->add_control(
			'heading_bar',
			[
				'label' => __( 'Middle Line', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'bar_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .process-bar .line' => 'background: {{VALUE}};',
					'{{WRAPPER}} .process-bar .line:before' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .process-bar .line:after' => 'border-left-color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
	    <div class="process-bar">
	    	<?php if ( ! empty( $settings['process_bar'] ) ) : foreach ( $settings['process_bar'] as $process ) : ?>
	    		<div class="step-item">
	    			<?php if( $process['type_icon'] =='ifont' ) { ?><i class="<?php echo $process['selected_icon']['value']; ?>" aria-hidden="true"></i><?php } ?>
	    			<?php if( $process['type_icon'] =='icustom' ) { ?><i class="ion ion-md-<?php echo esc_attr( $process['icustom'] ); ?> ion-logo-<?php echo esc_attr( $process['icustom'] ); ?>" aria-hidden="true"></i><?php } ?>
			    	<div class="line"></div>
			    	<h6><?php echo $process['title']; ?></h6>
		    	</div>
	    	<?php endforeach; endif; ?>
	    </div>
	    <?php
	}

	protected function _content_template() {}
}
// After the Industris_Process class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Process() );