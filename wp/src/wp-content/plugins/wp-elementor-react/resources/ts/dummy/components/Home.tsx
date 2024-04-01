import React from "react";
import Link from '@mui/material/Link';

export default function Home() {
  return (
    <>
      <main>
        <h2>Welcome to the homepage!</h2>
        <p>You can do this, I believe in you.</p>
      </main>
      <nav>
        <Link href="/about" underline="hover">About</Link>
      </nav>
    </>
  );
}