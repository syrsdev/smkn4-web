import ModalLayout from "@/Layouts/ModalLayout";
import React from "react";
import Select from "react-select";
import ButtonFilter from "../Button/ButtonFilter";
import { useState } from "react";
import { router } from "@inertiajs/react";

const bagian = [
    { value: "Pendidik", label: "Pendidik" },
    { value: "Kependidikan", label: "Kependidikan" },
];

const orderby = [
    { value: "asc", label: "A-Z" },
    { value: "desc", label: "Z-A" },
];

function FilterPegawai({ active, onClick, mapel, theme }) {
    const dataMapel = mapel.map((item) => {
        return {
            value: `${item.slug}`,
            label: `${item.nama}`,
        };
    });

    const [filter, setFilter] = useState({
        bagian: "",
        mapel: "",
        orderby: "",
    });
    let handleFilter = (e) => {
        e.preventDefault();
        router.get(`${window.location.href}`, {
            bagian: filter.bagian,
            mapel: filter.mapel,
            order: filter.orderby,
        });
    };

    return (
        <ModalLayout
            submit={handleFilter}
            judul={"Pegawai"}
            active={active}
            onClick={onClick}
            theme={theme}
        >
            <div
                style={{
                    color: `${theme.fontPrimer}`,
                }}
                className="flex flex-col gap-2"
            >
                <h2>Bagian: </h2>
                <Select
                    defaultValue={filter.bagian}
                    options={bagian}
                    onChange={(e) => setFilter({ ...filter, bagian: e.value })}
                />
            </div>
            <div
                style={{
                    color: `${theme.fontPrimer}`,
                }}
                className="flex flex-col gap-2"
            >
                <h2>Mata Pelajaran: </h2>
                <Select
                    defaultValue={filter.mapel}
                    options={dataMapel}
                    onChange={(e) => setFilter({ ...filter, mapel: e.value })}
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

            <ButtonFilter hrefReset="/pegawai" theme={theme} />
        </ModalLayout>
    );
}

export default FilterPegawai;
