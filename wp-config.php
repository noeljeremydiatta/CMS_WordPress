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
define( 'DB_NAME', 'getech' );

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
define( 'AUTH_KEY',         'IoeQ5c!bK.^^B5+|%~eH*`JakktvqCAl3,rK}MGXCu`6=ezZ&vSSe6j-=qgw,ZJy' );
define( 'SECURE_AUTH_KEY',  'HEbZ,x66@MaP/6;5=J1QZ89xLslq^oMEsE-ZzfLZJDK[PT~[WD88-4H:~CbohN9E' );
define( 'LOGGED_IN_KEY',    '.Qc(7S&z$~n%=#Ja3<-4HD:@HpkwNwBg(@a-2S2$Y-L){Z1BDa.F+^&xKs}dbhHI' );
define( 'NONCE_KEY',        'iKEc)s`zzYUSuK5nXT8?{5<YJuMlnYaBjpoLg71.#gb{CCAjmic<!@F?txp>P_vL' );
define( 'AUTH_SALT',        'J#$JT&[DsS6A@B9(g}IBbKlZX+.>J(p*hiWkOsHGKU&ms!jdCyXO47yFHE5-|DJ{' );
define( 'SECURE_AUTH_SALT', 'tm7(?vA:t{HDnP=J3HT`zEe]aTdo7C8u|W>FBpq K#J(j$51$fauy&DdoD;bC%kh' );
define( 'LOGGED_IN_SALT',   ')5X@xRY6vYIUe27l0/|ktB3xnmVb[IGR;HCla5bPODEJW2wZH} =p(%456=9`oUs' );
define( 'NONCE_SALT',       'E*=7y|fZ9biYH9^,TB0|bQ+|D>Ww& l8q(!r],cG<n+Emp93xbYMbok&7tlVi,@H' );

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
