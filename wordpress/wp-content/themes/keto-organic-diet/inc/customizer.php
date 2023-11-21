<?php
/**
 * Keto Organic Diet Theme Customizer
 *
 * @package Keto Organic Diet
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function keto_organic_diet_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'keto_organic_diet_custom_controls' );

function keto_organic_diet_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'keto_organic_diet_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'keto_organic_diet_Customize_partial_blogdescription',
	));

	//Homepage Settings
	$wp_customize->add_panel( 'keto_organic_diet_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_panel_id',
		'priority' => 20, 
	));

	//Topbar
	$wp_customize->add_section( 'keto_organic_diet_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'keto-organic-diet' ),
			'panel' => 'keto_organic_diet_homepage_panel'
	) );

  	// Header Background color
	$wp_customize->add_setting('keto_organic_diet_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_header_background_color', array(
		'label'    => __('Header Background Color', 'keto-organic-diet'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('keto_organic_diet_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','keto-organic-diet'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'keto-organic-diet' ),
			'center top'   => esc_html__( 'Top', 'keto-organic-diet' ),
			'right top'   => esc_html__( 'Top Right', 'keto-organic-diet' ),
			'left center'   => esc_html__( 'Left', 'keto-organic-diet' ),
			'center center'   => esc_html__( 'Center', 'keto-organic-diet' ),
			'right center'   => esc_html__( 'Right', 'keto-organic-diet' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'keto-organic-diet' ),
			'center bottom'   => esc_html__( 'Bottom', 'keto-organic-diet' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'keto-organic-diet' ),
		),
	));

	$wp_customize->add_setting( 'keto_organic_diet_topbar_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));  
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_topbar_hide_show',array(
    'label' => esc_html__( 'Show / Hide Topbar','keto-organic-diet' ),
    'section' => 'keto_organic_diet_topbar_section'
  )));

  $wp_customize->add_setting('keto_organic_diet_header_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_header_address',array(
		'label'	=> __('Add Location','keto-organic-diet'),
		'input_attrs' => array(
        'placeholder' => __( '1870 lorem ipsum dummy street, COUNTRY', 'keto-organic-diet' ),
    	),
		'section'=> 'keto_organic_diet_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('keto_organic_diet_email_address',array(
		'label'	=> esc_html__('Email Address','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'example@gmail.com', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_topbar_section',
		'type'=> 'Email'
	));

	// Middle Header
	$wp_customize->add_setting('keto_organic_diet_cosulation_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('keto_organic_diet_cosulation_btn_text',array(
		'label'	=> esc_html__('Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Get Free Consulation!', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_topbar_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_cosulation_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('keto_organic_diet_cosulation_btn_link',array(
		'label'	=> esc_html__('Button Link','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'https://www.example.com', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_topbar_section',
		'type'=> 'url'
	));

	//Menus Settings
	$wp_customize->add_section( 'keto_organic_diet_menu_section' , array(
  	'title' => __( 'Menus Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_homepage_panel'
	) );

	$wp_customize->add_setting('keto_organic_diet_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_navigation_menu_font_weight',array(
    'default' => 700,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_navigation_menu_font_weight',array(
    'type' => 'select',
    'label' => __('Menus Font Weight','keto-organic-diet'),
    'section' => 'keto_organic_diet_menu_section',
    'choices' => array(
    	'100' => __('100','keto-organic-diet'),
        '200' => __('200','keto-organic-diet'),
        '300' => __('300','keto-organic-diet'),
        '400' => __('400','keto-organic-diet'),
        '500' => __('500','keto-organic-diet'),
        '600' => __('600','keto-organic-diet'),
        '700' => __('700','keto-organic-diet'),
        '800' => __('800','keto-organic-diet'),
        '900' => __('900','keto-organic-diet'),
      ),
	) );

	// text trasform
	$wp_customize->add_setting('keto_organic_diet_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','keto-organic-diet'),
		'choices' => array(
      'Uppercase' => __('Uppercase','keto-organic-diet'),
      'Capitalize' => __('Capitalize','keto-organic-diet'),
      'Lowercase' => __('Lowercase','keto-organic-diet'),
    ),
		'section'=> 'keto_organic_diet_menu_section',
	));

	$wp_customize->add_setting('keto_organic_diet_menus_item_style',array(
    'default' => '',
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_menus_item_style',array(
    'type' => 'select',
    'section' => 'keto_organic_diet_menu_section',
		'label' => __('Menu Item Hover Style','keto-organic-diet'),
		'choices' => array(
      'None' => __('None','keto-organic-diet'),
      'Zoom In' => __('Zoom In','keto-organic-diet'),
      ),
	) );

	$wp_customize->add_setting('keto_organic_diet_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_header_menus_color', array(
		'label'    => __('Menus Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_menu_section',
	)));

	$wp_customize->add_setting('keto_organic_diet_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_menu_section',
	)));

	$wp_customize->add_setting('keto_organic_diet_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_menu_section',
	)));

	$wp_customize->add_setting('keto_organic_diet_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'keto_organic_diet_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'keto-organic-diet' ),
  	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/keto-wordpress-theme/">GO PRO</a>','keto-organic-diet'),
		'panel' => 'keto_organic_diet_homepage_panel'
	) );

	$wp_customize->add_setting( 'keto_organic_diet_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));  
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','keto-organic-diet' ),
      'section' => 'keto_organic_diet_slidersettings'
  )));

  $wp_customize->add_setting('keto_organic_diet_slider_type',array(
    'default' => 'Default slider',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_slider_type', array(
    'type' => 'select',
    'label' => __('Slider Type','keto-organic-diet'),
    'section' => 'keto_organic_diet_slidersettings',
    'choices' => array(
      'Default slider' => __('Default slider','keto-organic-diet'),
      'Advance slider' => __('Advance slider','keto-organic-diet'),
    ),
	));

	$wp_customize->add_setting('keto_organic_diet_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','keto-organic-diet'),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_advance_slider'
	));

  //Selective Refresh
  $wp_customize->selective_refresh->add_partial('keto_organic_diet_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'keto_organic_diet_customize_partial_keto_organic_diet_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'keto_organic_diet_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'keto_organic_diet_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'keto_organic_diet_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'keto-organic-diet' ),
			'description' => __('Slider image size (1400 x 550)','keto-organic-diet'),
			'section'  => 'keto_organic_diet_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'keto_organic_diet_default_slider'
		) );
	}

	$wp_customize->add_setting('keto_organic_diet_slider_button_text',array(
		'default'=> 'READ MORE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'READ MORE', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

  //Slider content padding
  $wp_customize->add_setting('keto_organic_diet_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','keto-organic-diet'),
		'description'	=> __('Enter a value in %. Example:20%','keto-organic-diet'),
		'input_attrs' => array(
    	'placeholder' => __( '50%', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	$wp_customize->add_setting('keto_organic_diet_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','keto-organic-diet'),
		'description'	=> __('Enter a value in %. Example:20%','keto-organic-diet'),
		'input_attrs' => array(
		'placeholder' => __( '50%', 'keto-organic-diet' ),
		  ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	//content layout
	$wp_customize->add_setting('keto_organic_diet_slider_content_option',array(
    'default' => 'Left',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new keto_organic_diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_slider_content_option', array(
    'type' => 'select',
    'label' => __('Slider Content Layouts','keto-organic-diet'),
    'section' => 'keto_organic_diet_slidersettings',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
  	'active_callback' => 'keto_organic_diet_default_slider'
	)));

  //Slider excerpt
	$wp_customize->add_setting( 'keto_organic_diet_slider_excerpt_number', array(
		'default'              => 12,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_slidersettings',
		'type'        => 'range',
		'settings'    => 'keto_organic_diet_slider_content_option',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'keto_organic_diet_default_slider'
	) );

	$wp_customize->add_setting( 'keto_organic_diet_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'keto_organic_diet_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','keto-organic-diet'),
		'section' => 'keto_organic_diet_slidersettings',
		'type'  => 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	) );

	$wp_customize->add_setting('keto_organic_diet_horizontal_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_horizontal_text',array(
		'label'	=> esc_html__('Section Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Keeping Your Body AT It Best!', 'keto-organic-diet' ),),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));	

	$wp_customize->add_setting('keto_organic_diet_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Read More', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	//content layout
	$wp_customize->add_setting('keto_organic_diet_slider_content_option',array(
    'default' => 'Left',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new keto_organic_diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_slider_content_option', array(
    'type' => 'select',
    'label' => __('Slider Content Layouts','keto-organic-diet'),
    'section' => 'keto_organic_diet_slidersettings',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'keto_organic_diet_default_slider'
	)));

  //Slider content padding
    $wp_customize->add_setting('keto_organic_diet_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','keto-organic-diet'),
		'description'	=> __('Enter a value in %. Example:20%','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '50%', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	$wp_customize->add_setting('keto_organic_diet_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','keto-organic-diet'),
		'description'	=> __('Enter a value in %. Example:20%','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '50%', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	//Slider excerpt
	$wp_customize->add_setting( 'keto_organic_diet_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_slidersettings',
		'type'        => 'range',
		'settings'    => 'keto_organic_diet_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'keto_organic_diet_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('keto_organic_diet_slider_opacity_color',array(
	  'default'              => 0.5,
	  'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));

	$wp_customize->add_control( 'keto_organic_diet_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_slidersettings',
		'type'        => 'select',
		'settings'    => 'keto_organic_diet_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','keto-organic-diet'),
	      '0.1' =>  esc_attr('0.1','keto-organic-diet'),
	      '0.2' =>  esc_attr('0.2','keto-organic-diet'),
	      '0.3' =>  esc_attr('0.3','keto-organic-diet'),
	      '0.4' =>  esc_attr('0.4','keto-organic-diet'),
	      '0.5' =>  esc_attr('0.5','keto-organic-diet'),
	      '0.6' =>  esc_attr('0.6','keto-organic-diet'),
	      '0.7' =>  esc_attr('0.7','keto-organic-diet'),
	      '0.8' =>  esc_attr('0.8','keto-organic-diet'),
	      '0.9' =>  esc_attr('0.9','keto-organic-diet')
	),'active_callback' => 'keto_organic_diet_default_slider'
	));

	$wp_customize->add_setting( 'keto_organic_diet_slider_image_overlay',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));
  $wp_customize->add_control( new keto_organic_diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_slider_image_overlay',array(
  	'label' => esc_html__( 'Show / Hide Slider Image Overlay','keto-organic-diet' ),
  	'section' => 'keto_organic_diet_slidersettings',
  	'active_callback' => 'keto_organic_diet_default_slider'
  )));

  $wp_customize->add_setting('keto_organic_diet_slider_image_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_slidersettings',
		'active_callback' => 'keto_organic_diet_default_slider'
	)));

	//Slider height
	$wp_customize->add_setting('keto_organic_diet_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_slider_height',array(
		'label'	=> __('Slider Height','keto-organic-diet'),
		'description'	=> __('Specify the slider height (px).','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '500px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_slidersettings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_default_slider'
	));

	$wp_customize->add_setting( 'keto_organic_diet_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	));
	$wp_customize->add_control( new keto_organic_diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','keto-organic-diet' ),
		'section' => 'keto_organic_diet_slidersettings',
		'active_callback' => 'keto_organic_diet_default_slider'
	)));

	$wp_customize->add_setting('keto_organic_diet_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'keto_organic_diet_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_slidersettings',
		'setting'	=> 'keto_organic_diet_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'keto_organic_diet_default_slider'
	)));

	$wp_customize->add_setting('keto_organic_diet_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'keto_organic_diet_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_slidersettings',
		'setting'	=> 'keto_organic_diet_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'keto_organic_diet_default_slider'
	)));

	//Contact Us Now Section
	$wp_customize->add_section('keto_organic_diet_contact_us_now', array(
		'title'       => __('Contact Us Now Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_contact_us_now_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_contact_us_now_text',array(
		'description' => __('<p>1. More options for contact us now section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for contact us now section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_contact_us_now',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_contact_us_now_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_contact_us_now_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_contact_us_now',
		'type'=> 'hidden'
	));	

	//About Us Section
	$wp_customize->add_section('keto_organic_diet_about', array(
		'title'       => __('About Us Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_about',
		'type'=> 'hidden'
	));	

	//Get In Touch Section
	$wp_customize->add_section('keto_organic_diet_get_in_touch', array(
		'title'       => __('Get In Touch Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_get_in_touch_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_get_in_touch_text',array(
		'description' => __('<p>1. More options for get in touch section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for get in touch section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_get_in_touch',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_get_in_touch_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_get_in_touch_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_get_in_touch',
		'type'=> 'hidden'
	));	

	//Program Offers Section
	$wp_customize->add_section('keto_organic_diet_program_offers', array(
		'title'       => __('Program Offers Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_program_offers_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_program_offers_text',array(
		'description' => __('<p>1. More options for program offers section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for program offers section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_program_offers',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_program_offers_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_program_offers_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_program_offers',
		'type'=> 'hidden'
	));	

	// Natural Life Section
	$wp_customize->add_section('keto_organic_diet_services',array(
		'title'	=> __('Natural Life Section','keto-organic-diet'),
		'description' => __('For more options of natural life section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/keto-wordpress-theme/">GO PRO</a>','keto-organic-diet'),
		'panel' => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_section_text',array(
		'label'	=> esc_html__('Section Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'OUR EXCLUSIVE BLOG', 'keto-organic-diet' ),),
		'section'=> 'keto_organic_diet_services',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_section_title',array(
		'label'	=> esc_html__('Section Title','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'How Natural Life Helps You Feel Better', 'keto-organic-diet' ),),
		'section'=> 'keto_organic_diet_services',
		'type'=> 'text'
	));

	$arg =  array( 'numberposts' => -1);
   	$post_list = get_posts( $arg );
	$i = 0;
	$pst[]='Select';  
	foreach($post_list as $post){
	$pst[$post->post_title] = $post->post_title;
	}
	$wp_customize->add_setting('keto_organic_diet_video_post',array(
		'default'	=> 'select',
		'sanitize_callback' => 'keto_organic_diet_sanitize_choices',
	));
	$wp_customize->add_control('keto_organic_diet_video_post',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select Video Post','keto-organic-diet'),
		'section' => 'keto_organic_diet_services',
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('keto_organic_diet_features_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'keto_organic_diet_sanitize_choices',
	));
	$wp_customize->add_control('keto_organic_diet_features_category',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Features Post','keto-organic-diet'),
		'section' => 'keto_organic_diet_services',
	));

	//Our Team Section
	$wp_customize->add_section('keto_organic_diet_our_team', array(
		'title'       => __('Our Team Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_our_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_our_team_text',array(
		'description' => __('<p>1. More options for our team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for our team section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_our_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_our_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_our_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_our_team',
		'type'=> 'hidden'
	));	

	//Healthy Recipes Section
	$wp_customize->add_section('keto_organic_diet_healthy_recipes', array(
		'title'       => __('Healthy Recipes Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_healthy_recipes_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_healthy_recipes_text',array(
		'description' => __('<p>1. More options for healthy recipes section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for healthy recipes section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_healthy_recipes',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_healthy_recipes_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_healthy_recipes_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_healthy_recipes',
		'type'=> 'hidden'
	));	

	//Testimonial Section
	$wp_customize->add_section('keto_organic_diet_testimonial', array(
		'title'       => __('Testimonial Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_testimonial',
		'type'=> 'hidden'
	));	

	//Pricing Plans Section
	$wp_customize->add_section('keto_organic_diet_pricing_plans', array(
		'title'       => __('Pricing Plans Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_pricing_plans_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_pricing_plans_text',array(
		'description' => __('<p>1. More options for pricing plans section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing plans section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_pricing_plans',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_pricing_plans_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_pricing_plans_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_pricing_plans',
		'type'=> 'hidden'
	));	

	//Recent Blogs Section
	$wp_customize->add_section('keto_organic_diet_recent_blogs', array(
		'title'       => __('Recent Blogs Section', 'keto-organic-diet'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','keto-organic-diet'),
		'priority'    => null,
		'panel'       => 'keto_organic_diet_homepage_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_recent_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_recent_blogs_text',array(
		'description' => __('<p>1. More options for recent blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for recent blogs section.</p>','keto-organic-diet'),
		'section'=> 'keto_organic_diet_recent_blogs',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('keto_organic_diet_recent_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_recent_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=keto_organic_diet_guide') ." '>More Info</a>",
		'section'=> 'keto_organic_diet_recent_blogs',
		'type'=> 'hidden'
	));	

	//Footer Text
	$wp_customize->add_section('keto_organic_diet_footer',array(
		'title'	=> esc_html__('Footer Settings','keto-organic-diet'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/keto-wordpress-theme/">GO PRO</a>','keto-organic-diet'),
		'panel' => 'keto_organic_diet_homepage_panel',
	));	

	$wp_customize->add_setting( 'keto_organic_diet_footer_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));
  $wp_customize->add_control( new keto_organic_diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_footer_hide_show',array(
    'label' => esc_html__( 'Show / Hide Footer','keto-organic-diet' ),
    'section' => 'keto_organic_diet_footer'
  )));

	$wp_customize->add_setting('keto_organic_diet_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_footer_background_color', array(
		'label'    => __('Footer Background Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_footer',
	)));

	$wp_customize->add_setting('keto_organic_diet_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'keto_organic_diet_footer_background_image',array(
    'label' => __('Footer Background Image','keto-organic-diet'),
    'section' => 'keto_organic_diet_footer'
	)));

	$wp_customize->add_setting('keto_organic_diet_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','keto-organic-diet'),
		'section' => 'keto_organic_diet_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'keto-organic-diet' ),
			'center top'   => esc_html__( 'Top', 'keto-organic-diet' ),
			'right top'   => esc_html__( 'Top Right', 'keto-organic-diet' ),
			'left center'   => esc_html__( 'Left', 'keto-organic-diet' ),
			'center center'   => esc_html__( 'Center', 'keto-organic-diet' ),
			'right center'   => esc_html__( 'Right', 'keto-organic-diet' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'keto-organic-diet' ),
			'center bottom'   => esc_html__( 'Bottom', 'keto-organic-diet' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'keto-organic-diet' ),
		),
	));

	// Footer
	$wp_customize->add_setting('keto_organic_diet_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','keto-organic-diet'),
		'choices' => array(
      'fixed' => __('fixed','keto-organic-diet'),
      'scroll' => __('scroll','keto-organic-diet'),
    ),
		'section'=> 'keto_organic_diet_footer',
	));

	$wp_customize->add_setting('keto_organic_diet_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','keto-organic-diet'),
    'section' => 'keto_organic_diet_footer',
    'choices' => array(
    	'Left' => __('Left','keto-organic-diet'),
        'Center' => __('Center','keto-organic-diet'),
        'Right' => __('Right','keto-organic-diet')
        ),
	) );

	$wp_customize->add_setting('keto_organic_diet_footer_widgets_content',array(
	  'default' => 'Left',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','keto-organic-diet'),
    'section' => 'keto_organic_diet_footer',
    'choices' => array(
    	'Left' => __('Left','keto-organic-diet'),
        'Center' => __('Center','keto-organic-diet'),
        'Right' => __('Right','keto-organic-diet')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('keto_organic_diet_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

   // footer social icon
	$wp_customize->add_setting( 'keto_organic_diet_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  	) );
	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','keto-organic-diet' ),
		'section' => 'keto_organic_diet_footer'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('keto_organic_diet_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'keto_organic_diet_Customize_partial_keto_organic_diet_footer_text', 
	));

	$wp_customize->add_setting( 'keto_organic_diet_copyright_hide_show',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));
  $wp_customize->add_control( new keto_organic_diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_copyright_hide_show',array(
    'label' => esc_html__( 'Show / Hide Copyright','keto-organic-diet' ),
    'section' => 'keto_organic_diet_footer'
  )));

	$wp_customize->add_setting('keto_organic_diet_copyright_background_color', array(
		'default'           => '#609a33',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_footer',
	)));

	$wp_customize->add_setting('keto_organic_diet_copyright_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_copyright_text_color', array(
		'label'    => __('Copyright Text Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_footer',
	)));

	$wp_customize->add_setting('keto_organic_diet_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_footer_text',array(
		'label'	=> __('Copyright Text','keto-organic-diet'),
		'section'=> 'keto_organic_diet_footer',
		'setting'=> 'keto_organic_diet_footer_text',
		'type'=> 'text'
	));
	
	$wp_customize->add_setting('keto_organic_diet_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('keto_organic_diet_footer_text',array(
		'label'	=> esc_html__('Copyright Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Copyright 2021, .....', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_copyright_font_weight',array(
	  'default' => 400,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_copyright_font_weight',array(
	    'type' => 'select',
	    'label' => __('Copyright Font Weight','keto-organic-diet'),
	    'section' => 'keto_organic_diet_footer',
	    'choices' => array(
	    	'100' => __('100','keto-organic-diet'),
	        '200' => __('200','keto-organic-diet'),
	        '300' => __('300','keto-organic-diet'),
	        '400' => __('400','keto-organic-diet'),
	        '500' => __('500','keto-organic-diet'),
	        '600' => __('600','keto-organic-diet'),
	        '700' => __('700','keto-organic-diet'),
	        '800' => __('800','keto-organic-diet'),
	        '900' => __('900','keto-organic-diet'),
    ),
	));

	$wp_customize->add_setting('keto_organic_diet_copyright_alingment',array(
    'default' => 'center',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_copyright_alingment', array(
    'type' => 'select',
    'label' => esc_html__('Copyright Alignment','keto-organic-diet'),
    'section' => 'keto_organic_diet_footer',
    'settings' => 'keto_organic_diet_copyright_alingment',
    'choices' => array(
      'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
      'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
      'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'keto_organic_diet_hide_show_scroll',array(
    	'default' => 1,
    	'transport' => 'refresh',
    	'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
    ));  
    $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_hide_show_scroll',array(
    	'label' => esc_html__( 'Show / Hide Scroll to Top','keto-organic-diet' ),
    	'section' => 'keto_organic_diet_footer'
    )));

  //Selective Refresh
	$wp_customize->selective_refresh->add_partial('keto_organic_diet_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'keto_organic_diet_Customize_partial_keto_organic_diet_scroll_to_top_icon', 
	));

  $wp_customize->add_setting('keto_organic_diet_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_footer',
		'setting'	=> 'keto_organic_diet_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('keto_organic_diet_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_scroll_to_top_width',array(
		'label'	=> __('Icon Width','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_scroll_to_top_height',array(
		'label'	=> __('Icon Height','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'keto_organic_diet_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  $wp_customize->add_setting('keto_organic_diet_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','keto-organic-diet'),
    'section' => 'keto_organic_diet_footer',
    'settings' => 'keto_organic_diet_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'keto_organic_diet_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'keto_organic_diet_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_blog_post_parent_panel',
	));

	//Blog layout
	$wp_customize->add_setting('keto_organic_diet_blog_layout_option',array(
		'default' => 'Default',
		'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_blog_layout_option', array(
		'type' => 'select',
		'label' => __('Blog Post Layouts','keto-organic-diet'),
		'section' => 'keto_organic_diet_post_settings',
		'choices' => array(
		  'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
		  'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
		  'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
	))));

	$wp_customize->add_setting('keto_organic_diet_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','keto-organic-diet'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','keto-organic-diet'),
    'section' => 'keto_organic_diet_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','keto-organic-diet'),
        'Right Sidebar' => esc_html__('Right Sidebar','keto-organic-diet'),
        'One Column' => esc_html__('One Column','keto-organic-diet'),
        'Grid Layout' => esc_html__('Grid Layout','keto-organic-diet')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('keto_organic_diet_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'keto_organic_diet_Customize_partial_keto_organic_diet_toggle_postdate', 
	));

  $wp_customize->add_setting('keto_organic_diet_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_post_settings',
		'setting'	=> 'keto_organic_diet_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'keto_organic_diet_toggle_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_toggle_postdate',array(
	    'label' => esc_html__( 'Show / Hide Post Date','keto-organic-diet' ),
	    'section' => 'keto_organic_diet_post_settings'
  	)));

	$wp_customize->add_setting('keto_organic_diet_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_post_settings',
		'setting'	=> 'keto_organic_diet_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','keto-organic-diet' ),
		'section' => 'keto_organic_diet_post_settings'
  )));

  $wp_customize->add_setting('keto_organic_diet_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_post_settings',
		'setting'	=> 'keto_organic_diet_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','keto-organic-diet' ),
		'section' => 'keto_organic_diet_post_settings'
  )));

	$wp_customize->add_setting('keto_organic_diet_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_post_settings',
		'setting'	=> 'keto_organic_diet_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','keto-organic-diet' ),
		'section' => 'keto_organic_diet_post_settings'
  )));

  $wp_customize->add_setting( 'keto_organic_diet_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	));
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','keto-organic-diet' ),
		'section' => 'keto_organic_diet_post_settings'
  )));

  $wp_customize->add_setting( 'keto_organic_diet_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
	) );

	$wp_customize->add_setting( 'keto_organic_diet_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('keto_organic_diet_blog_post_featured_image_dimension',array(
		'default' => 'default',
		'sanitize_callback'	=> 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_blog_post_featured_image_dimension',array(
   'type' => 'select',
   'label'	=> __('Blog Post Featured Image Dimension','keto-organic-diet'),
   'section'	=> 'keto_organic_diet_post_settings',
   'choices' => array(
      'default' => __('Default','keto-organic-diet'),
      'custom' => __('Custom Image Size','keto-organic-diet'),
      ),
	));

	$wp_customize->add_setting('keto_organic_diet_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'keto-organic-diet' ),),
		'section'=> 'keto_organic_diet_post_settings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('keto_organic_diet_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'keto-organic-diet' ),),
		'section'=> 'keto_organic_diet_post_settings',
		'type'=> 'text',
		'active_callback' => 'keto_organic_diet_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'keto_organic_diet_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'keto_organic_diet_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_post_settings',
		'type'        => 'range',
		'settings'    => 'keto_organic_diet_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('keto_organic_diet_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','keto-organic-diet'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','keto-organic-diet'),
		'section'=> 'keto_organic_diet_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('keto_organic_diet_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','keto-organic-diet'),
    'section' => 'keto_organic_diet_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','keto-organic-diet'),
        'Excerpt' => esc_html__('Excerpt','keto-organic-diet'),
        'No Content' => esc_html__('No Content','keto-organic-diet')
        ),
	) );

  	$wp_customize->add_setting('keto_organic_diet_blog_page_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_blog_page_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Blog Posts','keto-organic-diet'),
	    'section' => 'keto_organic_diet_post_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','keto-organic-diet'),
	      	'Without Blocks' => __('Without Blocks','keto-organic-diet')
	      ),
	) );

	$wp_customize->add_setting('keto_organic_diet_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','keto-organic-diet'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'keto_organic_diet_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
    ));
    $wp_customize->add_control( new keto_organic_diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','keto-organic-diet' ),
		'section' => 'keto_organic_diet_post_settings'
    )));

	$wp_customize->add_setting( 'keto_organic_diet_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'keto_organic_diet_sanitize_choices'
    ));
    $wp_customize->add_control( 'keto_organic_diet_blog_pagination_type', array(
        'section' => 'keto_organic_diet_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'keto-organic-diet' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'keto-organic-diet' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'keto-organic-diet' ),
    )));

  	// Button Settings
	$wp_customize->add_section( 'keto_organic_diet_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('keto_organic_diet_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'keto_organic_diet_Customize_partial_keto_organic_diet_button_text', 
	));

  	$wp_customize->add_setting('keto_organic_diet_button_text',array(
		'default'=> esc_html__('Read More','keto-organic-diet'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_button_text',array(
		'label'	=> esc_html__('Add Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('keto_organic_diet_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_button_font_size',array(
		'label'	=> __('Button Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
    'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'keto_organic_diet_button_settings',
	));

	$wp_customize->add_setting( 'keto_organic_diet_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('keto_organic_diet_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
  	'placeholder' => __( '10px', 'keto-organic-diet' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'keto_organic_diet_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('keto_organic_diet_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','keto-organic-diet'),
		'choices' => array(
      'Uppercase' => __('Uppercase','keto-organic-diet'),
      'Capitalize' => __('Capitalize','keto-organic-diet'),
      'Lowercase' => __('Lowercase','keto-organic-diet'),
        ),
		'section'=> 'keto_organic_diet_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'keto_organic_diet_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('keto_organic_diet_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'keto_organic_diet_Customize_partial_keto_organic_diet_related_post_title', 
	));

  $wp_customize->add_setting( 'keto_organic_diet_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','keto-organic-diet' ),
		'section' => 'keto_organic_diet_related_posts_settings'
  )));

  $wp_customize->add_setting('keto_organic_diet_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Related Post', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('keto_organic_diet_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'keto_organic_diet_sanitize_number_absint'
	));
	$wp_customize->add_control('keto_organic_diet_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => esc_html__( '3', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'keto_organic_diet_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'keto_organic_diet_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'keto_organic_diet_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_blog_post_parent_panel',
	));

  $wp_customize->add_setting('keto_organic_diet_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
        $wp_customize,'keto_organic_diet_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_single_blog_settings',
		'setting'	=> 'keto_organic_diet_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	) );
	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_postdate',array(
    'label' => esc_html__( 'Show / Hide Date','keto-organic-diet' ),
   	'section' => 'keto_organic_diet_single_blog_settings'
	)));

  $wp_customize->add_setting('keto_organic_diet_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_single_author_icon',array(
		'label'	=> __('Add Author Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_single_blog_settings',
		'setting'	=> 'keto_organic_diet_single_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_single_author',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	) );
	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','keto-organic-diet' ),
	    'section' => 'keto_organic_diet_single_blog_settings'
	)));

  $wp_customize->add_setting('keto_organic_diet_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_single_blog_settings',
		'setting'	=> 'keto_organic_diet_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'keto_organic_diet_single_comments',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	) );
	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','keto-organic-diet' ),
	    'section' => 'keto_organic_diet_single_blog_settings'
	)));

  $wp_customize->add_setting('keto_organic_diet_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_single_time_icon',array(
		'label'	=> __('Add Time Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_single_blog_settings',
		'setting'	=> 'keto_organic_diet_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'keto_organic_diet_single_time',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	) );

	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_time',array(
    'label' => esc_html__( 'Show / Hide Time','keto-organic-diet' ),
    'section' => 'keto_organic_diet_single_blog_settings'
	)));

	$wp_customize->add_setting( 'keto_organic_diet_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
    ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','keto-organic-diet' ),
		'section' => 'keto_organic_diet_single_blog_settings'
  )));

   // Single Posts Category
	$wp_customize->add_setting( 'keto_organic_diet_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','keto-organic-diet' ),
		'section' => 'keto_organic_diet_single_blog_settings'
  )));

	$wp_customize->add_setting( 'keto_organic_diet_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	));
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_toggle_tags', array(
	'label' => esc_html__( 'Show / Hide Tags','keto-organic-diet' ),
	'section' => 'keto_organic_diet_single_blog_settings'
  )));
 
	$wp_customize->add_setting( 'keto_organic_diet_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
	));
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','keto-organic-diet' ),
		'section' => 'keto_organic_diet_single_blog_settings'
  )));

	$wp_customize->add_setting('keto_organic_diet_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','keto-organic-diet'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','keto-organic-diet'),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('keto_organic_diet_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'PREVIOUS', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'NEXT', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Leave a Reply', 'keto-organic-diet' ),
    	),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','keto-organic-diet'),
		'description'	=> __('Enter a value in %. Example:50%','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '100%', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_single_blog_settings',
		'type'=> 'text'
	));

  	// Grid layout setting
	$wp_customize->add_section( 'keto_organic_diet_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_blog_post_parent_panel',
	));

  $wp_customize->add_setting('keto_organic_diet_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_grid_layout_settings',
		'setting'	=> 'keto_organic_diet_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'keto_organic_diet_grid_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','keto-organic-diet' ),
    'section' => 'keto_organic_diet_grid_layout_settings'
  )));

	$wp_customize->add_setting('keto_organic_diet_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_grid_author_icon',array(
		'label'	=> __('Add Author Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_grid_layout_settings',
		'setting'	=> 'keto_organic_diet_grid_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','keto-organic-diet' ),
		'section' => 'keto_organic_diet_grid_layout_settings'
  )));

  $wp_customize->add_setting('keto_organic_diet_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_grid_layout_settings',
		'setting'	=> 'keto_organic_diet_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'keto_organic_diet_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','keto-organic-diet' ),
		'section' => 'keto_organic_diet_grid_layout_settings'
  )));

  $wp_customize->add_setting('keto_organic_diet_grid_time_icon',array(
		'default'	=> 'fa fa-time',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_grid_time_icon',array(
		'label'	=> __('Add time Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_grid_layout_settings',
		'setting'	=> 'keto_organic_diet_grid_time_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'keto_organic_diet_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  	) );
  	$wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','keto-organic-diet' ),
		'section' => 'keto_organic_diet_grid_layout_settings'
  )	));

   	$wp_customize->add_setting('keto_organic_diet_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','keto-organic-diet'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','keto-organic-diet'),
		'section'=> 'keto_organic_diet_grid_layout_settings',
		'type'=> 'text'
	));  

  	$wp_customize->add_setting('keto_organic_diet_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','keto-organic-diet'),
	    'section' => 'keto_organic_diet_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','keto-organic-diet'),
	      'Without Blocks' => __('Without Blocks','keto-organic-diet')
	      ),
	) );


	//Others Settings
	$wp_customize->add_panel( 'keto_organic_diet_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'keto-organic-diet' ),
		'panel' => 'keto_organic_diet_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'keto_organic_diet_left_right', array(
    'title' => esc_html__('General Settings', 'keto-organic-diet'),
		'panel' => 'keto_organic_diet_others_panel'
	) );

	$wp_customize->add_setting('keto_organic_diet_width_option',array(
    'default' => 'Full Width',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control(new Keto_Organic_Diet_Image_Radio_Control($wp_customize, 'keto_organic_diet_width_option', array(
    'type' => 'select',
    'label' => esc_html__('Width Layouts','keto-organic-diet'),
    'description' => esc_html__('Here you can change the width layout of Website.','keto-organic-diet'),
    'section' => 'keto_organic_diet_left_right',
    'choices' => array(
        'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
        'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
        'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
  ))));

	$wp_customize->add_setting('keto_organic_diet_page_layout',array(
    'default' => 'One_Column',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_page_layout',array(
	  'type' => 'select',
	  'label' => esc_html__('Page Sidebar Layout','keto-organic-diet'),
	  'description' => esc_html__('Here you can change the sidebar layout for pages. ','keto-organic-diet'),
	  'section' => 'keto_organic_diet_left_right',
	  'choices' => array(
      'Left_Sidebar' => esc_html__('Left Sidebar','keto-organic-diet'),
      'Right_Sidebar' => esc_html__('Right Sidebar','keto-organic-diet'),
      'One_Column' => esc_html__('One Column','keto-organic-diet')
      ),
	) );

  $wp_customize->add_setting( 'keto_organic_diet_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','keto-organic-diet' ),
		'section' => 'keto_organic_diet_left_right'
  )));

    //Wow Animation
	$wp_customize->add_setting( 'keto_organic_diet_animation',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_animation',array(
    'label' => esc_html__( 'Show / Hide Animations','keto-organic-diet' ),
    'description' => __('Here you can disable overall site animation effect','keto-organic-diet'),
    'section' => 'keto_organic_diet_left_right'
  )));

  // Pre-Loader
	$wp_customize->add_setting( 'keto_organic_diet_loader_enable',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_loader_enable',array(
    'label' => esc_html__( 'Show / Hide Pre-Loader','keto-organic-diet' ),
    'section' => 'keto_organic_diet_left_right'
  )));

	$wp_customize->add_setting('keto_organic_diet_preloader_bg_color', array(
		'default'           => '#609a33',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_left_right',
	)));

	$wp_customize->add_setting('keto_organic_diet_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_left_right',
	)));

	$wp_customize->add_setting('keto_organic_diet_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'keto_organic_diet_preloader_bg_img',array(
    'label' => __('Preloader Background Image','keto-organic-diet'),
    'section' => 'keto_organic_diet_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('keto_organic_diet_404_page',array(
		'title'	=> __('404 Page Settings','keto-organic-diet'),
		'panel' => 'keto_organic_diet_others_panel',
	));	

	$wp_customize->add_setting('keto_organic_diet_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_404_page_title',array(
		'label'	=> __('Add Title','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '404 Not Found', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_404_page_content',array(
		'label'	=> __('Add Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_404_page_button_text',array(
		'label'	=> __('Add Button Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Return to the home page', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Keto_Organic_Diet_Fontawesome_Icon_Chooser(
  $wp_customize,'keto_organic_diet_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','keto-organic-diet'),
		'transport' => 'refresh',
		'section'	=> 'keto_organic_diet_404_page',
		'setting'	=> 'keto_organic_diet_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('keto_organic_diet_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','keto-organic-diet'),
		'panel' => 'keto_organic_diet_others_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_social_icon_padding',array(
		'label'	=> __('Icon Padding','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_social_icon_width',array(
		'label'	=> __('Icon Width','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_social_icon_height',array(
		'label'	=> __('Icon Height','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_social_icon_settings',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('keto_organic_diet_no_results_page',array(
		'title'	=> __('No Results Page Settings','keto-organic-diet'),
		'panel' => 'keto_organic_diet_others_panel',
	));	

	$wp_customize->add_setting('keto_organic_diet_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_no_results_page_title',array(
		'label'	=> __('Add Title','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Nothing Found', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('keto_organic_diet_no_results_page_content',array(
		'label'	=> __('Add Text','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_no_results_page',
		'type'=> 'text'
	));

	//Responsive Media Settings
	$wp_customize->add_section('keto_organic_diet_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','keto-organic-diet'),
		'panel' => 'keto_organic_diet_others_panel',
	));

	$wp_customize->add_setting('keto_organic_diet_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'keto_organic_diet_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'keto-organic-diet'),
		'section'  => 'keto_organic_diet_responsive_media',
	)));

  $wp_customize->add_setting( 'keto_organic_diet_resp_slider_hide_show',array(
  	'default' => 0,
   	'transport' => 'refresh',
  	'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));  
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_resp_slider_hide_show',array(
  	'label' => esc_html__( 'Show / Hide Slider','keto-organic-diet' ),
  	'section' => 'keto_organic_diet_responsive_media'
  )));

  $wp_customize->add_setting( 'keto_organic_diet_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));  
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_sidebar_hide_show',array(
  	'label' => esc_html__( 'Show / Hide Sidebar','keto-organic-diet' ),
  	'section' => 'keto_organic_diet_responsive_media'
  )));

  $wp_customize->add_setting( 'keto_organic_diet_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ));  
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_resp_scroll_top_hide_show',array(
  	'label' => esc_html__( 'Show / Hide Scroll To Top','keto-organic-diet' ),
  	'section' => 'keto_organic_diet_responsive_media'
  )));

  //Woocommerce settings
	$wp_customize->add_section('keto_organic_diet_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'keto-organic-diet'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

  //Shop Page Featured Image
	$wp_customize->add_setting( 'keto_organic_diet_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'keto_organic_diet_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) ); 

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'keto_organic_diet_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'keto_organic_diet_customize_partial_keto_organic_diet_woocommerce_shop_page_sidebar', ) );

  // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'keto_organic_diet_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
    ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','keto-organic-diet' ),
		'section' => 'keto_organic_diet_woocommerce_section'
  )));

  $wp_customize->add_setting('keto_organic_diet_shop_page_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_shop_page_layout',array(
    'type' => 'select',
    'label' => __('Shop Page Sidebar Layout','keto-organic-diet'),
    'section' => 'keto_organic_diet_woocommerce_section',
    'choices' => array(
      'Left Sidebar' => __('Left Sidebar','keto-organic-diet'),
      'Right Sidebar' => __('Right Sidebar','keto-organic-diet'),
      ),
	) );

  // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'keto_organic_diet_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'keto_organic_diet_customize_partial_keto_organic_diet_woocommerce_single_product_page_sidebar', ) );

  //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'keto_organic_diet_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','keto-organic-diet' ),
		'section' => 'keto_organic_diet_woocommerce_section'
  )));

  $wp_customize->add_setting('keto_organic_diet_single_product_layout',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_single_product_layout',array(
    'type' => 'select',
    'label' => __('Single Product Sidebar Layout','keto-organic-diet'),
    'section' => 'keto_organic_diet_woocommerce_section',
    'choices' => array(
        'Left Sidebar' => __('Left Sidebar','keto-organic-diet'),
        'Right Sidebar' => __('Right Sidebar','keto-organic-diet'),
    ),
	) );

	//Products padding
	$wp_customize->add_setting('keto_organic_diet_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'keto_organic_diet_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'keto_organic_diet_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('keto_organic_diet_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('keto_organic_diet_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'keto_organic_diet_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('keto_organic_diet_woocommerce_sale_position',array(
    'default' => 'right',
    'sanitize_callback' => 'keto_organic_diet_sanitize_choices'
	));
	$wp_customize->add_control('keto_organic_diet_woocommerce_sale_position',array(
    'type' => 'select',
    'label' => __('Sale Badge Position','keto-organic-diet'),
    'section' => 'keto_organic_diet_woocommerce_section',
    'choices' => array(
        'left' => __('Left','keto-organic-diet'),
        'right' => __('Right','keto-organic-diet'),
        ),
	) );

	$wp_customize->add_setting('keto_organic_diet_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('keto_organic_diet_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','keto-organic-diet'),
		'description'	=> __('Enter a value in pixels. Example:20px','keto-organic-diet'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'keto-organic-diet' ),
        ),
		'section'=> 'keto_organic_diet_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'keto_organic_diet_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'keto_organic_diet_sanitize_number_range'
	) );
	$wp_customize->add_control( 'keto_organic_diet_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','keto-organic-diet' ),
		'section'     => 'keto_organic_diet_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  // Related Product
  $wp_customize->add_setting( 'keto_organic_diet_related_product_show_hide',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'keto_organic_diet_switch_sanitization'
  ) );
  $wp_customize->add_control( new Keto_Organic_Diet_Toggle_Switch_Custom_Control( $wp_customize, 'keto_organic_diet_related_product_show_hide',array(
    'label' => esc_html__( 'Show / Hide Related Product','keto-organic-diet' ),
    'section' => 'keto_organic_diet_woocommerce_section'
  )));

}

add_action( 'customize_register', 'keto_organic_diet_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Keto_Organic_Diet_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Keto_Organic_Diet_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Keto_Organic_Diet_Customize_Section_Pro( $manager,'keto_organic_diet_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Keto Organic Diet PRO', 'keto-organic-diet' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'keto-organic-diet' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/keto-wordpress-theme/'),
		) )	);

		// Register sections.
		$manager->add_section(new Keto_Organic_Diet_Customize_Section_Pro($manager,'keto_organic_diet_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'keto-organic-diet' ),
			'pro_text' => esc_html__( 'DOCS', 'keto-organic-diet' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-keto-organic/'),
		)));
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'keto-organic-diet-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'keto-organic-diet-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Keto_Organic_Diet_Customize::get_instance();