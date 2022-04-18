<?php

add_ux_builder_shortcode( 'flatux_banner', array(
  'type' => 'container',
  'name' => __( 'FlatUX Banner' ),
  'category' => __( 'FlatUX' ),
  'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/ux_banner.svg', 
  'toolbar_thumbnail' => 'bg',
  'wrap' => false,
  'info' => '{{ label }}',
  'allow' => array( 'flatux_text_box', 'flatux_image' ),
  'add_buttons' => array( 'bottom-right' ),
  'addable_spots' => array( 'top', 'bottom' ),
  'priority' => 1,

  'styles' => array(
    'flatux-effect' => FLATUX_URL . '/assets/css/effect.min.css'
  ),

  // Override children data.
  'children' => array(
    'addable_spots' => array( 'center' ),
  ),

  'presets' => array(
    array(
      'name' => __( 'Blank' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/blank.svg',
      'content' => '[flatux_banner height="500px"] [flatux_text_box width="60"]<h3 class="uppercase"><strong>This is a simple banner</strong></h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>[/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Simple Center' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-center.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.17)"] [flatux_text_box width="60"]<h3 class="uppercase">Change this to anything</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Click me" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Left' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-left.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.31)"] [flatux_text_box width="40" width__sm="60" position_x="10"]<h3 class="uppercase">Change this to anything</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Click me" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Right' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-right.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.31)"] [flatux_text_box width="40" width__sm="60" position_x="90"]<h3 class="uppercase">Change this to anything</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Click me" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Buttons Left' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-buttons.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.31)"] [flatux_text_box width="40" width__sm="60" position_x="5" text_align="left"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Buttons Right' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-buttons-right.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="95" text_align="right"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Left Light' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-left-light.svg',
      'content' => '[flatux_banner height="500px" bg_color="rgb(255, 255, 255)" bg_overlay="rgba(190, 190, 190, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="5" text_align="left" text_color="dark"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" style="outline"] [/flatux_text_box][/flatux_banner]',
    ),
    array(
      'name' => __( 'Right Light' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/simple-right-light.svg',
      'content' => '[flatux_banner height="500px" bg_color="rgb(255, 255, 255)" bg_overlay="rgba(190, 190, 190, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="95" text_align="right" text_color="dark"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
     array(
      'name' => __( 'Box Left' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/box-left.svg',
      'content' => '[flatux_banner height="500px" bg_color="rgb(255, 255, 255)" bg_overlay="rgba(190, 190, 190, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="5" text_align="left" text_color="dark" padding="30px 30px 30px 30px" bg="rgb(255, 255, 255)" depth="3"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Box Right' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/box-right.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="95" text_color="dark" padding="30px 30px 30px 30px" bg="rgba(255, 255, 255, 0.86)" depth="3"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
     array(
      'name' => __( 'Dark Box Left' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/dark-box-left.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box width="40" width__sm="60" position_x="5" padding="30px 30px 30px 30px" bg="rgba(0, 0, 0, 0.86)" depth="3"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p> [button text="Primary"] [button text="Secondary" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
     array(
      'name' => __( 'Circle Right' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/circle-right.svg',
      'content' => '[flatux_banner height="500px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box style="circle" width="40" width__sm="60" position_x="90" padding="30px 30px 30px 30px" bg="rgba(0, 0, 0, 0.86)" depth="3"]<h2 class="uppercase"><strong>Main Headline</strong></h2> <h3>Smaller Headline</h3> <p>Lorem ipsum dolor sit amet, conse.</p> [button text="Secondary" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
     array(
      'name' => __( 'Huge Sale' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/huge-sale.svg',
      'content' => '[flatux_banner height="600px"] [flatux_text_box width="67"]<h3 class="alt-font">It has Finally started...</h3> [divider] <h1 class="h-large uppercase"><strong><span style="font-size: 180%;">HUGE SALE</span></strong></h1> <h1 class="uppercase">UP TO 70% OFF</strong></h1> [divider] [button text="Shop men!" color="white" style="outline" link="#"] [button text="Shop women" color="white" style="outline" link="#"] [button text="Shop all" color="white" style="outline" link="#"] [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Badge' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/badge.svg',
      'content' => '[flatux_banner height="400px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box width="100" position_y="90" line_height="xs" text_color="dark" padding="5px 30px 10px 30px" bg="rgba(255, 255, 255, 0.94)"]<h4 class="uppercase">Summer 2017</h4> <h3 class="uppercase"><strong>NEW Summer Trends</strong></h3> [button text="Shop now" style="underline"] [/flatux_text_box] [flatux_text_box style="circle" width="26" margin="0px -5px 0px 0px" position_x="100" position_y="5"] <p><span style="font-size: 250%;"><strong>SALE</strong></span></p> [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Badge Bubble' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/badge-bubble.svg',
      'content' => '[flatux_banner height="400px" bg_overlay="rgba(0, 0, 0, 0.2)"] [flatux_text_box width="80" position_y="90" text_align="left" line_height="m"]<h4 class="uppercase">Summer 2017</h4> <h2 class="uppercase"><strong>NEW Summer Trends</strong></h2> [button text="Shop now" color="white" style="outline"] [/flatux_text_box] [flatux_text_box style="circle" width="26" margin="0px -5px 0px 0px" position_x="90" position_y="10" bg="rgba(0, 0, 0, 0.46)"] <p><span style="font-size: 250%;"><strong>-50%</strong></span></p> [/flatux_text_box] [/flatux_banner]',
    ),
    array(
      'name' => __( 'Badge Simple' ),
      'thumbnail' => get_template_directory_uri() . '/inc/builder/shortcodes/thumbnails/banners/badge-simple.svg',
      'content' => '[flatux_banner height="400px" bg_overlay="rgba(0, 0, 0, 0.2)"][flatux_text_box width="80" position_y="90" line_height="m"]<h4 class="uppercase">Summer 2017</h4> <h2 class="uppercase"><strong>NEW Summer Trends</strong></h2> [button text="Shop now" color="white" style="outline"] [/flatux_text_box] [/flatux_banner]',
    ),
  ),

  'options' => array(
    'label' => array(
        'type' => 'textfield',
        'heading' => 'Admin label',
        'placeholder' => 'Enter admin label...'
    ),

    'layout_options' => array(
      'type' => 'group',
      'heading' => __( 'Layout' ),
      'options' => array(
        'height' => array(
          'type' => 'scrubfield',
          'responsive' => true,
          'heading' => __('Height'),
          'default' => '',
          'placeholder' => __('Auto'),
          'min' => 0,
          'max' => 1000,
          'step' => 1,
          'helpers' => require( get_template_directory() . '/inc/builder/shortcodes/helpers/heights.php' ),
        ),
      ),
    ),
    'slide_options' =>  require( get_template_directory() . '/inc/builder/shortcodes/commons/slide.php' ),
    'background_options' => require( FLATUX_PATH . '/inc/builder/shortcodes/commons/background.php' ),
    'bg_gradient' => array(
      'type'     => 'colorpicker',
      'heading'  => __( 'BG Gradient', 'flatsome' ),
      'default' => '',
      'format'   => 'rgb',
      'helpers'  => require( get_template_directory() . '/inc/builder/shortcodes/helpers/colors.php' ),
    ),
    'bg_gradient_to' => array(
      'conditions' => 'bg_gradient',
      'type' => 'radio-buttons',
      'heading' => 'Gradient To',
      'full_width' => true,
      'default' => 'left',
      'options' => array(
        'top'   => array( 'title' => 'Top'),
        'left'   => array( 'title' => 'Left'),
        'right'   => array( 'title' => 'Right'),
        'bottom'   => array( 'title' => 'Bottom'),
        ),
      ),
    'shape_divider_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/shape-divider.php' ),
    'border_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/border.php' ),
    'link_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/links.php' ),
    'video_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/video.php' ),
    'advanced_options' => require( get_template_directory() . '/inc/builder/shortcodes/commons/advanced.php'),
    'sticky' => array(
      'type' => 'radio-buttons',
      'heading' => 'Sticky',
      'default' => '',
      'options' => array(
          'true'   => array( 'title' => 'On'),
          ''  => array( 'title' => 'Off'),
        ),
      ),
    ),
) );