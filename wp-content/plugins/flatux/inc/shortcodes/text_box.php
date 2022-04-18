<?php

function flatsome_flatux_text_box( $atts, $content = null ){

  $atts = shortcode_atts( array(
    'id' => 'text-box-'.rand(),
    'style' => '',
    'res_text' => 'true',
    'hover' => '',
    'position_x' => '50',
    'position_x__sm' => '',
    'position_x__md' => '',
    'position_y' => '50',
    'position_y__sm' => '',
    'position_y__md' => '',
    'text_color' => 'light',
    'bg' => '',
    'width' => '60',
    'width__sm' => '',
    'width__md' => '',
    'height' => '',
    'height__sm' => '',
    'height__md' => '',
    'scale' => '100',
    'scale__sm' => '',
    'scale__md' => '',
    'text_align' => 'center',
    'parallax' => '',
    'padding' => '',
    'padding__sm' => '',
    'padding__md' => '',
    'margin' => '',
    'margin__sm' => '',
    'margin__md' => '',
    'radius' => '',
    'rotate' => '',
    'class' => '',
    'visibility' => '',
    'border_radius' => '',
    // Borders
    'border' => '',
    'border_color' => '',
    'border_style' => '',
    'border_pos' => '',
    // Depth
    'depth' => '',
    'depth_hover' => '',
    // Text depth
    'text_depth' => '',
    // Border
    'border' => '',
    'border_color' => '',
    'border_margin' => '',
    'border_radius' => '',
    'border_style' => '',
    'border_hover' => '',
    //Animate CSS
	'animatecss'     => '',
	'animatecss_infinite'     => '',
	'animatecss_repeat'     => '',
	'animatecss_speed'     => '',
	'animatecss_delay'     => '',
	'animatecss_duration'     => '',
    //Border Gradient
    'dashed_width' => '0',
    'dashed_color' => '',
    'dashed_color_gradient' => '',
    'dashed_spacing' => '2',
    'dashed_length' => '1',
    'dashed_slanting' => '-60',
    'dashed_fade' => '1',
    'dashed_diraction' => '',
    'dashed_animation' => '',
    'dashed_radius' => '',
    'dashed_visibility' => '',
  ), $atts );

  extract( $atts );
  
    ob_start();

    /* Animate CSS  */
    if($animatecss) wp_enqueue_style( 'flatsome-animate');

    $classes[] = 'text-box banner-layer';
    $classes_text = array('text-inner');

    if($style) $classes[] = 'text-box-'.$style;
    if($class) $classes[] = $class;
    if($visibility) $classes[] = $visibility;

    // Set positions
    $classes[] = flatsome_position_classes( 'x', $position_x, $position_x__sm, $position_x__md );
    $classes[] = flatsome_position_classes( 'y', $position_y, $position_y__sm, $position_y__md );

    $classes_inner = array();
    $css_dashed = array();

    if($depth) $classes_inner[] = 'box-shadow-'.$depth;
    if($depth_hover) $classes_inner[] = 'box-shadow-'.$depth_hover.'-hover';
    if($text_color == 'light') {$classes_inner[] = 'dark';}
    if($text_depth) {$classes_inner[] = "text-shadow-".$text_depth;}

    if($text_align) {$classes_text[] = "text-".$text_align;}

    if($parallax) $parallax = 'data-parallax="'.$parallax.'" data-parallax-fade="true"';

    /* Responive text */
    if($res_text) $classes[] = 'res-text';
    
    $classes_animate   = array();

    if ( $animatecss ) { $classes_animate[] = 'animated '.$animatecss; }
    if ( $animatecss_infinite ) { $classes_animate[] = 'infinite'; }
    if ( $animatecss_speed ) { $classes_animate[] = $animatecss_speed; }

    $css_animate = array(
      array('attribute' => '-webkit-animation-iteration-count', 'value' => intval( $animatecss_repeat )),
      array('attribute' => 'animation-iteration-count', 'value' => intval( $animatecss_repeat )),
      array('unit' => 's', 'attribute' => '-webkit-animation-delay','value' => intval( $animatecss_delay )),
      array('unit' => 's', 'attribute' => 'animation-delay', 'value' => intval( $animatecss_delay )),
      array('unit' => 's', 'attribute' => '-webkit-animation-duration', 'value' => intval( $animatecss_duration )),
      array('unit' => 's', 'attribute' => 'animation-duration', 'value' => intval( $animatecss_duration )),
    );

    $color_gradient = 'transparent';
    if($dashed_color_gradient) {
      $color_gradient = $dashed_color_gradient; 
    }
    if($dashed_width > 0){
      $gradient_1 = round($dashed_length * (100 - $dashed_fade)) / 100;
      $gradient_2 = round($dashed_spacing * (100 - $dashed_fade)) / 100;
      $gradient_3 = ($dashed_length + $dashed_spacing);
      $dashed_left = ($dashed_slanting + ($dashed_diraction ? 180 : 0)).'deg, '.$dashed_color.', '.$dashed_color.' '.$gradient_1.'px, '.$color_gradient.' '.$dashed_length.'px, '.$color_gradient.' '.$gradient_2.'px, '.$dashed_color.' '.$gradient_3.'px';
      $dashed_right = ($dashed_slanting + ($dashed_diraction ? 0 : 180)).'deg, '.$dashed_color.', '.$dashed_color.' '.$gradient_1.'px, '.$color_gradient.' '.$dashed_length.'px, '.$color_gradient.' '.$gradient_2.'px, '.$dashed_color.' '.$gradient_3.'px';
      $dashed_top = ($dashed_slanting + ($dashed_diraction ? 270 : 90)).'deg, '.$dashed_color.', '.$dashed_color.' '.$gradient_1.'px, '.$color_gradient.' '.$dashed_length.'px, '.$color_gradient.' '.$gradient_2.'px, '.$dashed_color.' '.$gradient_3.'px';
      $dashed_bottom = ($dashed_slanting + ($dashed_diraction ? 90 : 270)).'deg, '.$dashed_color.', '.$dashed_color.' '.$gradient_1.'px, '.$color_gradient.' '.$dashed_length.'px, '.$color_gradient.' '.$gradient_2.'px, '.$dashed_color.' '.$gradient_3.'px';
      if ( ! is_array( $dashed_visibility ) ) {
        $dashed_visibility = explode( ',', $dashed_visibility );
      }
      foreach ( $dashed_visibility as $key => $hidden ) {
        if($hidden == "top") {
          $dashed_top = 'transparent, transparent';
          $css_dashed[] = array( 'attribute' => 'padding-top', 'value' => '0 !important');
        }
        if($hidden == "left") {
          $dashed_left = 'transparent, transparent';
          $css_dashed[] = array( 'attribute' => 'padding-left', 'value' => '0 !important');
        }
        if($hidden == "right") {
          $dashed_right = 'transparent, transparent';
          $css_dashed[] = array( 'attribute' => 'padding-right', 'value' => '0 !important');
        }
        
        if($hidden == "bottom") {
          $dashed_bottom = 'transparent, transparent';
          $css_dashed[] = array( 'attribute' => 'padding-bottom', 'value' => '0 !important');
        }
      }
      $css_dashed[] = array( 'attribute' => 'background-image', 'value' => 'repeating-linear-gradient('.($dashed_left).'),
        repeating-linear-gradient('.($dashed_top).'),
        repeating-linear-gradient('.($dashed_right).'),
        repeating-linear-gradient('.($dashed_bottom).')');
      $css_dashed[] = array( 'attribute' => 'background-position', 'value' => '0 0, 0 0, 100% 0, 0 100%' );
      $css_dashed[] = array( 'attribute' => 'background-repeat', 'value' => 'no-repeat');
      $css_dashed[] = array( 'attribute' => 'padding', 'value' => $dashed_width.'px');
    }
    if($dashed_animation > 0){
      $dashed_length_px = round(($dashed_length + $dashed_spacing) / sin((90 - abs($dashed_slanting)) * M_PI / 180) * 100) / 100;
      $dashed_length_v = ($dashed_animation > 0) ? 'calc(100% + '.$dashed_length_px.'px)' : '100%';
      $dashed_speed = round((1.1 - $dashed_animation) * 10) / 10;
      $css_dashed[] = array( 'attribute' => 'background-size', 'value' => $dashed_width.'px '.$dashed_length_v.', '.$dashed_length_v.' '.$dashed_width.'px, '.$dashed_width.'px '.$dashed_length_v.' , '.$dashed_length_v.' '.$dashed_width.'px');
      $css_dashed[] = array( 'attribute' => 'animation', 'value' => $id.' '.$dashed_speed.'s infinite linear '.($dashed_diraction ? ' reverse' : ''));
    }
    if($dashed_radius){
      $css_dashed[] = array( 'attribute' => 'border-radius', 'value' => $dashed_radius.'px');
    }
    $classes_text =  implode(" ", $classes_text);
    $classes_inner =  implode(" ", $classes_inner);
    $classes =  implode(" ", $classes);
	  $classes_animate   = implode( " ", $classes_animate );
 ?>
   <div id="<?php echo $id; ?>" class="<?php echo $classes; ?>" <?php echo get_shortcode_inline_css( $css_dashed ); ?>>
       <?php if($parallax) echo '<div '.$parallax.'>'; ?>
       <?php if($hover) echo '<div class="hover-'.$hover.'">'; ?>
       <?php if($animatecss) echo '<div class="'.$classes_animate.'" '.get_shortcode_inline_css( $css_animate ).'>'; ?>
           <div class="text-box-content text <?php echo $classes_inner; ?>">
              <?php require( get_template_directory() . '/inc/shortcodes/commons/border.php' ) ;?>
              <div class="<?php echo $classes_text; ?>">
                  <?php echo do_shortcode( $content ); ?>
              </div>
           </div>
       <?php if($animatecss) echo '</div>'; ?>
       <?php if($parallax) echo '</div>'; ?>
       <?php if($hover) echo '</div>'; ?>
       <?php
          $args = array(
            'margin' => array(
              'selector' => '',
              'property' => 'margin',
            ),
            'bg' => array(
              'selector' => '.text-box-content',
              'property' => 'background-color',
            ),
            'padding' => array(
              'selector' => '.text-inner',
              'property' => 'padding',
            ),
            'radius' => array(
              'selector' => '.text-box-content',
              'property' => 'border-radius',
            ),
            'width' => array(
              'selector' => '',
              'property' => 'width',
              'unit' => '%',
            ),
            'height' => array(
              'selector' => '',
              'property' => 'height',
              'unit' => '%',
            ),
            'scale' => array(
              'selector' => '.text-box-content',
              'property' => 'font-size',
              'unit' => '%',
            ),
            'rotate' => array(
              'selector' => '.text-box-content',
              'property' => 'rotate',
              'unit' => 'deg',
            ),
          );
          echo ux_builder_element_style_tag( $id, $args, $atts);
    
          if($dashed_animation > 0){ ?>
            <style>
              @keyframes <?php echo $id; ?> {
                from { background-position: 0 0, -<?php echo $dashed_length_px; ?>px 0, 100% -<?php echo $dashed_length_px; ?>px, 0 100%; }
                to { background-position: 0 -<?php echo $dashed_length_px; ?>px, 0 0, 100% 0, -<?php echo $dashed_length_px; ?>px 100%; }
              }
            </style>
            <?php } ?>
    </div>
 <?php
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
add_shortcode('flatux_text_box', 'flatsome_flatux_text_box');
