<?php
/**
 * Tabs - Shortcode Options
 */

add_action( 'init', 'redl_tabs_vc_map' );
if ( ! function_exists( 'redl_tabs_vc_map' ) ) {
  function redl_tabs_vc_map() {

    $tab_one_id = time() . '-1-' . rand( 0, 100 );
    $tab_two_id = time() . '-2-' . rand( 0, 100 );
    $tab_three_id = time() . '-3-' . rand( 0, 100 );

    vc_map( array(
      "name"            => __( "Redel Tabs", 'redel-core'),
      'base'            => 'vc_tabs',
      'is_container'    => true,
      'icon'            => 'fa fa-list-alt color-blue',
      'description'     => __( "Tabs Style", 'redel-core'),
      'category'        => EvaluateLib::evlt_cat_name(),
      'params'          => array(
        array(
          'type'        => 'dropdown',
          'heading'     => __( "Tab Style", 'redel-core'),
          'param_name'  => 'tab_style',
          'value'       => array(
            __( "Select Tab Style", 'redel-core') => '',
            __( "Style One (Tabs Top)", 'redel-core')   => 'style-one',
            __( "Style Two (Tabs Bottom)", 'redel-core')   => 'style-two',

          ),
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => __( "Tabs Background Color", 'redel-core'),
          'param_name'  => 'tab_bg_color',
          'value'       => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => 'style-two',
          ),
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => __( "Tabs Text Color", 'redel-core'),
          'param_name'  => 'tab_text_color',
          'value'       => '',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => 'style-two',
          ),
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => __( "Active Tab Background Color", 'redel-core'),
          'param_name'  => 'active_tab_bg_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'value'       => '',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => 'style-two',
          ),
        ),
        array(
          'type'        => 'colorpicker',
          'heading'     => __( "Active Text Color", 'redel-core'),
          'param_name'  => 'active_tab_text_color',
          'edit_field_class'   => 'vc_col-md-6 vc_column vt_field_space',
          'value'       => '',
          'dependency' => array(
            'element' => 'tab_style',
            'value' => 'style-two',
          ),
        ),

        array(
          'type'        => 'textfield',
          'heading'     => __( "Active Tab", 'redel-core'),
          'param_name'  => 'active',
          'description' => __( "Which tab you want to be active on load. [Eg. 1 or 2 or 3]", 'redel-core'),
        ),

      ),
      'custom_markup'   => '<div class="wpb_tabs_holder wpb_holder vc_container_for_children"><ul class="tabs_controls"></ul>%content%</div>',
      'default_content' => '
        [vc_tab title="Tab 1" tab_id="' . $tab_one_id . '"][/vc_tab]
        [vc_tab title="Tab 2" tab_id="' . $tab_two_id . '"][/vc_tab]
        [vc_tab title="Tab 3" tab_id="' . $tab_three_id . '"][/vc_tab]',
      'js_view'         => 'VcTabsView'
    ) );

    /* Tab */
    vc_map( array(
      'name'                      => __( "Tab", 'redel-core'),
      'base'                      => 'vc_tab',
      // 'allowed_container_element' => 'vc_row',
      'is_container'              => true,
      'content_element'           => false,
      'category'                  => EvaluateLib::evlt_cat_name(),
      'params'                    => array(
        array(
          'type'        => 'tab_id',
          'heading'     => __( "Tab Unique ID", 'redel-core'),
          'param_name'  => 'tab_id'
        ),
        array(
          'type'        => 'textfield',
          'heading'     => __( "Tab Title", 'redel-core'),
          'param_name'  => 'title',
        ),
        array(
          'type'        => 'vt_icon',
          'heading'     => __( "Tab Icon", 'redel-core'),
          'param_name'  => 'icon',
        ),
      ),
      'js_view'         => 'VcTabView'
    ) );

  }
}