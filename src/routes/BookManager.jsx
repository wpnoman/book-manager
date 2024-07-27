import React from 'react'
import { ViewRecords } from '../components/ViewRecords'
import { Pagination } from './Pagination'

export default function BookManager() {
    return (
        <>
            <h1 class="text-9xl font-bold">
                All Book Records
            </h1>
            <ViewRecords/>
            <Pagination/>
        </>
    )
}
