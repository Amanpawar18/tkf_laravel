var viewportWidth = $(window).width();

$( window ).resize(function() {
    viewportWidth = $(window).width();
});

$(document).ready(function(){
    $('.has-dropdown > .nav-link, .navbar-toggler').on('click', function(e){
        e.preventDefault();
        if(viewportWidth < 1200){
            $('.nav-dropdown-hoverable').slideUp();
            $(this).siblings('.nav-dropdown-hoverable').slideDown();
        }
    });

    $('.product-detail-gallery .carousel-item').zoom();
    $('.related-products-slider').owlCarousel({
        loop:false,
        margin:30,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
});
