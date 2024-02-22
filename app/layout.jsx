import React from "react";
import '@/assets/styles/globals.css'

export const metadata = {
  title: 'Property Pulse',
  description: 'Find your best properties here',
  keyword: 'Properties, Rentals, Best Price'
}

const MainLayout = ({ children }) => {
  return (
    <html lang="en">
      <body>
        <div className="p-8">{children}</div>
      </body>
    </html>
  );
};

export default MainLayout;
