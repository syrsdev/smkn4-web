import FooterLayout from "@/Layouts/FooterLayout";
import React from "react";
import Copyright from "../Copyright/Copyright";

function Footer({ logo, alamat }) {
    return (
        <>
            <FooterLayout>
                <div className="flex flex-col w-full gap-5 md:w-4/6 xl:w-1/3">
                    <img
                        src={`/images/${logo}`}
                        alt="logo smkn 4"
                        className="object-contain w-5/6 md:w-2/3 lg:w-9/12"
                    />
                    <p className="w-9/12 text-xl">{alamat}</p>
                </div>
                <div className="flex flex-col w-full gap-5 xl:items-center lg:w-2/6">
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
