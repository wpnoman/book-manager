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
   

    public function __construct(){}

    public function register_routes(){

        // Adding Book item
        register_rest_route('book-manager/v1', '/create-record', [
            'methods'  => 'POST',
            'callback' => [ $this,'create_records'],
            // 'permission_callback' => 'myplugin_permission_callback',
        ]);
    }
    

    function create_records( \WP_REST_Request $request) {
        $nonce = $request->get_param('_wpnonce');
    
        // Verify the nonce
        // if (!wp_verify_nonce($nonce, 'wp_rest')) {
        //     return new WP_Error('invalid_nonce', 'Invalid nonce', array('status' => 403));
        // }
    
        // collecting book information
        $book_info = [];
        // $book_info['title'] = $this->set($request->get_params('title'));
        // $book_info['author'] = $this->set($request->get_params('author'));
        // $book_info['publisher'] = $this->set($request->get_params('publisher'));
        // $book_info['ISBN'] = $this->set($request->get_params('ISBN'));
        // $book_info['publication_date'] = $this->set($request->get_params('publication_date'));


        // $this->validate($book_info)->return_response();
    }
}