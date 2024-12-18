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
define( 'DB_NAME', 'whatthefake' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '~MhtbDl1NY><i2r{[:3FxU(2TJCx!/truB!;lSclgJzQ|vdE;UM]dGD/6_(`J_nF' );
define( 'SECURE_AUTH_KEY',  '{@wI?#a5qoyg4.SY9Yec!.$Kjv,d/_;5G4X{HF~Z7Rr !^;fsZEpg3vOsVK~y|G7' );
define( 'LOGGED_IN_KEY',    '@n;xm}nnIKpy:njKuFRl4f<siW{q2$@+Q~|HY2.j;-LPs,UkysZTV5ig3dn.zZIX' );
define( 'NONCE_KEY',        ';Q9D0L..gRJ-,f%WEp]Vczlx)Bz`Zp@dNSBc#fE::q6>(P+yW8IP[j@O.E@-QS^?' );
define( 'AUTH_SALT',        '4eyqdrtbHGu6DI7qK1X<b&WfJ1,X;Uacs!08FXk9ihA0.$GygH/>wS6%8L3C+9~@' );
define( 'SECURE_AUTH_SALT', ')YnP;/wl ;r^JVHaKEM<wlZysn1Qp36)i*7Nf``8bZu%|?2 hE8Xt~@?X4a]>@&M' );
define( 'LOGGED_IN_SALT',   'Lb}LTD.mt}-?A(c(w26=eX6I9^@q,^ LA=_@Z(rmJ=}^A$w}]HF_ #uI0eTj9?}-' );
define( 'NONCE_SALT',       '-./>o9U6d3CJYH ^y;{3rc*[40d-:NC^1;JErMe!i>;Ar:fc}-j(&xbaI+afUiq<' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
