import { Link } from "@inertiajs/react";
import React from "react";
import { IoChevronForward } from "react-icons/io5";

function MadingTitle({ title, href }) {
    return (
        <div className="flex flex-wrap items-center justify-between mb-4 md:justify-start md:gap-3 text-primary">
            <h3 className="text-[16px] md:text-[18px] font-bold">
                {title}
            </h3>
            <Link
                href={`${href == "prestasi" ? `/${href}` : `/post/${href}`}`}
                className="text-[12px] md:text-[16px] font-normal flex gap-1 items-center hover:underline hover:underline-offset-8"
            >
                Tampilkan Semua <IoChevronForward />
            </Link>
        </div>
    );
}

export default MadingTitle;
