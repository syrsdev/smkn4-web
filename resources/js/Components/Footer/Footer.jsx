import FooterLayout from "@/Layouts/FooterLayout";
import React from "react";
import Copyright from "../Copyright/Copyright";

function Footer() {
    return (
        <>
            <FooterLayout>
                <div className="flex flex-col w-full gap-5 md:w-4/6 xl:w-1/3">
                    <img
                        src="/images/smkn4.svg"
                        alt="logo smkn 4"
                        className="object-contain w-5/6 xl:w-9/12"
                    />
                    <p className="w-9/12 text-xl">
                        Jl. Veteran No. 1 A Babakan, Tangerang Kota Tangerang -
                        Banten
                    </p>
                </div>
                <div className="flex flex-col w-full gap-5 xl:w-2/6">
                    <h4 className="font-bold xl:text-[24px] mt-5">MENU</h4>
                </div>
                <div className="flex flex-col w-full gap-5 xl:items-center xl:w-2/6">
                    <h4 className="font-bold xl:text-[24px] mt-5">
                        SOCIAL MEDIA
                    </h4>
                </div>
            </FooterLayout>
            <Copyright />
        </>
    );
}

export default Footer;
