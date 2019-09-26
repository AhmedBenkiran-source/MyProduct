<?php
/**
 * Visual Composer Related Functions
 */

// Init Visual Composer
function evlt_init_vc_shortcodes() {
  if ( defined( 'WPB_VC_VERSION' ) ) {

    /* Visual Composer - Setup */
    require_once( VCTS_SHORTCODE_BASE_PATH . '/lib/add-params.php' );
    require_once( VCTS_SHORTCODE_BASE_PATH . '/pre_pages/pre-pages.php' );

    /* All Shortcodes */
    if (class_exists('WPBakeryVisualComposerAbstract')) {

      // Templates
      $dir = VCTS_SHORTCODE_BASE_PATH . '/vc_templates';
      vc_set_shortcodes_templates_dir( $dir );

      /* Set VC editor as default in following post types */
      $list = array(
        'post',
        'page',
        'banner',
        'faq',
        'portfolio',
        'product',
        'team',
        'testimonial'
      );
      vc_set_default_editor_post_types( $list );

    } // class_exists

    // Add New Param - VC_Row
    $vc_row_attr = array(
      array(
        "type" => "colorpicker",
        "heading" => __( "Overlay Color", 'redel' ),
        "description" => __( "Pick your overlay color, make sure you've controlled opacity.", 'redel' ),
        "param_name" => "overlay_color",
        "group" => __( "Design Options", 'redel'),
      ),
    );
    vc_add_params( 'vc_row', $vc_row_attr );
    // Add New Param - VC_Column
    $vc_column_attr = array(
      array(
        'type' => 'dropdown',
        'value' => array(
          __( 'Text Left', 'redel-core' ) => 'text-left',
          __( 'Text Right', 'redel-core' ) => 'text-right',
          __( 'Text Center', 'redel-core' ) => 'text-center',
        ),
        'heading' => __( 'Text Alignment', 'redel-core' ),
        'param_name' => 'text_alignment',
      ),
      array(
        "type"        => "notice",
        "heading"     => __( "Animation Settings", 'redel-core' ),
        "param_name"  => 'mh_opt',
        'class'       => 'cs-warning',
        'value'       => '',
      ),
      array(
        'type' => 'dropdown',
        'heading' => __( 'Animation Style', 'redel-core' ),
        'value' => array(
          __( 'Select Animation Style', 'redel-core' ) => '',
          __( 'Fade In', 'redel-core' ) => 'fadeIn',
          __( 'Slide In Up Short', 'redel-core' ) => 'slideInUpShort',
          __( 'Slide In Up Long', 'redel-core' ) => 'slideInUpLong',
          __( 'Slide In Right Short', 'redel-core' ) => 'slideInRightShort',
          __( 'Slide In Right Long', 'redel-core' ) => 'slideInRightLong',
          __( 'Slide In Down Short', 'redel-core' ) => 'slideInDownShort',
          __( 'Slide In Down Long', 'redel-core' ) => 'slideInDownLong',
          __( 'Slide In Left Short', 'redel-core' ) => 'slideInLeftShort',
          __( 'Slide In Left Long', 'redel-core' ) => 'slideInLeftLong',
          __( 'Bounce In', 'redel-core' ) => 'bounceIn',
          __( 'Bounce In Right', 'redel-core' ) => 'bounceInRight',
          __( 'Bounce Out', 'redel-core' ) => 'bounceOut',
          __( 'Bounce In Down', 'redel-core' ) => 'bounceInDown',
          __( 'Bounce In Up', 'redel-core' ) => 'bounceInUp',
          __( 'Bounce In Left', 'redel-core' ) => 'bounceInLeft',
          __( 'Scale In', 'redel-core' ) => 'scaleIn',
          __( 'Scale Out', 'redel-core' ) => 'scaleOut',
          __( 'Flip In X', 'redel-core' ) => 'flipInX',
          __( 'Flip In Y', 'redel-core' ) => 'flipInY',
          __( 'Spin In X', 'redel-core' ) => 'spinInX',
          __( 'Spin In Y', 'redel-core' ) => 'spinInY',
          __( 'Helicopter In', 'redel-core' ) => 'helicopterIn',
          __( 'Helicopter Out', 'redel-core' ) => 'helicopterOut',
          __( 'Sign Swing Top', 'redel-core' ) => 'signSwingTop',
          __( 'Sign Swing Right', 'redel-core' ) => 'signSwingRight',
          __( 'Sign Swing Bottom', 'redel-core' ) => 'signSwingBottom',
          __( 'Sign Swing Left', 'redel-core' ) => 'signSwingLeft',
          __( 'Wiggle X', 'redel-core' ) => 'wiggleX',
          __( 'Wiggle Y', 'redel-core' ) => 'wiggleY',
          __( 'Drop Up', 'redel-core' ) => 'dropUp',
          __( 'Drop Down', 'redel-core' ) => 'dropDown',
          __( 'Roll In Left', 'redel-core' ) => 'rollInLeft',
          __( 'Roll In Right', 'redel-core' ) => 'rollInRight',
          __( 'Turn In Right', 'redel-core' ) => 'turnInRight',
          __( 'Turn In Left', 'redel-core' ) => 'turnInLeft',
        ),
        'param_name' => 'animation_style',
        'description' => __( 'Select animation style', 'redel-core' ),
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Duration", 'redel-core' ),
        "param_name" => "animate_duration",
        'value' => '',
        "description" => __( "Change the animation duration. (Eg : 800)", 'redel-core'),
        'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
      ),
      array(
        "type" => "textfield",
        "heading" => __( "Delay", 'redel-core' ),
        "param_name" => "animate_delay",
        'value' => '',
        "description" => __( "Delay before the animation starts. (Eg : 400ms)", 'redel-core'),
        'edit_field_class'  => 'vc_col-md-6 vc_column vt_field_space',
      ),
    );
    vc_add_params( 'vc_column', $vc_column_attr );
    vc_add_params( 'vc_column_inner', $vc_column_attr );

    // Remove Elements
    vc_remove_param( 'vc_column', 'css_animation' ); // For Horizon

  }
}

add_action( 'vc_before_init', 'evlt_init_vc_shortcodes' );

/* Remove VC Teaser metabox */
if ( is_admin() ) {
  if ( ! function_exists('vt_framework_remove_vc_boxes') ) {
    function vt_framework_remove_vc_boxes(){
      $post_types = get_post_types( '', 'names' );
      foreach ( $post_types as $post_type ) {
        remove_meta_box('vc_teaser',  $post_type, 'side');
      }
    } // End function
  } // End if
add_action('do_meta_boxes', 'vt_framework_remove_vc_boxes');
}