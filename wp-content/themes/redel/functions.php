<?php
/*
 * Redel Theme's Functions
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
*/

/**
 * Define - Folder Paths
 */
define( 'REDEL_THEMEROOT_PATH', get_template_directory() );
define( 'REDEL_THEMEROOT_URI', get_template_directory_uri() );
define( 'REDEL_CSS', REDEL_THEMEROOT_URI . '/assets/css' );
define( 'REDEL_IMAGES', REDEL_THEMEROOT_URI . '/assets/images' );
define( 'REDEL_SCRIPTS', REDEL_THEMEROOT_URI . '/assets/js' );
define( 'REDEL_FRAMEWORK', get_template_directory() . '/inc' );
define( 'REDEL_LAYOUT', get_template_directory() . '/layouts' );
define( 'REDEL_CS_IMAGES', REDEL_THEMEROOT_URI . '/inc/theme-options/theme-extend/images' );
define( 'REDEL_CS_FRAMEWORK', get_template_directory() . '/inc/theme-options/theme-extend' ); // Called in Icons field *.json
define( 'REDEL_ADMIN_PATH', get_template_directory() . '/inc/theme-options/cs-framework' ); // Called in Icons field *.json

/**
 * Define - Global Theme Info's
 */
if (is_child_theme()) { // If Child Theme Active
	$victor_theme_child = wp_get_theme();
	$victor_get_parent = $victor_theme_child->Template;
	$victor_theme = wp_get_theme($victor_get_parent);
} else { // Parent Theme Active
	$victor_theme = wp_get_theme();
}
define('REDEL_THEME_NAME', $victor_theme->get( 'Name' ));
define('REDEL_THEME_VERSION', $victor_theme->get( 'Version' ));
define('REDEL_THEME_BRAND_URL', $victor_theme->get( 'AuthorURI' ));
define('REDEL_THEME_BRAND_NAME', $victor_theme->get( 'Author' ));

/**
 * All Main Files Include
 */
require_once( REDEL_FRAMEWORK . '/init.php' );