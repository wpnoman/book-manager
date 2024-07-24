<?php

namespace Book_manager\Admin;

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly.

class Admin {
    
	/**
	 *
	 * $instance property for instance
	 */
	private static $instance = null;
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	/**
	 *
	 * @return \Instance
	 * @since  1.0.0
	 */
	public static function getInstance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function init() {
		// admin page
		add_action( 'admin_menu', [ $this, 'menu' ] );
	}

	/**
	 * Admin menu options
	 * 
	 * @return void
	 */
	public function menu() {
		add_menu_page(
			esc_html__( 'Book Records', 'book-manager' ),
			esc_html__( 'Book Records', 'book-manager' ),
			'manage_options',
			'advanced-addons',
			[ $this, 'dashboard' ],
			// BKM_ASSETS . 'images/favicon.png',
			'58.1'
		);
	}

	/**
	 * Admin Dashboard View
	 * @return void
	 */
	public function dashboard(){
		// dashboard output
		include_once BKM_INCLUDE_PATH . 'Admin/views/main.dashboard.php';
	}
}