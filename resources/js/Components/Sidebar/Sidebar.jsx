import React, { useState } from "react";
import DropLink from "../Dropdown/DropLink";
import SideDropDown from "../Dropdown/SideDropDown";
import SideDropLink from "../Dropdown/SideDropLink";
import { Link } from "@inertiajs/react";

function Sidebar({ isActive }) {
    const [dropdown, setDropdown] = useState({
        dropdown1: false,
        dropdown2: false,
        dropdown3: false,
    });

    return (
        <div className={`fixed z-[60] top-0 lg:hidden`}>
            <div
                className={`w-[70%] md:w-[44%] fixed z-[60] bg-[#F2F7FF] duration-700 min-h-screen ${
                    isActive == false ? "-right-[1000px]" : "-right-0"
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
                        <span
                            onClick={() =>
                                setDropdown({
                                    ...dropdown,
                                    dropdown1: !dropdown.dropdown1,
                                })
                            }
                        >
                            <SideDropDown
                                title="PROFILE SEKOLAH"
                                active={dropdown.dropdown1}
                            >
                                <SideDropLink>
                                    <DropLink href="#" pb={true}>
                                        TENTANG SEKOLAH
                                    </DropLink>
                                    <DropLink href="/pegawai" pb={true}>
                                        GURU DAN STAF
                                    </DropLink>
                                </SideDropLink>
                            </SideDropDown>
                        </span>
                        <DropLink href="/jurusan" border="border-b-2" pb={true}>
                            JURUSAN
                        </DropLink>
                        <span
                            onClick={() =>
                                setDropdown({
                                    ...dropdown,
                                    dropdown2: !dropdown.dropdown2,
                                })
                            }
                        >
                            <SideDropDown
                                title="BERITA"
                                active={dropdown.dropdown2}
                            >
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
                        <span
                            onClick={() =>
                                setDropdown({
                                    ...dropdown,
                                    dropdown3: !dropdown.dropdown3,
                                })
                            }
                        >
                            <SideDropDown
                                title="KESISWAAN"
                                active={dropdown.dropdown3}
                            >
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
        </div>
    );
}

export default Sidebar;
