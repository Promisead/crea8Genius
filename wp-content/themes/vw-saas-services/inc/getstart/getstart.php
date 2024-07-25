<?php
//about theme info
add_action( 'admin_menu', 'vw_saas_services_gettingstarted' );
function vw_saas_services_gettingstarted() {
	add_theme_page( esc_html__('About VW SAAS Services ', 'vw-saas-services'), esc_html__('About VW SAAS Services ', 'vw-saas-services'), 'edit_theme_options', 'vw_saas_services_guide', 'vw_saas_services_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function vw_saas_services_admin_theme_style() {
	wp_enqueue_style('vw-saas-services-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getstart/getstart.css');
	wp_enqueue_script('vw-saas-services-tabs', esc_url(get_template_directory_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_saas_services_admin_theme_style');

//guidline for about theme
function vw_saas_services_mostrar_guide() { 
	//custom function about theme customizer
	$vw_saas_services_return = add_query_arg( array()) ;
	$vw_saas_services_theme = wp_get_theme( 'vw-saas-services' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW SAAS Services ', 'vw-saas-services' ); ?> <span class="version"><?php esc_html_e( 'Version', 'vw-saas-services' ); ?>: <?php echo esc_html($vw_saas_services_theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-saas-services'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW SAAS Services at 20% Discount','vw-saas-services'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-saas-services'); ?> ( <span><?php esc_html_e('vwpro20','vw-saas-services'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url(VW_SAAS_SERVICES_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-saas-services' ); ?></a>
			</div>
		</div>
	</div>

    <div class="tab-sec">
    	<div class="tab">
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'vw-saas-services' ); ?></button>
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'vw-saas-services' ); ?></button>
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'vw-saas-services' ); ?></button>
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'product_addons_editor')"><?php esc_html_e( 'Woocommerce Product Addons', 'vw-saas-services' ); ?></button>
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-saas-services' ); ?></button>
			<button class="tablinks" onclick="vw_saas_services_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-saas-services' ); ?></button>
		</div>

		<?php 
			$vw_saas_services_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$vw_saas_services_plugin_custom_css ='display: block';
			}
		 ?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = VW_SAAS_Services_Plugin_Activation_Settings::get_instance();
				$vw_saas_services_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-saas-services-recommended-plugins">
				    <div class="vw-saas-services-action-list">
				        <?php if ($vw_saas_services_actions): foreach ($vw_saas_services_actions as $key => $vw_saas_services_actionValue): ?>
				                <div class="vw-saas-services-action" id="<?php echo esc_attr($vw_saas_services_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_saas_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_saas_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_saas_services_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','vw-saas-services'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($vw_saas_services_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'vw-saas-services' ); ?></h3>
				<hr class="h3hr">
				<p><?php esc_html_e('VW SAAS Services is a sophisticated and user-friendly website template design crafted to meet the specific needs of Software as a Service (SAAS) providers. Tailored for simplicity and efficiency, this theme seamlessly integrates with the WordPress content management system, offering an intuitive and customizable interface for individuals and businesses operating in the SAAS industry. With a clean and modern aesthetic, the theme prioritizes a professional appearance, ensuring that your online presence reflects the innovative nature of your SAAS offerings. Its responsive design guarantees a seamless user experience across various devices, enhancing accessibility for your target audience. Whether you own a software solution,digital marketing, digital studio, startup agency, digital agency,  it company, it services, marketing company, startup, fintech, it solutions, mobile app, chat service,tech company, it consulting, software development company, wordpress hosting services,  support desk, web application development company, this theme is your go to stop. The VW SAAS Services theme boasts a robust set of features, including customizable sections for showcasing your unique services, pricing plans, and client testimonials. The themes versatility extends to its integration of advanced SEO (Search Engine Optimization) techniques, optimizing your websites visibility on search engines and facilitating organic traffic growth. Moreover, the theme prioritizes user engagement and interaction through its integrated contact forms, enabling potential clients to reach out effortlessly. Social media integration further enhances your digital footprint, allowing for seamless sharing and connectivity. The VW SAAS Services Theme is a cutting-edge solution that combines aesthetic appeal with functional excellence, providing SAAS providers with an elegant and effective online platform to showcase their services and engage with their audience. Demo: https://www.vwthemes.net/vw-saas-services/','vw-saas-services'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-saas-services' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-saas-services' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SAAS_SERVICES_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-saas-services' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'vw-saas-services'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-saas-services'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-saas-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-saas-services'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-saas-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SAAS_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-saas-services'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'vw-saas-services'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-saas-services'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( VW_SAAS_SERVICES_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-saas-services'); ?></a>
					</div>

					<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-saas-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-saas-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-saas-services'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-saas-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-category"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_about_us_section') ); ?>" target="_blank"><?php esc_html_e('About Us Section','vw-saas-services'); ?></a>
								</div>
							</div>
						
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-saas-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-saas-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-saas-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-saas-services'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-saas-services'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-saas-services'); ?></p>
                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','vw-saas-services'); ?></span><?php esc_html_e(' Go to ','vw-saas-services'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','vw-saas-services'); ?></b></p>
                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','vw-saas-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-saas-services'); ?></span><?php esc_html_e(' Go to ','vw-saas-services'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','vw-saas-services'); ?></b></p>
				  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','vw-saas-services'); ?></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with setup, then follow the','vw-saas-services'); ?> <a class="doc-links" href="<?php echo esc_url( VW_SAAS_SERVICES_FREE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','vw-saas-services'); ?></a></p>
			  	</div>
			</div>
		</div>
		
		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$plugin_ins = VW_SAAS_Services_Plugin_Activation_Settings::get_instance();
				$vw_saas_services_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-saas-services-recommended-plugins">
				    <div class="vw-saas-services-action-list">
				        <?php if ($vw_saas_services_actions): foreach ($vw_saas_services_actions as $key => $vw_saas_services_actionValue): ?>
				                <div class="vw-saas-services-action" id="<?php echo esc_attr($vw_saas_services_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($vw_saas_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_saas_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_saas_services_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','vw-saas-services'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($vw_saas_services_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'vw-saas-services' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','vw-saas-services'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon ','vw-saas-services'); ?></b></p>
	              	<div class="vw-saas-services-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','vw-saas-services'); ?></a>
				    </div>
				    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern1.png" alt="" />
				    <p><b><?php esc_html_e('Click on Patterns Tab >> Click on Theme Name >> Click on Section >> Publish.','vw-saas-services'); ?></b></p>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

	            <div class="block-pattern-link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-saas-services' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-saas-services'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-saas-services'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-saas-services'); ?></a>
							</div>

							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-saas-services'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-saas-services'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-saas-services'); ?></a>
							</div>
						</div>
					</div>
				</div>
	     	</div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = VW_SAAS_Services_Plugin_Activation_Settings::get_instance();
			$vw_saas_services_actions = $plugin_ins->recommended_actions;
			?>
				<div class="vw-saas-services-recommended-plugins">
				    <div class="vw-saas-services-action-list">
				        <?php if ($vw_saas_services_actions): foreach ($vw_saas_services_actions as $key => $vw_saas_services_actionValue): ?>
				                <div class="vw-saas-services-action" id="<?php echo esc_attr($vw_saas_services_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_saas_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_saas_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_saas_services_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'vw-saas-services' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-saas-services-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','vw-saas-services'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'vw-saas-services' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-saas-services'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','vw-saas-services'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-saas-services'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-saas-services'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_saas_services_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','vw-saas-services'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','vw-saas-services'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>

		<div id="product_addons_editor" class="tabcontent">
				<?php if(!class_exists('IEPA_Loader')){
				$plugin_ins = VW_SAAS_Services_Plugin_Activation_Woo_Products::get_instance();
				$vw_saas_services_actions = $plugin_ins->recommended_actions;
				?>
				<div class="vw-saas-services-recommended-plugins">
				    <div class="vw-saas-services-action-list">
				        <?php if ($vw_saas_services_actions): foreach ($vw_saas_services_actions as $key => $vw_saas_services_actionValue): ?>
				                <div class="vw-saas-services-action" id="<?php echo esc_attr($vw_saas_services_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($vw_saas_services_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($vw_saas_services_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($vw_saas_services_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Woocommerce Products Blocks', 'vw-saas-services' ); ?></h3>
				<hr class="h3hr">
				<div class="vw-saas-services-pattern-page">
					<p><?php esc_html_e('Follow the below instructions to setup Products Templates.','vw-saas-services'); ?></p>
					<p><b><?php esc_html_e('1. First you need to activate these plugins','vw-saas-services'); ?></b></p>
						<p><?php esc_html_e('1. Ibtana - WordPress Website Builder ','vw-saas-services'); ?></p>
						<p><?php esc_html_e('2. Ibtana - Ecommerce Product Addons.','vw-saas-services'); ?></p>
						<p><?php esc_html_e('3. Woocommerce','vw-saas-services'); ?></p>

					<p><b><?php esc_html_e('2. Go To Dashboard >> Ibtana Settings >> Woocommerce Templates','vw-saas-services'); ?></b></p>
	              	<div class="vw-saas-services-pattern-page">
			    		<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-woocommerce-templates&ive_wizard_view=parent' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Woocommerce Templates','vw-saas-services'); ?></a>
			    	</div>
	              	<p><?php esc_html_e('You can create a template as you like.','vw-saas-services'); ?></p>
			    </div>
			<?php } ?>
		</div> 

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-saas-services' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('SAAS Services WordPress Theme is a top-tier digital solution meticulously designed for discerning Software as a Service (SAAS) providers. Tailored for startups, businesses, and enterprises, this premium theme transcends conventional design, offering a visually stunning and functionally advanced platform to showcase cutting-edge digital services. The theme boasts a modern, sleek design, radiating professionalism and innovation synonymous with the SAAS industry. Its responsive layout ensures a seamless user experience across devices, emphasizing accessibility for a diverse audience.  As a premium theme, it provides unparalleled benefits, including dedicated customer support for prompt issue resolution and continuous updates for optimal performance and security. The responsive and cross-browser compatibility of this theme helps your website in being accessible through any device and web browser. Moreover, this theme is also translation ready. Meaning, the text on your website can be translated to multiple local and international languages for better user experience. The SAAS Services WordPress Theme is versatile, adaptable to various business models, and user-friendly, making it accessible for individuals with diverse technical expertise. It can be seamlessly integrated into existing websites or used as the foundation for a new SAAS-focused online platform. Features and functionalities of this premium theme include advanced customization options, allowing for a unique brand identity, integrated e-commerce capabilities for streamlined transactions, and sophisticated SEO optimization for heightened online visibility. The theme also incorporates interactive elements like contact forms and social media integration, fostering seamless engagement.','vw-saas-services'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_SAAS_SERVICES_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-saas-services'); ?></a>
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'vw-saas-services'); ?></a>
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-saas-services'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-saas-services' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-saas-services'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-saas-services'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider / Banner Settings', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('Slider', 'vw-saas-services'); ?></span></td>
								<td class="table-img"><?php esc_html_e('Banner', 'vw-saas-services'); ?></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('0', 'vw-saas-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'vw-saas-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-saas-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'vw-saas-services'); ?></td>
								<td class="table-img"><?php esc_html_e('15', 'vw-saas-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'vw-saas-services'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-saas-services'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-saas-services'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-saas-services'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Global Color Option', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Reordering', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Demo Importer', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('License Pricing', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Detailed Service Page', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('WordPress 6.4 or later', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('PHP 8.2 or 8.3', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('MySQL 5.6 (or greater) | MariaDB 10.0 (or greater)', 'vw-saas-services'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_SAAS_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-saas-services'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-saas-services'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-saas-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-saas-services'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-saas-services'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-saas-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-saas-services'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-saas-services'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-saas-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-saas-services'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-saas-services'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-saas-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-saas-services'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'vw-saas-services'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-saas-services'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_SAAS_SERVICES_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-saas-services'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>

<?php } ?>