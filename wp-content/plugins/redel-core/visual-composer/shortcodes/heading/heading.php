<?php
/* ==========================================================
  Heading
=========================================================== */
if ( !function_exists('evlt_heading_function')) {
  function evlt_heading_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'main_heading_text'  => '',
      'main_heading_alignment'  => '',
      'sub_heading_text'  => '',
      'sub_heading_alignment'  => '',
      'sub_heading_padding_bottom'  => '',
      'main_heading_padding_bottom'  => '',
      'class'  => '',

      // Style
      'main_heading_font_size'  => '',
      'main_heading_color'  => '',
      'main_heading_css'  => '',
      'sub_heading_font_size'  => '',
      'sub_heading_color'  => '',
      'sub_heading_css'  => '',
      // Design
      'css' => ''
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    $e_uniqid        = uniqid();
    $inline_style  = '';

    // Style
    $main_heading_style = '';
    $main_heading_style .= '.redl-heading-'. $e_uniqid .' {';
    $main_heading_style .= $main_heading_color ? 'color:' . $main_heading_color . ' !important;' : '';
    $main_heading_style .= $main_heading_font_size ? 'font-size:' . $main_heading_font_size . ' !important;' : '';
    $main_heading_style .= $main_heading_alignment ? 'text-align:' . $main_heading_alignment . ' !important;' : 'text-align:left;';
    $main_heading_style .= $main_heading_padding_bottom ? 'padding-bottom:' . redel_check_px($main_heading_padding_bottom) . ' !important;' : '';
    $main_heading_style .= $main_heading_css ? ' ' . $main_heading_css : '';
    $main_heading_style .= '}';

    $sub_heading_style = '';
    $sub_heading_style .= '.redl-subheading-'. $e_uniqid .' {';
    $sub_heading_style .= $sub_heading_color ? 'color:' . $sub_heading_color . ' !important;' : '';
    $sub_heading_style .= $sub_heading_font_size ? 'font-size:' . $sub_heading_font_size . ' !important;' : '';
    $sub_heading_style .= $sub_heading_alignment ? 'text-align:' . $sub_heading_alignment . ' !important;' : 'text-align:left;';
    $sub_heading_style .= $sub_heading_padding_bottom ? 'padding-bottom:' . $sub_heading_padding_bottom . ' !important;' : '';
    $sub_heading_style .= $sub_heading_css ? ' ' . $sub_heading_css : '';
    $sub_heading_style .= '}';

    // add inline style
    add_inline_style( $main_heading_style );
    add_inline_style( $sub_heading_style );
    $heading_styled_class  = ' redl-heading-'. $e_uniqid;
    $subheading_styled_class  = ' redl-subheading-'. $e_uniqid;

    $output = '';
    $output .= '<div class="section-heading-wrap '.$class.' '.$custom_css.'">';
    $output .= '<div class="section-heading '.$heading_styled_class.'" >'.$main_heading_text.'</div>';
    if ($sub_heading_text) {
      $output .= '<div class="section-sub-heading '.$subheading_styled_class.'" >'.$sub_heading_text.'</div>';
    }
    $output .= '</div>';


    return $output;
  }
}
add_shortcode( 'evlt_heading', 'evlt_heading_function' );
