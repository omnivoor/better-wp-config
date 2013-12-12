<?php

/**
 * Define the type of server.
 * Note: Define them all, don't skip one if other is already defined
 */
$local			=	'wp-config-local.php';
$development	=	'wp-config-development.php';
$staging		=	'wp-config-staging.php';
$production		=	'wp-config-production.php';

define('WP_LOCAL_SERVER', file_exists(ABSPATH . $local));
define('WP_DEV_SERVER', file_exists(ABSPATH . $development));
define('WP_STAGING_SERVER', file_exists(ABSPATH . $staging));

if (WP_LOCAL_SERVER) {

	require ABSPATH . $local;

} else if (WP_DEV_SERVER) {

	require ABSPATH . $development;

} elseif (WP_STAGING_SERVER) {

	require ABSPATH . $staging;

} else {

	require ABSPATH . $production;

}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (WP_LOCAL_SERVER || WP_DEV_SERVER) {

	define('WP_DEBUG', true);
	define('WP_DEBUG_LOG', true); // Stored in wp-content/debug.log
	define('WP_DEBUG_DISPLAY', true);
	define('SCRIPT_DEBUG', true);
	define('SAVEQUERIES', true);

} else if (WP_STAGING_SERVER) {

	define('WP_DEBUG', true);
	define('WP_DEBUG_LOG', true); // Stored in wp-content/debug.log
	define('WP_DEBUG_DISPLAY', false);

} else {

	define('WP_DEBUG', false);

}

/**
 * If you don’t plan on using revisions to check the “earlier versions”
 * of your posts, you definitely should disable this feature.
 */
define('WP_POST_REVISIONS', false);

/**
 * The first constant disables the editing of theme and plugin files.
 * The second constant disables installing & updating themes and plugins.
 */
define('DISALLOW_FILE_EDIT', false);
define('DISALLOW_FILE_MODS', false);

/**
 * If you ever need to move your website to a new domain (or a new subdomain,
 * or a new folder), define this constant before moving your files and database.
 * Log in with your WP credentials on yournewwebsite.com/login.php and after that,
 * check if the home URL has changed on the General Options page. After confirming
 * that it has changed, disable the constant again.
 */
define('RELOCATE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
