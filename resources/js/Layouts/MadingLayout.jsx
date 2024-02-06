import MadingCard from "@/Components/Card/MadingCard";
import React from "react";
import MadingTitle from "@/Components/Card/MadingTitle";

function MadingLayout({ children, listPost, title, href = "#", theme }) {
    // console.log(theme);
    return (
        <>
            <div className="flex flex-col items-start justify-between w-full lg:flex-row">
                <div className="relative w-full lg:mr-7">{children}</div>
                <div className="w-full mt-7 lg:w-4/12 lg:mt-0">
                    <MadingTitle
                        title={title}
                        href={href}
                        theme={theme.fontPrimer}
                    />
                    <div
                        style={{
                            backgroundColor: `${theme.sekunder}`,
                            color: `${theme.fontSekunder}`,
                        }}
                        className={`flex flex-col flex-wrap gap-4 p-5 overflow-hidden md:gap-10 lg:gap-4 lg:flex-col md:flex-row md:p-8  ${
                            listPost.length % 2 == 0
                                ? "md:justify-evenly"
                                : "md:justify-start"
                        } `}
                    >
                        {listPost.length > 0 ? (
                            <>
                                {listPost.map((item, index) => (
                                    <MadingCard
                                        theme={theme}
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
                                <h2
                                    style={{
                                        color: `${theme.fontSekunder}`,
                                    }}
                                    className="font-bold text-[20px] text-center"
                                >
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
