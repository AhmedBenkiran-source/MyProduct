<?php
/* ==========================================================
  Pricing Table
=========================================================== */
if ( !function_exists('evlt_pricing_table_function')) {
  function evlt_pricing_table_function( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      'package_name'  => '',
      'package_price'  => '',
      'package_ribbon'  => '',
      'custom_feature_color'  => '',
      'pricing_table_features'  => '',
      'class'  => '',
      // Style
      'text_color'  => '',
      'icon_color'  => '',
      'text_size'  => '',
      'icon_size'  => '',
      'title_color'  => '',
      'title_size'  => '',
      //package button
      'package_button_text'  => '',
      'package_button_link'  => '',
    ), $atts));

    // Group Field
    $pricing_table_features = (array) vc_param_group_parse_atts( $pricing_table_features );
    $get_each_pricing_table = array();
    foreach ( $pricing_table_features as $pricing_table_item ) {
      $each_pricing_table = $pricing_table_item;
      $each_pricing_table['feature_title'] = isset( $pricing_table_item['feature_title'] ) ? $pricing_table_item['feature_title'] : '';
      $each_pricing_table['feature_avail'] = ( isset($pricing_table_item['feature_avail']) && $pricing_table_item['feature_avail'] === "true" ) ? $pricing_table_item['feature_avail'] : 0;
      $get_each_pricing_table[] = $each_pricing_table;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $custom_feature_color_style  = '';

    if($custom_feature_color){
      $custom_feature_color_style = '.pricing-item.featured.redl-pricing-featured-'. $e_uniqid .':before{';
      $custom_feature_color_style .=  'background-color: '. $custom_feature_color .';' ;
      $custom_feature_color_style .= '}';
    }
    // add inline style
    add_inline_style( $custom_feature_color_style );

    $featured = $package_ribbon ?  "featured" : "";
    if($custom_feature_color)
      $featured .= ' '.'redl-pricing-featured-'. $e_uniqid ;
    $output = '<div class="pricing-item '.$featured.'">';
    $output .= '<h5>'.$package_name.'</h5>'; //package name
    $output .= '<h1>'.$package_price.'</h1>'; //price
    $output .= '<ul>';

    // Group Param Output
    foreach ( $get_each_pricing_table as $each_pricing_table ) {
      $output .= '<li>';
      if($each_pricing_table['feature_avail'] === "true"){
          $output .= '<img src="'. VCTS_PLUGIN_ASTS . '/images/check-icon.png" alt="Check"/>' ;
      }else{
          $output .= '<img src="'. VCTS_PLUGIN_ASTS . '/images/cancel-icon.png" alt="Check"/>';
      }
      $output .= $each_pricing_table['feature_title'] .'</li>';
    }

    $output .= '</ul>';
    if($package_button_text)
    $output .= '<div class="clearfix"><a href="'.$package_button_link.'" class="redl-btn redl-btn-two redl-btn-medium-2">'.$package_button_text.'</a></div>';
    $output .= '</div>';

    return $output;
  }
}
add_shortcode( 'evlt_pricing_table', 'evlt_pricing_table_function' );
