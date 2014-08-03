<?php

/*-----------------------------------------------------------------------------------*/
/*	Register and load template layouts
/*-----------------------------------------------------------------------------------*/
function bluehive_layouts() {
	if (!is_admin()) {
		// Sidebar Content
		if ( is_page_template('page-sidebarContent.php')) {
			wp_register_style('sidebar-content', get_template_directory_uri() . '/assets/build/layout/sidebar-content.css', false, '1.0.0', 'all');
			wp_enqueue_style('sidebar-content');
		}
		//Content Sidebar
		if ( is_page_template('page-contentSidebar.php')) {
			wp_register_style('content-sidebar', get_template_directory_uri() . '/assets/build/layout/content-sidebar.css', false, '1.0.0', 'all');
			wp_enqueue_style('content-sidebar');
		}
	}
}
add_action('wp_enqueue_scripts', 'bluehive_layouts');