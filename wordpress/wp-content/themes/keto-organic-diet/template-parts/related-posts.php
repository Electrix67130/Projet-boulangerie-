<?php
/**
 * Related posts based on categories and tags.
 * 
 */

$keto_organic_diet_related_posts_taxonomy = get_theme_mod( 'keto_organic_diet_related_posts_taxonomy', 'category' );

$keto_organic_diet_post_args = array(
    'posts_per_page'    => absint( get_theme_mod( 'keto_organic_diet_related_posts_count', '3' ) ),
    'orderby'           => 'rand',
    'post__not_in'      => array( get_the_ID() ),
);

$keto_organic_diet_tax_terms = wp_get_post_terms( get_the_ID(), 'category' );
$keto_organic_diet_terms_ids = array();
foreach( $keto_organic_diet_tax_terms as $tax_term ) {
	$keto_organic_diet_terms_ids[] = $tax_term->term_id;
}

$keto_organic_diet_post_args['category__in'] = $keto_organic_diet_terms_ids; 

if(get_theme_mod('keto_organic_diet_related_post',true)==1){

$keto_organic_diet_related_posts = new WP_Query( $keto_organic_diet_post_args );

if ( $keto_organic_diet_related_posts->have_posts() ) : ?>
    <div class="related-post">
        <h3 class="py-3"><?php echo esc_html(get_theme_mod('keto_organic_diet_related_post_title','Related Post'));?></h3>
        <div class="row">
            <?php while ( $keto_organic_diet_related_posts->have_posts() ) : $keto_organic_diet_related_posts->the_post(); ?>
                <?php get_template_part('template-parts/grid-layout'); ?>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif;
wp_reset_postdata();

}