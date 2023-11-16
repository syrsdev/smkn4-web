import React from "react";

function IconLayout({ children, href = "#" }) {
    return (
        <>
            <a
                href={href}
                className="p-4 text-base rounded-full bg-primary lg:text-lg xl:text-xl"
            >
                {children}
            </a>
        </>
    );
}

export default IconLayout;
