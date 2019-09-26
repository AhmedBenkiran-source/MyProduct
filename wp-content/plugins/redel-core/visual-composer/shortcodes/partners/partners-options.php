<?php
/**
 * Partners - Shortcode Options
 */
add_action( 'init', 'evlt_partners_vc_map' );
if ( ! function_exists( 'evlt_partners_vc_map' ) ) {
  function evlt_partners_vc_map() {
    vc_map( array(
      "name" => __( "Partners", 'redel-core'),
      "base" => "evlt_partners",
      "description" => __( "Our Partners", 'redel-core'),
      "icon" => "fa fa-user-plus color-orange",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        EvaluateLib::vt_open_link_tab(),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Upload Partner Logo', 'redel-core'),
          "param_name"  => "partner_logo",
          "value"       => "",
          "description" => __( "Upload your partner logo.", 'redel-core')
        ),
        array(
          "type"        =>'href',
          "heading"     =>__('Logo Link', 'redel-core'),
          "param_name"  => "partner_logo_link",
          "value"       => "",
          "description" => __( "Enter your partner logo link, if you want.", 'redel-core')
        ),
        array(
          "type"        =>'vc_link',
          "heading"     =>__('Title', 'redel-core'),
          "param_name"  => "partner_title",
          "value"       => "",
          "description" => __( "Enter your partner name and link, if you want.", 'redel-core')
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Profession', 'redel-core'),
          "param_name"  => "partner_profession",
          "value"       => "",
          "description" => __( "Enter your partner profession.", 'redel-core')
        ),
        array(
          "type"        =>'textarea_html',
          "heading"     =>__('Content', 'redel-core'),
          "param_name"  => "content",
          "value"       => "",
          "description" => __( "Enter your partner detailed information.", 'redel-core')
        ),
        EvaluateLib::vt_class_option(),

      )
    ) );
  }
}
