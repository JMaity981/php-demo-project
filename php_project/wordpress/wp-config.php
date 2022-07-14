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
define('DB_NAME', 'subha');

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
define('AUTH_KEY',         'k&J}l{]4Jj?V*BX!i0QDfg&b0SHI!VH<bLOZ:K.T4:^;/*pb VMU{|0l$?rYhuhr');
define('SECURE_AUTH_KEY',  ' <WTx2p.c`YG?68muBDF5/gIp2qATRaQf#|6MV_NVu%%qj5ea}Xz{`-):@3:[;<.');
define('LOGGED_IN_KEY',    'g$YJPs(-4|dvZj)y%Y9y (G,v7|)Wb!BLv?iPdauc+jJ*g aUyfrYfIf}ZkzrLLj');
define('NONCE_KEY',        '~#hFL2;;&SmUknq6Bf(J9q4x?(;4lL73cuTeg aOf`B#c%^[emgg6JvAU=TLW_=2');
define('AUTH_SALT',        '3+1(X!GmsD_,?+J@vvVb7pNXpz;s8W-&ti SdkOM`cF`C%x!HqcU0BoxP<&:Ojx1');
define('SECURE_AUTH_SALT', '~`h qe*cF>E5<X.bzH@FbcmfPvkRbo#j70TD5E=vozbY{U~rTzED#aH:I4-C?7nA');
define('LOGGED_IN_SALT',   'T19uU88vaVa3ca>VpBB)tw2@ MlE25d8CXrrq0$h83w7:o6(nhcNkKNe[[Ur<fo1');
define('NONCE_SALT',       '&fs!*axN(ZKf,hHl*1]Ebc3M:$M2Cr<Gs9h#&.Al8<Vc61^:85oq^+_lw)JKVgf$');

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
