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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'crea8' );

/** Database username */
define( 'DB_USER', 'crea8' );

/** Database password */
define( 'DB_PASSWORD', 'Welcome4321$' );

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
define( 'AUTH_KEY',         '@M6E)#/16yn]EznK#7M^B~(E1T[sFbCS%Y3L/]}+Xb]r=+p, 8$nRr,CkxV5%L6X' );
define( 'SECURE_AUTH_KEY',  '40L$t:u9/Di!MhC7ZbHx`d%pcZU! r&Bw.3wT!nq]~}IOtqQO7+1GXjG+l8S9S)X' );
define( 'LOGGED_IN_KEY',    'N^RR.&AT#D,:Z)xodU<w,EmDAl|BeD@1idr,{4E%._Z%%IGF_EQ9vvbqd.]rw66p' );
define( 'NONCE_KEY',        '.>=@8gt?5u4R-l+doom*NZS7Hi%EK}AngL79s(m9^6%A`1pz<,Cce@.,-&Lc?{DQ' );
define( 'AUTH_SALT',        'FXPb4*F0pdVH6kye2&,Z-ot0_^d4M.E=)gR319yw(jUG,bfr-KJ9C|JQ&PuQ(2[(' );
define( 'SECURE_AUTH_SALT', 'Zwd|g?X#dhGRc%p)wm`BsSJN[2N+j:,7YcEciBy7D|zPu,*>bNo%<8W;7&Nisrkn' );
define( 'LOGGED_IN_SALT',   'bIn!a]YZ}}&SGVmeTj?qK-X_%}B(7l}<DW*&&]6*)o(ppQ}zZ@:/,t&6~1eg83L~' );
define( 'NONCE_SALT',       '>F<M>.OK2!--sw+_j9|6u;?);`]`[Ko5];{C<5Exy2:$vL[N9.W2sdab5ZPRcxV)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
