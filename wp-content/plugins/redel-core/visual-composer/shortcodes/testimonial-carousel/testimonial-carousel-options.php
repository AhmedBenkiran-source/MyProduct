<?php
/**
 * Testimonial Carousel - Shortcode Options
 */
add_action( 'init', 'testimonial_carousel_vc_map' );
if ( ! function_exists( 'testimonial_carousel_vc_map' ) ) {
  function testimonial_carousel_vc_map() {
    vc_map( array(
    "name" => __( "Testimonial Carousel", 'redel-core'),
    "base" => "evlt_testimonial_carousel",
    "description" => __( "Carousel Style Testimonial", 'redel-core'),
    "icon" => "fa fa-comments color-green",
    "category" => EvaluateLib::evlt_cat_name(),
    "params" => array(

      array(
        "type" => "dropdown",
        "heading" => __( "Testimonial Style", 'redel-core' ),
        "param_name" => "testimonial_style",
        "value" => array(
          __('Style One', 'redel-core') => 'testimonial_one',
          __('Style Two', 'redel-core') => 'testimonial_two',
        ),
        "admin_label" => true,
        "description" => __( "Select testimonial carousel style.", 'redel-core'),
      ),
      array(
          'type' => 'dropdown',
          'heading' => __( 'Testimonial Alignment', 'redel-core' ),
          'value' => array(
            __( 'Left', 'redel-core' ) => 'left',
            __( 'Right', 'redel-core' ) => 'right',
            __( 'Center', 'redel-core' ) => 'center',
          ),
          'admin_label' => true,
          'param_name' => 'testimonial_alignment',
          'description' => __( 'Select Testimonial alignment.', 'redel-core' ),
        ),
      array(
        "type"        => "notice",
        "heading"     => __( "Listing", 'redel-core' ),
        "param_name"  => 'lsng_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Limit', 'redel-core'),
        "param_name"  => "testimonial_limit",
        "value"       => "",
        'admin_label' => true,
        "description" => __( "Enter the number of items to show.", 'redel-core'),
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Show particular testimonials?', 'redel-core'),
        "param_name"  => "testimonial_particular",
        "value"       => "",
        "description" => __( "Enter testimonials ID with comma as separated to show particularly.", 'redel-core'),
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Order', 'redel-core' ),
        'value' => array(
          __( 'Select Testimonial Order', 'redel-core' ) => '',
          __('Asending', 'redel-core') => 'ASC',
          __('Desending', 'redel-core') => 'DESC',
        ),
        'param_name' => 'testimonial_order',
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
        'param_name' => 'testimonial_orderby',
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
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

      // Style
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Title Color', 'redel-core'),
        "param_name"  => "title_color",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Content Color', 'redel-core'),
        "param_name"  => "content_color",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Name Color', 'redel-core'),
        "param_name"  => "name_color",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'colorpicker',
        "heading"     =>__('Profession Color', 'redel-core'),
        "param_name"  => "profession_color",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      // Size
      array(
        "type"        =>'textfield',
        "heading"     =>__('Title Size', 'redel-core'),
        "param_name"  => "title_size",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Content Size', 'redel-core'),
        "param_name"  => "content_size",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Name Size', 'redel-core'),
        "param_name"  => "name_size",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type"        =>'textfield',
        "heading"     =>__('Profession Size', 'redel-core'),
        "param_name"  => "profession_size",
        "value"       => "",
        "group"       => __('Style', 'redel-core'),
        'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
      ),

      ), // Params
    ) );
  }
}
