<?php
//selected tab
$tab = $_GET['tab'] ?? 'options';

//settings wrapper
echo '<div id="adcop" class="wrap">';

	//hidden h2 for admin notice placement
	echo '<h2 style="display: none;"></h2>';
	settings_errors();

	//options tab
	if($tab == 'options') {
		//get options
		$flatux = get_option('flatux');
		echo '<form method="post" action="options.php" id="options-form">';
			//options subnav
			echo '<input type="hidden" name="section" id="subnav-section" />';
			settings_fields('flatux');
			//elements content
			echo '<section id="options-elements" class="section-content">';
				flatux_settings_section('flatux', 'elements');
			echo '</section>';
			submit_button();
		echo '</form>';
		
	//studio tab (Coming Soon)
	} elseif($tab == 'studio') {
		require_once('studio.php');
		
	//templates tab (Coming Soon)
	} elseif($tab == 'templates') {
		require_once('templates.php');
		
	//recommended
	} elseif($tab == 'recommended') {
		require_once('recommended.php');
		
	//tools tab
	} elseif($tab == 'tools') {
		echo '<form method="post" action="options.php" enctype="multipart/form-data">';
			settings_fields('flatux_tools');
			flatux_settings_section('flatux_tools', 'flatux_tools');
			//add migrator settings if needed
			if(function_exists('flatux_migrator_settings')) {
				flatux_settings_section('flatux_tools', 'migrate');
			}
			submit_button();
		echo '</form>';

	//license output
	} elseif($tab == 'license') {
		require_once('license.php');

	//donate output
	} elseif($tab == 'donate') {
		require_once('donate.php');
	}
	
echo '</div>';