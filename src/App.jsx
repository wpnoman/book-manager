import React from "react";
// import { CardBox } from "./CardBox";
import { ViewRecords } from "./components/ViewRecords";
// import { Table } from "./Table";
import {
    createBrowserRouter,
    RouterProvider,
} from "react-router-dom";
import Root from "./routes/root";
import Contact from "./routes/contact";

const router = createBrowserRouter([
    {
        path: "/wp-admin/admin.php",
        element: <Root />,
    },
    {
        path: "/admin.php?page=add-book-record",
        element: <Contact />,
    },
]);

function App() {
    return (
        <RouterProvider router={router} />
        // <Root/>
    )
}
export default App;