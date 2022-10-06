(function($) {
    'use strict';

    var destinationsListSC = {};
    if(typeof mkdf !== 'undefined'){
        mkdf.modules.destinationsListSC = destinationsListSC;
    }

    destinationsListSC.mkdfOnWindowLoad = mkdfOnWindowLoad;
    destinationsListSC.mkdfOnWindowResize = mkdfOnWindowResize;

    destinationsListSC.destinationsList = destinationsList;

    $(window).on('load', mkdfOnWindowLoad);
    $(window).resize(mkdfOnWindowResize);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdfOnWindowLoad() {
        destinationsList();
    }

    /*
    All functions to be called on $(window).resize() should be in this function
    */
    function mkdfOnWindowResize() {
        destinationsList();
    }


    function destinationsList() {

        var holder = $('.mkdf-tours-destination-list.mkdf-destinations-masonry .mkdf-tours-row-inner-holder'),
        thisMasonrySize = holder.find('.mkdf-tours-list-grid-sizer').width();
        mkdfResizeToursDestinationItems(thisMasonrySize, holder);

        holder.waitForImages(function() {
            holder.isotope({
                itemSelector: '.mkdf-tours-row-item',
                percentPosition: true,
                //transitionDuration: '0.4s',
                //isInitLayout: true,
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                },
                layoutMode: 'packery',
                packery: {
                    gutter: '.mkdf-tours-list-grid-gutter',
                    columnWidth: '.mkdf-tours-list-grid-sizer'
                }
            });

            holder.css('opacity', '1');
        });
    }

    function mkdfResizeToursDestinationItems(size,container) {
        var padding = parseInt(container.find('.mkdf-tours-destination-list-item').css('padding-left')),
            defaultMasonryItem = container.find('.mkdf-size-default'),
            largeWidthMasonryItem = container.find('.mkdf-size-large-width'),
            largeHeightMasonryItem = container.find('.mkdf-size-large-height'),
            largeWidthHeightMasonryItem = container.find('.mkdf-size-large-width-height');

        if (mkdf.windowWidth > 680) {
            defaultMasonryItem.css('height', size - 2 * padding);
            largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
            largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
            largeWidthMasonryItem.css('height', size - 2 * padding);
        } else {
            defaultMasonryItem.css('height', size - 2 * padding);
            largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
            largeWidthHeightMasonryItem.css('height', size - 2 * padding);
            largeWidthMasonryItem.css('height', Math.round(size / 2) - padding);
        }

    }

    
})(jQuery);
