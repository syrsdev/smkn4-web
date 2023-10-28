import React from "react";

function Container({ children, backgroundColor }) {
    return (
        <div
            className={`px-[40px] md:px-[65px] xl:px-[100px] ${
                backgroundColor ? `${backgroundColor}` : ""
            }`}
        >
            {children}
        </div>
    );
}

export default Container;
