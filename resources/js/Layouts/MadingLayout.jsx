import CardTitle from "@/Components/Card/CardTitle";
import MadingCard from "@/Components/Card/MadingCard";
import React from "react";

function MadingLayout({ children, listPost, title }) {
    // console.log(listPost);
    return (
        <>
            <div className="flex flex-col items-start justify-between lg:flex-row">
                <div className="relative w-full lg:mr-7">{children}</div>
                <div className="w-full mt-7 lg:w-8/12 lg:mt-0">
                    <CardTitle title={title} />
                    <div
                        className={`flex flex-col flex-wrap gap-4 p-5 overflow-hidden text-white md:gap-10 lg:gap-4 lg:flex-col md:flex-row md:p-8 bg-secondary ${
                            listPost.length % 2 == 0
                                ? "md:justify-evenly"
                                : "md:justify-start"
                        } `}
                    >
                        {listPost.map((item, index) => (
                            <MadingCard item={item} key={index} />
                        ))}
                    </div>
                </div>
            </div>
        </>
    );
}

export default MadingLayout;
