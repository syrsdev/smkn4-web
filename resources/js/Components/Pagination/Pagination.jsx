import { Link } from "@inertiajs/react";
import React from "react";
import { useEffect } from "react";
import { useState } from "react";
import {
    MdKeyboardArrowLeft,
    MdKeyboardArrowRight,
    MdKeyboardDoubleArrowLeft,
    MdKeyboardDoubleArrowRight,
} from "react-icons/md";

function Pagination({
    firstPageUrl,
    lastPageUrl,
    nextPage,
    prevPage,
    currentPage,
    lastPage,
    links,
    theme,
}) {
    const [numberPage, setNumberPage] = useState([]);
    useEffect(() => {
        let data = [];
        for (let index = 1; index < links.length; index++) {
            const element = links[index];
            data.push(element);
        }

        setNumberPage(data.slice(0, data.length - 1));
    }, []);
    let url = window.location.href.split(`&page=${currentPage}`).join("");
    console.log(url);
    return (
        <>
            {lastPage > 1 && (
                <div
                    style={{ color: `${theme.fontPrimer}` }}
                    className="flex items-center justify-center mt-10 cursor-pointer md:mt-16"
                >
                    {currentPage > 1 && (
                        <>
                            <Link
                                href={
                                    window.location.href.slice(-5) == "#post"
                                        ? `${url.slice(0, -5)}&${
                                              firstPageUrl.split("?")[1]
                                          }#post`
                                        : `${firstPageUrl}#paginate`
                                }
                            >
                                <MdKeyboardDoubleArrowLeft className="text-3xl" />
                            </Link>
                            <Link
                                href={
                                    window.location.href.slice(-5) == "#post"
                                        ? `${url.slice(0, -5)}&${
                                              prevPage.split("?")[1]
                                          }#post`
                                        : `${prevPage}#paginate`
                                }
                            >
                                <MdKeyboardArrowLeft className="text-3xl" />
                            </Link>
                        </>
                    )}

                    <div className="flex items-center gap-5 mx-3 text-lg ">
                        {numberPage.map((item, index) => (
                            <Link
                                key={index}
                                href={
                                    window.location.href.slice(-5) == "#post"
                                        ? `${url.slice(0, -5)}&page=${
                                              item.label
                                          }#post`
                                        : `${item.url}#paginate`
                                }
                                className={
                                    item.active == true
                                        ? "paginasi rounded-full font-medium px-3 py-1 border-2"
                                        : "paginasi-false font-bold"
                                }
                            >
                                {item.label}
                            </Link>
                        ))}
                    </div>

                    {lastPage != currentPage && (
                        <>
                            <Link
                                href={
                                    window.location.href.slice(-5) == "#post"
                                        ? `${url.slice(0, -5)}&${
                                              nextPage.split("?")[1]
                                          }#post`
                                        : `${nextPage}#paginate`
                                }
                            >
                                <MdKeyboardArrowRight className="text-3xl" />
                            </Link>
                            <Link
                                href={
                                    window.location.href.slice(-5) == "#post"
                                        ? `${url.slice(0, -5)}&${
                                              lastPageUrl.split("?")[1]
                                          }#post`
                                        : `${lastPageUrl}#paginate`
                                }
                            >
                                <MdKeyboardDoubleArrowRight className="text-3xl" />
                            </Link>
                        </>
                    )}
                </div>
            )}
        </>
    );
}

export default Pagination;
