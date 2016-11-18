$(document).on('ready', function(){
    $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 460,
                settings: {

                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });
});
