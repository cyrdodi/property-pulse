import React from "react";
import Link from "next/link";

const HomePage = () => {
  console.log("test");
  return (
    <div>
      <h1 className="text-lg font-semibold">Home Page</h1>
      <Link href="/properties">Properties</Link>
    </div>
  );
};

export default HomePage;
