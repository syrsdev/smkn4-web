import React from "react";

function CardSumPrestasi({ title, sum, theme }) {
    return (
        <div
            style={{ color: `${theme.fontSekunder}` }}
            className="flex flex-col items-center justify-center gap-4 py-8 font-semibold uppercase border-2 border-yellow-400 md:py-10"
        >
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
