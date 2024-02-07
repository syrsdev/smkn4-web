import { Link } from "@inertiajs/react";
import React, { useState } from "react";
import { IoChevronDown } from "react-icons/io5";
import SubNavbar from "./SubNavbar";
import Dropdown from "../Dropdown/Dropdown";
import DropLink from "../Dropdown/DropLink";
import Sidebar from "../Sidebar/Sidebar";

export default function Navbar({ subnav, logo, theme }) {
    const [sidebar, setSidebar] = useState(false);
    const [hoverDropdown, setHoverDropdown] = useState({
        dropdown1: false,
        dropdown2: false,
        dropdown3: false,
    });

    console.log(theme);

    return (
        <>
            <nav className="sticky top-0 z-50">
                <div
                    style={{
                        background: `${theme.primer}`,
                        color: `${theme.fontSekunder}`,
                    }}
                    className={`flex items-center px-[40px] md:px-[65px] xl:px-[100px] justify-between text-[14px]`}
                >
                    <Link href="/" className="w-full lg:w-fit">
                        <img
                            src={`${logo}`}
                            alt="Logo Smkn 4"
                            className="object-contain py-5"
                        />
                    </Link>
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
                                        onChange={() => setSidebar(!sidebar)}
                                        checked={sidebar}
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
                                    <li className={`duration-150 hover-link`}>
                                        <Link href="/">BERANDA</Link>
                                    </li>
                                    <li
                                        className={`relative hover-link duration-150 rotate-hover  `}
                                        onMouseEnter={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown1: true,
                                            });
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown1: false,
                                            });
                                        }}
                                    >
                                        <div className="flex items-center gap-2 cursor-default">
                                            PROFIL SEKOLAH{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </div>
                                        <Dropdown
                                            theme={theme}
                                            shown={hoverDropdown.dropdown1}
                                        >
                                            <DropLink href="/profil-sekolah">
                                                TENTANG SEKOLAH
                                            </DropLink>
                                            <DropLink href="/pegawai">
                                                GURU DAN STAF
                                            </DropLink>
                                        </Dropdown>
                                    </li>
                                    <li className="duration-150 hover-link ">
                                        <Link href="/jurusan">
                                            PROGRAM KEAHLIAN
                                        </Link>
                                    </li>
                                    <li
                                        className="relative duration-150 hover-link rotate-hover "
                                        onMouseEnter={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown2: true,
                                                dropdown3: false,
                                            });
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown2: false,
                                            });
                                        }}
                                    >
                                        <div className="flex items-center gap-2 cursor-default">
                                            BERITA{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </div>
                                        <Dropdown
                                            theme={theme}
                                            shown={hoverDropdown.dropdown2}
                                        >
                                            <DropLink href="/post/artikel">
                                                ARTIKEL
                                            </DropLink>
                                            <DropLink href="/post/berita">
                                                BERITA TERKINI
                                            </DropLink>
                                            <DropLink href="/post/event">
                                                EVENT
                                            </DropLink>
                                            <DropLink href="/post/agenda">
                                                AGENDA
                                            </DropLink>
                                        </Dropdown>
                                    </li>
                                    <li
                                        className="relative duration-150 hover-link rotate-hover "
                                        onMouseEnter={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown2: false,
                                                dropdown3: true,
                                            });
                                        }}
                                        onMouseLeave={() => {
                                            setHoverDropdown({
                                                ...hoverDropdown,
                                                dropdown3: false,
                                            });
                                        }}
                                    >
                                        <div className="flex items-center gap-2 cursor-default">
                                            KESISWAAN{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </div>
                                        <Dropdown
                                            theme={theme}
                                            shown={hoverDropdown.dropdown3}
                                        >
                                            <DropLink href="/prestasi">
                                                PRESTASI
                                            </DropLink>
                                            <DropLink href="/#ekskul">
                                                EKSKUL
                                            </DropLink>
                                        </Dropdown>
                                    </li>
                                </ul>
                            </>
                        )}
                    </div>
                </div>
                <SubNavbar subnav={subnav} theme={theme} />
                <Sidebar isActive={sidebar} theme={theme} />
                <div
                    onClick={() => setSidebar(false)}
                    className={`w-full min-h-screen fixed top-0 lg:hidden ${
                        sidebar == false
                            ? "opacity-0 bg-transparent duration-500 invisible"
                            : "opacity-50 bg-black delay-300 duration-700 block"
                    }`}
                ></div>
            </nav>
        </>
    );
}
