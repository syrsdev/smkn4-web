import { Link } from "@inertiajs/react";
import React from "react";

function DropLink({ href, children, border, pb }) {
    return (
        <Link
            href={href}
            className={`w-full cursor-pointer block font-bold border-inherit hover:opacity-100 opacity-80 text-inherit ${
                pb == true ? "pb-4" : ""
            } ${border}`}
        >
            {children}
        </Link>
    );
}

export default DropLink;
