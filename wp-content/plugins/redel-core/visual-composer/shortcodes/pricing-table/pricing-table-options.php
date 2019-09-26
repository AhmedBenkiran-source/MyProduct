<?php
/**
 * Pricing Table - Shortcode Options
 */
add_action( 'init', 'evlt_pricing_table_vc_map' );
if ( ! function_exists( 'evlt_pricing_table_vc_map' ) ) {
  function evlt_pricing_table_vc_map() {
    vc_map( array(
      "name" => __( "Pricing Table", 'redel-core'),
      "base" => "evlt_pricing_table",
      "description" => __( "Pricing Table Styles", 'redel-core'),
      "icon" => "fa fa-table color-red",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
        "type"        =>'textfield',
        "heading"     =>__('Package Name', 'redel-core'),
        "param_name"  => "package_name",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the package name of the pricing table.", 'redel-core'),
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Package Price', 'redel-core'),
        "param_name"  => "package_price",
        "value"       => "",

        "description" => __( "Enter the package price of the pricing table.", 'redel-core'),
        ),
        array(
            "type" => "switcher",
            "heading" => __( "Featured?", 'redel-core' ),
            "param_name" => "package_ribbon",
            "on_text" => __( "Yes", 'redel-core' ),
            "off_text" => __( "No", 'redel-core' ),
            "value" => '',
            "description" => __( "Make this package featured, if enabled.", 'redel-core')
        ),
        array(
              "type"      => 'colorpicker',
              "heading"   => __('Select Featured BG Color', 'redel-core'),
              "param_name" => "custom_feature_color",
              "value"      => "",
              "description" => __( "Set your featured star background color.", 'redel-core'),
              'dependency' => array(
                'element' => 'package_ribbon',
                'value' => "true",
              ),
            ),
        // Pricing Table features
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Package Features', 'redel-core' ),
          'param_name' => 'pricing_table_features',
          // Note params is mapped inside param-group:
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'admin_label' => true,
              'heading' => __( 'Feature Title', 'redel-core' ),
              'param_name' => 'feature_title',
              "description" => __( "Enter the text for the feature.", 'redel-core'),
            ),
            array(
            "type" => "switcher",
            "heading" => __( "Is this feature available for this package?", 'redel-core' ),
            "param_name" => "feature_avail",
            "on_text" => __( "Yes", 'redel-core' ),
            "off_text" => __( "No", 'redel-core' ),
            "value" => '',
            "description" => __( "Check mark will be shown, if enabled.", 'redel-core')
            ),
          )
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Package Button Text', 'redel-core'),
        "param_name"  => "package_button_text",
        "value"       => "",
        "description" => __( "Enter the text for the button.", 'redel-core'),
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Package Button Link', 'redel-core'),
        "param_name"  => "package_button_link",
        "value"       => "",
        "description" => __( "Enter the link for the button.", 'redel-core'),
        ),

        EvaluateLib::vt_class_option(),
      )
    ) );
  }
}
