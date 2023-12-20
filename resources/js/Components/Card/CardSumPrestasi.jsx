import React from "react";

function CardSumPrestasi({ title, sum }) {
    return (
        <div className="flex flex-col items-center justify-center gap-4 p-8 font-semibold text-white uppercase border-2 border-yellow-400 xl:p-5">
            <img
                src="/images/sum-prestasi.svg"
                alt="icon prestasi"
                className="object-contain"
            />
            <div className="flex flex-col items-center justify-center gap-1">
                <p className=" text-[20px] md:text-[24px]">{sum}</p>
                <h6 className="text-center text-[12px] md:text-[16px]">
                    PRESTASI <br />
                    TINGKAT {title}
                </h6>
            </div>
        </div>
    );
}

export default CardSumPrestasi;
