import React from "react";
import { IoChevronDown } from "react-icons/io5";

export default function Navbar() {
    return (
        <nav className="flex items-center bg-primary text-secondary px-[40px] md:px-[65px] xl:px-[100px] justify-between">
            <img
                src="/images/smkn4.svg"
                alt="Logo Smkn 4"
                className="object-contain py-5"
            />

            <label className="burger lg:hidden" for="burger">
                <input type="checkbox" id="burger" />
                <span></span>
                <span></span>
                <span></span>
            </label>
            <ul className="items-center hidden gap-5 xl:flex">
                <li className="duration-150 hover:font-bold hover:pb-2 hover-link">
                    <a href="">BERANDA</a>
                </li>
                <li className="duration-150 hover:font-bold hover:pb-2 hover-link">
                    <a href="" className="flex items-center gap-2">
                        PROFIL SEKOLAH <IoChevronDown />
                    </a>
                </li>
                <li className="duration-150 hover:font-bold hover:pb-2 hover-link">
                    <a href="">PROGRAM KEAHLIAN</a>
                </li>
                <li className="duration-150 hover:font-bold hover:pb-2 hover-link">
                    <a href="" className="flex items-center gap-2">
                        BERITA <IoChevronDown />
                    </a>
                </li>
                <li className="duration-150 hover:font-bold hover:pb-2 hover-link">
                    <a href="">PROFIL ALUMNI</a>
                </li>
            </ul>
        </nav>
    );
}
