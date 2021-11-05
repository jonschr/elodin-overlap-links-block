jQuery(document).ready(function ($) {

    var elodinOverlapLinksBlock = $('.elodin-overlap-links');

    function elodinOverlapTrigger(e) {

        console.log('trigger');

        if ($(window).width() > 560) {
            elodinOverlapLinksBlock.each(elodinOverlapReposition);
        } else {
            elodinOverlapLinksBlock.each(elodinOverlapReset);
        }
    }

    function elodinOverlapReset() {

        var element = $(this);

        element.css('position', 'static');
        element.children('.overlap-links-container').css('position', 'static');
        element.children('.overlap-links-container').css('margin-top', '0');

        var prev = element.prev();

        if (prev.hasClass('elodin-section')) {
            prev.children('.section-content').css('margin-bottom', '0');
        } else {
            prev.css('margin-bottom', '0');
        }

        var next = element.next();

        if (next.hasClass('elodin-section')) {
            next.children('.section-content').css('margin-top', '0');
        } else {
            next.css('margin-top', '0');
        }

    }

    function elodinOverlapReposition() {

        // define the element we're looking at
        var element = $(this);

        // apply some base styles
        element.css('position', 'relative');
        element.css('z-index', '20');
        element.children('.overlap-links-container').css('position', 'absolute');

        // figure out how far we need to shift things
        var height = element.children('.overlap-links-container').outerHeight();
        var negativeshift = height / 2 * -1;
        var shift = height / 2;

        // apply the negativeshift to the main element
        element.children('.overlap-links-container').css('margin-top', negativeshift + 'px');

        var prev = element.prev();

        if (prev.hasClass('elodin-section')) {
            prev.children('.section-content').css('margin-bottom', shift + 'px');
        } else {
            prev.css('margin-bottom', shift + 'px');
        }

        var next = element.next();

        if (next.hasClass('elodin-section')) {
            next.children('.section-content').css('margin-top', shift + 'px');
        } else {
            next.css('margin-top', shift + 'px');
        }

    }

    $(window).on('load resize', elodinOverlapTrigger);

});