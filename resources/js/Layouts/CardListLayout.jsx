import PostCard from "@/Components/Card/PostCard";
import PrestasiCard from "@/Components/Card/PrestasiCard";
import React from "react";

function CardListLayout({ data, type = "post" }) {
    return (
        <>
            {type == "post" && (
                <div className="grid grid-cols-2 gap-5 md:gap-7 xl:grid-cols-3">
                    {data.map((item, index) => (
                        <PostCard key={index} data={item} />
                    ))}
                </div>
            )}
            {type == "prestasi" && (
                <div className="grid grid-cols-2 gap-5 md:gap-7 xl:grid-cols-3">
                    {data.map((item, index) => (
                        <PrestasiCard key={index} data={item} />
                    ))}
                </div>
            )}
        </>
    );
}

export default CardListLayout;
