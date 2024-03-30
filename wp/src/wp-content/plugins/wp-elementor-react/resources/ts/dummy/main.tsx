import React from 'react';
import {createRoot} from 'react-dom/client';
import App from './App';

window.addEventListener('load', () => {
  let target: HTMLElement | null = null;
  let uuid: string | null = null;

  console.log('Elements', window.wpElementorReactGlobals?.dynamicElements);
  const uuids = window.wpElementorReactGlobals?.dynamicElements || [];

  uuids.forEach((element) => {
    console.log('Element', element);
    if (element.startsWith('dummy')) {
      const temp_target = document.getElementById(`wpelementorreact-${element}`);

      if (temp_target && !temp_target.hasChildNodes()) {
        target = temp_target;
        uuid = element;
      }
    }
  });

  if (!target) {
    console.error(`Cannot find element #wpelementorreact-${uuid}`);
  } else {
    const root = createRoot(target);

    root.render(
      <React.StrictMode>
        <App />
      </React.StrictMode>
    );
  }
});
