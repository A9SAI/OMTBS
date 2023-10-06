$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:5,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                stagePadding: 50,
            },
            450:{
                items:2,
                stagePadding: 50,
            },
            776:{
                items:3,
                stagePadding: 60,
            },
            992:{
                items:4,
                stagePadding: 70,
            },
        }
    })
});