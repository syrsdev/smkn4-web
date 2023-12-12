import PegawaiCard from "@/Components/Card/PegawaiCard";
import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import React from "react";

function Pegawai(props) {
    console.log(props);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="my-10">
                <h1 className="my-7 md:my-10 text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center text-primary">
                    TENAGA PENDIDIK DAN KEPENDIDIKAN
                </h1>
                <div className="grid grid-cols-2 gap-5 md:gap-7 mb-14 md:grid-cols-3 xl:grid-cols-5">
                    {props.pegawai.map((item, index) => (
                        <PegawaiCard carousel={false} item={item} key={index} />
                    ))}
                </div>
            </Container>
        </LandingLayout>
    );
}

export default Pegawai;
