<?php

/*-----------------------------------------------------------------------------------*/
/*	Register and load javascript
/*-----------------------------------------------------------------------------------*/
function bluehive_scripts() {
	if (!is_admin()) {
		// BluehiveFramework Scripts

		wp_register_script('modernizr', PARENT_URL.'/js/jquery.modernizr.min.js', array('jquery'), '2.8.2');
		wp_register_script('elastislide', PARENT_URL.'/js/jquery.elastislide.js', array('jquery'), '1.1.0');
		wp_register_script('jflickrfeed', PARENT_URL.'/js/jflickrfeed.js', array('jquery'), '1.0');
		wp_register_script('superfish', PARENT_URL.'/js/superfish.js', array('jquery'), '1.5.3', true);
		wp_register_script('mobilemenu', PARENT_URL.'/js/jquery.mobilemenu.js', array('jquery'), '1.0', true);
		wp_register_script('easing', PARENT_URL.'/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
		wp_register_script('magnific-popup', PARENT_URL.'/js/jquery.magnific-popup.min.js', array('jquery'), '0.9.3', true);
		wp_register_script('flexslider', PARENT_URL.'/js/jquery.flexslider.js', array('jquery'), '2.1', true);
		wp_register_script('playlist', PARENT_URL.'/js/jplayer.playlist.min.js', array('jquery'), '2.3.0', true);
		wp_register_script('jplayer', PARENT_URL.'/js/jquery.jplayer.min.js', array('jquery'), '2.4.0', true);
		wp_register_script('custom', PARENT_URL.'/js/custom.js', array('jquery'), '1.0');

		wp_enqueue_script('swfobject');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('elastislide');
		wp_enqueue_script('jflickrfeed');
		wp_enqueue_script('superfish');
		wp_enqueue_script('mobilemenu');
		wp_enqueue_script('easing');
		wp_enqueue_script('magnific-popup');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('playlist');
		wp_enqueue_script('jplayer');
		wp_enqueue_script('custom');

		// switch (of_get_option('slider_type')) {
		// 	case 'none_slider':
		// 		break;
		// 	case 'accordion_slider':
		// 		wp_register_script('zaccordion', PARENT_URL.'/js/jquery.zaccordion.min.js', array('jquery'), '2.1.0', true);
		// 		wp_enqueue_script('zaccordion');
		// 		break;
		// 	default:
		// 		wp_register_script('camera', PARENT_URL.'/js/camera.min.js', array('jquery'), '1.3.4', true);
		// 		wp_enqueue_script('camera');
		// 		break;
		// }
		
		// only Portfolio (2-*, 3-*, 4-Columns), Home and Front Pages
		if ( (is_page_template('page-Portfolio2Cols-filterable.php')) 
			|| (is_page_template('page-Portfolio3Cols-filterable.php')) 
			|| (is_page_template('page-Portfolio4Cols-filterable.php')) 
			|| is_home() 
			|| is_front_page()) {
			wp_register_script('debouncedresize', PARENT_URL.'/js/jquery.debouncedresize.js', array('jquery'), '1.0', true);
			wp_register_script('ba-resize', PARENT_URL.'/js/jquery.ba-resize.min.js', array('jquery'), '1.1', true);
			wp_register_script('isotope', PARENT_URL.'/js/jquery.isotope.js', array('jquery'), '1.5.25', true);
			wp_enqueue_script('debouncedresize');
			wp_enqueue_script('ba-resize');
			wp_enqueue_script('isotope');
		}

		// only child theme's where overwrite flickr widget
		// if ( (CURRENT_THEME!='cherry') && (file_exists(CHILD_DIR. '/includes/widgets/my-flickr-widget.php')) ) {
		// 	wp_register_script('prettyPhoto', PARENT_URL.'/js/jquery.prettyPhoto.js', array('jquery'), '3.1.5');
		// 	wp_enqueue_script('prettyPhoto');
		// }

		// Bootstrap Scripts
		// wp_register_script('bootstrap', PARENT_URL.'/bootstrap/js/bootstrap.min.js', array('jquery'), '2.3.0');
		// wp_enqueue_script('bootstrap');
	}
}
add_action('wp_enqueue_scripts', 'bluehive_scripts');