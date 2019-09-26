<?php
/**
 * Blog - Shortcode Options
 */
add_action( 'init', 'redl_faq_vc_map' );
if ( ! function_exists( 'redl_faq_vc_map' ) ) {
  function redl_faq_vc_map() {
    vc_map( array(
      "name" => __( "FAQ", 'redel-core'),
      "base" => "redl_faq",
      "description" => __( "FAQ", 'redel-core'),
      "icon" => "fa fa-newspaper-o color-red",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          "type"        =>'textfield',
          "heading"     =>__('Limit', 'redel-core'),
          "param_name"  => "faq_limit",
          "value"       => "",
          'admin_label' => true,
          "description" => __( "Enter the number of items to show.", 'redel-core'),
        ),
        array(
    			"type"        => "notice",
    			"heading"     => __( "Listing", 'redel-core' ),
    			"param_name"  => 'lsng_opt',
    			'class'       => 'cs-warning',
    			'value'       => '',
    		),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order', 'redel-core' ),
          'value' => array(
            __( 'Select faq Order', 'redel-core' ) => '',
            __('Asending', 'redel-core') => 'ASC',
            __('Desending', 'redel-core') => 'DESC',
          ),
          'param_name' => 'faq_order',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Order By', 'redel-core' ),
          'value' => array(
            __('None', 'redel-core') => 'none',
            __('ID', 'redel-core') => 'ID',
            __('Author', 'redel-core') => 'author',
            __('Title', 'redel-core') => 'title',
            __('Date', 'redel-core') => 'date',
          ),
          'param_name' => 'faq_orderby',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        => 'textfield',
          "heading"     => __('Show Only Certain Faq?', 'redel-core'),
          "param_name"  => "faq_show",
          "value"       => "",
          "description" => __( "Enter faq ids (comma separated) you want to display.", 'redel-core')
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Pagination', 'redel-core'),
          "param_name"  => "faq_pagination",
          "value"       => "",
          "std"         => true,
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        EvaluateLib::vt_class_option(),

      )
    ) );
  }
}
