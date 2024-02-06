import React from "react";
import Container from "../Container/Container";

function SubNavbar({ subnav, theme }) {
    return (
        <>
            {subnav.length > 0 && (
                <Container
                    style={{
                        background: `${theme.sekunder}`,
                        color: `${theme.fontSekunder}`,
                    }}
                    classname={"py-3 items-center overflow-x-auto shadow-2xl"}
                >
                    <div className="text-right">
                        {subnav.map((item) => (
                            <a
                                className={`text-[14px] hover:text-tertiary font-semibold whitespace-nowrap mr-6 md:last:mr-0 ${
                                    subnav.length > 3
                                        ? "last:mr-6"
                                        : "last:mr-0"
                                }`}
                                target="_blank"
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
