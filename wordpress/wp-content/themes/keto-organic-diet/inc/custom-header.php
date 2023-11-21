<?php
/**
 * @package Keto Organic Diet
 * Setup the WordPress core custom header feature.
 *
 * @uses keto_organic_diet_header_style()
*/
function keto_organic_diet_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'keto_organic_diet_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 70,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'keto_organic_diet_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'keto_organic_diet_custom_header_setup' );

if ( ! function_exists( 'keto_organic_diet_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see keto_organic_diet_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'keto_organic_diet_header_style' );

function keto_organic_diet_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .header-bg{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: cover;
		}";
	   	wp_add_inline_style( 'keto-organic-diet-basic-style', $custom_css );
	endif;
}
endif;