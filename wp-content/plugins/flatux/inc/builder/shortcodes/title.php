<?php

add_ux_builder_shortcode( 'flatux_title', array(
	'name'      => __( 'FlatUX Title', 'ux-builder' ),
	'category'  => __( 'FlatUX' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/title.svg', 
	'info'      => '{{ text }}',
	'wrap'      => false,
    'styles' => array(
      'flatux-animate' => FLATUX_URL . '/assets/css/animate.min.css',
      'flatux-hover' => FLATUX_URL . '/assets/css/hover.min.css'
    ),

	'options' => array(
		'text' => array(
			'type'       => 'textfield',
			'heading'    => 'Title',
			'default'    => 'Lorem ipsum dolor sit amet...',
			'auto_focus' => true,
		),
		'sub_text' => array(
			'type'       => 'textfield',
			'heading'    => 'Sub Title',
			'default'    => '',
			'auto_focus' => true,
		),
		'sub_text_full'      => array(
			'conditions' => 'sub_text',
			'type'    => 'checkbox',
			'heading'     => __( 'Full Text' ),
		),
		'text_options'     => array(
			'type'    => 'group',
			'heading' => 'Text Options',
			'options' => array(
				'tag_name' => array(
					'type'    => 'select',
					'heading' => 'Tag',
					'default' => 'h3',
					'options' => array(
						'h1' => 'H1',
						'h2' => 'H2',
						'h3' => 'H3',
						'h4' => 'H4',
						'h5' => 'H5',
						'h6' => 'H6',
						'p' => 'P',
						'span' => 'Span',
						'div' => 'Div',
					),
				),
				'letter_case' => array(
					'type'    => 'select',
					'heading' => 'Letter Case',
					'default' => 'none',
					'options' => array(
						'none' => 'None',
						'capitalize'      => 'Capitalize',
						'lowercase'      => 'lowercase',
						'uppercase'      => 'UPPERCASE',
					),
				),
				'text_align'  => array(
					'type'       => 'radio-buttons',
					'heading'    => __( 'Text align', 'flatsome' ),
					'responsive' => true,
					'default'    => '',
					'options'    => array(
						''   => array(
							'title' => 'None',
							'icon'  => 'dashicons-no-alt',
						),
						'left'    => array(
							'title' => 'Left',
							'icon'  => 'dashicons-editor-alignleft',
						),
						'center'  => array(
							'title' => 'Center',
							'icon'  => 'dashicons-editor-aligncenter',
						),
						'right'   => array(
							'title' => 'Right',
							'icon'  => 'dashicons-editor-alignright',
						),
					),
				),
				'icon' => array(
					'type'    => 'select',
					'heading' => 'Icon',
					'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/icons.php' ),
				),
				'size' => array(
					'type'    => 'slider',
					'heading' => __( 'Size' ),
					'default' => 100,
					'unit'    => '%',
					'min'     => 20,
					'max'     => 300,
					'step'    => 1,
				),
				'line_height' => array(
					'type'       => 'slider',
					'heading'    => __( 'Line height', 'flatsome' ),
					'responsive' => true,
					'max'        => 3,
					'min'        => 0.75,
					'step'       => 0.05,
				),
				'link' => array(
					'type'    => 'textfield',
					'heading' => 'Link',
					'default' => '',
				),
				'target' => array(
					'type' => 'select',
					'heading' => __( 'Target' ),
					'default' => '',
					'options' => array(
						'' => 'Same window',
						'_blank' => 'New window',
					)
				  ),
				'color' => array(
					'type'     => 'colorpicker',
					'heading'  => __( 'Text Color' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'bg_text_color' => array(
					'type'     => 'colorpicker',
					'heading'  => __( 'Background Color' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'text_padding' => array(
					'type' => 'margins',
					'heading' => 'Text Padding',
					'full_width' => true,
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
				'text_margin' => array(
					'type' => 'margins',
					'heading' => 'Text Margin',
					'full_width' => true,
					'min' => -100,
					'max' => 100,
					'step' => 1,
				),
			),
		),
		'container_options'     => array(
				'type'    => 'group',
				'heading' => 'Container Options',
				'options' => array(
					'bg_color' => array(
						'type'     => 'colorpicker',
						'heading'  => __( 'Background Color' ),
						'alpha'    => true,
						'format'   => 'rgb',
						'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
					),
					'bg_transform' => array(
						'conditions' => 'bg_color',
						'type'        => 'slider',
						'heading'     => __( 'Bg Transform' ),
						'default'	  => '',
						'min'         => 0,
						'max'         => 360,
						'step'        => 5,
					),
					'text_transform'      => array(
						'conditions' => 'bg_color',
						'type'    => 'checkbox',
						'heading'     => __( 'Text Transform' ),
					),
					'width' => array(
						'type'    => 'scrubfield',
						'heading' => __( 'Width' ),
						'min'     => 0,
						'max'     => 1200,
						'step'    => 5,
					),
					'padding' => array(
						'type' => 'margins',
						'heading' => 'Padding',
						'full_width' => true,
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					'margin' => array(
						'type' => 'margins',
						'heading' => 'Margin',
						'full_width' => true,
						'min' => -100,
						'max' => 100,
						'step' => 1,
					),
				),
			),
		'border_options'     => array(
			'type'    => 'group',
			'heading' => 'Border Options',
			'options' => array(
				'b_border_style'       => array(
					'type'    => 'select',
					'heading' => 'Border Style',
					'default' => '',
					'options' => array(
						'' => 'None',
						'dotted'     => 'Dotted',
						'dashed'   => 'Dashed',
						'solid'     => 'Solid',
						'double'     => 'Double',
						'groove'     => 'Groove',
						'ridge'     => 'Ridge',
						'inset'     => 'Inset',
						'outset'     => 'Outset',
					),
				),
				'b_border_color' => array(
					'conditions' => 'b_border_style !== ""',
				  'type' => 'colorpicker',
				  'heading' => __('Border Color'),
				  'format' => 'rgb',
				  'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'b_border_width' => array(
					'conditions' => 'b_border_style !== ""',
					'type'    => 'scrubfield',
					'heading' => __( 'Border Width' ),
					'default' => '',
					'min'     => 0,
					'max'     => 1200,
					'step'    => 5,
				),
				'b_height' => array(
					'conditions' => 'text_align !== ""',
					'type'    => 'scrubfield',
					'heading' => __( 'Divider Height' ),
					'default' => '',
					'min'     => 0,
					'max'     => 200,
					'step'    => 1,
				),
				'b_bg_color' => array(
					'conditions' => 'b_height',
					'type'     => 'colorpicker',
					'heading'  => __( 'Divider Color' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'b_transform' => array(
					'conditions' => 'b_height',
					'type'        => 'slider',
					'heading'     => __( 'Divider Transform' ),
					'min'         => 0,
					'max'         => 360,
					'step'        => 5,
				),
				'b_opacity' => array(
					'conditions' => 'b_height',
					'type'    => 'slider',
					'heading' => __( 'Divider Opacity' ),
					'default' => '',
					'min'     => 0.1,
					'max'     => 1,
					'step'    => 0.1,
				),
			),
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
		'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
	),
) );
