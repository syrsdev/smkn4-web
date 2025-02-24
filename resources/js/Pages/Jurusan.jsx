import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import { IoIosArrowForward } from "react-icons/io";
import React from "react";
import { Link } from "@inertiajs/react";

function Jurusan(props) {
    let webTheme = {
        primer: props.sekolah.warna_primer,
        sekunder: props.sekolah.warna_sekunder,
        aksen: props.sekolah.warna_aksen,
        fontPrimer: props.sekolah.font_primer,
        fontSekunder: props.sekolah.font_sekunder,
    };
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
            <Container classname="mb-14">
                <h1
                    style={{
                        color: `${props.sekolah.font_primer}`,
                    }}
                    className="font-bold text-[18px] md:text-[24px] xl:text-[26px] text-center mt-10 md:mt-16"
                >
                    PROGRAM KEAHLIAN
                </h1>
                {props.jurusan.length > 0 ? (
                    <>
                        {props.jurusan.map((item, index) => (
                            <div
                                key={index}
                                className="flex flex-col items-center w-full gap-3 my-6 md:my-10 md:justify-start md:gap-5 xl:gap-8 md:flex-row md:odd:flex-row-reverse thumbnail"
                            >
                                <div className="w-full overflow-hidden xl:w-fit">
                                    <img
                                        src={item.gambar}
                                        className="w-full md:w-[300px] xl:w-[400px] h-[166px] md:h-[200px] xl:h-[250px] object-cover thumbnail"
                                        alt="gambar jurusan"
                                    />
                                </div>
                                <div
                                    style={{
                                        color: `${props.sekolah.font_primer}`,
                                    }}
                                    className="flex flex-col items-center w-full gap-2 text-center xl:w-4/12 md:text-start md:items-start"
                                >
                                    <h2 className="font-bold text-[16px] md:text-[18px] xl:text-[20px]">
                                        {item.nama}
                                    </h2>
                                    <p
                                        dangerouslySetInnerHTML={{
                                            __html: item.deskripsi,
                                        }}
                                        className="line-clamp-3 text-[16px] "
                                    ></p>
                                    <Link
                                        className="flex items-center gap-2 font-semibold "
                                        href={`/jurusan/${item.slug}`}
                                    >
                                        Lihat selengkapnya <IoIosArrowForward />
                                    </Link>
                                </div>
                            </div>
                        ))}
                    </>
                ) : (
                    <div className="flex items-center justify-center w-full">
                        <img
                            src="/images/default/no-data-search.svg"
                            alt="search not found"
                            className="object-contain w-8/12 xl:w-4/12"
                        />
                    </div>
                )}
            </Container>
        </LandingLayout>
    );
}

export default Jurusan;
