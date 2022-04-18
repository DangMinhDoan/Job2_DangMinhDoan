<?php
/**
 * [flatux_button]
 */
function flatux_button_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'text'        => '',
		'style'       => '',
		'color'       => '',
		'size'        => '',
		'hover'     => '',
		'link'        => '',
		'target'      => '_self',
		'rel'         => '',
		'border'      => '',
		'expand'      => '',
		'tooltip'     => '',
		'padding'     => '',
		'radius'      => '',
		'letter_case' => '',
		'mobile_icon' => '',
		'icon'        => '',
		'icon_pos'    => '',
		'icon_reveal' => '',
		'depth'       => '',
		'depth_hover' => '',
		'class'       => '',
		'visibility'  => '',
		'id'          => '',
		'block'       => '',
		//Animate
		'animatecss'     => '',
		'animatecss_infinite'     => '',
		'animatecss_repeat'     => '',
		'animatecss_speed'     => '',
		'animatecss_delay'     => '',
		'animatecss_duration'     => '',
		//Box Hover
		'box_hover' => '',
		'box_cover'     => '',
		'box_bg'     => '',
		'box_border'     => '',
		'text_color'       => '',
		'bg_color'       => '',
		'bg_gradient'       => '',
		'border_style'       => '',
		'border_color'       => '',
		'border_width'       => '',
		'outline_color'       => '',
		'outline_width'       => '',
		'letter_spacing' => '',
	), $atts ) );

	/* Minify CSS  */
	if($animatecss) wp_enqueue_style( 'flatux-animate');
	if($box_hover) wp_enqueue_style( 'flatux-hover');

	$id      = 'button-' . wp_rand();

	// Old button Fallback.
	if ( strpos( $style, 'primary' ) !== false ) {
		$color = 'primary';
	} elseif ( strpos( $style, 'secondary' ) !== false ) {
		$color = 'secondary';
	} elseif ( strpos( $style, 'white' ) !== false ) {
		$color = 'white';
	} elseif ( strpos( $style, 'success' ) !== false ) {
		$color = 'success';
	} elseif ( strpos( $style, 'alert' ) !== false ) {
		$color = 'alert';
	}

	if ( strpos( $style, 'alt-button' ) !== false ) {
		$style = 'outline';
	}

	$attributes = array();
	$icon_left  = $icon && $icon_pos == 'left' ? get_flatsome_icon( $icon ) : '';
	$icon_right = $icon && $icon_pos !== 'left' ? get_flatsome_icon( $icon ) : '';

	// Add Button Classes.
	$classes   = array();
	$classes[] = 'button';

	if($box_hover) $classes[] = 'hvr-'.$box_hover;
	if($animatecss) $classes[] = 'animated '.$animatecss;
	if($animatecss_infinite) $classes[] = 'infinite';

	$css_animate = array(
		array('attribute' => '-webkit-animation-iteration-count', 'value' => intval( $animatecss_repeat )),
		array('attribute' => 'animation-iteration-count', 'value' => intval( $animatecss_repeat )),
		array('unit' => 's', 'attribute' => '-webkit-animation-delay','value' => intval( $animatecss_delay )),
		array('unit' => 's', 'attribute' => 'animation-delay', 'value' => intval( $animatecss_delay )),
		array('unit' => 's', 'attribute' => '-webkit-animation-duration', 'value' => intval( $animatecss_duration )),
		array('unit' => 's', 'attribute' => 'animation-duration', 'value' => intval( $animatecss_duration )),
	);

	if ( $color ) { $classes[] = $color; }
	if ( $style ) {	$classes[] = 'is-' . $style;}
	if ( $size ) { $classes[] = 'is-' . $size; }
	if ( $depth ) {	$classes[] = 'box-shadow-' . $depth; }
	if ( $depth_hover ) { $classes[] = 'box-shadow-' . $depth_hover . '-hover';	}
	if ( $letter_case ) { $classes[] = $letter_case; }
	if ( $icon_reveal ) { $classes[] = 'reveal-icon'; }
	if ( $expand ) { $classes[] = 'expand';	}
	if ( $class ) {	$classes[] = $class; }
	if ( $visibility ) { $classes[] = $visibility; }
	if ( $bg_gradient ) { $classes[] = $id; }

	if ( $target == '_blank' ) {
		$attributes['rel'][] = 'noopener noreferrer';
	}
	if ( $rel ) {
		$attributes['rel'][] = $rel;
	}
	if ( $link ) {
		// Smart links.
		$link               = flatsome_smart_links( $link );
		$attributes['href'] = $link;
		if ( $target ) {
			$attributes['target'] = $target;
		}
	}
	if ( $tooltip ) {
		$classes[]           = 'has-tooltip';
		$attributes['title'] = $tooltip;
	}

	$styles = get_shortcode_inline_css( array(
		array('unit' => 'px', 'attribute' => 'border-radius', 'value' => intval( $radius )),
		array('unit' => 'px', 'attribute' => 'border-width', 'value' => intval( $border )),
		array('unit' => 'px', 'attribute' => 'letter-spacing', 'value' => intval( $letter_spacing )),
		array('attribute' => 'padding', 'value' => $padding),
		array('attribute' => 'color', 'value' => $text_color),
		array('attribute' => 'background-color', 'value' => $bg_color),
		array('attribute' => 'background-image', 'value' => ($bg_gradient ? 'linear-gradient(to right, '.$bg_color.' 0%, '.$bg_gradient.'  51%, '.$bg_color.'  100%); transition: 0.5s; background-size: 200% auto' : '')),
		array('attribute' => 'border', 'value' => ($border_style ? $border_width.' '.$border_style.' '.$border_color : '')),
		array('attribute' => 'outline', 'value' => ($outline_width ? $outline_width.' solid '.$outline_color : '')),
	) );

	$attributes['class'] = $classes;
	$attributes          = flatsome_html_atts( $attributes );

	ob_start();

	?>
	<?php if($box_hover) echo '<div id="'.esc_attr( $id ).'">'; ?>
	<a <?php echo $attributes; ?> <?php echo $styles; ?> <?php echo get_shortcode_inline_css($css_animate) ?>>
		<?php echo $icon_left; ?>
			<span><?php echo $text; ?></span>
		<?php echo $icon_right; ?>
	</a>
	<?php if($box_hover) echo '</div>'; ?>
	<?php echo ux_builder_element_style_tag(
				$id,
				array(
					'box_cover'  => array(
						'selector' => '.button-cover::before',
						'property' => 'background',
					),
					'box_bg'  => array(
						'selector' => '.button-background::before',
						'property' => 'background',
					),
					'box_border'  => array(
						'selector' => '.button-border::before',
						'property' => 'border-color',
					),
				),
				$atts
			);
		?>
	<?php if($bg_gradient){ ?>
  <style>
    <?php echo '.'.$id.':hover'; ?> {
		background-position: right center;
    }
  </style>
  <?php }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}

add_shortcode( 'flatux_button', 'flatux_button_shortcode' );

