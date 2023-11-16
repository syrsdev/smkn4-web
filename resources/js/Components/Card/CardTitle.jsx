import { Link } from "@inertiajs/react";
import React from "react";
import { IoChevronForward } from "react-icons/io5";

function CardTitle({ title, href = "#" }) {
    return (
        <div className="flex flex-wrap items-center justify-between mb-4 md:justify-start md:gap-3 text-primary">
            <h3 className="text-[15px] md:text-[24px] font-bold">{title}</h3>
            <Link
                href={href}
                className="text-[13px] md:text-[16px] font-normal flex gap-1 items-center"
            >
                Tampilkan Semua <IoChevronForward />
            </Link>
        </div>
    );
}

export default CardTitle;
