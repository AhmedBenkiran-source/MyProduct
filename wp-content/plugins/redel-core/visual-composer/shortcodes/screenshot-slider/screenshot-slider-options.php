<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'screenshot_slider_vc_map' );
if ( ! function_exists( 'screenshot_slider_vc_map' ) ) {
  function screenshot_slider_vc_map() {
    vc_map( array(
    "name" => __( "Screenshot Slider", 'redel-core'),
    "base" => "evlt_screenshot_slider",
    "description" => __( "Screenshot Slider", 'redel-core'),
    "icon" => "fa fa-comments color-green",
    "category" => EvaluateLib::evlt_cat_name(),
    "params" => array(

    //images for slider
      array(
        "type"      => 'attach_images',
        "heading"   => __('Select Screenshot Images', 'redel-core'),
        "param_name" => "screenshot_images",
        "value"      => "",
        "description" => __( "Select Images from slider", 'redel-core'),
      ),
      EvaluateLib::vt_class_option(),

      // Carousel
      EvaluateLib::vt_notice_field(__( "Basic Options", 'redel-core' ),'bsic_opt','cs-warning', 'Carousel'), // Notice
      EvaluateLib::vt_carousel_loop(), // Loop
      EvaluateLib::vt_carousel_items(), // Items
      EvaluateLib::vt_carousel_margin(), // Margin
      EvaluateLib::vt_carousel_dots(), // Dots
      EvaluateLib::vt_carousel_nav(), // Nav
      EvaluateLib::vt_notice_field(__( "Auto Play & Interaction", 'redel-core' ),'apyi_opt','cs-warning', 'Carousel'), // Notice
      EvaluateLib::vt_carousel_autoplay_timeout(), // Autoplay Timeout
      EvaluateLib::vt_carousel_autoplay(), // Autoplay
      EvaluateLib::vt_carousel_animateout(), // Animate Out
      EvaluateLib::vt_carousel_mousedrag(), // Mouse Drag
      EvaluateLib::vt_notice_field(__( "Width & Height", 'redel-core' ),'wah_opt','cs-warning', 'Carousel'), // Notice
      EvaluateLib::vt_carousel_autowidth(), // Auto Width
      EvaluateLib::vt_carousel_autoheight(), // Auto Height
      EvaluateLib::vt_notice_field('Responsive Options','res_opt','cs-warning', 'Carousel'), // Notice
      EvaluateLib::vt_carousel_tablet(), // Tablet
      EvaluateLib::vt_carousel_mobile(), // Mobile
      EvaluateLib::vt_carousel_small_mobile(), // Small Mobile
      ), // Params
    ) );
  }
}