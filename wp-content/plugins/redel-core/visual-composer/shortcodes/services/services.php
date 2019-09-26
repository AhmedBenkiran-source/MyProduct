<?php
/* ==========================================================
  Services
=========================================================== */
if ( !function_exists('evlt_services_function')) {
  function evlt_services_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'service_style'  => '',
      'service_icon'  => '',
      'service_title'  => '',
      'service_content'  => '',
      'service_alignment'  => '',
      'class'  => '',

      // Style
      'title_color'  => '',
      'icon_color'  => '',
      'title_size'  => '',
      'title_top_space'  => '',
      'title_bottom_space'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $service_content = wpb_js_remove_wpautop($service_content, true);

    // Style
    $title_color = $title_color ? 'color:' . $title_color . ';' : '';
    $icon_color = $icon_color ? 'color:' . $icon_color . ';' : '';
    $title_size = $title_size ? 'font-size:' . $title_size . ';' : '';
    $title_top_space = $title_top_space ? 'margin-top:' . $title_top_space . ';' : '';
    $title_bottom_space = $title_bottom_space ? 'margin-bottom:' . $title_bottom_space . ';' : '';

    // Service Icon
    $service_icon = $service_icon ? '<span class="'. $service_icon .'" style="' . $icon_color . '"></span>' : '';

    //service alignment
    $service_alignment =  $service_alignment ? 'text-align:'.$service_alignment .';' : '';

    // Service Title
    $service_title = '<div class="redl-service-name" style="'. $title_color . $title_size . $title_top_space . $title_bottom_space .'">'. $service_title .'</div>';

    //service style
    $service_style =  $service_style ? $service_style : '';

    $output = '';
    $output .= '<div class="redl-service '.$service_style.'" style="'.$service_alignment.'">'.$service_icon;
    if ($service_style === 'style2') {
        $output .= '<div class="redl-service-info">';
    }
    $output .= $service_title.$service_content;

    if ($service_style === 'style2' ) {
        $output .= '</div>';
    }
    $output .= '</div>';
    return $output;
  }
}
add_shortcode( 'evlt_services', 'evlt_services_function' );
