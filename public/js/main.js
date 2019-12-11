

jQuery.fn.onPositionChanged = function (trigger, millis) {
    if (millis == null) millis = 100;
    var o = $(this[0]); // our jquery object
    if (o.length < 1) return o;

    var lastPos = null;
    var lastOff = null;
    setInterval(function () {
        if (o == null || o.length < 1) return o; // abort if element is non existend eny more
        if (lastPos == null) lastPos = o.position();
        if (lastOff == null) lastOff = o.offset();
        var newPos = o.position();
        var newOff = o.offset();
        if (lastPos.top != newPos.top || lastPos.left != newPos.left) {
            $(this).trigger('onPositionChanged', { lastPos: lastPos, newPos: newPos });
            if (typeof (trigger) == "function") trigger(lastPos, newPos);
            lastPos = o.position();
        }
        if (lastOff.top != newOff.top || lastOff.left != newOff.left) {
            $(this).trigger('onOffsetChanged', { lastOff: lastOff, newOff: newOff});
            if (typeof (trigger) == "function") trigger(lastOff, newOff);
            lastOff= o.offset();
        }
    }, millis);

    return o;
};


$(document).ready(function() {
    "use strict";
    var myScrollFunc = function () {
        var y = window.scrollY;
        if (y > 10) {
            $("body").addClass("fixed-box");
        } else {
            $("body").removeClass("fixed-box");
        };
      
    };
    window.addEventListener("scroll", myScrollFunc);
    $(".menu-bar-lv-1").each(function(){
        $(this).find(".span-lv-1").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-2").toggle(500);
        });
    });

    $(".menu-bar-lv-2").each(function(){
        $(this).find(".span-lv-2").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-3").toggle(500);
        });
    });
    
    $(".menu-btn-show").click(function() {
        $('.menu-bar-mobile').toggleClass("menu-bar-mobile-show");
        $(".shadow-mobile").toggle(100);
    });

    $(".shadow-mobile").click(function() {
        $('.menu-bar-mobile').removeClass("menu-bar-mobile-show");
        $(this).fadeOut();
    });

// $('[data-toggle="tooltip"]').tooltip();   
$("#next-row").click(function(){
    var row= parseInt($(this).attr("data")) +1;
    if(row>8) {
        row=8;
    }else{
        $(this).attr("data",row);
        $(this).attr("href","#row-"+row);
        var row= parseInt($("#pre-row").attr("data")) +1;
        $("#pre-row").attr("data",row);
        $("#pre-row").attr("href","#row-"+row);
    }
    
});

$("#pre-row").click(function(){
    var row= parseInt($(this).attr("data")) -1;
    if(row<0) {
        row=0;
    }else{
        $(this).attr("data",row);
        $(this).attr("href","#row-"+row);
        var row= parseInt($("#next-row").attr("data")) -1;
        $("#next-row").attr("data",row);
        $("#next-row").attr("href","#row-"+row);
    }
    
});

$("#pre-all").click(function(){
    $("#next-row").attr("data",1);
    $("#next-row").attr("href","#row-1");
    $("#pre-row").attr("data",0);
    $("#pre-row").attr("href","#row-0");
});

$("#next-all").click(function(){
    $("#next-row").attr("data",8);
    $("#next-row").attr("href","#row-8");
    $("#pre-row").attr("data",8);
    $("#pre-row").attr("href","#row-8");
});
// var autonumber=$(".ctm-item");
// autonumber.each(function(){
//     alert($(this).parent().attr('class'));
// });

    $('#owl-carousel').owlCarousel({
        loop: true,
        margin:0,
        autoplay:true,
        items: 1,
        nav: true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsiveClass:true,
       
    });

$('.owl-list-course').owlCarousel({
    loop:false,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
        },
        600:{
            items:2,
            nav:true,
        },
        1000:{
            items:4,
            nav:true,
        }
    }
});
    

    //$('.height-60').height($('.height-60').width()-60);


    $('#owl-carousel1').owlCarousel({
        margin:5,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1000:{
                items:1,
            }
        }
    });

    $('#owl-carousel4').owlCarousel({
        loop: true,
        center: true,
        autoplay:true,
        autoplayTimeout:5000,
        items:2,
        margin:0,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:true
            },
            1000:{
                items:3,
                nav:true,
            }
        }
    });

    var _elmEvents = $('#owl-carousel4').data('events');

    if (_elmEvents) {
        $.each(_elmEvents, function (event, handlers) {
            $.each(handlers, function (j, handler) {
                $('.mo').mouseuot(event, handler);
            });
        });
    }

     $('#owl-carousel2').owlCarousel({
        margin:30,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:6,
                nav:false
            },
            1000:{
                items:8,
            }
        }
    });

     $('#owl-carousel3').owlCarousel({
        loop:false,
        margin:30,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
            },
            600:{
                items:2,
                nav:false,
            },
            1000:{
                items:3,
                nav:true,
            }
        }
    });

     $('#owl-carousel5').owlCarousel({
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
            },
            600:{
                items:2,
                nav:true,
            },
            1000:{
                items:4,
                nav:true,
            }
        }
    });
    $('#owl-carouse-course').owlCarousel({
        loop:true,
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
                loop:true
            },
            600:{
                items:2,
                nav:false,
                loop:true
            },
            1000:{
                items:3,
                nav:true,
                loop:true,
            }
        }
    });
     $(".owl-prev").html('<i class="fa fa-chevron-left" aria-hidden="true"></i>');
    $(".owl-next").html('<i class="fa fa-chevron-right" aria-hidden="true"></i>');
    $('#owl-carousel-dt').owlCarousel({
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
            600:{
                items:4,
                nav:false
            },
            1000:{
                items:6,
            }
        }
    });

    $('#owl-carousel-hoidap').owlCarousel({
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    });

    $('#owl-carousel-gt').owlCarousel({
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
            },
            600:{
                items:2,
                nav:true,
            },
            1000:{
                items:4,
                nav:true,
            }
        }
    });
});   