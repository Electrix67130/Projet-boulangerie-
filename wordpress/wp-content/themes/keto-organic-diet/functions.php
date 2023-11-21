<?php
/**
 * Keto Organic Diet functions and definitions
 *
 * @package Keto Organic Diet
 */

/* Breadcrumb Begin */
function keto_organic_diet_the_breadcrumb() {
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
if ( ! function_exists( 'keto_organic_diet_setup' ) ) :
 
function keto_organic_diet_setup() {

	$GLOBALS['content_width'] = apply_filters( 'keto_organic_diet_content_width', 640 );
	
	load_theme_textdomain( 'keto-organic-diet', get_template_directory() . '/languages' );
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
	add_image_size('keto-organic-diet-homepage-thumb',240,145,true);
	
    register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'keto-organic-diet' ),
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
	add_editor_style( array( 'css/editor-style.css', keto_organic_diet_font_url() ) );

		// Theme Activation Notice
	global $pagenow;

	if (is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] )) {
		add_action('admin_notices', 'keto_organic_diet_activation_notice');
	}

	// Theme Activation Redirects To Get Started Page
	if (is_admin() && ('themes.php' == $pagenow) && isset($_GET['activated']) && wp_get_theme()->get('TextDomain') === 'keto-organic-diet') {
		wp_redirect(admin_url('themes.php?page=keto_organic_diet_guide'));
	}
}
endif;

add_action( 'after_setup_theme', 'keto_organic_diet_setup' );

// Notice after Theme Activation
function keto_organic_diet_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing Keto Organic Diet. Would like to have you on our Welcome page so that you can reap all the benefits of our Keto Organic Diet.', 'keto-organic-diet' ) .'</p>';
	echo '<span><a href="'. esc_url( admin_url( 'themes.php?page=keto_organic_diet_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'keto-organic-diet' ) .'</a></span>';
	echo '<span class="demo-btn"><a href="'. esc_url( 'https://www.vwthemes.net/keto-organic-diet/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'VIEW DEMO', 'keto-organic-diet' ) .'</a></span>';
	echo '<span class="upgrade-btn"><a href="'. esc_url( 'https://www.vwthemes.com/themes/keto-wordpress-theme/' ) .'" class="button button-primary" target=_blank>'. esc_html__( 'UPGRADE PRO', 'keto-organic-diet' ) .'</a></span>';
	echo '</div>';
}

/* Theme Widgets Setup */
function keto_organic_diet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'keto-organic-diet' ),
		'description'   => __( 'Appears on blog page sidebar', 'keto-organic-diet' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 px-3">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'keto-organic-diet' ),
		'description'   => __( 'Appears on page sidebar', 'keto-organic-diet' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title py-3 px-3">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 1', 'keto-organic-diet' ),
		'description'   => __( 'Appears on footer 1', 'keto-organic-diet' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 2', 'keto-organic-diet' ),
		'description'   => __( 'Appears on footer 2', 'keto-organic-diet' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 3', 'keto-organic-diet' ),
		'description'   => __( 'Appears on footer 3', 'keto-organic-diet' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Navigation 4', 'keto-organic-diet' ),
		'description'   => __( 'Appears on footer 4', 'keto-organic-diet' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget py-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-0 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'keto-organic-diet' ),
		'description'   => __( 'Appears on shop page', 'keto-organic-diet' ),
		'id'            => 'woocommerce-shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Single Product Sidebar', 'keto-organic-diet' ),
		'description'   => __( 'Appears on single product page', 'keto-organic-diet' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Icon', 'keto-organic-diet' ),
		'description'   => __( 'Appears on top header', 'keto-organic-diet' ),
		'id'            => 'social-links',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Social Icon', 'keto-organic-diet' ),
		'description'   => __( 'Appears on right side footer', 'keto-organic-diet' ),
		'id'            => 'footer-icon',
		'before_widget' => '<aside id="%1$s" class="widget mb-5 p-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title px-3 py-2">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'keto_organic_diet_widgets_init' );

/* Theme Font URL */
function keto_organic_diet_font_url() {
	$font_family   = array(
		'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Anton',
		'Architects Daughter',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Chewy',
		'Albert Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'DM Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700'
	);

	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/**
 * Enqueue block editor style
 */
function keto_organic_diet_block_editor_styles() {
	wp_enqueue_style( 'keto-organic-diet-font', keto_organic_diet_font_url(), array() );
	wp_enqueue_style( 'keto-organic-diet-block-patterns-style-editor', get_theme_file_uri( '/inc/block-patterns/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
}
add_action( 'enqueue_block_editor_assets', 'keto_organic_diet_block_editor_styles' );

/* Theme enqueue scripts */
function keto_organic_diet_scripts() {
	wp_enqueue_style( 'keto-organic-diet-font', keto_organic_diet_font_url(), array() );
	wp_enqueue_style( 'keto-organic-diet-block-style', get_theme_file_uri('/assets/css/blocks.css') );
	wp_enqueue_style( 'keto-organic-diet-block-patterns-style-frontend', get_theme_file_uri('/inc/block-patterns/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
	wp_enqueue_style( 'keto-organic-diet-basic-style', get_stylesheet_uri() );
	wp_style_add_data('keto-organic-diet-basic-style', 'rtl', 'replace');
	/* Inline style sheet */
	require get_parent_theme_file_path( '/custom-style.php' );
	wp_add_inline_style( 'keto-organic-diet-basic-style',$keto_organic_diet_custom_css );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri(). '/assets/js/bootstrap.js', array('jquery') ,'',true);
	wp_enqueue_script( 'keto-organic-diet-custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'),'' ,true );
	if (get_theme_mod('keto_organic_diet_animation', true) == true){
		wp_enqueue_style( 'animate-style', get_template_directory_uri().'/assets/css/animate.css' );
		wp_enqueue_script( 'wow-jquery', get_template_directory_uri() . '/assets/js/wow.js', array('jquery'),'' ,true );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Enqueue the Dashicons script */
	wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'keto_organic_diet_scripts' );

define('KETO_ORGANIC_DIET_FREE_THEME_DOC',__('https://preview.vwthemesdemo.com/docs/free-keto-organic/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_SUPPORT',__('https://wordpress.org/support/theme/keto-organic-diet/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_REVIEW',__('https://wordpress.org/support/theme/keto-organic-diet/reviews/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_BUY_NOW',__('https://www.vwthemes.com/themes/keto-wordpress-theme/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_LIVE_DEMO',__('https://www.vwthemes.net/keto-organic-diet/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_PRO_DOC',__('https://preview.vwthemesdemo.com/docs/keto-organic-diet-pro/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_FAQ',__('https://www.vwthemes.com/faqs/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_CONTACT',__('https://www.vwthemes.com/contact/','keto-organic-diet'));
define('KETO_ORGANIC_DIET_CREDIT',__('https://www.vwthemes.com/themes/free-organic-wordpress-theme/','keto-organic-diet'));

if ( ! function_exists( 'keto_organic_diet_credit' ) ) {
	function keto_organic_diet_credit(){
		echo "<a href=".esc_url(KETO_ORGANIC_DIET_CREDIT)." target='_blank'>".esc_html__('Organic Diet WordPress Theme','keto-organic-diet')."</a>";
	}
}

function keto_organic_diet_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );
  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function keto_organic_diet_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function keto_organic_diet_sanitize_number_range( $number, $setting ) {
	
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

function keto_organic_diet_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );
	
	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/* Excerpt Limit Begin */
function keto_organic_diet_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

if ( ! function_exists( 'keto_organic_diet_switch_sanitization' ) ) {
	function keto_organic_diet_switch_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

function keto_organic_diet_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'keto_organic_diet_loop_columns');
	if (!function_exists('keto_organic_diet_loop_columns')) {
		function keto_organic_diet_loop_columns() {
		return 3; // 3 products per row
	}
}

function keto_organic_diet_logo_title_hide_show(){
	if(get_theme_mod('keto_organic_diet_logo_title_hide_show') == '1' ) {
		return true;
	}
	return false;
}

function keto_organic_diet_tagline_hide_show(){
	if(get_theme_mod('keto_organic_diet_tagline_hide_show', 0) == '1' ) {
		return true;
	}
	return false;
}

//Active Callback
function keto_organic_diet_default_slider(){
	if(get_theme_mod('keto_organic_diet_slider_type', 'Default slider') == 'Default slider' ) {
		return true;
	}
	return false;
}

function keto_organic_diet_advance_slider(){
	if(get_theme_mod('keto_organic_diet_slider_type', 'Default slider') == 'Advance slider' ) {
		return true;
	}
	return false;
}

function keto_organic_diet_blog_post_featured_image_dimension(){
	if(get_theme_mod('keto_organic_diet_blog_post_featured_image_dimension') == 'custom' ) {
		return true;
	}
	return false;
}

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Typography */
require get_template_directory() . '/inc/typography/ctypo.php';

/* Implement the About theme page */
require get_template_directory() . '/inc/getstart/getstart.php';

/* TGM Plugin Activation */
require get_template_directory() . '/inc/tgm/tgm.php';

/* Plugin Activation */
require get_template_directory() . '/inc/getstart/plugin-activation.php';

/* Social Icons */
require get_template_directory() . '/inc/themes-widgets/social-icon.php';

/* Webfonts */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/* Block Pattern */
require get_template_directory() . '/inc/block-patterns/block-patterns.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/about-us-widget.php';

/* Customizer additions. */
require get_template_directory() . '/inc/themes-widgets/contact-us-widget.php';