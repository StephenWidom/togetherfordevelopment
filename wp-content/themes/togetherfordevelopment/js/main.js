jQuery(document).ready(function($){

    getNextDrawing();

    function getNextDrawing() {

        // Grab the link to the previous drawing
        var $nextLink = $('a[rel="prev"]'),
            $currentDrawing;

        // If there is a link to a previous drawing
        if ($nextLink.length > 0) {

            // Grab the URL of the previous drawing
            var nextDrawingURL = $nextLink.attr('href');

            // Load the previous drawing into a new article element
            $('<article>').load(nextDrawingURL + ' article>div', function() {

                // Remove the previous drawing link
                $nextLink.remove();

                // Add the new (previous) drawing
                $('.content').append($(this));

                // Attach getNextDrawing to this new drawing
                $currentDrawing = $(this).scrollTo(getNextDrawing).prev();

            });

        }

    }

});

