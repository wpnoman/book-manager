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
            'callback' => [$this, 'create_records'],
            // 'permission_callback' => 'myplugin_permission_callback',
        ]);
    }


    function create_records(\WP_REST_Request $request)
    {
        $nonce = $request->get_param('_wpnonce');

        // Verify the nonce
        // if (!wp_verify_nonce($nonce, 'wp_rest')) {
        //     return new WP_Error('invalid_nonce', 'Invalid nonce', array('status' => 403));
        // }

        // collecting book information
        $book_info = [];
        $book_info['title'] = !empty($request->get_params()['title']) ? $this->set($request->get_params()['title']) : false;
        $book_info['author'] = !empty($request->get_params()['author']) ? $this->set($request->get_params()['author']) : false;
        $book_info['publisher'] = !empty($request->get_params()['publisher']) ? $this->set($request->get_params()['publisher']) : false;
        $book_info['ISBN'] = !empty($request->get_params()['ISBN']) ? $this->set($request->get_params()['ISBN']) : false;
        $book_info['publication_date'] = !empty($request->get_params()['publication_date']) ? $this->set($request->get_params()['publication_date']) : false;


        $res = $this->validate($book_info)->insert_book()->return_response();

        return new \WP_REST_Response($res, 200);
    }
}
