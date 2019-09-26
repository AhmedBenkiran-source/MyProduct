<?php
/*
 * All customizer related options for Redel theme.
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

if( ! function_exists( 'redel_framework_customizer' ) ) {
  function redel_framework_customizer( $options ) {

	$options        = array(); // remove old options

	// Primary Color
	$options[]      = array(
	  'name'        => 'elemets_color_section',
	  'title'       => esc_html__('01. Primary Color', 'redel'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'      => 'all_element_colors',
				'default'   => '#036ded',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Elements Color', 'redel'),
					'description'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'redel'),
				),
			),
			array(
				'name'      => 'all_hover_colors',
				'default'   => '#0451d1',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Hover Color', 'redel'),
					'description'    => esc_html__('It\'s just hover color for buttons.', 'redel'),
				),
			),
	    // Fields End

	  )
	);
	// Primary Color

	// Header Color
	$options[]      = array(
	  'name'        => 'header_color_section',
	  'title'       => esc_html__('02. Header Colors', 'redel'),
	  'settings'    => array(

	    // Fields Start
			array(
				'name'          => 'header_main_menu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Main Menu Colors', 'redel'),
					),
				),
			),
			array(
				'name'      => 'header_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'redel'),
				),
			),
			array(
				'name'      => 'header_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'redel'),
				),
			),
			array(
				'name'      => 'header_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'redel'),
				),
			),

			// Sub Menu Color
			array(
				'name'          => 'header_submenu_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => esc_html__('Sub-Menu Colors', 'redel'),
					),
				),
			),
			array(
				'name'      => 'submenu_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'redel'),
				),
			),
			array(
				'name'      => 'submenu_bg_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Hover Color', 'redel'),
				),
			),
			array(
				'name'      => 'submenu_link_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Color', 'redel'),
				),
			),
			array(
				'name'      => 'submenu_link_hover_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Link Hover Color', 'redel'),
				),
			),
	    // Fields End

	  )
	);
	// Header Color

	// Title Bar Color
	$options[]      = array(
	  'name'        => 'titlebar_section',
	  'title'       => esc_html__('03. Title Bar Colors', 'redel'),
    'settings'      => array(

    	// Fields Start
    	array(
				'name'          => 'titlebar_colors_heading',
				'control'       => array(
					'type'        => 'cs_field',
					'options'     => array(
						'type'      => 'notice',
						'class'     => 'info',
						'content'   => __('<h2 style="margin: 0;text-align: center;">Title Colors</h2> <br /> This is common settings, if this settings not affect in your page. Please check your page metabox. You may set default settings there.', 'redel'),
					),
				),
			),
    	array(
				'name'      => 'titlebar_title_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Title Color', 'redel'),
				),
			),

			array(
				'name'      => 'titlebar_bg_color',
				'control'   => array(
					'type'  => 'color',
					'label' => esc_html__('Background Color', 'redel'),
				),
			),
	    // Fields End
	  )
	);
	// Title Bar Color

	// Content Color
	$options[]      = array(
	  'name'        => 'content_section',
	  'title'       => esc_html__('04. Content Colors', 'redel'),
	  'description' => esc_html__('This is all about content area text and heading colors.', 'redel'),
	  'sections'    => array(

	  	array(
	      'name'          => 'content_text_section',
	      'title'         => esc_html__('Content Text', 'redel'),
	      'settings'      => array(

			    // Fields Start
			    array(
						'name'      => 'body_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body & Content Color', 'redel'),
						),
					),
					array(
						'name'      => 'body_links_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Color', 'redel'),
						),
					),
					array(
						'name'      => 'body_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Body Links Hover Color', 'redel'),
						),
					),
					array(
						'name'      => 'sidebar_content_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Content Color', 'redel'),
						),
					),
			    // Fields End
			  )
			),

			// Text Colors Section
			array(
	      'name'          => 'content_heading_section',
	      'title'         => esc_html__('Headings', 'redel'),
	      'settings'      => array(

	      	// Fields Start
					array(
						'name'      => 'content_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Content Heading Color', 'redel'),
						),
					),
	      	array(
						'name'      => 'sidebar_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Sidebar Heading Color', 'redel'),
						),
					),
			    // Fields End
      	)
      ),

	  )
	);
	// Content Color

	// Footer Color
	$options[]      = array(
	  'name'        => 'footer_section',
	  'title'       => esc_html__('05. Footer Colors', 'redel'),
	  'description' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : Redel Options > Theme Options > Footer ', 'redel'),
	  'sections'    => array(

			// Footer Widgets Block
	  	array(
	      'name'          => 'footer_widget_section',
	      'title'         => esc_html__('Widget Block', 'redel'),
	      'settings'      => array(

			    // Fields Start
					array(
			      'name'          => 'footer_widget_color_notice',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => esc_html__('Content Colors', 'redel'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'footer_heading_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Heading Color', 'redel'),
						),
					),
					array(
						'name'      => 'footer_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Text Color', 'redel'),
						),
					),
					array(
						'name'      => 'footer_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Color', 'redel'),
						),
					),
					array(
						'name'      => 'footer_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Widget Link Hover Color', 'redel'),
						),
					),
			    // Fields End
			  )
			),
			// Footer Widgets Block

			// Footer Copyright Block
	  	array(
	      'name'          => 'footer_copyright_section',
	      'title'         => esc_html__('Copyright Block', 'redel'),
	      'settings'      => array(

			    // Fields Start
			    array(
			      'name'          => 'footer_copyright_active',
			      'control'       => array(
			        'type'        => 'cs_field',
			        'options'     => array(
			          'type'      => 'notice',
			          'class'     => 'info',
			          'content'   => __('Make sure you\'ve enabled copyright block in : <br /> <strong>redel > Theme Options > Footer > Copyright Bar : Enable Copyright Block</strong>', 'redel'),
			        ),
			      ),
			    ),
					array(
						'name'      => 'copyright_text_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Text Color', 'redel'),
						),
					),
					array(
						'name'      => 'copyright_link_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Color', 'redel'),
						),
					),
					array(
						'name'      => 'copyright_link_hover_color',
						'control'   => array(
							'type'  => 'color',
							'label' => esc_html__('Link Hover Color', 'redel'),
						),
					),

			  )
			),
			// Footer Copyright Block
	  )
	);
	// Footer Color

	return $options;

  }
  add_filter( 'cs_customize_options', 'redel_framework_customizer' );
}