import React from 'react'
import { ViewRecords } from '../components/ViewRecords'
import { Pagination } from './Pagination'
import { addQueryArgs } from '@wordpress/url'
import { getRecords } from "../api/apiQuery";
import { useEffect, useState } from "@wordpress/element";


export default function BookManager() {

    const [tableRows, setTableRows] = useState([]);

    useEffect(() => {

        // request api and update table data
        getRecords().then((res) => {
          setTableRows(res.results);
        });
        console.log('first')
      }, []);
    

    return (
        <>
            <h1 class="text-9xl font-bold">
                All Book Records
            </h1>
            <ViewRecords tableRows={tableRows}/>

            <Pagination/>
        </>
    )
}
