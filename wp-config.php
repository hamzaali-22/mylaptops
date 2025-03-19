<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'mylaptopdbc' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'iasDoTC=!c=tBLjI%BB~=Wtn-#)R9]#T08.eBB>C^&#Hf(/gsCJGTo#:_@A=OLX1' );
define( 'SECURE_AUTH_KEY',  '~D]Ohu6v.-Z3OTVPVE-Y2+owCa&#dsOS*iL.wa*tQ,MbzeIu2 vO7XHjfL]5f&T3' );
define( 'LOGGED_IN_KEY',    '99<_7ovMQ&`UG9c5sux#H:te.w=x.:>{IxSLn(z(Cl>1lj#DAExW1VGG~%y$Rc!?' );
define( 'NONCE_KEY',        '_}`nL[*6l<yXT}/`=}>i vp/=7`LmErW *ww5JQ![2H8cfIXwB>$#dt_Z$N rrGU' );
define( 'AUTH_SALT',        'nvZ8g]TafQEg3,)9ubq63^%3]BXS9i){Iyce#:0_w8xgoZ5t{E*8Gv<0@GO]I)wT' );
define( 'SECURE_AUTH_SALT', 'k+-05$bzVR$!M& {${/YZf#sQ&VteGX{RXvni&W8!9Ly#X/hy4cK4a&0+m%BKGZ(' );
define( 'LOGGED_IN_SALT',   '_Pj/VA#=u|q(HaYxYm-8Z=;I;_ez{G-kq}4;#0^3*89ry?T~Vfs7I:$f]4vuG*o|' );
define( 'NONCE_SALT',       'jVuMJZ4|t7YJbOs:S7 0ym,m@E8}9|-Py1&(.$]k-^)-mL7HX1`OA3Fg|Dfyvl%Q' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_mylap_2025';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
