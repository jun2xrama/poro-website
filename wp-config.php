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
define('DB_NAME', 'poro-website');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'I4y?_jclMth~d)`2R=/g>V6;*2UQs.HSs6<Kp4)Jsi)x}zN OmNCo$NA 5.>omJR');
define('SECURE_AUTH_KEY',  '(wrG3+9XUSiH99sg$po:9{s;(.D.!??t[7LXM)Xg{*Os2,hUk71`Er )Vey@}Kps');
define('LOGGED_IN_KEY',    'm/5[o3B{yaD/{]9z:f::zLM> f.ogsLav^g9O.q_LF|Ctt)6onK3(?[:Ks>A;pp{');
define('NONCE_KEY',        'jJ8F3P+15X=q?_(Ey!!e]Ypbfybi${,Hcu7jd;r#z?ymGX$?2m_%!I)e9vq{JqxF');
define('AUTH_SALT',        'vU`;4>34R0FFkEIuk]/aKvTQ!ad0b^$k3Rs[o)I^ul}8a#@:Q~sd~JYCw36NYc(f');
define('SECURE_AUTH_SALT', 'c=~1lS~(XrP5]l+@rtn&UNLGPQP%2E50)]i(9n>xTaJ,Ox-7_Gs3]BAg&*qyWM.n');
define('LOGGED_IN_SALT',   'HA,p|@7wBWL*N*j$<OSi&d%}4smgB6#*C8`F0s_mD%=b>=Y;5>8eZ]w i2At6:_9');
define('NONCE_SALT',       'VUW^y(wI5{KTe.3M]oulUXZ+t0jNDZ?`?==bT]AFK;(tBky23]0&uY!32891}Kue');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
