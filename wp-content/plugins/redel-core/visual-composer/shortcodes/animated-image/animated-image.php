<?php
/* ==========================================================
  Heading
=========================================================== */
if ( !function_exists('evlt_animated_image_function')) {
  function evlt_animated_image_function( $atts, $content = true ) {

    extract(shortcode_atts(array(
      'image_number'  => '',
      'animation_style1'  => '',
      'image1'  => '',
      'animation_style2'  => '',
      'image2'  => '',
      'class'  => '',
      // Design
      'css' => ''

    ), $atts));

    // fix unclosed/unwanted paragraph tags in $content
    $content = wpb_js_remove_wpautop($content, true);

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';
    //print_r($custom_css);
    $image_number = $image_number ? $image_number : 'single';
    if($image_number == "single"){
        $single_css = $custom_css;
        $double_css="";
    }
    if($image_number == "double"){
        $double_css = $custom_css;
        $single_css="";
    }

    //get the  images
    //image1
    if($image1){
        $image_url1 = wp_get_attachment_url( $image1 );
        $image_html1 = '<img src="'. esc_url($image_url1) .'" alt="'.esc_attr($image_url1).'">';
    }else{
        $image_html1 = '';
    }
    //image2
    if($image2){
        $image_url2 = wp_get_attachment_url( $image2 );
        $image_html2 = '<img src="'. esc_url($image_url2) .'" alt="'.esc_attr($image_url2).'">';
    }else{
        $image_html2 = '';
    }

    //animation style for image 1
    $animation_style1 = $animation_style1 ? $animation_style1 : 'slideinup';
    $animation_style2 = $animation_style2 ? $animation_style2 : 'slideinup-two';


    $output = '';
    if($image_number == "double"){
        $output = '<div class="redl-get-app '.$class. ' '.$double_css.'">';
    }

    $output .= '<div class="animateblock '.$class. ' '.$animation_style1. ' '.$single_css.'">'.$image_html1.'</div>';
    if($image_number == "double"){
       $output .= '<div class="animateblock '.$animation_style2.'">'.$image_html2.'</div>';
    }
    if($image_number == "double"){
        $output .= '</div>';
    }
    return $output;
  }
}
add_shortcode( 'evlt_animated_image', 'evlt_animated_image_function' );
