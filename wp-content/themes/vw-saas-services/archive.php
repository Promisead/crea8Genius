<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package VW SAAS Services 
 */

get_header(); ?>

<div class="container">
  <main id="maincontent" class="middle-align pt-5" role="main">
    <header>
      <?php
        the_archive_title( '<h1 class="page-title mb-2 p-0">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
      ?>
    </header>
    <?php
      $vw_saas_services_theme_lay = get_theme_mod( 'vw_saas_services_theme_options','Right Sidebar');
      if($vw_saas_services_theme_lay == 'Left Sidebar'){ ?>
      <div class="row">
        <div class="col-lg-4 col-md-4" id="sidebar"><?php get_sidebar();?></div>
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format());
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_saas_services_blog_pagination_hide_show',true) == 1) { ?>
            <div class="navigation">
              <?php vw_saas_services_blog_posts_pagination(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    <?php }else if($vw_saas_services_theme_lay == 'Right Sidebar'){ ?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php if ( have_posts() ) :
            /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format());
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_saas_services_blog_pagination_hide_show',true) == 1) { ?>
            <div class="navigation">
              <?php vw_saas_services_blog_posts_pagination(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4" id="sidebar"><?php get_sidebar();?></div>
      </div>
    <?php }else if($vw_saas_services_theme_lay == 'One Column'){ ?>
      <div id="our-services" class="services">
        <?php if ( have_posts() ) :
          /* Start the Loop */
          while ( have_posts() ) : the_post();
            get_template_part( 'template-parts/content',get_post_format());
          endwhile;

          else :
            get_template_part( 'no-results' ); 
          endif; 
        ?>
        <?php if( get_theme_mod( 'vw_saas_services_blog_pagination_hide_show',true) == 1) { ?>
          <div class="navigation">
            <?php vw_saas_services_blog_posts_pagination(); ?>
            <div class="clearfix"></div>
          </div>
        <?php } ?>
      </div>   
    <?php }else if($vw_saas_services_theme_lay == 'Grid Layout'){ ?>
      <div class="row">
        <div id="our-services" class="services flipInX col-lg-9 col-md-9">
          <div class="row">
            <?php if ( have_posts() ) :
              /* Start the Loop */
              while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/grid-layout' ); 
              endwhile;

              else :
                get_template_part( 'no-results' ); 
              endif; 
            ?>
          </div>
          <?php if( get_theme_mod( 'vw_saas_services_blog_pagination_hide_show',true) == 1) { ?>
            <div class="navigation">
              <?php vw_saas_services_blog_posts_pagination(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-3 col-md-3" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php }else{ ?>
      <div class="row">
        <div id="our-services" class="services col-lg-8 col-md-8">
          <?php if ( have_posts() ) :
          /* Start the Loop */
            while ( have_posts() ) : the_post();
              get_template_part( 'template-parts/content',get_post_format()); 
            endwhile;

            else :
              get_template_part( 'no-results' ); 
            endif; 
          ?>
          <?php if( get_theme_mod( 'vw_saas_services_blog_pagination_hide_show',true) == 1) { ?>
            <div class="navigation">
              <?php vw_saas_services_blog_posts_pagination(); ?>
              <div class="clearfix"></div>
            </div>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4" id="sidebar"><?php dynamic_sidebar('sidebar-1');?></div>
      </div>
    <?php } ?>
    <div class="clearfix"></div>
  </main>
</div>

<?php get_footer(); ?>