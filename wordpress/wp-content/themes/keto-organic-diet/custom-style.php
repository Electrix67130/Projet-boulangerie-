<?php

	$keto_organic_diet_custom_css= "";

	/*-------------------- Global Color -------------------*/

	$keto_organic_diet_first_color = get_theme_mod('keto_organic_diet_first_color');

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='.search-box i, #slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #slider .more-btn a, .more-btn a, #comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .woocommerce a.added_to_cart.wc-forward, #preloader, #footer .tagcloud a:hover, #footer input[type="submit"], #footer-2, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .scrollup i, #sidebar .custom-social-icons a,#footer .custom-social-icons a, #sidebar h3,  #sidebar .widget_block h3, #sidebar h2, #sidebar .tagcloud a:hover, .pagination a:hover, .pagination .current, .woocommerce span.onsale, .toggle-nav i,.horizontal-text,.header-button a,.page-template-custom-home-page .home-page-header .top-bar .social-icon a,.home-page-header .top-bar .social-icon a,.bradcrumbs span,.bradcrumbs a:hover,.main-navigation ul li a::before, .main-navigation .current_page_item > a::before, .main-navigation .current-menu-item > a::before,.control-section-keto-organic-diet h3.accordion-section-title ,#preloader,.bradcrumbs a:hover, .single-post-category li a:hover,.wp-block-button__link,.wp-block-tag-cloud a:hover,nav.navigation.posts-navigation .nav-previous a,nav.navigation.posts-navigation .nav-next a{';
			$keto_organic_diet_custom_css .='background: '.esc_attr($keto_organic_diet_first_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='.page-template-custom-home-page .home-page-header .top-bar .social-icon a{';
			$keto_organic_diet_custom_css .='border: 2px solid '.esc_attr($keto_organic_diet_first_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='.natural-life span{';
			$keto_organic_diet_custom_css .='border-left: 2px solid '.esc_attr($keto_organic_diet_first_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='a,a:hover, .top-bar .topbar-links a:hover, p.site-title a:hover, .logo h1 a:hover, .main-navigation li a:hover, .main-navigation li a:focus, .main-navigation ul ul a:focus, .main-navigation ul ul a:hover, #slider .inner_carousel h1 a:hover, #slider .more-btn a i, .more-btn a i, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .single-post .post-info:hover a, .middle-bar h6, .post-main-box:hover h3 a,#sidebar ul li a:hover, #footer li a:hover,.post-navigation a:hover .post-title,.post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus, .post-navigation span.meta-nav:hover,.natural-life span, .entry-content a, .widget_text a, .woocommerce-page .entry-summary a, .comment-content p a,.woocommerce .star-rating span, .woocommerce p.stars a{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_first_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='.tags-bg a:hover{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_first_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='#slider .carousel-control-next i:hover, #slider .carousel-control-prev i:hover, #footer .tagcloud a:hover{';
			$keto_organic_diet_custom_css .='border-color: '.esc_attr($keto_organic_diet_first_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	if($keto_organic_diet_first_color != false){
		$keto_organic_diet_custom_css .='.search-box:before, .search-box:after{';
			$keto_organic_diet_custom_css .='border-top-color: '.esc_attr($keto_organic_diet_first_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_custom_css .='@media screen and (max-width:1000px) {';
		if($keto_organic_diet_first_color != false){
			$keto_organic_diet_custom_css .='.main-navigation a:hover{
				color:'.esc_attr($keto_organic_diet_first_color).' !important;
			}';
		}
	$keto_organic_diet_custom_css .='}';

	/*---------------------------Width Layout -------------------*/

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_width_option','Full Width');
    if($keto_organic_diet_theme_lay == 'Boxed'){
		$keto_organic_diet_custom_css .='body{';
			$keto_organic_diet_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='right: 100px;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.horizontal-text span{';
			$keto_organic_diet_custom_css .='top: 52%;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.horizontal-text span{';
			$keto_organic_diet_custom_css .='left: -45%;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.horizontal-text span{';
			$keto_organic_diet_custom_css .='font-size: 15px;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Wide Width'){
		$keto_organic_diet_custom_css .='body{';
			$keto_organic_diet_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='right: 30px;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Full Width'){
		$keto_organic_diet_custom_css .='body{';
			$keto_organic_diet_custom_css .='max-width: 100%;';
		$keto_organic_diet_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$keto_organic_diet_resp_slider = get_theme_mod( 'keto_organic_diet_resp_slider_hide_show',false);
	if($keto_organic_diet_resp_slider == true && get_theme_mod( 'keto_organic_diet_slider_hide_show', false) == false){
    	$keto_organic_diet_custom_css .='#slider{';
			$keto_organic_diet_custom_css .='display:none;';
		$keto_organic_diet_custom_css .='} ';
	}
    if($keto_organic_diet_resp_slider == true){
    	$keto_organic_diet_custom_css .='@media screen and (max-width:575px) {';
		$keto_organic_diet_custom_css .='#slider{';
			$keto_organic_diet_custom_css .='display:block;';
		$keto_organic_diet_custom_css .='} }';
	}else if($keto_organic_diet_resp_slider == false){
		$keto_organic_diet_custom_css .='@media screen and (max-width:575px) {';
		$keto_organic_diet_custom_css .='#slider{';
			$keto_organic_diet_custom_css .='display:none;';
		$keto_organic_diet_custom_css .='} }';
		$keto_organic_diet_custom_css .='@media screen and (max-width:575px){';
		$keto_organic_diet_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$keto_organic_diet_custom_css .='margin-top: 45px;';
		$keto_organic_diet_custom_css .='} }';
	}

	$keto_organic_diet_resp_sidebar = get_theme_mod( 'keto_organic_diet_sidebar_hide_show',true);
    if($keto_organic_diet_resp_sidebar == true){
    	$keto_organic_diet_custom_css .='@media screen and (max-width:575px) {';
		$keto_organic_diet_custom_css .='#sidebar{';
			$keto_organic_diet_custom_css .='display:block;';
		$keto_organic_diet_custom_css .='} }';
	}else if($keto_organic_diet_resp_sidebar == false){
		$keto_organic_diet_custom_css .='@media screen and (max-width:575px) {';
		$keto_organic_diet_custom_css .='#sidebar{';
			$keto_organic_diet_custom_css .='display:none;';
		$keto_organic_diet_custom_css .='} }';
	}

	$keto_organic_diet_resp_scroll_top = get_theme_mod( 'keto_organic_diet_resp_scroll_top_hide_show',true);
	if($keto_organic_diet_resp_scroll_top == true && get_theme_mod( 'keto_organic_diet_hide_show_scroll',true) == false){
    	$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='visibility:hidden !important;';
		$keto_organic_diet_custom_css .='} ';
	}
    if($keto_organic_diet_resp_scroll_top == true){
    	$keto_organic_diet_custom_css .='@media screen and (max-width:575px) {';
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='visibility:visible !important;';
		$keto_organic_diet_custom_css .='} }';
	}else if($keto_organic_diet_resp_scroll_top == false){
		$keto_organic_diet_custom_css .='@media screen and (max-width:575px){';
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='visibility:hidden !important;';
		$keto_organic_diet_custom_css .='} }';
	}

	$keto_organic_diet_resp_menu_toggle_btn_bg_color = get_theme_mod('keto_organic_diet_resp_menu_toggle_btn_bg_color');
	if($keto_organic_diet_resp_menu_toggle_btn_bg_color != false){
		$keto_organic_diet_custom_css .='.toggle-nav i{';
			$keto_organic_diet_custom_css .='background: '.esc_attr($keto_organic_diet_resp_menu_toggle_btn_bg_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$keto_organic_diet_copyright_alingment = get_theme_mod('keto_organic_diet_copyright_alingment');
	if($keto_organic_diet_copyright_alingment != false){
		$keto_organic_diet_custom_css .='.copyright p{';
			$keto_organic_diet_custom_css .='text-align: '.esc_attr($keto_organic_diet_copyright_alingment).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_widgets_heading = get_theme_mod( 'keto_organic_diet_footer_widgets_heading','Left');
    if($keto_organic_diet_footer_widgets_heading == 'Left'){
		$keto_organic_diet_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$keto_organic_diet_custom_css .='text-align: left;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_footer_widgets_heading == 'Center'){
		$keto_organic_diet_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$keto_organic_diet_custom_css .='text-align: center;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_footer_widgets_heading == 'Right'){
		$keto_organic_diet_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$keto_organic_diet_custom_css .='text-align: right;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_widgets_content = get_theme_mod( 'keto_organic_diet_footer_widgets_content','Left');
    if($keto_organic_diet_footer_widgets_content == 'Left'){
		$keto_organic_diet_custom_css .='#footer .widget{';
		$keto_organic_diet_custom_css .='text-align: left;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_footer_widgets_content == 'Center'){
		$keto_organic_diet_custom_css .='#footer .widget{';
			$keto_organic_diet_custom_css .='text-align: center;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_footer_widgets_content == 'Right'){
		$keto_organic_diet_custom_css .='#footer .widget{';
			$keto_organic_diet_custom_css .='text-align: right;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_padding = get_theme_mod('keto_organic_diet_footer_padding');
	if($keto_organic_diet_footer_padding != false){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='padding: '.esc_attr($keto_organic_diet_footer_padding).' 0;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_icon = get_theme_mod('keto_organic_diet_footer_icon');
	if($keto_organic_diet_footer_icon == false){
		$keto_organic_diet_custom_css .='.copyright p{';
			$keto_organic_diet_custom_css .='width:100%; text-align:center; float:none;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_background_image = get_theme_mod('keto_organic_diet_footer_background_image');
	if($keto_organic_diet_footer_background_image != false){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='background: url('.esc_attr($keto_organic_diet_footer_background_image).')!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_footer_background_color = get_theme_mod('keto_organic_diet_footer_background_color');
	if($keto_organic_diet_footer_background_color != false){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='background-color: '.esc_attr($keto_organic_diet_footer_background_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_img_footer','scroll');
	if($keto_organic_diet_theme_lay == 'fixed'){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='background-attachment: fixed !important; background-position: center !important;';
		$keto_organic_diet_custom_css .='}';
	}elseif ($keto_organic_diet_theme_lay == 'scroll'){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='background-attachment: scroll !important; background-position: center !important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_copyright_background_color = get_theme_mod('keto_organic_diet_copyright_background_color');
	if($keto_organic_diet_copyright_background_color != false){
		$keto_organic_diet_custom_css .='#footer-2{';
			$keto_organic_diet_custom_css .='background-color: '.esc_attr($keto_organic_diet_copyright_background_color).';';
		$keto_organic_diet_custom_css .='}';
	} 

	$keto_organic_diet_footer_img_position = get_theme_mod('keto_organic_diet_footer_img_position','center center');
	if($keto_organic_diet_footer_img_position != false){
		$keto_organic_diet_custom_css .='#footer{';
			$keto_organic_diet_custom_css .='background-position: '.esc_attr($keto_organic_diet_footer_img_position).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_copyright_font_size = get_theme_mod('keto_organic_diet_copyright_font_size');
	if($keto_organic_diet_copyright_font_size != false){
		$keto_organic_diet_custom_css .='.copyright p, .copyright a{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_copyright_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_copyright_font_weight = get_theme_mod('keto_organic_diet_copyright_font_weight');
	if($keto_organic_diet_copyright_font_weight != false){
		$keto_organic_diet_custom_css .='.copyright p, .copyright a{';
			$keto_organic_diet_custom_css .='font-weight: '.esc_attr($keto_organic_diet_copyright_font_weight).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_copyright_text_color = get_theme_mod('keto_organic_diet_copyright_text_color');
	if($keto_organic_diet_copyright_text_color != false){
		$keto_organic_diet_custom_css .='.copyright p, .copyright a{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_copyright_text_color).';';
		$keto_organic_diet_custom_css .='}';
	}
	
	/*------------------ Logo  -------------------*/

	$keto_organic_diet_site_title_font_size = get_theme_mod('keto_organic_diet_site_title_font_size');
	if($keto_organic_diet_site_title_font_size != false){
		$keto_organic_diet_custom_css .='.logo h1, .logo p.site-title{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_site_title_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_site_tagline_font_size = get_theme_mod('keto_organic_diet_site_tagline_font_size');
	if($keto_organic_diet_site_tagline_font_size != false){
		$keto_organic_diet_custom_css .='.logo p.site-description{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_site_tagline_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_logo_padding = get_theme_mod('keto_organic_diet_logo_padding');
	if($keto_organic_diet_logo_padding != false){
		$keto_organic_diet_custom_css .='.main-header .logo{';
			$keto_organic_diet_custom_css .='padding: '.esc_attr($keto_organic_diet_logo_padding).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_logo_margin = get_theme_mod('keto_organic_diet_logo_margin');
	if($keto_organic_diet_logo_margin != false){
		$keto_organic_diet_custom_css .='.main-header .logo{';
			$keto_organic_diet_custom_css .='margin: '.esc_attr($keto_organic_diet_logo_margin).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_site_title_color = get_theme_mod('keto_organic_diet_site_title_color');
	if($keto_organic_diet_site_title_color != false){
		$keto_organic_diet_custom_css .='p.site-title a{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_site_title_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_site_tagline_color = get_theme_mod('keto_organic_diet_site_tagline_color');
	if($keto_organic_diet_site_tagline_color != false){
		$keto_organic_diet_custom_css .='.logo p.site-description{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_site_tagline_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_logo_width = get_theme_mod('keto_organic_diet_logo_width');
	if($keto_organic_diet_logo_width != false){
		$keto_organic_diet_custom_css .='.logo img{';
			$keto_organic_diet_custom_css .='width: '.esc_attr($keto_organic_diet_logo_width).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_logo_height = get_theme_mod('keto_organic_diet_logo_height');
	if($keto_organic_diet_logo_height != false){
		$keto_organic_diet_custom_css .='.logo img{';
			$keto_organic_diet_custom_css .='height: '.esc_attr($keto_organic_diet_logo_height).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*------------------ Menus -------------------*/
	$keto_organic_diet_navigation_menu_font_size = get_theme_mod('keto_organic_diet_navigation_menu_font_size');
	if($keto_organic_diet_navigation_menu_font_size != false){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_navigation_menu_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_navigation_menu_font_weight = get_theme_mod('keto_organic_diet_navigation_menu_font_weight','700');
	if($keto_organic_diet_navigation_menu_font_weight != false){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='font-weight: '.esc_attr($keto_organic_diet_navigation_menu_font_weight).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_menu_text_transform','Uppercase');
	if($keto_organic_diet_theme_lay == 'Capitalize'){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='text-transform:Capitalize;';
		$keto_organic_diet_custom_css .='}';
	}
	if($keto_organic_diet_theme_lay == 'Lowercase'){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='text-transform:Lowercase;';
		$keto_organic_diet_custom_css .='}';
	}
	if($keto_organic_diet_theme_lay == 'Uppercase'){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='text-transform:Uppercase;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_header_menus_color = get_theme_mod('keto_organic_diet_header_menus_color');
	if($keto_organic_diet_header_menus_color != false){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_header_menus_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_header_menus_hover_color = get_theme_mod('keto_organic_diet_header_menus_hover_color');
	if($keto_organic_diet_header_menus_hover_color != false){
		$keto_organic_diet_custom_css .='.main-navigation a:hover{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_header_menus_hover_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_header_submenus_color = get_theme_mod('keto_organic_diet_header_submenus_color');
	if($keto_organic_diet_header_submenus_color != false){
		$keto_organic_diet_custom_css .='.main-navigation ul ul a{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_header_submenus_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_header_submenus_hover_color = get_theme_mod('keto_organic_diet_header_submenus_hover_color');
	if($keto_organic_diet_header_submenus_hover_color != false){
		$keto_organic_diet_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$keto_organic_diet_custom_css .='color: '.esc_attr($keto_organic_diet_header_submenus_hover_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_menus_item = get_theme_mod( 'keto_organic_diet_menus_item_style','None');
    if($keto_organic_diet_menus_item == 'None'){
		$keto_organic_diet_custom_css .='.main-navigation a{';
			$keto_organic_diet_custom_css .='';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_menus_item == 'Zoom In'){
		$keto_organic_diet_custom_css .='.main-navigation a:hover{';
			$keto_organic_diet_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color:#000;';
		$keto_organic_diet_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_blog_layout_option','Default');
    if($keto_organic_diet_theme_lay == 'Default'){
		$keto_organic_diet_custom_css .='.post-main-box{';
			$keto_organic_diet_custom_css .='';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Center'){
		$keto_organic_diet_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$keto_organic_diet_custom_css .='text-align:center;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.post-info{';
			$keto_organic_diet_custom_css .='margin-top:10px;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.post-info hr{';
			$keto_organic_diet_custom_css .='margin:15px auto;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Left'){
		$keto_organic_diet_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$keto_organic_diet_custom_css .='text-align:Left;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.post-info hr{';
			$keto_organic_diet_custom_css .='margin-bottom:10px;';
		$keto_organic_diet_custom_css .='}';
		$keto_organic_diet_custom_css .='.post-main-box h2{';
			$keto_organic_diet_custom_css .='margin-top:10px;';
		$keto_organic_diet_custom_css .='}';
	}

	// featured image dimention
	$keto_organic_diet_blog_post_featured_image_dimension = get_theme_mod('keto_organic_diet_blog_post_featured_image_dimension', 'default');
	$keto_organic_diet_blog_post_featured_image_custom_width = get_theme_mod('keto_organic_diet_blog_post_featured_image_custom_width',250);
	$keto_organic_diet_blog_post_featured_image_custom_height = get_theme_mod('keto_organic_diet_blog_post_featured_image_custom_height',250);
	if($keto_organic_diet_blog_post_featured_image_dimension == 'custom'){
		$keto_organic_diet_custom_css .='.post-main-box img{';
			$keto_organic_diet_custom_css .='width: '.esc_attr($keto_organic_diet_blog_post_featured_image_custom_width).'; height: '.esc_attr($keto_organic_diet_blog_post_featured_image_custom_height).';';
		$keto_organic_diet_custom_css .='}';
	}
		$keto_organic_diet_featured_img_border_radius = get_theme_mod('keto_organic_diet_featured_image_border_radius');
	if($keto_organic_diet_featured_img_border_radius != false){
		$keto_organic_diet_custom_css .='.post-main-box img, .feature-box img, #content-vw img{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_featured_img_border_radius).'px;';
		$keto_organic_diet_custom_css .='}';
	}


	/*--------------------- Blog Page Posts -------------------*/

	$keto_organic_diet_blog_page_posts_settings = get_theme_mod( 'keto_organic_diet_blog_page_posts_settings','Into Blocks');
    if($keto_organic_diet_blog_page_posts_settings == 'Without Blocks'){
		$keto_organic_diet_custom_css .='.post-main-box{';
			$keto_organic_diet_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_featured_image_box_shadow = get_theme_mod('keto_organic_diet_featured_image_box_shadow',0);
	if($keto_organic_diet_featured_image_box_shadow != false){
		$keto_organic_diet_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$keto_organic_diet_custom_css .='box-shadow: '.esc_attr($keto_organic_diet_featured_image_box_shadow).'px '.esc_attr($keto_organic_diet_featured_image_box_shadow).'px '.esc_attr($keto_organic_diet_featured_image_box_shadow).'px #cccccc;';
		$keto_organic_diet_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$keto_organic_diet_preloader_bg_color = get_theme_mod('keto_organic_diet_preloader_bg_color');
	if($keto_organic_diet_preloader_bg_color != false){
		$keto_organic_diet_custom_css .='#preloader{';
			$keto_organic_diet_custom_css .='background-color: '.esc_attr($keto_organic_diet_preloader_bg_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_preloader_border_color = get_theme_mod('keto_organic_diet_preloader_border_color');
	if($keto_organic_diet_preloader_border_color != false){
		$keto_organic_diet_custom_css .='.loader-line{';
			$keto_organic_diet_custom_css .='border-color: '.esc_attr($keto_organic_diet_preloader_border_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_preloader_bg_img = get_theme_mod('keto_organic_diet_preloader_bg_img');
	if($keto_organic_diet_preloader_bg_img != false){
		$keto_organic_diet_custom_css .='#preloader{';
			$keto_organic_diet_custom_css .='background: url('.esc_attr($keto_organic_diet_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$keto_organic_diet_custom_css .='}';
	}

	// Header Background Color

	$keto_organic_diet_header_background_color = get_theme_mod('keto_organic_diet_header_background_color');
	if($keto_organic_diet_header_background_color != false){
		$keto_organic_diet_custom_css .='.header-bg{';
			$keto_organic_diet_custom_css .='background-color: '.esc_attr($keto_organic_diet_header_background_color).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_header_img_position = get_theme_mod('keto_organic_diet_header_img_position','center top');
	if($keto_organic_diet_header_img_position != false){
		$keto_organic_diet_custom_css .='.header-bg{';
			$keto_organic_diet_custom_css .='background-position: '.esc_attr($keto_organic_diet_header_img_position).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	/*---------------- Single Blog Page Settings ------------------*/

	$keto_organic_diet_single_blog_comment_title = get_theme_mod('keto_organic_diet_single_blog_comment_title', 'Leave a Reply');
	if($keto_organic_diet_single_blog_comment_title == ''){
		$keto_organic_diet_custom_css .='#comments h2#reply-title {';
			$keto_organic_diet_custom_css .='display: none;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_single_blog_comment_button_text = get_theme_mod('keto_organic_diet_single_blog_comment_button_text', 'Post Comment');
	if($keto_organic_diet_single_blog_comment_button_text == ''){
		$keto_organic_diet_custom_css .='#comments p.form-submit {';
			$keto_organic_diet_custom_css .='display: none;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_comment_width = get_theme_mod('keto_organic_diet_single_blog_comment_width');
	if($keto_organic_diet_comment_width != false){
		$keto_organic_diet_custom_css .='#comments textarea{';
			$keto_organic_diet_custom_css .='width: '.esc_attr($keto_organic_diet_comment_width).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_single_blog_post_navigation_show_hide = get_theme_mod('keto_organic_diet_single_blog_post_navigation_show_hide',true);
	if($keto_organic_diet_single_blog_post_navigation_show_hide != true){
		$keto_organic_diet_custom_css .='.post-navigation{';
			$keto_organic_diet_custom_css .='display: none;';
		$keto_organic_diet_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$keto_organic_diet_button_padding_top_bottom = get_theme_mod('keto_organic_diet_button_padding_top_bottom');
	$keto_organic_diet_button_padding_left_right = get_theme_mod('keto_organic_diet_button_padding_left_right');
	if($keto_organic_diet_button_padding_top_bottom != false || $keto_organic_diet_button_padding_left_right != false){
		$keto_organic_diet_custom_css .='.post-main-box .more-btn a{';
			$keto_organic_diet_custom_css .='padding-top: '.esc_attr($keto_organic_diet_button_padding_top_bottom).'!important; padding-bottom: '.esc_attr($keto_organic_diet_button_padding_top_bottom).'!important;padding-left: '.esc_attr($keto_organic_diet_button_padding_left_right).'!important;padding-right: '.esc_attr($keto_organic_diet_button_padding_left_right).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_button_font_size = get_theme_mod('keto_organic_diet_button_font_size',14);
	$keto_organic_diet_custom_css .='.more-btn a{';
		$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_button_font_size).';';
	$keto_organic_diet_custom_css .='}';

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_button_text_transform','Uppercase');
	if($keto_organic_diet_theme_lay == 'Capitalize'){
		$keto_organic_diet_custom_css .='.more-btn a{';
			$keto_organic_diet_custom_css .='text-transform:Capitalize;';
		$keto_organic_diet_custom_css .='}';
	}
	if($keto_organic_diet_theme_lay == 'Lowercase'){
		$keto_organic_diet_custom_css .='.more-btn a{';
			$keto_organic_diet_custom_css .='text-transform:Lowercase;';
		$keto_organic_diet_custom_css .='}';
	}
	if($keto_organic_diet_theme_lay == 'Uppercase'){
		$keto_organic_diet_custom_css .='.more-btn a{';
			$keto_organic_diet_custom_css .='text-transform:Uppercase;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_button_border_radius = get_theme_mod('keto_organic_diet_button_border_radius');
	if($keto_organic_diet_button_border_radius != false){
		$keto_organic_diet_custom_css .='.post-main-box .more-btn a{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_button_border_radius).'px;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_button_letter_spacing = get_theme_mod('keto_organic_diet_button_letter_spacing',14);
	$keto_organic_diet_custom_css .='.post-main-box .more-btn a{';
		$keto_organic_diet_custom_css .='letter-spacing: '.esc_attr($keto_organic_diet_button_letter_spacing).';';
	$keto_organic_diet_custom_css .='}';

	/*----------------- Slider -----------------*/

	$keto_organic_diet_slider_hide_show = get_theme_mod('keto_organic_diet_slider_hide_show');
	if($keto_organic_diet_slider_hide_show == false){
		$keto_organic_diet_custom_css .='.page-template-custom-home-page .home-page-header{';
			$keto_organic_diet_custom_css .='position: static; background-color: #1b1b1b; padding: 15px;';
		$keto_organic_diet_custom_css .='}';
	}

	/*-------------------Slider Content Layout -------------------*/

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_slider_content_option','Left');
    if($keto_organic_diet_theme_lay == 'Left'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:left; left:10%; right:40%;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Center'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:center; left:20%; right:20%;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Right'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:right; left:40%; right:10%;';
		$keto_organic_diet_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$keto_organic_diet_slider_content_padding_top_bottom = get_theme_mod('keto_organic_diet_slider_content_padding_top_bottom');
	$keto_organic_diet_slider_content_padding_left_right = get_theme_mod('keto_organic_diet_slider_content_padding_left_right');
	if($keto_organic_diet_slider_content_padding_top_bottom != false || $keto_organic_diet_slider_content_padding_left_right != false){
		$keto_organic_diet_custom_css .='#slider .carousel-caption{';
			$keto_organic_diet_custom_css .='top: '.esc_attr($keto_organic_diet_slider_content_padding_top_bottom).'; bottom: '.esc_attr($keto_organic_diet_slider_content_padding_top_bottom).';left: '.esc_attr($keto_organic_diet_slider_content_padding_left_right).';right: '.esc_attr($keto_organic_diet_slider_content_padding_left_right).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$keto_organic_diet_slider_height = get_theme_mod('keto_organic_diet_slider_height');
	if($keto_organic_diet_slider_height != false){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='height: '.esc_attr($keto_organic_diet_slider_height).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_slider_opacity_color','0.5');
	if($keto_organic_diet_theme_lay == '0'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.1'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.1';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.2'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.2';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.3'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.3';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.4'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.4';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.5'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.5';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.6'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.6';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.7'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.7';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.8'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.8';
		$keto_organic_diet_custom_css .='}';
		}else if($keto_organic_diet_theme_lay == '0.9'){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:0.9';
		$keto_organic_diet_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$keto_organic_diet_slider_image_overlay = get_theme_mod('keto_organic_diet_slider_image_overlay', true);
	if($keto_organic_diet_slider_image_overlay == false){
		$keto_organic_diet_custom_css .='#slider img{';
			$keto_organic_diet_custom_css .='opacity:1;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_slider_image_overlay_color = get_theme_mod('keto_organic_diet_slider_image_overlay_color', true);
	if($keto_organic_diet_slider_image_overlay_color != false){
		$keto_organic_diet_custom_css .='#slider{';
			$keto_organic_diet_custom_css .='background-color: '.esc_attr($keto_organic_diet_slider_image_overlay_color).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_related_product_show_hide = get_theme_mod('keto_organic_diet_related_product_show_hide',true);
	if($keto_organic_diet_related_product_show_hide != true){
		$keto_organic_diet_custom_css .='.related.products{';
			$keto_organic_diet_custom_css .='display: none;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_slider_content_option','Left');
    if($keto_organic_diet_theme_lay == 'Left'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:left; left:10%; right:40%;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Center'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:center; left:20%; right:20%;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_theme_lay == 'Right'){
		$keto_organic_diet_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$keto_organic_diet_custom_css .='text-align:right; left:40%; right:10%;';
		$keto_organic_diet_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$keto_organic_diet_slider_content_padding_top_bottom = get_theme_mod('keto_organic_diet_slider_content_padding_top_bottom');
	$keto_organic_diet_slider_content_padding_left_right = get_theme_mod('keto_organic_diet_slider_content_padding_left_right');
	if($keto_organic_diet_slider_content_padding_top_bottom != false || $keto_organic_diet_slider_content_padding_left_right != false){
		$keto_organic_diet_custom_css .='#slider .carousel-caption{';
			$keto_organic_diet_custom_css .='top: '.esc_attr($keto_organic_diet_slider_content_padding_top_bottom).'; bottom: '.esc_attr($keto_organic_diet_slider_content_padding_top_bottom).';left: '.esc_attr($keto_organic_diet_slider_content_padding_left_right).';right: '.esc_attr($keto_organic_diet_slider_content_padding_left_right).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$keto_organic_diet_scroll_to_top_font_size = get_theme_mod('keto_organic_diet_scroll_to_top_font_size');
	if($keto_organic_diet_scroll_to_top_font_size != false){
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_scroll_to_top_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_scroll_to_top_padding = get_theme_mod('keto_organic_diet_scroll_to_top_padding');
	$keto_organic_diet_scroll_to_top_padding = get_theme_mod('keto_organic_diet_scroll_to_top_padding');
	if($keto_organic_diet_scroll_to_top_padding != false){
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='padding-top: '.esc_attr($keto_organic_diet_scroll_to_top_padding).';padding-bottom: '.esc_attr($keto_organic_diet_scroll_to_top_padding).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_scroll_to_top_width = get_theme_mod('keto_organic_diet_scroll_to_top_width');
	if($keto_organic_diet_scroll_to_top_width != false){
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='width: '.esc_attr($keto_organic_diet_scroll_to_top_width).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_scroll_to_top_height = get_theme_mod('keto_organic_diet_scroll_to_top_height');
	if($keto_organic_diet_scroll_to_top_height != false){
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='height: '.esc_attr($keto_organic_diet_scroll_to_top_height).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_scroll_to_top_border_radius = get_theme_mod('keto_organic_diet_scroll_to_top_border_radius');
	if($keto_organic_diet_scroll_to_top_border_radius != false){
		$keto_organic_diet_custom_css .='.scrollup i{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_scroll_to_top_border_radius).'px;';
		$keto_organic_diet_custom_css .='}';
	}

	// Woocommerce

	$keto_organic_diet_shop_featured_image_border_radius = get_theme_mod('keto_organic_diet_shop_featured_image_border_radius', 0);
	if($keto_organic_diet_shop_featured_image_border_radius != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product a img{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_shop_featured_image_border_radius).'px;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_shop_featured_image_box_shadow = get_theme_mod('keto_organic_diet_shop_featured_image_box_shadow',0);
	if($keto_organic_diet_shop_featured_image_box_shadow != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product a img{';
			$keto_organic_diet_custom_css .='box-shadow: '.esc_attr($keto_organic_diet_shop_featured_image_box_shadow).'px '.esc_attr($keto_organic_diet_shop_featured_image_box_shadow).'px '.esc_attr($keto_organic_diet_shop_featured_image_box_shadow).'px #cccccc;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_padding_top_bottom = get_theme_mod('keto_organic_diet_products_padding_top_bottom');
	if($keto_organic_diet_products_padding_top_bottom != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$keto_organic_diet_custom_css .='padding-top: '.esc_attr($keto_organic_diet_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($keto_organic_diet_products_padding_top_bottom).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_padding_left_right = get_theme_mod('keto_organic_diet_products_padding_left_right');
	if($keto_organic_diet_products_padding_left_right != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$keto_organic_diet_custom_css .='padding-left: '.esc_attr($keto_organic_diet_products_padding_left_right).'!important; padding-right: '.esc_attr($keto_organic_diet_products_padding_left_right).'!important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_box_shadow = get_theme_mod('keto_organic_diet_products_box_shadow');
	if($keto_organic_diet_products_box_shadow != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$keto_organic_diet_custom_css .='box-shadow: '.esc_attr($keto_organic_diet_products_box_shadow).'px '.esc_attr($keto_organic_diet_products_box_shadow).'px '.esc_attr($keto_organic_diet_products_box_shadow).'px #ddd;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_border_radius = get_theme_mod('keto_organic_diet_products_border_radius', 0);
	if($keto_organic_diet_products_border_radius != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_products_border_radius).'px;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_btn_padding_top_bottom = get_theme_mod('keto_organic_diet_products_btn_padding_top_bottom');
	if($keto_organic_diet_products_btn_padding_top_bottom != false){
		$keto_organic_diet_custom_css .='.woocommerce a.button{';
			$keto_organic_diet_custom_css .='padding-top: '.esc_attr($keto_organic_diet_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($keto_organic_diet_products_btn_padding_top_bottom).' !important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_btn_padding_left_right = get_theme_mod('keto_organic_diet_products_btn_padding_left_right');
	if($keto_organic_diet_products_btn_padding_left_right != false){
		$keto_organic_diet_custom_css .='.woocommerce a.button{';
			$keto_organic_diet_custom_css .='padding-left: '.esc_attr($keto_organic_diet_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($keto_organic_diet_products_btn_padding_left_right).' !important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_products_button_border_radius = get_theme_mod('keto_organic_diet_products_button_border_radius', 0);
	if($keto_organic_diet_products_button_border_radius != false){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_products_button_border_radius).'px !important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_woocommerce_sale_position = get_theme_mod( 'keto_organic_diet_woocommerce_sale_position','right');
    if($keto_organic_diet_woocommerce_sale_position == 'left'){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product .onsale{';
			$keto_organic_diet_custom_css .='left: 10px !important; right: auto !important;';
		$keto_organic_diet_custom_css .='}';
	}else if($keto_organic_diet_woocommerce_sale_position == 'right'){
		$keto_organic_diet_custom_css .='.woocommerce ul.products li.product .onsale{';
			$keto_organic_diet_custom_css .='left: auto !important; right: 10px !important;';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_woocommerce_sale_font_size = get_theme_mod('keto_organic_diet_woocommerce_sale_font_size');
	if($keto_organic_diet_woocommerce_sale_font_size != false){
		$keto_organic_diet_custom_css .='.woocommerce span.onsale{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_woocommerce_sale_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_woocommerce_sale_border_radius = get_theme_mod('keto_organic_diet_woocommerce_sale_border_radius', 0);
	if($keto_organic_diet_woocommerce_sale_border_radius != false){
		$keto_organic_diet_custom_css .='.woocommerce span.onsale{';
			$keto_organic_diet_custom_css .='border-radius: '.esc_attr($keto_organic_diet_woocommerce_sale_border_radius).'px !important;';
		$keto_organic_diet_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$keto_organic_diet_social_icon_font_size = get_theme_mod('keto_organic_diet_social_icon_font_size');
	if($keto_organic_diet_social_icon_font_size != false){
		$keto_organic_diet_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$keto_organic_diet_custom_css .='font-size: '.esc_attr($keto_organic_diet_social_icon_font_size).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_social_icon_padding = get_theme_mod('keto_organic_diet_social_icon_padding');
	if($keto_organic_diet_social_icon_padding != false){
		$keto_organic_diet_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$keto_organic_diet_custom_css .='padding: '.esc_attr($keto_organic_diet_social_icon_padding).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_social_icon_width = get_theme_mod('keto_organic_diet_social_icon_width');
	if($keto_organic_diet_social_icon_width != false){
		$keto_organic_diet_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$keto_organic_diet_custom_css .='width: '.esc_attr($keto_organic_diet_social_icon_width).';';
		$keto_organic_diet_custom_css .='}';
	}

	$keto_organic_diet_social_icon_height = get_theme_mod('keto_organic_diet_social_icon_height');
	if($keto_organic_diet_social_icon_height != false){
		$keto_organic_diet_custom_css .='#sidebar .custom-social-icons i, #footer-2 .custom-social-icons i{';
			$keto_organic_diet_custom_css .='height: '.esc_attr($keto_organic_diet_social_icon_height).';';
		$keto_organic_diet_custom_css .='}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$keto_organic_diet_display_grid_posts_settings = get_theme_mod( 'keto_organic_diet_display_grid_posts_settings','Into Blocks');
    if($keto_organic_diet_display_grid_posts_settings == 'Without Blocks'){
		$keto_organic_diet_custom_css .='.grid-post-main-box{';
			$keto_organic_diet_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$keto_organic_diet_custom_css .='}';
	}
