import LandingLayout from "@/Layouts/LandingLayout";
import Container from "@/Components/Container/Container";
import ButtonPrimary from "@/Components/Button/ButtonPrimary";
import { FaAngleRight } from "react-icons/fa6";
import ReactTypingEffect from "react-typing-effect";
import MadingLayout from "@/Layouts/MadingLayout";
import MadingTitle from "@/Components/Card/MadingTitle";
import { LiaFaxSolid } from "react-icons/lia";
import { BsTelephone } from "react-icons/bs";
import { MdOutlineEmail } from "react-icons/md";
import CardListLayout from "@/Layouts/CardListLayout";
import { Splide, SplideSlide } from "@splidejs/react-splide";
import "@splidejs/react-splide/css";
import Carousel from "@/Components/Carousel/Carousel";
import JurusanCard from "@/Components/Card/JurusanCard";
import PegawaiCard from "@/Components/Card/PegawaiCard";
import ButtonSecondary from "@/Components/Button/ButtonSecondary";

function Home(props) {
    console.log(props.heroSection.hero_image);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container
                style={{
                    backgroundImage: `url('${props.heroSection.hero_image}')`,
                }}
                classname={`flex py-10 lg:items-start text-secondary justify-center flex-col xl:min-h-[530px] hero-img relative`}
            >
                <div className="absolute inset-0 bg-black opacity-50 lg:bg-gradient-to-r from-black via-slate-700 to-slate-300"></div>
                <div className="w-full md:w-10/12 lg:w-1/2">
                    <h1 className="relative z-20 flex flex-col gap-1 text-2xl font-bold xl:gap-2 xl:text-4xl text-secondary">
                        <span className="text-base font-normal xl:text-3xl">
                            {props.heroSection.welcome}
                        </span>{" "}
                        <ReactTypingEffect
                            text={[props.sekolah.nama_sekolah]}
                            typingDelay={1000}
                            eraseDelay={2000}
                        />
                    </h1>

                    <p className="relative z-20 mt-3 mb-5 md:mt-5 md:mb-7">
                        {props.heroSection.deskripsi}
                    </p>
                    <ButtonPrimary href="/jurusan">
                        Lihat Jurusan <FaAngleRight />
                    </ButtonPrimary>
                </div>
            </Container>
            <Container classname="my-10 md:my-20">
                <MadingLayout
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    <h2 className="text-primary text-[18px] font-bold mb-4 lg:hidden block text-center md:text-left">
                        {props.sambutan.judul}
                    </h2>
                    <div className="flex flex-col gap-3 md:gap-7 md:flex-row">
                        <div className="flex flex-col items-center md:items-start lg:w-7/12">
                            <img
                                src={props.sambutan.kepsek.gambar}
                                alt="foto kepala sekolah"
                                className="object-contain max-w-[177px] max-h-[350px]"
                            />
                            <div className="flex flex-col mt-4 text-primary whitespace-nowrap">
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

            <Container classname="my-10 md:my-20">
                <MadingTitle title="BERITA TERKINI" href="berita" />
                <CardListLayout data={props.berita} />
            </Container>

            <Container classname="my-10 md:my-20">
                <h3 className="text-primary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7">
                    KONSENTRASI KEAHLIAN
                </h3>

                <Carousel>
                    {props.konsentrasi.map((item, index) => (
                        <JurusanCard item={item} key={index} />
                    ))}
                </Carousel>
            </Container>

            <Container classname="py-16 mt-10 bg-primary">
                <h3 className="text-secondary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7">
                    PRESTASI
                </h3>
                <ButtonSecondary dark={true} href="/prestasi">
                    LIHAT SELENGKAPNYA
                </ButtonSecondary>
            </Container>

            <Container classname="my-10 md:my-20">
                <h3 className="text-primary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7">
                    TENAGA PENDIDIK DAN KEPENDIDIKAN
                </h3>
                <Carousel perpageXl={5}>
                    {props.tenagaPendidik.map((item, index) => (
                        <PegawaiCard item={item} key={index} />
                    ))}
                </Carousel>
                <ButtonSecondary href="/pegawai">
                    LIHAT SELENGKAPNYA
                </ButtonSecondary>
            </Container>
            <Container classname="relative my-10 md:my-20">
                <div
                    className="absolute h-20 bg-transparent -top-44 -z-10"
                    id="ekskul"
                ></div>
                <h3 className="text-primary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7">
                    EKSTRAKURIKULER
                </h3>

                <Splide
                    aria-label="EKSKUL"
                    className="flex justify-center visible "
                    options={{
                        rewind: true,
                        autoplay: true,
                        perPage: 6,
                        gap: "2rem",
                        breakpoints: {
                            767: {
                                perPage: 2,
                                gap: "0rem",
                            },
                            1024: {
                                perPage: 4,
                                gap: "1rem",
                            },
                            1280: {
                                perPage: 6,
                                gap: "2rem",
                            },
                        },
                    }}
                >
                    {props.ekskul.map((item, index) => (
                        <SplideSlide
                            data-tooltip-id="tooltip"
                            data-tooltip-content={`${
                                item.link_sosmed != null
                                    ? "Lihat Sosial Media"
                                    : ""
                            }`}
                            key={index}
                            className="flex flex-col items-center gap-3 font-semibold text-primary"
                        >
                            <a
                                href={item.link_sosmed}
                                target="_blank"
                                className="flex items-center justify-center p-6 overflow-hidden border-2 rounded-full md:p-7 h-28 w-28 md:h-32 md:w-32 xl:h-36 xl:w-36 xl:p-8 border-primary "
                            >
                                <img
                                    src={item.gambar}
                                    alt="Logo Ekskul"
                                    className="object-contain"
                                />
                            </a>
                            <h6>{item.nama}</h6>
                        </SplideSlide>
                    ))}
                </Splide>
            </Container>
            <Container classname="py-16 mt-10 bg-primary">
                <h3 className="text-secondary text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-10">
                    KONTAK KAMI
                </h3>
                <div
                    className="maps"
                    dangerouslySetInnerHTML={{
                        __html: props.sekolah.link_alamat,
                    }}
                ></div>
                <div className="flex flex-col items-start my-14 md:flex-wrap gap-7 md:gap-0 md:justify-between md:items-center md:flex-row xl:justify-evenly text-secondary">
                    <div className="flex gap-5">
                        <BsTelephone className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                NO. TELP
                            </h5>
                            <p className="text-[14px] ">
                                {props.sekolah.telepon_sekolah}
                            </p>
                        </div>
                    </div>
                    <div className="flex gap-5">
                        <LiaFaxSolid className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                FAX
                            </h5>
                            <p className="text-[14px] ">{props.sekolah.fax}</p>
                        </div>
                    </div>
                    <div className="flex gap-5">
                        <MdOutlineEmail className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                EMAIL
                            </h5>
                            <p className="text-[14px] ">
                                {props.sekolah.email_sekolah}
                            </p>
                        </div>
                    </div>
                </div>
            </Container>
        </LandingLayout>
    );
}

export default Home;
