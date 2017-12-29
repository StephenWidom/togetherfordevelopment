jQuery(document).ready(function($) {

    $(window).on("load resize", function() {
        $('.news-item').samesizr({
            mobile: 767
        });
    });

});
