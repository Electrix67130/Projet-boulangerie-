<?php
/**
 * The template part for displaying post
 *
 * @package Keto Organic Diet 
 * @subpackage keto-organic-diet
 * @since keto-organic-diet 1.0
 */
?>

<?php 
  $keto_organic_diet_archive_year  = get_the_time('Y'); 
  $keto_organic_diet_archive_month = get_the_time('m'); 
  $keto_organic_diet_archive_day   = get_the_time('d'); 
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
    <?php
      if ( ! is_single() ) {
        // If not a single post, highlight the gallery.
        if ( get_post_gallery() ) {
          echo '<div class="entry-gallery">';
            echo ( get_post_gallery() );
          echo '</div>';
        };
      };
    ?>
    <article class="new-text">
      <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
      <?php if( get_theme_mod( 'keto_organic_diet_toggle_postdate',true) == 1 || get_theme_mod( 'keto_organic_diet_toggle_author',true) == 1 || get_theme_mod( 'keto_organic_diet_toggle_comments',true) == 1 || get_theme_mod( 'keto_organic_diet_toggle_time',true) == 1) { ?>
          <div class="post-info p-2 mb-3">
            <?php if(get_theme_mod('keto_organic_diet_toggle_postdate',true) == 1){ ?>
              <i class="fas fa-calendar-alt me-2"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $keto_organic_diet_archive_year, $keto_organic_diet_archive_month, $keto_organic_diet_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('keto_organic_diet_toggle_author',true) == 1){ ?>
              <span><?php echo esc_html(get_theme_mod('keto_organic_diet_meta_field_separator', '|'));?></span> <i class="fas fa-user me-2"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
            <?php } ?>

            <?php if(get_theme_mod('keto_organic_diet_toggle_comments',true) == 1){ ?>
              <span><?php echo esc_html(get_theme_mod('keto_organic_diet_meta_field_separator', '|'));?></span> <i class="fa fa-comments me-2" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'keto-organic-diet'), __('0 Comments', 'keto-organic-diet'), __('% Comments', 'keto-organic-diet') ); ?></span>
            <?php } ?>

            <?php if(get_theme_mod('keto_organic_diet_toggle_time',true) == 1){ ?>
              <span><?php echo esc_html(get_theme_mod('keto_organic_diet_meta_field_separator', '|'));?></span> <i class="fas fa-clock me-2"></i> <span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
            <?php } ?>
          </div>
        <?php } ?>
        <p class="mb-0">
          <?php $keto_organic_diet_theme_lay = get_theme_mod( 'keto_organic_diet_excerpt_settings','Excerpt');
          if($keto_organic_diet_theme_lay == 'Content'){ ?>
            <?php the_content(); ?>
          <?php }
          if($keto_organic_diet_theme_lay == 'Excerpt'){ ?>
            <?php if(get_the_excerpt()) { ?>
              <?php $keto_organic_diet_excerpt = get_the_excerpt(); echo esc_html( keto_organic_diet_string_limit_words( $keto_organic_diet_excerpt, esc_attr(get_theme_mod('keto_organic_diet_excerpt_number','30')))); ?><?php echo esc_html(get_theme_mod('keto_organic_diet_blog_excerpt_suffix',''));?>
            <?php }?>
          <?php }?>
        </p>
        <?php if( get_theme_mod('keto_organic_diet_button_text','Read More') != ''){ ?>
          <div class="more-btn mt-4 mb-4">
            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('keto_organic_diet_button_text',__('Read More','keto-organic-diet')));?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('keto_organic_diet_button_text',__('Read More','keto-organic-diet')));?></span></a>
          </div>
        <?php } ?>
    </article>
  </div>
</div>