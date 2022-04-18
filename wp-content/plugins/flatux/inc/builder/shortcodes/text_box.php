<?php

add_ux_builder_shortcode( 'flatux_text_box', array(
    'type' => 'container',
    'name' => __( 'FlatUX TextBox' ),
    'category' => __( 'FlatUX' ),
    'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/text_box.svg', 
    'require' => 'flatux_banner',
    'allow' => array(
      'flatux_title',
      'flatux_divider',
      'flatux_button',
      'flatux_image',
      'ux_breadcrumbs',
      'ux_the_title',
      'ux_image',
      'ux_stack',
      'ux_html',
      'text',
      'divider',
      'button',
      'title',
      'video_button',
      'row',
      'follow',
      'share'
    ),
    'wrap' => false,
    'resize' => array( 'right' ),
    'move' => 'top-left',
    'styles' => array(
      'flatux-animate' => FLATUX_URL . '/assets/css/animate.min.css'
    ),

    'presets' => array(
        array(
            'name' => __( 'Default' ),
            'content' => '[flatux_text_box pos="x50 y50"][/flatux_text_box]',
        )
    ),
    'options' => array(
      'layout_options' => array(
        'type' => 'group',
        'heading' => __( 'Layout' ),
        'options' => array(
           'style' => array(
                'type' => 'radio-buttons',
                'heading' => __('Style'),
                'full_width' => true,
                'default' => '',
                'options' => array(
                    ''  => array( 'title' => 'Normal'),
                    'square'  => array( 'title' => 'Square'),
                    'circle'  => array( 'title' => 'Circle'),
                ),
            ),
            'text_color' => array(
                'type' => 'radio-buttons',
                'heading' => __('Color'),
                'default' => 'light',
                'options' => array(
                    'light'  => array( 'title' => 'Light'),
                    'dark'  => array( 'title' => 'Dark'),
                ),
            ),
            'hover' => array(
                'type' => 'select',
                'heading' => __( 'Hover' ),
                'default' => '',
                'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/text-hover.php' ),
            ),
            'width' => array(
                'type' => 'slider',
                'heading' => __('Width'),
                'responsive' => true,
                'default' => '60',
                'unit' => '%',
                'max' => '100',
                'min' => '0',
            ),
            'scale' => array(
              'type' => 'slider',
              'heading' => __('Scale'),
              'responsive' => true,
              'unit' => '%',
              'default' => '100',
              'max' => '500',
              'min' => '0',
            ),
           'margin' => array(
              'type' => 'margins',
              'heading' => __('Margin'),
              'full_width' => true,
              'responsive' => true,
              'unit' => 'px',
              'min' => -200,
              'max' => 200,
              'step' => 1,
          ),
          'padding' => array(
                'type' => 'margins',
                'heading' => __('Padding'),
                'full_width' => true,
                'min' => 0,
                'max' => 200,
                'step' => 1,
                'responsive' => true,
          ),
           'rotate' => array(
              'type' => 'slider',
              'heading' => __('Rotate'),
              'default' => 0,
              'max' => 180,
              'min' => -180,
              'step' => 5,
            ),
          'parallax' => array(
              'type' => 'slider',
              'heading' => __('Parallax'),
              'param_name' => 'parallax',
              'default' => 0,
              'unit' => '+',
              'max' => 10,
              'min' => -10,
          ),
        ),
    ), // Layout options
    'positions' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/position.php' ),
    'text_options' => array(
        'type' => 'group',
        'heading' => __( 'Text' ),
        'options' => array(
          'text_align' => array(
              'type' => 'radio-buttons',
              'heading' => __('Align'),
              'default' => 'center',
              'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/align-radios.php' ),
            ),
           'text_depth' => array(
              'type' => 'slider',
              'heading' => __('Shadow'),
              'default' => '0',
              'unit' => '+',
              'max' => '5',
              'min' => '0',
            ),
        )
    ), // Text options
    'bg_options' => array(
        'type' => 'group',
        'heading' => __( 'Background' ),
        'options' => array(
          'bg' => array(
            'type' => 'colorpicker',
            'heading' => __('Background Color'),
            'alpha' => true,
            'format' => 'rgb',
            'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
          ),
          'radius' => array(
             'type' => 'margins',
             'heading' => __('Radius'),
             'full_width' => true,
             'responsive' => true,
             'default' => '',
             'unit' => 'px',
             'min' => 0,
             'max' => 500,
             'step' => 1,
          ),
          'depth' => array(
            'type' => 'slider',
            'heading' => __('Depth'),
            'default' => '0',
            'unit' => '+',
            'max' => '5',
            'min' => '0',
          ),
          'depth_hover' => array(
            'type' => 'slider',
            'heading' => __('Depth :hover'),
            'default' => '0',
            'unit' => '+',
            'max' => '5',
            'min' => '0',
          ),
        )
    ), // Animate
    'animatecss_options' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/animate.php' ),
    'dashed_options' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/dashed.php' ),
    'border_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/border.php' ),
    'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
  )
));
