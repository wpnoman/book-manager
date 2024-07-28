<?php

/**
 * Collections of common functions
 *
 * @since      1.0.0
 *
 * @package    Book_Manager
 * @subpackage Book_manager/includes
 */

namespace Book_Manager\includes;


if (!defined('ABSPATH'))
    exit; // Exit if accessed directly.

trait Book_Manager_Common
{

    private $has_error = false;
    private $response = [];
    private $book_info = [];
    private $book_fields = array('title', 'author', 'publisher', 'ISBN', 'publication_date');

    private $books_per_page = 5;
    
    public function set($data)
    {
        return sanitize_text_field($data);
    }

    public function validate($book_info)
    {
        $this->book_info = $book_info;
        foreach ($this->book_info as $key => $field) {
            if (array_key_exists($key, array_flip($this->book_fields)) && !empty($field)) {
                continue;
            } else {
                $this->has_error = true;
            }
        }

        return $this;
    }

    /**
	 * Return Response of insert
     * 
	 * @since    1.0.0
	 */
    public function return_response()
    {
        // checking and insert the response
        if ($this->has_error != true) {
            $this->response['status'] = 'success';
        } else {
            $this->response['status'] = 'error';
            $this->response['message'] = 'one or more fields are empty!';
        }
        return $this->response;
    }

    /**
	 * Insert Record
     * 
	 * @return $this
	 * @since    1.0.0
	 */
    public function insert_book()
    {

        if ($this->has_error != true) {
            // insert to db
            global $wpdb;
            $table = $wpdb->prefix . BKM_DB_TABLE;
            $format = array('%s', '%s', '%s', '%s', '%s');
            $status = $wpdb->insert($table, $this->book_info, $format);

            if ($status != false) {
                $this->response['insert'] = 'success';
            } else {
                $this->response['insert'] = 'error';
            }
        }

        return $this;
    }

    /**
	 * View Record
     * 
	 * @return $this
	 * @since    1.0.0
	 */
    public function view_book_resords($request)
    {

        global $wpdb;

        // set data for pagination
        $page = isset($request->get_params()['page']) ? intval($request->get_params()['page']) : 1;
        $record_id = isset($request->get_params()['book_id']) ? $this->set($request->get_params()['book_id']) : false;
        $offset = ($page - 1) * $this->books_per_page;
        $table = $wpdb->prefix . BKM_DB_TABLE;

        // if specific 
        if(!empty($record_id)) {
            $results = $wpdb->get_results(
                $wpdb->prepare("SELECT * FROM %i WHERE book_id = %s", $table, $record_id)
            );
            
            return ['results'=>$results, 'status' => 'success' ];
        }

        // results
        
        $results = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM %i LIMIT %d OFFSET %d", $table, $this->books_per_page, $offset)
        );

        // pagination
        $total_rows = $wpdb->get_var("SELECT COUNT(*) FROM {$table}");

        return ['results'=>$results, 'max_page' => ceil($total_rows / $this->books_per_page) ];
    }

    /**
	 * Delete Record
     * 
	 * @return $this
	 * @since    1.0.0
	 */
    public function delete_record($id)
    {
        global $wpdb;

        $table = $wpdb->prefix . BKM_DB_TABLE;
        
        return $wpdb->delete(
            $table,
            ['book_id' => $id ],
            ['%d']
        );

    }

    /**
	 * Search Record
     * 
	 * @return $this
	 * @since    1.0.0
	 */
    public function search_record( $search_string ){

        global $wpdb;

        $table = $wpdb->prefix . BKM_DB_TABLE;
        $title_like = '%' . $wpdb->esc_like( $search_string ) . '%';
        $author_like = '%' . $wpdb->esc_like( $search_string ) . '%';
        $isbn_like = '%' . $wpdb->esc_like( $search_string ) . '%';

        $results =  $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM %i WHERE title LIKE %s OR author LIKE %s OR ISBN LIKE %s", $table, $title_like, $author_like, $isbn_like )
        );

        $max_page = $wpdb->get_var(
            $wpdb->prepare("SELECT COUNT(*) FROM %i WHERE title LIKE %s OR author LIKE %s OR ISBN LIKE %s", $table,  $title_like, $author_like, $isbn_like)
        );

        return [ 'results' => $results, 'max_page' => ceil($max_page / $this->books_per_page) ];
    }

    /**
	 * Edit recording
     * 
     * @info This Is not finished yet due to time.
     * 
	 * @return $this
	 * @since    1.0.0
	 */
    public function edit_record( ){

        if ($this->has_error != true) {
            // insert to db
            global $wpdb;
            $table = $wpdb->prefix . BKM_DB_TABLE;
            $format = array('%s', '%s', '%s', '%s', '%s');
            $status = $wpdb->insert($table, $this->book_info, $format);

            if ($status != false) {
                $this->response['insert'] = 'success';
            } else {
                $this->response['insert'] = 'error';
            }
        }

        return $this;
    }
}
