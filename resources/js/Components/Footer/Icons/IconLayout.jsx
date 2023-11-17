import React from "react";
import { Tooltip } from "react-tooltip";

function IconLayout({ children, href = "#", name }) {
    return (
        <>
            <a
                data-tooltip-id="tooltip"
                data-tooltip-content={name}
                href={href}
                target="_blank"
                className="p-4 text-base rounded-full bg-primary lg:text-lg xl:text-xl"
            >
                {children}
            </a>
            <Tooltip id="tooltip" />
        </>
    );
}

export default IconLayout;
