<?php
/**
 * The template part for header
 *
 * @package Keto Organic Diet 
 * @subpackage keto-organic-diet
 * @since keto-organic-diet 1.0
 */
?>

<div id="header">
    <div class="toggle-nav mobile-menu text-lg-end text-md-end text-center py-md-0 py-2">
      <button role="tab" onclick="keto_organic_diet_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','keto-organic-diet'); ?></span></button>
    </div>
  <div id="mySidenav" class="nav sidenav">
    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'keto-organic-diet' ); ?>">
      <?php 
        wp_nav_menu( array( 
          'theme_location' => 'primary',
          'container_class' => 'main-menu clearfix' ,
          'menu_class' => 'clearfix',
          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
          'fallback_cb' => 'wp_page_menu',
        ) );
       ?>
      <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="keto_organic_diet_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','keto-organic-diet'); ?></span></a>
    </nav>
  </div>
</div>