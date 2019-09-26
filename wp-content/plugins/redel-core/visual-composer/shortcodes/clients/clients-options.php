<?php
/**
 * Client Carousel - Shortcode Options
 */
add_action( 'init', 'clients_vc_map' );
if ( ! function_exists( 'clients_vc_map' ) ) {
  function clients_vc_map() {
    vc_map( array(
      "name" => __( "Clients", 'redel-core'),
      "base" => "redl_clients",
      "description" => __( "Clients", 'redel-core'),
      "icon" => "fa fa-shield color-green",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        EvaluateLib::vt_open_link_tab(),

        // Client Logos
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Client Logo', 'redel-core' ),
          'param_name' => 'client_logos',
          // Note params is mapped inside param-group:
          'params' => array(
            array(
              'type' => 'attach_image',
              'value' => '',
              "admin_label"=> true,
              'heading' => __( 'Upload Image', 'redel-core' ),
              'param_name' => 'client_logo',
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Client Link', 'redel-core' ),
              'param_name' => 'client_link',
            )
          )
        ),
        EvaluateLib::vt_class_option(),

      )
    ) );
  }
}
