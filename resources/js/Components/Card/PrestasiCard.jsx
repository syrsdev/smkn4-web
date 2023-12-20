import { Link } from "@inertiajs/react";
import React from "react";

function PrestasiCard({ data, padding = false, dataLength }) {
    console.log(dataLength);
    return (
        <Link
            href={`/prestasi/${data.slug}`}
            className={`flex flex-col gap-2 bg-white thumbnail ${
                dataLength < 5 && "h-fit"
            }`}
        >
            <div className="h-[120px] overflow-hidden md:h-[168px] xl:h-[200px]">
                <div className="relative">
                    <img
                        src={`${data.gambar}`}
                        alt="thumbnail post"
                        className="object-cover thumbnail h-[120px] w-full md:h-[168px] xl:h-[200px]"
                    />
                    <div className="absolute top-0 right-0 px-3 py-1 capitalize md:px-4 xl:py-2 xl:px-7 rounded-bl-2xl bg-primary text-secondary">
                        {data.kategori}
                    </div>
                </div>
            </div>
            <div className={`${padding == true && "px-2 md:px-4 xl:px-6"}`}>
                <h4 className="text-[16px] xl:text-[20px] font-bold text-primary truncate">
                    {data.judul}
                </h4>
                <p className=" text-[12px] md:text-[14px] font-semibold text-primary flex items-center gap-1 flex-wrap xl:gap-2">
                    <span>Post by {data.penulis.name}</span>
                    {new Date(data.created_at).toLocaleDateString("id-ID")}
                </p>
            </div>
            <div
                className={`text-[14px] text-primary underline underline-offset-8 pb-7 mt-auto ${
                    padding == true && "px-2 md:px-4 xl:px-6"
                }`}
                href={`/prestasi/${data.slug}`}
            >
                Read More...
            </div>
        </Link>
    );
}

export default PrestasiCard;
