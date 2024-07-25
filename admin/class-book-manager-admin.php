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
			'advanced-addons',
			[$this, 'dashboard'],
			'dashicons-book',
			'38.1'
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
}
