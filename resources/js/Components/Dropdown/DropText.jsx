import React from "react";
import DropLink from "./DropLink";

function DropText({ children, active }) {
    return (
        <>
            <li
                className={`pb-4 font-bold border-primary hover:opacity-100 opacity-80 text-primary border-b-2`}
            >
                <div className="flex justify-between">{children}</div>

                <ul className="flex flex-col w-full gap-6 px-1 mt-3">
                    <DropLink href="#">test</DropLink>
                </ul>
            </li>
        </>
    );
}

export default DropText;
