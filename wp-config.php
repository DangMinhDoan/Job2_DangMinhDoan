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
define( 'DB_NAME', 'little' );

/** Database username */
define( 'DB_USER', 'minhdoan' );

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
define( 'AUTH_KEY',         ']t]ZAXWd(BNSf3JAh|oI^L[0eQi2gn(8FW=$lb*TY%;9f+o?J9JlKa7W|V$R6-cQ' );
define( 'SECURE_AUTH_KEY',  'VMqn$d5V<(kt],Ax~FyB-d[5a9WR4/3U2La->5K`F_$&[)8MmoC]<#U/Tck`:Esz' );
define( 'LOGGED_IN_KEY',    'FI9|UD18DT/{9O sy`+K_T7bD!kxXT#o}7oCc_6tuIiSbG-8okcOJO8*HV@WvVY>' );
define( 'NONCE_KEY',        '|B`_]-E/f7kht%^%DzWT^(0/ds:-bDPOB`Zo</dbErMfNYk8wW4cc$0 *9=+%8#9' );
define( 'AUTH_SALT',        'wZmna M/wm!<6?:<5CQDM@-U,%:U5L2{R)r}RcVUosq5)-V=,*pH}73KUh+*Lh0f' );
define( 'SECURE_AUTH_SALT', 'ILt Of((|zX@[ji6-z~=>%E3J/$]{=>42.QSGc,,`zYZ(y3Ybc8cF[>oh)%J]?(X' );
define( 'LOGGED_IN_SALT',   '(IS(z**uwX7{,oMhxa@VN z!I`jsiyO5rAzDw.Ql.}F%dl)&26@c?3j&^)%)+6HF' );
define( 'NONCE_SALT',       'D9ngR 7P8;ab[e?RK;yH{uj?Z7K0jI,bkN(baTrEDnjCKXkdu&j>e*po53{pIA$2' );

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
