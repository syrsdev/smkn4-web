import ModalLayout from "@/Layouts/ModalLayout";
import React from "react";
import Select from "react-select";
import ButtonFilter from "../Button/ButtonFilter";
import { useState } from "react";
import { router } from "@inertiajs/react";

const kategori = [
    { value: "artikel", label: "Artikel" },
    { value: "agenda", label: "Agenda" },
    { value: "berita", label: "Berita" },
    { value: "event", label: "Event" },
];

const orderby = [
    { value: "asc", label: "A-Z" },
    { value: "desc", label: "Z-A" },
];

function FilterPost({ active, onClick, penulis, paginate, theme }) {
    const dataPenulis = penulis.map((item) => {
        return {
            value: `${item.slug}`,
            label: `${item.name}`,
        };
    });

    const [filter, setFilter] = useState({
        kategori: "",
        penulis: "",
        orderby: "",
    });

    let url = window.location.href.split(`page=${paginate}#paginate`).join("");
    let urlPost = window.location.href.split(`page=${paginate}#post`).join("");

    let handleFilter = (e) => {
        e.preventDefault();
        router.get(
            `${
                window.location.href.slice(-5) == "#post"
                    ? urlPost
                    : `${url}#post`
            }`,
            {
                kategori: filter.kategori,
                penulis: filter.penulis,
                order: filter.orderby,
            }
        );
    };

    return (
        <ModalLayout
            theme={theme}
            submit={handleFilter}
            judul={"Post"}
            active={active}
            onClick={onClick}
        >
            <div
                style={{
                    color: `${theme.fontPrimer}`,
                }}
                className="flex flex-col gap-2 "
            >
                <h2>Kategori: </h2>
                <Select
                    defaultValue={filter.kategori}
                    options={kategori}
                    onChange={(e) =>
                        setFilter({ ...filter, kategori: e.value })
                    }
                />
            </div>
            <div
                style={{
                    color: `${theme.fontPrimer}`,
                }}
                className="flex flex-col gap-2"
            >
                <h2>Penulis: </h2>
                <Select
                    defaultValue={filter.penulis}
                    options={dataPenulis}
                    onChange={(e) => setFilter({ ...filter, penulis: e.value })}
                />
            </div>
            <div
                style={{
                    color: `${theme.fontPrimer}`,
                }}
                className="flex flex-col gap-2"
            >
                <h2>Urutan: </h2>
                <Select
                    defaultValue={filter.orderby}
                    options={orderby}
                    onChange={(e) => setFilter({ ...filter, orderby: e.value })}
                />
            </div>
            <ButtonFilter theme={theme} hrefReset={window.location.pathname} />
        </ModalLayout>
    );
}
export default FilterPost;
