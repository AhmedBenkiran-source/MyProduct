<?php
/**
 * Services - Shortcode Options
 */
add_action( 'init', 'evlt_services_vc_map' );
if ( ! function_exists( 'evlt_services_vc_map' ) ) {
  function evlt_services_vc_map() {
    vc_map( array(
      "name" => __( "Service", 'redel-core'),
      "base" => "evlt_services",
      "description" => __( "Service Shortcodes", 'redel-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Service Style', 'redel-core' ),
          'value' => array(
            __( 'Style 1', 'redel-core' ) => 'style1',
            __( 'Style 2', 'redel-core' ) => 'style2',
            __( 'Style 3', 'redel-core' ) => 'style3',
          ),
          'param_name' => 'service_style',
          'description' => __( 'Select style for service.', 'redel-core' ),

        ),
        array(
          "type"      => 'vt_icon',
          "heading"   => __('Set Icon', 'redel-core'),
          "param_name" => "service_icon",
          "value"      => "",
          "description" => __( "Set your service icon.", 'redel-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Service Title', 'redel-core'),
          "param_name" => "service_title",
          "value"      => "",
          "description" => __( "Enter your Service title.", 'redel-core'),
        ),
        array(
          "type"      => 'textarea_html',
          "heading"   => __('Content', 'redel-core'),
          "param_name" => "service_content",
          "value"      => "",
          "description" => __( "Enter your service content here.", 'redel-core')
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Service Alignment', 'redel-core' ),
          'value' => array(
            __( 'Left', 'redel-core' ) => 'left',
            __( 'Right', 'redel-core' ) => 'right',
            __( 'Center', 'redel-core' ) => 'center',
          ),
          'admin_label' => true,
          'param_name' => 'service_alignment',
          'description' => __( 'Select Service alignment.', 'redel-core' ),
        ),
        EvaluateLib::vt_class_option(),

        // Style
        EvaluateLib::vt_notice_field(__( "Title Styling", 'redel-core' ),'tle_opt','cs-warning', 'Style'), // Notice
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Title Color', 'redel-core'),
          "param_name" => "title_color",
          "value"      => "",
          "description" => __( "Pick your heading color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Icon Color', 'redel-core'),
          "param_name" => "icon_color",
          "value"      => "",
          "description" => __( "Pick your icon color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Size', 'redel-core'),
          "param_name" => "title_size",
          "value"      => "",
          "description" => __( "Enter the numeric value for title size .", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Top Space', 'redel-core'),
          "param_name" => "title_top_space",
          "value"      => "",
          "description" => __( "Enter the value for title top space.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Title Bottom Space', 'redel-core'),
          "param_name" => "title_bottom_space",
          "value"      => "",
          "description" => __( "Enter the value for title bottom space.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
      )
    ) );
  }
}
