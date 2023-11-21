<?php
/**
 * The template part for Middle Header
 *
 * @package Keto Organic Diet
 * @subpackage keto-organic-diet
 * @since keto-organic-diet 1.0
 */
?>

<?php if( get_theme_mod( 'keto_organic_diet_topbar_hide_show', false) != '') { ?>
  <div class="container">
    <div class="top-bar">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-12 text-lg-start text-md-start text-center">
            <div class="location py-2">
              <?php if( get_theme_mod( 'keto_organic_diet_header_address') != '') { ?>
                <span><i class="me-2 fas fa-map-marker-alt"></i><?php echo esc_html(get_theme_mod('keto_organic_diet_header_address',''));?></span>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-12 text-lg-start text-md-start text-center">
            <div class="email py-2 ">
              <?php if( get_theme_mod('keto_organic_diet_email_address') != ''){ ?>
                <span class="mb-0"><i class="me-2 far fa-envelope "></i><a href="mailto:<?php echo esc_attr(get_theme_mod('keto_organic_diet_email_address',''));?>"><?php echo esc_html(get_theme_mod('keto_organic_diet_email_address',''));?></a></span>
              <?php } ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-5 col-12 text-lg-end text-md-end text-center">
            <div class="social-icon ">
                <?php dynamic_sidebar('Social Icon'); ?>
            </div>
          </div>
        </div>
    </div>
  </div>
<?php } ?>