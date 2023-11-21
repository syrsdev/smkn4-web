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
                <h1 className="text-center uppercase text-primary text-[20px] xl:text-[24px] font-bold my-10">
                    {props.post.kategori}{" "}
                    {props.post.kategori == "berita" && "TERKINI"}
                </h1>

                <MadingLayout
                    title={props.mading.title}
                    listPost={props.mading.list}
                    href={props.mading.kategori}
                ></MadingLayout>
            </Container>
        </LandingLayout>
    );
}

export default Post;
