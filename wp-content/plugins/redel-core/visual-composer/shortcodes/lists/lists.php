<?php
/* ==========================================================
  Lists
=========================================================== */
if ( !function_exists('evlt_list_function')) {
  function evlt_list_function( $atts, $content = NULL ) {
    $text_style=$list_style='';
    extract(shortcode_atts(array(
      'list_style'  => '',
      'number_bullets'  => '',
      'list_items'  => '',
      'class'  => '',
      // Style
      'text_color'  => '',
      'text_size'  => '',

      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Group Field
    $list_items = (array) vc_param_group_parse_atts( $list_items );
    //print_r($list_items);
    $get_each_list = array();
    foreach ( $list_items as $list_item ) {
      $each_list = $list_item;
      $each_list['select_icon'] = isset( $list_item['select_icon'] ) ? $list_item['select_icon'] : '';
      $each_list['list_text'] = isset( $list_item['list_text'] ) ? $list_item['list_text'] : '';
      $get_each_list[] = $each_list;
    }

    // Shortcode Style CSS
    $e_uniqid        = uniqid();
    $inline_style  = '';

    if ( $text_color || $text_size ) {
      $inline_style .= '.evlt-list-'. $e_uniqid .' li, .evlt-list-'. $e_uniqid .' li p, .evlt-list-'. $e_uniqid .' li a {';
      $text_style = ( $text_color ) ? 'color:'. $text_color .';' : '';
      $text_style .= ( $text_size ) ? 'font-size:'. redel_check_px($text_size) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' evlt-list-'. $e_uniqid;

    //var_dump($number_bullets);
    $list_style = $list_style ? $list_style : 'feature-info-wrap';

    $output = '<div class="'.$list_style.' ' . $custom_css .'">';

    if ($list_style === 'redl-info-page') {
        if ($number_bullets === "true")
            $output .= '<ul class="number-bullets">';
        else
            $output .= '<ul>';
    }else if ($list_style === 'overview-bullets') {
            $output .= '<ul class="overview-bullets">';
    }else{
        $output .= '<ul>';
    }

    // Group Param Output
    foreach ( $get_each_list as $each_list ) {
      if ($list_style === 'redl-info-page'){
        $output .= '<li style="'.$text_style.'"><span>'. $each_list['list_text'] .'</span></li>';
      } elseif ($list_style === 'overview-bullets' ){
        if($each_list['select_icon']){
          $output .= '<li style="'.$text_style.'"><span class="' . $each_list['select_icon'] . '"></span>' . $each_list['list_text'] . '</li>';
        }
      } elseif ($list_style === 'ul-half' ){
        if($each_list['select_icon']){
          $output .= '<li style="'.$text_style.'"><span class="' . $each_list['select_icon'] . '"></span>' . $each_list['list_text'] . '</li>';
        }
      } else {
        $output .= '<li style="'.$text_style.'">'. $each_list['list_text'] .'</li>';
      }
    }

    $output .= '</ul>';
    $output .= '</div>';

    return $output;
  }
}
add_shortcode( 'evlt_list', 'evlt_list_function' );
