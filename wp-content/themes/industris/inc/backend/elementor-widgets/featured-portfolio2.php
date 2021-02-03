<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Projects Carousel
 */
class Industris_FeaturedProjects2 extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ifprojects2';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Featured Portfolio 2', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-post-slider';
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
				'label' => __( 'Projects', 'industris' ),
			]
		);

		$this->add_control(
			'plist',
			[
				'label' => __( 'Project List', 'industris' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_projects(),
				'multiple' => true,
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'heading_content',
			[
				'label' => __( 'Content', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->add_control(
			'show_cat',
			[
				'label' => __( 'Show Category', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_exc',
			[
				'label' => __( 'Show Excerpt', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'exc_num',
			[
				'label' => __( 'Excerpt Text Number', 'industris' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 150,
				'step' => 1,
				'default' => 25,
				'condition' => [
					'show_exc' => 'yes',
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
			'style_section',
			[
				'label' => __( 'Info Box', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'info_padd',
			[
				'label' => __( 'Padding', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .info-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'info_bg',
			[
				'label' => __( 'Backgroung Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .info-item' => 'background: {{VALUE}};',
				],
			]
		);

		//Category
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'show_cat' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'cat_spacing',
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
					'{{WRAPPER}} .info-item .pmeta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_cat' => 'yes',
				]
			]
		);
		$this->add_control(
			'cat_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .info-item .pmeta' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_cat' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .info-item .pmeta',
				'condition' => [
					'show_cat' => 'yes',
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
			'title_spacing',
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
					'{{WRAPPER}} .info-item h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .info-item h4 a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'title_hcolor',
			[
				'label' => __( 'Hover Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .info-item h4 a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .info-item h4',
			]
		);

		//Excerpt
		$this->add_control(
			'heading_exc',
			[
				'label' => __( 'Excerpt', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'show_exc' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'exc_spacing',
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
					'{{WRAPPER}} .info-item p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'show_exc' => 'yes',
				]
			]
		);
		$this->add_control(
			'exc_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .info-item p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'show_exc' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exc_typography',
				'selector' => '{{WRAPPER}} .info-item p',
				'condition' => [
					'show_exc' => 'yes',
				]
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
		$this->add_responsive_control(
			'w_btn',
			[
				'label' => __( 'Width', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 50,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .verticle' => 'width: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'detail_btn!' => '',
				]
			]
		);
		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Background', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .verticle' => 'background: {{VALUE}};',
				],
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
					'{{WRAPPER}} .btn-details' => 'color: {{VALUE}};',
				],
				'condition' => [
					'detail_btn!' => '',
				]
			]
		);
		$this->add_control(
			'btn_hcolor',
			[
				'label' => __( 'Hover Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .btn-details:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .btn-details',
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

		// Arrow.
		$this->start_controls_section(
			'style_nav',
			[
				'label' => __( 'Arrows', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
						'min' => 0,
						'max' => 100,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .prev-nav' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .next-nav' => 'margin-left: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'arrow_color',
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
			'arrow_hcolor',
			[
				'label' => __( 'Hover Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .slick-arrow:not(.slick-disabled):hover' => 'color: {{VALUE}};',
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
			]
		);
		$this->add_responsive_control(
			'spacing_dots',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					]
				],
				'selectors' => [
					'{{WRAPPER}} .custom-dots li' => 'margin: 0 {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'dots_color',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-dots li a' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'dots_active',
			[
				'label' => __( 'Active Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .custom-dots li.slick-active a' => 'color: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$num = 3;
		if( $settings['plist'] )
			$num = -1;
		?>
		<div class="featured-projects-with-nav">
			<div class="projects-image iarrow arrow-s2" data-arrow="<?php echo $settings['tarrow']; ?>" data-dots="<?php echo $settings['tdots']; ?>">
				<?php 

				$args = array(
					'post_type' => 'ot_portfolio',
				    'post__in' => $settings['plist'],
				    'posts_per_page' => $num,
				);
				
				$wp_query = new \WP_Query($args);					
				while ($wp_query -> have_posts()) : $wp_query -> the_post(); 
				?>
					<div>
						<div class="image-item relative">
			                <?php if( function_exists( 'rwmb_meta' ) ) {
			                    $images = rwmb_meta( 'slide_image', "type=image" );
			                    foreach ( $images as $image ) {  $img = $image['full_url']; ?>

			                    <img class="radius" src="<?php echo esc_url($img); ?>" alt="<?php the_title(); ?>">

			                <?php } } ?>
		            	</div>
	            	</div>
	            <?php endwhile; wp_reset_postdata(); ?>
	        </div>

	        <div class="project-info-nav-wraper">
	            <div class="project-info-nav-inner">
	            	<?php
		            $args = array(
		                'post_type' => 'ot_portfolio',
					    'post__in' => $settings['plist'],
					    'posts_per_page' => $num,
		            );

		            $wp_query = new \WP_Query($args);

		            while ($wp_query -> have_posts()) : $wp_query -> the_post();
		            	$cates 		= get_the_terms(get_the_ID(),'portfolio_cat');
		                $cate_name  = '';
		                foreach((array)$cates as $cate){
		                    if(count($cates)>0){
		                        $cate_name .= $cate->name .'<span> / </span>';
		                    }
		                }
		            ?>
		            <div>
		            	<div class="info-item">
			            	<?php if( $settings['show_cat'] ) { ?>
			            	<div class="pmeta font-second">
			            		<?php echo $cate_name; ?>
			            	</div>
			            	<?php } ?>
			                <h4 class="project-name">
			                	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			                </h4>
			                <?php if( $settings['show_exc'] && $settings['exc_num'] ) echo '<p>'.industris_excerpt($settings['exc_num']).'</p>'; ?>
			                <?php if( $settings['detail_btn'] ) { ?><div class="verticle"><a class="btn-details" href="<?php the_permalink(); ?>"><?php echo $settings['detail_btn']; ?></a></div><?php } ?>
		                </div>
		            </div>
	                <?php endwhile; wp_reset_postdata(); ?>
	            </div>
	            <nav class="slide-controls iarrow">
			        <button type="button" class="prev-nav"><i class="icon ion-ios-arrow-dropleft"></i></button>
			        <button type="button" class="next-nav"><i class="icon ion-ios-arrow-dropright"></i></button>
			    </nav>
            </div>   
	    </div>
	    <?php
	}

	protected function _content_template() {}

	protected function select_param_projects() {
		$args = array(
		     'numberposts' => -1,
		     'post_type'   => 'ot_portfolio'
		);
	  	$projects = get_posts( $args );
	  	$proj = array();
	  	foreach( $projects as $item ) {
	     	if( $item ) {
	        	$proj[$item->ID] = $item->post_title;
	     	}
	  	}
	  	return $proj;
	}
}
// After the Industris_FeaturedProjects2 class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_FeaturedProjects2() );