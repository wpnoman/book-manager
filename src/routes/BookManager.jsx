import React from 'react'
import { ViewRecords } from '../components/ViewRecords'
import { Pagination } from './Pagination'
import { addQueryArgs } from '@wordpress/url'
import { getRecords } from "../api/apiQuery";
import { useEffect, useState } from "@wordpress/element";


export default function BookManager() {

    const [tableRows, setTableRows] = useState([]);
    const [ maxPage, setMaxpage ] = useState(1);
    const [ currentPage, setcurrentPage ] = useState(1);

    useEffect(() => {

        // request api and update table data
        getRecords(currentPage).then((res) => {
            setTableRows(res.results);
            setMaxpage(res.max_page)
            // console.log(res.results.length, 'first')
        });
    }, [currentPage]);


    return (
        <>
            <h1 class="text-9xl font-bold">
                All Book Records
            </h1>
            <ViewRecords tableRows={tableRows} />
            {maxPage > 0 && <Pagination maxPage={maxPage} setcurrentPage={setcurrentPage} />}

        </>
    )
}
