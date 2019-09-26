<?php
/*
 * All Metabox related options for Redel theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function redel_metabox_options( $options ) {

  $options      = array();

  // -----------------------------------------
  // Page Metabox Options                    -
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_type_metabox',
    'title'     => esc_html__('Page Custom Options', 'redel'),
    'post_type' => array('post', 'page', 'portfolio', 'product', 'team'),
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

      // Header
      array(
        'name'  => 'header_section',
        'title' => esc_html__('Header', 'redel'),
        'icon'  => 'fa fa-bars',
        'fields' => array(

           // Header button
          array(
            'id'              => 'header_button_text',
            'type'            => 'text',
            'title'           => esc_html__('Header Button Text', 'redel'),
            'info'            => esc_html__('Add your button text here. Example : Get the App', 'redel'),
          ),
          array(
            'id'              => 'header_button_link',
            'type'            => 'text',
            'title'           => esc_html__('Header Button Link', 'redel'),
            'info'            => esc_html__('Add your button link here. Example : http://google.com', 'redel'),
          ),
          array(
            'id'    => 'open_new_tab',
            'type'  => 'switcher',
            'title' => esc_html__('Open New tab?', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'default' => true
          ),
          array(
            'id'             => 'choose_menu',
            'type'           => 'select',
            'title'          => esc_html__('Choose Menu', 'redel'),
            'desc'          => esc_html__('Choose custom menus for this page.', 'redel'),
            'options'        => 'menus',
            'default_option' => esc_html__('Select your menu', 'redel'),
          ),
          // end Header button

        ),
      ),
      // Header

      // Banner & Title Area
      array(
        'name'  => 'banner_title_section',
        'title' => esc_html__('Banner & Title Area', 'redel'),
        'icon'  => 'fa fa-bullhorn',
        'fields' => array(

          array(
            'id'    => 'hide_title_bar',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Title Bar', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
          ),
          array(
            'id'        => 'title_area_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Title Area Spacings', 'redel'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'redel'),
              'padding-xs' => esc_html__('Extra Small Padding', 'redel'),
              'padding-sm' => esc_html__('Small Padding', 'redel'),
              'padding-md' => esc_html__('Medium Padding', 'redel'),
              'padding-lg' => esc_html__('Large Padding', 'redel'),
              'padding-xl' => esc_html__('Extra Large Padding', 'redel'),
              'padding-no' => esc_html__('No Padding', 'redel'),
              'padding-custom' => esc_html__('Custom Padding', 'redel'),
            ),
            'default'  => 'padding-none',
            'dependency'   => array('hide_title_bar', '==', null),
          ),
          array(
            'id'    => 'title_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'redel'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'   => array('title_area_spacings|hide_title_bar', '==|==', 'padding-custom|'.null),
          ),
          array(
            'id'    => 'title_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'redel'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'   => array('title_area_spacings|hide_title_bar', '==|==', 'padding-custom|'.null),
          ),
          array(
              'id'             => 'banner',
              'type'           => 'select',
              'title'          => 'Select banner',
              'options'        => 'posts',
              'query_args'     => array(
                'post_type'    => 'banner',
                'orderby'      => 'post_date',
                'order'        => 'DESC',
                'posts_per_page'  => '-1',
              ),
              'default_option' => 'Select a banner',
            ),
            //background type
            array(
            'id'        => 'background_type',
            'type'      => 'select',
            'title'     => esc_html__('Choose Background', 'redel'),
            'options'   => array(
              ''          => 'Select Background',
              'image'     => 'Image',
              'self_hosted_video' => 'Video',
              //'hide-title-area'   => 'Hide Title/Banner Area',
            ),
            'dependency'   => array('banner', '!=', null),
          ),
          //image background
          array(
            'id'    => 'banner_area_bg',
            'type'  => 'background',
            'title' => esc_html__('Background Image', 'redel'),
            'dependency'   => array('background_type', '==', 'image'),
          ),
          array(
            'id'    => 'banner_wrap_class',
            'type'  => 'text',
            'title' => esc_html__('Banner Wrap Custom Class', 'redel'),
            'dependency'   => array('banner', '!=', null),
          ),
          //video poster image
          array(
            'id'    => 'video_poster',
            'type'  => 'image',
            'title' => esc_html__('Poster Image', 'redel'),
            'dependency'   => array('background_type', '==', 'self_hosted_video'),
          ),
          //video background
          array(
              'id'            => 'banner_video',
              'type'          => 'upload',
              'title'         => 'Upload Video',
              'settings'      => array(
                   'upload_type'  => 'video',
                   'button_title' => 'Video',
                   'frame_title'  => 'Select a video',
                   'insert_title' => 'Use this video',
                  ),
              'dependency'   => array('background_type', '==', 'self_hosted_video'),
            ),
          //video controls

          //autoplay
          array(
            'id'    => 'autoplay',
            'type'  => 'switcher',
            'title' => esc_html__('Autoplay video', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'dependency'   => array('background_type', '==', 'self_hosted_video'),
          ),
          //loop
          array(
            'id'    => 'loop',
            'type'  => 'switcher',
            'title' => esc_html__('Loop video', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'dependency'   => array('background_type', '==', 'self_hosted_video'),
          ),
          //mute
          array(
            'id'    => 'mute',
            'type'  => 'switcher',
            'title' => esc_html__('Mute video', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'dependency'   => array('background_type', '==', 'self_hosted_video'),
          ),

        ),
      ),
      // Banner & Title Area

      // Content Section
      array(
        'name'  => 'page_content_options',
        'title' => esc_html__('Content Options', 'redel'),
        'icon'  => 'fa fa-file',

        'fields' => array(

          array(
            'id'        => 'content_spacings',
            'type'      => 'select',
            'title'     => esc_html__('Content Spacings', 'redel'),
            'options'   => array(
              'padding-none' => esc_html__('Default Spacing', 'redel'),
              'padding-xs' => esc_html__('Extra Small Padding', 'redel'),
              'padding-sm' => esc_html__('Small Padding', 'redel'),
              'padding-md' => esc_html__('Medium Padding', 'redel'),
              'padding-lg' => esc_html__('Large Padding', 'redel'),
              'padding-xl' => esc_html__('Extra Large Padding', 'redel'),
              'padding-cnt-no' => esc_html__('No Padding', 'redel'),
              'padding-custom' => esc_html__('Custom Padding', 'redel'),
            ),
            'desc' => esc_html__('Content area top and bottom spacings.', 'redel'),
          ),
          array(
            'id'    => 'content_top_spacings',
            'type'  => 'text',
            'title' => esc_html__('Top Spacing', 'redel'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),
          array(
            'id'    => 'content_bottom_spacings',
            'type'  => 'text',
            'title' => esc_html__('Bottom Spacing', 'redel'),
            'attributes'  => array( 'placeholder' => '100px' ),
            'dependency'  => array('content_spacings', '==', 'padding-custom'),
          ),

        ), // End Fields
      ), // Content Section

      // Enable & Disable
      array(
        'name'  => 'hide_show_section',
        'title' => esc_html__('Enable & Disable', 'redel'),
        'icon'  => 'fa fa-toggle-on',
        'fields' => array(

          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'redel'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'redel'),
            'default' => true,
          ),
          array(
            'id'    => 'hide_footer',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
          ),
          array(
            'id'    => 'hide_footer_widget',
            'type'  => 'switcher',
            'title' => esc_html__('Hide Footer Widget Block', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'dependency'  => array('hide_footer', '==', null),
          ),
          array(
            'id'        => 'copyright_style',
            'type'      => 'select',
            'title'     => esc_html__('Select copyright section style', 'redel'),
            'options'   => array(

              'dark' => esc_html__('Dark', 'redel'),
              'light' => esc_html__('Light', 'redel'),
            ),
            //'default_option' => 'Select a banner',
            'dependency'  => array('hide_footer', '==', null),
          ),

        ),
      ),
      // Enable & Disable

    ),
  );

  // -----------------------------------------
  // Page Layout
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'page_layout_options',
    'title'     => esc_html__('Page Layout', 'redel'),
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'page_layout_section',
        'fields' => array(

          array(
            'id'        => 'page_layout',
            'type'      => 'image_select',
            'options'   => array(
              'full-width'    => REDEL_CS_IMAGES . '/page-1.png',
              //'extra-width'   => REDEL_CS_IMAGES . '/page-2.png',
              'left-sidebar'  => REDEL_CS_IMAGES . '/page-3.png',
              'right-sidebar' => REDEL_CS_IMAGES . '/page-4.png',
            ),
            'attributes' => array(
              'data-depend-id' => 'page_layout',
            ),
            'default'    => 'full-width',
            'radio'      => true,
            'wrap_class' => 'text-center',
          ),
          array(
            'id'            => 'page_sidebar_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'redel'),
            'options'        => redel_framework_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'redel'),
            'dependency'   => array('page_layout', 'any', 'left-sidebar,right-sidebar'),
          ),

        ),
      ),
    ),
  );

  // -----------------------------------------
  // Testimonial
  // -----------------------------------------
  $options[]    = array(
    'id'        => 'testimonial_options',
    'title'     => esc_html__('Testimonial Client', 'redel'),
    'post_type' => 'testimonial',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

      array(
        'name'   => 'testimonial_option_section',
        'fields' => array(

          array(
            'id'      => 'testi_name',
            'type'    => 'text',
            'title'   => esc_html__('Name', 'redel'),
            'info'    => esc_html__('Enter client name', 'redel'),
          ),
          array(
            'id'      => 'testi_name_link',
            'type'    => 'text',
            'title'   => esc_html__('Name Link', 'redel'),
            'info'    => esc_html__('Enter client name link, if you want', 'redel'),
          ),
          array(
            'id'      => 'testi_pro',
            'type'    => 'text',
            'title'   => esc_html__('Profession', 'redel'),
            'info'    => esc_html__('Enter client profession', 'redel'),
          ),
          array(
            'id'      => 'testi_pro_link',
            'type'    => 'text',
            'title'   => esc_html__('Profession Link', 'redel'),
            'info'    => esc_html__('Enter client profession link', 'redel'),
          ),

        ),
      ),

    ),
  );

  return $options;

}
add_filter( 'cs_metabox_options', 'redel_metabox_options' );