<?php
//save license key
if(isset($_POST['flatux_save_license']) && isset($_POST['flatux_license_key'])) {

	//save license option
	if(is_network_admin()) {
		update_site_option('flatux_license', array('key' => trim($_POST['flatux_license_key'])));
	}
	else {
		update_option('flatux_license', array('key' => trim($_POST['flatux_license_key'])));
	}

	if(is_multisite()) {

		//check license info
		$license_info = flatux_check_license();

		if(!empty($license_info->activations_left) && $license_info->activations_left == 'unlimited') {
			
			//activate after save
			flatux_activate_license();
		}
	}
	else {
		//activate after save
		flatux_activate_license();
	}
}

//activate license
if(isset($_POST['flatux_activate_license'])) {
	flatux_activate_license();
}

//deactivate license
if(isset($_POST['flatux_deactivate_license'])) {
	flatux_deactivate_license();
}

//remove license
if(isset($_POST['flatux_remove_license'])) {

	//deactivate before removing
	flatux_deactivate_license();

	//remove license option
	if(is_network_admin()) {
		delete_site_option('flatux_license');
	}
	else {
		delete_option('flatux_license');
	}
}

//get stored license data
$flatux_license = is_network_admin() ? get_site_option('flatux_license') : get_option('flatux_license');

//set license key
$license = !empty($flatux_license['key']) ? trim($flatux_license['key']) : null;

//start custom license form
echo "<form method='post' action=''>";

	echo '<div class="flatux-settings-section">';

		//tab header
		echo "<h2>" . __('License', 'flatux') . "</h2>";

		echo "<table class='form-table'>";
			echo "<tbody>";

				//license key
				echo "<tr>";
					echo "<th>" . flatux_title(__('License Key', 'flatux'), (empty($license) ? 'flatux_license_key' : false), 'https://#') . "</th>";
					echo "<td>";

						echo "<input id='flatux_license_key' name='flatux_license_key' type='password' class='regular-text' value='" . (!empty($license) ? 'adcop' : '') . "' style='margin-right: 10px;' maxlength='50' />";
						if(empty($license)) {
							//save license button
							echo "<input type='submit' name='flatux_save_license' class='button button-primary' value='" . __('Save License', 'flatux') . "'>";
						}
						else {
							//remove license button
							echo "<input type='submit' class='button flatux-button-warning' name='flatux_remove_license' value='" . __('Remove License', 'flatux') . "' />";
						}

						flatux_tooltip(__('Save or remove your license key.', 'flatux'));

					echo "</td>";
				echo "</tr>";

				if(!empty($license)) {

					//force disable styles on license input
					echo "<style>
					input[name=\"flatux_license_key\"] {
						background: rgba(255,255,255,.5);
					    border-color: rgba(222,222,222,.75);
					    box-shadow: inset 0 1px 2px rgba(0,0,0,.04);
					    color: rgba(51,51,51,.5);
					    pointer-events: none;
					}
					</style>";

					//check license info
					$license_info = flatux_check_license();

					if(!empty($license_info)) {

						//activate/deactivate license
						if(!empty($license_info->license) && $license_info->license != 'invalid') {
							echo "<tr>";
								echo "<th>" . __('Activate License', 'flatux') . "</th>";
								echo "<td>";
									if($license_info->license == 'valid') {
										echo "<input type='submit' class='button-secondary' name='flatux_deactivate_license' value='" . __('Deactivate License', 'flatux') . "' style='margin-right: 10px;' />";
										echo "<span style='color:green;line-height:30px;'><span class='dashicons dashicons-cloud'style='line-height:30px;'></span> " . __('License is activated.', 'flatux') . "</span>";
									} 
									elseif(!is_multisite() || (!empty($license_info->activations_left) && $license_info->activations_left == 'unlimited')) {
										echo "<input type='submit' class='button-secondary' name='flatux_activate_license' value='" . __('Activate License', 'flatux') . "' style='margin-right: 10px;' />";
										echo "<span style='color:red;line-height:30px;'><span class='dashicons dashicons-warning'style='line-height:30px;'></span> " . __('License is not activated.', 'flatux') . "</span>";
									}
									else {
										echo "<span style='color:red;display: block;'>" . __('Unlimited License needed for use in a multisite environment. Please contact support to upgrade.', 'flatux') . "</span>";
									}
								echo "</td>";
							echo "</tr>";
						}
				
						//customer email
						if(!empty($license_info->customer_email)) {
							echo "<tr>";
								echo "<th>" . __('Customer Email', 'flatux'). "</th>";
								echo "<td>" . $license_info->customer_email . "</td>";
							echo "</tr>";
						}

						//license status (active/expired)
						if(!empty($license_info->license)) {
							echo "<tr>";
								echo "<th>" . __('License Status', 'flatux') . "</th>";
								echo "<td" . ($license_info->license == "expired" ? " style='color: red;'" : "") . ">";
									echo ucfirst($license_info->license);
									if($license_info->license == "expired") {
										echo "<br />";
										echo "<a href='https://#/checkout/?edd_license_key=" . $license . "&download_id=60' class='button-primary' style='margin-top: 10px;' target='_blank'>" . __('Renew Your License for Updates + Support!', 'flatux') . "</a>";
									}
								echo "</td>";
							echo "</tr>";
						}

						//licenses used
						if(!empty($license_info->site_count) && !empty($license_info->license_limit) && !is_network_admin()) {
							echo "<tr>";
								echo "<th>" . __('Licenses Used', 'flatux') . "</th>";
								echo "<td>" . $license_info->site_count . "/" . $license_info->license_limit . "</td>";
							echo "</tr>";
						}

						//expiration date
						if(!empty($license_info->expires)) {
							echo "<tr>";
								echo "<th>" . __('Expiration Date', 'flatux') . "</th>";
								echo "<td>" . ($license_info->expires != 'lifetime' ? date("F d, Y", strtotime($license_info->expires)) : __('Lifetime', 'flatux')) . "</td>";
							echo "</tr>";
						}
					}
				}

			echo "</tbody>";
		echo "</table>";
	echo '</div>';
echo "</form>";