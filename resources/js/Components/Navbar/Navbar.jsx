import React from "react";
import { IoChevronDown } from "react-icons/io5";

export default function Navbar() {
    return (
        <nav className="flex fixed w-full items-center bg-primary text-secondary px-[40px] md:px-[65px] xl:px-[100px] justify-between text-[14px]">
            <img
                src="/images/smkn4.svg"
                alt="Logo Smkn 4"
                className="object-contain py-5"
            />
            {window.screen.width <= 1024 ? (
                <>
                    <label className="burger xl:hidden" for="burger">
                        <input type="checkbox" id="burger" />
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </>
            ) : (
                <>
                    <ul className="items-center hidden gap-6 font-semibold xl:flex">
                        <li className="duration-150 hover:pb-2 hover-link">
                            <a href="">BERANDA</a>
                        </li>
                        <li className="duration-150 hover:pb-2 hover-link rotate-hover">
                            <a href="" className="flex items-center gap-2">
                                PROFIL SEKOLAH{" "}
                                <IoChevronDown className="duration-150 rotate" />
                            </a>
                        </li>
                        <li className="duration-150 hover:pb-2 hover-link">
                            <a href="">PROGRAM KEAHLIAN</a>
                        </li>
                        <li className="duration-150 hover:pb-2 hover-link rotate-hover">
                            <a href="" className="flex items-center gap-2">
                                BERITA{" "}
                                <IoChevronDown className="duration-150 rotate" />
                            </a>
                        </li>
                        <li className="duration-150 hover:pb-2 hover-link">
                            <a href="">PROFIL ALUMNI</a>
                        </li>
                    </ul>
                </>
            )}
        </nav>
    );
}
