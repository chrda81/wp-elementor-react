import React from "react";
import { Link, Typography } from "@mui/material";

export default function Home() {
  return (
    <React.Fragment>
      <main>
        <Typography variant="h6">Welcome to the homepage!</Typography>
        <Typography variant="body1">You can do this, I believe in you.</Typography>
      </main>
      <nav>
        <Link href="/about" underline="hover">About</Link>
      </nav>
    </React.Fragment>
  );
}