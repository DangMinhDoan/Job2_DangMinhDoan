<?php
$flatux_options = get_option('flatux_options');

//check option update for custom inputs and modify result
function flatux_pre_update_option_tools($new_value, $old_value) {

	//restore plugin default options
	if(!empty($new_value['restore_defaults'])) {
		$defaults = flatux_default_options();
		if(!empty($defaults)) {
			update_option("flatux", $defaults);
		}
		add_settings_error('flatux', 'flatux-import-success', __('Successfully restored default options.', 'flatux'), 'success');
		return $old_value;
	}

	//export settings button was pressed
	if(!empty($new_value['export_settings'])) {

		$settings = array();

		$settings['flatux'] = get_option('flatux');
		$settings['flatux_tools'] = get_option('flatux_tools');

		ignore_user_abort(true);

		//setup headers
		nocache_headers();
		header('Content-Type: application/json; charset=utf-8');
		header('Content-Disposition: attachment; filename=flatux-settings-export-' . date('Y-m-d') . '.json');
		header('Expires: 0');

		//print encoded file
		echo json_encode($settings);
		exit;
	}

	if(!empty($new_value['import_settings']) || !empty($new_value['import_settings_file'])) {

		//get temporary file
		$import_file = $_FILES['flatux_import_settings_file']['tmp_name'];

		//cancel if there's no file
		if(empty($import_file)) {
			add_settings_error('flatux', 'flatux-import-error', __('No import file given.', 'flatux'), 'error');
			return $old_value;
		}

		//check if uploaded file is valid
		$file_parts = explode('.', $_FILES['flatux_import_settings_file']['name']);
		$extension = end($file_parts);
		if($extension != 'json') {
			add_settings_error('flatux', 'flatux-import-error', __('Please upload a valid .json file.', 'flatux'), 'error');
			return $old_value;
		}

		//unpack settings from file
		$settings = (array) json_decode(file_get_contents($import_file), true);

		if(isset($settings['flatux'])) {
			update_option('flatux', $settings['flatux']);
		}

		if(isset($settings['flatux_tools'])) {
			update_option('flatux_tools', $settings['flatux_tools']);
		}

		add_settings_error('flatux', 'flatux-import-success', __('Successfully imported FlatUX settings.', 'flatux'), 'success');

		return $old_value;
	}

	return $new_value;
}

//add filter to update options
function flatux_update_options() {

	//tools
	add_filter('pre_update_option_flatux_tools', 'flatux_pre_update_option_tools', 10, 2);
}
add_action('admin_init', 'flatux_update_options');

/* EDD License Functions
/***********************************************************************/

//activate license
function flatux_activate_license() {

	//grab existing license data
	$flatux_license = get_option('flatux_license');
	$license = !empty($flatux_license['key']) ? trim($flatux_license['key']) : null;

	if(!empty($license)) {

		//data to send in our API request
		$api_params = array(
			'edd_action'=> 'activate_license',
			'license' 	=> $license,
			'item_name' => urlencode(FLATUX_ITEM_NAME),
			'url'       => home_url()
		);

		//call the custom API
		$response = wp_remote_post(FLATUX_STORE_URL, array('timeout' => 15, 'sslverify' => true, 'body' => $api_params));

		//make sure the response came back okay
		if(is_wp_error($response)) {
			return false;
		}

		//decode the license data
		$license_data = json_decode(wp_remote_retrieve_body($response));

		//store status
		$flatux_license['status'] = $license_data->license;

		//update stored option
		update_option('flatux_license', $flatux_license);
	}
}

//deactivate license
function flatux_deactivate_license() {

	//grab existing license data
	$flatux_license = get_option('flatux_license');
	$license = !empty($flatux_license['key']) ? trim($flatux_license['key']) : null;

	if(!empty($license)) {

		//data to send in our API request
		$api_params = array(
			'edd_action'=> 'deactivate_license',
			'license' 	=> $license,
			'item_name' => urlencode(FLATUX_ITEM_NAME),
			'url'       => home_url()
		);

		//call the custom API
		$response = wp_remote_post(FLATUX_STORE_URL, array('timeout' => 15, 'sslverify' => true, 'body' => $api_params));

		//make sure the response came back okay
		if(is_wp_error($response)) {
			return false;
		}

		//decode the license data
		$license_data = json_decode(wp_remote_retrieve_body($response));

		//$license_data->license will be either "deactivated" or "failed"
		if($license_data->license == 'deactivated') {

			//remove stored status
			unset($flatux_license['status']);

			//update license option
			update_option('flatux_license', $flatux_license);
		}
	}
}

//check + retrieve license status
function flatux_check_license() {

	//grab existing license data
	$flatux_license = get_option('flatux_license');
	$license = !empty($flatux_license['key']) ? trim($flatux_license['key']) : null;

	if(!empty($license)) {

		//data to send in our API request
		$api_params = array(
			'edd_action' => 'check_license',
			'license' => $license,
			'item_name' => urlencode(FLATUX_ITEM_NAME),
			'url'       => home_url()
		);

		//call the custom API
		$response = wp_remote_post(FLATUX_STORE_URL, array('timeout' => 15, 'sslverify' => true, 'body' => $api_params));

		//make sure the response came back okay
		if(is_wp_error($response)) {
			return false;
		}

		//decode the license data
		$license_data = json_decode(wp_remote_retrieve_body($response));

		//save stored status
		$flatux_license['status'] = $license_data->license;

		//update license option
		update_option('flatux_license', $flatux_license);
		
		//return license data for use
		return($license_data);
	}

	return false;
}

$flatux = get_option('flatux');
if(!empty($flatux['element_new'])) {
	function flatux_builder_element(){
		include FLATUX_PATH . '/inc/builder/shortcodes/ux_banner.php';
		include FLATUX_PATH . '/inc/builder/shortcodes/text_box.php';
		include FLATUX_PATH . '/inc/builder/shortcodes/title.php';
		include FLATUX_PATH . '/inc/builder/shortcodes/divider.php';
		include FLATUX_PATH . '/inc/builder/shortcodes/buttons.php';
		include FLATUX_PATH . '/inc/builder/shortcodes/ux_image.php';
	}
	add_action('ux_builder_setup', 'flatux_builder_element');
	require FLATUX_PATH . '/inc/shortcodes/ux_banner.php';
	require FLATUX_PATH . '/inc/shortcodes/text_box.php';
	require FLATUX_PATH . '/inc/shortcodes/title.php';
	require FLATUX_PATH . '/inc/shortcodes/divider.php';
	require FLATUX_PATH . '/inc/shortcodes/buttons.php';
	require FLATUX_PATH . '/inc/shortcodes/ux_image.php';
}

// Register Scripts
function flatux_scripts() {
	$flatux = get_option('flatux');
	if(!empty($flatux['element_new'])) {
		wp_register_style( 'flatux-animate', FLATUX_URL . '/assets/css/animate.min.css', array(), '4.1.1', 'all' );
		wp_register_style( 'flatux-hover', FLATUX_URL . '/assets/css/hover.min.css', array(), '2.3.1', 'all' );
		wp_register_style( 'flatux-effect', FLATUX_URL . '/assets/css/effect.min.css', array(), '1.0', 'all' );
	}
}
add_action( 'wp_enqueue_scripts', 'flatux_scripts', 100 );
