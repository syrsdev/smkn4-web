import { Link } from "@inertiajs/react";
import React from "react";

function ButtonFilter({ hrefReset = "#" }) {
    return (
        <div className="flex flex-col-reverse items-center justify-between gap-3 mt-2 md:gap-5 md:mt-5 md:flex-row">
            <Link
                href={hrefReset}
                className="w-full py-2 text-center rounded-lg bg-stone-200"
            >
                Reset
            </Link>
            <button
                type="submit"
                className="w-full py-2 text-center text-white rounded-lg bg-primary"
            >
                Simpan
            </button>
        </div>
    );
}

export default ButtonFilter;
