$(document).on('ready', function(){
    $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 512,
                settings: {
                    dots: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 512,
                settings: {
                    dots: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 256,
                settings: {
                    dots: true,
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            }
        ]
    });
});
