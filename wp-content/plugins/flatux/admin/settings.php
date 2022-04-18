<?php
//register settings + options
function flatux_settings() {

    $flatux = get_option('flatux');

    //apply defaults if nothing is set
	if(get_option('flatux') == false) {	
		add_option('flatux', apply_filters('flatux_default_options', flatux_default_options()));
	}

    //elements content section
    add_settings_section('elements', __('FlatUX Elements', 'flatux'), '__return_false', 'flatux');

    //enable open graph
    add_settings_field(
        'element_new', 
        flatux_title(__('New Elements', 'flatux'), 'element_new', 'https://wpvnteam.com/'), 
        'flatux_print_input', 
        'flatux', 
        'elements', 
        array(
            'id'      => 'element_new',
            'tooltip' => sprintf(__('New elements for Flatsome UXBuilder (Banner / Title / Devider / Button / Image)', 'flatux'), '<head>')
        )
    );

    register_setting('flatux', 'flatux', 'flatux_sanitize_options');

    //extra options section
    add_settings_section('flatux_tools', __('Tools', 'flatux'), '__return_false', 'flatux_tools');

    if(!is_multisite()) {

        //clean uninstall
        add_settings_field(
            'clean_uninstall', 
            flatux_title(__('Clean Uninstall', 'flatux'), 'clean_uninstall', ''), 
            'flatux_print_input', 
            'flatux_tools', 
            'flatux_tools', 
            array(
                'id'      => 'clean_uninstall',
                'option'  => 'flatux_tools',
                'tooltip' => __('Permanently delete all FlatUX data from your database when the plugin is uninstalled.', 'flatux')
            )
        );
    }

    //restore defaults
    add_settings_field(
        'restore_defaults', 
        flatux_title(__('Restore Default Options', 'flatux'), 'restore_defaults', ''), 
        'flatux_print_input',
        'flatux_tools', 
        'flatux_tools', 
        array(
            'id'      => 'restore_defaults',
            'input'   => 'button',
            'title'   => __('Restore Default Options', 'flatux'),
            'confirmation' => __('Are you sure? This will remove all existing plugin options and restore them to their default states.', 'flatux'),
            'option'  => 'flatux_tools',
            'tooltip' => __('Restore all plugin options to their default settings.', 'flatux')
        )
    );

    //export settings
    add_settings_field(
        'export_settings', 
        flatux_title(__('Export Settings', 'flatux'), 'export_settings', ''), 
        'flatux_print_input',
        'flatux_tools', 
        'flatux_tools', 
        array(
            'id'      => 'export_settings',
            'input'   => 'button',
            'title'   => __('Export Plugin Settings', 'flatux'),
            'option'  => 'flatux_tools',
            'tooltip' => __('Export your FlatUX settings for this site as a .json file. This lets you easily import the configuration into another site.', 'flatux')
        )
    );

    //import settings
    add_settings_field(
        'import_settings', 
        flatux_title(__('Import Settings', 'flatux'), 'import_settings', ''), 
        'flatux_print_import_settings',
        'flatux_tools', 
        'flatux_tools', 
        array(
            'tooltip' => __('Import FlatUX settings from an exported .json file.', 'flatux')
        )
    );

    register_setting('flatux_tools', 'flatux_tools');
}
add_action('admin_init', 'flatux_settings');

//options default values
function flatux_default_options() {
	$defaults = array(
        'element_new'               => "1",
	);
	return apply_filters('flatux_default_options', $defaults);
}

//print settings section
function flatux_settings_section($page, $section) {
    global $wp_settings_sections;
    if(!empty($wp_settings_sections[$page][$section])) {
        echo '<div class="flatux-settings-section">';
            echo '<h2>' . __($wp_settings_sections[$page][$section]['title'], 'flatux') . '</h2>';
            echo '<table class="form-table">';
                echo '<tbody>';
                    do_settings_fields($page, $section);
                echo '</tbody>';
            echo '</table>';
        echo '</div>';
    }
}

//print form inputs
function flatux_print_input($args) {
    $selection_id = $args['id'];
    if(!empty($args['option'])) {
        $option = $args['option'];
        $options = get_option($args['option']);
    }
    else {
        $option = 'flatux';
        $options = get_option('flatux');
    }
    if(!empty($args['option']) && $args['option'] == 'flatux_tools') {
        $tools = $options;
    }
    else {
        $tools = get_option('flatux_tools');
    }

    //set section variables
    if(!empty($args['section'])) {
        $selection_id = $args['section'] . '-' . $args['id'];
        $option = $option . '[' . $args['section'] . ']';
        $options = isset($options[$args['section']]) ? $options[$args['section']] : array();
    }

    //button
    elseif(!empty($args['input']) && $args['input'] == 'button') {
        echo "<button id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' value='1' class='button button-secondary'";
            if(!empty($args['confirmation'])) {
                echo " onClick=\"return confirm('" . $args['confirmation'] . "');\"";
            }
        echo ">";
            echo $args['title'];
        echo "</button>";
    }

    //password
    elseif(!empty($args['input']) && $args['input'] == 'password') {
        echo "<input type='password' id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' value='" . (!empty($options[$args['id']]) ? $options[$args['id']] : '') . "' />";
    }

    //checkbox + toggle
    else {
        if((empty($args['input']) || $args['input'] != 'checkbox')) {
            echo "<label for='" . $selection_id . "' class='switch'>";
        }
        echo "<input type='checkbox' id='" . $selection_id . "' name='" . $option . "[" . $args['id'] . "]' value='1' style='display: block; margin: 0px;' ";
        if(!empty($options[$args['id']])) {
            echo "checked";
        }
        echo ">";
        if((empty($args['input']) || $args['input'] != 'checkbox')) {
               echo "<div class='slider'></div>";
           echo "</label>";
        }
    }

    //tooltip
    if(!empty($args['tooltip'])) {
        flatux_tooltip($args['tooltip']);
    }
}

//print import settings
function flatux_print_import_settings($args) {
    
    //file upload + button
    echo "<input type='file' name='flatux_import_settings_file' /><br />";
    echo "<button id='import_settings' name='flatux_tools[import_settings]' value='1' class='button button-secondary'>" . __("Import Plugin Settings", 'flatux') . "</button>";
    
    //tooltip
    if(!empty($args['tooltip'])) {
        flatux_tooltip($args['tooltip']);
    }
}

//print tooltip
function flatux_tooltip($tooltip) {
    echo "<span class='tooltip-text'>" . $tooltip . "</span>";
}

//print title
function flatux_title($title, $id = false, $link = false) {
    if(!empty($title)) {

        $var = "<span class='flatux-title-wrapper tooltip'>";

            //label + title
            if(!empty($id)) {
                $var.= "<label for='" . $id . "'>" . $title . "</label>";
            }
            else {
                $var.= $title;
            }

            //tooltip icon + link
            if(!empty($link)) {
                $var.= "<a" . (!empty($link) ? " href='" . $link . "'" : "") . " target='_blank'><span class='dashicons dashicons-admin-links'></span></a>";
            }

        $var.= "</span>";

        return $var;
    }
}

//sanitize options
function flatux_sanitize_options($values) {
    return $values;
}