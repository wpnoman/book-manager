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


/**
 * Main ADAE Class
 *
 * The init class that runs the Hello World plugin.
 * Intended To make sure that the plugin's minimum requirements are met.
 *
 * You should only modify the constants to match your plugin's needs.
 *
 * Any custom code should go inside Plugin Class in the plugin.php file.
 * @since 1.0.0
 */
final class BKM_Final {

	/**
	 *
	 * $instance property for instance
	 */
	private static $instance = null;

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Plugin prefix
	 *
	 * @since 1.0.0
	 * @var string The plugin version.
	 */
	const PREFIX = 'bkm_';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.4';

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Init Plugin
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	/**
	 *
	 * @return \Instance
	 * @since  1.0.0
	 */
	// public static function getInstance() {
	// 	if ( ! isset( self::$instance ) ) {
	// 		self::$instance = new self();
	// 	}
	// 	return self::$instance;
	// }

	public function plugins_loaded() {
		// load_plugin_textdomain( 'tpebl', false, basename( dirname( __FILE__ ) ) . '/lang' );
		Book_manager\Book_manager::getInstance();
	}


}

if ( ! function_exists( 'BKM_Init' ) ) {
	function BKM_init() {
		return new BKM_Final();
	}
	bkm_Init();
}