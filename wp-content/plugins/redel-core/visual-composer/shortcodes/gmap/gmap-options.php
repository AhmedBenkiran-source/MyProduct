<?php
/**
 * Gmap - Shortcode Options
 */
add_action( 'init', 'redl_gmap_vc_map' );
if ( ! function_exists( 'redl_gmap_vc_map' ) ) {
  function redl_gmap_vc_map() {
    vc_map( array(
      "name" => __( "Google Map", 'redel-core'),
      "base" => "redl_gmap",
      "description" => __( "Google Map Styles", 'redel-core'),
      "icon" => "fa fa-map color-cadetblue",
      "category" => EvaluateLib::evlt_cat_name(),
      "params" => array(

        array(
          "type"        => "notice",
          "heading"     => __( "API KEY", 'redel-core' ),
          "param_name"  => 'api_key',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Enter your Google Map API Key', 'redel-core'),
          "param_name"  => "gmap_api",
          "value"       => "",
          "description" => __( 'New Google Maps usage policy dictates that everyone using the maps should register for a free API key. <br />Please create a key for "Google Static Maps API" and "Google Maps Embed API" using the <a href="https://console.developers.google.com/project" target="_blank">Google Developers Console</a>.<br /> Or follow this step links : <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=maps_embed_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">1. Step One</a> <br /><a href="https://console.developers.google.com/flows/enableapi?apiid=static_maps_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">2. Step Two</a><br /> If you still receive errors, please check following link : <a href="https://churchthemes.com/2016/07/15/page-didnt-load-google-maps-correctly/" target="_blank">How to Fix?</a>', 'redel-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Map Settings", 'redel-core' ),
          "param_name"  => 'map_settings',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Type', 'redel-core' ),
          'value' => array(
            __( 'Select Type', 'redel-core' ) => '',
            __( 'ROADMAP', 'redel-core' ) => 'ROADMAP',
            __( 'SATELLITE', 'redel-core' ) => 'SATELLITE',
            __( 'HYBRID', 'redel-core' ) => 'HYBRID',
            __( 'TERRAIN', 'redel-core' ) => 'TERRAIN',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_type',
          'description' => __( 'Select your google map type.', 'redel-core' ),
        ),
        array(
          'type' => 'dropdown',
          'heading' => __( 'Google Map Style', 'redel-core' ),
          'value' => array(
            __( 'Select Style', 'redel-core' ) => '',
            __( 'Gray Scale', 'redel-core' ) => "gray-scale",
            __( 'Mid Night', 'redel-core' ) => "mid-night",
            __( 'Blue Water', 'redel-core' ) => 'blue-water',
            __( 'Light Dream', 'redel-core' ) => 'light-dream',
            __( 'Pale Dawn', 'redel-core' ) => 'pale-dawn',
            __( 'Apple Maps-esque', 'redel-core' ) => 'apple-maps',
            __( 'Blue Essence', 'redel-core' ) => 'blue-essence',
            __( 'Unsaturated Browns', 'redel-core' ) => 'unsaturated-browns',
            __( 'Paper', 'redel-core' ) => 'paper',
            __( 'Midnight Commander', 'redel-core' ) => 'midnight-commander',
            __( 'Light Monochrome', 'redel-core' ) => 'light-monochrome',
            __( 'Flat Map', 'redel-core' ) => 'flat-map',
            __( 'Retro', 'redel-core' ) => 'retro',
            __( 'becomeadinosaur', 'redel-core' ) => 'becomeadinosaur',
            __( 'Neutral Blue', 'redel-core' ) => 'neutral-blue',
            __( 'Subtle Grayscale', 'redel-core' ) => 'subtle-grayscale',
            __( 'Ultra Light with Labels', 'redel-core' ) => 'ultra-light-labels',
            __( 'Shades of Grey', 'redel-core' ) => 'shades-grey',
          ),
          'admin_label' => true,
          'param_name' => 'gmap_style',
          'description' => __( 'Select your google map style.', 'redel-core' ),
          'dependency' => array(
            'element' => 'gmap_type',
            'value' => 'ROADMAP',
          ),
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Height', 'redel-core'),
          "param_name"  => "gmap_height",
          "value"       => "",
          "description" => __( "Enter the px value for map height.", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'attach_image',
          "heading"     =>__('Common Marker', 'redel-core'),
          "param_name"  => "gmap_common_marker",
          "value"       => "",
          "description" => __( "Upload custom marker, if you want to change the default one.", 'redel-core'),
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
        ),
        array(
          "type"        =>'textfield',
          "heading"     =>__('Zoom', 'redel-core'),
          "param_name"  => "gmap_zoom",
          "value"       => "",
          "description" => __( "Enter zoom as numeric value. [Eg : 18]", 'redel-core'),
        ),

        array(
          "type"        => "notice",
          "heading"     => __( "Enable & Disable", 'redel-core' ),
          "param_name"  => 'enb_disb',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Scroll Wheel', 'redel-core'),
          "param_name"  => "gmap_scroll_wheel",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Street View Control', 'redel-core'),
          "param_name"  => "gmap_street_view",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),
        array(
          "type"        =>'switcher',
          "heading"     =>__('Map Type Control', 'redel-core'),
          "param_name"  => "gmap_maptype_control",
          "value"       => "",
          "std"         => false,
          'edit_field_class'   => 'vc_col-md-4 vc_column vt_field_space',
        ),

        // Map Markers
        array(
          "type"        => "notice",
          "heading"     => __( "Map Pins", 'redel-core' ),
          "param_name"  => 'map_pins',
          'class'       => 'cs-info',
          'value'       => '',
        ),
        array(
          'type' => 'param_group',
          'value' => '',
          'heading' => __( 'Map Locations', 'redel-core' ),
          'param_name' => 'locations',
          'params' => array(

            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Latitude', 'redel-core' ),
              'param_name' => 'latitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Latitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'redel-core' ),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Longitude', 'redel-core' ),
              'param_name' => 'longitude',
              'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
              'admin_label' => true,
              'description' => __( 'Find Longitude : <a href="http://www.latlong.net/" target="_blank">latlong.net</a>', 'redel-core' ),
            ),
            array(
              'type' => 'attach_image',
              'value' => '',
              'heading' => __( 'Custom Marker', 'redel-core' ),
              'param_name' => 'custom_marker',
              "description" => __( "Upload your unique map marker if your want to differentiate from others.", 'redel-core'),
            ),
            array(
              'type' => 'textfield',
              'value' => '',
              'heading' => __( 'Heading', 'redel-core' ),
              'param_name' => 'location_heading',
              'admin_label' => true,
            ),
            array(
              'type' => 'textarea',
              'value' => '',
              'heading' => __( 'Content', 'redel-core' ),
              'param_name' => 'location_text',
            ),

          )
        ),

        EvaluateLib::vt_class_option(),

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
