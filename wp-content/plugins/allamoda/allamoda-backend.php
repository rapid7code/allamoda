<?php
/*
Plugin Name: Allamoda
Version: 1.0
Author: Vu Bac
Text Domain: allamoda
*/


// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) {
	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
	exit;
}

if( ! defined( 'PROJECT_BACKEND_DIR' ) ) 			define( 'PROJECT_BACKEND_DIR', 			'/wp-content/plugins' );
if( ! defined( 'PROJECT_BACKEND_FOLDER_NAME' ) ) 	define( 'PROJECT_BACKEND_FOLDER_NAME', 	basename(dirname(__FILE__)) );
if( ! defined( 'PROJECT_BACKEND_BASE_URL' ) ) 	define( 'PROJECT_BACKEND_BASE_URL',		WP_PLUGIN_URL . '/' . PROJECT_BACKEND_FOLDER_NAME );
if( ! defined( 'PROJECT_BACKEND_BASE_DIR' ) ) 	define( 'PROJECT_BACKEND_BASE_DIR', 	PROJECT_BACKEND_DIR . '/' . PROJECT_BACKEND_FOLDER_NAME . '/' );
if( ! defined( 'PROJECT_BACKEND_MAIN_FILE' ) ) 	define( 'PROJECT_BACKEND_MAIN_FILE', 	PROJECT_BACKEND_DIR . '/project-backend.php' );
if( ! defined( 'PROJECT_BACKEND_MAIN_FILE_DIR' )) define( 'PROJECT_BACKEND_MAIN_FILE_DIR', PROJECT_BACKEND_BASE_DIR . PROJECT_BACKEND_MAIN_FILE );

if( ! defined( 'PROJECT_BACKEND_ADMIN_PAGE_CONTACT' ) ) 	define( 'PROJECT_BACKEND_ADMIN_PAGE_CONTACT', 'contact-list' );


//Load libraries
if( !function_exists('project_backend_init') ){
	function project_backend_init(){
		// Load Javascript	
		wp_register_script( 'project-backend-script-custom-ui' , PROJECT_BACKEND_BASE_DIR . 'js/' . 'jquery-ui.js' );			
		wp_register_script( 'project-backend-script-function' , PROJECT_BACKEND_BASE_URL . '/js/' . 'function.js' );		

		wp_enqueue_style('jquery-style','//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('mp-style',PROJECT_BACKEND_BASE_URL . '/css/' . 'mp_style.css');

		wp_enqueue_script( 'project-backend-script-custom-ui' );
		wp_enqueue_script( 'project-backend-script-function' );

	}
}

require_once( 'functions.php' );
require_once( 'includes/contact-list.php' );

function add_admin_pages(){
	$contact_list = new contact_list();
	
	add_menu_page("Option","Allmoda",0, PROJECT_BACKEND_ADMIN_PAGE_CONTACT);
	
	// Add the default page
	add_submenu_page( PROJECT_BACKEND_ADMIN_PAGE_CONTACT, 'contactlist', 'Contact Page', 0, PROJECT_BACKEND_ADMIN_PAGE_CONTACT, array( &$contact_list, "show_page" ) );
}


if ( is_admin() ) {	
	add_action( 'admin_enqueue_scripts' , 'project_backend_init' );
	add_action( 'admin_menu', 'add_admin_pages' );
}

