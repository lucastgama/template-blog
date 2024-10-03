jQuery(document).ready(function ($) {
    $('.navTrigger').click(function () {
        $(this).toggleClass('active');
        $(".main_list__navbar__mobile").toggleClass("active");
    });
});