import { Link } from "@inertiajs/react";
import React from "react";
import { IoChevronDown } from "react-icons/io5";
import SubNavbar from "./SubNavbar";

export default function Navbar({ subnav, logo }) {
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
                                    className="burger lg:hidden"
                                    htmlFor="burger"
                                >
                                    <input type="checkbox" id="burger" />
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </label>
                            </>
                        ) : (
                            <>
                                <ul className="items-center hidden gap-6 font-semibold lg:flex">
                                    <li className="duration-150 hover:pb-2 hover-link before:bg-tertiary">
                                        <Link href="#">BERANDA</Link>
                                    </li>
                                    <li className="duration-150 hover:pb-2 hover-link rotate-hover before:bg-tertiary">
                                        <Link
                                            href="#"
                                            className="flex items-center gap-2"
                                        >
                                            PROFIL SEKOLAH{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </Link>
                                    </li>
                                    <li className="duration-150 hover:pb-2 hover-link before:bg-tertiary">
                                        <Link href="#">PROGRAM KEAHLIAN</Link>
                                    </li>
                                    <li className="duration-150 hover:pb-2 hover-link rotate-hover before:bg-tertiary">
                                        <Link
                                            href="#"
                                            className="flex items-center gap-2"
                                        >
                                            BERITA{" "}
                                            <IoChevronDown className="duration-150 rotate" />
                                        </Link>
                                    </li>
                                    <li className="duration-150 hover:pb-2 hover-link before:bg-tertiary">
                                        <Link href="#">PROFIL ALUMNI</Link>
                                    </li>
                                </ul>
                            </>
                        )}
                    </div>
                </div>
                <SubNavbar subnav={subnav} />
            </nav>
        </>
    );
}
