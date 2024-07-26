<?php

/**
 * Book Mangaer 
 *
 * @package Book_Manager
 */

namespace Book_Manager\includes;

use Book_manager\Admin\Book_Manager_Admin;
use Book_manager\Admin\API\Book_Manager_API;


if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

class Book_manager
{
	


	public function __construct()
	{

	}

	/**
	 *
	 * init the plugin
	 */
	public function init()
	{
		add_action('init', [$this, 'run']);
	}

	public function run()
	{
		// load required fiels
		$this->load_required_files();

		// defining admin hooks
		$this->define_admin_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since    1.0.0
	 */
	private function load_required_files()
	{

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once BKM_ADDONS_PATH . 'admin/class-book-manager-admin.php';

		/**
		 * The class responsible for Registering Rest API routes.
		 */
		require_once BKM_ADDONS_PATH . 'admin/api/class-book-manager-api.php';

		/**
		 * The class responsible for common functions
		 */
		require_once BKM_INCLUDE_PATH . '/trait-book-manager-common.php';
	}


	/**
	 * Defining admin hooks
	 *
	 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
	 * @since    1.0.0
	 */
	private function define_admin_hooks()
	{
		$admin = new Book_Manager_Admin();

		// registering admin menu
		add_action('admin_menu', [$admin, 'menu'], 10);

		// enqueue admin scripts/styles
		add_action('admin_enqueue_scripts', [$admin, 'enqueue_assets']);

		$this->define_rest_routes();
	}

	/**
	 * Registering Rest Routes
	 *
	 * @link https://developer.wordpress.org/reference/hooks/rest_api_init/
	 * @since    1.0.0
	 */
	private function define_rest_routes(){
		$api = new Book_Manager_API();

		add_action('rest_api_init', [$api,'register_routes']);
	}
}
