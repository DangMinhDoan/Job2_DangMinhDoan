<?php

// [flatux_divider]
function flatux_divider_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'id' => 'divider-'.rand(),
    'line_style' => '',
    'width' => '',
    'height' => '',
    'margin' => '',
    'align' => '',
    'color' => '',
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
  ), $atts ) );

$align_end ='';
$align_start = '';


// Fallback
if($width == 'full') $width = '100%';
//$css_args
$css_dashed = array(
  array( 'attribute' => 'margin-top', 'value' => $margin),
  array( 'attribute' => 'margin-bottom', 'value' => $margin),
  array( 'attribute' => 'max-width', 'value' => $width ),
  array( 'attribute' => 'height', 'value' => $height ),
  array( 'attribute' => 'background-color', 'value' => $color ),
);
$color_gradient = 'transparent';
if($dashed_color_gradient) {
  $color_gradient = $dashed_color_gradient; 
}
if($dashed_width > 0){
  $gradient_1 = round($dashed_length * (100 - $dashed_fade)) / 100;
  $gradient_2 = round($dashed_spacing * (100 - $dashed_fade)) / 100;
  $gradient_3 = ($dashed_length + $dashed_spacing);
  $dashed_top = ($dashed_slanting + ($dashed_diraction ? 270 : 90)).'deg, '.$dashed_color.', '.$dashed_color.' '.$gradient_1.'px, '.$color_gradient.' '.$dashed_length.'px, '.$color_gradient.' '.$gradient_2.'px, '.$dashed_color.' '.$gradient_3.'px';
 $css_dashed[] = array( 'attribute' => 'background-image', 'value' => 'repeating-linear-gradient(transparent, transparent),
    repeating-linear-gradient('.($dashed_top).')');
  $css_dashed[] = array( 'attribute' => 'background-position', 'value' => '0 0, 0 0, 100% 0, 0 100%' );
  $css_dashed[] = array( 'attribute' => 'background-repeat', 'value' => 'no-repeat');
  $css_dashed[] = array( 'attribute' => 'padding-top', 'value' => $dashed_width.'px');
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

if($align === 'center'){
  $align_start ='<div class="text-center">';
  $align_end = '</div>';
}
if($align === 'right'){
  $align_start ='<div class="text-right">';
  $align_end = '</div>';
}

if($dashed_animation > 0){ ?>
  <style>
    @keyframes <?php echo $id; ?> {
      from { background-position: 0 0, -<?php echo $dashed_length_px; ?>px 0, 100% -<?php echo $dashed_length_px; ?>px, 0 100%; }
      to { background-position: 0 -<?php echo $dashed_length_px; ?>px, 0 0, 100% 0, -<?php echo $dashed_length_px; ?>px 100%; }
    }
  </style>
  <?php }

return $align_start.'<div id="'.$id.'" class="is-divider divider clearfix" '.get_shortcode_inline_css( $css_dashed ).'></div>'.$align_end;

}
add_shortcode('flatux_divider', 'flatux_divider_shortcode');