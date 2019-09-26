<?php
/*
 * Mailchimp Widget
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

class vt_mailchimp_widget extends WP_Widget {

  /**
   * Specifies the widget name, description, class name and instatiates it
   */
  public function __construct() {
    parent::__construct(
      'vt_mailchimp_widget',
      VTHEME_NAME_P . __( ': Mailchimp Widget', 'redel' ),
      array(
        'classname'   => 'vt_mailchimp_widget',
        'description' => VTHEME_NAME_P . __( ' widget that displays mailchimp form.', 'redel' )
      )
    );
  }

  /**
   * Generates the back-end layout for the widget
   */
  public function form( $instance ) {
    // Default Values
    $instance   = wp_parse_args( $instance, array(
      'formid'    => '',

    ));

    // Title
    /*$title_value = esc_attr( $instance['title'] );
    $title_field = array(
      'id'    => $this->get_field_name('title'),
      'name'  => $this->get_field_name('title'),
      'type'  => 'text',
      'title' => __( 'Title :', 'redel' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $title_field, $title_value );*/

    // Mailchimp form id
    $content_value = esc_attr( $instance['formid'] );
    $content_field = array(
      'id'    => $this->get_field_name('formid'),
      'name'  => $this->get_field_name('formid'),
      'type'  => 'text',
      'title' => __( 'Mailchimp form id :', 'redel' ),
      'wrap_class' => 'vt-cs-widget-fields',
    );
    echo cs_add_element( $content_field, $content_value );

  }

  /**
   * Processes the widget's values
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;

    // Update values
    $instance['formid']      = strip_tags( stripslashes( $new_instance['formid'] ) );
    //$instance['content']    = strip_tags( stripslashes( $new_instance['content'] ) );

    return $instance;
  }

  /**
   * Output the contents of the widget
   */
  public function widget( $args, $instance ) {
    // Extract the arguments
    extract( $args );

    //$title      = apply_filters( 'widget_title', $instance['title'] );
    $formid    = $instance['formid'];

    // Display the markup before the widget
    echo $before_widget;


    echo do_shortcode('<div class="subscribe-form">[mc4wp_form id="'.$formid.'"]</div>');

    // Display the markup after the widget
    echo $after_widget;
  }
}

// Register the widget using an annonymous function
function vt_mailchimp_widget_function() {
  register_widget( "vt_mailchimp_widget" );
}
add_action( 'widgets_init', 'vt_mailchimp_widget_function' );

