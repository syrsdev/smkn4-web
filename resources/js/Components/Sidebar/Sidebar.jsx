import React, { useState } from "react";
import DropLink from "../Dropdown/DropLink";
import SideDropDown from "../Dropdown/SideDropDown";
import SideDropLink from "../Dropdown/SideDropLink";
import { Link } from "@inertiajs/react";

function Sidebar({ isActive }) {
    const [dropdown, setDropdown] = useState(false);
    const [dropdown2, setDropdown2] = useState(false);
    const [dropdown3, setDropdown3] = useState(false);
    return (
        <div
            className={`fixed w-[70%] md:w-[44%] min-h-screen bg-[#F2F7FF] z-[60] top-0 duration-700 lg:hidden ${
                isActive == false ? "-right-[1000px]" : "-right-1"
            }`}
        >
            <div className="flex flex-col items-center max-h-screen my-8 overflow-y-auto">
                <Link href="/">
                    <img
                        loading="lazy"
                        src="/images/favicon.png"
                        alt="logo smkn 4"
                        width={60}
                        className="object-contain"
                    />
                </Link>
                <ul className="w-full px-8 pt-8 pb-16 md:px-10">
                    <DropLink href="/" border="border-b-2" pb={true}>
                        BERANDA
                    </DropLink>
                    <span onClick={() => setDropdown(!dropdown)}>
                        <SideDropDown title="PROFILE SEKOLAH" active={dropdown}>
                            <SideDropLink>
                                <DropLink href="#" pb={true}>
                                    TENTANG SEKOLAH
                                </DropLink>
                                <DropLink href="#" pb={true}>
                                    GURU DAN STAF
                                </DropLink>
                            </SideDropLink>
                        </SideDropDown>
                    </span>
                    <DropLink href="#" border="border-b-2" pb={true}>
                        JURUSAN
                    </DropLink>
                    <span onClick={() => setDropdown2(!dropdown2)}>
                        <SideDropDown title="BERITA" active={dropdown2}>
                            <SideDropLink>
                                <DropLink href="/post/artikel" pb={true}>
                                    ARTIKEL
                                </DropLink>
                                <DropLink href="/post/berita" pb={true}>
                                    BERITA TERKINI
                                </DropLink>
                                <DropLink href="/post/event" pb={true}>
                                    EVENT
                                </DropLink>
                                <DropLink href="/post/agenda" pb={true}>
                                    AGENDA
                                </DropLink>
                            </SideDropLink>
                        </SideDropDown>
                    </span>
                    <span onClick={() => setDropdown3(!dropdown3)}>
                        <SideDropDown title="KESISWAAN" active={dropdown3}>
                            <SideDropLink>
                                <DropLink href="/prestasi" pb={true}>
                                    PRESTASI
                                </DropLink>
                                <DropLink href="/#ekskul" pb={true}>
                                    EKSKUL
                                </DropLink>
                            </SideDropLink>
                        </SideDropDown>
                    </span>
                </ul>
            </div>
        </div>
    );
}

export default Sidebar;
