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
define('DB_NAME', 'allamoda');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '}mW8YattF&Sad+Oi-AV,zIXplu8-x},l;(Ym?5 sOp`1c!<#ub<-Y|h<-7@VuhV3');
define('SECURE_AUTH_KEY',  'Nx5hLgM.{a_dWhmWT}z5mv,Ojfa|{o{l[k|G2e-8%a;c1z R812aLV{5;x-Towse');
define('LOGGED_IN_KEY',    'LuK,rpB,e=i.QP:r|(0&GTkj-lFR39E|iEcw=n@}G5QU;U($K((ID#GkY=qYsiv;');
define('NONCE_KEY',        'M=a$j-3<U$nsL&~DE,6]H,Jz5,J9~?u7Aqc(fieZ<p~/%LZN~bzzj*rtruVYG+Dr');
define('AUTH_SALT',        '({?Nd0>;)QN/W?Z2#&4SI?VPO_uQI6E,DCe8?ur3$gx63~o/C(@2SgdlSD0z)m*,');
define('SECURE_AUTH_SALT', 'A.9f49rWMq)zvlntoMdhZMs9$xgq.99G^=|()2xPXJAi#uHy)9(Udj,THhETFWZ=');
define('LOGGED_IN_SALT',   ':j)qJ3~mj~ZERm.{V#fR-:67M`R_Hwe0^aM*`|(@Val>c!y+Ix$.,YW_K& ,eIt?');
define('NONCE_SALT',       '#fiA2`;p,DI4U@s-j7NB8v~l!o3RzT[$Q8U&`U=#XVp6GFZp9vRtYkDew^/RU`ky');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'all_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
