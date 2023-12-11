import { Link } from "@inertiajs/react";
import { SplideSlide } from "@splidejs/react-splide";
import React from "react";

function CarouselCardLayout({ children, href = "" }) {
    return (
        <>
            <SplideSlide className="px-3 py-5 duration-500 border-2 rounded-md hover:shadow-xl hover:shadow-[#1A274D] md:px-5 xl:px-10 xl:py-14 md:py-9 text-primary border-primary ">
                {href != null ? (
                    <Link
                        href={href}
                        className="flex flex-col items-center justify-start gap-2 text-center xl:gap-5 "
                    >
                        {children}
                    </Link>
                ) : (
                    <div className="flex flex-col items-center justify-start gap-2 text-center xl:gap-5 ">
                        {children}
                    </div>
                )}
            </SplideSlide>
        </>
    );
}

export default CarouselCardLayout;
