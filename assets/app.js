import 'bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import 'styles/app.css';
import React from 'react';
import { createRoot } from 'react-dom/client';
import HelloReact from 'components/React.js';


console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
const rootElement = document.getElementById('react-root');
if (rootElement) {
    const root = createRoot(rootElement);
    root.render(<HelloReact name="Symfony User" />);
}
