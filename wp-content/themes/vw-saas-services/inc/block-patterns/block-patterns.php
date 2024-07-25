<?php
/**
 * VW SAAS Services: Block Patterns
 *
 * @package  VW SAAS Services
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-saas-services',
		array( 'label' => __( 'VW SAAS Services', 'vw-saas-services' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-saas-services/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-saas-services' ),
			'categories' => array( 'vw-saas-services' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":1880,\"dimRatio\":0,\"minHeight\":550,\"isDark\":false,\"align\":\"full\",\"className\":\"banner-section position-relative\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-cover alignfull is-light banner-section position-relative\" style=\"min-height:550px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-0 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-1880\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"textTransform\":\"capitalize\",\"fontStyle\":\"normal\",\"fontWeight\":\"700\",\"fontSize\":\"46px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}}},\"textColor\":\"white\"} -->\n<h1 class=\"wp-block-heading has-white-color has-text-color has-link-color\" style=\"font-size:46px;font-style:normal;font-weight:700;text-transform:capitalize\">All Your Product Stats In One Place</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"16px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}}},\"textColor\":\"white\"} -->\n<p class=\"has-white-color has-text-color has-link-color\" style=\"font-size:16px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"white\",\"textColor\":\"black\",\"style\":{\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"border\":{\"radius\":\"10px\"},\"typography\":{\"fontSize\":\"18px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:18px\"><a class=\"wp-block-button__link has-black-color has-white-background-color has-text-color has-background has-link-color wp-element-button\" href=\"#\" style=\"border-radius:10px\" target=\"_blank\" rel=\"noreferrer noopener\">Get A Free Trial</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-saas-services/features-section',
		array(
			'title'      => __( 'Features Section', 'vw-saas-services' ),
			'categories' => array( 'vw-saas-services' ),
			'content'    => "<!-- wp:group {\"className\":\"about-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group about-section\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"45%\",\"className\":\"about-col-1\"} -->\n<div class=\"wp-block-column about-col-1\" style=\"flex-basis:45%\"><!-- wp:image {\"align\":\"center\",\"id\":1904,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image aligncenter size-full\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/about.png\" alt=\"\" class=\"wp-image-1904\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"55%\",\"className\":\"about-col-2\"} -->\n<div class=\"wp-block-column about-col-2\" style=\"flex-basis:55%\"><!-- wp:heading -->\n<h2 class=\"wp-block-heading\">Vw Enterprise Resource Planning</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"16px\"}},\"className\":\"about-para\"} -->\n<p class=\"about-para\" style=\"font-size:16px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:group {\"className\":\"about-arrow\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group about-arrow\"><!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"16px\"}}} -->\n<p style=\"font-size:16px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Incididunt ut labore et dolore magna aliqua.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"16px\"}}} -->\n<p style=\"font-size:16px\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Incididunt ut labore et dolore magna aliqua.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:group -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"black\",\"textColor\":\"white\",\"style\":{\"border\":{\"radius\":\"10px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}},\"typography\":{\"fontSize\":\"14px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:14px\"><a class=\"wp-block-button__link has-white-color has-black-background-color has-text-color has-background has-link-color wp-element-button\" href=\"#\" style=\"border-radius:10px\">Discover More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->",
		)
	);
}