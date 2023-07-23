<?php

/**

 * Plugin Name:             Change Storefront Footer Copyright Text
 * Plugin URI:              https://quadlayers.com
 * Description:             Allows you to change the official Woocommerce Storefront theme footer copyright credit text.
 * Version:                 2.0.6
 * Text Domain:             storefront-footer
 * Author:                  QuadLayers
 * Author URI:              https://quadlayers.com
 * License:                 GPLv3
 * Domain Path:             /languages
 * Request at least:        4.7.0
 * Tested up to:            6.2
 * Requires PHP:            5.6
 * WC requires at least:    4.0
 * WC tested up to:         7.9
 */

define( 'QLSTFT_PLUGIN_NAME', 'Storefront Footer' );
define( 'QLSTFT_PURCHASE_URL', 'https://quadlayers.com/portfolio/woocommerce-checkout-manager/?utm_source=qlstft_admin' );
define( 'QLSTFT_DEMO_URL', 'https://quadmenu.com/storefront?utm_source=qlstft_admin' );
define( 'QLSTFT_PLUGIN_FILE', __FILE__ );
define( 'QLSTFT_PLUGIN_DIR', __DIR__ . DIRECTORY_SEPARATOR );
define( 'QLSTFT_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'QLSTFT_PREFIX', 'qlstft' );
define( 'QLSTFT_DOMAIN', QLSTFT_PREFIX );
define( 'QLSTFT_REVIEW_URL', 'https://wordpress.org/support/plugin/woocommerce-checkout-manager/reviews/?filter=5#new-post' );
define( 'QLSTFT_SUPPORT_URL', 'https://quadlayers.com/account/support/?utm_source=wooccm_admin' );
define( 'QLSTFT_PREMIUM_SELL_URL', 'https://quadlayers.com/portfolio/woocommerce-direct-checkout/?utm_source=qlstft_admin' );

/**
 * Load composer autoload
 */
require_once __DIR__ . '/vendor/autoload.php';
/**
 * Load compatibility files
 */
require_once __DIR__ . '/compatibility/functions.php';
/**
 * Load vendor_packages packages
 */
require_once __DIR__ . '/vendor_packages/wp-i18n-map.php';
require_once __DIR__ . '/vendor_packages/wp-dashboard-widget-news.php';
require_once __DIR__ . '/vendor_packages/wp-plugin-table-links.php';
require_once __DIR__ . '/vendor_packages/wp-notice-plugin-promote.php';
/**
 * Load plugin classes
 */
require_once __DIR__ . '/lib/class-plugin.php';
