<?php
/*
 * All Redel Theme Related Functions Files are Linked here
 * Author & Copyright: VictorThemes
 * URL: https://victorthemes.com
 */

/* Theme All Basic Setup */
require_once( REDEL_FRAMEWORK . '/theme-support.php' );
require_once( REDEL_FRAMEWORK . '/backend-functions.php' );
require_once( REDEL_FRAMEWORK . '/frontend-functions.php' );
require_once( REDEL_FRAMEWORK . '/enqueue-files.php' );
require_once( REDEL_CS_FRAMEWORK . '/custom-style.php' );
require_once( REDEL_CS_FRAMEWORK . '/config.php' );

/* Bootstrap Menu Walker */
require_once( REDEL_FRAMEWORK . '/core/vt-mmenu/wp_bootstrap_navwalker.php' );

/* Install Plugins */
require_once( REDEL_FRAMEWORK . '/plugins/notify/activation.php' );

/* Aqua Resizer */
require_once( REDEL_FRAMEWORK . '/plugins/aq_resizer.php' );

/* Sidebars */
require_once( REDEL_FRAMEWORK . '/core/sidebars.php' );
