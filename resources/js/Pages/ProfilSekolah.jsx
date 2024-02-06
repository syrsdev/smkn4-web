import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import React from "react";

function ProfilSekolah(props) {
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
            <Container classname="mt-10 mb-5 md:mt-16 md:mb-10">
                <h1
                    style={{ color: `${props.sekolah.font_primer}` }}
                    className="text-[18px] md:text-[20px] xl:text-[26px] font-bold text-center"
                >
                    INFORMASI SEKOLAH
                </h1>
            </Container>
            <Container classname="flex mb-16">
                <MadingLayout
                    theme={webTheme}
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    <div className="relative overflow-x-auto konten-list">
                        <p
                            dangerouslySetInnerHTML={{ __html: props.tentang }}
                        ></p>
                    </div>
                </MadingLayout>
            </Container>
        </LandingLayout>
    );
}
export default ProfilSekolah;
