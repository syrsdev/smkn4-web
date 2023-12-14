import JurusanCard from "@/Components/Card/JurusanCard";
import Carousel from "@/Components/Carousel/Carousel";
import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import React from "react";

function DetailJurusan(props) {
    console.log(props);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="my-10">
                <h1 className="font-bold uppercase text-center text-primary text-[18px] md:text-[20px] xl:text-[24px]">
                    {props.konsentrasi.nama}
                </h1>

                <img
                    src={props.konsentrasi.gambar}
                    alt="thumbnail jurusan"
                    className="w-full max-h-[160px] md:max-h-[250px] xl:max-h-[400px] object-cover mt-5 rounded-2xl"
                />

                <p
                    className="w-full xl:w-[70%] mt-6 xl:mt-10"
                    dangerouslySetInnerHTML={{
                        __html: props.konsentrasi.deskripsi,
                    }}
                ></p>
            </Container>
            <Container classname="my-10 md:my-20">
                <h3 className="text-primary text-[16px] md:text-[18px] xl:text-[22px] font-bold text-center mb-5 xl:mb-7">
                    KONSENTRASI KEAHLIAN LAINNYA
                </h3>

                <Carousel>
                    {props.jurusan.map((item, index) => (
                        <JurusanCard item={item} key={index} />
                    ))}
                </Carousel>
            </Container>
        </LandingLayout>
    );
}

export default DetailJurusan;
