/**
 * TEAM PAGE JAVASCRIPTS
 *
 * To be executed on page-team.php
 * http://togetherfordevelopment.com/team/
 */
jQuery(document).ready(function($){


    /*
     * TEAM MEMBER BIOS
     *
     * Add "Read More" to long bios, and display
     * entire content of bios when button clicked
     */
    $(window).on("load", function() {
        
            $('.member-bio').each(function() {

                var $member = $(this),
                    maxWords = 67,
                    words = $member.html().trim().split(/\s/).slice(0, maxWords),
                    $excerpt = $('<div/>').html(words.join(" ") + '... <a href="#" class="view-more">Read More</a>');

                if (words.length == maxWords) {

                    $member.before($excerpt);
                    $member.hide();

                    $('.view-more').on("click", function(e) {
                        e.preventDefault();
                    });

                    $excerpt.on("click", function() {

                        $(this).hide();
                        $member.show();

                    });

                }

            });

    });

});

