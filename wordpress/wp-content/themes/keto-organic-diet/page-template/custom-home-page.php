<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'keto_organic_diet_before_slider' ); ?>

  <?php if( get_theme_mod( 'keto_organic_diet_slider_hide_show', false) != '' || get_theme_mod( 'keto_organic_diet_resp_slider_hide_show', false) != '') { ?>
    <?php if(get_theme_mod('keto_organic_diet_slider_type', 'Default slider') == 'Default slider' ){ ?>
      <section id="slider">  
        <div class="row">
            <div class="col-lg-1 col-md-1 p-0 horizontal-text text-center">
                <?php if( get_theme_mod('keto_organic_diet_horizontal_text') != ''){ ?>
                  <span class="mb-md-0 mb-lg-0 mb-0 align-self-center"><?php echo esc_html(get_theme_mod('keto_organic_diet_horizontal_text'));?>
                  </span>
                <?php }?> 
            </div>
            <div class="col-lg-11 col-md-11 p-0">      
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'keto_organic_diet_slider_speed',4000)) ?>">
                <?php $keto_organic_diet_pages = array();
                  for ( $count = 1; $count <= 3; $count++ ) {
                    $mod = intval( get_theme_mod( 'keto_organic_diet_slider_page' . $count ));
                    if ( 'page-none-selected' != $mod ) {
                      $keto_organic_diet_pages[] = $mod;
                    }
                  }
                  if( !empty($keto_organic_diet_pages) ) :
                    $args = array(
                      'post_type' => 'page',
                      'post__in' => $keto_organic_diet_pages,
                      'orderby' => 'post__in'
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                      $i = 1;
                ?>
                <div class="carousel-inner" role="listbox">
                  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                      <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                      } else{?>
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/banner.png" alt="" />
                      <?php } ?>
                      <div class="carousel-caption">
                        <div class="inner_carousel">
                          <h1 class="wow slideInRight delay-1000" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                          <p class="wow slideInRight delay-1000" data-wow-duration="2s"><?php $keto_organic_diet_excerpt = get_the_excerpt(); echo esc_html( keto_organic_diet_string_limit_words( $keto_organic_diet_excerpt, esc_attr(get_theme_mod('keto_organic_diet_slider_excerpt_number','12')))); ?></p>
                          <?php if( get_theme_mod('keto_organic_diet_slider_button_text','READ MORE') != ''){ ?>
                            <div class="more-btn my-3 my-lg-5 my-md-5 wow slideInRight delay-1000" data-wow-duration="2s">
                              <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('keto_organic_diet_slider_button_text',__('READ MORE','keto-organic-diet')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('keto_organic_diet_slider_button_text',__('READ MORE','keto-organic-diet')));?></span></a>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  <?php $i++; endwhile; 
                  wp_reset_postdata();?>
                </div>
                <?php else : ?>
                  <div class="no-postfound"></div>
                <?php endif;
                endif;?>
                <?php if(get_theme_mod('keto_organic_diet_slider_arrow_hide_show', true)){?>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
                  <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_slider_prev_icon','fas fa-angle-left')); ?>"></i>
                  <span class="screen-reader-text"><?php echo esc_html('Previous','keto-organic-diet'); ?></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
                  <i class="<?php echo esc_attr(get_theme_mod('keto_organic_diet_slider_next_icon','fas fa-angle-right')); ?>"></i>
                  <span class="screen-reader-text"><?php echo esc_html('Next','keto-organic-diet'); ?></span>
                  </button>
                <?php }?>
              </div> 
            </div>
        </div>
      </section>
    <?php } else if(get_theme_mod('keto_organic_diet_slider_type', 'Advance slider') == 'Advance slider'){?>
      <?php echo do_shortcode(get_theme_mod('keto_organic_diet_advance_slider_shortcode')); ?>
    <?php } ?>
  <?php }?>

  <?php do_action( 'keto_organic_diet_after_slider' ); ?>

<!-- Natural life -->
  <?php if(get_theme_mod('keto_organic_diet_section_text') != '' || get_theme_mod('keto_organic_diet_section_title') != '' || get_theme_mod('keto_organic_diet_features_category') != '' || get_theme_mod('keto_organic_diet_video_post_setting') != '' ){?>
    <section id="natural-life-section" class="py-5 wow bounceInDown delay-1000" data-wow-duration="3s">
      <div class="container text-center py-md-4 py-3 natural-life">
        <?php if( get_theme_mod('keto_organic_diet_section_text') != ''){ ?>
          <span><?php echo esc_html(get_theme_mod('keto_organic_diet_section_text'));?></span>
        <?php }?>
        <?php if( get_theme_mod('keto_organic_diet_section_title') != ''){ ?>
          <h2 class="py-md-3 pt-3"><?php echo esc_html(get_theme_mod('keto_organic_diet_section_title'));?></h2>
        <?php }?>
        <div class="video-section">
          <div class="row align-items-center">
            <div class="col-lg-5 col-md-12 col-12">
              <div class="main-video">
                <?php
                  $keto_organic_diet_postData1=  get_theme_mod('keto_organic_diet_video_post');
                  if($keto_organic_diet_postData1){
                    $args = array( 'name' => esc_html($keto_organic_diet_postData1 ,'keto-organic-diet'));
                    $query = new WP_Query( $args );
                  if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post(); ?>
                      <div class="post-sec">
                        <?php
                          $content = apply_filters( 'the_content', get_the_content() );
                          $video = false;
                            // Only get video from the content if a playlist isn't present.
                          if ( false === strpos( $content, 'wp-playlist-script' ) ) {
                            $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
                          }?>
                        <?php
                          if ( ! is_single() ) {
                            // If not a single post, highlight the video file.
                          if ( ! empty( $video ) ) {
                          foreach ( $video as $video_html ) {
                            echo '<div class="entry-video">';
                              echo $video_html;
                            echo '</div>';
                              }
                            } else {
                              the_post_thumbnail();
                            }
                          }; 
                        ?>
                      </div>
                    <?php endwhile; 
                    wp_reset_postdata();?>
                  <?php else : ?>
                    <div class="no-postfound"></div>
                  <?php
                endif; }?>
              </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12 mt-md-4 mt-lg-0 mt-4">
              <?php
                $keto_organic_diet_catdata=  get_theme_mod('keto_organic_diet_features_category');
                if($keto_organic_diet_catdata){
                $page_query = new WP_Query(array( 'category_name' => esc_html($keto_organic_diet_catdata ,'keto-organic-diet'))); ?>         
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-12 col-md-12 col-12 align-self-center mb-4">
                    <div class="catgory-box">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 align-self-center text-center">
                          <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12  text-md-start text-lg-start text-center">
                          <?php the_category(); ?>
                          <div class="categroy-heading text-md-start text-lg-start text-center">
                              <h3 class="mt-3 mt-md-0 mt-lg-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endwhile;
                wp_reset_postdata();}?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <div id="content-vw" class="entry-content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>