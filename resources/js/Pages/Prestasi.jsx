import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import { router } from "@inertiajs/react";
import React, { useState } from "react";
import { FaSearch } from "react-icons/fa";
import { FaFilter } from "react-icons/fa6";
import { FaEye } from "react-icons/fa";
import CardListLayout from "@/Layouts/CardListLayout";
import ImageModal from "@/Components/Modal/ImageModal";
import FilterPrestasi from "@/Components/Modal/FilterPrestasi";
import Pagination from "@/Components/Pagination/Pagination";

function Prestasi(props) {
    const [filter, setFilter] = useState(false);
    const [showModal, setShowModal] = useState(false);
    const [search, setSearch] = useState("");
    const openModal = () => {
        setShowModal(true);
    };

    let url = window.location.href
        .split(`page=${props.allPrestasi.current_page}#paginate`)
        .join("");

    let urlPost = window.location.href
        .split(`page=${props.allPrestasi.current_page}#post`)
        .join("");

    let handleSearch = (e) => {
        e.preventDefault();
        router.get(
            `${
                window.location.href.slice(-5) == "#post"
                    ? urlPost
                    : `${url}#post`
            }`,
            {
                search: search,
            }
        );
    };
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
            <Container classname="my-10 md:my-16">
                <MadingLayout
                    theme={webTheme}
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    {props.post !== null ? (
                        <>
                            <h1
                                style={{
                                    color: `${props.sekolah.font_primer}`,
                                }}
                                className="text-center uppercase text-[20px] xl:text-[24px] font-bold mb-4"
                            >
                                {window.location.pathname.split("/").length < 3
                                    ? `PRESTASI TERBARU`
                                    : `DETAIL PRESTASI`}
                            </h1>
                            <div className="flex flex-col gap-2 md:flex-row xl:flex-col md:gap-4">
                                <div className="relative md:w-1/2 xl:w-full">
                                    <img
                                        onClick={openModal}
                                        src={`${props.prestasi.gambar}`}
                                        alt="thumbnail post"
                                        className="max-h-[200px] w-full object-cover xl:max-h-[380px] cursor-zoom-in "
                                    />
                                    <div
                                        style={{
                                            backgroundColor: `${props.sekolah.warna_primer}`,
                                            color: `${props.sekolah.font_sekunder}`,
                                        }}
                                        className="absolute top-0 right-0 px-4 py-2 capitalize xl:px-6 rounded-bl-2xl"
                                    >
                                        {props.prestasi.kategori}
                                    </div>
                                </div>
                                <div className="flex flex-col">
                                    <h2
                                        style={{
                                            color: `${props.sekolah.font_primer}`,
                                        }}
                                        className="font-bold text-[18px] xl:text-[20px]"
                                    >
                                        {props.prestasi.judul}
                                    </h2>
                                    <div
                                        className="flex text-[14px] font-semibold justify-between flex-wrap items-center"
                                        style={{
                                            color: `${props.sekolah.font_primer}`,
                                        }}
                                    >
                                        <p
                                            style={{
                                                color: `${props.sekolah.font_primer}`,
                                            }}
                                            className="text-[14px] font-semibold flex items-center gap-2"
                                        >
                                            <span>
                                                Post by{" "}
                                                {props.prestasi.penulis.name}
                                            </span>
                                            {new Date(
                                                props.prestasi.created_at
                                            ).toLocaleDateString("id-ID")}
                                        </p>

                                        <p className="flex items-center gap-2">
                                            <FaEye /> Dilihat{" "}
                                            {props.prestasi.views} kali.
                                        </p>
                                    </div>
                                    <figure
                                        style={{
                                            color: `${props.sekolah.font_primer}`,
                                        }}
                                        className="mt-2 font-semibold"
                                    >
                                        Peserta Lomba: {props.prestasi.peserta}
                                    </figure>
                                    <p
                                        dangerouslySetInnerHTML={{
                                            __html: props.prestasi.konten,
                                        }}
                                        className="text-[14px] mt-1 konten-list"
                                    ></p>
                                </div>
                            </div>
                        </>
                    ) : (
                        <div className="flex flex-col items-center justify-center">
                            <img
                                src={`/images/default/no-data-post.svg`}
                                alt="thumbnail post"
                                className="max-h-[380px] "
                            />
                            <h2
                                style={{
                                    color: `${props.sekolah.font_primer}`,
                                }}
                                className="font-bold text-[20px]"
                            >
                                Belum ada Prestasi di upload
                            </h2>
                        </div>
                    )}
                </MadingLayout>
            </Container>

            <Container classname="relative my-12 md:mt-20">
                <div
                    className="absolute h-20 bg-transparent -top-44 -z-10"
                    id="post"
                ></div>
                <div
                    className="absolute h-20 bg-transparent -top-44 -z-10"
                    id="paginate"
                ></div>

                <div
                    style={{
                        color: `${props.sekolah.font_primer}`,
                    }}
                    className="flex flex-wrap items-center justify-between gap-3"
                >
                    <h3 className="font-bold text-[16px] md:text-[20px] xl:text-[24px]">
                        Prestasi Lainnya
                    </h3>

                    <div className="flex items-center gap-2 md:gap-3">
                        <button
                            className="p-2 border-2 rounded-md border-slate-300"
                            onClick={() => setFilter(true)}
                        >
                            <FaFilter />
                        </button>

                        <form
                            style={{
                                backgroundColor: `${props.sekolah.warna_primer}`,
                            }}
                            onSubmit={handleSearch}
                            className="flex items-center border rounded-full md:pe-3 xl:pe-4 border-slate-300"
                        >
                            <div className="relative flex items-center">
                                <input
                                    type="text"
                                    name="search"
                                    onChange={(e) => {
                                        setSearch(e.target.value);
                                    }}
                                    placeholder="Cari postingan..."
                                    className="w-full border rounded-full xl:px-5 border-slate-300"
                                />
                                <FaSearch className="absolute right-4" />
                            </div>
                            <button
                                style={{
                                    backgroundColor: `${props.sekolah.warna_primer}`,
                                    color: `${props.sekolah.font_sekunder}`,
                                }}
                                type="submit"
                                className="px-4 py-2 rounded-full xl:px-4 md:px-3"
                            >
                                Cari
                            </button>
                        </form>
                    </div>
                </div>
            </Container>

            <Container classname="my-10 md:mt-5 md:mb-16">
                <CardListLayout
                    data={props.allPrestasi.data}
                    type="prestasi"
                    theme={webTheme}
                />

                <Pagination
                    firstPageUrl={props.allPrestasi.first_page_url}
                    lastPageUrl={props.allPrestasi.last_page_url}
                    nextPage={props.allPrestasi.next_page_url}
                    prevPage={props.allPrestasi.prev_page_url}
                    currentPage={props.allPrestasi.current_page}
                    lastPage={props.allPrestasi.last_page}
                    links={props.allPrestasi.links}
                    theme={webTheme}
                />
            </Container>

            <FilterPrestasi
                active={filter}
                onClick={() => setFilter(false)}
                penulis={props.penulis}
                paginate={props.allPrestasi.current_page}
                theme={webTheme}
            />

            {showModal && (
                <ImageModal
                    src={props.prestasi.gambar}
                    active={showModal}
                    onClick={() => setShowModal(false)}
                />
            )}
        </LandingLayout>
    );
}

export default Prestasi;
