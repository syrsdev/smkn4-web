import React from "react";
import CarouselCardLayout from "@/Layouts/CarouselCardLayout";

function JurusanCard({ item }) {
    return (
        <CarouselCardLayout href={`/jurusan/${item.slug}`}>
            <img
                src={item.icon}
                alt="Icon Jurusan"
                className="xl:w-[100px] w-[70px] h-[70px] xl:h-[100px] object-contain"
            />
            <h5 className="font-bold text-[14px] xl:text-[20px]">
                {item.nama}
            </h5>
            <p className=" text-[12px] xl:text-[16px] line-clamp-2 md:line-clamp-3 ">
                {item.deskripsi}
            </p>
        </CarouselCardLayout>
    );
}

export default JurusanCard;
