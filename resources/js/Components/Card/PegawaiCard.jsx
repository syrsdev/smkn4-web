import React from "react";
import CarouselCardLayout from "@/Layouts/CarouselCardLayout";

function PegawaiCard({ item }) {
    return (
        <CarouselCardLayout href={null} p="pb-6 pt-2 px-2" gap="gap-1">
            <img
                src={item.gambar}
                alt="Foto Tenaga Pendidik/Kependidikan"
                className="w-full h-[160px] md:h-[220px] xl:h-[330px] object-cover rounded-xl mb-4"
            />
            <div className="">
                <p className="text-[12px] md:text-[14px] xl:text-[16px]">
                    {item.bagian}
                </p>
                <h5 className="font-bold text-[12px] md:text-[14px] xl:text-[16px]">
                    {item.nama}
                </h5>
            </div>
            <div className="text-[11px] md:text-[12px] xl:text-[16px]">
                <p className="">{item.sub_bagian}</p>
                <p>{item.mapel != null ? item.mapel.nama : ""}</p>
            </div>
        </CarouselCardLayout>
    );
}

export default PegawaiCard;
