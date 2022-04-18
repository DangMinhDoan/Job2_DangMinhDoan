<?php

$position_options = require( FLATUX_PATH . '/inc/builder/shortcodes/commons/position.php' );
$position_options['options']['position_x']['on_change'] = array(
  'recompile' => false,
  'class' => 'x{{ value }} md-x{{ value }} lg-x{{ value }}'
);
$position_options['options']['position_y']['on_change'] = array(
  'recompile' => false,
  'class' => 'y{{ value }} md-y{{ value }} lg-y{{ value }}'
);

add_ux_builder_shortcode( 'flatux_image', array(
    'name' => __( 'FlatUX Image', 'ux-builder'),
    'category' => __( 'FlatUX' ),
    'toolbar_thumbnail' => 'id',
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/ux_image.svg', 
    'wrap' => false,
    'styles' => array(
      'flatux-animate' => FLATUX_URL . '/assets/css/animate.min.css',
      'flatux-hover' => FLATUX_URL . '/assets/css/hover.min.css'
    ),

    'presets' => array(
        array(
            'name' => __( 'Blank' ),
            'content' => '[flatux_image][/flatux_image]',
        ),
    ),

    'options' => array(

        'id' => array(
            'type' => 'image',
            'heading' => __('Image'),
            'default' => ''
        ),
        'image_size' => array(
            'type' => 'select',
            'heading' => 'Image Size',
            'param_name' => 'image_size',
            'default' => '',
            'options' => array(
                '' => 'Normal',
                'large' => 'Large',
                'medium' => 'Medium',
                'thumbnail' => 'Thumbnail',
                'original' => 'Original',
            )
        ),
        'width' => array(
          'type' => 'slider',
          'heading' => 'Width',
          'responsive' => true,
          'default' => '100',
          'unit' => '%',
          'max' => '100',
          'min' => '0',
          'on_change' => array(
            'style' => 'width: {{ value }}%'
          ),
        ),
        'height' => array(
              'type' => 'scrubfield',
              'heading' => __('Height'),
              'default' => '',
              'placeholder' => __('Auto'),
              'min' => 0,
              'max' => 1000,
              'step' => 1,
              'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/image-heights.php' ),
               'on_change' => array(
                    'selector' => '.image-cover',
                    'style' => 'padding-top: {{ value }}'
                )
        ),
        'margin' => array(
          'type' => 'margins',
          'heading' => __( 'Margin' ),
          'value' => '',
          'full_width' => true,
          'min' => -100,
          'max' => 100,
          'step' => 1,
        ),
        'lightbox' => array(
            'type' => 'radio-buttons',
            'heading' => __('Lightbox'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

        'lightbox_image_size' => array(
	        'type'       => 'select',
	        'heading'    => __( 'Lightbox Image Size' ),
	        'conditions' => 'lightbox == "true"',
	        'default'    => '',
	        'options'    => array(
		        ''          => 'Default',
		        'large'     => 'Large',
		        'medium'    => 'Medium',
		        'thumbnail' => 'Thumbnail',
		        'original'  => 'Original',
	        )
        ),

        'caption' => array(
            'type' => 'radio-buttons',
            'heading' => __('Caption'),
            'default' => '',
            'options' => array(
                ''  => array( 'title' => 'Off'),
                'true'  => array( 'title' => 'On'),
            ),
        ),

		'lightbox_caption'    => array(
			'type'       => 'radio-buttons',
			'heading'    => __( 'Caption on Lightbox' ),
			'conditions' => 'lightbox == "true"',
			'default'    => '',
			'options'    => array(
				''     => array( 'title' => 'Off' ),
				'true' => array( 'title' => 'On' ),
			),
		),

        'image_overlay' => array(
            'type' => 'colorpicker',
            'heading' => __( 'Image Overlay' ),
            'default' => '',
            'alpha' => true,
            'format' => 'rgb',
            'position' => 'bottom right',
            'on_change' => array(
              'selector' => '.overlay',
              'style' => 'background-color: {{ value }}',
            ),
         ),
        'parallax' => array(
            'type' => 'slider',
            'heading' => 'Parallax',
            'default' => '0',
            'max' => '10',
            'min' => '-10',
        ),
		// Animate
		'animate_options' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/animate.php' ),
		'hover_options'     => array(
			'type'    => 'group',
			'heading' => 'FlatUX Hover',
			'options' => array(
				'box_hover'     => array(
					'type'    => 'select',
					'heading' => 'Hover',
					'default' => '',
					'options' => require( FLATUX_PATH . '/inc/builder/shortcodes/values/hover.php' ),
				),
			),
		),
        'link_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/links.php' ),
        'position_options' => $position_options,
        'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    ),
) );
