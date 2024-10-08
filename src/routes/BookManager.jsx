import React from 'react'
import { ViewRecords } from '../components/ViewRecords'
import { Pagination } from './Pagination'
import { addQueryArgs, getQueryArgs } from '@wordpress/url'
import { getRecords, searchRecords } from "../api/apiQuery";
import { useEffect, useLayoutEffect, useState } from "@wordpress/element";
import { Input } from "@material-tailwind/react";
import { useSearchParams } from 'react-router-dom';
import EditRecord from '../components/EditRecord';

export default function BookManager() {

    const [tableRows, setTableRows] = useState([]);
    const [maxPage, setMaxpage] = useState(1);
    const [currentPage, setcurrentPage] = useState(1);
    const [searchString, setSearchString] = useState('');
    let [searchParams, setSearchParams] = useSearchParams();

    const currentUrl = window.location.href
    const {book_id} = getQueryArgs(currentUrl);


    useLayoutEffect(() => {
        if (searchString.length > 0) {
            searchRecords(searchString).then((res) => {
                setTableRows(res.results);
                setMaxpage(res.max_page)
            });
        } else {
            // request api and update table data
            getRecords(currentPage).then((res) => {
                setTableRows(res.results);
                setMaxpage(res.max_page)
            });
        }

    }, [currentPage, searchString]);

    if( book_id ){
        return <>
            <EditRecord id={book_id}/>
        </>
    }

    return (
        <>

            <div className="flex justify-between">
                <h1 class="text-9xl font-bold">
                    All Book Records
                </h1>
                <div className="search-form">
                    <div className="w-72">
                        <Input onChange={(e) => { setSearchString(e.target.value) }} label="Search" />
                    </div>
                </div>
            </div>

            <ViewRecords tableRows={tableRows} />
            {maxPage > 0 && <Pagination maxPage={maxPage} setcurrentPage={setcurrentPage} />}

        </>
    )
}
