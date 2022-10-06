(function($) {
    'use strict';

    var destinations = {};
    if(typeof mkdf !== 'undefined'){
        mkdf.modules.destinations = destinations;
    }
    
    destinations.mkdfOnDocumentReady = mkdfOnDocumentReady;
    destinations.mkdfOnWindowLoad = mkdfOnWindowLoad;
    destinations.mkdfOnWindowResize = mkdfOnWindowResize;
    destinations.mkdfOnWindowScroll = mkdfOnWindowScroll;

    $(document).ready(mkdfOnDocumentReady);
    $(window).on('load', mkdfOnWindowLoad);
    $(window).resize(mkdfOnWindowResize);
    $(window).scroll(mkdfOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
	    destinationShortcodeSearchFilters().fieldsHelper.init();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdfOnWindowLoad() {
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdfOnWindowResize() {
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdfOnWindowScroll() {
    }

    function themeInstalled() {
        return typeof mkdf !== 'undefined';
    }
    
    function destinationShortcodeSearchFilters() {
        var $searchForms = $('.mkdf-tours-filter-holder.mkdf-tours-filter-horizontal form');
        
        var fieldsHelper = function() {
            
            var initDestinationSearch = function() {
                var destinations = typeof mkdfToursSearchData !== 'undefined' ? mkdfToursSearchData.destinations : [];
                
                var destinations = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: destinations
                });
                
                $searchForms.find('.mkdf-tours-destination-search').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'destinations',
                        source: destinations
                    });
            };
            
            return {
                init: function() {
                    initDestinationSearch();
                }
            }
        }();
        
        return {
            fieldsHelper: fieldsHelper
        }
    }
    
    return destinations;
})(jQuery);
