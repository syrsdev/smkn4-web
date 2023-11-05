import React from "react";
import Footer from "@/Components/Footer/Footer";
import Navbar from "@/Components/Navbar/Navbar";

function LandingLayout({ children, subnav, logo, alamat }) {
    return (
        <>
            <Navbar subnav={subnav} logo={logo} />
            {children}
            <Footer logo={logo} alamat={alamat} />
        </>
    );
}

export default LandingLayout;
