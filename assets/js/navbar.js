jQuery(document).ready(function ($) {
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        $(".navbar__mobile").toggleClass("active");
    });
    $('.mobile__links').click(function () {
        $('.navTrigger').toggleClass('active');
        $('.navbar__mobile').toggleClass("active");
    });
});