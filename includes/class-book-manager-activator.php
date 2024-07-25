<?php

namespace Book_Manager\includes;

/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Book_Manager
 * @subpackage Book_Manager/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Book_Manager
 * @subpackage Book_Manager/includes
 * @author     WP Noman <sbnoman27@gmail.com>
 */

class Book_Manager_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function activate()
    {
        global $wpdb;

        // Defining the table name
        $table_name = $wpdb->prefix . 'book_records';

        // this will return the correct character set and collation for the database.
        $charset_collate = $wpdb->get_charset_collate();

        // SQL statement to create the table
        $sql = "CREATE TABLE $table_name (
            book_id INT(11) NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            author VARCHAR(50) NOT NULL,
            publisher VARCHAR(50) NOT NULL,
            ISBN VARCHAR(20) NOT NULL UNIQUE,
            publication_date DATE NOT NULL,
            PRIMARY KEY (book_id)
        ) $charset_collate;";

        // Include the upgrade script
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
        dbDelta($sql);

    }
}
