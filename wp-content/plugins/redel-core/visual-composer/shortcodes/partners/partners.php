<?php
/* ==========================================================
  Partner
=========================================================== */
if ( !function_exists('evlt_partners_function')) {
  function evlt_partners_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'open_link'  => '',
      'partner_logo'  => '',
      'partner_logo_link'  => '',
      'partner_title'  => '',
      'partner_profession'  => '',
      'class'  => '',
    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Link Target
    $open_link = $open_link ? 'target="_blank"' : '';

    // Partner Logo
    $image_url = wp_get_attachment_url( $partner_logo );
    if ($partner_logo_link) {
      $partner_logo = $partner_logo ? '<a href="'. $partner_logo_link .'" class="company-logo" '. $open_link .'><img src="'. $image_url .'" alt=""></a>' : '';
    } else {
      $partner_logo = $partner_logo ? '<span class="company-logo"><img src="'. $image_url .'" alt=""></span>' : '';
    }

    // Link and Title
    if ( function_exists( 'vc_parse_multi_attribute' ) ) {
      $parse_args = vc_parse_multi_attribute( $partner_title );
      $url        = ( isset( $parse_args['url'] ) ) ? $parse_args['url'] : '';
      $title      = ( isset( $parse_args['title'] ) ) ? $parse_args['title'] : '';
      $target     = ( isset( $parse_args['target'] ) ) ? trim( $parse_args['target'] ) : '_self';
    }
    if ($url) {
      $partner_title = '<a href="'. $url .'" class="company-name" target="'. $target .'">'. $title .'</a>';
    } else {
      $partner_title = '<span class="company-name">'. $title .'</span>';
    }

    // Profession
    $partner_profession = $partner_profession ? '<span class="company-pro">'. $partner_profession .'</span>' : '';

    // Output
    return '<div class="evlt-partners rounded-three '. $class .'">'. $partner_logo . $partner_title . $partner_profession . $content .'</div>';

  }
}
add_shortcode( 'evlt_partners', 'evlt_partners_function' );
