<?php
/*
Plugin Name: Hogeran Ticket System
Description: Mailbased ticketsystem
Version:     1.0
Author:      Mikael Holgersson
Author URI:  http://hogeran.se
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: hogeran-ticket-system
*/

/*
@package Hogeran Ticket System
	
	========================
		ADMIN PAGE
	========================
*/
function hogeran_ts_add_admin_page() {
	
	//Generate Hogeran Ticket System Admin Page
	add_menu_page( 'Hogeran Ticket System Options', 'Ticket System', 'manage_options', 'hogeran_ts', 'hogeran_ts_create_page', '', 110 );
	
	//Generate Sunset Admin Sub Pages
	add_submenu_page( 'hogeran_ts', 'Hogeran Ticket System Options', 'General', 'manage_options', 'hogeran_ts', 'hogeran_ts_create_page' );
	
	
	
}
add_action( 'admin_menu', 'hogeran_ts_add_admin_page' );

function hogeran_ts_create_page() {
	require_once( 'hogeran_ts-admin.php' );
}