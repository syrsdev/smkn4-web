import React from "react";
import { Tooltip } from "react-tooltip";

function IconLayout({ children, href = "#", name, theme }) {
    return (
        <>
            <a
                aria-label={`Lihat ${name}`}
                data-tooltip-id="tooltip"
                data-tooltip-content={name}
                href={href}
                target="_blank"
                style={{ backgroundColor: `${theme.primer}` }}
                className="p-4 text-base rounded-full lg:text-lg xl:text-xl"
            >
                {children}
            </a>
            <Tooltip id="tooltip" />
        </>
    );
}

export default IconLayout;
