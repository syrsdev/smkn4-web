import { Link } from "@inertiajs/react";
import { SplideSlide } from "@splidejs/react-splide";
import React from "react";

function CarouselCardLayout({
    children,
    href = "",
    gap,
    p = "px-3 py-7 md:px-5 xl:px-10 xl:py-14 md:py-9",
    theme,
}) {
    return (
        <>
            <SplideSlide
                style={{
                    color: `${theme}`,
                    borderColor: `${theme}`,
                }}
                className={`duration-500 border-2 rounded-md hover:shadow-2xl ${p} `}
            >
                {href != null ? (
                    <Link
                        href={href}
                        className="flex flex-col items-center justify-start gap-2 text-center"
                    >
                        {children}
                    </Link>
                ) : (
                    <div
                        className={`flex flex-col items-center justify-start text-center ${gap}`}
                    >
                        {children}
                    </div>
                )}
            </SplideSlide>
        </>
    );
}

export default CarouselCardLayout;
