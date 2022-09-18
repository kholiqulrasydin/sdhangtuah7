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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hangtuah' );

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
define( 'AUTH_KEY',         's5{Q=vVY(4c685=-f:PI0L{}D:Ar25#R>hq(J+;.gdS.5?5 m^-Myn@FdIm*80%a' );
define( 'SECURE_AUTH_KEY',  'Fkj?$)`3&;2NGEaP|-JIBwQw} 8|JpC0+<@AIz3z-4NP2o-g)-xDmH$4,Ya,s07Q' );
define( 'LOGGED_IN_KEY',    'eGYNvV}O>hNa=$y?X&J9*~;`~5#=d?b*vm:54<DOHr &[miL]6%#1k}y`KJ~qo^m' );
define( 'NONCE_KEY',        ';{,J)t!w&$:S2+isvDIv>1rDK}Z5i4<fbonkP}svjvfNDK(^5=d;%(p+wWBh6vaq' );
define( 'AUTH_SALT',        '||ymtToU%Ua_j7#^UQ>OpFK>Z=r6?aWd8m(L83>n0n{<8{/M>orTQ79!tl[:_B`8' );
define( 'SECURE_AUTH_SALT', 'NoY*uy(96QeKtMT<CQ9c4DM1l[&Gll[:F0O~~bezi78cWP6&m+=llab&~sXs`S;J' );
define( 'LOGGED_IN_SALT',   'aRj@xAy(2*aL-|~&kE /j>*&NoTGs_nGu2nL6[>@-|neIa0z(0h&:IqtLehrND`(' );
define( 'NONCE_SALT',       'a*cBHY>uQ9p/n{S2gb4_q% }!Or5(H]f<{6;Kp2QwIWsZV,E=<dJ6.,`Q+,>Ws.n' );
define(	'JWT_AUTH_SECRET_KEY', 'becomeNicePeopleThroughSdHangtuah7');
define(	'JWT_AUTH_CORS_ENABLE', true);

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'sdhangtuah7_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
