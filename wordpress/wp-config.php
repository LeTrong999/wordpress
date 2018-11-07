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
define('DB_NAME', 'wordpress');

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
define('AUTH_KEY',         '|4P1||:(KvHAU&Fc4_Ol83JG`%#GlX[DXI`[_R^vqLm]BOwK%X{GB3r{t8]0dJVk');
define('SECURE_AUTH_KEY',  'f%O9_[_>vR7?Vj%vfpy|>.*![i<dI5]w2eljn`?Bg]5?T#!79 )i&Wn)8]uGmG R');
define('LOGGED_IN_KEY',    'f{(R;r !b8@~FSi`yP*L__$c>N5wTEKFTZ%Z#L<+/6ml<lGe_^A-EIrQlOs>5LpU');
define('NONCE_KEY',        'o=~/FI&z?uS11+%0ZWNvekzLnUA.|sFj9`!Q:[l;AS_!y_(`(quIIWDfDr#0!!V_');
define('AUTH_SALT',        'z[Q%.|>9qkIY%IDw^F-t1QUGiwXF+NboHL:GaS7leO2jVRc?Aj =w x8<|oglWUo');
define('SECURE_AUTH_SALT', 'YE5wI[MF2FzhW_`&KE7>*+=I``O0XzFP|#fr_:Wz7M]=0TI*|P]+W@1~4v^}8W)x');
define('LOGGED_IN_SALT',   '5:U^CKG9v:mVvF0CS!cf!Nz&25)Pn(gGp^nu*:1Oy-UP`1gpt2U3N^SkCUlnW-w~');
define('NONCE_SALT',       'a|Ob/sOXzgF3Wa5 @H}}LdRk?5y0LQ=><>,0k-]@z@ebDW?W0|1sLlS^!WIA6Fu)');

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
