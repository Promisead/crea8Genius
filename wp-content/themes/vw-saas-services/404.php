<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package VW SAAS Services 
 */

get_header(); ?>

<main id="maincontent" role="main" class="content-vw">
	<div class="container">
		<div class="page-content">
	    	<h1><?php echo esc_html(get_theme_mod('vw_saas_services_404_page_title',__('404 Not Found','vw-saas-services')));?></h1>
			<p class="text-404"><?php echo esc_html(get_theme_mod('vw_saas_services_404_page_content',__('Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.','vw-saas-services')));?></p>
			<?php if( get_theme_mod('vw_saas_services_404_page_button_text','Go Back') != ''){ ?>
				<div class="more-btn">
			        <a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_html(get_theme_mod('vw_saas_services_404_page_button_text',__('Go Back','vw-saas-services')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_saas_services_404_page_button_text',__('Go Back','vw-saas-services')));?></span></a>
			    </div>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
</main>

<?php get_footer(); ?>