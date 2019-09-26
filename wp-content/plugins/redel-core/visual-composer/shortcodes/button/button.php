<?php
/* ===========================================================
    Button
=========================================================== */
if ( !function_exists('evlt_button_function')) {
  function evlt_button_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'button_style'  => '',
      'button_size'  => '',
      'button_border'  => '',
      'button_text'  => '',
      'button_link'  => '',
      'open_link'  => '',
      'simple_hover'  => '',
      'class'  => '',
      // Styling
      'text_color'  => '',
      'text_hover_color'  => '',
      'bg_hover_color'  => '',
      'border_hover_color'  => '',
      'text_size'  => '',
      // Icon
      'icon_alignment'  => '',
      'select_icon'  => '',
      'icon_size'  => '',
      'icon_color'  => '',
      'icon_hover_color'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    //Button style
    if($button_style){

    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Button Text Color
    if ( $text_color ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .' .btn-text {';
      $inline_style .= ( $text_color ) ? 'color:'. $text_color .';' : '';
      $inline_style .= '}';
    }
    // Button Text Hover Color
    if ( $text_hover_color ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .':hover .btn-text, .redl-btn-'. $e_uniqid .':focus .btn-text, .redl-btn-'. $e_uniqid .':active .btn-text {';
      $inline_style .= ( $text_hover_color ) ? 'color:'. $text_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Text Size
    if ( $text_size ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .' {';
      $inline_style .= ( $text_size ) ? 'font-size:'. $text_size .';' : '';
      $inline_style .= '}';
    }
    // Button Hover Color
    if ( $bg_hover_color || $border_hover_color ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .':hover, .redl-btn-'. $e_uniqid .':focus, .redl-btn-'. $e_uniqid .':active {';
      $inline_style .= ( $bg_hover_color ) ? 'background:'. $bg_hover_color .' !important;' : '';
      $inline_style .= ( $border_hover_color ) ? 'border-color: '. $border_hover_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Icon
    if ( $icon_size || $icon_color ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .' i {';
      $inline_style .= ( $icon_size ) ? 'font-size:'. redel_check_px($icon_size) .';' : '';
      $inline_style .= ( $icon_color ) ? 'color:'. $icon_color .';' : '';
      $inline_style .= '}';
    }
    if ( $icon_hover_color ) {
      $inline_style .= '.redl-btn-'. $e_uniqid .':hover i {';
      $inline_style .= ( $icon_hover_color ) ? 'color:'. $icon_hover_color .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' redl-btn-'. $e_uniqid;

    //button border
    $button_border = $button_border ? ' redl-btn-border ' : '';

    // Styling
    $button_size = $button_size ? ' redl-'. $button_size : ' redl-btn-medium';
    $button_text = $button_text ?  $button_text  : '';
    $button_link = $button_link ? 'href="'. $button_link .'"' : '';
    $open_link = $open_link ? ' target="_blank"' : '';
    $simple_hover = $simple_hover ? '' : ' btn-hover-one';
    $icon_alignment_attr = $icon_alignment ? ' '. $icon_alignment : ' btn-icon-left';
    $select_icon = $select_icon ? '<i class="'. $select_icon .'"></i>' : '';

    if($icon_alignment === "btn-icon-left"){
      $icon_text = $select_icon . $button_text;
    }else{
      $icon_text = $button_text . $select_icon;
    }

    $output = '<a class="redl-btn '. $button_border . $button_style.' '. $custom_css . $button_size. $styled_class . $simple_hover . $icon_alignment_attr .' '. $class .'" '. $button_link . $open_link .'>'. $icon_text .'</a>';

    return $output;

  }
}
add_shortcode( 'evlt_button', 'evlt_button_function' );
