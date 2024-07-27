<?php

namespace Book_manager\Admin\API;

/**
 * API Handler
 *
 * @since      1.0.0
 *
 * @package    Book_Manager
 * @subpackage Book_manager/Admin/API
 */

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly.


class Book_Manager_API
{
    use \Book_manager\includes\Book_Manager_Common;

    public function __construct()
    {
    }

    public function register_routes()
    {

        // Adding Book item
        register_rest_route('book-manager/v1', '/create-record', [
            'methods'  => 'POST',
            'callback' => [$this, 'create_record'],
            // 'permission_callback' => 'myplugin_permission_callback',
        ]);

        // Viewing book records
        register_rest_route('book-manager/v1', '/book-records', [
            'methods'  => 'GET',
            'callback' => [$this, 'book_records'],
        ]);

        // delete book records
        register_rest_route('book-manager/v1', '/delete-record', [
            'methods'  => 'POST',
            'callback' => [$this, 'delete_book_record'],
        ]);
    }


    public function create_record(\WP_REST_Request $request)
    {
        $nonce = $request->get_param('_wpnonce');

        // Verify the nonce
        // if (!wp_verify_nonce($nonce, 'wp_rest')) {
        //     return new WP_Error('invalid_nonce', 'Invalid nonce', array('status' => 403));
        // }

        // collecting book information
        $book_info = [];
        $book_info['title'] = isset($request->get_params()['title']) ? $this->set($request->get_params()['title']) : false;
        $book_info['author'] = isset($request->get_params()['author']) ? $this->set($request->get_params()['author']) : false;
        $book_info['publisher'] = isset($request->get_params()['publisher']) ? $this->set($request->get_params()['publisher']) : false;
        $book_info['ISBN'] = isset($request->get_params()['ISBN']) ? $this->set($request->get_params()['ISBN']) : false;
        $book_info['publication_date'] = isset($request->get_params()['publication_date']) ? $this->set($request->get_params()['publication_date']) : false;


        $res = $this->validate($book_info)->insert_book()->return_response();

        return new \WP_REST_Response($res, 201);
    }

    public function book_records(\WP_REST_Request $request)
    {
        return new \WP_REST_Response( $this->view_book_resords($request), 200 );
    }

    public function delete_book_record( \WP_REST_Request $request ){

        $record_id = isset($request->get_params()['id']);

        if( empty($record_id) )
            return new \WP_REST_Response( ['status' => 'error', 'message' => 'Paramiter `ID` is Missing..' ], 400); 
        

        return new \WP_REST_Response($this->delete_record($record_id), 204);
    }
}
