<?php
/**
 * VW SAAS Services Theme Customizer
 *
 * @package VW SAAS Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_saas_services_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_saas_services_custom_controls' );

function vw_saas_services_customize_register( $wp_customize ) {


	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'vw_saas_services_Customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'vw_saas_services_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_saas_services_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'vw-saas-services' ),
		'priority' => 10,
	));

 	// Header Background color
	$wp_customize->add_setting('vw_saas_services_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-saas-services'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('vw_saas_services_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-saas-services'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-saas-services' ),
			'center top'   => esc_html__( 'Top', 'vw-saas-services' ),
			'right top'   => esc_html__( 'Top Right', 'vw-saas-services' ),
			'left center'   => esc_html__( 'Left', 'vw-saas-services' ),
			'center center'   => esc_html__( 'Center', 'vw-saas-services' ),
			'right center'   => esc_html__( 'Right', 'vw-saas-services' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-saas-services' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-saas-services' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-saas-services' ),
		),
		));

	//Menus Settings
	$wp_customize->add_section( 'vw_saas_services_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_panel_id'
	) );

	$wp_customize->add_setting('vw_saas_services_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-saas-services'),
        'section' => 'vw_saas_services_menu_section',
        'choices' => array(
        	'100' => __('100','vw-saas-services'),
            '200' => __('200','vw-saas-services'),
            '300' => __('300','vw-saas-services'),
            '400' => __('400','vw-saas-services'),
            '500' => __('500','vw-saas-services'),
            '600' => __('600','vw-saas-services'),
            '700' => __('700','vw-saas-services'),
            '800' => __('800','vw-saas-services'),
            '900' => __('900','vw-saas-services'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_saas_services_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menu Text Transform','vw-saas-services'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-saas-services'),
            'Capitalize' => __('Capitalize','vw-saas-services'),
            'Lowercase' => __('Lowercase','vw-saas-services'),
        ),
		'section'=> 'vw_saas_services_menu_section',
	));

	$wp_customize->add_setting('vw_saas_services_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_saas_services_menu_section',
		'label' => __('Menu Item Hover Style','vw-saas-services'),
		'choices' => array(
            'None' => __('None','vw-saas-services'),
            'Zoom In' => __('Zoom In','vw-saas-services'),
        ),
	) );

	$wp_customize->add_setting('vw_saas_services_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_menu_section',
	)));

	$wp_customize->add_setting('vw_saas_services_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_menu_section',
	)));

	$wp_customize->add_setting('vw_saas_services_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_menu_section',
	)));

	$wp_customize->add_setting('vw_saas_services_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_menu_section',
	)));

	//Header 
	$wp_customize->add_section('vw_saas_services_header_section' , array(
  		'title' => __( 'Header Section', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_panel_id'
	) );

	$wp_customize->add_setting('vw_saas_services_topbar_btn_text',array(
		'default'=> 'Request Quote',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_topbar_btn_text',array(
		'label'	=> esc_html__('Add Button Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Request Quote', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_topbar_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_saas_services_topbar_btn_link',array(
		'label'	=> esc_html__('Add Button Link','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_header_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting('vw_saas_services_myaccount_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_myaccount_icon',array(
		'label'	=> __('Add Myaccount Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_header_section',
		'setting'	=> 'vw_saas_services_myaccount_icon',
		'type'		=> 'icon'
	)));
	
	//Slider
	$wp_customize->add_section( 'vw_saas_services_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_panel_id',
		'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/saas-services-wordpress-theme">GET PRO</a>','vw-saas-services'),
	) );

	$wp_customize->add_setting( 'vw_saas_services_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ));
 	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_slider_hide_show',array(
    'label' => esc_html__( 'Show / Hide Slider','vw-saas-services' ),
    'section' => 'vw_saas_services_slidersettings'
	)));

	$wp_customize->add_setting('vw_saas_services_slider_type',array(
	    'default' => 'Default slider',
	    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	) );
	$wp_customize->add_control('vw_saas_services_slider_type', array(
	    'type' => 'select',
	    'label' => __('Slider Type','vw-saas-services'),
	    'section' => 'vw_saas_services_slidersettings',
	    'choices' => array(
	        'Default slider' => __('Default slider','vw-saas-services'),
	        'Advance slider' => __('Advance slider','vw-saas-services'),
        ),
	));

	$wp_customize->add_setting('vw_saas_services_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-saas-services'),
		'section'=> 'vw_saas_services_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_advance_slider'
	));

 	//Selective Refresh
  $wp_customize->selective_refresh->add_partial('vw_saas_services_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'vw_saas_services_customize_partial_vw_saas_services_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_saas_services_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_saas_services_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_saas_services_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-saas-services' ),
			'description' => __('Slider image size (1400 x 550)','vw-saas-services'),
			'section'  => 'vw_saas_services_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_saas_services_slider_button_text',array(
		'default'=> 'Get A Free Trail',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'GET SERVICE QUOTE', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_default_slider'
	));

	$wp_customize->add_setting('vw_saas_services_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_saas_services_top_button_url',array(
		'label'	=> __('Add Button URL','vw-saas-services'),
		'section'	=> 'vw_saas_services_slidersettings',
		'setting'	=> 'vw_saas_services_top_button_url',
		'type'	=> 'url',
		'active_callback' => 'vw_saas_services_default_slider'
	));


	//content layout
	$wp_customize->add_setting('vw_saas_services_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control(new vw_saas_services_Image_Radio_Control($wp_customize, 'vw_saas_services_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','vw-saas-services'),
        'section' => 'vw_saas_services_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'vw_saas_services_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('vw_saas_services_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-saas-services'),
		'description'	=> __('Enter a value in %. Example:20%','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_default_slider'
	));

	$wp_customize->add_setting('vw_saas_services_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-saas-services'),
		'description'	=> __('Enter a value in %. Example:20%','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_default_slider'
	));

  	//Slider excerpt
	$wp_customize->add_setting( 'vw_saas_services_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-saas-services' ),
		'section'     => 'vw_saas_services_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_saas_services_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'vw_saas_services_default_slider'
	) );

	$wp_customize->add_setting( 'vw_saas_services_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_saas_services_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-saas-services'),
		'section' => 'vw_saas_services_slidersettings',
		'type'  => 'text',
		'active_callback' => 'vw_saas_services_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_saas_services_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_slider_height',array(
		'label'	=> __('Slider Height','vw-saas-services'),
		'description'	=> __('Specify the slider height (px).','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_default_slider'
	)); 

	//Opacity
	$wp_customize->add_setting('vw_saas_services_slider_opacity_color',array(
      'default'              => '',
      'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_saas_services_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-saas-services' ),
		'section'     => 'vw_saas_services_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_saas_services_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-saas-services'),
	      '0.1' =>  esc_attr('0.1','vw-saas-services'),
	      '0.2' =>  esc_attr('0.2','vw-saas-services'),
	      '0.3' =>  esc_attr('0.3','vw-saas-services'),
	      '0.4' =>  esc_attr('0.4','vw-saas-services'),
	      '0.5' =>  esc_attr('0.5','vw-saas-services'),
	      '0.6' =>  esc_attr('0.6','vw-saas-services'),
	      '0.7' =>  esc_attr('0.7','vw-saas-services'),
	      '0.8' =>  esc_attr('0.8','vw-saas-services'),
	      '0.9' =>  esc_attr('0.9','vw-saas-services')
	),'active_callback' => 'vw_saas_services_default_slider'
	));

	$wp_customize->add_setting( 'vw_saas_services_slider_image_overlay',array(
    	'default' => '#000',
    	'transport' => 'refresh',
    	'sanitize_callback' => 'vw_saas_services_switch_sanitization'
   ));
   $wp_customize->add_control( new vw_saas_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-saas-services' ),
      	'section' => 'vw_saas_services_slidersettings',
      	'active_callback' => 'vw_saas_services_default_slider'
   )));

   $wp_customize->add_setting('vw_saas_services_slider_image_overlay_color', array(
		'default'           => 1,
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_slidersettings',
		'active_callback' => 'vw_saas_services_default_slider'
	)));

	$wp_customize->add_setting( 'vw_saas_services_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
	$wp_customize->add_control( new vw_saas_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','vw-saas-services' ),
		'section' => 'vw_saas_services_slidersettings',
		'active_callback' => 'vw_saas_services_default_slider'
	)));

	$wp_customize->add_setting('vw_saas_services_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_slidersettings',
		'setting'	=> 'vw_saas_services_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_saas_services_default_slider'
	)));

	$wp_customize->add_setting('vw_saas_services_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_slidersettings',
		'setting'	=> 'vw_saas_services_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_saas_services_default_slider'
	)));

	// About Us Section
	$wp_customize->add_section( 'vw_saas_services_about_us_section' , array(
    'title'      => __( 'About Us Section', 'vw-saas-services' ),
		'priority'   => null,
		'description' => __('For more options of the about us section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/saas-services-wordpress-theme">GET PRO</a>','vw-saas-services'),
		'panel' => 'vw_saas_services_panel_id'
	) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$posts[]='Select';	
	foreach($post_list as $post){
		$posts[$post->post_title] = $post->post_title;
	}
	
	$wp_customize->add_setting('vw_saas_services_about_setting',array(
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('vw_saas_services_about_setting',array(
		'type'    => 'select',
		'choices' => $posts,
		'label' => __('Select post','vw-saas-services'),
		'section' => 'vw_saas_services_about_us_section',
	));

	for ( $i=1; $i <= 2 ; $i++ ) {
	    
  $wp_customize->add_setting('vw_saas_services_about_list_icon' .$i,array(
		'default'	=> 'fas fa-angle-double-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_about_list_icon' .$i, array(
		'label'	=> __('Add About List Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_about_us_section',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_about_page_list' . $i, array(
    'default'           => '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control( 'vw_saas_services_about_page_list' . $i, array(
    'label'    => __( 'Add About List Text', 'vw-saas-services' ),
    'section'  => 'vw_saas_services_about_us_section',
    'type'     => 'text'
  ));
	}

	//Partner Slider Section
	$wp_customize->add_section('vw_saas_services_partnerSlider_section', array(
		'title'       => __('Partner Slider Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_partnerSlider_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_partnerSlider_text',array(
		'description' => __('<p>1. More options for partner slider section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner slider section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_partnerSlider_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_partnerSlider_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_partnerSlider_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_partnerSlider_section',
		'type'=> 'hidden'
	));

	//Partner Slider Section
	$wp_customize->add_section('vw_saas_services_topBenifits_section', array(
		'title'       => __('Top Benifits Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_topBenifits_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_topBenifits_text',array(
		'description' => __('<p>1. More options for top benifits section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for top benifits section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_topBenifits_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_topBenifits_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_topBenifits_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_topBenifits_section',
		'type'=> 'hidden'
	));

	// software module Section
	$wp_customize->add_section('vw_saas_services_module_section', array(
		'title'       => __('Software Module Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_module_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_module_text',array(
		'description' => __('<p>1. More options for software module section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for software module section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_module_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_module_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_module_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_module_section',
		'type'=> 'hidden'
	));

	//management one Section
	$wp_customize->add_section('vw_saas_services_management_one_section', array(
		'title'       => __('Management One Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_management_one_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_one_text',array(
		'description' => __('<p>1. More options for partner slider section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner slider section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_management_one_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_management_one_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_one_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_management_one_section',
		'type'=> 'hidden'
	));

	//feature Section
	$wp_customize->add_section('vw_saas_services_featureSection_section', array(
		'title'       => __('Feature Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_featureSection_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_featureSection_text',array(
		'description' => __('<p>1. More options for feature section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for feature section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_featureSection_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_featureSection_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_featureSection_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_featureSection_section',
		'type'=> 'hidden'
	));

	//Management Two Section
	$wp_customize->add_section('vw_saas_services_management_two_section', array(
		'title'       => __('Management Two Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_management_two_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_two_text',array(
		'description' => __('<p>1. More options for management two section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for management two section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_management_two_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_management_two_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_two_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_management_two_section',
		'type'=> 'hidden'
	));

	//management three Section
	$wp_customize->add_section('vw_saas_services_management_three_section', array(
		'title'       => __('Management Three Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_management_three_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_three_text',array(
		'description' => __('<p>1. More options for management three section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partner management three section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_management_three_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_management_three_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_management_three_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_management_three_section',
		'type'=> 'hidden'
	));

	//Download Section
	$wp_customize->add_section('vw_saas_services_download_section', array(
		'title'       => __('Download Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_download_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_download_text',array(
		'description' => __('<p>1. More options for download section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for download section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_download_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_download_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_download_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_download_section',
		'type'=> 'hidden'
	));

	//pricing Section
	$wp_customize->add_section('vw_saas_services_pricing_section', array(
		'title'       => __('Pricing Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_pricing_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_pricing_text',array(
		'description' => __('<p>1. More options for pricing section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for pricing section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_pricing_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_pricing_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_pricing_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_pricing_section',
		'type'=> 'hidden'
	));

	//Effortless Installing Process Section
	$wp_customize->add_section('vw_saas_services_effortless_installing_process_section', array(
		'title'       => __('Effortless Installing Process Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_effortless_installing_process_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_effortless_installing_process_text',array(
		'description' => __('<p>1. More options for effortless installing process section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for effortless installing process section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_effortless_installing_process_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_effortless_installing_process_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_effortless_installing_process_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_effortless_installing_process_section',
		'type'=> 'hidden'
	));

	//testimonials Section
	$wp_customize->add_section('vw_saas_services_testimonials_section', array(
		'title'       => __('Testimonials Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_testimonials_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_testimonials_section',
		'type'=> 'hidden'
	));

	//faq Section
	$wp_customize->add_section('vw_saas_services_faq_section', array(
		'title'       => __('Faq Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_faq_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_faq_text',array(
		'description' => __('<p>1. More options for faq section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for faq section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_faq_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_faq_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_faq_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_faq_section',
		'type'=> 'hidden'
	));

	//Resources & News Section
	$wp_customize->add_section('vw_saas_services_resources_news_section', array(
		'title'       => __('Resources & News Section', 'vw-saas-services'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-saas-services'),
		'priority'    => null,
		'panel'       => 'vw_saas_services_panel_id',
	));

	$wp_customize->add_setting('vw_saas_services_resources_news_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_resources_news_text',array(
		'description' => __('<p>1. More options for resources & news section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for resources & news section.</p>','vw-saas-services'),
		'section'=> 'vw_saas_services_resources_news_section',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_saas_services_resources_news_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_resources_news_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=vw_saas_services_guide') ." '>More Info</a>",
		'section'=> 'vw_saas_services_resources_news_section',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_saas_services_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-saas-services'),
		'panel' => 'vw_saas_services_panel_id',
		'description' => __('For more options of the footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/saas-services-wordpress-theme">GET PRO</a>','vw-saas-services')
	));

	// font size
	$wp_customize->add_setting('vw_saas_services_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-saas-services'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_saas_services_footer',
	));

	$wp_customize->add_setting('vw_saas_services_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-saas-services'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_saas_services_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_saas_services_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-saas-services'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-saas-services'),
      'Capitalize' => __('Capitalize','vw-saas-services'),
      'Lowercase' => __('Lowercase','vw-saas-services'),
    ),
		'section'=> 'vw_saas_services_footer',
	));

	$wp_customize->add_setting('vw_saas_services_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-saas-services'),
        'section' => 'vw_saas_services_footer',
        'choices' => array(
        	'100' => __('100','vw-saas-services'),
            '200' => __('200','vw-saas-services'),
            '300' => __('300','vw-saas-services'),
            '400' => __('400','vw-saas-services'),
            '500' => __('500','vw-saas-services'),
            '600' => __('600','vw-saas-services'),
            '700' => __('700','vw-saas-services'),
            '800' => __('800','vw-saas-services'),
            '900' => __('900','vw-saas-services'),
        ),
	) );

	$wp_customize->add_setting( 'vw_saas_services_footer_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','vw-saas-services' ),
		'section' => 'vw_saas_services_footer'
	)));

	$wp_customize->add_setting('vw_saas_services_footer_template',array(
	  'default'	=> esc_html('vw_saas_services-footer-one'),
	  'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_footer_template',array(
	      'label'	=> esc_html__('Footer style','vw-saas-services'),
	      'section'	=> 'vw_saas_services_footer',
	      'setting'	=> 'vw_saas_services_footer_template',
	      'type' => 'select',
	      'choices' => array(
	          'vw_saas_services-footer-one' => esc_html__('Style 1', 'vw-saas-services'),
	          'vw_saas_services-footer-two' => esc_html__('Style 2', 'vw-saas-services'),
	          'vw_saas_services-footer-three' => esc_html__('Style 3', 'vw-saas-services'),
	          'vw_saas_services-footer-four' => esc_html__('Style 4', 'vw-saas-services'),
	          'vw_saas_services-footer-five' => esc_html__('Style 5', 'vw-saas-services'),
	          )
	));

	$wp_customize->add_setting('vw_saas_services_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_footer',
	)));

	$wp_customize->add_setting('vw_saas_services_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_saas_services_footer_background_image',array(
      'label' => __('Footer Background Image','vw-saas-services'),
      'section' => 'vw_saas_services_footer'
	)));

	$wp_customize->add_setting('vw_saas_services_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-saas-services'),
		'section' => 'vw_saas_services_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-saas-services' ),
			'center top'   => esc_html__( 'Top', 'vw-saas-services' ),
			'right top'   => esc_html__( 'Top Right', 'vw-saas-services' ),
			'left center'   => esc_html__( 'Left', 'vw-saas-services' ),
			'center center'   => esc_html__( 'Center', 'vw-saas-services' ),
			'right center'   => esc_html__( 'Right', 'vw-saas-services' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-saas-services' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-saas-services' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-saas-services' ),
		),
	));

  // Footer
  $wp_customize->add_setting('vw_saas_services_img_footer',array(
    'default'=> 'scroll',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_saas_services_img_footer',array(
    'type' => 'select',
    'label' => __('Footer Background Attatchment','vw-saas-services'),
    'choices' => array(
      'fixed' => __('fixed','vw-saas-services'),
      'scroll' => __('scroll','vw-saas-services'),
    ),
    'section'=> 'vw_saas_services_footer',
  ));

  // footer padding
  $wp_customize->add_setting('vw_saas_services_footer_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_saas_services_footer_padding',array(
    'label' => __('Footer Top Bottom Padding','vw-saas-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-saas-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
    'section'=> 'vw_saas_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_saas_services_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_saas_services_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading','vw-saas-services'),
    'section' => 'vw_saas_services_footer',
    'choices' => array(
      'Left' => __('Left','vw-saas-services'),
      'Center' => __('Center','vw-saas-services'),
      'Right' => __('Right','vw-saas-services')
    ),
  ) );

  $wp_customize->add_setting('vw_saas_services_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
  ));
  $wp_customize->add_control('vw_saas_services_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content','vw-saas-services'),
    'section' => 'vw_saas_services_footer',
    'choices' => array(
      'Left' => __('Left','vw-saas-services'),
      'Center' => __('Center','vw-saas-services'),
      'Right' => __('Right','vw-saas-services')
    ),
  	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_saas_services_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'vw_saas_services_Customize_partial_vw_saas_services_footer_text',
	));

	$wp_customize->add_setting('vw_saas_services_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_saas_services_copyright_hide_show',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','vw-saas-services' ),
		'section' => 'vw_saas_services_footer'
	)));

	$wp_customize->add_setting('vw_saas_services_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Image_Radio_Control($wp_customize, 'vw_saas_services_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-saas-services'),
        'section' => 'vw_saas_services_footer',
        'settings' => 'vw_saas_services_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting('vw_saas_services_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_footer',
	)));

	$wp_customize->add_setting('vw_saas_services_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_copyright_font_size',array(
		'label' => __('Copyright Font Size','vw-saas-services'),
		'description' => __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
		        'placeholder' => __( '10px', 'vw-saas-services' ),
		    ),
		'section'=> 'vw_saas_services_footer',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_saas_services_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-saas-services' ),
      	'section' => 'vw_saas_services_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_saas_services_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'vw_saas_services_Customize_partial_vw_saas_services_scroll_to_top_icon',
	));

    $wp_customize->add_setting('vw_saas_services_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Image_Radio_Control($wp_customize, 'vw_saas_services_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-saas-services'),
        'section' => 'vw_saas_services_footer',
        'settings' => 'vw_saas_services_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

     $wp_customize->add_setting('vw_saas_services_scroll_top_icon',array(
    'default' => 'fas fa-long-arrow-alt-up',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser($wp_customize,'vw_saas_services_scroll_top_icon',array(
    'label' => __('Add Scroll to Top Icon','vw-saas-services'),
    'transport' => 'refresh',
    'section' => 'vw_saas_services_footer',
    'setting' => 'vw_saas_services_scroll_top_icon',
    'type'    => 'icon'
  )));

  $wp_customize->add_setting('vw_saas_services_scroll_to_top_font_size',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_saas_services_scroll_to_top_font_size',array(
    'label' => __('Icon Font Size','vw-saas-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-saas-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
    'section'=> 'vw_saas_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_saas_services_scroll_to_top_padding',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_saas_services_scroll_to_top_padding',array(
    'label' => __('Icon Top Bottom Padding','vw-saas-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-saas-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
    'section'=> 'vw_saas_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_saas_services_scroll_to_top_width',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_saas_services_scroll_to_top_width',array(
    'label' => __('Icon Width','vw-saas-services'),
    'description' => __('Enter a value in pixels Example:20px','vw-saas-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
  ),
  'section'=> 'vw_saas_services_footer',
  'type'=> 'text'
  ));

  $wp_customize->add_setting('vw_saas_services_scroll_to_top_height',array(
    'default'=> '',
    'sanitize_callback' => 'sanitize_text_field'
  ));
  $wp_customize->add_control('vw_saas_services_scroll_to_top_height',array(
    'label' => __('Icon Height','vw-saas-services'),
    'description' => __('Enter a value in pixels. Example:20px','vw-saas-services'),
    'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
    'section'=> 'vw_saas_services_footer',
    'type'=> 'text'
  ));

  $wp_customize->add_setting( 'vw_saas_services_scroll_to_top_border_radius', array(
    'default'              => '',
    'transport'        => 'refresh',
    'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
  ) );
  $wp_customize->add_control( 'vw_saas_services_scroll_to_top_border_radius', array(
    'label'       => esc_html__( 'Icon Border Radius','vw-saas-services' ),
    'section'     => 'vw_saas_services_footer',
    'type'        => 'range',
    'input_attrs' => array(
      'step'             => 1,
      'min'              => 1,
      'max'              => 50,
    ),
  ) );

   	//Blog Post
	$wp_customize->add_panel( 'vw_saas_services_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_saas_services_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_saas_services_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'vw_saas_services_Customize_partial_vw_saas_services_toggle_postdate',
	));

	//Blog layout
  $wp_customize->add_setting('vw_saas_services_blog_layout_option',array(
    'default' => 'Default',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
  ));
  $wp_customize->add_control(new VW_SAAS_Services_Image_Radio_Control($wp_customize, 'vw_saas_services_blog_layout_option', array(
    'type' => 'select',
    'label' => __('Blog Post Layouts','vw-saas-services'),
    'section' => 'vw_saas_services_post_settings',
    'choices' => array(
        'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
  ))));

	$wp_customize->add_setting('vw_saas_services_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-saas-services'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-saas-services'),
        'section' => 'vw_saas_services_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-saas-services'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-saas-services'),
            'One Column' => esc_html__('One Column','vw-saas-services'),
            'Grid Layout' => esc_html__('Grid Layout','vw-saas-services')
        ),
	) );

 	$wp_customize->add_setting('vw_saas_services_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-saas-services'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-saas-services'),
    'section' => 'vw_saas_services_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-saas-services'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-saas-services'),
        'One Column' => esc_html__('One Column','vw-saas-services'),
        'Grid Layout' => esc_html__('Grid Layout','vw-saas-services')
        ),
	) );

	$wp_customize->add_setting('vw_saas_services_theme_options',array(
    'default' => 'Right Sidebar',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_theme_options',array(
    'type' => 'select',
    'label' => esc_html__('Post Sidebar Layout','vw-saas-services'),
    'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-saas-services'),
    'section' => 'vw_saas_services_post_settings',
    'choices' => array(
        'Left Sidebar' => esc_html__('Left Sidebar','vw-saas-services'),
        'Right Sidebar' => esc_html__('Right Sidebar','vw-saas-services'),
        'One Column' => esc_html__('One Column','vw-saas-services'),
        'Grid Layout' => esc_html__('Grid Layout','vw-saas-services')
        ),
	) );

  	$wp_customize->add_setting('vw_saas_services_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_post_settings',
		'setting'	=> 'vw_saas_services_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'vw_saas_services_blog_toggle_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_blog_toggle_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-saas-services' ),
    'section' => 'vw_saas_services_post_settings'
  )));

	$wp_customize->add_setting('vw_saas_services_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_post_settings',
		'setting'	=> 'vw_saas_services_toggle_author_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_blog_toggle_author',array(
	'default' => 1,
	'transport' => 'refresh',
	'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_blog_toggle_author',array(
	'label' => esc_html__( 'Show / Hide Author','vw-saas-services' ),
	'section' => 'vw_saas_services_post_settings'
  )));

  $wp_customize->add_setting('vw_saas_services_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_post_settings',
		'setting'	=> 'vw_saas_services_toggle_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_blog_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_blog_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-saas-services' ),
		'section' => 'vw_saas_services_post_settings'
  )));

  $wp_customize->add_setting('vw_saas_services_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_post_settings',
		'setting'	=> 'vw_saas_services_toggle_time_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_blog_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_blog_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-saas-services' ),
		'section' => 'vw_saas_services_post_settings'
  )));

  $wp_customize->add_setting( 'vw_saas_services_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-saas-services' ),
		'section' => 'vw_saas_services_post_settings'
  )));

  $wp_customize->add_setting( 'vw_saas_services_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-saas-services' ),
		'section'     => 'vw_saas_services_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_saas_services_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-saas-services' ),
		'section'     => 'vw_saas_services_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_saas_services_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-saas-services'),
		'section'	=> 'vw_saas_services_post_settings',
		'choices' => array(
		'default' => __('Default','vw-saas-services'),
		'custom' => __('Custom Image Size','vw-saas-services'),
      ),
	));

	$wp_customize->add_setting('vw_saas_services_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_saas_services_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-saas-services' ),),
		'section'=> 'vw_saas_services_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_saas_services_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-saas-services' ),),
		'section'=> 'vw_saas_services_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_saas_services_blog_post_featured_image_dimension'
	));

  $wp_customize->add_setting( 'vw_saas_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_saas_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-saas-services' ),
		'section'     => 'vw_saas_services_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_saas_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_saas_services_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-saas-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-saas-services'),
		'section'=> 'vw_saas_services_post_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_saas_services_excerpt_settings',array(
    'default' => 'Excerpt',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_excerpt_settings',array(
    'type' => 'select',
    'label' => esc_html__('Post Content','vw-saas-services'),
    'section' => 'vw_saas_services_post_settings',
    'choices' => array(
    	'Content' => esc_html__('Content','vw-saas-services'),
        'Excerpt' => esc_html__('Excerpt','vw-saas-services'),
        'No Content' => esc_html__('No Content','vw-saas-services')
        ),
	) );

  $wp_customize->add_setting('vw_saas_services_blog_page_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_blog_page_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Blog Posts','vw-saas-services'),
    'section' => 'vw_saas_services_post_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-saas-services'),
        'Without Blocks' => __('Without Blocks','vw-saas-services')
        ),
	) );

	$wp_customize->add_setting( 'vw_saas_services_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','vw-saas-services' ),
		'section' => 'vw_saas_services_post_settings'
  )));

	$wp_customize->add_setting('vw_saas_services_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_saas_services_blog_pagination_type', array(
    'default'			=> 'blog-page-numbers',
    'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
  ));
  $wp_customize->add_control( 'vw_saas_services_blog_pagination_type', array(
    'section' => 'vw_saas_services_post_settings',
    'type' => 'select',
    'label' => __( 'Blog Pagination', 'vw-saas-services' ),
    'choices'		=> array(
        'blog-page-numbers'  => __( 'Numeric', 'vw-saas-services' ),
        'next-prev' => __( 'Older Posts/Newer Posts', 'vw-saas-services' ),
  )));

    // Button Settings
	$wp_customize->add_section( 'vw_saas_services_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_saas_services_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'vw_saas_services_Customize_partial_vw_saas_services_button_text',
	));

  $wp_customize->add_setting('vw_saas_services_button_text',array(
		'default'=> esc_html__('Read More','vw-saas-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-saas-services'),
		'input_attrs' => array(
    'placeholder' => esc_html__( 'Read More', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('vw_saas_services_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_font_size',array(
		'label'	=> __('Button Font Size','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
  		'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_saas_services_button_settings',
	));


	$wp_customize->add_setting( 'vw_saas_services_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_saas_services_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-saas-services' ),
		'section'     => 'vw_saas_services_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// button padding
	$wp_customize->add_setting('vw_saas_services_button_top_bottom_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_top_bottom_padding',array(
		'label'	=> __('Button Top Bottom Padding','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
		'section'=> 'vw_saas_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_button_left_right_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_left_right_padding',array(
		'label'	=> __('Button Left Right Padding','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-saas-services' ),
    ),
		'section'=> 'vw_saas_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-saas-services' ),
  ),
  	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_saas_services_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_saas_services_button_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-saas-services'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-saas-services'),
      'Capitalize' => __('Capitalize','vw-saas-services'),
      'Lowercase' => __('Lowercase','vw-saas-services'),
    ),
		'section'=> 'vw_saas_services_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_saas_services_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_saas_services_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'vw_saas_services_Customize_partial_vw_saas_services_related_post_title',
	));

  $wp_customize->add_setting( 'vw_saas_services_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_related_post',array(
		'label' => esc_html__( 'Related Post','vw-saas-services' ),
		'section' => 'vw_saas_services_related_posts_settings'
  )));

  $wp_customize->add_setting('vw_saas_services_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_related_posts_settings',
		'type'=> 'text'
	));

 	$wp_customize->add_setting('vw_saas_services_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_saas_services_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_saas_services_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_saas_services_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-saas-services' ),
		'section'     => 'vw_saas_services_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_saas_services_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'vw_saas_services_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_saas_services_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_single_blog_settings',
		'setting'	=> 'vw_saas_services_single_postdate_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_single_postdate',array(
    'default' => 1,
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_postdate',array(
	   'label' => esc_html__( 'Show / Hide Date','vw-saas-services' ),
	   'section' => 'vw_saas_services_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_saas_services_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_single_blog_settings',
		'setting'	=> 'vw_saas_services_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_saas_services_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-saas-services' ),
	    'section' => 'vw_saas_services_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_saas_services_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_single_blog_settings',
		'setting'	=> 'vw_saas_services_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_saas_services_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-saas-services' ),
	    'section' => 'vw_saas_services_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_saas_services_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_single_blog_settings',
		'setting'	=> 'vw_saas_services_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_saas_services_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-saas-services' ),
	    'section' => 'vw_saas_services_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_saas_services_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-saas-services' ),
		'section' => 'vw_saas_services_single_blog_settings'
  )));

	$wp_customize->add_setting( 'vw_saas_services_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
 	 $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-saas-services' ),
		'section' => 'vw_saas_services_single_blog_settings'
    )));

	// Single Posts Category
 	 $wp_customize->add_setting( 'vw_saas_services_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-saas-services' ),
		'section' => 'vw_saas_services_single_blog_settings'
    )));

	$wp_customize->add_setting('vw_saas_services_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-saas-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-saas-services'),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_saas_services_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
	));
	$wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','vw-saas-services' ),
		  'section' => 'vw_saas_services_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('vw_saas_services_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-saas-services'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'vw-saas-services' ),
    	),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-saas-services'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-saas-services'),
		'description'	=> __('Enter a value in %. Example:50%','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_saas_services_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_saas_services_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_grid_layout_settings',
		'setting'	=> 'vw_saas_services_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_saas_services_grid_postdate',array(
	  'default' => 1,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ) );
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_grid_postdate',array(
    'label' => esc_html__( 'Show / Hide Post Date','vw-saas-services' ),
    'section' => 'vw_saas_services_grid_layout_settings'
  )));

	$wp_customize->add_setting('vw_saas_services_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_grid_layout_settings',
		'setting'	=> 'vw_saas_services_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_saas_services_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-saas-services' ),
		'section' => 'vw_saas_services_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_saas_services_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_grid_layout_settings',
		'setting'	=> 'vw_saas_services_grid_comments_icon',
		'type'		=> 'icon'
	)));

  $wp_customize->add_setting( 'vw_saas_services_grid_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_grid_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-saas-services' ),
		'section' => 'vw_saas_services_grid_layout_settings'
    )));

    $wp_customize->add_setting('vw_saas_services_grid_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_grid_time_icon',array(
		'label'	=> __('Add Time Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_grid_layout_settings',
		'setting'	=> 'vw_saas_services_grid_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_saas_services_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-saas-services' ),
		'section' => 'vw_saas_services_grid_layout_settings'
    )));

 	$wp_customize->add_setting('vw_saas_services_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-saas-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-saas-services'),
		'section'=> 'vw_saas_services_grid_layout_settings',
		'type'=> 'text'
	));

  $wp_customize->add_setting('vw_saas_services_display_grid_posts_settings',array(
    'default' => 'Into Blocks',
    'transport' => 'refresh',
    'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_display_grid_posts_settings',array(
    'type' => 'select',
    'label' => __('Display Grid Posts','vw-saas-services'),
    'section' => 'vw_saas_services_grid_layout_settings',
    'choices' => array(
    	'Into Blocks' => __('Into Blocks','vw-saas-services'),
      'Without Blocks' => __('Without Blocks','vw-saas-services')
      ),
	) );

	//Other
	$wp_customize->add_panel( 'vw_saas_services_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'vw-saas-services' ),
		'panel' => 'vw_saas_services_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_saas_services_left_right', array(
    	'title' => esc_html__('General Settings', 'vw-saas-services'),
		'panel' => 'vw_saas_services_other_parent_panel'
	) );

	$wp_customize->add_setting('vw_saas_services_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_SAAS_Services_Image_Radio_Control($wp_customize, 'vw_saas_services_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-saas-services'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-saas-services'),
        'section' => 'vw_saas_services_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_saas_services_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-saas-services'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-saas-services'),
        'section' => 'vw_saas_services_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-saas-services'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-saas-services'),
            'One_Column' => esc_html__('One Column','vw-saas-services')
        ),
	) );

    // Pre-Loader
	$wp_customize->add_setting( 'vw_saas_services_loader_enable',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-saas-services' ),
        'section' => 'vw_saas_services_left_right'
    )));

	$wp_customize->add_setting('vw_saas_services_preloader_bg_color', array(
		'default'           => '#014678',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_left_right',
	)));

	$wp_customize->add_setting('vw_saas_services_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_left_right',
	)));

	$wp_customize->add_setting('vw_saas_services_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_saas_services_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-saas-services'),
        'section' => 'vw_saas_services_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_saas_services_404_page',array(
		'title'	=> __('404 Page Settings','vw-saas-services'),
		'panel' => 'vw_saas_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_saas_services_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_404_page_title',array(
		'label'	=> __('Add Title','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_404_page_content',array(
		'label'	=> __('Add Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Go Back', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('vw_saas_services_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-saas-services'),
		'panel' => 'vw_saas_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_saas_services_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_no_results_page_title',array(
		'label'	=> __('Add Title','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_saas_services_no_results_page_content',array(
		'label'	=> __('Add Text','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_saas_services_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-saas-services'),
		'panel' => 'vw_saas_services_other_parent_panel',
	));

	$wp_customize->add_setting('vw_saas_services_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_social_icon_width',array(
		'label'	=> __('Icon Width','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_social_icon_height',array(
		'label'	=> __('Icon Height','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_social_icon_settings',
		'type'=> 'text'
	));


	//Responsive Media Settings
	$wp_customize->add_section('vw_saas_services_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-saas-services'),
		'panel' => 'vw_saas_services_other_parent_panel',
	));

  $wp_customize->add_setting( 'vw_saas_services_resp_scroll_top_hide_show',array(
	'default' => 1,
	'transport' => 'refresh',
	'sanitize_callback' => 'vw_saas_services_switch_sanitization'
  ));
  $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_resp_scroll_top_hide_show',array(
    	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-saas-services' ),
    	'section' => 'vw_saas_services_responsive_media'
  )));

  	$wp_customize->add_setting( 'vw_saas_services_resp_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_resp_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-saas-services' ),
      'section' => 'vw_saas_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_saas_services_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_SAAS_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','vw-saas-services' ),
        'section' => 'vw_saas_services_responsive_media'
    )));

   $wp_customize->add_setting('vw_saas_services_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_responsive_media',
		'setting'	=> 'vw_saas_services_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_saas_services_res_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new vw_saas_services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_saas_services_res_close_menu_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-saas-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_saas_services_responsive_media',
		'setting'	=> 'vw_saas_services_res_close_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_saas_services_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#103dbe',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_saas_services_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-saas-services'),
		'section'  => 'vw_saas_services_responsive_media',
	)));

 //Woocommerce settings
	$wp_customize->add_section('vw_saas_services_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-saas-services'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_saas_services_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'vw_saas_services_customize_partial_vw_saas_services_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_saas_services_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_saas_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-saas-services' ),
		'section' => 'vw_saas_services_woocommerce_section'
    )));

   $wp_customize->add_setting('vw_saas_services_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-saas-services'),
        'section' => 'vw_saas_services_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-saas-services'),
            'Right Sidebar' => __('Right Sidebar','vw-saas-services'),
        ),
	) );

   //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_saas_services_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'vw_saas_services_customize_partial_vw_saas_services_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_saas_services_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_saas_services_switch_sanitization'
   ) );
   $wp_customize->add_control( new vw_saas_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-saas-services' ),
		'section' => 'vw_saas_services_woocommerce_section'
    )));

   $wp_customize->add_setting('vw_saas_services_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-saas-services'),
        'section' => 'vw_saas_services_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-saas-services'),
            'Right Sidebar' => __('Right Sidebar','vw-saas-services'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_saas_services_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_saas_services_sanitize_float'
	));
	$wp_customize->add_control('vw_saas_services_products_per_page',array(
		'label'	=> __('Products Per Page','vw-saas-services'),
		'description' => __('Display on shop page','vw-saas-services'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_saas_services_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_products_per_row',array(
		'label'	=> __('Products Per Row','vw-saas-services'),
		'description' => __('Display on shop page','vw-saas-services'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'select',
	));


	//Products padding
	$wp_customize->add_setting('vw_saas_services_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_saas_services_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-saas-services' ),
		'section'     => 'vw_saas_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_saas_services_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-saas-services' ),
		'section'     => 'vw_saas_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_saas_services_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-saas-services' ),
		'section'     => 'vw_saas_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_saas_services_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	//Products Sale Badge
	$wp_customize->add_setting('vw_saas_services_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'vw_saas_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_saas_services_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-saas-services'),
        'section' => 'vw_saas_services_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-saas-services'),
            'right' => __('Right','vw-saas-services'),
        ),
	) );

	$wp_customize->add_setting('vw_saas_services_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_saas_services_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_saas_services_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-saas-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-saas-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-saas-services' ),
        ),
		'section'=> 'vw_saas_services_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_saas_services_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_saas_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_saas_services_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-saas-services' ),
		'section'     => 'vw_saas_services_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_saas_services_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_saas_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new vw_saas_services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_saas_services_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-saas-services' ),
        'section' => 'vw_saas_services_woocommerce_section'
    )));

}

add_action( 'customize_register', 'vw_saas_services_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_SAAS_Services_Customize {

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
		$manager->register_section_type( 'VW_SAAS_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_SAAS_Services_Customize_Section_Pro( $manager,'vw_saas_services_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'SAAS SERVICES PRO', 'vw-saas-services' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-saas-services' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/saas-services-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new VW_SAAS_Services_Customize_Section_Pro($manager,'vw_saas_services_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-saas-services' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-saas-services' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-saas-services/'),
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

		wp_enqueue_script( 'vw-saas-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-saas-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_SAAS_Services_Customize::get_instance();
