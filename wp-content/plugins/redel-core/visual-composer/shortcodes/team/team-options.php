<?php
/**
 * Team - Shortcode Options
 */
add_action( 'init', 'team_vc_map' );
if ( ! function_exists( 'team_vc_map' ) ) {
  function team_vc_map() {
    vc_map( array(
    "name" => __( "Team", 'redel-core'),
    "base" => "redl_team",
    "description" => __( "Team Style", 'redel-core'),
    "icon" => "fa fa-user color-red",
    "category" => EvaluateLib::evlt_cat_name(),
    "params" => array(

        array(
        "type"      => 'attach_image',
        "heading"   => __('Select Image ', 'redel-core'),
        "param_name" => "team_member_image",
        "value"      => "",
        "description" => __( "Select Image for team member", 'redel-core'),
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Member Name', 'redel-core'),
        "param_name"  => "team_member_name",
        "value"       => "",
        "description" => __( "Enter the name of the team member", 'redel-core'),
        "admin_label"=> true,
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Team Member Link', 'redel-core'),
        "param_name"  => "team_member_link",
        "value"       => "",
        "description" => __( "Enter link of the team member profile", 'redel-core'),
        ),
        array(
        "type"        =>'textfield',
        "heading"     =>__('Team Member Profession', 'redel-core'),
        "param_name"  => "team_member_profession",
        "value"       => "",
        "description" => __( "Enter profession of the team member", 'redel-core'),
        "admin_label"=> true,
        ),

      EvaluateLib::vt_class_option(),

      // Style
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