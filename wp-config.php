<?php
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'power_energy' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'e?maDWh,,c0lMejIo3zCwGn*o]T/m|Ua9U{Vvtg~y1c/V]4vy1un9D8t.W8{-cIA' );
define( 'SECURE_AUTH_KEY',  'cK36AegZ`!>W$8dq}~~kP4YH2lh]=D-%`4A:>4._tEd%:0DwMM[q<>vC$ UlGz(P' );
define( 'LOGGED_IN_KEY',    '8|l]g+3_gZX/1X8c pF`4_Eta1xp( [>?lKM4=(o`T,2-WSy@p`E m=@/CA_=0*B' );
define( 'NONCE_KEY',        '*JP$=#>4o]b$]K7SOD#o)-H@(2Elf 5?^Bp2B%rpH;[a-oJcvPqKa.Tu7ry^D-xb' );
define( 'AUTH_SALT',        '[.*YAarL-wT81Ss+8/o7crhfq-WxRQQug3 fe8jBvQI62I[<*Tysn2j.]#%bf|%D' );
define( 'SECURE_AUTH_SALT', '[&]t6b8n&{W^a[NAR2e9L]^DRr]0QdB0uF#c}q_eE1$hl zlXJ.Ca$X.p{tNr[V9' );
define( 'LOGGED_IN_SALT',   'Wiv?zj#8a+O~AsNq73Wj~|P%ia?~Yx.0rco!9cU 4qsO+m<<M}QWtD,ba@]|/.^E' );
define( 'NONCE_SALT',       '3EW|758pu~ar|OI7bY_KgOI}QWHq.!aj~G${Z,T QF>|`b+q|ErOjg8n#Xpe>R_l' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'pe_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
