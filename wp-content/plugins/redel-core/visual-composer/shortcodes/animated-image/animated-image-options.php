<?php
/**
 * Animated Image - Shortcode Options
 */
add_action( 'init', 'evlt_animated_image_vc_map' );
if ( ! function_exists( 'evlt_animated_image_vc_map' ) ) {
  function evlt_animated_image_vc_map() {
    vc_map( array(
      "name" => __( "Animated Image", 'redel-core'),
      "base" => "evlt_animated_image",
      "description" => __( "Animated image shortcodes", 'redel-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Single image', 'redel-core' ) => 'single',
                __( 'Double image', 'redel-core' ) => 'double',
              ),
              'heading' => __( 'Select Single or Double Image? ','redel-core' ),
              'param_name' => 'image_number',
              'description' => __( 'Select single or double image.', 'redel-core' ),
              'admin_label' => true,
            ),
            array(
              'type' => 'dropdown',
              'value' => array(
                __( 'Slide In Up', 'redel-core' ) => 'slideinup',
                __( 'Slide In Up Two', 'redel-core' ) => 'slideinup-two',
                __( 'Slide In Bottom', 'redel-core' ) => 'slideinbottom',
                __( 'Slide In Left', 'redel-core' ) => 'slideinleft',
                __( 'Slide In Right', 'redel-core' ) => 'slideinright',
              ),
              'heading' => __( 'Select Animation Style For Image One','redel-core' ),
              'param_name' => 'animation_style1',
              'description' => __( 'Select animation style for the image one', 'redel-core' ),
            ),
            array(
              "type"      => 'attach_image',
              "heading"   => __('Select Image', 'redel-core'),
              "param_name" => "image1",
              "value"      => "",
              "description" => __( "Select image one", 'redel-core'),
            ),
            array(
              'type' => 'dropdown',
              'value' => array(
                 __( 'Slide In Up', 'redel-core' ) => 'slideinup',
                __( 'Slide In Up Two', 'redel-core' ) => 'slideinup-two',
                __( 'Slide In Bottom', 'redel-core' ) => 'slideinbottom',
                __( 'Slide In Left', 'redel-core' ) => 'slideinleft',
                __( 'Slide In Right', 'redel-core' ) => 'slideinright',
              ),
              'heading' => __( 'Select Animation Style For Image Two','redel-core' ),
              'param_name' => 'animation_style2',
              'description' => __( 'Select animation style for the image two', 'redel-core' ),
              'dependency' => array(
                'element' => 'image_number',
                'value' => 'double',
              ),
            ),
            array(
              "type"      => 'attach_image',
              "heading"   => __('Select Image', 'redel-core'),
              "param_name" => "image2",
              "value"      => "",
              "description" => __( "Select Image two", 'redel-core'),
              'dependency' => array(
                'element' => 'image_number',
                'value' => 'double',
              ),
            ),

        EvaluateLib::vt_class_option(),

       // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Design Options", 'redel-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'redel-core'),
        ),

      )
    ) );
  }
}
