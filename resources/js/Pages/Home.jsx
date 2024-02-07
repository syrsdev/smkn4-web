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
import Carousel from "@/Components/Carousel/Carousel";
import JurusanCard from "@/Components/Card/JurusanCard";
import PegawaiCard from "@/Components/Card/PegawaiCard";
import ButtonSecondary from "@/Components/Button/ButtonSecondary";
import CardSumPrestasi from "@/Components/Card/CardSumPrestasi";

function Home(props) {
    console.log(props);
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
            <Container
                style={{
                    color: `${props.heroSection.text_color}`,
                    backgroundImage: `url('${props.heroSection.hero_image}')`,
                    backgroundPosition: props.heroSection.image_position,
                }}
                classname={`flex py-10 lg:items-start justify-center flex-col xl:min-h-[530px] hero-img relative`}
            >
                <div className="absolute inset-0 bg-black opacity-50 lg:bg-gradient-to-r from-black via-slate-700 to-slate-300"></div>
                <div className="w-full md:w-10/12 lg:w-1/2">
                    <h1 className="relative z-20 flex flex-col gap-1 text-2xl font-bold xl:gap-2 xl:text-4xl">
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
                    theme={webTheme}
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    <h2
                        style={{
                            color: `${props.sekolah.font_primer}`,
                        }}
                        className="text-[18px] font-bold mb-6 md:hidden block text-center xl:text-left"
                    >
                        {props.sambutan.judul}
                    </h2>
                    <div className="flex flex-col gap-3 md:gap-7 md:flex-row">
                        <div className="flex flex-col items-center md:items-start lg:w-fit">
                            <img
                                src={props.sambutan.kepsek.gambar}
                                alt="foto kepala sekolah"
                                className="object-contain max-w-[177px] max-h-[350px]"
                            />
                            <div
                                style={{
                                    color: `${props.sekolah.font_primer}`,
                                    borderColor: `${props.sekolah.font_primer}`,
                                }}
                                className="flex flex-col mt-4 whitespace-nowrap"
                            >
                                <p className="font-bold text-[16px] border-b-2 border-inherit">
                                    {props.sambutan.kepsek.nama}
                                </p>
                                <p>Plt. Kepala Sekolah</p>
                            </div>
                        </div>
                        <div className="flex flex-col w-full text-center md:text-left">
                            <h2
                                style={{
                                    color: `${props.sekolah.font_primer}`,
                                }}
                                className="text-[18px] xl:text-[24px] font-bold mb-3 hidden md:block"
                            >
                                {props.sambutan.judul}
                            </h2>
                            <p
                                dangerouslySetInnerHTML={{
                                    __html: props.sambutan.konten,
                                }}
                                className="text-[14px] konten-list"
                            ></p>
                        </div>
                    </div>
                </MadingLayout>
            </Container>

            <Container classname="my-10 md:my-20">
                <MadingTitle
                    title="BERITA TERKINI"
                    href="berita"
                    theme={props.sekolah.font_primer}
                />
                <CardListLayout theme={webTheme} data={props.berita} />
            </Container>

            <Container classname="my-10 md:my-20">
                <h3
                    style={{ color: `${props.sekolah.font_primer}` }}
                    className="text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7"
                >
                    KONSENTRASI KEAHLIAN
                </h3>

                <Carousel>
                    {props.konsentrasi.map((item, index) => (
                        <JurusanCard theme={webTheme} item={item} key={index} />
                    ))}
                </Carousel>
            </Container>

            <Container
                style={{ backgroundColor: `${props.sekolah.warna_primer}` }}
                classname="py-16 mt-10"
            >
                <h3
                    style={{ color: `${props.sekolah.font_sekunder}` }}
                    className="text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7"
                >
                    PRESTASI
                </h3>

                <div className="flex flex-col gap-7 xl:flex-row">
                    <div className="grid w-full grid-cols-2 gap-4 md:gap-8 xl:w-3/12 xl:grid-cols-1">
                        <CardSumPrestasi
                            theme={webTheme}
                            title="INTERNASIONAL"
                            sum={props.kategoriPrestasi.internasional}
                        />
                        <CardSumPrestasi
                            theme={webTheme}
                            title="NASIONAL"
                            sum={props.kategoriPrestasi.nasional}
                        />
                        <CardSumPrestasi
                            theme={webTheme}
                            title="PROVINSI"
                            sum={props.kategoriPrestasi.provinsi}
                        />
                        <CardSumPrestasi
                            theme={webTheme}
                            title="KOTA"
                            sum={props.kategoriPrestasi.kota}
                        />
                    </div>
                    <CardListLayout
                        theme={webTheme}
                        type="prestasi"
                        data={props.prestasi}
                        dataLength={props.prestasi.length}
                        gridcols="2"
                        padding={true}
                    />
                </div>
                <ButtonSecondary dark={true} href="/prestasi">
                    LIHAT SELENGKAPNYA
                </ButtonSecondary>
            </Container>

            <Container classname="my-10 md:my-20">
                <h3
                    style={{ color: `${props.sekolah.font_primer}` }}
                    className="text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7"
                >
                    TENAGA PENDIDIK DAN KEPENDIDIKAN
                </h3>
                <Carousel
                    perpageXl={
                        props.tenagaPendidik.length >= 5
                            ? 5
                            : props.tenagaPendidik.length
                    }
                    perpageLG={
                        props.tenagaPendidik.length >= 4
                            ? 4
                            : props.tenagaPendidik.length
                    }
                    perpageMD={
                        props.tenagaPendidik.length >= 3
                            ? 3
                            : props.tenagaPendidik.length
                    }
                    perpageSM={
                        props.tenagaPendidik.length >= 2
                            ? 2
                            : props.tenagaPendidik.length
                    }
                >
                    {props.tenagaPendidik.map((item, index) => (
                        <PegawaiCard item={item} key={index} theme={webTheme} />
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
                <h3
                    style={{ color: `${props.sekolah.font_primer}` }}
                    className="text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-5 xl:mb-7"
                >
                    EKSTRAKURIKULER
                </h3>

                <Splide
                    aria-label="EKSKUL"
                    className={`flex visible justify-center ${
                        props.ekskul.length < 6 && "ekskul"
                    } ${props.ekskul.length < 4 && "ekskul_tablet"} ${
                        props.ekskul.length < 2 && "ekskul_mobile"
                    }`}
                    options={{
                        rewind: true,
                        autoplay: true,
                        perPage: 6,
                        gap: "2rem",
                        breakpoints: {
                            767: {
                                perPage: 2,
                                gap: "0.5rem",
                            },
                            1024: {
                                perPage: 4,
                                gap: "1rem",
                            },
                            1280: {
                                perPage:
                                    props.ekskul.length >= 6
                                        ? 6
                                        : props.ekskul.length,
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
                            style={{ color: `${props.sekolah.font_primer}` }}
                            className="flex flex-col items-center gap-3 font-semibold"
                        >
                            <a
                                style={{
                                    borderColor: `${props.sekolah.font_primer}`,
                                }}
                                href={item.link_sosmed}
                                target="_blank"
                                className="flex items-center justify-center p-6 overflow-hidden border-2 rounded-full md:p-7 h-28 w-28 md:h-32 md:w-32 xl:h-36 xl:w-36 xl:p-8"
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
            <Container
                classname="py-16 mt-10"
                style={{
                    backgroundColor: `${props.sekolah.warna_primer}`,
                    color: `${props.sekolah.font_sekunder}`,
                }}
            >
                <h3 className="text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center mb-10">
                    KONTAK KAMI
                </h3>
                <div
                    className="maps"
                    dangerouslySetInnerHTML={{
                        __html: props.sekolah.sematkan_peta,
                    }}
                ></div>
                <div className="flex flex-col items-start my-14 md:flex-wrap gap-7 md:gap-0 md:justify-between md:items-center md:flex-row xl:justify-evenly">
                    <div className="flex gap-5">
                        <BsTelephone className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                NO. TELP
                            </h5>
                            <p className="text-[14px] ">
                                {props.sekolah.telepon_sekolah
                                    ? props.sekolah.telepon_sekolah
                                    : "-"}
                            </p>
                        </div>
                    </div>
                    <div className="flex gap-5">
                        <LiaFaxSolid className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                FAX
                            </h5>
                            <p className="text-[14px] ">
                                {props.sekolah.fax ? props.sekolah.fax : "-"}
                            </p>
                        </div>
                    </div>
                    <div className="flex gap-5">
                        <MdOutlineEmail className="text-[35px] md:text-[40px]" />
                        <div className="flex flex-col">
                            <h5 className="text-[16px] xl:text-[20px] font-bold">
                                EMAIL
                            </h5>
                            <p className="text-[14px] ">
                                {props.sekolah.email_sekolah
                                    ? props.sekolah.email_sekolah
                                    : "-"}
                            </p>
                        </div>
                    </div>
                </div>
            </Container>
        </LandingLayout>
    );
}

export default Home;
