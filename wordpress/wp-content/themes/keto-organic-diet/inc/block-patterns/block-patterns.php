<?php
/**
 * Keto Organic Diet: Block Patterns
 *
 * @package Keto Organic Diet
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'keto-organic-diet',
		array( 'label' => __( 'Keto Organic Diet', 'keto-organic-diet' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'keto-organic-diet/banner-section',
		array(
			'title'      => __( 'Banner Section', 'keto-organic-diet' ),
			'categories' => array( 'keto-organic-diet' ),
			'content'    => "<!-- wp:columns {\"align\":\"full\",\"className\":\"banner-section-cover\"} -->\n<div class=\"wp-block-columns alignfull banner-section-cover\"><!-- wp:column {\"width\":\"10%\",\"style\":{\"color\":{\"background\":\"#609a33\"}},\"className\":\"banner-section-col1\"} -->\n<div class=\"wp-block-column banner-section-col1 has-background\" style=\"background-color:#609a33;flex-basis:10%\"><!-- wp:paragraph {\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color\">Keeping Your Body As It's best.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"90%\",\"backgroundColor\":\"white\",\"className\":\"banner-section-col2 \"} -->\n<div class=\"wp-block-column banner-section-col2 has-white-background-color has-background\" style=\"flex-basis:90%\"><!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":178,\"dimRatio\":20,\"overlayColor\":\"white\",\"focalPoint\":{\"x\":0.5,\"y\":0.5},\"isDark\":false,\"className\":\"banner-section-img\"} -->\n<div class=\"wp-block-cover is-light banner-section-img\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-white-background-color has-background-dim-20 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-178\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" style=\"object-position:50% 50%\" data-object-fit=\"cover\" data-object-position=\"50% 50%\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"level\":1,\"align\":\"full\",\"className\":\"col-md-6 col-lg-6 align-left ps-4\"} -->\n<h1 class=\"alignfull col-md-6 col-lg-6 align-left ps-4\">This Life Style For Your Fitness, Not only Diet</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"ps-4  col-lg-6\"} -->\n<p class=\"ps-4 col-lg-6\">Lorem ipsum , or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"background\":\"#609a33\"},\"border\":{\"radius\":\"2px\"}},\"className\":\"ps-4 is-style-fill\",\"fontSize\":\"small\"} -->\n<div class=\"wp-block-button has-custom-font-size ps-4 is-style-fill has-small-font-size\" id=\"banner-section-col2-btn\"><a class=\"wp-block-button__link has-background wp-element-button\" style=\"border-radius:2px;background-color:#609a33\">READ MORE</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);

	register_block_pattern(
		'keto-organic-diet/natural-life-section',
		array(
			'title'      => __( 'Natural Life Section', 'keto-organic-diet' ),
			'categories' => array( 'keto-organic-diet' ),
			'content'    => "<!-- wp:group {\"className\":\"natural-life-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group natural-life-section\"><!-- wp:paragraph {\"align\":\"center\",\"style\":{\"color\":{\"text\":\"#609a33\"}},\"className\":\"natural-life-section-p\"} -->\n<p class=\"has-text-align-center natural-life-section-p has-text-color\" style=\"color:#609a33\">  | Fitness and nutrition</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"className\":\"natural-life-section-h py-md-3 pt-3\"} -->\n<h2 class=\"has-text-align-center natural-life-section-h py-md-3 pt-3\">How Natural life Feel you better</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"className\":\"natural-life-section-col\"} -->\n<div class=\"wp-block-columns natural-life-section-col\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"\",\"className\":\"natural-life-section-col1\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center natural-life-section-col1\"><!-- wp:embed {\"url\":\"https://youtu.be/JLnycPtolfw\",\"type\":\"video\",\"providerNameSlug\":\"youtube\",\"responsive\":true,\"className\":\"wp-embed-aspect-4-3 wp-has-aspect-ratio\"} -->\n<figure class=\"wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-4-3 wp-has-aspect-ratio\"><div class=\"wp-block-embed__wrapper\">\nhttps://youtu.be/JLnycPtolfw\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"natural-life-section-col2 mt-md-4 mt-lg-0 mt-4\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center natural-life-section-col2 mt-md-4 mt-lg-0 mt-4\"><!-- wp:columns {\"className\":\"category1\"} -->\n<div class=\"wp-block-columns category1\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:image {\"id\":231,\"width\":177,\"height\":97,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/post-2.png\" alt=\"\" class=\"wp-image-231\" width=\"177\" height=\"97\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\" text-md-start text-lg-start text-center\"} -->\n<div class=\"wp-block-column text-md-start text-lg-start text-center\"><!-- wp:paragraph -->\n<p>Exercise</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>It is a long established fact that a reader will be&nbsp;</h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns {\"className\":\"category2\"} -->\n<div class=\"wp-block-columns category2\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:image {\"id\":232,\"width\":172,\"height\":94,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full is-resized\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/post-3.png\" alt=\"\" class=\"wp-image-232\" width=\"172\" height=\"94\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\" text-md-start text-lg-start text-center\"} -->\n<div class=\"wp-block-column text-md-start text-lg-start text-center\"><!-- wp:paragraph -->\n<p>Exercise</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>It is a long established fact that a reader </h3>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}