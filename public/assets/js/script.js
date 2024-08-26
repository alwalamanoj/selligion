$(document).ready(function () {
    $('.product-carousel').owlCarousel({
        center: true,
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            800: {
                items: 3,
                nav: false,
            },
            1000: {
                items: 4,
                nav: false,
            }
        }
    });

    $('.zoom-img').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function (item) {
                return 'Selligion Praho 2';
            }
        }
    });



    $('.quantity-btn').click(function(){
        const quantityValue = $('.quantity-field').val();
        const promoValue = $('.promocode-combo-field').val();
        const combinationValue = $('.combination_id_val').val();
        const checkoutUrl = '/checkout?quantity=' + quantityValue + '&combination_id=' + combinationValue + '&promocode='+ promoValue;
        window.location.href = checkoutUrl;
    });
    $('.promo-combo-btn').click(function(){
        const quantityValue = $('.quantity-field').val();
        const promoValue = $('.promocode-combo-field').val();
        const combinationValue = $('.combination_id_val').val();
        const checkoutUrl = '/checkout?quantity=' + quantityValue + '&combination_id=' + combinationValue + '&promocode='+ promoValue;
        window.location.href = checkoutUrl;
    });
    $('.quantity-single-prod-btn').click(function(){
        const quantityValue = $('.quantity-field').val();
        const promoValue = $('.promocode-combo-field').val();
        const prodId = $('.product_id_val').val();
        const checkoutUrl = '/checkout?quantity=' + quantityValue + '&product_id=' + prodId + '&promocode='+ promoValue;
        window.location.href = checkoutUrl;
    });
    $('.promo-single-prod-btn').click(function(){
        const quantityValue = $('.quantity-field').val();
        const promoValue = $('.promocode-combo-field').val();
        const prodId = $('.product_id_val').val();
        const checkoutUrl = '/checkout?quantity=' + quantityValue + '&product_id=' + prodId + '&promocode='+ promoValue;
        window.location.href = checkoutUrl;
    });

});
