import React from "react";
import Footer from "@/Components/Footer/Footer";
import Navbar from "@/Components/Navbar/Navbar";

function LandingLayout({ children, subnav }) {
    return (
        <>
            <Navbar subnav={subnav} />
            {children}
            <Footer />
        </>
    );
}

export default LandingLayout;
