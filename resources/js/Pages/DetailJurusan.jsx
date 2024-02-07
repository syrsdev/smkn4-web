import JurusanCard from "@/Components/Card/JurusanCard";
import Carousel from "@/Components/Carousel/Carousel";
import Container from "@/Components/Container/Container";
import ImageModal from "@/Components/Modal/ImageModal";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import { Splide, SplideSlide } from "@splidejs/react-splide";
import React, { useState } from "react";

function DetailJurusan(props) {
    const [showModal, setShowModal] = useState(false);
    const [imageSelect, setImageSelect] = useState(0);

    const handleImage = (index) => {
        setShowModal(true);
        setImageSelect(index);
    };

    let webTheme = {
        primer: props.sekolah.warna_primer,
        sekunder: props.sekolah.warna_sekunder,
        aksen: props.sekolah.warna_aksen,
        fontPrimer: props.sekolah.font_primer,
        fontSekunder: props.sekolah.font_sekunder,
    };
    console.log(imageSelect);

    console.log(props);
    return (
        <LandingLayout
            namaSekolah={props.sekolah.nama_sekolah}
            logo={props.sekolah.logo_sekolah}
            favicon={props.sekolah.favicon}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
            theme={webTheme}
        >
            <Container classname="my-10">
                <h1
                    style={{
                        color: `${props.sekolah.font_primer}`,
                    }}
                    className="font-bold uppercase text-center text-[18px] md:text-[20px] xl:text-[24px]"
                >
                    {props.konsentrasi.nama}
                </h1>
                <img
                    src={props.konsentrasi.gambar}
                    alt="thumbnail jurusan"
                    className="w-full max-h-[160px] md:max-h-[250px] xl:max-h-[400px] object-cover mt-5 rounded-2xl mb-6 xl:mb-10"
                />

                <MadingLayout
                    theme={webTheme}
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    <p
                        className="w-full konten-list"
                        dangerouslySetInnerHTML={{
                            __html: props.konsentrasi.deskripsi,
                        }}
                    ></p>
                </MadingLayout>
            </Container>

            {props.konsentrasi.galeri.length > 0 && (
                <Container classname="my-12">
                    <h2
                        style={{
                            color: `${props.sekolah.font_primer}`,
                        }}
                        className="text-[16px] md:text-[18px] xl:text-[22px] font-bold text-center mb-5 xl:mb-7"
                    >
                        GALLERY JURUSAN
                    </h2>
                    <Splide
                        className={`flex visible justify-center ${
                            props.konsentrasi.galeri.length < 4 && "galeri"
                        }`}
                        options={{
                            rewind: true,
                            autoplay: true,
                            perPage: 4,
                            gap: "2rem",
                            breakpoints: {
                                321: {
                                    perPage: 1,
                                    gap: "0.7rem",
                                    fixedWidth: "65%",
                                },
                                767: {
                                    perPage: 2,
                                    gap: "0.8rem",
                                },
                                1024: {
                                    perPage: 3,
                                    gap: "1.3rem",
                                },
                                1280: {
                                    perPage: 4,
                                    gap: "2rem",
                                },
                            },
                        }}
                    >
                        {props.konsentrasi.galeri.map((item, index) => (
                            <SplideSlide key={index}>
                                <img
                                    data-tooltip-id="tooltip"
                                    data-tooltip-content="Lihat Detail Gambar"
                                    onClick={() => handleImage(index)}
                                    src={item.gambar}
                                    alt={item.keterangan}
                                    className="object-cover w-screen h-[150px] md:h-[200px] xl:h-[250px] cursor-pointer"
                                />
                            </SplideSlide>
                        ))}
                    </Splide>
                </Container>
            )}
            <Container classname="my-10 md:my-20">
                <h3
                    style={{
                        color: `${props.sekolah.font_primer}`,
                    }}
                    className="text-[16px] md:text-[18px] xl:text-[22px] font-bold text-center mb-5 xl:mb-7"
                >
                    KONSENTRASI KEAHLIAN LAINNYA
                </h3>

                <Carousel>
                    {props.jurusan.map((item, index) => (
                        <JurusanCard item={item} key={index} theme={webTheme} />
                    ))}
                </Carousel>
            </Container>

            {showModal && (
                <ImageModal
                    src={props.konsentrasi.galeri[imageSelect].gambar}
                    active={showModal}
                    onClick={() => setShowModal(false)}
                />
            )}
        </LandingLayout>
    );
}

export default DetailJurusan;
