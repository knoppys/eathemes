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
define('DB_NAME', 'eathemes_eathemes');

/** MySQL database username */
define('DB_USER', 'eathemes_eatempl');

/** MySQL database password */
define('DB_PASSWORD', 'Here979Nick04)');

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
define('AUTH_KEY',         ':jC4sh_s-Vwer%CK,j%k/N,bS+SC/B(80R+xy(3z2v6SW|:a%i_kALicSX+xW}v1');
define('SECURE_AUTH_KEY',  '2Jm1ecgj,`8w@Nnv^Qm@vnj##n>Xnp4?+H%sH5jDK62QwoQ>}tFn)UIgDm)H&]2f');
define('LOGGED_IN_KEY',    'q;=1*vj(]t|+<PW0h27Ci8M,(jk+CiGX.==<q1l}puIa;P<w|KcC5j1Hj6W-I41B');
define('NONCE_KEY',        'vGko$2_l-K+OG`;v:i+^#Nj-Lha-ZqjjhM^rAetUVh-i!yC-HyUu#m}6.o]_]x%.');
define('AUTH_SALT',        'iK:Oee&Vg0tHh{tc$,y_LPrMSWizU*A3+OR@/x-Hf{R*{fbCpQG:4%&{15i4ki-g');
define('SECURE_AUTH_SALT', ':Idl{aG}5H7]FQvFFX0RG7`8v1})cEzt=v5%=b-6)b}2,|+Qh$}|c<M*Pu4<Z:~-');
define('LOGGED_IN_SALT',   'tph+5mH zH`.*4vc-4wGG$lSz[CAXRtbSrW~_rp!NM5A|[{4|+m6U:5oCef}H`qy');
define('NONCE_SALT',       'Rn*Ogu 8GPk@81mb-q*P+Zy(p#`y##>yGpR46VW@E7mg+y0MS>uFv[835:!EJF*t');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'knp';

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

## Only save 2 post revisions
define( 'WP_POST_REVISIONS', 2 );

## Disable Editing in Dashboard
define('DISALLOW_FILE_EDIT', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
