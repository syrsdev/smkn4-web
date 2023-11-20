import React, { useEffect, useState } from "react";
import LandingLayout from "@/Layouts/LandingLayout";
import Container from "@/Components/Container/Container";
import ButtonPrimary from "@/Components/ButtonPrimary/Button";
import { FaAngleRight } from "react-icons/fa6";
import ReactTypingEffect from "react-typing-effect";
import MadingLayout from "@/Layouts/MadingLayout";
import MadingTitle from "@/Components/Card/MadingTitle";
function Home(props) {
    console.log(props);
    const [namaSekolah, setNamaSekolah] = useState("");
    const [welcome, setWelcome] = useState("");
    const [deskripsi, setDeskripsi] = useState("");
    const [mading, setMading] = useState("");
    const [listMading, setListMading] = useState([]);

    useEffect(() => {
        const { nama_sekolah } = props.sekolah;
        const { welcome, deskripsi } = props.heroSection;
        const { title } = props.mading;
        const { list } = props.mading;

        setNamaSekolah(nama_sekolah);
        setWelcome(welcome);
        setDeskripsi(deskripsi);
        setMading(title);
        setListMading(list);
    }, [
        props.sekolah.nama_sekolah,
        props.heroSection.welcome,
        props.heroSection.deskripsi,
        props.mading.title,
        props.mading.list,
    ]);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container
                classname={`flex py-10 lg:items-start text-secondary justify-center flex-col xl:min-h-[530px] bg-fixed bg-center bg-[url('images/hero.png')] bg-no-repeat relative`}
            >
                <div className="absolute inset-0 bg-black opacity-50 lg:bg-gradient-to-r from-black via-slate-700 to-slate-300"></div>
                <div className="w-full md:w-10/12 lg:w-1/2">
                    <h1 className="relative z-20 flex flex-col gap-1 text-2xl font-bold xl:gap-2 xl:text-4xl text-secondary">
                        <span className="text-base font-normal xl:text-3xl">
                            {welcome}
                        </span>{" "}
                        <ReactTypingEffect
                            text={[namaSekolah]}
                            typingDelay={1000}
                            eraseDelay={2000}
                        />
                    </h1>

                    <p className="relative z-20 mt-3 mb-5 md:mt-5 md:mb-7">
                        {deskripsi}
                    </p>
                    <ButtonPrimary>
                        Lihat Jurusan <FaAngleRight />
                    </ButtonPrimary>
                </div>
            </Container>
            <Container classname="my-10">
                <MadingLayout
                    title={mading}
                    listPost={listMading}
                    href={props.mading.kategori}
                >
                    <h2 className="text-primary text-[18px] font-bold mb-4 lg:hidden block text-center md:text-left">
                        {props.sambutan.judul}
                    </h2>
                    <div className="flex flex-col gap-3 md:gap-7 md:flex-row">
                        <div className="flex flex-col items-center md:items-start lg:w-7/12">
                            <img
                                src="/images/default/no-image-34.png"
                                alt="foto kepala sekolah"
                                className="object-contain max-w-[177px]"
                            />
                            <div className="flex flex-col mt-10 text-primary whitespace-nowrap">
                                <p className="font-bold text-[16px] border-b-2 border-primary">
                                    {props.sambutan.kepsek.nama}
                                </p>
                                <p>Plt. Kepala Sekolah</p>
                            </div>
                        </div>
                        <div className="flex flex-col text-center md:text-left">
                            <h2 className="text-primary text-[18px] xl:text-[24px] font-bold mb-3 hidden lg:block">
                                {props.sambutan.judul}
                            </h2>
                            <p className="text-[14px]">
                                {props.sambutan.konten}
                            </p>
                        </div>
                    </div>
                </MadingLayout>
            </Container>

            <Container classname="my-10">
                <MadingTitle title="BERITA TERKINI" href="berita" />
            </Container>
            <Container classname="py-16 mt-10 bg-primary">
                <h3 className="text-secondary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-7">
                    KONTAK KAMI
                </h3>
                <div
                    className="maps"
                    dangerouslySetInnerHTML={{
                        __html: props.sekolah.link_alamat,
                    }}
                ></div>
            </Container>
        </LandingLayout>
    );
}

export default Home;
