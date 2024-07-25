<?php
/**
 * VW SAAS Servicesfunctions and definitions
 *
 * @package VW SAAS Services 
 */
/* Breadcrumb Begin */
function vw_saas_services_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}
/* Theme Setup */
if ( ! function_exists( 'vw_saas_services_setup' ) ) :
 
function vw_saas_services_setup() {

	$GLOBALS['content_width'] = apply_filters( 'vw_saas_services_content_width', 640 );

	load_theme_textdomain( 'vw-saas-services', get_template_directory() . '/languages' );
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('vw-saas-services-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'vw-saas-services' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	//selective refresh for sidebar and widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', vw_saas_services_font_url() ) );

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'vw_saas_services_activation_notice');
	}
}
endif;

add_action( 'after_setup_theme', 'vw_saas_services_setup' );

// Notice after Theme Activation
function vw_saas_services_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing VW SAAS Services. Would like to have you on our Welcome page so that you can reap all the benefits of our VW SAAS Services.', 'vw-saas-services' ) .'</p>';
	echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=vw_saas_services_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'vw-saas-services' ) .'</a></span>';
	echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/vw-saas-services/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'vw-saas-services' ) .'</a></span>';
	echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/products/saas-services-wordpress-theme' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'vw-saas-services' ) .'</a></span>';
	echo '</div>';
}

/* Theme Widgets Setup */
function vw_saas_services_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vw-saas-services' ),
		'description'   => __( 'Appears on blog page sidebar', 'vw-saas-services' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-2 px-3">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'vw-saas-services' ),
		'description'   => __( 'Appears on page sidebar', 'vw-saas-services' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-2 px-3">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'vw-saas-services' ),
		'description'   => __( 'Appears on footer 1', 'vw-saas-services' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'vw-saas-services' ),
		'description'   => __( 'Appears on footer 2', 'vw-saas-services' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'vw-saas-services' ),
		'description'   => __( 'Appears on footer 3', 'vw-saas-services' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'vw-saas-services' ),
		'description'   => __( 'Appears on footer 4', 'vw-saas-services' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'vw-saas-services' ),
		'description'   => __( 'Appears on shop page', 'vw-saas-services' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'vw-saas-services' ),
		'description'   => __( 'Appears on single product page', 'vw-saas-services' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'vw-saas-services' ),
		'description'   => __( 'Appears on right side footer', 'vw-saas-services' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'vw_saas_services_widgets_init' );

/* Theme Font URL */
function vw_saas_services_font_url() {
	$font_family   = array(
				'ABeeZee:ital@0;1',
	 	'Abril Fatface',
	 	'Acme',
	 	'Alfa Slab One',
	 	'Allura',
	 	'Anton',
	 	'Architects Daughter',
	 	'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
	 	'Arvo:ital,wght@0,400;0,700;1,400;1,700',
	 	'Alegreya Sans:ital,wght@0,100;0,300;0,400;0,500;0,700;0,800;0,900;1,100;1,300;1,400;1,500;1,700;1,800;1,900',
	 	'Asap:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Assistant:wght@200;300;400;500;600;700;800',
	 	'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Bangers',
	 	'Boogaloo',
	 	'Bad Script',
	 	'Barlow Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Bree Serif',
	 	'BenchNine:wght@300;400;700',
	 	'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cardo:ital,wght@0,400;0,700;1,400',
	 	'Courgette',
	 	'Caveat Brush',
	 	'Cherry Swash:wght@400;700',
	 	'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
	 	'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
	 	'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Cookie',
	 	'Coming Soon',
	 	'Charm:wght@400;700',
	 	'Chewy',
	 	'Days One',
	 	'DM Serif Display:ital@0;1',
	 	'Dosis:wght@200;300;400;500;600;700;800',
	 	'EB Garamond:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800',
	 	'Economica:ital,wght@0,400;0,700;1,400;1,700',
	 	'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Fredoka One',
	 	'Fjalla One',
	 	'Frank Ruhl Libre:wght@300;400;500;700;900',
	 	'Gabriela',
	 	'Gloria Hallelujah',
	 	'Great Vibes',
	 	'Handlee',
	 	'Hammersmith One',
	 	'Heebo:wght@100;200;300;400;500;600;700;800;900',
	 	'Hind:wght@300;400;500;600;700',
	 	'Inconsolata:wght@200;300;400;500;600;700;800;900',
	 	'Indie Flower',
	 	'IM Fell English SC',
	 	'Julius Sans One',
	 	'Jomhuria',
	 	'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Kaushan Script',
	 	'Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
	 	'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
	 	'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
	 	'Libre Baskerville:ital,wght@0,400;0,700;1,400',
	 	'Literata:ital,opsz,wght@0,7..72,200;0,7..72,300;0,7..72,400;0,7..72,500;0,7..72,600;0,7..72,700;0,7..72,800;0,7..72,900;1,7..72,200;1,7..72,300;1,7..72,400;1,7..72,500;1,7..72,600;1,7..72,700;1,7..72,800;1,7..72,900',
	 	'Lobster',
	 	'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
	 	'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
	 	'Marck Script',
	 	'Marcellus',
	 	'Merienda One',
	 	'Monda:wght@400;700',
	 	'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
	 	'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
	 	'Nunito Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900',
	 	'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
	 	'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Overpass Mono:wght@300;400;500;600;700',
	 	'Oxygen:wght@300;400;700',
	 	'Oswald:wght@200;300;400;500;600;700',
	 	'Orbitron:wght@400;500;600;700;800;900',
	 	'Patua One',
	 	'Pacifico',
	 	'Padauk:wght@400;700',
	 	'Playball',
	 	'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
	 	'PT Serif:ital,wght@0,400;0,700;1,400;1,700',
	 	'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
	 	'Permanent Marker',
	 	'Poiret One',
	 	'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Prata',
	 	'Quicksand:wght@300;400;500;600;700',
	 	'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
	 	'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
	 	'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
	 	'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
	 	'Ropa Sans:ital@0;1',
	 	'Russo One',
	 	'Righteous',
	 	'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Satisfy',
	 	'Sen:wght@400;700;800',
	 	'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
	 	'Shadows Into Light Two',
	 	'Shadows Into Light',
	 	'Sacramento',
	 	'Sail',
	 	'Shrikhand',
	 	'Staatliches',
	 	'Stylish',
	 	'Tangerine:wght@400;700',
	 	'Titillium Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700',
	 	'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
	 	'Unica One',
	 	'VT323',
	 	'Varela Round',
	 	'Vampiro One',
	 	'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
	 	'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
	 	'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
	 	'ZCOOL XiaoWei',
		'Noto Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'
	);

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Enqueue block editor style
 */
function vw_saas_services_block_editor_styles() {
	wp_enqueue_style( 'vw-saas-services-font', vw_saas_services_font_url(), array() );
	wp_enqueue_style( 'vw-saas-services-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'vw_saas_services_block_editor_styles' );

/* Theme enqueue scripts */
function vw_saas_services_scripts() {
	wp_enqueue_style( 'vw-saas-services-font', vw_saas_services_font_url(), array() );
	wp_enqueue_style( 'vw-saas-services-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'vw-saas-services-block-style', get_theme_file_uri('/assets/css/blocks.css') );
	wp_enqueue_style( 'owl.carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );
	wp_enqueue_style( 'animate-style', get_template_directory_uri().'/assets/css/animate.css' );
	wp_enqueue_style( 'vw-saas-services-basic-style', get_stylesheet_uri() );
	wp_style_add_data('vw-saas-services-basic-style', 'rtl', 'replace');
	/* Inline style sheet */
	require get_parent_theme_file_path( '/custom-style.php' );
	wp_add_inline_style( 'vw-saas-services-basic-style',$vw_saas_services_custom_css );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel.js', array('jquery') ,'',true);
	wp_enqueue_script( 'vw-saas-services-custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );
	wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'),'' ,true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'vw_saas_services_scripts' );

define('VW_SAAS_SERVICES_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-vw-saas-services/','vw-saas-services'));
define('VW_SAAS_SERVICES_BUY_NOW',__('https://www.vwthemes.com/products/saas-services-wordpress-theme','vw-saas-services'));
define('VW_SAAS_SERVICES_LIVE_DEMO',__('https://www.vwthemes.net/vw-saas-services/','vw-saas-services'));
define('VW_SAAS_SERVICES_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/vw-saas-services-pro/','vw-saas-services'));
define('VW_SAAS_SERVICES_SUPPORT',__('https://wordpress.org/support/theme/vw-saas-services/','vw-saas-services'));
define('VW_SAAS_SERVICES_REVIEW',__('https://wordpress.org/support/theme/vw-saas-services/reviews/','vw-saas-services'));
define('VW_SAAS_SERVICES_FAQ',__('https://www.vwthemes.com/faqs/','vw-saas-services'));
define('VW_SAAS_SERVICES_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','vw-saas-services'));
define('VW_SAAS_SERVICES_CONTACT',__('https://www.vwthemes.com/contact/','vw-saas-services'));
define('VW_SAAS_SERVICES_CREDIT',__('https://www.vwthemes.com/products/free-saas-wordpress-theme','vw-saas-services'));

if ( ! function_exists( 'vw_saas_services_credit' ) ) {
	function vw_saas_services_credit(){
		echo "<a href=".esc_url(VW_SAAS_SERVICES_CREDIT)." target='_blank'>".esc_html__('SAAS Services WordPress Theme ','vw-saas-services')."</a>";
	}
}

function vw_saas_services_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function vw_saas_services_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function vw_saas_services_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = absint( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function vw_saas_services_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/* Excerpt Limit Begin */
function vw_saas_services_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}


if ( ! function_exists( 'vw_saas_services_switch_sanitization' ) ) {
	function vw_saas_services_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

function vw_saas_services_sanitize_float( $input ) {
	return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'vw_saas_services_loop_columns');
	if (!function_exists('vw_saas_services_loop_columns')) {
	function vw_saas_services_loop_columns() {
		return get_theme_mod( 'vw_saas_services_products_per_row', 3 );
		// 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'vw_saas_services_products_per_page' );
function vw_saas_services_products_per_page( $cols ) {
  	return  get_theme_mod( 'vw_saas_services_products_per_page',9);
}

function vw_saas_services_logo_title_hide_show(){
	if(get_theme_mod('vw_saas_services_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function vw_saas_services_tagline_hide_show(){
	if(get_theme_mod('vw_saas_services_tagline_hide_show',0) == '1' ) {
		return true;
	}
	return false;
}

function vw_saas_services_blog_post_featured_image_dimension(){
	if(get_theme_mod('vw_saas_services_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

//Active Callback
function vw_saas_services_default_slider(){
	if(get_theme_mod('vw_saas_services_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function vw_saas_services_advance_slider(){
	if(get_theme_mod('vw_saas_services_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'footer-1' => array(
				'categories',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'meta',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

// edit

if (!function_exists('vw_saas_services_edit_link')) :

    function vw_saas_services_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'vw-saas-services'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Plugin Activation */
require get_template_directory() . '/inc/getstart/plugin-activation.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/getstart/getstart.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/* Social Icons */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

