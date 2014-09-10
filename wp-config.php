<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'resqDB');

/** MySQL database username */
define('DB_USER', 'resq');

/** MySQL database password */
define('DB_PASSWORD', 'resq');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ',UeyTNq0%PO}y/] ;B>mS$]1jQ|M]oDcM@$%7iw[ru>FpmqTldGd7`:4aZW`^Gn-');
define('SECURE_AUTH_KEY',  '13WVqRgU`g ya5e`POIQoj?v7sZEIi;rw4CIMe-%!.~,Q2w2|20,eZaBc2sGQNkw');
define('LOGGED_IN_KEY',    ':uex*tX?D|O*Th{kCWW}S&S^.>![bZ_hIkvm[8l-(S1m{!$m|pCTl4;q_ly^`s#X');
define('NONCE_KEY',        '9:K52-L^=O4jN6f^4FN=l:q+K^a!ymHd5D.(/6UJfAH9LOK/Ne29sBOlPYO.<zhk');
define('AUTH_SALT',        '1AbPjt(MfQJMf:&6r%L;},RBc]Gk@ny^e>x2i^9rSeu/{IT7n(CNo3+a3E^F4-QM');
define('SECURE_AUTH_SALT', 'g:B6<*cc -q6Lj5GsDj&2^h3<}%jdLnK#2@DY%_v`~j}k`.o7;}v])+Oop/*?UM&');
define('LOGGED_IN_SALT',   'PZAc*6tziLGgGq_PdlsKPy-;JQDB|&U`-!`kvNsUabcHsr>{SS?y|QAll-j+./a{');
define('NONCE_SALT',       '[)[7/cFr/%FSx$u)0_x62i,~^>RF8|!JW4jz_[e0Hy$^!2Le/vt0erIL&dDY[W09');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
