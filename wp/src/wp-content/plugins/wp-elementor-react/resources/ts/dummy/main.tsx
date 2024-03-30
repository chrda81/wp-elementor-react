import React from 'react';
import {createRoot} from 'react-dom/client';
import App from './App';

window.addEventListener('load', () => {
  const target = document.getElementById('wpelementorreact-dummy');

  if (!target) {
    throw new Error('Cannot find element #wpelementorreact-dummy');
  }

  const root = createRoot(target);

  root.render(
    <React.StrictMode>
      <App />
    </React.StrictMode>
  );
});
