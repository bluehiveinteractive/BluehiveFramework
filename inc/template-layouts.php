<?php

/*-----------------------------------------------------------------------------------*/
/*	Register and load template layouts
/*-----------------------------------------------------------------------------------*/
function bluehive_layouts() {
	if (!is_admin()) {
		// Sidebar Content
		if ( is_page_template('page-sidebarContent.php')) {
			wp_register_style('sidebar-content', PARENT_URL.'/assets/build/layout/sidebar-content.css', array(), '1.0.0');
			wp_enqueue_style('sidebar-content');
		}
		if ( is_page_template('page-contentSidebar.php')) {
			wp_register_style('content-sidebar', PARENT_URL.'/assets/build/layout/content-sidebar.css', array(), '1.0.0');
			wp_enqueue_style('content-sidebar');
		}
	}
}
add_action('wp_enqueue_scripts', 'bluehive_layouts');