import apiFetch from '@wordpress/api-fetch';
import React from 'react'

export function CreateRecord( {book_name, author_name, publisher, isbn, publication_date } ) {
//   console.log(book_name,author_name, 'create record 1');
    // Create Records
    return apiFetch( {
        path: '/book-manager/v1/create-record',
        method: 'POST',
        data: { title: book_name, author: author_name,publisher: publisher, ISBN: isbn, publication_date:  publication_date },
    } ).then( ( res ) => {
        return res;
    } );
}
