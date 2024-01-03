<script>
    $("#products-carousel").owlCarousel({
        items: 3,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    });

    $(".product-image").css({
        height: "50px",
    });
</script>
