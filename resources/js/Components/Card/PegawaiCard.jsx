import React from "react";
import CarouselCardLayout from "@/Layouts/CarouselCardLayout";

function PegawaiCard({ item, carousel = true }) {
    return (
        <>
            {carousel == true ? (
                <CarouselCardLayout href={null} p="pb-10 pt-2 px-2" gap="gap-1">
                    <img
                        src={item.gambar}
                        alt="Foto Tenaga Pendidik/Kependidikan"
                        className="w-full h-[170px] md:h-[200px] xl:h-[250px] object-cover rounded-xl mb-2"
                    />
                    <div className="">
                        <p className="text-[12px] capitalize">{item.bagian}</p>
                        <h5 className="font-bold text-[14px] line-clamp-1">
                            {item.nama}
                        </h5>
                    </div>
                    <div className="text-[12px]">
                        <p className="capitalize">{item.sub_bagian}</p>
                        <p className="line-clamp-2 ">
                            {item.mapel != null ? item.mapel.nama : ""}
                        </p>
                    </div>
                </CarouselCardLayout>
            ) : (
                <div
                    className={`duration-500 border-2 rounded-md hover:shadow-xl hover:shadow-[#1A274D]  text-primary border-primary pb-10 pt-2 px-2`}
                >
                    <div
                        className={`flex flex-col items-center justify-start text-center gap-1`}
                    >
                        <img
                            src={item.gambar}
                            alt="Foto Tenaga Pendidik/Kependidikan"
                            className="w-full h-[170px] md:h-[200px] xl:h-[250px] object-cover rounded-xl mb-2"
                        />
                        <div className="">
                            <p className="text-[12px] capitalize">
                                {item.bagian}
                            </p>
                            <h5 className="font-bold text-[14px]">
                                {item.nama}
                            </h5>
                        </div>
                        <div className="text-[12px]">
                            <p className="capitalize">{item.sub_bagian}</p>
                            <p>{item.mapel != null ? item.mapel.nama : ""}</p>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
}

export default PegawaiCard;
