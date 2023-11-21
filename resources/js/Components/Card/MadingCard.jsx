import { Link } from "@inertiajs/react";
import React from "react";

function MadingCard({ item }) {
    return (
        <div className="flex w-full gap-3 overflow-hidden md:w-2/5 lg:w-full">
            <img
                src={`/images/default/${item.gambar}`}
                alt="thumbnail mading"
                className="h-[110px] w-[100px] object-cover"
            />
            <div className="w-full overflow-hidden">
                <h4 className="font-bold text-[16px] truncate">{item.judul}</h4>
                <p className="text-[12px] mb-1">
                    {new Date(item.created_at).toLocaleDateString("id-ID")}
                </p>
                <div
                    className="text-[12px] line-clamp-2"
                    dangerouslySetInnerHTML={{ __html: item.konten }}
                ></div>
                <Link
                    className="text-[12px] border-b text-slate-300 border-slate-300"
                    href={`/post/${item.kategori}/${item.slug}`}
                >
                    Read More...
                </Link>
            </div>
        </div>
    );
}

export default MadingCard;
