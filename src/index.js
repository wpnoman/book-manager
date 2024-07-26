import { createRoot } from '@wordpress/element';
import domReady from '@wordpress/dom-ready';
import App from "./App";


/**
 * Import the stylesheet for the plugin.
 */
import './style/main.scss';

import { ThemeProvider } from "@material-tailwind/react";



domReady(() => {
    const domNode = document.getElementById('book_manager');
    const root = createRoot(domNode);
    root.render(
        <ThemeProvider>
            <App />
        </ThemeProvider>
    );
});