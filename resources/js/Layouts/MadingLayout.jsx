import MadingCard from "@/Components/Card/MadingCard";
import React from "react";
import MadingTitle from "@/Components/Card/MadingTitle";

function MadingLayout({ children, listPost, title, href = "#" }) {
    return (
        <>
            <div className="flex flex-col items-start justify-between w-full lg:flex-row">
                <div className="relative w-full lg:mr-7">{children}</div>
                <div className="w-full mt-7 lg:w-6/12 lg:mt-0">
                    <MadingTitle title={title} href={href} />
                    <div
                        className={`flex flex-col flex-wrap gap-4 p-5 overflow-hidden text-white md:gap-10 lg:gap-4 lg:flex-col md:flex-row md:p-8 bg-secondary ${
                            listPost.length % 2 == 0
                                ? "md:justify-evenly"
                                : "md:justify-start"
                        } `}
                    >
                        {listPost.length > 0 ? (
                            <>
                                {listPost.map((item, index) => (
                                    <MadingCard
                                        item={item}
                                        key={index}
                                        prestasi={
                                            href == "prestasi" ? true : false
                                        }
                                    />
                                ))}
                            </>
                        ) : (
                            <div className="flex flex-col items-center justify-center">
                                <img
                                    src={`/images/default/no-data-mading.svg`}
                                    alt="thumbnail post"
                                    className="max-h-[200px]"
                                />
                                <h2 className="font-bold text-[20px] text-center text-secondary">
                                    <span className="lowercase">{title}</span>{" "}
                                    belum ada
                                </h2>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </>
    );
}

export default MadingLayout;
