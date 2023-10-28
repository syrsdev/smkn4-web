import React from "react";
import LandingLayout from "@/Layouts/LandingLayout";
import Container from "@/Components/Container/Container";
import ButtonPrimary from "@/Components/ButtonPrimary/Button";
import { FaAngleRight } from "react-icons/fa6";

function Home() {
    return (
        <LandingLayout>
            <Container
                background={
                    "flex py-10 lg:items-start text-secondary justify-center flex-col xl:min-h-[530px] bg-fixed bg-top bg-[url('images/hero.png')] bg-no-repeat relative"
                }
            >
                <div className="absolute inset-0 bg-black opacity-50"></div>
                <div className="w-full md:w-10/12 xl:w-1/2">
                    <h1 className="relative z-20 flex flex-col gap-1 text-2xl font-bold xl:gap-2 xl:text-4xl text-secondary">
                        <span className="text-base font-normal xl:text-3xl">
                            SELAMAT DATANG DI WEBSITE
                        </span>{" "}
                        SMKN 4 KOTA TANGERANG
                    </h1>

                    <p className="relative z-20 my-5 md:my-7">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Explicabo doloremque culpa odio eveniet obcaecati
                        dolorum consectetur ad consequatur praesentium mollitia
                        repudiandae, labore nulla alias ipsa porro modi rerum?
                        Dolor, vero?
                    </p>

                    <ButtonPrimary>
                        Lihat Jurusan <FaAngleRight />
                    </ButtonPrimary>
                </div>
            </Container>
            <Container>
                <h2>smkn 4</h2>
            </Container>
        </LandingLayout>
    );
}

export default Home;
