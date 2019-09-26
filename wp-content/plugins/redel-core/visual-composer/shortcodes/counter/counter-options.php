<?php
/**
 * Counter - Shortcode Options
 */
add_action( 'init', 'redl_counter_vc_map' );
if ( ! function_exists( 'redl_counter_vc_map' ) ) {
  function redl_counter_vc_map() {
    vc_map( array(
      "name" => __( "Counter", 'redel-core'),
      "base" => "redl_counter",
      "description" => __( "Counter Styles", 'redel-core'),
      "icon" => "fa fa-sort-numeric-asc color-blue",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Title', 'redel-core'),
          "param_name"  => "counter_title",
          "value"       => "",
          "admin_label"=> true,
          "description" => __( "Enter your counter title.", 'redel-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Counter Value', 'redel-core'),
          "param_name"  => "counter_value",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter numeric value to count. Ex : 20", 'redel-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Value In', 'redel-core'),
          "param_name"  => "counter_value_in",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          "description" => __( "Enter value in symbol or text. Eg : +", 'redel-core')
        ),
        EvaluateLib::vt_class_option(),

        // Stylings
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Title Color', 'redel-core'),
          "param_name"  => "counter_title_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Counter Color', 'redel-core'),
          "param_name"  => "counter_value_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
        ),
        array(
          "type"        => 'colorpicker',
          "heading"     => __('Value In Color', 'redel-core'),
          "param_name"  => "counter_value_in_color",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
        ),
        // Size
        array(
          "type"        => 'textfield',
          "heading"     => __('Title Size', 'redel-core'),
          "param_name"  => "counter_title_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
          "description" => __( "Enter font size in px.", 'redel-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Counter Size', 'redel-core'),
          "param_name"  => "counter_value_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
          "description" => __( "Enter font size in px.", 'redel-core')
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Value In Size', 'redel-core'),
          "param_name"  => "counter_value_in_size",
          "value"       => "",
          'edit_field_class'   => 'vc_col-md-4 vt_field_space',
          "group"       => __('Style', 'redel-core'),
          "description" => __( "Enter font size in px.", 'redel-core')
        ),

      )
    ) );
  }
}
