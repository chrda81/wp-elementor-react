import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';

window.addEventListener('load', () => {
  const idStartsWith = 'wpelementorreact-dummy';
  const targets = document.querySelectorAll(`div[id^=${idStartsWith}]`);

  if (targets.length === 0) {
    throw new Error('Cannot find any element starting with #wpelementorreact-dummy');
  }

  targets.forEach(target => {
    // if target has no child nodes or node is a text node
    if (!target.hasChildNodes() || target?.firstChild?.nodeType === Node.TEXT_NODE) {
      console.log(`Injecting React component in target ${target.id}`);

      const settings = JSON.parse(target.getAttribute('data-default-settings') || '{}');
      const root = createRoot(target);

      root.render(
        <React.StrictMode>
          <App settings={settings} />
        </React.StrictMode>
      );
    }
  });
});