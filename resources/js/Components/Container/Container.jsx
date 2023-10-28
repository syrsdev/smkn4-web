import React from "react";

function Container({ children, background }) {
    return (
        <div
            className={`px-[40px] md:px-[65px] xl:px-[100px]  ${
                background ? `${background}` : ""
            }`}
        >
            {children}
        </div>
    );
}

export default Container;
