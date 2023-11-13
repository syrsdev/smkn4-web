import React, { useState } from "react";
import DropLink from "../Dropdown/DropLink";
import SideDropDown from "../Dropdown/SideDropDown";
import SideDropLink from "../Dropdown/SideDropLink";

function Sidebar({ isActive }) {
    const [dropdown, setDropdown] = useState(false);
    const [dropdown2, setDropdown2] = useState(false);
    return (
        <div
            className={`fixed w-4/6 md:w-1/2 min-h-screen bg-[#F2F7FF] z-[60] top-0 duration-700 lg:hidden ${
                isActive == false ? "-right-[1000px]" : "-right-1"
            }`}
        >
            <div className="flex flex-col items-center my-8">
                <img
                    src="/images/favicon.png"
                    alt="logo smkn 4"
                    width={60}
                    className="object-contain"
                />
                <ul className="w-full h-[500px] md:h-full px-10 pt-8 overflow-y-auto">
                    <DropLink href="#" border="border-b-2">
                        BERANDA
                    </DropLink>
                    <span onClick={() => setDropdown(!dropdown)}>
                        <SideDropDown title="PROFILE SEKOLAH" active={dropdown}>
                            <SideDropLink>
                                <DropLink href="#">TENTANG SEKOLAH</DropLink>
                                <DropLink href="#">GURU DAN STAF</DropLink>
                            </SideDropLink>
                        </SideDropDown>
                    </span>
                    <DropLink href="#" border="border-b-2">
                        JURUSAN
                    </DropLink>
                    <span onClick={() => setDropdown2(!dropdown2)}>
                        <SideDropDown title="BERITA" active={dropdown2}>
                            <SideDropLink>
                                <DropLink href="#">ARTIKEL</DropLink>
                                <DropLink href="#">BERITA TERKINI</DropLink>
                                <DropLink href="#">EVENT</DropLink>
                                <DropLink href="#">PRESTASI</DropLink>
                            </SideDropLink>
                        </SideDropDown>
                    </span>
                    <DropLink href="#" border="border-b-2">
                        PROFILE ALUMNI
                    </DropLink>
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
