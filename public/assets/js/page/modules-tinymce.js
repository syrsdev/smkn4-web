tinymce.init({
    selector: "textarea",
    plugins:
        "image, advimage, advlink, table, lists, code, media, paste, powerpaste, spellchecker, wordcount, fullscreen, autosave, emoticons, charactermap, tableofcontents, mediaembed, nonbreaking",
        // "ai tinycomments mentions anchor autolink charmap code codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss",
    toolbar:
        "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
    relative_urls: false,
    image_title: true,
    automatic_uploads: true,
    images_upload_url: "/dashboard/post/upload/image",
    file_picker_types: "image",

    file_picker_callback: function (cb, value, meta) {
        let input = document.createElement("input");
        input.setAttribute("type", "file");
        input.setAttribute("accept", "image/*");

        input.onchange = function () {
            let file = this.files[0];
            let formData = new FormData();
            formData.append("file", file);

            $.ajax({
                url: "/dashboard/post/upload/image",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    cb(data.location, {
                        title: file.name,
                    });
                },
                error: function () {
                    console.log("Gagal mengunggah gambar");
                },
            });
        };

        input.click();
    },
});
