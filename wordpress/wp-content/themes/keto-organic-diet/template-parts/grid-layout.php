<?php
/**
 * The template part for displaying grid post
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
<div class="col-lg-4 col-md-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
	    <div class="grid-post-main-box p-3 mb-3 wow zoomIn" data-wow-duration="2s">
	      	<div class="box-image">
	          	<?php 
		            if(has_post_thumbnail() && get_theme_mod( 'keto_organic_diet_featured_image_hide_show',true) == 1) {
		              the_post_thumbnail();
		            }
	          	?>
	        </div>
	        <h2 class="section-title mt-0 pt-0"><a href="<?php the_permalink(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
	        <?php if( get_theme_mod( 'keto_organic_diet_grid_postdate',true) == 1 || get_theme_mod( 'keto_organic_diet_grid_author',true) == 1 || get_theme_mod( 'keto_organic_diet_grid_comments',true) == 1 || get_theme_mod( 'keto_organic_diet_grid_time',true) == 1) { ?>
	            <div class="post-info">
	                <?php if(get_theme_mod('keto_organic_diet_grid_postdate',true)==1){ ?>
	                    <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_single_postdate_icon','me-2 fas fa-calendar-alt')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $keto_organic_diet_archive_year, $keto_organic_diet_archive_month, $keto_organic_diet_archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span><?php echo esc_html(get_theme_mod('keto_organic_diet_grid_post_meta_field_separator', '|'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('keto_organic_diet_grid_author',true)==1){ ?>
	                     <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_grid_author_icon','me-2 fas fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span><?php echo esc_html(get_theme_mod('keto_organic_diet_grid_post_meta_field_separator', '|'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('keto_organic_diet_grid_comments',true)==1){ ?>
	                     <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_grid_comments_icon','me-2 fa fa-comments')); ?>" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'keto-organic-diet'), __('0 Comments', 'keto-organic-diet'), __('% Comments', 'keto-organic-diet') ); ?> </span><span><?php echo esc_html(get_theme_mod('keto_organic_diet_grid_post_meta_field_separator', '|'));?></span>
	                <?php } ?>

	                <?php if(get_theme_mod('keto_organic_diet_grid_time',true)==1){ ?>
	                     <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_grid_time_icon','me-2 fa fa-comments')); ?>"></i><span class="entry-time"><?php echo esc_html( get_the_time() ); ?></span>
	                <?php } ?>
	            </div>
        	<?php } ?>
	        <div class="new-text">
	        	<p>
			        <?php $keto_organic_diet_excerpt = get_the_excerpt(); echo esc_html( keto_organic_diet_string_limit_words( $keto_organic_diet_excerpt, esc_attr(get_theme_mod('keto_organic_diet_related_posts_excerpt_number','30')))); ?> <?php echo esc_html( get_theme_mod('keto_organic_diet_excerpt_suffix','') ); ?>
	        	</p>
	        </div>
	        <?php if( get_theme_mod('keto_organic_diet_button_text','Read More') != ''){ ?>
	          <div class="more-btn mt-4 mb-4">
	            <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('keto_organic_diet_button_text',__('Read More','keto-organic-diet')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('keto_organic_diet_button_text',__('Read More','keto-organic-diet')));?></span></a>
	          </div>
	        <?php } ?>
	    </div>
	    <div class="clearfix"></div>
  	</article>
</div>