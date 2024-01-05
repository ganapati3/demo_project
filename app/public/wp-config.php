<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'Lr{~OzMQz=Vc!mHq[{9W7Fx#~ZSlmpA9J_{KQ&Ha jeLZcb; nTbGb[fTXGjQL]_' );
define( 'SECURE_AUTH_KEY',   'M^N>#PyH:_H%MS ebJS0Hu^V{6s6[mg|}a!O)_Cf,nqX~Q(lv^VK{eV,eN|z7(S:' );
define( 'LOGGED_IN_KEY',     '&$HtN&O<6BKS6iDm/fn^Z@i!Figl:)vr2opP;~!gU==j0%/dcj8MF k6V/:qgV{/' );
define( 'NONCE_KEY',         'siqg^rdYa^f7zB$6k(Wqrx]9q}XXfHttV:o`Aj7UcY]]>{qG#Cye<p[c$E68Vh]n' );
define( 'AUTH_SALT',         'ny/A.[sfrQ6QXy[`SA2@fowyYEdPvE.2GT$rVREc!bFCbU.:B[YW7+`><35:s4{$' );
define( 'SECURE_AUTH_SALT',  '?_4z3LG;R_!P)/?+8%OdKW$3VmX>=h;m`;{en+32.Mgh52RPlKiW+D+?|_ssSR!*' );
define( 'LOGGED_IN_SALT',    'tBF:H&kBrjw.Z~mo:C;+F4_rqhXP:gG8A&I]&W>t!K:?R3P=}x!u}v8Qm~pX_RHV' );
define( 'NONCE_SALT',        '^}sDk]+YKT>R, 1UKIO$J}(ufBqIiX nn(z8olHkS$[PvxXf+08(>9H7iOR]hSSb' );
define( 'WP_CACHE_KEY_SALT', '^phc?i*;x 8v15jynt@YtuQP[.z9+*bO.H06&f^6=iEm/&VpS:iv_Z+jjwa_@B:5' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
