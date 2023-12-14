import React from "react";
import { useState } from "react";
import { IoMdClose } from "react-icons/io";

function ModalLayout({
    children,
    judul,
    active = false,
    onClick,
    submit,
    image = false,
    src,
}) {
    return (
        <>
            {active == true && (
                <div
                    className={`fixed top-0 w-full h-screen z-[65] flex justify-center items-center `}
                >
                    <div
                        className="absolute w-full h-12 bg-black opacity-50 z-[65] min-h-screen"
                        onClick={() => onClick()}
                    ></div>
                    {image == false ? (
                        <div className="w-10/12 xl:w-1/2 h-fit bg-white opacity-100 z-[70] rounded-xl flex flex-col px-10 py-8">
                            <div className="flex items-center justify-between w-full pb-2 font-bold border-b-2 border-primary">
                                <h1 className="text-[16px] md:text-[20px] text-primary">
                                    Filter {judul}
                                </h1>
                                <IoMdClose
                                    className="text-2xl cursor-pointer text-primary hover:text-red-500"
                                    onClick={() => onClick()}
                                />
                            </div>
                            <form
                                onSubmit={submit}
                                className="flex flex-col gap-5 my-5"
                            >
                                {children}
                            </form>
                        </div>
                    ) : (
                        <>
                            <div className="absolute z-[71] top-0 w-full flex justify-between items-center px-10 py-4 text-white bg-black font-bold">
                                <h1 className="text-[16px] md:text-[20px]">
                                    Preview Gambar
                                </h1>
                                <IoMdClose
                                    className="text-2xl cursor-pointer hover:text-red-500"
                                    onClick={() => onClick()}
                                />
                            </div>
                            <div className="z-[70] w-10/12 xl:w-5/12">
                                <img
                                    src={src}
                                    alt="detail gambar"
                                    className="object-contain w-full h-[350px] md:h-[500px]"
                                />
                            </div>
                        </>
                    )}
                </div>
            )}
        </>
    );
}

export default ModalLayout;
