<?php
namespace Elementor; // Custom widgets must be defined in the Elementor namespace
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)

/**
 * Widget Name: Portfolio Filter
 */
class Industris_PortfolioFilter extends Widget_Base{

 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.
	public function get_name() {
		return 'ipfilter';
	}

	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.
	public function get_title() {
		return __( 'Industris Portfolio Filter', 'industris' );
	}

	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.
	public function get_icon() {
		return 'eicon-gallery-grid';
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
				'label' => __( 'General', 'industris' ),
			]
		);

		$this->add_control(
			'project_cat',
			[
				'label' => __( 'Select Categories', 'industris' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->select_param_cate_project(),
				'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'industris' ),
			]
		);
		$this->add_control(
			'filter',
			[
				'label' => __( 'Show Filter', 'industris' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'industris' ),
				'label_off' => __( 'Hide', 'industris' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'all_text',
			[
				'label' => __( 'All Text', 'industris' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => 'All',
				'condition' => [
					'filter' => 'yes',
				],
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
					'{{WRAPPER}} .project-item' => 'margin-bottom: {{SIZE}}{{UNIT}}; padding: 0 calc({{SIZE}}{{UNIT}}/2);',
					'{{WRAPPER}} .grid-projects' => 'margin: 0 calc(-{{SIZE}}{{UNIT}}/2);',
					'.elementor-section-full_width:not(.elementor-inner-section) .grid-projects' => 'margin: 0 calc({{SIZE}}{{UNIT}}/2)!important;',
				],
				'condition' => [
					'gaps' => 'yes',
				]
			]
		);
		$this->add_control(
			'project_num',
			[
				'label' => __( 'Show Number Projects', 'industris' ),
				'type' => Controls_Manager::NUMBER,
				'dynamic' => [
					'active' => true,
				],
				'default' => '9',
			]
		);
		
		//Overlay
		$this->add_control(
			'heading_overlay',
			[
				'label' => __( 'Overlay', 'industris' ),
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
			'filter_style_section',
			[
				'label' => __( 'Filter', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'filter' => 'yes',
				]
			]
		);
		$this->add_responsive_control(
			'filter_align',
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
				'selectors' => [
					'{{WRAPPER}} .cat-filter' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'filter_spacing',
			[
				'label' => __( 'Spacing', 'industris' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cat-filter' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'filter_bcolor',
			[
				'label' => __( 'Border Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cat-filter' => 'border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'filter_color',
			[
				'label' => __( 'Text Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cat-filter a' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'filter_hcolor',
			[
				'label' => __( 'Text Hover Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cat-filter a:hover, {{WRAPPER}} .cat-filter a.selected' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filter_typography',
				'selector' => '{{WRAPPER}} .cat-filter',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'overlay_style_section',
			[
				'label' => __( 'Overlay Box', 'industris' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'overlay_align',
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
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				// 'prefix_class' => 'industris%s-align-',
				'selectors' => [
					'{{WRAPPER}} .project-item' => 'text-align: {{VALUE}};',
				],
				'default' => '',
			]
		);
		$this->add_responsive_control(
			'overlay_padd',
			[
				'label' => __( 'Padding', 'industris' ),
				'type' => Controls_Manager::DIMENSIONS,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .project-item .overlay' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'overlay_bg',
			[
				'label' => __( 'Color', 'industris' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .project-item .overlay' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .project-item .pmeta' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .project-item .pmeta' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .project-item .pmeta',
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
					'{{WRAPPER}} .project-item h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .project-item h4 a' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .project-item h4 a:hover' => 'color: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .project-item h4',
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
					'{{WRAPPER}} .project-item p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .project-item p' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .project-item p',
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

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="project-filter">
	        <?php if( $settings['filter'] ) { ?>
	        	<div class="container">
		            <div id="filters" class="cat-filter">
		                <?php if( $settings['all_text'] ) { ?><a href="#" data-filter="*" class="filter-item all-cat selected"><?php echo esc_html( $settings['all_text'] ); ?></a><?php } ?>

		                <?php
		                if( $settings['project_cat'] ){

		                    $categories = $settings['project_cat'];
		                    foreach( (array)$categories as $categorie){
		                        $cates = get_term_by('slug', $categorie, 'portfolio_cat');
		                        $cat_name = $cates->name;
		                        $cat_slug = $cates->slug;

		                ?>

		                    <a href="#" data-filter=".<?php echo esc_attr( $cat_slug ); ?>" class="filter-item"><?php echo esc_html( $cat_name ); ?></a>

		                <?php } }else{

		                    $categories = get_terms('portfolio_cat');
		                    foreach( (array)$categories as $categorie){
		                        $cat_name = $categorie->name;
		                        $cat_slug = $categorie->slug;
		                    ?>

		                    <a href="#" data-filter=".<?php echo esc_attr( $cat_slug ); ?>" class="filter-item"><?php echo esc_html( $cat_name ); ?></a>

		                <?php } } ?>
		            </div>
	            </div>
	        <?php } ?>
	        <div id="projects" class="grid-projects row <?php if( !$settings['gaps'] ) echo 'no-gaps'; ?>">
	            <?php
	            if( $settings['project_cat'] ){
	                $args = array(
	                    'posts_per_page' => $settings['project_num'],
	                    'post_type' => 'ot_portfolio',
	                    'tax_query' => array(
	                        array(
	                            'taxonomy' => 'portfolio_cat',
	                            'field' => 'slug',
	                            'terms' => $settings['project_cat'],
	                        ),
	                    ),              
	                );
	            }else{
	                $args = array(
	                    'post_type' => 'ot_portfolio',
	                    'posts_per_page' => $settings['project_num'],
	                );
	            }
	            $wp_query = new \WP_Query($args);
	            while ($wp_query -> have_posts()) : $wp_query -> the_post();
	                $cates = get_the_terms(get_the_ID(),'portfolio_cat');
	                $cate_name ='';
	                $cate_slug = '';
	                foreach((array)$cates as $cate){
	                    if(count($cates)>0){
	                        $cate_name .= $cate->name .'<span> / </span>';
	                        $cate_slug .= $cate->slug.' ';
	                    }
	                }

	                if( $settings['column'] == 4 ){
	                    $column = 'col-lg-3 col-md-4 col-sm-6';
	                }elseif( $settings['column'] == 2 ){
	                    $column = 'col-md-6 col-sm-6';
	                }else{
	                    $column = 'col-md-4 col-sm-6';
	                }

	                ?>

	                <div class="project-item <?php echo esc_attr( $cate_slug.$column ); ?>">
						<div class="relative">
			                <div class="overlay">
			                	<?php if( $settings['show_cat'] ) { ?>
			                	<div class="pmeta font-second">
			                		<?php the_terms( $settings['project_cat'], 'portfolio_cat', '', ' / ' ); ?>
			                	</div>
			                	<?php } ?>
		                        <h4 class="project-name">
		                        	<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                        </h4>
		                        <?php if( $settings['show_exc'] ) the_excerpt(); ?>
		                        <?php if( $settings['detail_btn'] ) { ?><a class="btn-details" href="<?php the_permalink(); ?>"><?php echo $settings['detail_btn']; ?></a><?php } ?>
			                </div>
			                <a href="<?php the_permalink(); ?>">
			                	<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="<?php the_title(); ?>" />
			                </a>
		                </div>
					</div>

	            <?php endwhile; wp_reset_postdata(); ?>
	        </div>
	    </div>

	    <?php
	}

	protected function _content_template() {}

	protected function select_param_cate_project() {
	  	$category = get_terms( 'portfolio_cat' );
	  	$cat = array();
	  	foreach( $category as $item ) {
	     	if( $item ) {
	        	$cat[$item->slug] = $item->name;
	     	}
	  	}
	  	return $cat;
	}
}
// After the Schedule class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new Industris_PortfolioFilter() );