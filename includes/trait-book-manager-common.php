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

    public function return_response()
    {
        // checking and insert the response
        if ($this->has_error != true) {
            $this->response['status'] = 'Success';
        } else {
            $this->response['status'] = 'error';
            $this->response['message'] = 'one or more fields are empty!';
        }
        return $this->response;
    }

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
            }else{
                $this->response['insert'] = 'error';
            }
        }
        
        return $this;
    }

    public function view_book_resords( $request ){

        global $wpdb;
        
        // set data for pagination
        $page = isset($request->get_params()['page']) ? intval($request->get_params()['page']) : 1;
        $books_per_page = 10;
        $offset = ($page - 1) * $books_per_page;

        $table = $wpdb->prefix . BKM_DB_TABLE; //
        $results = $wpdb->get_results(
            $wpdb->prepare("SELECT * FROM %i LIMIT %d OFFSET %d", $table, $books_per_page, $offset)
        );

        return $results;

    }
}
