<?php
// [title]
function flatux_title_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    '_id' => 'title-'.rand(),
    'class' => '',
    'visibility' => '',
    'text' => 'Lorem ipsum dolor sit amet...',
    'tag_name' => 'h3',
    'sub_text' => '',
    //'style' => '',
    'size' => '100',
    'link' => '',
    'link_text' => '',
		'target'      => '_self',
    'margin' => '',
    'color' => '',
    'width' => '',
    'icon' => '',
    //Custom text
    'letter_case' => 'none',
    'text_align'      => '',
    //Animate
		'animatecss'     => '',
		'animatecss_infinite'     => '',
		'animatecss_repeat'     => '',
		'animatecss_speed'     => '',
		'animatecss_delay'     => '',
		'animatecss_duration'     => '',
    //Box Hover
    'box_hover' => '',
    //Custom tag b
    'b_height' => '',
    'b_bg_color' => '',
    'b_border_width' => '',
    'b_border_style' => '',
    'b_border_color' => '',
    'b_transform' => '',
    'b_opacity' => '',
    //Custom text
    'bg_color' => '',
    'bg_transform' => '',
    'text_transform' => '',
    'bg_text_color' => '',
    'line_height' => '',
    'text_margin' => '',
    'text_padding' => '',
    'padding' => '',
    'sub_text_full' => '',
    

  ), $atts ) );

  /* Minify CSS  */
  if($animatecss) wp_enqueue_style( 'flatux-animate');
  if($box_hover) wp_enqueue_style( 'flatux-hover');

  $classes = array('container', 'section-title-container');
  $classes_animate = array();
  $css_args_title = array();

  if ( $class ) $classes[] = $class;
  if ( $visibility ) $classes[] = $visibility;

  if($box_hover) $classes[] = 'hvr-'.$box_hover;
  if($animatecss) $classes_animate[] = 'animated '.$animatecss;
  if($animatecss_infinite) $classes_animate[] = 'infinite';

  $classes = implode(' ', $classes);
  $classes_animate   = implode( " ", $classes_animate );
  
  $css_animate = array(
    array('attribute' => '-webkit-animation-iteration-count', 'value' => intval( $animatecss_repeat )),
    array('attribute' => 'animation-iteration-count', 'value' => intval( $animatecss_repeat )),
    array('unit' => 's', 'attribute' => '-webkit-animation-delay','value' => intval( $animatecss_delay )),
    array('unit' => 's', 'attribute' => 'animation-delay', 'value' => intval( $animatecss_delay )),
    array('unit' => 's', 'attribute' => '-webkit-animation-duration', 'value' => intval( $animatecss_duration )),
    array('unit' => 's', 'attribute' => 'animation-duration', 'value' => intval( $animatecss_duration )),
  );

  $small_text = '';
  if($sub_text && $sub_text_full) {
    $small_text = '<small class="sub-title" style="display: block">'.$atts['sub_text'].'</small>';
  } elseif ($sub_text) {
    $small_text = '<small class="sub-title">'.$atts['sub_text'].'</small>';
  }

  if($icon) $icon = get_flatsome_icon($icon);
  
  if($letter_case){ $css_args_title[] = array( 'attribute' => 'text-transform', 'value' => $letter_case);  }
  if($size !== '100'){ $css_args_title[] = array( 'attribute' => 'font-size', 'value' => $size, 'unit' => '%'); }
  if($line_height){ $css_args_title[] = array( 'attribute' => 'line-height', 'value' => $line_height); }
  if($color){ $css_args_title[] = array( 'attribute' => 'color', 'value' => $color); }
  if($bg_text_color){ $css_args_title[] = array( 'attribute' => 'background', 'value' => $bg_text_color); }
  
  if($text_align){ $css_args_title[] = array( 'attribute' => 'text-align', 'value' => $text_align); }
  if($text_margin){ $css_animate[] = array( 'attribute' => 'margin', 'value' => $text_margin); }
  if($text_padding){ $css_animate[] = array( 'attribute' => 'padding', 'value' => $text_padding); }

  $link_output = '';
  
  if($link){
    $link_output = '<a href="'.$link.'" target="'.$target.'">'.$icon.$text.$small_text.'</a>';
  } else {
    $link_output = $icon.$text.$small_text;
  }

  $css_args = array(
    array( 'attribute' => 'overflow', 'value' => 'hidden'),
    array( 'attribute' => 'background', 'value' => $bg_color),
    array( 'attribute' => 'margin', 'value' => $margin),
    array( 'attribute' => 'padding', 'value' => $padding),
  );

  if($bg_transform) {
    $css_args[] = array( 'attribute' => 'transform', 'value' => 'skewX('.$bg_transform.'deg)');
    $css_args_title[] = array( 'attribute' => 'transform', 'value' => ($text_transform ? '' : 'skewX(-'.$bg_transform.'deg)'));
  }
  if($width) { $css_args[] = array( 'attribute' => 'max-width', 'value' => $width); }

  $css_animate = array(
    array( 'attribute' => 'border-bottom-width', 'value' => $b_border_width),
    array( 'attribute' => 'border-bottom-style', 'value' => $b_border_style),
    array( 'attribute' => 'border-bottom-color', 'value' => $b_border_color),
  );

  $css_b1 = array(
    array( 'attribute' => 'height', 'value' => ($b_height ? $b_height : '0 !important')),
    array( 'attribute' => 'background-color', 'value' => $b_bg_color),
    array( 'attribute' => 'opacity', 'value' => $b_opacity),
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
  );
  $css_b2 = array(
    array( 'attribute' => 'height', 'value' => ($b_height ? $b_height : '0 !important')),
    array( 'attribute' => 'background-color', 'value' => $b_bg_color),
    array( 'attribute' => 'opacity', 'value' => $b_opacity),
    array( 'attribute' => 'transform', 'value' => ($b_transform ? 'rotate(-'.$b_transform.'deg)' : '')),
  );

  if($text_align == ""){ 
    $css_b1[] = array( 'attribute' => 'display', 'value' => 'none');
    $css_b2[] = array( 'attribute' => 'display', 'value' => 'none');
  } elseif($text_align == "left"){ 
    $css_b1[] = array( 'attribute' => 'display', 'value' => 'none');
  } elseif($text_align == "right"){ 
    $css_b2[] = array( 'attribute' => 'display', 'value' => 'none');
  }

  return '<div class="'.$classes.'" '.get_shortcode_inline_css($css_args).'>
          <'. $tag_name . ' class="section-title '.$classes_animate.'" '.get_shortcode_inline_css($css_animate).'>
          <b '.get_shortcode_inline_css($css_b1).'></b>
          <span class="section-title-main" '.get_shortcode_inline_css($css_args_title).'>'.$link_output.'</span>
          <b '.get_shortcode_inline_css($css_b2).'></b></' . $tag_name .'>
          </div>';
}
add_shortcode('flatux_title', 'flatux_title_shortcode');


