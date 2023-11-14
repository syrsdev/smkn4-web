import React from "react";

function Dropdown({ children, shown }) {
    return (
        <div
            className={`absolute h-full w-max  text-primary  ${
                shown == false ? "hidden" : "block"
            }`}
        >
            <ul className="flex flex-col justify-center items-start gap-5 px-6 py-9 mt-5 bg-[#F2F7FF] rounded-lg">
                {children}
            </ul>
        </div>
    );
}

export default Dropdown;
