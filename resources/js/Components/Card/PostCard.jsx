import { Link } from "@inertiajs/react";
import React from "react";

function PostCard({ data, theme }) {
    return (
        <Link
            href={`/post/${data.kategori}/${data.slug}`}
            className="flex flex-col gap-2 thumbnail"
        >
            <div className="h-[120px] overflow-hidden md:h-[168px] xl:h-[200px]">
                <img
                    src={`${data.gambar}`}
                    alt="thumbnail post"
                    className="object-cover thumbnail h-[120px] w-full md:h-[168px] xl:h-[200px]"
                />
            </div>
            <div style={{ color: `${theme.fontPrimer}` }}>
                <h4 className="text-[16px] xl:text-[20px] font-bold text-inherit truncate">
                    {data.judul}
                </h4>
                <p className=" text-[12px] md:text-[14px] font-semibold text-inherit flex items-center gap-1 flex-wrap xl:gap-2">
                    <span>Post by {data.penulis.name}</span>
                    {new Date(data.created_at).toLocaleDateString("id-ID")}
                </p>
            </div>
            <p
                className="line-clamp-2 xl:line-clamp-3 konten-card"
                dangerouslySetInnerHTML={{ __html: data.konten }}
            ></p>
            <span
                style={{ color: `${theme.fontPrimer}` }}
                className="text-[14px] underline underline-offset-8 pb-7"
            >
                Read More...
            </span>
        </Link>
    );
}

export default PostCard;
