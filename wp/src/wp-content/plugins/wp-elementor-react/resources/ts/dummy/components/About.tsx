import React from "react";
import { Button, Typography } from "@mui/material";

export default function About() {
  return (
    <React.Fragment>
      <main>
        <Typography variant="h6">Who are we?</Typography>
        <Typography variant="body1">That feels like an existential question, don't you think?</Typography>
      </main>
      <nav>
        <Button href="/" variant="contained">Home</Button>
      </nav>
    </React.Fragment>
  );
}