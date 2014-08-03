<?php

/*-----------------------------------------------------------------------------------*/
/*	Register and load template layouts
/*-----------------------------------------------------------------------------------*/
function bluehive_layouts() {
	if (!is_admin()) {
		// Sidebar Content
		if ( is_page_template('page_sidebarContent.php')) {
			wp_register_style('sidebar-content', PARENT_URL.'/assets/build/layout/sidebar-content.css', array(), '1.0.0');
			wp_enqueue_script('sidebar-content');
		}
	}
}
add_action('wp_enqueue_style', 'bluehive_layouts');