<?php
/**
 * Slider - Shortcode Options
 */
add_action( 'init', 'redl_slider_vc_map' );
if ( ! function_exists( 'redl_slider_vc_map' ) ) {
  function redl_slider_vc_map() {
    vc_map( array(
      "name" => __( "Featured Slider", 'redel-core'),
      "base" => "redl_slider",
      "description" => __( "Featured Slider Shortcodes", 'redel-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

      // slides notice
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Slides', 'redel-core' ),
          'param_name' => 'slides',
          // Note params is mapped inside param-group:
          'params' => array(

            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Upload slide Image', 'redel-core' ),
              'param_name' => 'slide_image',
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Heading Text One', 'redel-core'),
              "param_name" => "slider_heading1",
              "value"      => "",
              "description" => __( "Enter your slider heading one.", 'redel-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
            ),
            array(
              "type"      => 'textfield',
              "heading"   => __('Heading Text Two', 'redel-core'),
              "param_name" => "slider_heading2",
              "value"      => "",
              "description" => __( "Enter your slider heading two.", 'redel-core'),
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'redel-core' ),
              'param_name' => 'slide_content',
            ),
          )
        ),

        EvaluateLib::vt_class_option(),

        // Style
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Heading One Color', 'redel-core'),
          "param_name" => "heading1_color",
          "value"      => "",
          "description" => __( "Pick your  heading one color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Heading Two Color', 'redel-core'),
          "param_name" => "heading2_color",
          "value"      => "",
          "description" => __( "Pick your heading two color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Content Color', 'redel-core'),
          "param_name" => "content_color",
          "value"      => "",
          "description" => __( "Pick your content color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
