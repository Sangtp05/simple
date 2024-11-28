$(document).ready(function(){
    $('.image-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        prevArrow: '<div class="slick-prev"><img src="/img/icons/left-slide.svg" alt="left-slide"></div>',
        nextArrow: '<div class="slick-next"><img src="/img/icons/right-slide.svg" alt="right-slide"></div>',
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
});