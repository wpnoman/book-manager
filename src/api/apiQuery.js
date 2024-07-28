import apiFetch from '@wordpress/api-fetch';
import { addQueryArgs } from '@wordpress/url';


export function CreateRecord({ book_name, author_name, publisher, isbn, publication_date }) {
    //   console.log(book_name,author_name, 'create record 1');
    // Create Records
    return apiFetch({
        path: '/book-manager/v1/create-record',
        method: 'POST',
        data: { title: book_name, author: author_name, publisher: publisher, ISBN: isbn, publication_date: publication_date },
    }).then((res) => {
        return res;
    });
}

export function getRecords(page = 1) {

    const queryParams = { page: page };

    // get records
    return apiFetch({
        path: addQueryArgs('/book-manager/v1/book-records', queryParams),
        method: 'GET',
    }).then((res) => {
        return res;
    });

}

export function deleteRecord(book_id) {
    // get records
    return apiFetch({
        path: '/book-manager/v1/delete-record',
        method: 'POST',
        data: { id: book_id }
    }).then((res) => {
        return res;
    });
}

export function searchRecords( searchString ){

    // qauery
    const querrArg = { string:searchString };

    return apiFetch({
        path: addQueryArgs( '/book-manager/v1/search-records', querrArg),
        method: 'GET'
    }).then((res) => {
        return res;
    });
}