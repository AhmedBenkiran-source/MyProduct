<?php
/**
 * Heading - Shortcode Options
 */
add_action( 'init', 'evlt_heading_vc_map' );
if ( ! function_exists( 'evlt_heading_vc_map' ) ) {
  function evlt_heading_vc_map() {
    vc_map( array(
      "name" => __( "Heading", 'redel-core'),
      "base" => "evlt_heading",
      "description" => __( "Heading Shortcodes", 'redel-core'),
      "icon" => "fa fa-cog color-brown",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

      // main heading notice
      array(
        "type"        => "notice",
        "heading"     => __( "Main Heading", 'redel-core' ),
        "param_name"  => 'mh_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Heading Text', 'redel-core'),
          "param_name" => "main_heading_text",
          "value"      => "",
          "description" => __( "Enter your main heading text.", 'redel-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Bottom Space', 'redel-core'),
          "param_name" => "main_heading_padding_bottom",
          "value"      => "",
          "description" => __( "Enter the value for the bottom space for the main heading .", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Main Heading Alignment', 'redel-core' ),
          'value' => array(
            __( 'Left', 'redel-core' ) => 'left',
            __( 'Right', 'redel-core' ) => 'right',
            __( 'Center', 'redel-core' ) => 'center',
          ),
          'admin_label' => true,
          'param_name' => 'main_heading_alignment',
          'description' => __( 'Select heading alignment.', 'redel-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),

        // sub heading notice
        array(
                "type"        => "notice",
                "heading"     => __( "Sub Heading", 'redel-core' ),
                "param_name"  => 'sh_opt',
                'class'       => 'cs-warning',
                'value'       => '',
            ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Heading Text', 'redel-core'),
          "param_name" => "sub_heading_text",
          "value"      => "",
          "description" => __( "Enter your sub heading text.", 'redel-core'),
        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Bottom Space', 'redel-core'),
          "param_name" => "sub_heading_padding_bottom",
          "value"      => "",
          "description" => __( "Enter the value for the bottom space for the sub heading .", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',

        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Sub Heading Alignment', 'redel-core' ),
          'value' => array(
            __( 'Left', 'redel-core' ) => 'left',
            __( 'Right', 'redel-core' ) => 'right',
            __( 'Center', 'redel-core' ) => 'center',
          ),
          'admin_label' => true,
          'param_name' => 'sub_heading_alignment',
          'description' => __( 'Select heading alignment.', 'redel-core' ),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        EvaluateLib::vt_class_option(),

        // Style
        array(
          "type"      => 'textfield',
          "heading"   => __('Main Heading Font Size', 'redel-core'),
          "param_name" => "main_heading_font_size",
          "value"      => "",
          "description" => __( "Enter your main heading font size.", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group" => __( "Style", 'redel-core'),

        ),

        array(
          "type"      => 'colorpicker',
          "heading"   => __('Main Heading Color', 'redel-core'),
          "param_name" => "main_heading_color",
          "value"      => "",
          "description" => __( "Pick your Main heading color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Main Heading CSS', 'redel-core'),
          "param_name" => "main_heading_css",
          "value"      => "",
          "description" => __( "Enter css for main heading.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),

        ),
        array(
          "type"      => 'textfield',
          "heading"   => __('Sub Heading Font Size', 'redel-core'),
          "param_name" => "sub_heading_font_size",
          "value"      => "",
          "description" => __( "Enter your sub heading font size.", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "group" => __( "Style", 'redel-core'),
        ),
        array(
          "type"      => 'colorpicker',
          "heading"   => __('Sub Heading Color', 'redel-core'),
          "param_name" => "sub_heading_color",
          "value"      => "",
          "description" => __( "Pick your Sub heading color.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"      => 'textarea',
          "heading"   => __('Sub Heading CSS', 'redel-core'),
          "param_name" => "sub_heading_css",
          "value"      => "",
          "description" => __( "Enter css for sub heading.", 'redel-core'),
          "group" => __( "Style", 'redel-core'),
        ),
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
