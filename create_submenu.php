<?php
function screenshot_submenu_page() {
	add_submenu_page(
	  'options-general.php', // Parent slug 
	  'screenshot-documentation', // Page title
	  'screenshot-documentation', // Menu title
	  'administrator', // Capability required
	  'screenshot-documentation', // Menu slug
	  'submenu_page_callback' // Callback function
	);
}

// Callback function to include Page
function submenu_page_callback() {
	include('documentation/startingpage.php');
	
}

// Register submenu page
add_action('admin_menu', 'screenshot_submenu_page');




