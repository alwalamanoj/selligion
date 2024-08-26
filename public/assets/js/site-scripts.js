// EQ Height

!function n(t,r,e){function i(u,f){if(!r[u]){if(!t[u]){var c="function"==typeof require&&require;if(!f&&c)return c(u,!0);if(o)return o(u,!0);throw new Error("Cannot find module '"+u+"'")}var a=r[u]={exports:{}};t[u][0].call(a.exports,function(n){var r=t[u][1][n];return i(r||n)},a,a.exports,n,t,r,e)}return r[u].exports}for(var o="function"==typeof require&&require,u=0;u<e.length;u++)i(e[u]);return i}({1:[function(n,t,r){!function(n){function t(){var t,r=n("[data-eq]").map(function(){return n(this).data("eq")}).get();(t={},r.forEach(function(n){t[n+"::"+typeof n]=n}),Object.keys(t).map(function(n){return t[n]})).forEach(function(t){var r=0;n('[data-eq="'+t+'"]').css("min-height","").each(function(){n(this).outerHeight()>r&&(r=n(this).outerHeight())}).css("min-height",r+"px")})}n(window).on("load",function(){t()}),n(window).resize(function(){t()})}(jQuery)},{}]},{},[1]);


    AOS.init({
        startEvent: 'load',
        duration: 700,
        offset: 50,
    });
    window.addEventListener('load', function() {
        AOS.refresh();
    });

    onElementHeightChange(document.body, function() {
        AOS.refresh();
    });

    function onElementHeightChange(elm, callback) {
        var lastHeight = elm.clientHeight
        var newHeight;

        (function run() {
            newHeight = elm.clientHeight;
            if (lastHeight !== newHeight) callback();
            lastHeight = newHeight;

            if (elm.onElementHeightChangeTimer) {
                clearTimeout(elm.onElementHeightChangeTimer);
            }

            elm.onElementHeightChangeTimer = setTimeout(run, 200);
        })();
    }
 

$(window).on('load', function(){
    setTimeout(removeLoader, 500); //wait for page load PLUS two seconds.
  });
  function removeLoader(){
      $( ".preloaderWrap" ).fadeOut(500, function() {
        $( ".preloaderWrap" ).hide();
    });  
  }

// Hero Slider
$('.text-slider').slick({
    arrows : false,
    dots: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll:1,
    autoplay: true,
    speed: 700,
    autoplaySpeed: 5000,
    centerMode: true,
    centerPadding: '0',
    useTransform: false,
    // fade: true,
    cssEase: 'linear',
    pauseOnHover:false,
    pauseOnFocus: false,
    swipe: false,
    draggable: false,
    touchMove: false,
    asNavFor: '.slider-nav-img'
});
$('.slider-nav-img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    asNavFor: '.text-slider',
});
      
// testimonials_slider
$('.testimonials_slider').slick({
    // centerMode: true,
    arrows:false,
    dots:false,
    centerPadding: '0',
    slidesToShow: 5,
    slidesToScroll:1,
    autoplay: true,
    speed: 700,
    autoplaySpeed: 5000,
    infinite: true,
    cssEase: 'linear',
    asNavFor: '.testimonials_slider_Tow',
    responsive: [
        {
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 5,
            slidesToScroll:1
        }
        },
        {
        breakpoint: 480,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0',
            slidesToShow: 1,
            slidesToScroll:1
        }
        }
    ]
    });
    $('.testimonials_slider_Tow').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade:true,
    dots:false,
    arrows:true,
    asNavFor: '.testimonials_slider',
    focusOnSelect: true
    });
// On before slide change
$('.testimonials_slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
$('.slick-slide').removeClass('slick-active-last');
$('.slick-active').eq(7).addClass('slick-active-last');
}).trigger('afterChange');  


$('.counter-count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
      
      //chnage count up speed here
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
// custom File Upload 
$('#file-upload').change(function () {
    var i = $(this).prev('label').clone();
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
});
// End custom File Upload
// Field Placeholder
$('.labelPlaceholder').click(function() {
    $(this).siblings('input').focus();
  });
  $('.form-control').focus(function() {
    $(this).siblings('.labelPlaceholder').hide();
  });
  $('.form-control').blur(function() {
    var $this = $(this);
    if ($this.val().length == 0)
      $(this).siblings('.labelPlaceholder').show();
  });
  $('.form-control').blur();
  // End Field Placeholder
// Stop Testimonial Video
  $('body').on('hidden.bs.modal', '.modal', function () {
    $('.cstVideoModal video').trigger('pause');
})

// FAQs

$(document).ready(function(){
  $(".ctmSelectDrop").click(function(){
    $(".ctm-tab-nav").toggleClass("show-tabs");
  });
});

$('.ctm-tab-nav').click(function() {
$(this).removeClass('show-tabs');
});


// Dashboard-menu
$('#menu-toogle').on('click', function(){
  $('.dash_menuWrap').addClass('menu-show')
  });
  $('#menu-close').on('click', function(){
      $('.dash_menuWrap').removeClass('menu-show')
});

// Rotate on Scroll
// gsap.set('.clock-Rotate', {xPercent:0});
var rotate = gsap.timeline({
    scrollTrigger:{
      trigger: ".bannerWrap",
      pin: false,
      scrub:0.2,
      start: 'top top',
    }
  })
  .to('.clock-Rotate', {
    rotation:360*.07,
    duration:1, ease:'none',
  });
  
  var rotate = gsap.timeline({
    scrollTrigger:{
      trigger: "#wrap",
      pin: false,
      scrub:0.2,
      start: 'top top',
    }
  })
  .to('.anticlock-Rotate', {
    rotation:-360*.2,
    duration:1, ease:'none',
  })



