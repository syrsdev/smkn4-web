import React from "react";
import DropLink from "./DropLink";

function SideDropLink({ children }) {
    return (
        <>
            <ul className="flex flex-col w-full gap-1 px-1 first:pt-3">
                {children}
            </ul>
        </>
    );
}

export default SideDropLink;
