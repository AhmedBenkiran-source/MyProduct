<?php
/**
 * Button - Shortcode Options
 */
add_action( 'init', 'evlt_button_vc_map' );
if ( ! function_exists( 'evlt_button_vc_map' ) ) {
  function evlt_button_vc_map() {
    vc_map( array(
      "name" => __( "Button", 'redel-core'),
      "base" => "evlt_button",
      "description" => __( "Button Styles", 'redel-core'),
      "icon" => "fa fa-mouse-pointer color-orange",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Style', 'redel-core' ),
          'value' => array(
            __( 'Select Button Style', 'redel-core' ) => '',
            __( 'Style one', 'redel-core' ) => 'redl-btn-one',
            __( 'Style two', 'redel-core' ) => 'redl-btn-two',
            __( 'Style three', 'redel-core' ) => 'redl-btn-three',
            __( 'Style four', 'redel-core' ) => 'redl-btn-four',
          ),
          'admin_label' => true,
          'param_name' => 'button_style',
          'description' => __( 'Select button style', 'redel-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Button Size', 'redel-core' ),
          'value' => array(
            __( 'Select Button Size', 'redel-core' ) => '',
            __( 'Small', 'redel-core' ) => 'btn-small',
            __( 'Medium', 'redel-core' ) => 'btn-medium',
            __( 'Medium two', 'redel-core' ) => 'btn-medium-2',
            __( 'Medium three', 'redel-core' ) => 'btn-medium-3',
            __( 'Medium four', 'redel-core' ) => 'btn-medium-4',
            __( 'Medium five', 'redel-core' ) => 'btn-medium-5',
            __( 'Medium six', 'redel-core' ) => 'btn-medium-6',
            __( 'Large', 'redel-core' ) => 'btn-large',
          ),
          'admin_label' => true,
          'param_name' => 'button_size',
          'description' => __( 'Select button size', 'redel-core' ),
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Button Border?", 'redel-core' ),
          "param_name" => "button_border",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'redel-core' ),
          "off_text" => __( "No", 'redel-core' ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Button Text", 'redel-core' ),
          "param_name" => "button_text",
          'value' => '',
          'admin_label' => true,
          "description" => __( "Enter your button text.", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "href",
          "heading" => __( "Button Link", 'redel-core' ),
          "param_name" => "button_link",
          'value' => '',
          "description" => __( "Enter your button link.", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Open New Tab?", 'redel-core' ),
          "param_name" => "open_link",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'redel-core' ),
          "off_text" => __( "No", 'redel-core' ),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Disable Simple Dark Hover", 'redel-core' ),
          "param_name" => "simple_hover",
          "std" => false,
          'value' => '',
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        EvaluateLib::vt_class_option(),

        // Styling
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Color", 'redel-core' ),
          "param_name" => "text_color",
          'value' => '',
          "group" => __( "Styling", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Text Hover Color", 'redel-core' ),
          "param_name" => "text_hover_color",
          'value' => '',
          "group" => __( "Styling", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Background Hover Color", 'redel-core' ),
          "param_name" => "bg_hover_color",
          'value' => '',
          "group" => __( "Styling", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Border Hover Color", 'redel-core' ),
          "param_name" => "border_hover_color",
          'value' => '',
          "group" => __( "Styling", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'simple_hover',
            'value' => 'true',
          ),
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Text Size", 'redel-core' ),
          "param_name" => "text_size",
          'value' => '',
          "description" => __( "Enter button text font size. [Eg: 14px]", 'redel-core'),
          "group" => __( "Styling", 'redel-core'),
        ),

        // Icon
        array(
          'type' => 'dropdown',
          'heading' => __( 'Icon Alignment', 'redel-core' ),
          'value' => array(
            __( 'Select Icon Alignment', 'redel-core' ) => '',
            __( 'Left', 'redel-core' ) => 'btn-icon-left',
            __( 'Right', 'redel-core' ) => 'btn-icon-right',
          ),
          'param_name' => 'icon_alignment',
          'description' => __( 'Select icon alignment in this button.', 'redel-core' ),
          "group" => __( "Icon", 'redel-core'),
        ),
        array(
          "type" => "vt_icon",
          "heading" => __( "Select Icon", 'redel-core' ),
          "param_name" => "select_icon",
          'value' => '',
          "description" => __( "Select icon if you want.", 'redel-core'),
          "group" => __( "Icon", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "textfield",
          "heading" => __( "Icon Size", 'redel-core' ),
          "param_name" => "icon_size",
          'value' => '',
          "description" => __( "Enter icon size in px.", 'redel-core'),
          "group" => __( "Icon", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Color", 'redel-core' ),
          "param_name" => "icon_color",
          'value' => '',
          "description" => __( "Pick your icon color.", 'redel-core'),
          "group" => __( "Icon", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type" => "colorpicker",
          "heading" => __( "Icon Hover Color", 'redel-core' ),
          "param_name" => "icon_hover_color",
          'value' => '',
          "description" => __( "Pick your icon hover color.", 'redel-core'),
          "group" => __( "Icon", 'redel-core'),
          'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // Design Tab
        array(
          "type" => "css_editor",
          "heading" => __( "Text Size", 'redel-core' ),
          "param_name" => "css",
          "group" => __( "Design", 'redel-core'),
        ),

      )
    ) );
  }
}
