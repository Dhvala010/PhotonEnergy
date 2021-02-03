<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Services Grid
 */
class Industris_Services_Grid extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'iservices_grid';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Services Grid', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-settings';
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
				'label' => __( 'Services', 'industris' ),
			]
		);

		$this->add_control(
			'plist',
			[
				'label' => __( 'Service List', 'industris' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_services(),
				'multiple' => true,
				'label_block' => true,
			]
		);
		$this->add_control(
			'column',
			[
				'label' => __( 'Columns', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'2'  	=> __( '2', 'industris' ),
					'3' 	=> __( '3', 'industris' ),
					'4' 	=> __( '4', 'industris' ),
				],
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'gaps',
			[
				'label' => __( 'Show Gap', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_responsive_control(
			'w_gaps',
			[
				'label' => __( 'Gap Width', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .service-item' => 'margin-bottom: {{SIZE}}{{UNIT}}; padding: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .grid-services' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
					'.elementor-section-full_width:not(.elementor-inner-section) .grid-services' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2)!important;',
				],
				'condition' => [
					'gaps' => 'yes',
				]
			]
		);
		$this->add_control(
			'detail_btn',
			[
				'label' => 'Button',
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( 'View details <i class="icon ion-md-add-circle-outline"></i>', 'industris' ),
			]
		);

		$this->end_controls_section();

		//Style
		$this->start_controls_section(
			'style_content_section',
			[
				'label' => __( 'Content', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
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
					'{{WRAPPER}} .service-item h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .service-item h4 a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .service-item h4 a',
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
					'detail_btn!' => '',
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
					'{{WRAPPER}} .service-item .btn-details' => 'color: {{VALUE}};',
				],
				'condition' => [
					'detail_btn!' => '',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'selector' => '{{WRAPPER}} .service-item .btn-details',
				'condition' => [
					'detail_btn!' => '',
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
					'detail_btn!' => '',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="grid-services row <?php if( !$settings['gaps'] ) echo 'no-gaps'; ?>">
			<?php 

				$args = array(
					'post_type' => 'ot_service',
				    'post__in' => $settings['plist'],
				    'posts_per_page' => -1,
				);
				
				$wp_query = new \WP_Query($args);					
				while ($wp_query -> have_posts()) : $wp_query -> the_post(); 

				if( $settings['column'] == 4 ){
                    $column = 'col-lg-3 col-md-4 col-sm-6';
                }elseif( $settings['column'] == 2 ){
                    $column = 'col-md-6 col-sm-6';
                }else{
                    $column = 'col-md-4 col-sm-6';
                }

			?>

			<div class="service-item <?php echo esc_attr( $column ); ?>">
				<div class="relative">
	                <a class="overlay" href="<?php the_permalink(); ?>"></a>
	                <div class="service-info">
	                    <h4 class="service-name">
	                    	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                    </h4>
	                    <?php if( $settings['detail_btn'] ) { ?><a class="btn-details" href="<?php the_permalink(); ?>"><?php echo $settings['detail_btn']; ?></a><?php } ?>
                    </div>
	            	<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>" />
	            </div>
            </div>

			<?php endwhile; wp_reset_postdata(); ?>
	    </div>
	    <?php
	}

	protected function _content_template() {}

	protected function select_param_services() {
		$args = array(
		    'numberposts' => -1,
		    'post_type'   => 'ot_service'
		);
	  	$services = get_posts( $args );
	  	$serv = array();
	  	foreach( $services as $item ) {
	     	if( $item ) {
	        	$serv[$item->ID] = $item->post_title;
	     	}
	  	}
	  	return $serv;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Services_Grid() );