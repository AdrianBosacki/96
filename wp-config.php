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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'xone' );

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
define( 'AUTH_KEY',         'f=TR6dIJz2Sz2U?2!}82Jspyrx>u4qV`qIM+`wn0M&!%c>RXZ)L~[0LV*];Ht5;%' );
define( 'SECURE_AUTH_KEY',  'VyLR01oXGgL4Fyi;Vd|&NEOeV_ix]g:Er/~=w:U&L>:v%Ym l|YL$C%~d~tZNZmQ' );
define( 'LOGGED_IN_KEY',    'z+v|IaqYtML6s;0nD8(,+)pR%k{bQJI1;ArXv6;U*l(K[G+-N?4=N@)ol`LS9S;$' );
define( 'NONCE_KEY',        'NnyY_(SMjmEHc;b&uea10V]p(0HZWSi9J-Z6v!k&_2u(;j^6,=RI?JE.$,drgTrC' );
define( 'AUTH_SALT',        '^0<;yZcR82P2s-ecw=+1bZ@]`LIStvvzupIO.~,=]a)LL#%Q;m0WAEIsl@8d6eUD' );
define( 'SECURE_AUTH_SALT', 'ifa!f73vVBb7N?p(+nQkKb]sBTjH3.T8JsX3b)[@/s?E0Gl<E!toi-1w}GmipFA`' );
define( 'LOGGED_IN_SALT',   'QX6VagZ~Aj7)KM,qZ[7JdKa4?SP7VR[&nky^/k*})eQ.&=n^JN.>>d;s*rYL2sr!' );
define( 'NONCE_SALT',       'm%qh$1#0x2elh-lA#WB*MbbV9wS5500[MJ^]{r~s}{^4_D-+~sOO8C}HR;NeyYwW' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
