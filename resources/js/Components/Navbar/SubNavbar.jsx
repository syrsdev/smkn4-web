import React from "react";
import Container from "../Container/Container";
import { Link } from "@inertiajs/react";

function SubNavbar({ subnav }) {
    return (
        <>
            {subnav.length > 0 && (
                <Container
                    classname={
                        " bg-secondary text-secondary py-3 items-center overflow-x-auto shadow-2xl"
                    }
                >
                    <div className="text-right">
                        {subnav.map((item) => (
                            <a
                                className="text-[14px] hover:text-tertiary font-semibold whitespace-nowrap mr-6 last:mr-6 md:last:mr-0"
                                href={item.url}
                                key={item.id}
                            >
                                {item.name}
                            </a>
                        ))}
                    </div>
                </Container>
            )}
        </>
    );
}

export default SubNavbar;
