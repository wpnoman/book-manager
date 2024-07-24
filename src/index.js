import React from "react";
import { createRoot } from 'react-dom/client';
import domReady from '@wordpress/dom-ready';
import App from "./App";

/**
 * Import the stylesheet for the plugin.
 */
import './style/main.scss';



domReady(() => {
    ReactDOM.createRoot(document.getElementById('advanced_addon')).render(
        <React.StrictMode>
            <App />
        </React.StrictMode>,
    );
});