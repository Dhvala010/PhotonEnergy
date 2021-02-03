<?php 
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Image Slider
 */
class Industris_Image_Carousel extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'industris-image-carousel';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Image Carousel', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-slider-push';
	}

	// The get_categories method, lets you set the category of the widget, return the category name as a string.
	public function get_categories() {
		return [ 'category_industris' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Image Carousel', 'industris' ),
			]
		);

		$this->add_control(
			'carousel',
			[
				'label' => __( 'Add Images', 'industris' ),
				'type' => Controls_Manager::GALLERY,
				'default' => [],
				'show_label' => false,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Additional Options', 'industris' ),
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
					'{{WRAPPER}} .img-item' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .image-carousel' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
				],
				'condition' => [
					'gaps' => 'yes',
				]
			]
		);

		$slides_show = range( 1, 7 );
		$slides_show = array_combine( $slides_show, $slides_show );

		$this->add_control(
			'slides_show',
			[
				'label' => __( 'Slides To Show', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'options' => $slides_show,
				'default' => '1'
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => __( 'Navigation', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'arrows',
				'options' => [
					'both' => __( 'Arrows and Dots', 'industris' ),
					'arrows' => __( 'Arrows', 'industris' ),
					'dots' => __( 'Dots', 'industris' ),
					'none' => __( 'None', 'industris' ),
				],
			]
		);

		$this->add_control(
            'auto',
            [
                'label' => __('Autoplay ?', 'industris'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'industris'),
                'label_off' => __('No', 'industris'),
                'return_value' => 'true',
                'default' => 'true',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'navigation_section',
			[
				'label' => __( 'Navigation', 'industris' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'navigation' => [ 'arrows', 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
			'arrow_style',
			[
				'label' => __( 'Arrow', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);

		$this->add_control(
			'pos_arrow',
			[
				'label' => __( 'Position Arrows', 'industris' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => __( 'Top', 'industris' ),
					'mid' => __( 'Middle', 'industris' ),
				],
				'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
			]
		);
		$this->add_responsive_control(
			'spacing_arrow',
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
					'navigation' => [ 'arrows', 'both' ],
					'pos_arrow' => 'top',
				]
			]
		);
		$this->add_responsive_control(
			'spacing_arrow_s2',
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
					'navigation' => [ 'arrows', 'both' ],
					'pos_arrow' => 'mid',
				]
			]
		);

		$this->add_control(
            'arrow_color',
            [
                'label' => __( 'Color', 'industris' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-carousel .slick-arrow' => 'color: {{VALUE}};',
                ],
                'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
            ]
        );

        $this->add_control(
            'arrow_color_hover',
            [
                'label' => __( 'Hover', 'industris' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .image-carousel .slick-arrow:hover' => 'color: {{VALUE}};',
                ],
                'condition' => [
					'navigation' => [ 'arrows', 'both' ],
				],
            ]
        );

        $this->add_control(
			'dot_style',
			[
				'label' => __( 'Dot', 'industris' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
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
				'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
			]
		);

		$this->add_control(
            'dot_color',
            [
                'label' => __( 'Color', 'industris' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'border: 1px solid {{VALUE}};',
                ],
                'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
            ]
        );

        $this->add_control(
            'dot_color_active',
            [
                'label' => __( 'Color Active', 'industris' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li.slick-active button' => 'background: {{VALUE}};',
                ],
                'condition' => [
					'navigation' => [ 'dots', 'both' ],
				],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$arr  = ( in_array( $settings['navigation'], [ 'arrows', 'both' ] ) ) ? 'true' : 'false';
		$dots = ( in_array( $settings['navigation'], [ 'dots', 'both' ] ) ) ? 'true' : 'false';

		if ( empty( $settings['carousel'] ) ) {
			return;
		}

		$slides = [];

		foreach ( $settings['carousel'] as  $attachment ) {

			$meta = wp_prepare_attachment_for_js($attachment['id']);
            $link = $meta['caption'];
            $image_html = wp_get_attachment_image($attachment['id'],'full');
            $link_tag = '';
			if( $link ){
				$link_tag = '<a href="'. $link .'" target="_blank">';
			}
			$slide_html = '<div><div class="img-item">' . $link_tag . '<figure>' . $image_html . '</figure>';

			if( $link ){
				$slide_html .= '</a>';
			}
			$slide_html .= '</div></div>';
			$slides[] = $slide_html;

		}
		if ( empty( $slides ) ) {
			return;
		}
		?>

		<div class="image-carousel iarrow <?php if( $settings['pos_arrow'] == 'mid' ) echo 'arrow-s2'; if( !$settings['gaps'] ) echo ' no-gaps'; ?>" data-show="<?php echo esc_attr( $settings['slides_show'] ); ?>" data-arrow="<?php echo esc_attr( $arr ); ?>" data-dots="<?php echo esc_attr( $dots ); ?>" data-auto="<?php echo esc_attr( $settings['auto'] ); ?>">
	        <?php echo implode( '', $slides ); ?>
	    </div>
		<?php 
		
	}

	protected function _content_template() {}

}
// After the Industris_Image_Carousel class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_Image_Carousel() );