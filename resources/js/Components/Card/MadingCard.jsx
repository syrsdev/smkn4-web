import { Link } from "@inertiajs/react";
import React from "react";

function MadingCard({ item, prestasi = false }) {
    return (
        <div className="flex w-full gap-3 overflow-hidden md:w-2/5 lg:w-full">
            <img
                src={`${item.gambar}`}
                alt="thumbnail mading"
                className="h-[110px] min-w-[100px] w-[100px] object-cover"
            />
            <div className="w-full overflow-hidden">
                <h4 className="font-bold text-[16px] truncate">{item.judul}</h4>
                <p className="text-[12px] mb-1">
                    {new Date(item.created_at).toLocaleDateString("id-ID")}
                </p>
                <div
                    className="line-clamp-2 konten-card"
                    dangerouslySetInnerHTML={{ __html: item.konten }}
                ></div>
                <Link
                    className="text-[12px] border-b text-slate-300 border-slate-300"
                    href={`${
                        prestasi == true
                            ? `/prestasi/${item.slug}`
                            : `/post/${item.kategori}/${item.slug}`
                    }`}
                >
                    Read More...
                </Link>
            </div>
        </div>
    );
}

export default MadingCard;
