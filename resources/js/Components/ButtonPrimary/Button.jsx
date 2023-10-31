import { Link } from "@inertiajs/react";
import React from "react";

function ButtonPrimary({ children }) {
    return (
        <Link href="#">
            <button className="relative z-20 px-10 py-3 font-bold rounded-md text-secondary bg-primary transition-all duration-400 ease-in-out hover:scale-105 active:scale-90 before:absolute before:top-0 before:-left-full before:w-full before:h-full  before:bg-tertiary before:transition-all before:duration-500 before:ease-in-out before:z-[-1] before:rounded-md hover:before:left-0 overflow-hidden hover:text-primary flex items-center gap-3 ">
                {children}
            </button>
        </Link>
    );
}

export default ButtonPrimary;
