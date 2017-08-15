/**
 * HOME PAGE JAVASCRIPTS
 *
 * To be executed on front-page.php, i.e.
 * http://togetherfordevelopment.com
 */
jQuery(document).ready(function($) {

    /**
     * BACKGROUND IMAGE SLIDER
     *
     * Use backstretch.js for full-size slider
     */

    // Make sure we have some images defined
    // slider is an array of image urls
    // slider is defined on front-page.php
    if (typeof slider !== "undefined") {
    
       // Initialize background image slider
       $.backstretch(slider, {
           duration: 4000,
           fade: 1400
        });

    }
 

    /**
     * Move page down when arrows is clicked
     */
    $('#arrow').on("click", function() {
        $('html, body').animate({
            scrollTop: viewportHeight - $('header').outerHeight()
        }, 1000);
    });


    /**
     * SLIDER / VIEWPORT HEIGHT
     *
     * Make primary content div height equal to viewport
     */
    var viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0),
        viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0),
        $home = $('.home-primary'),
        $homecontent = $home.find('.container'),
        $header = $('header');

    // Fade in homepage heading
    $home.delay(1200).animate({
        opacity: 1
    }, 1000);

    // Center homepage heading
    $(window).on("load resize", function() {
        viewportHeight = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
        $home.css('height', viewportHeight - $header.outerHeight());
        $homecontent.centerr({
            mobile: 0
        });

        $('.quote').samesizr();

    });

});

