import { Link } from "@inertiajs/react";
import React, { useState } from "react";
import { IoChevronDown } from "react-icons/io5";
import SubNavbar from "./SubNavbar";
import Dropdown from "../Dropdown/Dropdown";
import DropLink from "../Dropdown/DropLink";
import Sidebar from "../Sidebar/Sidebar";

export default function Navbar({ subnav, logo }) {
    const [sidebar, setSidebar] = useState(false);
    const [hoverDropdown, setHoverDropdown] = useState(false);
    const [hoverDropdown2, setHoverDropdown2] = useState(false);
    const [hoverDropdown3, setHoverDropdown3] = useState(false);

    return (
        <>
            <nav className="sticky top-0 z-50">
                <div className="flex items-center bg-primary text-secondary px-[40px] md:px-[65px] xl:px-[100px] justify-between text-[14px]">
                    <div className="w-full lg:w-fit">
                        <img
                            src={`/images/${logo}`}
                            alt="Logo Smkn 4"
                            className="object-contain py-5"
                        />
                    </div>
                    <div className="flex justify-end w-full">
                        {window.screen.width < 1024 ? (
                            <>
                                <label
                                    className="burger z-[70] lg:hidden"
                                    htmlFor="burger"
                                >
                                    <input
                                        type="checkbox"
                                        id="burger"
                                        onClick={() => setSidebar(!sidebar)}
                                    />
                                    <span
                                        className={`${
                                            sidebar == false
                                                ? "bg-white"
                                                : "bg-primary"
                                        }`}
                                    ></span>
                                    <span
                                        className={`${
                                            sidebar == false
                                                ? "bg-white"
                                                : "bg-primary"
                                        }`}
                                    ></span>
                                    <span
                                        className={`${
                                            sidebar == false
                                                ? "bg-white"
                                                : "bg-primary"
                                        }`}
                                    ></span>
                                </label>
                            </>
                        ) : (
                            <>
                                <ul className="items-center hidden gap-6 font-semibold lg:flex">
                                    <li className="duration-150 hover-link before:bg-tertiary">
                                        <Link href="#">BERANDA</Link>
                                    </li>
                                    <li
                                        className={`relative hover-link duration-150 rotate-hover before:bg-tertiary `}
                                        onMouseEnter={() => {
                                            setHoverDropdown(true);
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown(false);
                                        }}
                                    >
                                        <Link
                                            href="#"
                                            className="flex items-center gap-2"
                                        >
                                            PROFIL SEKOLAH{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </Link>
                                        <Dropdown shown={hoverDropdown}>
                                            <DropLink href="#">
                                                TENTANG SEKOLAH
                                            </DropLink>
                                            <DropLink href="#">
                                                GURU DAN STAF
                                            </DropLink>
                                        </Dropdown>
                                    </li>
                                    <li className="duration-150 hover-link before:bg-tertiary">
                                        <Link href="#">PROGRAM KEAHLIAN</Link>
                                    </li>
                                    <li
                                        className="relative duration-150 hover-link rotate-hover before:bg-tertiary"
                                        onMouseEnter={() => {
                                            setHoverDropdown2(true);
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown2(false);
                                        }}
                                    >
                                        <Link
                                            href="#"
                                            className="flex items-center gap-2"
                                        >
                                            BERITA{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </Link>
                                        <Dropdown shown={hoverDropdown2}>
                                            <DropLink href="#">
                                                ARTIKEL
                                            </DropLink>
                                            <DropLink href="#">
                                                BERITA TERKINI
                                            </DropLink>
                                            <DropLink href="#">EVENT</DropLink>
                                            <DropLink href="#">AGENDA</DropLink>
                                        </Dropdown>
                                    </li>
                                    <li
                                        className="relative duration-150 hover-link rotate-hover before:bg-tertiary"
                                        onMouseEnter={() => {
                                            setHoverDropdown3(true);
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown3(false);
                                        }}
                                    >
                                        <Link
                                            href="#"
                                            className="flex items-center gap-2"
                                        >
                                            KESISWAAN{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </Link>
                                        <Dropdown shown={hoverDropdown3}>
                                            <DropLink href="#">
                                                PRESTASI
                                            </DropLink>
                                            <DropLink href="#">EKSKUL</DropLink>
                                        </Dropdown>
                                    </li>
                                </ul>
                            </>
                        )}
                    </div>
                </div>
                <SubNavbar subnav={subnav} />
                <Sidebar isActive={sidebar} />
            </nav>
        </>
    );
}
