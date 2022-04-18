<?php
/*
	Plugin Name: FlatUX
	Plugin URI: https://wpvnteam.com
	Description: This plugin will create new elements for flatsome. Awesome !!!
	Version: 1.0
	Author: COP
	Author URI: https://wpvnteam.com
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: flatux
	Domain Path: /languages
*/

if (!defined('ABSPATH')) { exit; }

//details
define('FLATUX_PATH', plugin_dir_path( __FILE__ ));
define('FLATUX_URL', plugin_dir_url( __FILE__ ));
define('FLATUX_VERSION', '1.0');
define('FLATUX_ITEM_ID', 787);
define('FLATUX_ITEM_NAME', 'FlatUX');
define('FLATUX_STORE_URL', 'https://wpvnteam.com');

//update
if(!class_exists('FlatUX_Plugin_Updater')) {
	include(dirname( __FILE__ ) . '/admin/update.php');
}

function flatux_edd_plugin_updater() {

	//to support auto-updates, this needs to run during the wp_version_check cron job for privileged users
	$doing_cron = defined('DOING_CRON') && DOING_CRON;
	if(!current_user_can('manage_options') && !$doing_cron) {
		return;
	}

	//retrieve our license key from the DB
	$flatux_license = get_option('flatux_license');
	$license = !empty($flatux_license['key']) ? trim($flatux_license['key']) : null;
	
	//setup the updater
	$edd_updater = new FlatUX_Plugin_Updater(FLATUX_STORE_URL, __FILE__, array(
			'version' 	=> FLATUX_VERSION,
			'license' 	=> $license,
			'item_id'   => FLATUX_ITEM_ID,
			'author' 	=> 'COP',
			'beta'      => false
		)
	);
}
add_action('init', 'flatux_edd_plugin_updater', 0);

//load translations
function flatux_load_textdomain() {
	load_plugin_textdomain('flatux', false, dirname(plugin_basename( __FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'flatux_load_textdomain');

//admin settings page
function flatux_admin() {
	include plugin_dir_path(__FILE__) . '/admin/admin.php';
}

//add our admin menus
if(is_admin()) {
	add_action('admin_menu', 'flatux_menu', 9);
}

//admin menu
function flatux_menu() {
	$flatux_settings_page = add_menu_page('flatux', 'FlatUX', 'manage_options', 'flatux', 'flatux_admin','dashicons-layout', 3);
	add_action('load-' . $flatux_settings_page, 'flatux_settings_load');
}

//admin settings page load hook
function flatux_settings_load() {
	add_action('admin_enqueue_scripts', 'flatux_admin_scripts');
}

//admin scripts
function flatux_admin_scripts() {
	//js
	wp_register_script('flatux-admin-js', plugins_url('/assets/js/admin.js', __FILE__), array('wp-color-picker', 'wp-i18n'), FLATUX_VERSION, true);
	wp_enqueue_script('flatux-admin-js');
	wp_set_script_translations('flatux-admin-js', 'flatux', plugin_dir_path(__FILE__) . 'languages');
	//css
	wp_register_style('flatux-admin-css', plugins_url('/assets/css/admin.css', __FILE__), array(), FLATUX_VERSION);
	wp_enqueue_style('flatux-admin-css');
}

//plugins table action links
function flatux_action_links($actions, $plugin_file) {
	if(plugin_basename(__FILE__) == $plugin_file) {
		$settings_url = admin_url('admin.php?page=flatux');
		$settings_link = array('settings' => '<a href="' . $settings_url . '">' . __('Settings') . '</a>');
		$actions = array_merge($settings_link, $actions);
	}
	return $actions;
}
add_filter('plugin_action_links', 'flatux_action_links', 10, 5);

//header for plugin settings page
function flatux_admin_header() {

	if(empty($_GET['page']) || $_GET['page'] !== 'flatux') {
		return;
	}

	$tab = !empty($_GET['tab']) ? $_GET['tab'] : 'options';

	echo "<div id='adcop-header'>";
		echo "<div id='logo'><i class='dashicons dashicons-layout'></i> ". FLATUX_ITEM_NAME ." <ver>" . FLATUX_VERSION . "</ver></div>";
		echo '<div id="menu">';
			echo '<a href="?page=flatux&tab=options" class="' . ($tab == 'options' || '' ? 'active' : '') . '" title="' . __('FlatUX Options', 'flatux') . '">' . __('FlatUX Options', 'flatux') . '</a>';
			echo '<a href="?page=flatux&tab=studio" class="' . ($tab == 'studio' || '' ? 'active' : '') . '" title="' . __('FlatUX Studio', 'flatux') . '">' . __('FlatUX Studio', 'flatux') . '</a>';
			echo '<a href="?page=flatux&tab=templates" class="' . ($tab == 'templates' || '' ? 'active' : '') . '" title="' . __('FlatUX Templates', 'flatux') . '">' . __('FlatUX Templates', 'flatux') . '</a>';
			echo '<a href="?page=flatux&tab=recommended" class="' . ($tab == 'recommended' || '' ? 'active' : '') . '" title="' . __('Recommended', 'flatux') . '">' . __('Recommended', 'flatux') . '</a>';
			echo '<a href="?page=flatux&tab=donate" style="background: #ED5464" class="' . ($tab == 'donate' ? 'active' : '') . '" title="' . __('Donate', 'flatux') . '"><i class="dashicons dashicons-money-alt"></i>' . __('Donate', 'flatux') . '</a>';
		echo '</div>';
	echo "</div>";
}
add_action('admin_notices', 'flatux_admin_header', 1);

//install plugin data
function flatux_install() {

	if(!function_exists('get_plugin_data')) {
        require_once(ABSPATH . 'wp-admin/includes/plugin.php');
    }
	$flatux_version = get_option('flatux_version');

	//update version
	if($flatux_version != FLATUX_VERSION) {
		update_option('flatux_version', FLATUX_VERSION, false);
	}
}

//check version for update
function flatux_version_check() {
	$install_flag = false;
	if(get_option('flatux_version') != FLATUX_VERSION) {
    	$install_flag = true;
    }
	if($install_flag) {
		flatux_install();
	}
}
add_action('plugins_loaded', 'flatux_version_check');


//uninstall plugin + delete options
function flatux_uninstall() {

	//global $wpdb;
	//deactivate license if needed
	flatux_deactivate_license();

	//plugin options
	$flatux_options = array(
		'flatux',
		'flatux_tools',
		'flatux_license',
		'flatux_version'
	);

	$flatux_tools = get_option('flatux_tools');
	if(!empty($flatux_tools['clean_uninstall']) && $flatux_tools['clean_uninstall'] == 1) {

		global $wpdb;

		//remove options
		foreach($flatux_options as $option) {
			delete_option($option);
		}

		//remove stored version
		delete_option('flatux_version');
	}
	
}
register_uninstall_hook(__FILE__, 'flatux_uninstall');

//all plugin file includes
include plugin_dir_path(__FILE__) . '/admin/settings.php';
include plugin_dir_path(__FILE__) . '/admin/functions.php';