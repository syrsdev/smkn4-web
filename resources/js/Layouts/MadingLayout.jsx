import React from "react";

function MadingLayout({ children, listBerita }) {
    return (
        <>
            <div className="flex flex-col items-start justify-between lg:flex-row">
                <div className="w-full lg:mr-10 xl:mr-7">{children}</div>
                <div className="w-full mt-7 lg:w-8/12 lg:mt-0">
                    <h3 className="text-primary text-[18px] md:text-[24px] font-bold mb-4">
                        AGENDA SEKOLAH
                    </h3>
                    <div className="flex flex-row w-full gap-6 p-8 bg-secondary"></div>
                </div>
            </div>
        </>
    );
}

export default MadingLayout;
