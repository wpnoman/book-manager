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

    echo 'ddd';
class Book_Manager_Common
{

    private $has_error;
    private $book_fields = array( 'title', 'author', 'publisher', 'ISBN', 'publication_date' );

    public function __construct(){
        echo 'hello';
    }
    public function set( $data ){
        return sanitize_text_field($data);
    }

    public function validate( $book_info ){
        foreach( $book_info as $field){
            if( array_key_exists($field, $this->book_fields) && !empty( $field )) {
                return;
            }else{
                $this->has_error = true;
            }
        }

        return $this;
    }

    public function return_response( ){
        $response = '';
        if( $this->has_error == true ){
            $response = 'one or more fields are empty!';
        }else{
            $response = 'Success';
        }
        return new \WP_REST_Response($response, 200);
    }

    
}