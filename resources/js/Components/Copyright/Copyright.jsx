import React from "react";

function Copyright() {
    let tahun = new Date().getFullYear();
    return (
        <div className="flex justify-center py-5 -mt-[1px] text-secondary bg-primary">
            <p className="text-xs md:text-base">
                Copyright © {tahun} KuliKoding04. All rights reserved.
            </p>
        </div>
    );
}

export default Copyright;
