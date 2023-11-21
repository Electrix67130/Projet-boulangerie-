<?php
//about theme info
add_action( 'admin_menu', 'keto_organic_diet_gettingstarted' );
function keto_organic_diet_gettingstarted() {
	add_theme_page( esc_html__('About Keto Organic Diet', 'keto-organic-diet'), esc_html__('About Keto Organic Diet', 'keto-organic-diet'), 'edit_theme_options', 'keto_organic_diet_guide', 'keto_organic_diet_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function keto_organic_diet_admin_theme_style() {
	wp_enqueue_style('keto-organic-diet-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('keto-organic-diet-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'keto_organic_diet_admin_theme_style');

//guidline for about theme
function keto_organic_diet_mostrar_guide() { 
	//custom function about theme customizer
	$keto_organic_diet_return = add_query_arg( array()) ;
	$keto_organic_diet_theme = wp_get_theme( 'keto-organic-diet' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Keto Organic Diet', 'keto-organic-diet' ); ?> <span class="version"><?php esc_html_e( 'Version', 'keto-organic-diet' ); ?>: <?php echo esc_html($keto_organic_diet_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','keto-organic-diet'); ?></p>
    </div>
    <div class="col-right">
    <div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
	</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Keto Organic Diet at 20% Discount','keto-organic-diet'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','keto-organic-diet'); ?> ( <span><?php esc_html_e('vwpro20','keto-organic-diet'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( KETO_ORGANIC_DIET_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'keto-organic-diet' ); ?></a>
			</div>
		</div>
   	</div>
    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'keto-organic-diet' ); ?></button>
			<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'keto-organic-diet' ); ?></button>
			<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'keto-organic-diet' ); ?></button>
			<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'keto-organic-diet' ); ?></button>
			<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'keto-organic-diet' ); ?></button>
		  	<button class="tablinks" onclick="keto_organic_diet_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'keto-organic-diet' ); ?></button>
		</div>

		<?php
			$keto_organic_diet_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$keto_organic_diet_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Keto_Organic_Diet_Plugin_Activation_Settings::get_instance();
				$keto_organic_diet_actions = $plugin_ins->recommended_actions;
				?>
				<div class="keto-organic-diet-recommended-plugins">
				    <div class="keto-organic-diet-action-list">
				        <?php if ($keto_organic_diet_actions): foreach ($keto_organic_diet_actions as $key => $keto_organic_diet_actionValue): ?>
				                <div class="keto-organic-diet-action" id="<?php echo esc_attr($keto_organic_diet_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($keto_organic_diet_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($keto_organic_diet_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($keto_organic_diet_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','keto-organic-diet'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($keto_organic_diet_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'keto-organic-diet' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW Keto Organic Diet is designed especially for people in the food and health sector. This theme can be used by dieticians, health centers, health coaches, sports, and weight loss programs. It can be used to create portfolios, blogs, and eCommerce websites. Furthermore, diet coaches, nutritionists, wellness trainers, etc can use this theme as well to create websites related to diets, exercises, and pretty much anything related to the nutrition sector. Moreover, if you deliver special diet food, you can use this theme to start a food delivery website. This theme is WooCommerce compatible and lets you turn your website into an online store using which you can sell health and nutrition products online. Keto Organic Diet Theme is a great choice for food and nutrition bloggers as it comes with all the necessary tools to help your blog website look professional, modern, and minimal. This theme is also Search Engine Optimized and helps your website reach a larger audience. This theme is fully responsive and cross-browser friendly and comes with features like RTL and translation readiness. With the translation readiness feature, the text on your website can be translated into 70+ local and international languages which helps your audience in navigating smoothly. All these features make this theme a perfect choice for any diet, food, and health or nutrition-related website.','keto-organic-diet'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'keto-organic-diet' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'keto-organic-diet' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KETO_ORGANIC_DIET_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'keto-organic-diet' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'keto-organic-diet'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'keto-organic-diet'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'keto-organic-diet'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'keto-organic-diet'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'keto-organic-diet'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KETO_ORGANIC_DIET_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'keto-organic-diet'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'keto-organic-diet'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'keto-organic-diet'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( KETO_ORGANIC_DIET_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'keto-organic-diet'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'keto-organic-diet' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','keto-organic-diet'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','keto-organic-diet'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','keto-organic-diet'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_services') ); ?>" target="_blank"><?php esc_html_e('Natural Life Section','keto-organic-diet'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','keto-organic-diet'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','keto-organic-diet'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','keto-organic-diet'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','keto-organic-diet'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','keto-organic-diet'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','keto-organic-diet'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','keto-organic-diet'); ?></span><?php esc_html_e(' Go to ','keto-organic-diet'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','keto-organic-diet'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','keto-organic-diet'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','keto-organic-diet'); ?></span><?php esc_html_e(' Go to ','keto-organic-diet'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','keto-organic-diet'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','keto-organic-diet'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','keto-organic-diet'); ?> <a class="doc-links" href="<?php echo esc_url( KETO_ORGANIC_DIET_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','keto-organic-diet'); ?></a></p>
			  	</div>
			</div>
		</div>

			<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
			$plugin_ins = Keto_Organic_Diet_Plugin_Activation_Settings::get_instance();
			$keto_organic_diet_actions = $plugin_ins->recommended_actions;
			?>
				<div class="keto-organic-diet-recommended-plugins">
				    <div class="keto-organic-diet-action-list">
				        <?php if ($keto_organic_diet_actions): foreach ($keto_organic_diet_actions as $key => $keto_organic_diet_actionValue): ?>
				                <div class="keto-organic-diet-action" id="<?php echo esc_attr($keto_organic_diet_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($keto_organic_diet_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($keto_organic_diet_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($keto_organic_diet_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','keto-organic-diet'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($keto_organic_diet_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'keto-organic-diet' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','keto-organic-diet'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon.','keto-organic-diet'); ?></b></p>
	              	<div class="keto-organic-diet-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','keto-organic-diet'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Sections >> Publish.','keto-organic-diet'); ?></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'keto-organic-diet' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','keto-organic-diet'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','keto-organic-diet'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','keto-organic-diet'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','keto-organic-diet'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','keto-organic-diet'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','keto-organic-diet'); ?></a>
							</div>
						</div>
					</div>
				</div>

	        </div>
		</div>
		
		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Keto_Organic_Diet_Plugin_Activation_Settings::get_instance();
			$keto_organic_diet_actions = $plugin_ins->recommended_actions;
			?>
				<div class="keto-organic-diet-recommended-plugins">
				    <div class="keto-organic-diet-action-list">
				        <?php if ($keto_organic_diet_actions): foreach ($keto_organic_diet_actions as $key => $keto_organic_diet_actionValue): ?>
				                <div class="keto-organic-diet-action" id="<?php echo esc_attr($keto_organic_diet_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($keto_organic_diet_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($keto_organic_diet_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($keto_organic_diet_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'keto-organic-diet' ); ?></h3>
				<hr class="h3hr">
				<div class="keto-organic-diet-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','keto-organic-diet'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'keto-organic-diet' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','keto-organic-diet'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','keto-organic-diet'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','keto-organic-diet'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','keto-organic-diet'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=keto_organic_diet_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','keto-organic-diet'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','keto-organic-diet'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
			<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = Keto_Organic_Diet_Plugin_Activation_Woo_Products::get_instance();
				$keto_organic_diet_actions = $plugin_ins->recommended_actions;
				?>
				<div class="keto-organic-diet-recommended-plugins">
					    <div class="keto-organic-diet-action-list">
					        <?php if ($keto_organic_diet_actions): foreach ($keto_organic_diet_actions as $key => $keto_organic_diet_actionValue): ?>
					                <div class="keto-organic-diet-action" id="<?php echo esc_attr($keto_organic_diet_actionValue['id']);?>">
				                        <div class="action-inner plugin-activation-redirect">
				                            <h3 class="action-title"><?php echo esc_html($keto_organic_diet_actionValue['title']); ?></h3>
				                            <div class="action-desc"><?php echo esc_html($keto_organic_diet_actionValue['desc']); ?></div>
				                            <?php echo wp_kses_post($keto_organic_diet_actionValue['link']); ?>
				                        </div>
					                </div>
					            <?php endforeach;
					        endif; ?>
					    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'keto-organic-diet' ); ?></h3>
				<hr class="h3hr">
				<div class="keto-organic-diet-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','keto-organic-diet'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','keto-organic-diet'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','keto-organic-diet'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','keto-organic-diet'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','keto-organic-diet'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','keto-organic-diet'); ?></span></b></p>
	              	<div class="keto-organic-diet-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','keto-organic-diet'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','keto-organic-diet'); ?></span></p>
			    </div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'keto-organic-diet' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This theme gives you all the required and necessary tools to help you create a perfect and elegant website. Furthermore, personal trainers, fitness coaches, gyms, fitness centers, etc can also use this theme to create portfolios or business websites.
					This theme is fully responsive and cross-browser compatible and also comes with many advanced features. You can also customize your website if you want and give it a personalized and unique look. This is a multipurpose theme and can be used for creating blogs, business websites, or eCommerce stores.
					The WooCommerce compatibility of this theme lets you turn your website into an online store where you can sell fitness and diet-related products.
					Create and host an excellent website with this theme which you have never seen before!','keto-organic-diet'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( KETO_ORGANIC_DIET_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'keto-organic-diet'); ?></a>
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'keto-organic-diet'); ?></a>
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'keto-organic-diet'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'keto-organic-diet' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'keto-organic-diet'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'keto-organic-diet'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'keto-organic-diet'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'keto-organic-diet'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'keto-organic-diet'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'keto-organic-diet'); ?></td>
								<td class="table-img"><?php esc_html_e('10', 'keto-organic-diet'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'keto-organic-diet'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'keto-organic-diet'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'keto-organic-diet'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'keto-organic-diet'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'keto-organic-diet'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'keto-organic-diet'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'keto-organic-diet'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( KETO_ORGANIC_DIET_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'keto-organic-diet'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'keto-organic-diet'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'keto-organic-diet'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'keto-organic-diet'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'keto-organic-diet'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'keto-organic-diet'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'keto-organic-diet'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'keto-organic-diet'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'keto-organic-diet'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'keto-organic-diet'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'keto-organic-diet'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'keto-organic-diet'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','keto-organic-diet'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'keto-organic-diet'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'keto-organic-diet'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( KETO_ORGANIC_DIET_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'keto-organic-diet'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>