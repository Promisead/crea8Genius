<?php
/**
 * The template part for header
 *
 * @package VW SAAS Services 
 * @subpackage vw-saas-services
 * @since vw-saas-services 1.0
 */
?>

<div class="middle-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-12 align-self-center py-3 py-lg-0 py-md-0 text-lg-start text-md-center text-center">
				<div class="logo">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
              <?php endif; ?>
              <?php $blog_info = get_bloginfo( 'name' ); ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                  <?php if ( is_front_page() && is_home() ) : ?>
                    <?php if( get_theme_mod('vw_saas_services_logo_title_hide_show',true) == 1){ ?>
                      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } ?>
                  <?php else : ?>
                    <?php if( get_theme_mod('vw_saas_services_logo_title_hide_show',true) == 1){ ?>
                      <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php } ?>
                  <?php endif; ?>
                <?php endif; ?>
                <?php
                  $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) :
                ?>
                <?php if( get_theme_mod('vw_saas_services_tagline_hide_show',false) == 1){ ?>
                  <p class="site-description mb-0">
                    <?php echo esc_html($description); ?>
                  </p>
                <?php } ?>
          <?php endif; ?>
    		</div>
			</div>
			<div class="col-lg-6 col-md-3 col-3 align-self-center menu-section-sec">
				<div class="menu-section">
          <?php get_template_part('template-parts/header/navigation'); ?>
        </div>
			</div>
			<div class="col-lg-1 col-md-1 col-3 align-self-center text-center text-lg-end text-md-end">
        <?php if( get_theme_mod( 'vw_saas_services_my_account_hide_show', true) == 1) { ?>
          <div class="account">
            <?php if(class_exists('woocommerce')){ ?>
              <?php if ( is_user_logged_in() ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','vw-saas-services'); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_saas_services_myaccount_icon','far fa-user')); ?>"></i><span class="icon-text"></a>
              <?php }
              else { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','vw-saas-services'); ?>"><i class="<?php echo esc_attr(get_theme_mod('vw_saas_services_myaccount_icon','far fa-user')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','vw-saas-services' );?></span></a>
              <?php } ?>
            <?php }?>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-5 col-6 align-self-center">
        <?php if( get_theme_mod('vw_saas_services_topbar_btn_text') != '' || get_theme_mod('vw_saas_services_topbar_btn_link') != ''){ ?>
          <div class="header-button text-md-end text-lg-end text-center">
            <a href="<?php echo esc_url(get_theme_mod('vw_saas_services_topbar_btn_link',''));?>"><?php echo esc_html(get_theme_mod('vw_saas_services_topbar_btn_text',''));?></a>
          </div>
        <?php } ?>
      </div>
		</div>
	</div>
</div>

