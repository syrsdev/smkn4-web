import React from "react";
import LandingLayout from "@/Layouts/LandingLayout";
import Container from "@/Components/Container/Container";
import ButtonPrimary from "@/Components/ButtonPrimary/Button";
import { FaAngleRight } from "react-icons/fa6";
import ReactTypingEffect from "react-typing-effect";
function Home(props) {
    let namaSekolah = props.sekolah.nama_sekolah;
    let welcome = props.heroSection.welcome;
    let deskripsi = props.heroSection.deskripsi;
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
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

                    <p className="relative z-20 my-5 md:my-7">{deskripsi}</p>
                    <ButtonPrimary>
                        Lihat Jurusan <FaAngleRight />
                    </ButtonPrimary>
                </div>
            </Container>
            <Container>
                <h2>smkn 4</h2>
            </Container>
        </LandingLayout>
    );
}

export default Home;
