/**
 * FAQS JAVASCRIPTS
 *
 * To be executed on page-faqs.php
 * http://togetherfordevelopment.com/faqs/
 */

jQuery(document).ready(function($) {

    $('dt:first').slideDown();

    $('dd').on("click", function() {

        $answer = $(this).next();
        $answer.slideToggle();

    });

});

