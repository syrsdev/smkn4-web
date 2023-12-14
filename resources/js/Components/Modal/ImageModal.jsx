import ModalLayout from "@/Layouts/ModalLayout";
import React from "react";

function ImageModal({ src, active, onClick }) {
    return (
        <ModalLayout image={true} src={src} active={active} onClick={onClick} />
    );
}

export default ImageModal;
