import PostCard from "@/Components/Card/PostCard";
import React from "react";

function PostLayout({ data }) {
    return (
        <div className="grid grid-cols-2 gap-5 md:gap-7 xl:grid-cols-3">
            {data.map((item, index) => (
                <PostCard key={index} data={item} />
            ))}
        </div>
    );
}

export default PostLayout;
