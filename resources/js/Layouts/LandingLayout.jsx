import React, { useEffect, useState } from "react";
import Footer from "@/Components/Footer/Footer";
import Navbar from "@/Components/Navbar/Navbar";
import { FaArrowUp } from "react-icons/fa";
import { Head } from "@inertiajs/react";

function LandingLayout({ children, subnav, logo, alamat, sosmed, favicon }) {
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
            <Head>
                <link rel="icon" type="image/x-icon" href={favicon} />
            </Head>
            <Navbar subnav={subnav} logo={logo} />
            {children}
            <div
                className={`fixed justify-center items-center p-3 cursor-pointer  shadow-xl rounded-full bg-primary ring-2 ring-yellow-300 border-slate-300 bottom-8 right-5 ${
                    isVisible ? "flex" : "hidden"
                }`}
                onClick={scrollToTop}
            >
                <FaArrowUp className="text-base text-white animate-bounce" />
            </div>
            <Footer logo={logo} alamat={alamat} sosmed={sosmed} />
        </>
    );
}

export default LandingLayout;
