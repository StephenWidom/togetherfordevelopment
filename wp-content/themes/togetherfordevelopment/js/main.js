/*
 * MAIN SITE JAVASCRIPTS
 *
 * To be executed on every page
 */

jQuery(document).ready(function($) {


    /*
     * FANCYBOX / LIGHTBOX / POPUP
     *
     * Open designated content in a lightbox
     */

    // Assign designated class to links to jpgs
    $imageLinks = $('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]');
    $imageLinks.each(function() {

        var imageLink = $(this).attr('href');
        
        // Only target images with a caption
        if ($(this).next().hasClass('wp-caption-text')) {

            var $caption = $(this).next(),
                captionText = $caption.text().trim();

            $caption.html($caption.html() + '<a href="' + imageLink + '" class="fancybox" title="' + $(this).next().text().trim()  + '"><i class="fa fa-plus-square-o"></i></a>');
           $(this).attr('title', captionText); 

        }

    });

    $imageLinks.addClass('fancybox');

    // Apply to all links with a class of "fancybox"
    $('.fancybox').fancybox({
        padding: 0
    });


    /*
     * EXTERNAL LINKS
     *
     * Open external links in a new tab by default
     */

    $('a').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
    }).attr('target', '_blank');

    // Remove above behavior from header links
    // $('nav a').removeAttr('target');

    // Open all links to PDFs in a new tab
    $('a[href$=".pdf"]').attr('target', '_blank');


    /*
     * SLICKNAV / MOBILE NAV
     *
     * Mobile nav menu instance, and some changes to
     * "Products" link, because it's difficult to show
     * all logos on mobile
     */

    $('header nav>ul').slicknav({
        appendTo: 'header>div.container'
    });


    /*
     * MOBILE TWEAKS
     *
     * Adjust element placement for mobile layout
     */

    var mobileLayout = false;

    $(window).on("load resize", function() {
        
        var viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

        // Mobile layout
        if (viewportWidth <= 960 && !mobileLayout) {

            $('.soc').appendTo('footer .container');

            mobileLayout = true;
            
        // Put it back to normal for desktops
        } else if (viewportWidth > 960 && mobileLayout) {

            $('.soc').prependTo('footer .container');

            mobileLayout = false;

        }


    });


});

