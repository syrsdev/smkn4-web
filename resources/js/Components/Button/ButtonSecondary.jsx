import { Link } from "@inertiajs/react";
import React from "react";

function ButtonSecondary({ children, href = "#", dark = false }) {
    return (
        <div className="w-full mt-7 xl:mt-10">
            <Link href={href} className="flex justify-center">
                <button
                    className={`cursor-pointer font-semibold overflow-hidden relative z-100 border group px-4 xl:px-7 py-2 ${
                        dark != true ? "border-primary " : "border-yellow-400"
                    }`}
                >
                    <span
                        className={`relative z-10 text-xs duration-500 ${
                            dark != true
                                ? "text-primary group-hover:text-white"
                                : "text-white group-hover:text-primary"
                        }`}
                    >
                        {children}
                    </span>
                    <span
                        className={`absolute w-full h-full  -left-52 top-0 -rotate-45 group-hover:rotate-0 group-hover:left-0 duration-500 ${
                            dark != true ? "bg-primary" : "bg-tertiary"
                        }`}
                    ></span>
                    <span
                        className={`absolute w-full h-full -right-52 top-0 -rotate-45 group-hover:rotate-0 group-hover:right-0 duration-500 ${
                            dark != true ? "bg-primary" : "bg-tertiary"
                        }`}
                    ></span>
                </button>
            </Link>
        </div>
    );
}

export default ButtonSecondary;
