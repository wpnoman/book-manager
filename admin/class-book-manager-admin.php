<?php

namespace Book_manager\Admin;

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

class Book_Manager_Admin
{

	/**
	 *
	 * $instance property for instance
	 */
	private static $instance = null;

	public function __construct()
	{
	}



	/**
	 * Admin menu options
	 * 
	 * @return void
	 */
	public function menu()
	{
		add_menu_page(
			esc_html__('Book Records', 'book-manager'),
			esc_html__('Book Records', 'book-manager'),
			'manage_options',
			'book-manager',
			[$this, 'dashboard'],
			'dashicons-book',
			'38.1'
		);

		add_submenu_page( 
			'book-manager',
			__( 'Add Records', 'book-manager' ),
			__( 'Add Records', 'book-manager' ),
			'manage_options',
			'add-book-record',
			[$this, 'dashboard'],
		);

		add_submenu_page( 
			'book-manager',
			__( 'Edit Records', 'book-manager' ),
			__( 'Edit Records', 'book-manager' ),
			'manage_options',
			'edit-book-record',
			[$this, 'dashboard'],
		);
	}

	/**
	 * Admin Dashboard View
	 * @return void
	 */
	public function dashboard()
	{
		// dashboard output
		include_once BKM_ADDONS_PATH . 'admin/views/main.dashboard.php';
	}


	public function enqueue_assets($admin_page)
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Booking_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Booking_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$menus = ['book-records_page_add-book-record','toplevel_page_book-manager'];

		if ( !in_array( $admin_page, $menus ) ) {
			return;
		}
		
		$asset_file = BKM_ADDONS_PATH . 'build/index.asset.php';


		if (!file_exists($asset_file)) {
			return;
		}

		$asset = include $asset_file;

		wp_enqueue_style('bkm_react-style', BKM_ADDONS_URL . 'build/index.css');
		wp_enqueue_script('bkm_react-bundle', BKM_ADDONS_URL . 'build/index.js', $asset['dependencies'], time());

		wp_localize_script( 'bkm_react-bundle', 'bkm_settings', [
			'nonce' => wp_create_nonce('bk_nonce')
		]);
	}
}
