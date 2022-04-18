<?php

add_ux_builder_shortcode( 'flatux_divider', array(
    'name' => __( 'FlatUX Divider' ),
    'category' => __( 'FlatUX' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/divider.svg', 
    'options' => array(
        'align' => array(
            'type' => 'radio-buttons',
            'heading' => __('Align'),
            'default' => '',
            'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
        ),
    	'width' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Width'),
    		'default' => '30px',
            'min' => 0,
    	),
    	'height' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Height'),
    		'default' => '3px',
            'min' => 0,
    	),
    	'margin' => array(
    		'type' => 'scrubfield',
    		'heading' => __('Margin'),
    		'default' => '1.0em',
            'step' => 0.1,
    	),
		'color' => array(
	      'type' => 'colorpicker',
	      'heading' => __('Color'),
	      'default' => '',
	      'alpha' => true,
	      'format' => 'rgb',
	      'position' => 'bottom right',
	    ),
		'dashed_options' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/dashed.php' ),
    )


) );