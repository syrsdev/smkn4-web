import React from "react";

function Copyright({ theme }) {
    let tahun = new Date().getFullYear();
    return (
        <div
            style={{
                color: `${theme.fontSekunder}`,
                backgroundColor: `${theme.primer}`,
            }}
            className="flex justify-center py-5 -mt-[1px]"
        >
            <p className="text-xs md:text-base">
                Copyright © {tahun} KuliKoding04. All rights reserved.
            </p>
        </div>
    );
}

export default Copyright;
