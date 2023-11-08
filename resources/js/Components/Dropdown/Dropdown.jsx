import React from "react";

function Dropdown({ children, shown }) {
    return (
        <div
            className={`absolute h-full lg:w-48 xl:w-52 text-primary  ${
                shown == 0 ? "hidden" : "block"
            }`}
        >
            <ul className="flex flex-col gap-5 px-4 py-8 mt-5 bg-[#F2F7FF] rounded-lg">
                {children}
            </ul>
        </div>
    );
}

export default Dropdown;
