import React, { useEffect, useState } from "react";
import Footer from "@/Components/Footer/Footer";
import Navbar from "@/Components/Navbar/Navbar";
import { FaArrowUp } from "react-icons/fa";

function LandingLayout({ children, subnav, logo, alamat, sosmed }) {
    const [isVisible, setIsVisible] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            const top = window.scrollY || document.documentElement.scrollTop;

            setIsVisible(top > 10);
        };

        window.addEventListener("scroll", handleScroll);

        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);
    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    };
    return (
        <>
            <Navbar subnav={subnav} logo={logo} />
            {children}
            <div
                className={`fixed justify-center items-center z-50 p-4 cursor-pointer  shadow-xl rounded-full bg-primary border border-slate-300 bottom-5 right-5 ${
                    isVisible ? "flex" : "hidden"
                }`}
                onClick={scrollToTop}
            >
                <FaArrowUp className="text-sm text-white animate-bounce" />
            </div>
            <Footer logo={logo} alamat={alamat} sosmed={sosmed} />
        </>
    );
}

export default LandingLayout;
