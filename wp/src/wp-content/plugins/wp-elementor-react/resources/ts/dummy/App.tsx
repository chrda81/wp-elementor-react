import React from 'react';

interface AppProps {
  settings: any;
}

const App: React.FC<AppProps> = (props) => {
  const { settings } = props;
  const items = settings.some_items || [];

  return (
    <div>
      <h1>{`${settings.l18n.main_title} - ${settings.uuid}`}</h1>
      <ul>
        {
          items.map((item, index) => {
            return (
              <li key={index}>{item}</li>
            )
          })
        }
      </ul>
    </div>
  );
};

export default App;
