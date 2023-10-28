import React from "react";
import LandingLayout from "@/Layouts/LandingLayout";
import Container from "@/Components/Container/Container";

function Home() {
    return (
        <LandingLayout>
            <Container>
                <h1>Selamt Datang</h1>
            </Container>
            <Container backgroundColor={"bg-primary"}>
                <h2>smkn 4</h2>
            </Container>
        </LandingLayout>
    );
}

export default Home;
