<?php
						$options = get_option('sf_dante_options');
						$enable_backtotop = $options['enable_backtotop'];
						$enable_footer = $options['enable_footer'];
						$enable_footer_divider = $options['enable_footer_divider'];
						$enable_copyright = $options['enable_copyright'];
						$enable_copyright_divider = $options['enable_copyright_divider'];
						$show_backlink = $options['show_backlink'];
						$page_layout = $options['page_layout'];
						$footer_config = $options['footer_layout'];
						$copyright_text = __($options['footer_copyright_text'], 'swiftframework');
						$enable_footer_promo_bar = $options['enable_footer_promo_bar'];
						$footer_promo_bar_type = $options['footer_promo_bar_type'];
						$footer_promo_bar_text = __($options['footer_promo_bar_text'], "swiftframework");
						$footer_promo_bar_button_color = $options['footer_promo_bar_button_color'];
						$footer_promo_bar_button_text = __($options['footer_promo_bar_button_text'], "swiftframework");
						$footer_promo_bar_button_link = __($options['footer_promo_bar_button_link'], "swiftframework");
						$footer_promo_bar_button_target = $options['footer_promo_bar_button_target'];
						
						global $sf_include_infscroll, $remove_promo_bar, $enable_one_page_nav;
													
						$footer_class = $copyright_class = "";
						
						if ($enable_footer_divider) { $footer_class = "footer-divider"; }
						if ($enable_copyright_divider) { $copyright_class = "copyright-divider"; }
					?>
				
				<!--// CLOSE #page-wrap //-->			
				</div>
				
				<?php if ($enable_footer_promo_bar && !$remove_promo_bar) { ?>
				<!--// OPEN #base-promo //-->
				<div id="base-promo" class="footer-promo-<?php echo $footer_promo_bar_type; ?>">
					<?php if ($footer_promo_bar_type == "button") { ?>
						<p><?php echo do_shortcode($footer_promo_bar_text); ?></p>
						<a href="<?php echo $footer_promo_bar_button_link; ?>" target="<?php echo $footer_promo_bar_button_target; ?>" class="sf-button dropshadow <?php echo $footer_promo_bar_button_color; ?>"><?php echo $footer_promo_bar_button_text; ?></a>
					<?php } else if ($footer_promo_bar_type == "arrow") { ?>
						<a href="<?php echo $footer_promo_bar_button_link; ?>" target="<?php echo $footer_promo_bar_button_target; ?>"><?php echo do_shortcode($footer_promo_bar_text); ?><i class="ss-navigateright"></i></a>
					<?php } else { ?>
						<a href="<?php echo $footer_promo_bar_button_link; ?>" target="<?php echo $footer_promo_bar_button_target; ?>"><?php echo do_shortcode($footer_promo_bar_text); ?></a>
					<?php } ?>
				<!--// CLOSE #base-promo //-->
				</div>
				<?php } ?>
				
			<!--// CLOSE #main-container //-->
			</div>
						
			<div id="footer-wrap">
			
			<?php if ($enable_footer) { ?>
			
			<!--// OPEN #footer //-->
			<section id="footer" class="<?php echo $footer_class; ?>">
				<div class="container">
					<div id="footer-widgets" class="row clearfix">
						<?php if ($footer_config == "footer-1") { ?>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('footer-column-1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 3'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 4'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-2") { ?>
						
						<div class="col-sm-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 3'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-3") { ?>
						
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 3'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-4") { ?>
						
						<div class="col-sm-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-5") { ?>
						
						<div class="col-sm-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 3'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-6") { ?>
						
						<div class="col-sm-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-8">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-7") { ?>
						
						<div class="col-sm-8">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-4">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						
						<?php } else if ($footer_config == "footer-8") { ?>
						
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-6">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 2'); ?>
						<?php } ?>
						</div>
						<div class="col-sm-3">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 3'); ?>
						<?php } ?>
						</div>
						
						<?php } else { ?>
												
						<div class="col-sm-12">
						<?php if ( function_exists('dynamic_sidebar') ) { ?>
							<?php dynamic_sidebar('Footer Column 1'); ?>
						<?php } ?>
						
						</div>
						<?php } ?>
						
					</div>
				</div>	
			
			<!--// CLOSE #footer //-->
			</section>	
			<?php } ?>
			
			<?php
				$swiftideas_backlink = "";
				if ($show_backlink) {			
				$swiftideas_backlink =	apply_filters("swiftideas_link", " <a href='http://www.swiftideas.net' rel='nofollow'>Premium WordPress Themes by Swift Ideas</a>");
				}
			
			if ($enable_copyright) { ?>
			
			<!--// OPEN #copyright //-->
			<footer id="copyright" class="<?php echo $copyright_class; ?>">
				<div class="container">
					<p><?php echo do_shortcode(stripslashes($copyright_text)); ?><?php echo $swiftideas_backlink; ?></p>
					<nav class="footer-menu std-menu">
						<?php 
							$footer_menu_args = array(
								'echo'            => true,
								'theme_location' => 'footer_menu',
								'fallback_cb' => ''
							);
							wp_nav_menu( $footer_menu_args );
						?>
					</nav>
				</div>
			<!--// CLOSE #copyright //-->
			</footer>
			
			<?php } ?>
			
			</div>
		
		<!--// CLOSE #container //-->
		</div>
		
		<?php if ($enable_one_page_nav) { ?>
		<!--// ONE PAGE NAV //-->
		<div id="one-page-nav">
			<ul>
			</ul>
		</div>
		<?php } ?>
		
		<?php if ($enable_backtotop) { ?>
		<!--// BACK TO TOP //-->
		<div id="back-to-top" class="animate-top"><i class="ss-navigateup"></i></div>
		<?php } ?>
		
		<!--// FULL WIDTH VIDEO //-->
		<div class="fw-video-area"><div class="fw-video-close"><i class="ss-delete"></i></div></div><div class="fw-video-spacer"></div>
		
		<?php if ($sf_include_infscroll) { ?>
		<div id="inf-scroll-params" data-loadingimage="<?php echo get_template_directory_uri(); ?>/images/loader.gif" data-msgtext="<?php _e("Loading", "swiftframework"); 
		?>" data-finishedmsg="<?php _e("All posts loaded", "swiftframework"); ?>"></div>
		<?php } ?>
						
		<!--// FRAMEWORK INCLUDES //-->
		<div id="sf-included" class="<?php echo sf_global_include_classes(); ?>"></div>
		
		<?php if ($options['google_analytics'] != "") {
			echo $options['google_analytics'];
		} ?>
			
		<!--// WORDPRESS FOOTER HOOK //-->
		<?php wp_footer(); ?>

	
	<!--// CLOSE BODY //-->
	</body>
<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans);
		.advps-slide-container {
			width: 100% !important;
			max-width: 100% !important;
			height: 60vh;
			
		}
		.advps-slide {
			width: 100% !important;
		}
		
		.advps-overlay-one {
			opacity: 1 !important;
			background: transparent !important;
		}
		.advps-excerpt-block-one {
			background: rgba(255, 255, 255, 0.6);
		    width: 50%;
		    display: block;
		    margin: 3% auto 0 auto;
		    padding: 1% 2% 2% 2%;
		    text-align: center !important;
		}
		.advps-excerpt-block-one h2.advs-title a {
			color: #000 !important;
			font-size: 32px !important;
			text-decoration: none;
			font-family: 'Open Sans', sans-serif;
			line-height: 30px !important;
		}
		.advps-excerpt-block-one p {
			color: #000;
			font-size: 24px !important;
			font-family: 'Open Sans', sans-serif;
			line-height: 26px !important;
			margin-bottom: 0 !important;
		}
		.widget_polylang {
			margin-bottom: 0;
		    padding-bottom: 0;
		    float: right;
		    width: 50px;
		    position: absolute;
		    right: 5px;
		    top: 0;
		}
		.widget_polylang ul {

		}
		.widget_polylang ul li {
			float: left;
			width: 50%;
		}
		.advps-excerpt-link-post {
			position: absolute;
		    color: #fff;
		    font-size: 26px;
		    display: block;
		    width: 180px;
		    padding: 15px;
		    text-align: center;
		    margin: 0 auto;
		    background: #57c0c9;
		    left: 38%;
		    bottom: -85px;
		    text-decoration: none;
		}
		.advps-excerpt-link-post:hover {
			color: #fff;
		}
		@media only screen and (max-width: 1050px) {
			#top-bar ul.social-icons {
				padding-right: 50px;
			}
		}
		@media only screen and (max-width: 1024px) {
			
			.advps-slide-container {
			height: 40vh;
			
			}
			
			.advps-excerpt-block-one {
				margin: 3% auto 0 auto;
			}
			.advps-excerpt-block-one h2.advs-title a {
				color: #000 !important;
				font-size: 24px !important;
				text-decoration: none;
				font-family: 'Open Sans', sans-serif;
			}
			.advps-excerpt-block-one p {
				color: #000;
				font-size: 18px !important;
				font-family: 'Open Sans', sans-serif;
				margin-bottom: 0 !important;
				line-height: normal !important;
			}
			.advps-excerpt-link-post {
			    font-size: 24px;
			    width: auto;
			    padding: 10px 15px;
			    left: 38%;
			    bottom: -70px;
			}
		}
		@media only screen and (max-width: 768px) {
			
			.advps-slide-container {
			height: 30vh;
			
			}	
		
			.advps-excerpt-block-one {
				width: 70%;
				margin: 2% auto 0 auto;
			}
			.widget_polylang ul li a {
				padding: 5px;
			}
		}
		@media only screen and (max-width: 736px) {
			.advps-excerpt-block-one {
				margin: 1% auto 0 auto;
			}
			.advps-excerpt-block-one h2.advs-title a {
				font-size: 20px !important;
			}
			.advps-excerpt-block-one p {
				font-size: 16px !important;
				
				}
			.advps-excerpt-link-post {
			    font-size: 20px;
			}
		}
		@media only screen and (max-width: 667px) {
			.advps-excerpt-link-post {
			    bottom: -60px;
			}
		}
		@media only screen and (max-width: 600px) {
			
			.advps-slide-container {
			height: 30vh;
			
			}
			
			.advps-excerpt-block-one {
				margin: 1% auto 0 auto;
			}
			.advps-excerpt-block-one h2.advs-title a {
				font-size: 18px !important;
			}
			.advps-excerpt-block-one p {
				font-size: 14px !important;
				line-height: normal !important;
				display: none;
			}
			.advps-excerpt-link-post {
			    font-size: 18px;
			    bottom: -50px;
			}
		}
		@media only screen and (max-width: 568px) {
			.advps-excerpt-block-one {
				margin: 1% auto 0 auto;
			}
		}
		@media only screen and (max-width: 414px) {
			.advps-excerpt-block-one {
				margin: 1% auto 0 auto;
				width: 90%;
			}
			
			.advps-excerpt-block-one h2.advs-title a {
				font-size: 16px !important;
			}
			.advps-excerpt-block-one p {
				font-size: 13px !important;
			}
			.advps-excerpt-link-post {
			    font-size: 16px;
			}
			
						
		}
		@media only screen and (max-width: 375px) {
			.advps-excerpt-block-one {
				margin: 1% auto 0 auto;
				width: 90%;
			}
		}
		@media only screen and (max-width: 375px) {
			.advps-excerpt-block-one {
				margin: 0% auto;
				width: 90%;
			}
		}

    </style>

	<!--// CLOSE HTML //-->
</html>