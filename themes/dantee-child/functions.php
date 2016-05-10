<?php
if (!function_exists('sf_top_bar')) {
	function sf_top_bar() {
	
		// VARIABLES
		$options = get_option('sf_dante_options');	
		$tb_config = $options['tb_config'];
		$tb_left_text = $options['tb_left_text'];
		$tb_right_text = $options['tb_right_text'];
		$tb_search_text = $options['tb_search_text'];
		
		$show_sub = $options['show_sub'];
		$show_translation = $options['show_translation'];
		$show_account = $options['show_account'];
		$show_cart = $options['show_cart'];
		$ss_mobile = $options['ss_mobile'];
		
		$tb_output = $tb_menu_output = $tb_left_output = $tb_right_output = $swift_search_output = $ss_enable = '';
		
		if (isset($options['ss_enable'])) {
			$ss_enable = $options['ss_enable'];
		} else {
			$ss_enable = false;
		}
		
		
		// TOP BAR MENU OUTPUT
		$tb_menu_args = array(
			'echo'            => false,
			'theme_location' => 'top_bar_menu',
			'fallback_cb' => ''
		);
		$tb_menu_output .= '<nav class="top-menu std-menu clearfix">'. "\n";	
		if(function_exists('wp_nav_menu')) {
			$tb_menu_output .= wp_nav_menu( $tb_menu_args );
		}
		$tb_menu_output .= '</nav>'. "\n";
		
		
		// TOP BAR SWIFT SEARCH OUTPUT
		if ($ss_enable) {
			$swift_search_output .= '<div class="tb-text"><a class="swift-search-link" href="#"><i class="ss-zoomin"></i><span>'.do_shortcode($tb_search_text).'</span></a></div>';
		}
		
		// TOP BAR LEFT OUTPUT
		if ($tb_config == "tb-1") {
		
			$tb_left_output = '<div class="tb-text clearfix">'. do_shortcode($tb_left_text). '</div>' . "\n";
			$tb_right_output = '<div class="tb-text clearfix">'. do_shortcode($tb_right_text). '</div>' . "\n";
		
		} else if ($tb_config == "tb-2") {
		
			$tb_left_output = $tb_menu_output;
			$tb_right_output = '<div class="tb-text clearfix">'. do_shortcode($tb_right_text). '</div>' . "\n";
		
		} else if ($tb_config == "tb-3") {
		
			$tb_left_output = '<div class="tb-text clearfix">'. do_shortcode($tb_left_text). '</div>' . "\n";
			$tb_right_output = $tb_menu_output;
		
		} else if ($tb_config == "tb-4") {
			
			$tb_left_output = sf_woo_links('top-menu', $tb_config);
			$tb_right_output = sf_aux_links('top-menu');
		
		} else if ($tb_config == "tb-5") {
			
			$tb_left_output = sf_woo_links('top-menu', $tb_config);
			$tb_right_output = '<div class="tb-text clearfix">'. do_shortcode($tb_right_text). '</div>' . "\n";
		
		} else if ($tb_config == "tb-6") {
			
			$tb_left_output = sf_woo_links('top-menu', $tb_config);
			$tb_right_output = $tb_menu_output;
		
		} else if ($tb_config == "tb-7") {
			
			$tb_left_output = $swift_search_output;
			$tb_right_output = '<div class="tb-text clearfix">'. do_shortcode($tb_right_text). '</div>' . "\n";	
		
		} else if ($tb_config == "tb-9") {
			
			$tb_left_output = '<div class="tb-text clearfix">'. do_shortcode($tb_left_text). '</div>';
			$tb_right_output = sf_aux_links('top-menu');	
		
		} else if ($tb_config == "tb-10") {
			
			$tb_left_output = sf_aux_links('top-menu');
			$tb_right_output = '<div class="tb-text clearfix">'. do_shortcode($tb_right_text). '</div>' . "\n";	
		
		} else {
			
			$tb_left_output = $swift_search_output;
			$tb_right_output = $tb_menu_output;
			
		}
		ob_start();
			dynamic_sidebar( 'Top Lang' );
		$top_lang = ob_get_contents();
        ob_end_clean();

		// TOP BAR OUTPUT
		$tb_output .= '<div id="top-bar" class="'.$tb_config.'">'. "\n";
		if ($ss_mobile) {
		$tb_output .= '<div class="tb-ss">'.$swift_search_output.'</div>'. "\n";
		}
		$tb_output .= '<div class="container">'. "\n";
		$tb_output .= '<div class="row">'. "\n";
		$tb_output .= '<div class="tb-left col-sm-6 clearfix">'. "\n";
		$tb_output .= $tb_left_output;
		$tb_output .= '</div> <!-- CLOSE .tb-left -->'. "\n";		
		$tb_output .= '<div class="tb-right col-sm-6 clearfix">'. "\n";
		$tb_output .= $tb_right_output;
		$tb_output .= '</div> <!-- CLOSE .tb-right -->'. "\n";
		$tb_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$tb_output .= $top_lang;
		$tb_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$tb_output .= '</div> <!-- CLOSE #top-bar -->'. "\n";
		
			
		// TOP BAR RETURN		
		return $tb_output;
	}
}
/* HEADER
================================================== */ 
if (!function_exists('sf_header')) {
	function sf_header($header_layout) {
	
		// VARIABLES
		$options = get_option('sf_dante_options');
		$show_cart = $options['show_cart'];
		$show_wishlist = $options['show_wishlist'];
		$header_left_text = __($options['header_left_text'], 'swiftframework');
		$header_output = $main_menu = '';
		
		global $post;
		if ($post) {
			$enable_naked_header = sf_get_post_meta($post->ID, 'sf_enable_naked_header', true);
			if (($enable_naked_header == "naked-light" || $enable_naked_header == "naked-dark") && ($header_layout == "header-1" || $header_layout == "header-2")) {
				$header_layout = "header-7";
			}
		}
			
		if ($header_layout == "header-1") {
		
		/*$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= '<div class="container">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= '<div class="header-left col-sm-4">'.do_shortcode($header_left_text).'</div>'. "\n";
		$header_output .= sf_logo('col-sm-4 logo-center');
		$header_output .= '<div class="header-right col-sm-4">'.sf_aux_links('header-menu', TRUE, "header-1").'</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";*/
		$header_output .= '<div id="main-nav" class="sticky-header">'. "\n";
		$header_output .= sf_main_menu('main-navigation', 'full');
		$header_output .= '</div>'. "\n";
		
		} else if ($header_layout == "header-2") {
		
		$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= '<div class="container">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('col-sm-4 logo-left');
		$header_output .= '<div class="header-right col-sm-8">'.sf_aux_links('header-menu', FALSE, "header-1").'</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";
		$header_output .= '<div id="main-nav" class="sticky-header">'. "\n";
		$header_output .= sf_main_menu('main-navigation', 'full');
		$header_output .= '</div>'. "\n";
		
		} else if ($header_layout == "header-3") {
		
		$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= '<div class="container header-container sticky-header">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('logo-left');
		$header_output .= '<div class="header-right">';
		$header_output .= sf_main_menu('main-navigation', 'with-search');
		$header_output .= '</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";
		
		} else if ($header_layout == "header-4") {
		
		$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= sf_top_header();
		$header_output .= '<div class="container header-container sticky-header">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('logo-left');
		$header_output .= '<div class="header-right">';
		$header_output .= sf_main_menu('main-navigation', 'with-search');
		$header_output .= '</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";
		
		} else if ($header_layout == "header-5") {
		
		$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= '<div class="container sticky-header">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('logo-left');
		$header_output .= '<div class="header-right">';
		$header_output .= sf_main_menu('main-navigation', 'with-search');
		$header_output .= '</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";
		
		} else if ($header_layout == "header-6") {
		
		$header_output .= '<header id="header" class="sticky-header clearfix">'. "\n";
		$header_output .= '<div class="container">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('logo-left');
		$header_output .= '<div class="header-right">'.sf_main_menu('main-navigation', 'with-search').'</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</header>'. "\n";
		
		} else {
		
		$header_output .= '<header id="header" class="clearfix">'. "\n";
		$header_output .= sf_top_header();
		$header_output .= '<div class="sticky-header">'. "\n";
		$header_output .= '<div class="container header-container">'. "\n";
		$header_output .= '<div class="row">'. "\n";
		$header_output .= sf_logo('logo-left');
		$header_output .= '<div class="header-right">'.sf_main_menu('main-navigation', 'with-search').'</div>'. "\n";
		$header_output .= '</div> <!-- CLOSE .row -->'. "\n";
		$header_output .= '</div> <!-- CLOSE .container -->'. "\n";
		$header_output .= '</div>'. "\n";
		$header_output .= '</header>'. "\n";
		
		}
		
		// HEADER RETURN
		return $header_output;
		
	}
}
add_action( 'widgets_init', 'theme_dante_widgets_init' );
function theme_dante_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Lang', 'theme-dante' ),
        'id' => 'top-lang-1',
        'description' => __( 'Widgets in this area will be shown on lang.', 'theme-dante' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
}
?>