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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'uppgift7');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         'D$m6>$Cv{t{%aq8e-ssS&VIs+fGe,qq)b_512r7aGF##B4!1BA/9kf9mKCZaEi`&');
define('SECURE_AUTH_KEY',  '#b%4tGYfZq7d)hI(Wbf0Rl@]CVaqmJ3U^[4HYvD>PMWAoTg$,yqzNEJb _>C:oBq');
define('LOGGED_IN_KEY',    'E{  LBk{=$y):-%GsE#drS@EP}4JiG!^/Yf6PRi-|{vJbGSpWEwRCHc-3%m)C;!j');
define('NONCE_KEY',        'e+%A;BfwCoDZ8W>|jjwFPt^83;spp3Toj9PB[x*8|C>%>0>I`!C>#30NsQ*g`%1d');
define('AUTH_SALT',        'RDOqC ,/.;ol`fL*:yZ+GkW~[qi /F/I*Jh$T4J|zKgcz3&Rb)aeXvK7hA**f0^N');
define('SECURE_AUTH_SALT', 'TG=Xi0).]e=`d|ghm3a~7!o988@szvP|N[:,oG}B#9Abg7eAzMt43P jK Tnv8|v');
define('LOGGED_IN_SALT',   'EJ/jN:$#bF9l5;3<2:-<.Mv*a*|B9;T>b|(ID.O#g|[XB:o)PKrpo pwS[G%(g?7');
define('NONCE_SALT',       'I[X@#%5h0pG`o a$9lwHX90QBi+^5gdy[X9Ps2gD0_mg8@ &lFL<GTf],|?%J;|0');

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
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
