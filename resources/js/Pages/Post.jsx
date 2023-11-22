import Container from "@/Components/Container/Container";
import LandingLayout from "@/Layouts/LandingLayout";
import MadingLayout from "@/Layouts/MadingLayout";
import React from "react";

function Post(props) {
    console.log(props);
    return (
        <LandingLayout
            logo={props.sekolah.logo_sekolah}
            alamat={props.sekolah.alamat_sekolah}
            subnav={props.subNavbar}
            sosmed={props.footer.socialMedia}
        >
            <Container classname="my-10">
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
                                    src={`/images/default/${props.post.gambar}`}
                                    alt="thumbnail post"
                                    className="max-h-[280px] xl:max-h-[350px] object-cover md:w-1/2 xl:w-full"
                                />
                                <div className="flex flex-col">
                                    <h2 className="font-bold text-primary text-[18px] xl:text-[20px]">
                                        {props.post.judul}
                                    </h2>
                                    <p className="text-[14px] font-semibold text-gray-500 flex items-center gap-2">
                                        {new Date(
                                            props.post.created_at
                                        ).toLocaleDateString("id-ID")}
                                        <span className="text-primary">
                                            {" "}
                                            Post by {props.post.penulis.name}
                                        </span>
                                    </p>
                                    <p className="text-[14px] mt-2">
                                        {props.post.konten}
                                    </p>
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
        </LandingLayout>
    );
}

export default Post;
