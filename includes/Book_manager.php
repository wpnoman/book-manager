<?php

/**
 * Book Mangaer 
 *
 * @package Advanced_addons
 */

namespace Book_manager;

use Book_manager\Admin\Admin;

 ;


if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly.

class Book_manager {
    
    /**
	 *
	 * $instance property for instance
	 */
	private static $instance = null;

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
    public function __construct() {
        //admin page
        Admin::getInstance();
    }
}