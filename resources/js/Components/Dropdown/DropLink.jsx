import { Link } from "@inertiajs/react";
import React from "react";

function DropLink({ href, children, border }) {
    return (
        <Link
            href={href}
            className={`pb-4 font-bold border-primary hover:opacity-100 opacity-80 text-primary ${border}`}
        >
            {children}
        </Link>
    );
}

export default DropLink;
