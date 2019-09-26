<?php
/*
 * All Theme Options for Redel theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

function redel_framework_settings( $settings ) {

  $settings           = array(
    'menu_title'      => REDEL_THEME_NAME . esc_html__(' Options', 'redel'),
    'menu_slug'       => sanitize_title(REDEL_THEME_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => REDEL_THEME_NAME .' <small>V-'. REDEL_THEME_VERSION .' by <a href="'. REDEL_THEME_BRAND_URL .'" target="_blank">'. REDEL_THEME_BRAND_NAME .'</a></small>',
  );

  return $settings;

}
add_filter( 'cs_framework_settings', 'redel_framework_settings' );

// Theme Framework Options
function redel_framework_options( $options ) {

  $options      = array(); // remove old options

  // ------------------------------
  // Theme Brand
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Brand', 'redel'),
    'icon'     => 'fa fa-bookmark',
    'sections' => array(

      // brand logo tab
      array(
        'name'     => 'brand_logo_title',
        'title'    => esc_html__('Logo', 'redel'),
        'icon'     => 'fa fa-star',
        'fields'   => array(

          // Site Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Site Logo', 'redel')
          ),
          array(
            'id'    => 'brand_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Default Logo', 'redel'),
            'info'  => esc_html__('Upload your default logo here. If you not upload, then site title will load in this logo location.', 'redel'),
            'add_title' => esc_html__('Add Logo', 'redel'),
          ),
          array(
            'id'    => 'floating_logo_default',
            'type'  => 'image',
            'title' => esc_html__('Floating Logo', 'redel'),
            'info'  => esc_html__('Upload your floating logo here. It shows when scroll down.', 'redel'),
            'add_title' => esc_html__('Add Logo', 'redel'),
          ),
          array(
            'id'    => 'brand_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Retina Logo', 'redel'),
            'info'  => esc_html__('Upload your retina logo here. Recommended size is 2x from default logo.', 'redel'),
            'add_title' => esc_html__('Add Retina Logo', 'redel'),
          ),
          array(
            'id'    => 'floating_logo_retina',
            'type'  => 'image',
            'title' => esc_html__('Floating Retina Logo', 'redel'),
            'info'  => esc_html__('Upload your floating retina logo here. Recommended size is 2x from default logo.', 'redel'),
            'add_title' => esc_html__('Add Floating Retina Logo', 'redel'),
          ),

          array(
            'id'          => 'retina_width',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Width', 'redel'),
            'unit'        => 'px',
          ),
          array(
            'id'          => 'retina_height',
            'type'        => 'text',
            'title'       => esc_html__('Retina & Normal Logo Height', 'redel'),
            'unit'        => 'px',
          ),

          // WordPress Admin Logo
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('WordPress Admin Logo', 'redel')
          ),
          array(
            'id'    => 'brand_logo_wp',
            'type'  => 'image',
            'title' => esc_html__('Login logo', 'redel'),
            'info'  => esc_html__('Upload your WordPress login page logo here.', 'redel'),
            'add_title' => esc_html__('Add Login Logo', 'redel'),
          ),
        ) // end: fields
      ), // end: section

      // Fav
      array(
        'name'     => 'brand_fav',
        'title'    => esc_html__('Fav Icon', 'redel'),
        'icon'     => 'fa fa-anchor',
        'fields'   => array(

            // -----------------------------
            // Begin: Fav
            // -----------------------------
            array(
              'id'    => 'brand_fav_icon',
              'type'  => 'image',
              'title' => esc_html__('Fav Icon', 'redel'),
              'info'  => esc_html__('Upload your site fav icon, size should be 16x16.', 'redel'),
              'add_title' => esc_html__('Add Fav Icon', 'redel'),
            ),
            array(
              'id'    => 'iphone_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone icon', 'redel'),
              'info'  => esc_html__('Icon for Apple iPhone (57px x 57px). This icon is used for Bookmark on Home screen.', 'redel'),
              'add_title' => esc_html__('Add iPhone Icon', 'redel'),
            ),
            array(
              'id'    => 'iphone_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPhone retina icon', 'redel'),
              'info'  => esc_html__('Icon for Apple iPhone retina (114px x114px). This icon is used for Bookmark on Home screen.', 'redel'),
              'add_title' => esc_html__('Add iPhone Retina Icon', 'redel'),
            ),
            array(
              'id'    => 'ipad_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad icon', 'redel'),
              'info'  => esc_html__('Icon for Apple iPad (72px x 72px). This icon is used for Bookmark on Home screen.', 'redel'),
              'add_title' => esc_html__('Add iPad Icon', 'redel'),
            ),
            array(
              'id'    => 'ipad_retina_icon',
              'type'  => 'image',
              'title' => esc_html__('Apple iPad retina icon', 'redel'),
              'info'  => esc_html__('Icon for Apple iPad retina (144px x 144px). This icon is used for Bookmark on Home screen.', 'redel'),
              'add_title' => esc_html__('Add iPad Retina Icon', 'redel'),
            ),

        ) // end: fields
      ), // end: section

    ),
  );

  // ------------------------------
  // Layout
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_layout',
    'title'  => esc_html__('Layout', 'redel'),
    'icon'   => 'fa fa-file-text'
  );

  $options[]      = array(
    'name'        => 'theme_general',
    'title'       => esc_html__('General', 'redel'),
    'icon'        => 'fa fa-wrench',

    // begin: fields
    'fields'      => array(

      // -----------------------------
      // Begin: Responsive
      // -----------------------------
      array(
        'id'    => 'theme_responsive',
        'type'  => 'switcher',
        'title' => esc_html__('Responsive', 'redel'),
        'info' => esc_html__('Turn off if you don\'t want your site to be responsive.', 'redel'),
        'default' => true,
      ),

      array(
        'id'    => 'theme_page_comments',
        'type'  => 'switcher',
        'title' => esc_html__('Page Comments', 'redel'),
        'info' => esc_html__('Turn On if you want to show comments in your pages.', 'redel'),
        'default' => true,
      ),

    ), // end: fields

  );

  // ------------------------------
  // Header Sections
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'redel'),
    'icon'     => 'fa fa-bars',
    'sections' => array(

      // header design tab
      array(
        'name'     => 'header_design_tab',
        'title'    => esc_html__('Design', 'redel'),
        'icon'     => 'fa fa-magic',
        'fields'   => array(

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
            'title' => esc_html__('Open New tab ?', 'redel'),
            'label' => esc_html__('Yes, Please do it.', 'redel'),
            'default' => false
          ),
          // end Header button

          // Extra's
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Extra\'s', 'redel'),
          ),
          array(
            'id'          => 'mobile_breakpoint',
            'type'        => 'text',
            'title'       => esc_html__('Mobile Menu Starts from?', 'redel'),
            'attributes'  => array( 'placeholder' => '991' ),
            'info' => esc_html__('Just put numeric value only. Like : 991. Don\'t use px or any other units.', 'redel'),
          ),
          array(
            'id'    => 'sticky_header',
            'type'  => 'switcher',
            'title' => esc_html__('Sticky Header', 'redel'),
            'info' => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'redel'),
            'default' => true,
          ),

        )
      ),

      // header banner
      array(
        'name'     => 'header_banner_tab',
        'title'    => esc_html__('Title Bar (or) Banner', 'redel'),
        'icon'     => 'fa fa-bullhorn',
        'fields'   => array(

          // Title Area
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Title Area', 'redel')
          ),
          array(
            'id'      => 'need_title_bar',
            'type'    => 'switcher',
            'title'   => esc_html__('Title Bar', 'redel'),
            'label'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'redel'),
            'default'    => true,
          ),
          array(
            'id'             => 'title_bar_padding',
            'type'           => 'select',
            'title'          => esc_html__('Padding Spaces Top & Bottom', 'redel'),
            'options'        => array(
              'padding-none' => esc_html__('Default Spacing', 'redel'),
              'padding-xs' => esc_html__('Extra Small Padding', 'redel'),
              'padding-sm' => esc_html__('Small Padding', 'redel'),
              'padding-md' => esc_html__('Medium Padding', 'redel'),
              'padding-lg' => esc_html__('Large Padding', 'redel'),
              'padding-xl' => esc_html__('Extra Large Padding', 'redel'),
              'padding-no' => esc_html__('No Padding', 'redel'),
              'padding-custom' => esc_html__('Custom Padding', 'redel'),
            ),
            'dependency'   => array( 'need_title_bar', '==', 'true' ),
          ),
          array(
            'id'             => 'titlebar_top_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Top', 'redel'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
          array(
            'id'             => 'titlebar_bottom_padding',
            'type'           => 'text',
            'title'          => esc_html__('Padding Bottom', 'redel'),
            'attributes' => array(
              'placeholder'     => '100px',
            ),
            'dependency'   => array( 'title_bar_padding', '==', 'padding-custom' ),
          ),
        )
      ),

    ),
  );

  // ------------------------------
  // Footer Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'redel'),
    'icon'     => 'fa fa-ellipsis-h',
    'sections' => array(

      // footer widgets
      array(
        'name'     => 'footer_widgets_tab',
        'title'    => esc_html__('Widget Area', 'redel'),
        'icon'     => 'fa fa-th',
        'fields'   => array(

          // Footer Widget Block
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Footer Widget Block', 'redel')
          ),
          array(
            'id'    => 'footer_widget_block',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Widget Block', 'redel'),
            'info' => __('If you turn this ON, then Goto : Appearance > Widgets. There you can see <strong>Footer Widget 1,2,3 or 4</strong> Widget Area, add your widgets there.', 'redel'),
            'default' => true,
          ),
          array(
            'id'    => 'footer_widget_layout',
            'type'  => 'image_select',
            'title' => esc_html__('Widget Layouts', 'redel'),
            'info' => esc_html__('Choose your footer widget layouts.', 'redel'),
            'default' => 3,
            'options' => array(
              1   => REDEL_CS_IMAGES . '/footer/footer-1.png',
              2   => REDEL_CS_IMAGES . '/footer/footer-2.png',
              3   => REDEL_CS_IMAGES . '/footer/footer-3.png',
              4   => REDEL_CS_IMAGES . '/footer/footer-4.png',
              5   => REDEL_CS_IMAGES . '/footer/footer-5.png',
              6   => REDEL_CS_IMAGES . '/footer/footer-6.png',
              7   => REDEL_CS_IMAGES . '/footer/footer-7.png',
              8   => REDEL_CS_IMAGES . '/footer/footer-8.png',
              9   => REDEL_CS_IMAGES . '/footer/footer-9.png',
            ),
            'radio'       => true,
            'dependency'  => array('footer_widget_block', '==', true),
          ),

        )
      ),

      // footer copyright
      array(
        'name'     => 'footer_copyright_tab',
        'title'    => esc_html__('Copyright Bar', 'redel'),
        'icon'     => 'fa fa-copyright',
        'fields'   => array(

          // Copyright
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Copyright Layout', 'redel'),
          ),
          array(
            'id'    => 'need_copyright',
            'type'  => 'switcher',
            'title' => esc_html__('Enable Copyright Section', 'redel'),
            'default' => true,
          ),

          array(
            'id'    => 'copyright_text',
            'type'  => 'textarea',
            'title' => esc_html__('Copyright Text', 'redel'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', true),
            'after'       => 'Helpful shortcodes: [vt_current_year] [vt_home_url] or any shortcode.',
          ),

          // Copyright Another Text
          array(
            'type'    => 'notice',
            'class'   => 'warning cs-vt-heading',
            'content' => esc_html__('Copyright Secondary Text', 'redel'),
            'dependency'     => array('need_copyright', '==', true),
          ),
          array(
            'id'    => 'secondary_text',
            'type'  => 'textarea',
            'title' => esc_html__('Secondary Text', 'redel'),
            'shortcode' => true,
            'dependency' => array('need_copyright', '==', 'true'),
          ),

        )
      ),

    ),
  );

  // ------------------------------
  // Design
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_design',
    'title'  => esc_html__('Design', 'redel'),
    'icon'   => 'fa fa-magic'
  );

  // ------------------------------
  // color section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'redel'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'redel'),
      ),
      array(
        'type'    => 'subheading',
        'wrap_class' => 'color-tab-content',
        'content' => __('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer.
          <br /><br />Highly customizable colors are in <strong>Appearance > Customize</strong>', 'redel'),
      ),

    ),
  );

  // ------------------------------
  // Typography section
  // ------------------------------
  $options[]   = array(
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'redel'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      // Start fields
      array(
        'id'                  => 'typography',
        'type'                => 'group',
        'fields'              => array(
          array(
            'id'              => 'title',
            'type'            => 'text',
            'title'           => esc_html__('Title', 'redel'),
          ),
          array(
            'id'              => 'selector',
            'type'            => 'textarea',
            'title'           => esc_html__('Selector', 'redel'),
            'info'           => __('Enter css selectors like : <strong>body, .custom-class</strong>', 'redel'),
          ),
          array(
            'id'              => 'font',
            'type'            => 'typography',
            'title'           => esc_html__('Font Family', 'redel'),
          ),
          array(
            'id'              => 'size',
            'type'            => 'text',
            'title'           => esc_html__('Font Size', 'redel'),
          ),
          array(
            'id'              => 'line_height',
            'type'            => 'text',
            'title'           => esc_html__('Line-Height', 'redel'),
          ),
          array(
            'id'              => 'css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'redel'),
          ),
        ),
        'button_title'        => esc_html__('Add New Typography', 'redel'),
        'accordion_title'     => esc_html__('New Typography', 'redel'),
        'default'             => array(
          array(
            'title'           => esc_html__('Body Typography', 'redel'),
            'selector'        => 'p, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], input[type="search"], input[type="date"], input[type="time"], input[type="datetime-local"], input[type="month"], input[type="url"], input[type="number"], textarea, select, .form-control, #carousel-c .item ul, .ul-half ul, .testimonial-owner .clearfix, .feature-info-wrap h4, .feature-info-wrap ul, .redl-main-container.container .feature-info-wrap ul, ul.overview-bullets li, blockquote, .wpb_text_column blockquote:last-child, .redl-info-page ul li span, .section-heading-wrap .section-sub-heading',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '',
          ),
          array(
            'title'           => esc_html__('Menu Typography', 'redel'),
            'selector'        => '.navbar-nav > li > a, .page .redl-banner-special.redl-header .navbar-nav, .error404 .redl-banner-special.redl-header .navbar-nav, .redl-header .navbar-nav',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '15px',
          ),
          array(
            'title'           => esc_html__('Sub Menu Typography', 'redel'),
            'selector'        => '.dropdown-menu li a',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
            'size'            => '14px',
            'line_height'     => '',
          ),
          array(
            'title'           => esc_html__('Secondary Font', 'redel'),
            'selector'        => 'body, h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .section-heading-wrap.style4 .section-sub-heading, input[type="submit"], .redl-btn, .redl-box-form label, .redl-free-trial .section-heading, .wpcf7 input[type="text"], .wpcf7 input[type="email"], .wpcf7 input[type="password"], .wpcf7 input[type="tel"], .wpcf7 input[type="search"], .wpcf7 input[type="date"], .wpcf7 input[type="time"], .wpcf7 input[type="datetime-local"], .wpcf7 input[type="month"], .wpcf7 input[type="url"], .wpcf7 input[type="number"], .wpcf7 select, .wpcf7 .form-control, .wpcf7 textarea, .error-content h1, .error-content h3, .secondary-wrap input[type="text"], .secondary-wrap input[type="email"], .secondary-wrap input[type="password"], .secondary-wrap input[type="tel"], .secondary-wrap input[type="search"], .secondary-wrap input[type="date"], .secondary-wrap input[type="time"], .secondary-wrap input[type="datetime-local"], .secondary-wrap  input[type="month"], .secondary-wrap input[type="url"], .secondary-wrap input[type="number"], .secondary-wrap textarea, .secondary-wrap select, .secondary-wrap .form-control, .form-pages .redl-box-form .forgot-link, .redl-header .redl-btn, .page .redl-banner-special.redl-header .redl-btn, .error404 .redl-banner-special.redl-header .redl-btn',
            'font'            => array(
              'family'        => 'Poppins',
              'variant'       => 'regular',
            ),
          ),
          array(
            'title'           => esc_html__('Example Usage', 'redel'),
            'selector'        => '.your-custom-class',
            'font'            => array(
              'family'        => 'Raleway',
              'variant'       => 'regular',
            ),
          ),
        ),
      ),

      // Subset
      array(
        'id'                  => 'subsets',
        'type'                => 'select',
        'title'               => esc_html__('Subsets', 'redel'),
        'class'               => 'chosen',
        'options'             => array(
          'latin'             => 'latin',
          'latin-ext'         => 'latin-ext',
          'cyrillic'          => 'cyrillic',
          'cyrillic-ext'      => 'cyrillic-ext',
          'greek'             => 'greek',
          'greek-ext'         => 'greek-ext',
          'vietnamese'        => 'vietnamese',
          'devanagari'        => 'devanagari',
          'khmer'             => 'khmer',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Subsets',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( 'latin' ),
      ),

      array(
        'id'                  => 'font_weight',
        'type'                => 'select',
        'title'               => esc_html__('Font Weights', 'redel'),
        'class'               => 'chosen',
        'options'             => array(
          '100'   => 'Thin 100',
          '100i'  => 'Thin 100 Italic',
          '200'   => 'Extra Light 200',
          '200i'  => 'Extra Light 200 Italic',
          '300'   => 'Light 300',
          '300i'  => 'Light 300 Italic',
          '400'   => 'Regular 400',
          '400i'  => 'Regular 400 Italic',
          '500'   => 'Medium 500',
          '500i'  => 'Medium 500 Italic',
          '600'   => 'Semi Bold 600',
          '600i'  => 'Semi Bold 600 Italic',
          '700'   => 'Bold 700',
          '700i'  => 'Bold 700 Italic',
          '800'   => 'Extra Bold 800',
          '800i'  => 'Extra Bold 800 Italic',
          '900'   => 'Black 900',
          '900i'  => 'Black 900 Italic',
        ),
        'attributes'         => array(
          'data-placeholder' => 'Font Weight',
          'multiple'         => 'multiple',
          'style'            => 'width: 200px;'
        ),
        'default'             => array( '400', '500', '600', '700' ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'font_family',
        'type'               => 'group',
        'title'              => 'Upload Custom Fonts',
        'button_title'       => 'Add New Custom Font',
        'accordion_title'    => 'Adding New Font',
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => 'Font-Family Name',
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.ttf</i>',
            ),
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.eot</i>',
            ),
          ),

          array(
            'id'             => 'svg',
            'type'           => 'upload',
            'title'          => 'Upload .svg <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.svg</i>',
            ),
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.otf</i>',
            ),
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'settings'       => array(
              'upload_type'  => 'font',
              'insert_title' => 'Use this Font-Format',
              'button_title' => 'Upload <i>.woff</i>',
            ),
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    ),
  );

  // ------------------------------
  // Pages
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_pages',
    'title'  => esc_html__('Pages', 'redel'),
    'icon'   => 'fa fa-files-o'
  );
  // ------------------------------
  // Blog Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'blog_section',
    'title'    => esc_html__('Blog', 'redel'),
    'icon'     => 'fa fa-edit',
    'sections' => array(

      // blog general section
      array(
        'name'     => 'blog_general_tab',
        'title'    => esc_html__('General', 'redel'),
        'icon'     => 'fa fa-cog',
        'fields'   => array(

          // Layout
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Layout', 'redel')
          ),

          array(
            'id'             => 'blog_listing_columns',
            'type'           => 'select',
            'title'          => esc_html__('Blog Listing Columns', 'redel'),
            'options'        => array(
              'evlt-blog-col-1' => esc_html__('Column One', 'redel'),
              'evlt-blog-col-2' => esc_html__('Column Two', 'redel'),
              'evlt-blog-col-3' => esc_html__('Column Three', 'redel'),
              'evlt-blog-col-4' => esc_html__('Column Four', 'redel'),
            ),
            'default_option' => 'Select blog column',
            'dependency'     => array('blog_listing_style', 'any', 'style-two,style-three'),
          ),
          array(
            'id'             => 'blog_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'redel'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'redel'),
              'sidebar-left' => esc_html__('Left', 'redel'),
              'sidebar-hide' => esc_html__('Hide', 'redel'),
            ),
            'default_option' => 'Select sidebar position',
            'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'redel'),
            'info'          => esc_html__('Default option : Right', 'redel'),
          ),
          array(
            'id'             => 'blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'redel'),
            'options'        => redel_framework_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'redel'),
            'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'redel'),
          ),
          // Layout
          // Global Options
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Global Options', 'redel')
          ),
          array(
            'id'         => 'theme_exclude_categories',
            'type'       => 'checkbox',
            'title'      => esc_html__('Exclude Categories', 'redel'),
            'info'      => esc_html__('Select categories you want to exclude from blog page.', 'redel'),
            'options'    => 'categories',
          ),
          array(
            'id'      => 'theme_blog_excerpt',
            'type'    => 'text',
            'title'   => esc_html__('Excerpt Length', 'redel'),
            'info'   => esc_html__('Blog short content length, in blog listing pages.', 'redel'),
            'default' => '55',
          ),
          array(
            'id'      => 'theme_metas_hide',
            'type'    => 'checkbox',
            'title'   => esc_html__('Meta\'s to hide', 'redel'),
            'info'    => esc_html__('Check items you want to hide from blog/post meta field.', 'redel'),
            'class'      => 'horizontal',
            'options'    => array(
              'category'   => esc_html__('Category', 'redel'),
              'date'    => esc_html__('Date', 'redel'),
              'author'     => esc_html__('Author', 'redel'),
              //'comments'      => esc_html__('Comments', 'redel'),
            ),
            'default' => '30',
          ),
          // End fields

        )
      ),

      // blog single section
      array(
        'name'     => 'blog_single_tab',
        'title'    => esc_html__('Single', 'redel'),
        'icon'     => 'fa fa-sticky-note',
        'fields'   => array(

          // Start fields
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Enable / Disable', 'redel')
          ),
          array(
            'id'    => 'single_featured_image',
            'type'  => 'switcher',
            'title' => esc_html__('Featured Image', 'redel'),
            'info' => esc_html__('If need to hide featured image from single blog post page, please turn this OFF.', 'redel'),
            'default' => true,
          ),
          array(
            'id'    => 'single_author_info',
            'type'  => 'switcher',
            'title' => esc_html__('Author Info', 'redel'),
            'info' => esc_html__('If need to hide author info on single blog page, please turn this OFF.', 'redel'),
            'default' => true,
          ),
          array(
            'id'    => 'single_share_option',
            'type'  => 'switcher',
            'title' => esc_html__('Share Option', 'redel'),
            'info' => esc_html__('If need to hide share option on single blog page, please turn this OFF.', 'redel'),
            'default' => true,
          ),
          array(
            'id'    => 'single_comment_form',
            'type'  => 'switcher',
            'title' => esc_html__('Comment Area/Form', 'redel'),
            'info' => esc_html__('If need to hide comment area and that form on single blog page, please turn this OFF.', 'redel'),
            'default' => true,
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Sidebar', 'redel')
          ),
          array(
            'id'             => 'single_sidebar_position',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Position', 'redel'),
            'options'        => array(
              'sidebar-right' => esc_html__('Right', 'redel'),
              'sidebar-left' => esc_html__('Left', 'redel'),
              'sidebar-hide' => esc_html__('Hide', 'redel'),
            ),
            'default_option' => 'Select sidebar position',
            'info'          => esc_html__('Default option : Right', 'redel'),
          ),
          array(
            'id'             => 'single_blog_widget',
            'type'           => 'select',
            'title'          => esc_html__('Sidebar Widget', 'redel'),
            'options'        => redel_framework_registered_sidebars(),
            'default_option' => esc_html__('Select Widget', 'redel'),
            'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
            'info'          => esc_html__('Default option : Main Widget Area', 'redel'),
          ),
          // End fields

        )
      ),

    ),
  );

  // ------------------------------
  // Advanced
  // ------------------------------
  $options[] = array(
    'name'   => 'theme_advanced',
    'title'  => esc_html__('Advanced', 'redel'),
    'icon'   => 'fa fa-cog'
  );

  // ------------------------------
  // Misc Section
  // ------------------------------
  $options[]   = array(
    'name'     => 'misc_section',
    'title'    => esc_html__('Misc', 'redel'),
    'icon'     => 'fa fa-recycle',
    'sections' => array(

      // custom sidebar section
      array(
        'name'     => 'custom_sidebar_section',
        'title'    => esc_html__('Custom Sidebar', 'redel'),
        'icon'     => 'fa fa-reorder',
        'fields'   => array(

          // start fields
          array(
            'id'              => 'custom_sidebar',
            'title'           => esc_html__('Sidebars', 'redel'),
            'desc'            => esc_html__('Go to Appearance -> Widgets after create sidebars', 'redel'),
            'type'            => 'group',
            'fields'          => array(
              array(
                'id'          => 'sidebar_name',
                'type'        => 'text',
                'title'       => esc_html__('Sidebar Name', 'redel'),
              ),
              array(
                'id'          => 'sidebar_desc',
                'type'        => 'text',
                'title'       => esc_html__('Custom Description', 'redel'),
              )
            ),
            'accordion'       => true,
            'button_title'    => esc_html__('Add New Sidebar', 'redel'),
            'accordion_title' => esc_html__('New Sidebar', 'redel'),
          ),
          // end fields

        )
      ),
      // custom sidebar section

      // Custom CSS/JS
      array(
        'name'        => 'custom_css_js_section',
        'title'       => esc_html__('Custom Codes', 'redel'),
        'icon'        => 'fa fa-code',

        // begin: fields
        'fields'      => array(

          // Start Custom CSS/JS
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom CSS', 'redel')
          ),
          array(
            'id'             => 'theme_custom_css',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your CSS code here...', 'redel'),
            ),
          ),

          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Custom JS', 'redel')
          ),
          array(
            'id'             => 'theme_custom_js',
            'type'           => 'textarea',
            'attributes' => array(
              'rows'     => 10,
              'placeholder'     => esc_html__('Enter your JS code here...', 'redel'),
            ),
          ),
          // End Custom CSS/JS

        ) // end: fields
      ),

      // Translation
      array(
        'name'        => 'theme_translation_section',
        'title'       => esc_html__('Translation', 'redel'),
        'icon'        => 'fa fa-language',

        // begin: fields
        'fields'      => array(

          // Start Translation
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('Common Texts', 'redel')
          ),
          array(
            'id'          => 'read_more_text',
            'type'        => 'text',
            'title'       => esc_html__('Read More Text', 'redel'),
          ),
          array(
            'id'          => 'share_on_text',
            'type'        => 'text',
            'title'       => esc_html__('Share On Tooltip Text', 'redel'),
          ),
          array(
            'id'          => 'author_text',
            'type'        => 'text',
            'title'       => esc_html__('Author Text', 'redel'),
          ),
          array(
            'id'          => 'post_comment_text',
            'type'        => 'text',
            'title'       => esc_html__('Post Comment Text [Submit Button]', 'redel'),
          ),
          array(
            'type'    => 'notice',
            'class'   => 'info cs-vt-heading',
            'content' => esc_html__('404 Page', 'redel')
          ),
          array(
            'id'          => 'error_title',
            'type'        => 'text',
            'title'       => esc_html__('404', 'redel'),
          ),
          array(
            'id'          => 'error_heading',
            'type'        => 'text',
            'title'       => esc_html__('Heading', 'redel'),
          ),
          array(
            'id'          => 'error_text',
            'type'        => 'text',
            'title'       => esc_html__('Text', 'redel'),
          ),
          array(
            'id'          => 'error_btn_text',
            'type'        => 'text',
            'title'       => esc_html__('Button Text', 'redel'),
          ),
          // End Translation

        ) // end: fields
      ),

    ),
  );

  // ------------------------------
  // backup                       -
  // ------------------------------
  $options[]   = array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields'   => array(

      array(
        'type'    => 'notice',
        'class'   => 'warning',
        'content' => 'You can save your current options. Download a Backup and Import.',
      ),

      array(
        'type'    => 'backup',
      ),

    )
  );

  return $options;

}
add_filter( 'cs_framework_options', 'redel_framework_options' );