import React from "react";

function Container({ children, classname, id = "#", style }) {
    return (
        <div
            style={style}
            id={id}
            className={`px-[35px] md:px-[65px] xl:px-[100px]  ${
                classname ? `${classname}` : ""
            }`}
        >
            {children}
        </div>
    );
}

export default Container;
