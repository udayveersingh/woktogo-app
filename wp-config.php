<?php
define('WP_CACHE', true); // WP-Optimize Cache
//Begin Really Simple SSL key
define('RSSSL_KEY', 'enNrg8PoxfyZog9q7LiZoRO0hubBHiC0DFyGbvQNuuZPlpW98NYeWyrYaVTPl81i');
//END Really Simple SSL key
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woktogoro' );
/** MySQL database username */
define( 'DB_USER', 'woktogoro' );
/** MySQL database password */
define( 'DB_PASSWORD', 'fjyWhE9hp*FywQwh' );
/** MySQL hostname */
define( 'DB_HOST', 'mysql-c6.argewebhosting.nl' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tCwkNgQAinMIhMdNvO5C4fvpXcmnieYQE7NHk560w1PiOi6ZcgdsmJu2pFQ6qLhB');
define('SECURE_AUTH_KEY',  'GryydaoowUkHTqcEuWjaKQ40UzwwWjFgxEqBFDs7aR8yaxBeOjGYOb8xbujxe3Ym');
define('LOGGED_IN_KEY',    'V0aODH5bdSDu6FOy97SsV5mrExEtt4RT7tUROS6MR6pRRD6gMn83wW9PznVDZhjg');
define('NONCE_KEY',        'Q0FZTIKD7Pfu08lqoSnQtp3YtaG5RxxHz1elm4o9FEG3anrI4SasfKKkJ5NMS4Nd');
define('AUTH_SALT',        'h3Ej9WCCSHWTONx5DTyYtuSEOK3xLmCdvPOKUa6tzFENym73lOWj48TLABi5XW6x');
define('SECURE_AUTH_SALT', 'xCjYmvjJTjer0b2Rm9x2KhSOwBc2giCNQX9hy6wgYx9PfdaCxqnMySoHUu7to7lt');
define('LOGGED_IN_SALT',   'bkuJoqSChza64e5XYZ9qSIBJxwNAk6x7RKR5yLcpIxkQtEGCVz9nV7vkUOcH69hw');
define('NONCE_SALT',       'sssodA6Hv39nFTOhcGqy4Ag2xHaUlBw3a1Z2SHQkitYjImooo65k3g4WJeRxQp2U');
/**
 * Other customizations.
 */
define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');
/**
 * Turn off automatic updates since these are managed externally by Installatron.
 * If you remove this define() to re-enable WordPress's automatic background updating
 * then it's advised to disable auto-updating in Installatron.
 */
define('AUTOMATIC_UPDATER_DISABLED', true);
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'xr4t_';
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'WP_MEMORY_LIMIT', '768M' );
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );