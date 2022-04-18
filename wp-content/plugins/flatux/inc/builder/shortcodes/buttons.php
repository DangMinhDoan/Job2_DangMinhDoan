<?php

add_ux_builder_shortcode( 'flatux_button', array(
	'name'      => __( 'FlatUX Button', 'ux-builder' ),
	'category'  => __( 'FlatUX', 'ux-builder' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button.svg',
	'info'      => '{{ text }}',
	'inline'    => true,
	'wrap'      => false,
	'priority'  => 1,
    'styles' => array(
      'flatsome-animate' => FLATUX_URL . '/assets/css/animate.min.css',
      'flatsome-hover' => FLATUX_URL . '/assets/css/hover.min.css'
    ),
	'presets'   => array(
		array(
			'name'      => __( 'Simple', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-simple.svg',
			'content'   => '[flatux_button text="Click me!"]',
		),
		array(
			'name'      => __( 'Round', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-round.svg',
			'content'   => '[flatux_button text="Click me!" radius="10"]',
		),
		array(
			'name'      => __( 'Circle', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-circle.svg',
			'content'   => '[flatux_button text="Click me!" radius="99"]',
		),
		array(
			'name'      => __( 'Outline', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-outline.svg',
			'content'   => '[flatux_button text="Click me!" style="outline"]',
		),
		array(
			'name'      => __( 'Outline Round', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-outline-round.svg',
			'content'   => '[flatux_button text="Click me!" style="outline" radius="10"]',
		),
		array(
			'name'      => __( 'Outline Circle', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-outline-circle.svg',
			'content'   => '[flatux_button text="Click me!" style="outline" radius="99"]',
		),
		array(
			'name'      => __( 'Simple Link', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-link.svg',
			'content'   => '[flatux_button text="Click me!"  style="link"]',
		),
		array(
			'name'      => __( 'Underline', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-underline.svg',
			'content'   => '[flatux_button text="Click me!"  style="underline"]',
		),
		array(
			'name'      => __( 'CTA - Small', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-call-to-action.svg',
			'content'   => '[flatux_button text="Click me!" style="shade" depth="3" depth_hover="5" radius="5"]',
		),
		array(
			'name'      => __( 'CTA - Large', 'ux-builder' ),
			'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/button-call-to-action-large.svg',
			'content'   => '[flatux_button text="Click me!" style="shade" size="larger" depth="4" depth_hover="5" radius="10"]',
		),
	),
	'options'   => array(
		'text'             => array(
			'type'       => 'textfield',
			'holder'     => 'button',
			'heading'    => 'Text',
			'param_name' => 'text',
			'focus'      => 'true',
			'value'      => 'Button',
			'default'    => '',
			'auto_focus' => true,
		),
		'letter_case'      => array(
			'type'    => 'radio-buttons',
			'heading' => 'Letter Case',
			'default' => '',
			'options' => array(
				''          => array( 'title' => 'ABC' ),
				'lowercase' => array( 'title' => 'Abc' ),
			),
		),
		'layout_options'   => array(
			'type'    => 'group',
			'heading' => 'Layout',
			'options' => array(
				'color'       => array(
					'type'    => 'select',
					'heading' => 'Color',
					'default' => 'primary',
					'options' => array(
						'primary'   => 'Primary',
						'secondary' => 'Secondary',
						'alert'     => 'Alert',
						'success'   => 'Success',
						'white'     => 'White',
						'custom'     => 'Custom',
					),
				),
				'style'       => array(
					'type'    => 'select',
					'heading' => 'Style',
					'default' => '',
					'options' => array(
						''          => 'Default',
						'outline'   => 'Outline',
						'link'      => 'Simple',
						'underline' => 'Underline',
						'shade'     => 'Shade',
						'bevel'     => 'Bevel',
						'gloss'     => 'Gloss',
					),
				),
				'text_color' => array(
					'conditions' => 'color == "custom" && style == ""',
					'type'     => 'colorpicker',
					'heading'  => __( 'Text Color', 'flatsome' ),
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'bg_color' => array(
					'conditions' => 'color == "custom" && style == ""',
					'type'     => 'colorpicker',
					'heading'  => __( 'Background Color', 'flatsome' ),
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'bg_gradient' => array(
					'conditions' => 'color == "custom" && style == ""',
					'type'     => 'colorpicker',
					'heading'  => __( 'Background Gradient', 'flatsome' ),
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'border_style' => array(
					'conditions' => 'color == "custom" && style == ""',
					'type' => 'radio-buttons',
					'heading' => 'Border Style',
					'full_width' => true,
					'default' => '',
					'options' => array(
						'' => array( 'title' => 'Close', 'icon' => 'dashicons-no-alt', ),
						'none'   => array( 'title' => 'None'),
						'solid'   => array( 'title' => 'Solid'),
						'dashed'  => array( 'title' => 'Dashed'),
						'dotted'  => array( 'title' => 'Dotted'),
					),
				),
				'border_width' => array(
					'conditions' => 'border_style',
					'type' => 'scrubfield',
					'heading' => 'Border Width',
					'unit' => 'px',
					'min' => 0,
					'max' => 50,
				),
				'border_color' => array(
					'conditions' => 'border_style',
					'type'     => 'colorpicker',
					'heading'  => __( 'Border Color', 'flatsome' ),
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'outline_width' => array(
					'conditions' => 'border_style',
					'type' => 'scrubfield',
					'heading' => 'Outline Width',
					'unit' => 'px',
					'min' => 0,
					'max' => 50,
				),
				'outline_color' => array(
					'conditions' => 'border_style',
					'type'     => 'colorpicker',
					'heading'  => __( 'Outline Color', 'flatsome' ),
					'default' => '',
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'size'        => array(
					'type'    => 'select',
					'heading' => 'Size',
					'options' => require get_template_directory() . '/inc/builder/shortcodes/values/sizes.php',
				),
				'letter_spacing'      => array(
					'type'    => 'slider',
					'heading' => __( 'Letter Spacing', 'flatsome' ),
					'default' => '',
					'max'     => '20',
					'min'     => '0',
				),
				'padding'     => array(
					'type'       => 'margins',
					'heading'    => 'Padding',
					'full_width' => true,
					'min'        => 0,
					'max'        => 200,
					'step'       => 1,
				),
				'radius'      => array(
					'type'    => 'slider',
					'class'   => '',
					'heading' => 'Radius',
					'default' => '0',
					'max'     => '100',
					'min'     => '0',
				),
				'depth'       => array(
					'type'    => 'slider',
					'class'   => '',
					'heading' => 'Depth',
					'default' => '0',
					'max'     => '5',
					'min'     => '0',
				),
				'depth_hover' => array(
					'type'       => 'slider',
					'class'      => '',
					'heading'    => 'Depth :hover',
					'param_name' => 'depth_hover',
					'default'    => '0',
					'max'        => '5',
					'min'        => '0',
				),
				'expand'      => array(
					'type'    => 'checkbox',
					'heading' => 'Expand',
				),
			),
		),
		'icon_options'     => array(
			'type'    => 'group',
			'heading' => 'Icon',
			'options' => array(
				'icon'        => array(
					'type'    => 'select',
					'heading' => 'Icon',
					'options' => require get_template_directory() . '/inc/builder/shortcodes/values/icons.php',
				),
				'icon_pos'    => array(
					'conditions' => 'icon',
					'type'       => 'select',
					'heading'    => 'Position',
					'options'    => array(
						''     => 'Right',
						'left' => 'Left',
					),
				),
				'icon_reveal' => array(
					'conditions' => 'icon',
					'type'       => 'select',
					'heading'    => 'Visibility',
					'options'    => array(
						''     => 'Always visible',
						'true' => 'Visible on hover',
					),
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
				'box_cover' => array(
					'conditions' => 'box_hover',
					'type'     => 'colorpicker',
					'heading'  => __( 'Button Cover', 'flatsome' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'box_bg' => array(
					'conditions' => 'box_hover',
					'type'     => 'colorpicker',
					'heading'  => __( 'Button Background', 'flatsome' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
				'box_border' => array(
					'conditions' => 'box_hover',
					'type'     => 'colorpicker',
					'heading'  => __( 'Button Border', 'flatsome' ),
					'format'   => 'rgb',
					'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
				),
			),
		),
		'link_options'     => require get_template_directory() . '/inc/builder/shortcodes/commons/links.php',
		'advanced_options' => require get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php',
	),
) );
