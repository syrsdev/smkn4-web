import { Link } from "@inertiajs/react";
import React from "react";
import { useEffect, useState } from "react";
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
    let url = window.location.href.split(`&page=${currentPage}`).join("");
    let screen = window.screen.width >= 768 ? 2 : 1;

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
                        {links
                            .slice(1, -1)
                            .filter(
                                (page) =>
                                    page.label !== "..." &&
                                    Math.abs(
                                        currentPage - parseInt(page.label)
                                    ) <= screen
                            )
                            .map((page, index) => (
                                <Link
                                    key={index}
                                    href={
                                        window.location.href.slice(-5) ===
                                        "#post"
                                            ? `${url.slice(0, -5)}&page=${
                                                  page.label
                                              }#post`
                                            : `${page.url}#paginate`
                                    }
                                    className={
                                        currentPage === parseInt(page.label)
                                            ? `paginasi rounded-full  px-3 ${
                                                  currentPage >= 10
                                                      ? "py-2"
                                                      : "py-1"
                                              } border-2`
                                            : "paginasi-false font-bold"
                                    }
                                >
                                    {page.label}
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
