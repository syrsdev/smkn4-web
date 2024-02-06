import React from "react";
import { IoChevronDown } from "react-icons/io5";

function SideDropDown({ children, active, title }) {
    return (
        <li
            className={`my-6 w-full font-bold border-inherit hover:opacity-100 opacity-80 text-inherit border-b-2`}
        >
            <div className="flex justify-between mb-3">
                <p>{title}</p>
                <IoChevronDown
                    className={`text-[24px] duration-150 ${
                        active && "rotate-180"
                    }`}
                />
            </div>
            {active == true ? children : ""}
        </li>
    );
}

export default SideDropDown;
