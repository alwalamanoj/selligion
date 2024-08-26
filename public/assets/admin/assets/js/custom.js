$(document).ready(function(){
    $('.toast-close-button').click(function(){
        $('.toast').hide();
    });
    setTimeout(function() {
        $('.toast').fadeOut();
    }, 5000);
});
