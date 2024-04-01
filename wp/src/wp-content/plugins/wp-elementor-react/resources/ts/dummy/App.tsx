import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./components/Home";
import About from "./components/About";

interface AppProps {
  settings: any;
}

const App: React.FC<AppProps> = (props) => {
  const { settings } = props;

  return (
    <div className="App">
      <h1>Welcome to ReactPress with React Router!</h1>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="about" element={<About />} />
      </Routes>
    </div>
  );
};

export default App;