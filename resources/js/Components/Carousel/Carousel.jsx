import { Splide } from "@splidejs/react-splide";
import React from "react";

function Carousel({ label, children }) {
    return (
        <Splide
            aria-label={label}
            className="flex justify-center visible "
            options={{
                rewind: true,
                autoplay: true,
                perPage: 4,
                gap: "2.6rem",
                breakpoints: {
                    767: {
                        perPage: 2,
                        gap: "0.7rem",
                    },
                    1024: {
                        perPage: 3,
                        gap: "1.3rem",
                    },
                    1280: {
                        perPage: 4,
                        gap: "2.6rem",
                    },
                },
            }}
        >
            {children}
        </Splide>
    );
}

export default Carousel;
