import { Link } from "@inertiajs/react";
import React from "react";

function DropLink({ href, children, border, margin }) {
    return (
        <Link
            href={href}
            className={`pb-4 w-full block font-bold border-primary hover:opacity-100 opacity-80 text-primary ${
                margin == true ? "my-6" : ""
            } ${border}`}
        >
            {children}
        </Link>
    );
}

export default DropLink;
