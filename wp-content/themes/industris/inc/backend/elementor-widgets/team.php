<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Team
 */
class Industris_Team extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'bteam';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Team', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-lock-user';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		/**TAB_CONTENT**/
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Member Team', 'industris' ),
			]
		);

		$this->add_control(
	       'member_image',
	        [
	           'label' => esc_html__( 'Photo', 'industris' ),
	           'type'  => Controls_Manager::MEDIA,
				'default' => [
					'url' => get_template_directory_uri().'/images/member1.png',
			  	],
		    ]
	    );

	    $this->add_control(
		    'member_name',
	      	[
	          'label' => esc_html__( 'Name', 'industris' ),
	          'type'  => Controls_Manager::TEXTAREA,
	          'default' => esc_html__( 'Jonathan Morgan', 'industris' ),
	    	]
	    );

	    $this->add_control(
		    'member_des',
	      	[
	          'label' => esc_html__( 'Description', 'industris' ),
	          'type'  => Controls_Manager::TEXTAREA,
	          'default' => esc_html__( 'President and Chief Executive Officer (CEO)', 'industris' ),
	    	]
	    );

		$repeater = new Repeater();
		$repeater->add_control(
	      	'title',
		    [
		        'label'   => esc_html__( 'Name', 'industris' ),
		        'type'    => Controls_Manager::TEXT,
		        'default' => esc_html__( 'Social', 'industris' ),
		    ]
	    );

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__( 'Icon', 'industris' ),
                'type'  => Controls_Manager::ICONS,
                'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fab fa-twitter',
					'library' => 'fa-brand',
				],
            ]
        );

        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__( 'Link', 'industris' ),
                'type'  => Controls_Manager::URL,
                'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://', 'industris' ),
				'default' => [
					'url' => 'https://', 
				],
            ]
        );

		$this->add_control(
		    'social_share',
		    [
		        'label'       => esc_html__( 'Socials', 'industris' ),
		        'type'        => Controls_Manager::REPEATER,
		        'show_label'  => true,
		        'default'     => [
		            [
		             	'title'       => esc_html__( 'Twitter', 'industris' ),
		                'social_link' => esc_html__( 'https://www.twitter.com/', 'industris' ),
		                'social_icon' => [
							'value' => 'fab fa-twitter',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Facebook', 'industris' ),
		                'social_link' => esc_html__( 'https://www.facebook.com/', 'industris' ),
		                'social_icon' => [
							'value' => 'fab fa-facebook',
							'library' => 'fa-brand',
						],
		 
		            ],
		            [
		             	'title'       => esc_html__( 'Linkedin', 'industris' ),
		                'social_link' => esc_html__( 'https://www.linkedin.com/', 'industris' ),
		                'social_icon' => [
							'value' => 'fab fa-linkedin',
							'library' => 'fa-brand',
						],
		 
		            ]
		        ],
		        'fields'      => array_values( $repeater->get_controls() ),
		        'title_field' => '{{{title}}}',
		    ]
		);

		$this->end_controls_section();

		/**TAB_STYLE**/
		$this->start_controls_section(
			'image_style',
			[
				'label' => esc_html__( 'Photo', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'member_image[url]!' => '',
				]
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => esc_html__( 'Width(px)', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 150,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-thumb' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_space',
			[
				'label' => esc_html__( 'Spacing(px)', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-thumb' => 'padding-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_radius',
			[
				'label' => esc_html__( 'Border Radius(%)', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-thumb img' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Infomation', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'selector' => '{{WRAPPER}} .team-wrap .team-info'
			]
		);

		$this->add_responsive_control(
			'info_space',
			[
				'label' => esc_html__( 'Spacing', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
			]
		);

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
				'label' => esc_html__( 'Spacing(px)', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info h4' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'title_typography',
					'label'    => esc_html__( 'Typography', 'industris' ),
					'selector' => '{{WRAPPER}} .team-wrap .team-info h4',
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

		$this->add_responsive_control(
			'des_space',
			[
				'label' => esc_html__( 'Spacing(px)', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'des_color',
			[
				'label'     => esc_html__( 'Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-info p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
				[
					'name'     => 'des_typography',
					'label'    => esc_html__( 'Typography', 'industris' ),
					'selector' => '{{WRAPPER}} .team-wrap .team-info p',
				]
		);

		$this->end_controls_section();

		//Socials
		$this->start_controls_section(
			'icon_style',
			[
				'label' => esc_html__( 'Social Icon', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Font Size', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 12,
						'max' => 40,
					],
				],
				'selectors' => [
					'{{WRAPPER}}  .team-wrap .team-social a' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_space',
			[
				'label' => esc_html__( 'Spacing', 'industris' ),
				'type'  => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -10,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'industris' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .team-wrap .team-social a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="team-wrap dtable">
			<?php if( $settings['member_image']['url'] ) { ?>
			<div class="team-thumb dcell">
				<img src="<?php echo $settings['member_image']['url']; ?>" alt="<?php echo $settings['member_name'];?>">
			</div>
			<?php } ?>
			<div class="team-info dcell">
				<h4><?php echo $settings['member_name']; ?></h4>
				<p><?php echo $settings['member_des'] ?></p>
				<?php if ( ! empty( $settings['social_share'] ) ) : ?>
                    <div class="team-social">
                        <?php foreach ( $settings['social_share'] as $social ) : ?>
                            <?php if ( ! empty( $social['social_link'] ) ) : ?>
                                <a <?php if($social['social_link']['is_external'])
                                { echo 'target="_blank"'; }else{ echo 'rel="nofollow"';}?> 
                                        href="<?php echo $social['social_link']['url'];?>" class="<?php  echo strtolower($social['title']);?>">
                                     <i class="fab <?php echo esc_attr( $social['social_icon']['value']); ?>"></i>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>  
                <?php endif; ?>
			</div>
		</div>
	        
	    <?php
	}

	protected function _content_template() {}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Team() );