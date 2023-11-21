<?php
/**
 * The template part for Middle Header
 *
 * @package Keto Organic Diet
 * @subpackage keto-organic-diet
 * @since keto-organic-diet 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div class="row header-bg mx-md-0 py-md-0 py-lg-0 py-3">
      <div class="col-lg-3 col-md-4 col-12">
        <div class="logo text-md-start text-lg-start text-center">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('keto_organic_diet_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('keto_organic_diet_logo_title_hide_show',true) == 1){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('keto_organic_diet_tagline_hide_show',false) == 1){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-3 col-12 align-self-center">
        <?php get_template_part('template-parts/header/navigation'); ?>
      </div>
      <div class="col-lg-3 col-md-5 col-12 pb-3 pb-md-0 pb-lg-0 align-self-center">
          <?php if( get_theme_mod('keto_organic_diet_cosulation_btn_text') != '' || get_theme_mod('keto_organic_diet_cosulation_btn_link') != ''){ ?>
            <div class="header-button text-md-end text-lg-end text-center mt-3 mt-md-0">
              <a class="" href="<?php echo esc_url(get_theme_mod('keto_organic_diet_cosulation_btn_link',''));?>"><?php echo esc_html(get_theme_mod('keto_organic_diet_cosulation_btn_text',''));?></a>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
</div>