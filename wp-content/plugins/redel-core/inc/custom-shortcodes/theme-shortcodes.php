<?php
/*
 * All Custom Shortcode for Redel theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'vt_framework_shortcodes' ) ) {
  function vt_framework_shortcodes( $options ) {

    $options       = array();

    /* Video Link Shortcodes */
    $options[]     = array(
      'title'      => __('Video Shortcodes', 'redel'),
      'shortcodes' => array(

        // video
        array(
          'name'          => 'vt_video',
          'title'         => __('Video Link', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),
            array(
              'id'        => 'video_text',
              'type'      => 'text',
              'title'     => __('Video Text', 'redel')
            ),

            array(
              'id'        => 'icon_size',
              'type'      => 'select',
              'options'   => array(
                'small' => __('Small', 'redel'),
                'medium' => __('Medium', 'redel'),
                'large' => __('Large', 'redel'),
              ),
              'title'     => __('Select Icon size', 'redel'),
            ),
            array(
              'id'        => 'video_link',
              'type'      => 'text',
              'title'     => __('Video Link', 'redel'),

            ),

          ),

        ),
        // video link

      ),
    );
    /* Lists Shortcodes */
    $options[]     = array(
      'title'      => __('Lists Shortcodes', 'redel'),
      'shortcodes' => array(

        // lists
        array(
          'name'          => 'vt_lists',
          'title'         => __('Lists', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_list',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

            //select list style
            array(
              'id'        => 'list_style',
              'type'      => 'select',
              'options'   => array(
                 'feature-info-wrap' => __( 'Style One (Tick Mark)', 'redel-core' ) ,
                 'ul-half' => __( 'Style Two (2 Columns)', 'redel-core' ) ,
                 'overview-bullets' => __( 'Style Three (Custom Icon)', 'redel-core' ),
                 'redl-info-page' => __( 'Style Four (Simple Circle)', 'redel-core' ),
              ),
              'title'     => __('Select style', 'redel'),
            ),
            array(
              'id'        => 'number_bullets',
              'type'      => 'switcher',
              'title'     => __('Number bullets?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
              'dependency' => array('list_style', '==', 'overview-bullets'),
            ),

          ),
          'clone_fields'  => array(
                array(
                  'type' => 'icon',
                  'title' => __( 'Select Icon select_icon This is only for Style Three (Custom Icon)', 'redel-core' ),
                  'id' => 'select_icon',
                ),

                array(
                  'type' => 'textarea',
                  'title' => __( 'Text', 'redel-core' ),
                  'id' => 'list_text',
                ),
                //style
            //text size
            array(
              'type' => 'text',
              'title' => __( 'Text Size', 'redel-core' ),
              'id' => 'text_size',
            ),
            //text color
            array(
              'type' => 'color_picker',
              'title' => __( 'Text Color', 'redel-core' ),
              'id' => 'text_color',

            ),

            ),

        ),
        // lists link

      ),
    );
    /* AppStore & Google Play Store buttons Shortcodes */
    $options[]     = array(
      'title'      => __('Apple & Google Store Buttons', 'redel'),
      'shortcodes' => array(

        // play store button
        array(
          'name'          => 'vt_app_button',
          'title'         => __('Apple & Google Store Buttons', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),
            array(
              'type' => 'select',
              'title' => __( 'Type', 'redel-core' ),
              'options' => array(
                'apple' => __('AppStore', 'redel-core') ,
                'google' => __('Google Play Store', 'redel-core') ,
              ),
              'id' => 'type',

            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link url', 'redel')
            ),
            array(
              'id'        => 'open_new_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
              'default'      => true,
            ),

          ),

        ),
        // play store button
      ),
    );
    /* FAQ Nagivation Shortcodes */
    $options[]     = array(
      'title'      => __('FAQ Nagivation Shortcodes', 'redel'),
      'shortcodes' => array(

        // play store button
        array(
          'name'          => 'vt_faq_navigation',
          'title'         => __('FAQ Nagivation', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),
            array(
              'id'        => 'faq_limit',
              'type'      => 'text',
              'title'     => __('Limit (Enter the number of items to show)', 'redel'),
            ),
            array(
              'type' => 'select',
              'title' => __( 'Order', 'redel-core' ),
              'options' => array(
               '' => __( 'Select faq Order', 'redel-core' ) ,
                'ASC' => __('Asending', 'redel-core') ,
               'DESC' => __('Desending', 'redel-core') ,
              ),
              'id' => 'faq_order',
            ),
            array(
              'type' => 'select',
              'title' => __( 'Order By', 'redel-core' ),
              'options' => array(
                'none' => __('None', 'redel-core') ,
                'ID' => __('ID', 'redel-core') ,
                'author' => __('Author', 'redel-core') ,
                'title' => __('Title', 'redel-core') ,
               'date'  => __('Date', 'redel-core') ,
              ),
              'id' => 'faq_orderby',

            ),
            array(
              "type"        => 'text',
              "title"     => __('Show only certain faq? Enter faq ids (comma separated) you want to display.', 'redel-core'),
              "id"  => "faq_show",
              "value"       => "",
            ),

          ),

        ),
        // FAQ Nagivation Shortcodes

      ),
    );

    /* Header Shortcodes */
    $options[]     = array(
      'title'      => __('Header Shortcodes', 'redel'),
      'shortcodes' => array(

        // Address Info
        array(
          'name'          => 'vt_address_infos',
          'title'         => __('Address Info', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_info',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'address_style',
              'type'      => 'select',
              'options'   => array(
                'style-one' => __('Style One', 'redel'),
                'style-two' => __('Style Two', 'redel'),
              ),
              'title'     => __('Address Style', 'redel'),
            ),
            array(
              'id'        => 'info_icon',
              'type'      => 'icon',
              'title'     => __('Info Icon', 'redel')
            ),
            array(
              'id'        => 'info_icon_color',
              'type'      => 'color_picker',
              'title'     => __('Info Icon Color', 'redel'),
            ),
            array(
              'id'        => 'info_main_text',
              'type'      => 'text',
              'title'     => __('Main Text', 'redel')
            ),
            array(
              'id'        => 'info_main_text_link',
              'type'      => 'text',
              'title'     => __('Main Text Link', 'redel')
            ),
            array(
              'id'        => 'info_main_text_color',
              'type'      => 'color_picker',
              'title'     => __('Main Text Color', 'redel'),
            ),
            array(
              'id'        => 'info_sec_text',
              'type'      => 'text',
              'title'     => __('Secondary Text', 'redel'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_link',
              'type'      => 'text',
              'title'     => __('Secondary Text Link', 'redel'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'info_sec_text_color',
              'type'      => 'color_picker',
              'title'     => __('Secondary Text Color', 'redel'),
              'dependency'  => array('address_style', '==', 'style-one'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),

          ),

        ),
        // Address Info
      ),
    );

    /* Content Shortcodes */
    $options[]     = array(
      'title'      => __('Content Shortcodes', 'redel'),
      'shortcodes' => array(

        // Spacer
        array(
          'name'          => 'vc_empty_space',
          'title'         => __('Spacer', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'height',
              'type'      => 'text',
              'title'     => __('Height', 'redel'),
              'attributes' => array(
                'placeholder'     => '20px',
              ),
            ),

          ),
        ),
        // Spacer

        // Social Icons
        array(
          'name'          => 'vt_socials',
          'title'         => __('Social Icons', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_social',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'social_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'redel')
            ),
            array(
              'id'        => 'social_icon',
              'type'      => 'icon',
              'title'     => __('Social Icon', 'redel')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),

          ),

        ),
        // Social Icons

        // Useful Links
        array(
          'name'          => 'vt_useful_links',
          'title'         => __('Useful Links', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_useful_link',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'column_width',
              'type'      => 'select',
              'title'     => __('Column Width', 'redel'),
              'options'        => array(
                'full-width' => __('One Column', 'redel'),
                'half-width' => __('Two Column', 'redel'),
                'third-width' => __('Three Column', 'redel'),
              ),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title_link',
              'type'      => 'text',
              'title'     => __('Link', 'redel')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),
            array(
              'id'        => 'link_title',
              'type'      => 'text',
              'title'     => __('Title', 'redel')
            ),

          ),

        ),
        // Useful Links

        // Education List
        array(
          'name'          => 'vt_education_lists',
          'title'         => __('Education List', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_education_list',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'redel')
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bullet_color',
              'type'      => 'color_picker',
              'title'     => __('Bullet Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'redel'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'bullet_top_space',
              'type'      => 'text',
              'title'     => __('Bullet Top Space', 'redel'),
              'attributes' => array(
                'placeholder'     => 'Eg: 12px',
              ),
              'wrap_class' => 'column_full',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'title',
              'type'      => 'text',
              'title'     => __('Title', 'redel')
            ),
            array(
              'id'        => 'text',
              'type'      => 'text',
              'title'     => __('Text', 'redel')
            ),
            array(
              'id'        => 'text_link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Text Link', 'redel')
            ),

          ),

        ),
        // Education List

        // Simple Image List
        array(
          'name'          => 'vt_image_lists',
          'title'         => __('Simple Image List', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_image_list',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'get_image',
              'type'      => 'upload',
              'title'     => __('Image', 'redel')
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
              'title'     => __('Link', 'redel')
            ),
            array(
              'id'    => 'open_tab',
              'type'  => 'switcher',
              'std'   => false,
              'title' => __('Open link to new tab?', 'redel')
            ),

          ),

        ),
        // Simple Image List

        // Download Button
        array(
          'name'          => 'vt_download_btn',
          'title'         => __('Download Button', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'redel'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'redel'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'redel'),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'redel')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'redel')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'icon_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Icon Hover Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),
            array(
              'id'        => 'bg_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Background Hover Color', 'redel'),
              'wrap_class' => 'column_third el-hav-border',
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'redel')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),
            array(
              'id'        => 'icon_size',
              'type'      => 'text',
              'title'     => __('Icon Size', 'redel'),
              'attributes' => array(
                'placeholder'     => 'Eg: 18px',
              ),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
        ),
        // Download Button

        // Simple Link
        array(
          'name'          => 'vt_simple_link',
          'title'         => __('Simple Link', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'link_style',
              'type'      => 'select',
              'title'     => __('Link Style', 'redel'),
              'options'        => array(
                'link-underline' => __('Link Underline', 'redel'),
                'link-arrow-right' => __('Link Arrow (Right)', 'redel'),
                'link-arrow-left' => __('Link Arrow (Left)', 'redel'),
              ),
            ),
            array(
              'id'        => 'link_icon',
              'type'      => 'icon',
              'title'     => __('Icon', 'redel'),
              'value'      => 'fa fa-caret-right',
              'dependency'  => array('link_style', '!=', 'link-underline'),
            ),
            array(
              'id'        => 'link_text',
              'type'      => 'text',
              'title'     => __('Link Text', 'redel'),
            ),
            array(
              'id'        => 'link',
              'type'      => 'text',
              'title'     => __('Link', 'redel'),
              'attributes' => array(
                'placeholder'     => 'http://',
              ),
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

            // Normal Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Normal Mode', 'redel')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),
            // Hover Mode
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Hover Mode', 'redel')
            ),
            array(
              'id'        => 'text_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Text Hover Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'border_hover_color',
              'type'      => 'color_picker',
              'title'     => __('Border Hover Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
              'dependency'  => array('link_style', '==', 'link-underline'),
            ),

            // Size
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Font Sizes', 'redel')
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'redel'),
              'attributes' => array(
                'placeholder'     => 'Eg: 14px',
              ),
            ),

          ),
        ),
        // Simple Link

        // Blockquotes
        array(
          'name'          => 'vt_blockquote',
          'title'         => __('Blockquote', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'blockquote_style',
              'type'      => 'select',
              'title'     => __('Blockquote Style', 'redel'),
              'options'        => array(
                '' => __('Select Blockquote Style', 'redel'),
                'style-one' => __('Style One', 'redel'),
                'style-two' => __('Style Two', 'redel'),
              ),
            ),
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'redel'),
            ),
            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),
            array(
              'id'        => 'content_color',
              'type'      => 'color_picker',
              'title'     => __('Content Color', 'redel'),
            ),
            array(
              'id'        => 'left_color',
              'type'      => 'color_picker',
              'title'     => __('Left Border Color', 'redel'),
            ),
            array(
              'id'        => 'border_color',
              'type'      => 'color_picker',
              'title'     => __('Border Color', 'redel'),
            ),
            array(
              'id'        => 'bg_color',
              'type'      => 'color_picker',
              'title'     => __('Background Color', 'redel'),
            ),
            // Content
            array(
              'id'        => 'content',
              'type'      => 'textarea',
              'title'     => __('Content', 'redel'),
            ),

          ),

        ),
        // Blockquotes

        // List Styles
        array(
          'name'          => 'vt_address_lists',
          'title'         => __('Address Lists', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_address_list',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

            // Colors
            array(
              'type'    => 'notice',
              'class'   => 'info',
              'content' => __('Colors', 'redel')
            ),
            array(
              'id'        => 'text_color',
              'type'      => 'color_picker',
              'title'     => __('Text Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_color',
              'type'      => 'color_picker',
              'title'     => __('Title Color', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),

            // Size
            array(
              'id'        => 'text_size',
              'type'      => 'text',
              'title'     => __('Text Size', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),
            array(
              'id'        => 'title_size',
              'type'      => 'text',
              'title'     => __('Title Size', 'redel'),
              'wrap_class' => 'column_half el-hav-border',
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'list_title',
              'type'      => 'text',
              'title'     => __('Title', 'redel')
            ),
            array(
              'id'        => 'list_text',
              'type'      => 'textarea',
              'title'     => __('Text', 'redel')
            ),

          ),

        ),
        // List Styles

      ),
    );

    /* Footer Shortcodes */
    $options[]     = array(
      'title'      => __('Footer Shortcodes', 'redel'),
      'shortcodes' => array(

        // Footer Menus
        array(
          'name'          => 'vt_footer_menus',
          'title'         => __('Footer Menu Links', 'redel'),
          'view'          => 'clone',
          'clone_id'      => 'vt_footer_menu',
          'clone_title'   => __('Add New', 'redel'),
          'fields'        => array(

            array(
              'id'        => 'custom_class',
              'type'      => 'text',
              'title'     => __('Custom Class', 'redel'),
            ),

          ),
          'clone_fields'  => array(

            array(
              'id'        => 'menu_title',
              'type'      => 'text',
              'title'     => __('Menu Title', 'redel')
            ),
            array(
              'id'        => 'menu_link',
              'type'      => 'text',
              'title'     => __('Menu Link', 'redel')
            ),
            array(
              'id'        => 'target_tab',
              'type'      => 'switcher',
              'title'     => __('Open New Tab?', 'redel'),
              'on_text'     => __('Yes', 'redel'),
              'off_text'     => __('No', 'redel'),
            ),

          ),

        ),
        // Footer Menus
      ),
    );

  return $options;

  }
  add_filter( 'cs_shortcode_options', 'vt_framework_shortcodes' );
}