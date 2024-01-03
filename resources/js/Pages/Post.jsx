import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import { router } from "@inertiajs/react";
import React, { useState } from "react";
import { FaSearch } from "react-icons/fa";
import { FaFilter } from "react-icons/fa6";
import CardListLayout from "@/Layouts/CardListLayout";
import ImageModal from "@/Components/Modal/ImageModal";
import FilterPost from "@/Components/Modal/FilterPost";
import Pagination from "@/Components/Pagination/Pagination";

function Post(props) {
    console.log(props);
    const [showModal, setShowModal] = useState(false);
    const [filter, setFilter] = useState(false);
    const [search, setSearch] = useState("");

    const openModal = () => {
        setShowModal(true);
    };

    let url = window.location.href
        .split(`page=${props.allPost.current_page}#paginate`)
        .join("");
    let urlPost = window.location.href
        .split(`page=${props.allPost.current_page}#post`)
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
                <MadingLayout
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                >
                    {props.post !== null ? (
                        <>
                            <h1 className="text-center uppercase text-primary text-[20px] xl:text-[24px] font-bold mb-4">
                                {window.location.pathname.split("/").length < 4
                                    ? `${props.post.kategori} TERBARU`
                                    : `DETAIL ${props.post.kategori}`}
                            </h1>
                            <div className="flex flex-col gap-2 md:flex-row xl:flex-col md:gap-4">
                                <img
                                    onClick={openModal}
                                    src={`${props.post.gambar}`}
                                    alt="thumbnail post"
                                    className="max-h-[200px] object-cover xl:max-h-[380px] cursor-zoom-in md:w-1/2 xl:w-full"
                                />
                                <div className="flex flex-col">
                                    <h2 className="font-bold text-primary text-[18px] xl:text-[20px]">
                                        {props.post.judul}
                                    </h2>
                                    <p className="text-[14px] font-semibold text-primary flex items-center gap-2">
                                        <span>
                                            Post by {props.post.penulis.name}
                                        </span>
                                        {new Date(
                                            props.post.created_at
                                        ).toLocaleDateString("id-ID")}
                                    </p>
                                    <p
                                        dangerouslySetInnerHTML={{
                                            __html: props.post.konten,
                                        }}
                                        className="text-[14px] mt-2"
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
                            <h2 className="font-bold text-[20px] text-primary">
                                Belum ada Post di upload
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

                <div className="flex flex-wrap items-center justify-between gap-3 text-primary">
                    <h3 className="font-bold text-[16px] md:text-[20px] xl:text-[24px]">
                        Postingan Lainnya
                    </h3>

                    <div className="flex items-center gap-2 md:gap-3">
                        <button
                            className="p-2 border-2 rounded-md border-slate-300"
                            onClick={() => setFilter(true)}
                        >
                            <FaFilter />
                        </button>

                        <form
                            onSubmit={handleSearch}
                            className="flex items-center border rounded-full md:pe-3 xl:pe-4 bg-primary border-slate-300"
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
                                type="submit"
                                className="px-4 py-2 text-white rounded-full xl:px-4 md:px-3 bg-primary"
                            >
                                Cari
                            </button>
                        </form>
                    </div>
                </div>
            </Container>

            <Container classname="my-10 md:mt-7 md:mb-16">
                <CardListLayout data={props.allPost.data} />

                <Pagination
                    firstPageUrl={props.allPost.first_page_url}
                    lastPageUrl={props.allPost.last_page_url}
                    nextPage={props.allPost.next_page_url}
                    prevPage={props.allPost.prev_page_url}
                    currentPage={props.allPost.current_page}
                    lastPage={props.allPost.last_page}
                    links={props.allPost.links}
                />
            </Container>

            <FilterPost
                active={filter}
                onClick={() => setFilter(false)}
                penulis={props.penulis}
                paginate={props.allPost.current_page}
            />

            {showModal && (
                <ImageModal
                    src={props.post.gambar}
                    active={showModal}
                    onClick={() => setShowModal(false)}
                />
            )}
        </LandingLayout>
    );
}

export default Post;
