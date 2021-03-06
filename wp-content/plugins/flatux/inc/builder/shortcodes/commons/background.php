<?php

return array(
      'type' => 'group',
      'heading' => __( 'Background' ),
      'options' => array(
        'bg' => array(
          'type' => 'image',
          'heading' => __( 'Image' ),
          'thumb_size' => 'bg_size',
          'bg_position' => 'bg_pos',
        ),
        'bg_size'=> array(
          'type' => 'select',
          'heading' => 'Size',
          'default' => 'large',
          'conditions' => 'bg',
          'options' => array(
            'original' => 'Original',
            'large' => 'Large',
            'medium' => 'Medium',
            'thumbnail' => 'Thumbnail',
          )
        ),
        'bg_color' => array(
          'type' => 'colorpicker',
          'heading' => __('Color'),
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
        ),
        'bg_overlay' => array(
          'type' => 'colorpicker',
          'heading' => __('Overlay'),
          'responsive' => true,
          'alpha' => true,
          'format' => 'rgb',
          'position' => 'bottom right',
          'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors-overlay.php' ),
        ),
        'bg_pos' => array(
          'conditions' => 'bg',
          'type' => 'textfield',
          'heading' => __('Position'),
        ),
        'hover' => array(
          'conditions' => 'bg',
          'type' => 'select',
          'heading' => 'Hover',
          'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
        ),
        'hover_alt' => array(
          'conditions' => 'hover',
          'type' => 'select',
          'heading' => 'Hover Alt',
          'options' => require( get_template_directory() . '/inc/builder/shortcodes/values/image-hover.php' ),
        ),
        'parallax' => array(
            'conditions' => 'bg',
            'type' => 'slider',
            'heading' => 'Parallax',
            'unit' => '+',
            'default' => 0,
            'max' => 10,
            'min' => 0,
        ),
       'effect' => array(
            'type' => 'select',
            'heading' => 'FlatUX Effects',
            'options' => array(
              '' => 'No effect',
              'bubbles bubbles-circle' => 'Bubbles Circle',
              'bubbles bubbles-round' => 'Bubbles Round',
              'bubbles bubbles-square' => 'Bubbles Square',
              'cube cube-circle' => 'Cube Circle',
              'cube cube-square' => 'Cube Square',
              'random' => 'Random',
              'waves waves-one' => 'One Waves',
              'waves waves-two' => 'Two Waves',
              'waves waves-three' => 'Three Waves',
              'sliding' => 'Sliding',
            ),
        ),
    ),
);