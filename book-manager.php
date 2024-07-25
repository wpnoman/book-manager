<?php
/**
 * Plugin Name: Book Manager
 * Description: 
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: sbnoman01
 * Author URI: https://codexpert.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: book-manager
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Define constance
 */

define( 'BKM_VERSION', '1.0.0' );

define( 'BKM_ADDONS_URL', plugins_url( '/', __FILE__ ) );
define( 'BKM_ADDONS_DIR', dirname( __FILE__ ) );
define( 'BKM_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
define( 'BKM_ASSETS', BKM_ADDONS_URL . 'assets/' );
define( 'BKM_INCLUDE_PATH', BKM_ADDONS_DIR . '/includes/' );
define( 'BKM_TEMPLATE_PATH', BKM_ADDONS_DIR . '/includes/Widgets/templates/' );


/**
 * Load Requried fiels
 */
require BKM_INCLUDE_PATH . '/book-manager.php';
require BKM_INCLUDE_PATH . '/admin/Admin.php';


if ( ! function_exists( 'BKM_Init' ) ) {
	function BKM_init() {
		// return Book_manager\Book_manager::getInstance();
		// return new \Book_manager\Book_manager();
	}
	bkm_Init();
}