<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Fun facts 
 */
class Industris_Fun_Facts extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'industris-fun-facts';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Fun Facts', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-counter';
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
				'label' => __( 'Content', 'industris' ),
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'Layout', 'industris' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'inline',
				'options' => [
					'inline' => [
						'title' => __( 'Inline', 'industris' ),
						'icon' => 'eicon-ellipsis-h',
					],
					'traditional' => [
						'title' => __( 'Default', 'industris' ),
						'icon' => 'eicon-editor-list-ul',
					],
				],
				'label_block' => false,
				'toggle' => false,
			]
		);

		$this->add_control(
			'starting_number',
			[
				'label' => __( 'Starting Number', 'industris' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 0,
			]
		);

		$this->add_control(
			'ending_number',
			[
				'label' => __( 'Ending Number', 'industris' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 100,
			]
		);

		$this->add_control(
			'prefix',
			[
				'label' => __( 'Number Prefix', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( '(', 'industris' ),
			]
		);

		$this->add_control(
			'suffix',
			[
				'label' => __( 'Number Suffix', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'placeholder' => __( '+)', 'industris' ),
			]
		);

		$this->add_control(
			'type_icon',
			[
				'label' => __( 'Type Icon', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => __( 'None', 'industris' ),
					'icon' => __( 'Icon Fontawesome', 'industris' ),
					'image' => __( 'Icon Image', 'industris' ),
					'icustom' => __( 'Custom Icon', 'industris' ),
				],
				'default' => 'icustom',
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'industris' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'type_icon' => 'icon',
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'industris' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'type_icon' => 'image',
				],
			]
		);

		$this->add_control(
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

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Our Awards', 'industris' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'industris' ),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Over 25 years with 12 different awards, we are extremely proud of that', 'industris' ),
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->end_controls_section();

		/*** Style ***/
		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Content', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_padd',
			[
				'label' => __( 'Padding', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .fun-facts' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		/*Number*/
		$this->add_control(
			'heading_number',
			[
				'label' => __( 'Number', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .counter-number' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'selector' => '{{WRAPPER}} .counter-number',
			]
		);

		/*Title*/
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
					'{{WRAPPER}} .counter-inline .counter-title' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .counter-traditional .counter-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .counter-title' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .counter-title',
			]
		);

		/*Description*/
		$this->add_control(
			'heading_desc',
			[
				'label' => __( 'Description', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_responsive_control(
			'desc_space',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'default'=> [],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-desc' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .counter-desc' => 'color: {{VALUE}};',
				],
				'condition' => [
					'desc!' => ''
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'selector' => '{{WRAPPER}} .counter-desc',
				'condition' => [
					'desc!' => ''
				]
			]
		);

		/*Icon*/
		$this->add_control(
			'heading_icon',
			[
				'label' => __( 'Icon', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'type_icon!' => 'none'
				]
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'default'=> [],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-inline i, {{WRAPPER}} .counter-inline img' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .counter-traditional i, {{WRAPPER}} .counter-traditional img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'type_icon!' => 'none'
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
						'min' => 15,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'type_icon' => ['icon', 'icustom']
				]
			]
		);
		$this->add_responsive_control(
			'icon_img_width',
			[
				'label' => __( 'Image Width', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 15,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .counter-wrapper img' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'type_icon' => 'image' 
				]
			]
		);
		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .counter-wrapper i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'type_icon' => ['icon', 'icustom']
				]
			]
		);

		/*Border*/
		$this->add_control(
			'heading_border',
			[
				'label' => __( 'Border', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 'tabs_border' );

		$this->start_controls_tab(
			'tab_border_normal',
			[
				'label' => __( 'Normal', 'industris' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'selector' => '{{WRAPPER}} .fun-facts',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fun-facts' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .fun-facts',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_border_hover',
			[
				'label' => __( 'Hover', 'industris' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border_hover',
				'selector' => '{{WRAPPER}} .fun-facts:hover',
			]
		);

		$this->add_responsive_control(
			'border_radius_hover',
			[
				'label' => __( 'Border Radius', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .fun-facts:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'selector' => '{{WRAPPER}} .fun-facts:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$has_icon = ! empty( $settings['type_icon'] ) && 'none' !== $settings['type_icon'];
		if ( ! isset( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'fa fa-star';
		}
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new = ! isset( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		$iclass = ( $settings['view'] == 'traditional' ) ? 'counter-traditional' : 'counter-inline';
		$align = ( $iclass == 'counter-traditional' ) ? ' text-center' : '';
		?>
		<div class="fun-facts">
			<div class="counter-wrapper">
				<div class="<?php echo esc_attr( $iclass.$align );?>">
					<?php if ( $has_icon ) { if( $settings['type_icon'] === 'icon' ){ ?>
						<?php
						if ( $is_new || $migrated ) {
							Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
						} elseif ( ! empty( $settings['icon'] ) ) { ?>
							<i class="<?php echo esc_attr( $settings['icon'] ) ?>" aria-hidden="true"></i><?php
						}
						?>
					<?php } elseif( $settings['type_icon'] === 'image' ){ ?>
						<img src="<?php echo $settings['image']['url']; ?>" alt="">
					<?php }elseif( $settings['type_icon'] === 'icustom' ){ ?>
						<i class="ion ion-md-<?php echo esc_attr( $settings['icustom'] ); ?> ion-logo-<?php echo esc_attr( $settings['icustom'] ); ?>" aria-hidden="true"></i>
					<?php }} ?>
					<?php if ( $settings['title'] ) { ?><h6 class="counter-title"><?php echo $settings['title'] ?></h6><?php } ?>
					<p class="counter-number">
						<span class="number-prefix"><?php echo $settings['prefix']; ?></span>
				        <span class="number" data-to="<?php echo $settings['ending_number'] ?>" data-inviewport="yes"><?php echo $settings['starting_number'] ?></span>
				        <span class="number-suffix"><?php echo $settings['suffix'] ?></span>
				    </p>
			    </div>
		        <?php if ( $settings['desc'] ) { ?><p class="counter-desc <?php echo esc_attr( $align );?>"><?php echo $settings['desc'] ?></p><?php } ?>
	        </div>
	    </div>
	    <?php
	}

	protected function _content_template() {}
}
// After the Industris_Fun_Facts class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Fun_Facts() );