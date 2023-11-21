<?php
/**
 * The template for displaying 404 pages (not found)
 * @subpackage Organic Farm
 * @since 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="content" class="site-main" role="main">
		<header class="page-header">
			<div class="header-image"></div>
			<div class="internal-div">
				<?php //breadcrumb
				if ( !is_page_template( 'page-template/custom-home-page.php' ) ) { 
					if( get_option('organic_farm_enable_breadcrumb',false) != 'off'){ ?>
						<div class="bread_crumb align-self-center text-center">
							<?php organic_farm_breadcrumb();  ?>
						</div>
					<?php }
				}?>
				<h1 class="page-title text-center my-5"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'organic-farm' ); ?></h1>
				<div class="home-btn text-center">
				<a href="<?php echo esc_url( home_url() ); ?>" class="py-3 px-4"><?php esc_html_e( 'GO BACK', 'organic-farm' ); ?></a>
			</div>
			</div>
		</header>
		<section class="error-404 not-found my-5">
			<div class="container">
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'organic-farm' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</div>
		</section>
	</main>
</div>

<?php get_footer();