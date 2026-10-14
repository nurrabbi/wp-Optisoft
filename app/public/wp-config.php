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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'DFu<C%/6l?$o_$ ,NT;J}Aw]6TiTde)J5+:+vgCH?j-+aHHKE~:hjI1*(X_ Us[C' );
define( 'SECURE_AUTH_KEY',   'PBOe{;fb$;+1f7rb}+o[<6*11ocD}a]e]t;_OhQ6N$3^<Op( fr^ZxLd8S&XVq[b' );
define( 'LOGGED_IN_KEY',     '|g=btc}rBJIss0z28tM=c>1qc|7VZWwySXp6V:Uw~UJ.zSJyif<n&?RHCoX%#>tX' );
define( 'NONCE_KEY',         'WL i0b0*oqQlO3V?+,g$Q+=n+ckKozF_*&~CgV(@Z<>:J72)`~/KP1Ixyx|o{,z!' );
define( 'AUTH_SALT',         'Ff9N`73FEJ/1:4mO }lO;<m~Y1WucUIhqe.-F)on?7W6z`KKNnSC)ySh+%#vi;f!' );
define( 'SECURE_AUTH_SALT',  'PTN)B.3.)J_G)#c YS{J!(N(*)(D5zWX`1,+p?9YggNJ]%3WwBtQz{pDKg#*/>c@' );
define( 'LOGGED_IN_SALT',    '6:Ryfnbx$u4?,.{0=4HAa5`QOiCEwHjsCTxo:Q4GL2^sliS y(.2r;YneL{%8%Dm' );
define( 'NONCE_SALT',        'p&Z&>)lMk1~*:k2,}OZ8FBEzhin] g=S*/]BxY%P;jHNM@NdoRbi(?H+8Oxt&v**' );
define( 'WP_CACHE_KEY_SALT', '(XsEV4< WxniknnsXQ6w2zdKPD{gxTH`0nyv$uF!A(k$wu#IkkuPRjTa%f{6o%k=' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
