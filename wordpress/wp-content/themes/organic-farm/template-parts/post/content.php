<?php
/**
 * Template part for displaying posts
 *
 * @subpackage Organic Farm
 * @since 1.0
 */
?>

<div id="Category-section" class="entry-content w-100">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="postbox smallpostimage p-3">
			<h3 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
			<?php
                if(has_post_thumbnail()) { ?>
		        <div class="box-content text-center">
	            	<?php the_post_thumbnail(); ?>
	            </div>
	        <?php }?>
        	<div class="overlay pt-2 text-center">
        		<div class="date-box mb-2">
        			<?php if( get_option('organic_farm_date',false) != 'off'){ ?>
        				<span class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('organic_farm_date_icon','far fa-calendar-alt')); ?> mr-2"></i><?php the_time( get_option( 'date_format' ) ); ?></span>
        			<?php } ?>
        			<?php if( get_option('organic_farm_admin',false) != 'off'){ ?>
        				<span class="entry-author mr-2"><i class="<?php echo esc_attr(get_theme_mod('organic_farm_author_icon','fas fa-user')); ?> mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
        			<?php }?>
        			<?php if( get_option('organic_farm_comment',false) != 'off'){ ?>
      					<span class="entry-comments mr-2"><i class="<?php echo esc_attr(get_theme_mod('organic_farm_comment_icon','fas fa-comments')); ?> mr-2"></i> <?php comments_number( __('0 Comments','organic-farm'), __('0 Comments','organic-farm'), __('% Comments','organic-farm')); ?></span>
      				<?php }?>
      				<?php if( get_option('organic_farm_tag',false) != 'off'){ ?>
      					<span class="tags"><i class="<?php echo esc_attr(get_theme_mod('organic_farm_tag_icon','fas fa-tags')); ?> mr-2"></i> <?php display_post_tag_count(); ?></span>
      				<?php }?>
    			</div>
    			<p><?php organic_farm_custom_excerpt(); ?></p>
        	</div>
	      	<div class="clearfix"></div>
	  	</div>
	</div>
</div>