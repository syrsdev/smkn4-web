import FooterLayout from "@/Layouts/FooterLayout";
import React from "react";
import Copyright from "../Copyright/Copyright";
import Instagram from "./Icons/Instagram";
import Whatsapp from "./Icons/Whatsapp";
import X from "./Icons/X";
import Facebook from "./Icons/Facebook";
import Youtube from "./Icons/Youtube";
import IconLayout from "./Icons/IconLayout";

function Footer({ logo, alamat, sosmed }) {
    return (
        <>
            <FooterLayout>
                <div className="flex flex-col w-full gap-3 md:w-[300px] lg:w-[380px]">
                    <img
                        src={`/images/${logo}`}
                        alt="logo smkn 4"
                        className="object-contain w-5/6 md:w-9/12 xl:w-5/6"
                    />
                    <p className="w-9/12 text-[16px] xl:text-[19px]">
                        {alamat}
                    </p>
                </div>
                <div className="flex flex-col w-full gap-5 xl:items-center md:w-1/2 ">
                    <h4 className="font-bold text-[20px] xl:text-[24px] mt-5 text-left md:text-center">
                        SOCIAL MEDIA
                    </h4>
                    <div className="flex flex-wrap items-center justify-start gap-4 xl:gap-6 md:justify-center">
                        {sosmed.map((item, index) => (
                            <IconLayout href={item.url} key={index}>
                                {item.id == 1 && <Facebook />}
                                {item.id == 2 && <Instagram />}
                                {item.id == 3 && <X />}
                                {item.id == 4 && <Youtube />}
                                {item.id == 5 && <Whatsapp />}
                            </IconLayout>
                        ))}
                    </div>
                </div>
            </FooterLayout>
            <Copyright />
        </>
    );
}

export default Footer;
