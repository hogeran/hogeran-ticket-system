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
	
	//Generate hogeran_ts Admin Sub Pages
	add_submenu_page( 'hogeran_ts', 'Hogeran Ticket System Options', 'General', 'manage_options', 'hogeran_ts', 'hogeran_ts_create_page' );
	
	
}
add_action( 'admin_menu', 'hogeran_ts_add_admin_page' );

function hogeran_ts_create_page() {
	require_once( 'hogeran_ts-admin.php' );
}






//Activate custom settings
	add_action( 'admin_init', 'hogeran_ts_custom_settings' );
function hogeran_ts_custom_settings() {
	register_setting( 'hogeran_ts-settings-group', 'company_name' );
	register_setting( 'hogeran_ts-settings-group', 'page_header' );
	register_setting( 'hogeran_ts-settings-group', 'description' );
	
	add_settings_section( 'hogeran_ts-main-options', 'Main Options', 'hogeran_ts_main_options', 'hogeran_ts');
	
	add_settings_field( 'hogeran_ts-name', 'Company Name', 'hogeran_ts_company_name', 'hogeran_ts', 'hogeran_ts-main-options');
	add_settings_field( 'hogeran_ts-header', 'Header', 'hogeran_ts_header', 'hogeran_ts', 'hogeran_ts-main-options');
	add_settings_field( 'hogeran_ts-description', 'Description', 'hogeran_ts_description', 'hogeran_ts', 'hogeran_ts-main-options');
}
function hogeran_ts_main_options() {
	echo 'Customize your main Options';
}
function hogeran_ts_company_name() {
	$company_name = esc_attr( get_option( 'company_name' ) );
	echo '<input type="text" name="company_name" value="'.$company_name.'" placeholder="Company name" /><p class="description">Write your company name.</p>';
}
function hogeran_ts_header() {
	$page_header = esc_attr( get_option( 'page_header' ) );
	echo '<input type="text" name="page_header" value="'.$page_header.'" placeholder="Page Header" /><p class="description">Write the page header that win be shown on all ticket pages.</p>';
}
function hogeran_ts_description() {
	$description = esc_attr( get_option( 'description' ) );
	echo '<input type="text" name="description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

//Sanitization settings
function hogeran_ts_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}
