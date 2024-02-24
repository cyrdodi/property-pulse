import NavBar from '@/components/NavBar'
import '@/assets/styles/globals.css'
import Footer from "@/components/Footer";

export const metadata = {
  title: 'Property Pulse',
  description: 'Find your best properties here',
  keyword: 'Properties, Rentals, Best Price'
}

const MainLayout = ({ children }) => {
  return (
    <html lang="en">
      <body>
        <NavBar />
        <main>{children}</main>
        <Footer />
      </body>
    </html>
  );
};

export default MainLayout;
