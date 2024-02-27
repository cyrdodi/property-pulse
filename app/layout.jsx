import '@/assets/styles/globals.css'

import Footer from "@/components/Footer";
import NavBar from '@/components/NavBar'
import AuthProvider from '@/components/AuthProvider';

export const metadata = {
  title: 'Property Pulse',
  description: 'Find your best properties here',
  keyword: 'Properties, Rentals, Best Price'
}

const MainLayout = ({ children }) => {
  return (
    <AuthProvider>
      <html lang="en">
        <body>
          <NavBar />
          <main>{children}</main>
          <Footer />
        </body>
      </html>
    </AuthProvider>
  );
};

export default MainLayout;
