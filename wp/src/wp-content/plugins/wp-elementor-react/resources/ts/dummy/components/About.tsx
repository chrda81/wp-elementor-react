import React from "react";
import Button from '@mui/material/Button';

export default function About() {
  return (
    <>
      <main>
        <h2>Who are we?</h2>
        <p>
          That feels like an existential question, don't you
          think?
        </p>
      </main>
      <nav>
        <Button href="/" variant="contained">Home</Button>
      </nav>
    </>
  );
}