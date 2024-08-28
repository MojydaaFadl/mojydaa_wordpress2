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
define( 'DB_NAME', 'e-recrumitment' );

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
define( 'AUTH_KEY',         'JNTq|bI9.6r%XD~T .k2&Vc`612(]3!O5zQT59VKNxmTWg_i$^#iL<5(u-M!HfCp' );
define( 'SECURE_AUTH_KEY',  '*lb4aLHdfLi4SU4,Uj0ryN+= ;<8R!Os.:XY#&,26hHrgdm`$Uf-]9i,pfN2pp!s' );
define( 'LOGGED_IN_KEY',    'Al!VbuWswan>4m$!=P`s.G?#FcFAwZ`XJC,X><[~ZT^ ]N`oAgKrF*]}`SQQwAG}' );
define( 'NONCE_KEY',        '(O_$!,We|YSk-Uc4(ked r}pFQcWIJEr0.;,qCU<]B}3SJ5`>C[^TkS<I2OWQ~3P' );
define( 'AUTH_SALT',        '<bv^dg4D8Sn<K].]pIU<ns@@NqhS:fpl8e;s#?-NTUd2F1P?)^R6]pRi>4CTlJT%' );
define( 'SECURE_AUTH_SALT', 'yxxNNP<q,$Lf2<iO&;k<XGJx>/I@Y[|zrglO+tG+L+u6D+=!JsM3YuFCL~;mvX#&' );
define( 'LOGGED_IN_SALT',   'pkW(:~Gr)UxJ|!Ed+9F*~kO!BTBxMJ],>|(ZuI;J s[mW^jjCtgzUhg%,VUip?|_' );
define( 'NONCE_SALT',       'dLZ_oc}BD]yt1u1kgO=9|VZ{jkila%v4[~b{hcHIm09#xGSDv~<qE*k:fOG(15=f' );

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
