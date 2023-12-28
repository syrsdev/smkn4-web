import PegawaiCard from "@/Components/Card/PegawaiCard";
import Container from "@/Components/Container/Container";
import FilterPegawai from "@/Components/Modal/FilterPegawai";
import LandingLayout from "@/Layouts/LandingLayout";
import { router } from "@inertiajs/react";
import React, { useState } from "react";
import { FaSearch } from "react-icons/fa";
import { FaFilter } from "react-icons/fa6";

function Pegawai(props) {
    const [filter, setFilter] = useState(false);
    const [search, setSearch] = useState("");
    let handleSearch = (e) => {
        e.preventDefault();
        router.get(`${window.location.href}`, {
            search: search,
        });
    };
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            favicon={props.sekolah.favicon}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <FilterPegawai
                active={filter}
                onClick={() => setFilter(false)}
                mapel={props.mapel}
            />
            <Container classname="my-10">
                <h1 className="my-7 md:my-10 text-[18px] md:text-[20px] xl:text-[24px] font-bold text-center text-primary">
                    TENAGA PENDIDIK DAN KEPENDIDIKAN
                </h1>

                <div className="flex items-center justify-end w-full gap-2 mb-8 md:gap-3">
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

                {props.pegawai.length > 0 ? (
                    <div className="grid grid-cols-2 gap-5 md:gap-7 mb-14 md:grid-cols-3 xl:grid-cols-5">
                        {props.pegawai.map((item, index) => (
                            <PegawaiCard
                                carousel={false}
                                item={item}
                                key={index}
                            />
                        ))}
                    </div>
                ) : (
                    <div className="flex flex-col items-center justify-center">
                        <img
                            src={`/images/default/no-data-search.svg`}
                            alt="thumbnail post"
                            className="max-h-[380px] "
                        />
                        <h2 className="font-bold text-[20px] text-primary">
                            Pegawai tidak ditemukan
                        </h2>
                    </div>
                )}
            </Container>
        </LandingLayout>
    );
}

export default Pegawai;
