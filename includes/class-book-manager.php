<?php

/**
 * Book Mangaer 
 *
 * @package Book_Manager
 */

namespace Book_Manager\includes;

use Book_manager\Admin\Book_Manager_Admin;



if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

class Book_manager
{


	public function __construct()
	{
	}

	/**
	 *
	 * $instance property for instance
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
	 * Include the following files that make up the plugin:
	 *
	 * @since    1.0.0
	 */
	private function load_required_files()
	{

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once BKM_ADDONS_PATH . 'admin/class-book-manager-admin.php';
	}


	private function define_admin_hooks()
	{
		$admin = new Book_Manager_Admin();

		// registering admin menu
		add_action('admin_menu', [$admin, 'menu']);

	}
}
