<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('redl_clients_func')) {
  function redl_clients_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'client_logos'  => '',
      'client_link'  => '',
      'class'  => ''
    ), $atts));

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Group Field
    $client_logos = (array) vc_param_group_parse_atts( $client_logos );
    $get_client_logos = array();
    foreach ( $client_logos as $client_logo ) {
      $each_logo = $client_logo;
      $each_logo['client_logo'] = isset( $client_logo['client_logo'] ) ? $client_logo['client_logo'] : '';
      $each_logo['client_link'] = isset( $client_logo['client_link'] ) ? $client_logo['client_link'] : '';
      $get_client_logos[] = $each_logo;
    }

    $output = '<div class="redl-clients"><div class="clearfix">';

    // Group Param Output
    foreach ( $get_client_logos as $each_logo ) {
      $image_url = wp_get_attachment_url( $each_logo['client_logo'] );
      if ($each_logo['client_link']) {
        $output .= '<a href="'. esc_url($each_logo['client_link']) .'" '. $open_link .' ><span><img src="'. esc_url($image_url) .'" alt=""></span></a>';
      } else {
        $output .= '<span><img src="'. esc_url($image_url) .'" alt=""></span>';
      }
    }

    $output .= '</div></div>';

    return $output;
  }
}
add_shortcode( 'redl_clients', 'redl_clients_func' );
