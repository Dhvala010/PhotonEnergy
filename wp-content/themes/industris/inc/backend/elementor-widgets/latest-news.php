<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: News Slider
 */
class Industris_Latest_News extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'industris-latest-news';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Latest News', 'industris' );
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

		//Content Service box
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'industris' ),
			]
		);

		$this->add_control(
			'idpost',
			[
				'label' => __( 'News List', 'industris' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_news(),
				'multiple' => true,
				'label_block' => true
			]
		);

		$this->add_control(
			'exc',
			[
				'label' => esc_html__( 'Number Excerpt Length', 'industris' ),
				'type' => Controls_Manager::NUMBER,
				'default' => '30',
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Slide To Show', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
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
            'display_meta',
            [
                'label' => __('Display Meta', 'industris'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'industris'),
                'label_off' => __('Hidden', 'industris'),
                'return_value' => 'yes',
                'default' => 'yes',
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

		/*Style*/
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Inner post', 'industris' ),
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
					'{{WRAPPER}} .post-box .inner-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .post-box .inner-post' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'heading_border',
			[
				'label' => __( 'Border', 'industris' ),
				'type' => Controls_Manager::HEADING,
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
				'selector' => '{{WRAPPER}} .post-box .inner-post',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .post-box .inner-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .post-box .inner-item',
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
				'selector' => '{{WRAPPER}} .news-slider .post-box:hover .inner-post',
			]
		);

		$this->add_responsive_control(
			'border_radius_hover',
			[
				'label' => __( 'Border Radius', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .news-slider .post-box:hover .inner-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow_hover',
				'selector' => '{{WRAPPER}} .news-slider .post-box:hover .inner-item',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		//Category
		$this->add_control(
			'heading_cat',
			[
				'label' => __( 'Category', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'display_meta' => 'yes',
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
					'{{WRAPPER}} .post-box .inner-post .entry-meta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'display_meta' => 'yes',
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
					'{{WRAPPER}} .post-box .inner-post .entry-meta a, {{WRAPPER}} .post-box .inner-post .entry-meta > span:not(:last-child):after' => 'color: {{VALUE}};',
				],
				'condition' => [
					'display_meta' => 'yes',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'selector' => '{{WRAPPER}} .post-box .inner-post .entry-meta',
				'condition' => [
					'display_meta' => 'yes',
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
					'{{WRAPPER}} .post-box .inner-post h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .post-box .inner-post h4 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .post-box .inner-post h4 a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .post-box .inner-post h4',
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
					'exc!' => [ 0,''],
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
					'{{WRAPPER}} .entry-summary p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'exc!' => [ 0,''],
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
					'{{WRAPPER}} .entry-summary p' => 'color: {{VALUE}};',
				],
				'condition' => [
					'exc!' => [ 0,''],
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'exc_typography',
				'selector' => '{{WRAPPER}} .entry-summary p',
				'condition' => [
					'exc!' => [ 0,''],
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
		<div class="news-slider iarrow <?php if( $settings['pos_nav'] == 'mid' ) echo 'arrow-s2';?> row" data-show="<?php echo esc_attr($settings['number']); ?>" data-auto="<?php echo esc_attr($settings['auto']); ?>" data-dots="<?php echo esc_attr($settings['dots']); ?>" data-arrow="<?php echo esc_attr($settings['arrows']); ?>">
        	<?php

	        $args = array(
	            'post_type' => 'post',
	            'posts_per_page' => -1,
	            'post__in' => $settings['idpost']
	        );
	        $blogpost = new \WP_Query($args);
	        if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();
	            $format = get_post_format();
	        ?>
	            <div>
	                <article class="news-item post-box">
	                    <div class="inner-item">
	                        <?php if ( has_post_thumbnail() ) : ?>
	                        <div class="entry-media">
	                            <a href="<?php the_permalink(); ?>">
	                                <?php the_post_thumbnail('industris-latest-news-thumbnail'); ?>
	                            </a>
	                        </div>
	                        <?php endif; ?>
	                        <div class="inner-post">
	                        	<?php if( $settings['display_meta'] ){ ?>
	                        	<div class="entry-meta">
	                        		<?php industris_post_meta(); ?>
	                        	</div>
	                        	<?php } ?>
	                            <h4 class="entry-title">
	                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	                            </h4>
	                            <?php if($settings['exc'] != 0) echo wp_specialchars_decode('<div class="entry-summary"><p>'.industris_excerpt( $settings['exc'] ).'</p></div>'); ?>
	                            <?php if( $settings['detail_btn'] ) { ?>
	                            	<a class="post-link btn-details" href="<?php the_permalink(); ?>"><?php echo $settings['detail_btn']; ?></a>
	                            <?php } ?>
	                            
	                        </div>
	                    </div>
	                </article>
	            </div>
	        <?php endwhile; wp_reset_postdata(); endif; ?>
	    </div>
		<?php
	}

	protected function _content_template() {}

	protected function select_param_news() {
	    $args = array(
	        'numberposts' => -1, // 'numberposts' and 'posts_per_page' can be used interchangeably.
	        'post_type'   => 'post'
	    );
	    $posts = get_posts( $args );
	    $cat = array();
	    foreach( $posts as $post ) {
	        if( $post ) {
	            $cat[$post->ID] = $post->post_title;
	        }
	    }
	    return $cat;
	}
}
// After the Industris_Latest_News class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Latest_News() );