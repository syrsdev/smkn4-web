import PostCard from "@/Components/Card/PostCard";
import PrestasiCard from "@/Components/Card/PrestasiCard";
import React from "react";

function CardListLayout({
    data,
    type = "post",
    gridcols = "3",
    padding,
    dataLength,
}) {
    console.log(dataLength);
    return (
        <>
            {data.length > 0 ? (
                <>
                    {type == "post" && (
                        <div className="grid grid-cols-2 gap-5 md:gap-7 xl:grid-cols-3">
                            {data.map((item, index) => (
                                <PostCard key={index} data={item} />
                            ))}
                        </div>
                    )}
                    {type == "prestasi" && (
                        <div
                            className={`grid grid-cols-2 gap-4 md:gap-7 xl:grid-cols-${gridcols} w-full ${
                                dataLength < 5 && "h-fit"
                            }`}
                        >
                            {data.map((item, index) => (
                                <PrestasiCard
                                    key={index}
                                    data={item}
                                    padding={padding}
                                    dataLength={dataLength}
                                />
                            ))}
                        </div>
                    )}
                </>
            ) : (
                <div className="flex items-center justify-center">
                    <img
                        src="/images/default/no-data-search.svg"
                        alt="search not found"
                        className="object-contain w-8/12 xl:w-4/12"
                    />
                </div>
            )}
        </>
    );
}

export default CardListLayout;
