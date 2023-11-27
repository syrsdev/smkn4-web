import { Link } from "@inertiajs/react";
import React from "react";

function PostCard({ data }) {
    return (
        <div className="flex flex-col gap-2">
            <img
                src={`${data.gambar}`}
                alt="thumbnail post"
                className="max-h-[168px] xl:max-h-[200px] object-cover"
            />
            <div>
                <h4 className="text-[16px] xl:text-[20px] font-bold text-primary truncate">
                    {data.judul}
                </h4>
                <p className=" text-[12px] md:text-[14px] font-semibold text-primary flex items-center gap-1 flex-wrap xl:gap-2">
                    <span>Post by {data.penulis.name}</span>
                    {new Date(data.created_at).toLocaleDateString("id-ID")}
                </p>
            </div>
            <p
                className="line-clamp-3 konten-card"
                dangerouslySetInnerHTML={{ __html: data.konten }}
            ></p>
            <Link
                className="text-[14px] text-primary underline underline-offset-8 pb-7"
                href={`/post/${data.kategori}/${data.slug}`}
            >
                Read More...
            </Link>
        </div>
    );
}

export default PostCard;
