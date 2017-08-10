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
    // `slider` is an array of image urls
    // `slider` is defined on front-page.php
    if (typeof slider !== "undefined") {
    
       // Initialize background image slider
       $.backstretch(slider, {
           duration: 4000,
           fade: 1400
       });

    }
 

});

