import React from "react";
// import { CardBox } from "./CardBox";
import { ViewRecords } from "./components/ViewRecords";
// import { Table } from "./Table";
import { createPortal, useState } from "@wordpress/element";

import { BrowserRouter as Router, Routes, Route, Link, useNavigate, matchPath } from 'react-router-dom';

import Root from "./routes/root";
import Contact from "./routes/contact";


// function wpMenu() {
//     return
// }

function App() {

    // const [Location, setLocation] = useState(location.search);
    const [matchedRoutes, setMatchedRoutes] = useState([]);

    const routes = [
        {
            path: "book-manager",
            element: <Root />,
            exact: true,
        },
        {
            path: "add-book-record",
            element: <Contact />,
        },
    ];
    const mainMenu = document.getElementById('toplevel_page_book-manager');
    mainMenu.innerText = '';

    return (
        <>
            <Router>
                <div>
                    <Routes>
                        <Route path="/*" element={<Root />} />
                    </Routes>
                </div>

                {createPortal(
                    <li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top toplevel_page_book-manager" id="toplevel_page_book-manager">
                        <Link to="/wp-admin/admin.php?page=book-manager" className="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top toplevel_page_book-manager">
                            <div class="wp-menu-arrow">
                                <div></div>
                            </div>
                            <div class="wp-menu-image dashicons-before dashicons-book" aria-hidden="true"><br /></div>
                            <div class="wp-menu-name">Book Records</div>
                        </Link>
                        <ul class="wp-submenu wp-submenu-wrap">
                            <li class="wp-submenu-head" aria-hidden="true">Book Records</li>
                            <li class="wp-first-item current">
                                <Link to="/wp-admin/admin.php?page=book-manager" aria-current="page" className="wp-first-item current">Book Records</Link>
                            </li>
                            <li>
                                <Link to="/wp-admin/admin.php?page=add-book-record">Add Record</Link>
                            </li>
                        </ul>
                    </li>, mainMenu
                )}

            </Router>

        </>

    )
}
export default App;