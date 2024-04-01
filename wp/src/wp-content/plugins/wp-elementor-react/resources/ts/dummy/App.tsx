import React from "react";
import { Routes, Route } from "react-router-dom";
import Home from "./components/Home";
import About from "./components/About";
import { Typography } from "@mui/material";

interface AppProps {
  settings: any;
}

const App: React.FC<AppProps> = (props) => {
  const { settings } = props;

  return (
    <React.Fragment>
      <Typography variant="h4">Welcome to Elementor Widget with React and React Router!</Typography>
      <Routes>
        <Route path="/" element={<Home />} />
        <Route path="about" element={<About />} />
      </Routes>
    </React.Fragment>
  );
};

export default App;