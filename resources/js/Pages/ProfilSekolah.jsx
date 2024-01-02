import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import React from "react";

function ProfilSekolah(props) {
    console.log(props);
    return (
        <LandingLayout
            namaSekolah={props.sekolah.nama_sekolah}
            logo={props.sekolah.logo_sekolah}
            favicon={props.sekolah.favicon}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="my-10 md:my-16">
                <h1 className="my-7 md:my-10 text-[18px] md:text-[20px] xl:text-[26px] font-bold text-center text-primary">
                    INFORMASI SEKOLAH
                </h1>
            </Container>
            <Container classname="flex my-10">
                <MadingLayout
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    <div className="relative overflow-x-auto">
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
