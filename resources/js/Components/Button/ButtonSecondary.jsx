import { Link } from "@inertiajs/react";
import React from "react";

function ButtonSecondary({ children, href = "#", dark = false }) {
    return (
        <div className="w-full mt-7 xl:mt-10">
            <Link href={href} className="flex justify-center">
                <button
                    className={`cursor-pointer font-semibold overflow-hidden relative z-100 border group px-4 xl:px-7 py-2 ${
                        dark != true ? "border-primer " : "border-aksen"
                    }`}
                >
                    <span
                        className={`relative z-10 text-xs duration-500 ${
                            dark != true ? "btn-aksen-sec" : "btn-aksen"
                        }`}
                    >
                        {children}
                    </span>
                    <span
                        className={`absolute w-full h-full  -left-52 top-0 -rotate-45 group-hover:rotate-0 group-hover:left-0 duration-500 ${
                            dark != true ? "bg-primer" : "bg-aksen"
                        }`}
                    ></span>
                    <span
                        className={`absolute w-full h-full -right-52 top-0 -rotate-45 group-hover:rotate-0 group-hover:right-0 duration-500 ${
                            dark != true ? "bg-primer" : "bg-aksen"
                        }`}
                    ></span>
                </button>
            </Link>
        </div>
    );
}

export default ButtonSecondary;
