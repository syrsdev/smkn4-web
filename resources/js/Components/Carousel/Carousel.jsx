import { Splide } from "@splidejs/react-splide";
import React from "react";

function Carousel({ label, children, perpageXl = 4 }) {
    return (
        <Splide
            aria-label={label}
            className="flex justify-center visible"
            options={{
                rewind: true,
                autoplay: true,
                perPage: perpageXl,
                gap: perpageXl != 4 ? "2rem" : "2.6rem",
                breakpoints: {
                    321: {
                        perPage: 1,
                        gap: "0.7rem",
                        fixedWidth: "65%",
                    },
                    767: {
                        perPage: 2,
                        gap: "0.8rem",
                    },
                    1024: {
                        perPage: 3,
                        gap: "1.3rem",
                    },
                    1280: {
                        perPage: 4,
                        gap: "2rem",
                    },
                },
            }}
        >
            {children}
        </Splide>
    );
}

export default Carousel;
