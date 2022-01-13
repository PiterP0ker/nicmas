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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'tqKDoCi1baMbo12LI3wR27+3+fDo9hwr3+t+H7UeCRqSF74KdHI9xdhFipukL+pXyAqSGCJbH/b4N8ZRaPvceQ==');
define('SECURE_AUTH_KEY',  '2UTRCmKN4etfgYr0XZ60PFOh9FHM0ZITrMnwvkuO53T81wquJfubrdyo9/DvuChVY2MTIQykIjqjujmuURV+oA==');
define('LOGGED_IN_KEY',    'cK3Cj1guoCMbKEe9ezT3Ypn8jUl5rA+R0M0iR+lfYPaupO1ttoKyJzWWn0+muR+RbDUYMv085uicvbAacHFcCw==');
define('NONCE_KEY',        'jnRyvBISzD0EtWuVuxuix4HIF2iklf7qCOi9iDrE/JHA5CpwFvjN3Aoz+nUdAmKzNQ7OPyRVubd2qRGj9hbFiw==');
define('AUTH_SALT',        'kgBsv9LjBEd5VHBbLWmF4pfL5Z8UUAAhCV7r+flyfEXtszfpwxSo2zpkxpIDmsZZl4wJRtdse+F/UY4gTZoLCQ==');
define('SECURE_AUTH_SALT', 'eskPLb3arV8nNU31t6cuT9PuWUvEnBhzkfjTiF3GU7LmX13DdINsILPQQMdB0ePu6vC7KJnmFz1dftR68Nke4A==');
define('LOGGED_IN_SALT',   'g9XiRWG4hPk9PnfEl+Le/X2RMZpqtYGRSny+RFW3CXk+wmxTL3+aLZKwQs+piK+EaGIpt+wvwce8ln82OqolWw==');
define('NONCE_SALT',       '2iEwhbZqHzIDlcXtjk1Z1ewAXzfGxbpjA0SyylRb62hVSWzLVll846jhg5yiw/4XRUllpYQwomDUAz/lpfe9MQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
