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


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


/**
 * Define constance
 */

define('BKM_VERSION', '1.0.0');

define('BKM_PREFIX', 'bkm_');
define('BKM_ADDONS_URL', plugins_url('/', __FILE__));
define('BKM_ADDONS_DIR', dirname(__FILE__));
define('BKM_ADDONS_PATH', plugin_dir_path(__FILE__));
define('BKM_ASSETS', BKM_ADDONS_URL . 'assets/');
define('BKM_INCLUDE_PATH', BKM_ADDONS_DIR . '/includes/');


/**
 * Load base file
 */
require BKM_INCLUDE_PATH . '/class-book-manager.php';



/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-booking-manager-activator.php
 */
function activate_book_manager()
{
	require_once BKM_ADDONS_PATH . 'class-book-manager-activator.php';
	Booking_Manager_Activator::activate();
}

register_activation_hook(__FILE__, 'activate_book_manager');

if (!function_exists('bkm_Init')) {
	function bkm_Init()
	{
		(new Book_manager\includes\Book_manager())->init();
	}
	bkm_Init();
}
