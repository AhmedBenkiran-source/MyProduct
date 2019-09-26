<?php
/**
 * List - Shortcode Options
 */
add_action( 'init', 'evlt_list_vc_map' );
if ( ! function_exists( 'evlt_list_vc_map' ) ) {
  function evlt_list_vc_map() {
    vc_map( array(
      "name" => __( "List", 'redel-core'),
      "base" => "evlt_list",
      "description" => __( "List Styles", 'redel-core'),
      "icon" => "fa fa-list color-red",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          'type' => 'dropdown',
          'heading' => __( 'List Style', 'redel-core' ),
          'value' => array(
            __( 'Style One (Tick Mark)', 'redel-core' ) => 'feature-info-wrap',
            __( 'Style Two (2 Columns)', 'redel-core' ) => 'ul-half',
            __( 'Style Three (Custom Icon)', 'redel-core' ) => 'overview-bullets',
            __( 'Style Four (Simple Circle)', 'redel-core' ) => 'redl-info-page',
          ),
          'admin_label' => true,
          'param_name' => 'list_style',
          'description' => __( 'Select your list style.', 'redel-core' ),
        ),
        array(
          "type" => "switcher",
          "heading" => __( "Number bullets?", 'redel-core' ),
          "param_name" => "number_bullets",
          "std" => false,
          'value' => '',
          "on_text" => __( "Yes", 'redel-core' ),
          "off_text" => __( "No", 'redel-core' ),
          'dependency' => array(
                'element' => 'list_style',
                'value' => 'redl-info-page',
          ),
        ),

        // List
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Lists', 'redel-core' ),
          'param_name' => 'list_items',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'vt_icon',
              'value' => '',
              'heading' => __( 'Select Icon ', 'redel-core' ),
              'param_name' => 'select_icon',
              'description' => __( 'This is only for Style Three (Custom Icon)', 'redel-core' ),
              'dependency' => array(
                'element' => 'list_style',
                'value' => 'overview-bullets',
              ),
            ),
            array(
              'type' => 'textarea',
              'admin_label' => true,
              'value' => '',
              'heading' => __( 'Text', 'redel-core' ),
              'param_name' => 'list_text',
            ),

          )
        ),
        EvaluateLib::vt_class_option(),

        // Style
        array(
          'type' => 'colorpicker',
          'value' => '',
          'heading' => __( 'Text Color', 'redel-core' ),
          'param_name' => 'text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'redel-core' ),
        ),
        array(
          'type' => 'textfield',
          'value' => '',
          'heading' => __( 'Text Size', 'redel-core' ),
          'param_name' => 'text_size',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'group' => __( 'Style', 'redel-core' ),
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
