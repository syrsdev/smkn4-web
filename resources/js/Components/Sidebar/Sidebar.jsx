import React from "react";
import { IoChevronDown } from "react-icons/io5";
import DropLink from "../Dropdown/DropLink";
import DropText from "../Dropdown/DropText";

function Sidebar({ isActive }) {
    return (
        <div
            className={`fixed w-9/12 md:w-1/2 min-h-screen bg-[#F2F7FF] z-[60] top-0 duration-700 lg:hidden ${
                isActive == false ? "-right-[1000px]" : "-right-1"
            }`}
        >
            <div className="flex flex-col items-center my-8">
                <img
                    src="/images/favicon.png"
                    alt="logo smkn 4"
                    width={80}
                    className="object-contain"
                />
                <ul className="flex flex-col w-full gap-6 px-12 pt-8 mt-5">
                    <DropLink href="#" border="border-b-2">
                        BERANDA
                    </DropLink>
                    <DropText>
                        PROFILE SEKOLAH
                        <IoChevronDown className="text-[24px]" />
                    </DropText>
                    <DropLink href="#" border="border-b-2">
                        JURUSAN
                    </DropLink>
                    <DropText>
                        BERITA
                        <IoChevronDown className="text-[24px]" />
                    </DropText>
                    <DropLink href="#" border="border-b-2">
                        PROFILE ALUMNI
                    </DropLink>
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
