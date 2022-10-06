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

(function($) {
    'use strict';

    var tours = {};
    if(typeof mkdf !== 'undefined'){
        mkdf.modules.tours = tours;
    }
    
    tours.mkdfOnDocumentReady = mkdfOnDocumentReady;
    tours.mkdfOnWindowLoad = mkdfOnWindowLoad;
    tours.mkdfOnWindowResize = mkdfOnWindowResize;
    tours.mkdfOnWindowScroll = mkdfOnWindowScroll;

    tours.mkdfInitTourItemTabs = mkdfInitTourItemTabs;
    tours.mkdfTourTabsMapTrigger = mkdfTourTabsMapTrigger;

    tours.mkdfToursGalleryAnimation = mkdfToursGalleryAnimation;

    $(document).ready(mkdfOnDocumentReady);
    $(window).on('load', mkdfOnWindowLoad);
    $(window).resize(mkdfOnWindowResize);
    $(window).scroll(mkdfOnWindowScroll);

    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function mkdfOnDocumentReady() {
       mkdfInitTourItemTabs();

        if(typeof mkdf !== 'undefined' ){
            //if theme is installed, trigger google map loading on location tab on single pages
            mkdfTourTabsMapTrigger();
        }
    
        mkdfTourGalleryMasonry();
	    mkdfTrigerTourGalleryMasonry();

        searchTours().fieldsHelper.init();
        searchTours().handleSearch.init();
        mkdfToursMasonryAnimation();
    }

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdfOnWindowLoad() {
        mkdfToursGalleryAnimation();
    }

    /*
     All functions to be called on $(window).resize() should be in this function
     */
    function mkdfOnWindowResize() {
	    mkdfTourGalleryMasonry();
    }

    /*
     All functions to be called on $(window).scroll() should be in this function
     */
    function mkdfOnWindowScroll() {

    }

    function themeInstalled() {
        return typeof mkdf !== 'undefined';
    }

    /**
     * Init Resize Tours Gallery Items
     */
    function mkdfResizeToursGalleryItems(size,container){

        if(container.hasClass('mkdf-tours-gallery-images-fixed')) {
            var padding = parseInt(container.find('.mkdf-tour-gallery-item').css('padding-left')),
                defaultMasonryItem = container.find('.mkdf-tgi-masonry-default'),
                largeWidthMasonryItem = container.find('.mkdf-tgi-masonry-large-width'),
                largeHeightMasonryItem = container.find('.mkdf-tgi-masonry-large-height'),
                largeWidthHeightMasonryItem = container.find('.mkdf-tgi-masonry-large-width-height');

            if (mkdf.windowWidth > 680) {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            } else {
                defaultMasonryItem.css('height', size - 2 * padding);
                largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                largeWidthHeightMasonryItem.css('height', size - 2 * padding);
                largeWidthMasonryItem.css('height', size - 2 * padding);
            }

        }
    }
	
	function mkdfTourGalleryMasonry(){
		var masonryList = $('.mkdf-tour-masonry-gallery-holder .mkdf-tour-masonry-gallery');
		
		if(masonryList.length){
			masonryList.each(function(){
				var thisMasonry = $(this),
					thisMasonrySize = thisMasonry.find('.mkdf-tour-grid-sizer').width();
                mkdfResizeToursGalleryItems(thisMasonrySize, thisMasonry);
				
				thisMasonry.waitForImages(function() {
					thisMasonry.isotope({
						layoutMode: 'packery',
						itemSelector: '.mkdf-tour-gallery-item',
						percentPosition: true,
						packery: {
							gutter: '.mkdf-tour-grid-gutter',
							columnWidth: '.mkdf-tour-grid-sizer'
						}
					});
					
					thisMasonry.css('opacity', '1');
				});
			});
		}
	}
	
	function mkdfTrigerTourGalleryMasonry(){
		var holder = $('.mkdf-tour-item-single-holder');
		var tourNavItems = holder.find('.mkdf-tour-tabs.mkdf-horizontal ul li a');
		tourNavItems.on('click', function(e){
            e.preventDefault();
			var thisNavItem  = $(this);
			var thisNavItemId = thisNavItem.attr('href');

			if(thisNavItemId === 'tour-item-gallery-id'){
				mkdfTourGalleryMasonry();
			}
		});
	}

    function mkdfInitTourItemTabs(){
        var holder = $('.mkdf-tour-item-single-holder');
        var tourNavItems = holder.find('.mkdf-tour-tabs.mkdf-horizontal ul li a');
        var tourSectionsItems  = holder.find('.mkdf-tour-item-section');
        tourNavItems.first().addClass('mkdf-active-item');

        tourNavItems.on('click', function(e){
            e.preventDefault();
            tourNavItems.removeClass('mkdf-active-item');

            var thisNavItem  = $(this);
            var thisNavItemId = thisNavItem.attr('href');
            thisNavItem.addClass('mkdf-active-item');

            if( tourSectionsItems.length ){
                tourSectionsItems.each(function(){

                    var thisSectionItem = $(this);
                    if(thisSectionItem.attr('id') === thisNavItemId){
                        thisSectionItem.show();
                        if(thisNavItemId === 'tour-item-location-id'){
                              mkdfToursReInitGoogleMap();
                        }
                    }else{
                        thisSectionItem.hide();
                    }
                });
            }
        });
    }
    
    function mkdfTourTabsMapTrigger(){
        var holder = $('.mkdf-tour-item-single-holder');
        var tourNavItems = holder.find('.mkdf-tour-tabs.mkdf-horizontal ul li a');
        tourNavItems.on('click', function(e){
            e.preventDefault();
            var thisNavItem  = $(this);
            var thisNavItemId = thisNavItem.attr('href');

            if(thisNavItemId === 'tour-item-location-id'){
                mkdfToursReInitGoogleMap();
            }
        });
    }
    
    function mkdfToursReInitGoogleMap(){

        if(typeof mkdf !== 'undefined'){
            mkdf.modules.googleMap.mkdfShowGoogleMap();
        }
    }

    function searchTours() {
        var $searchForms = $('.mkdf-tours-search-main-filters-holder form');
        
        var fieldsHelper = function() {
            var initRangeSlider = function() {
                var $rangeSliders = $searchForms.find('.mkdf-tours-range-input');
                var $priceRange = $searchForms.find('.mkdf-tours-price-range-field');
                var $minPrice = $searchForms.find('[name="min_price"]');
                var $maxPrice = $searchForms.find('[name="max_price"]');
                var minValue = $priceRange.data('min-price');
                var maxValue = $priceRange.data('max-price');
                var chosenMinValue = $priceRange.data('chosen-min-price');
                var chosenMaxValue = $priceRange.data('chosen-max-price');
                
                if($rangeSliders.length) {
                    $rangeSliders.each(function() {
                        var thisSlider = this;
                        
                        var slider = noUiSlider.create(thisSlider, {
                            start: [chosenMinValue, chosenMaxValue],
                            connect: true,
                            step: 1,
                            range: {
                                'min': [ minValue ],
                                'max': [ maxValue ]
                            },
                            format: {
                                to: function(value) {
                                    return Math.floor(value);
                                },
                                from: function(value) {
                                    return value;
                                }
                            }
                        });
                        
                        slider.on('update', function(values) {
                            var firstValue = values[0];
                            var secondValue = values[1];
                            var currencySymbol = $priceRange.data('currency-symbol');
                            var currencySymbolPosition = $priceRange.data('currency-symbol-position');
                            
                            var firstPrice = currencySymbolPosition === 'left' ? currencySymbol + firstValue : firstValue + currencySymbol;
                            var secondPrice = currencySymbolPosition === 'left' ? currencySymbol + secondValue : firstValue + secondValue;
                            
                            $priceRange.val(firstPrice + ' - ' + secondPrice);
                            
                            $minPrice.val(firstValue);
                            $maxPrice.val(secondValue);
                        });
                    });
                }
            };
            
            var initKeywordSearch = function() {
                var tours = typeof mkdfToursSearchData !== 'undefined' ? mkdfToursSearchData.tours : [];
                
                var tours = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    local: tours
                });
                
                $searchForms.find('.mkdf-tours-keyword-search').typeahead({
                        hint: true,
                        highlight: true,
                        minLength: 1
                    },
                    {
                        name: 'tours',
                        source: tours
                    });
            };
            
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
            
            var initSelectPlaceholder = function() {
                var $selects = $('.mkdf-tours-select-placeholder');//
                
                var changeState = function($select) {
                    var selectVal = $select.val();
                    
                    if(selectVal === '') {
                        $select.addClass('mkdf-tours-select-default-option');
                    } else {
                        $select.removeClass('mkdf-tours-select-default-option');
                    }
                };
                
                if($selects.length) {
                    $selects.each(function() {
                        var $select = $(this);
                        $select.select2({
                            minimumResultsForSearch: -1
                        });
                        
                        changeState($(this));
                        
                        $select.on('change', function() {
                            changeState($(this));
                        });
                    })
                }
            };
            
            return {
                init: function() {
                    initRangeSlider();
                    initKeywordSearch();
                    initDestinationSearch();
                    initSelectPlaceholder();
                }
            }
        }();
        
        var handleSearch = function() {
            var rewriteURL = function(queryString) {
                //init variables
                var currentPage = '';
                
                //does current url has query string
                if (location.href.match(/\?.*/) && document.referrer) {
                    //get clean current url
                    currentPage = location.href.replace(/\?.*/, '');
                }
                
                //rewrite url with current page and new url string
                window.history.replaceState({page: currentPage + '?' + queryString}, '', currentPage + '?' + queryString);
            };
            
            var sendRequest = function($form, changeLabel, resetPagination, animate) {
                var $submitButton = $form.find('input[type="submit"]');
                var $searchContent = $('.mkdf-tours-search-content');
                var $searchPageContent = $('.mkdf-tours-search-page-holder');
                var searchInProgress = false;
                
                changeLabel = typeof changeLabel !== 'undefined' ? changeLabel : true;
                resetPagination = typeof resetPagination !== 'undefined' ? resetPagination : true;
                animate = typeof animate !== 'undefined' ? animate : false;
                
                var searchingLabel = $submitButton.data('searching-label');
                var originalLabel = $submitButton.val();
                
                if(!searchInProgress) {
                    if(changeLabel) {
                        $submitButton.val(searchingLabel);
                    }
                    
                    if(resetPagination) {
                        $form.find('[name="page"]').val(1);
                    }
                    
                    searchInProgress = true;
                    $searchContent.addClass('mkdf-tours-searching');
                    
                    var data = {
                        action: 'tours_search_handle_form_submission'
                    };
                    
                    data.fields = $form.serialize();
                    
                    $.ajax({
                        type: 'GET',
                        url: mkdfToursAjaxURL,
                        dataType: 'json',
                        data: data,
                        success: function(response) {
                            if(changeLabel) {
                                $submitButton.val(originalLabel);
                            }
                            
                            $searchContent.removeClass('mkdf-tours-searching');
                            searchInProgress = false;
                            
                            $searchContent.find('.mkdf-tours-row .mkdf-tours-row-inner-holder').html(response.html);
                            rewriteURL(response.url);
                            
                            $('.mkdf-tours-search-pagination').remove();
                            
                            $searchContent.append(response.paginationHTML);
                            
                            if(animate) {
                                $('html, body').animate({scrollTop: $searchPageContent.offset().top - 80}, 700);
                            }
                            mkdfToursGalleryAnimation();
                        }
                    });
                }
            };
            
            var formHandler = function($form) {
                
                if($('body').hasClass('post-type-archive-tour-item')) {
                    $form.on('submit', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        sendRequest($form);
                    });
                }
            };
            
            var handleOrderBy = function($searchForms) {
                var $orderingItems = $('.mkdf-search-ordering-item');
                var $orderByField = $searchForms.find('[name="order_by"]');
                var $orderTypeField = $searchForms.find('[name="order_type"]');
                
                if($orderingItems.length) {
                    $orderingItems.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var $thisItem = $(this);
                        
                        $orderingItems.removeClass('mkdf-search-ordering-item-active');
                        $thisItem.addClass('mkdf-search-ordering-item-active');
                        
                        var orderBy = $thisItem.data('order-by');
                        var orderType = $thisItem.data('order-type');
                        
                        if(typeof orderBy !== 'undefined' && typeof orderType !== 'undefined') {
                            $orderByField.val(orderBy);
                            $orderTypeField.val(orderType);
                        }
                        
                        sendRequest($searchForms, false, false);
                    });
                }
            };
            
            var handleViewType = function($searchForms) {
                var $viewTypeItems = $('.mkdf-tours-search-view-item');
                var $typeField = $searchForms.find('[name="view_type"]');
                
                if($viewTypeItems.length) {
                    $viewTypeItems.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var $thisView = $(this);
                        
                        $viewTypeItems.removeClass('mkdf-tours-search-view-item-active');
                        $thisView.addClass('mkdf-tours-search-view-item-active');
                        
                        var viewType = $thisView.data('type');
                        
                        if(typeof viewType !== 'undefined') {
                            $typeField.val(viewType);
                        }
                        
                        sendRequest($searchForms, false, false);
                    });
                }
            };
            
            var handlePagination = function($searchForms) {
                var $paginationHolder = $('.mkdf-tours-search-pagination');
                var $pageField = $searchForms.find('[name="page"]');
                
                if($paginationHolder.length) {
                    $(document).on('click', '.mkdf-tours-search-pagination li', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        var $thisItem = $(this);
                        
                        var page = $thisItem.data('page');
                        
                        if(typeof page !== 'undefined') {
                            $pageField.val(page);
                        }
                        
                        sendRequest($searchForms, true, false, true);
                    });
                }
            }
            
            return {
                init: function() {
                    formHandler($searchForms);
                    handleOrderBy($searchForms);
                    handleViewType($searchForms);
                    handlePagination($searchForms);
                }
            }
        }();
        
        return {
            fieldsHelper: fieldsHelper,
            handleSearch: handleSearch
        }
    }

    /*
    * Tours Gallery animation
    */
    function mkdfToursGalleryAnimation() {
        var toursGalleryItems = $('.mkdf-tours-gallery-item');

        if (toursGalleryItems.length) {
            toursGalleryItems.each(function(){
                var toursGalleryItem = $(this),
                    contentHolder = toursGalleryItem.find('.mkdf-tours-gallery-item-content-holder'),
                    excerpt = contentHolder.find('.mkdf-tours-gallery-item-excerpt'),
                    mainInfo = contentHolder.find('.mkdf-tours-gallery-main-info'),
                    deltaY = Math.ceil(excerpt.height() + parseInt(excerpt.css('margin-top')));

                    mainInfo.css('margin-bottom', '-'+deltaY+'px');
            });
        }

        toursGalleryItems.addClass('mkdf-tours-gallery-item-showed');
    }

    /*
    * Tours Masonry animation
    */
    function mkdfToursMasonryAnimation() {
        var toursMasonryItems = $('.mkdf-tours-masonry-item');

        if (toursMasonryItems.length) {
            toursMasonryItems.each(function(){
                var toursMasonryItem = $(this),
                    contentHolder = toursMasonryItem.find('.mkdf-tours-gim-content-holder'),
                    excerpt = contentHolder.find('.mkdf-tours-gim-excerpt'),
                    mainInfo = contentHolder.find('.mkdf-tours-gim-main-info'),
                    deltaY = Math.ceil(excerpt.height() + parseInt(excerpt.css('margin-top')));

                mainInfo.css('margin-bottom', '-'+deltaY+'px');
            });
        }
    }
    
    return tours;
})(jQuery);

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

(function($) {
    'use strict';

    var toursListSC = {};
    if(typeof mkdf !== 'undefined'){
        mkdf.modules.toursListSC = toursListSC;
    }

    toursListSC.mkdfOnWindowLoad = mkdfOnWindowLoad;

    toursListSC.toursList = toursList;

    $(window).on('load', mkdfOnWindowLoad);

    /*
     All functions to be called on $(window).load() should be in this function
     */
    function mkdfOnWindowLoad() {
        toursList().init();
    }

    function themeInstalled() {
        return typeof mkdf !== 'undefined';
    }

    function toursList() {
        var listItem = $('.mkdf-tours-list-holder'),
            listObject;

        var initList = function(listHolder) {
            listHolder.animate({opacity: 1});

            resizeTourItems(listHolder);

            listObject = listHolder.isotope({
                percentPosition: true,
                itemSelector: '.mkdf-tours-row-item',
                transitionDuration: '0.4s',
                isInitLayout: true,
                hiddenStyle: {
                    opacity: 0
                },
                visibleStyle: {
                    opacity: 1
                },
                layoutMode: 'packery',
                packery: {
                    columnWidth: '.mkdf-tours-list-grid-sizer'
                }
            });

            if(themeInstalled()) {
                mkdf.modules.common.mkdfInitParallax();
            }

            $(window).resize(function() {
                resizeTourItems(listHolder);
            });

        };

        var initFilter = function(listFeed) {
            var filters = listFeed.find('.mkdf-tour-list-filter-item');

            filters.on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                var currentFilter = $(this);
                var type = currentFilter.data('type');

                filters.removeClass('mkdf-tour-list-current-filter');
                currentFilter.addClass('mkdf-tour-list-current-filter');

                type = typeof type === 'undefined' ? '*' : '.' + type;

                listFeed.find('.mkdf-tours-list-holder-inner').isotope({
                    filter: type
                });
            });
        };

        var resetFilter = function(listFeed) {
            var filters = listFeed.find('.mkdf-tour-list-filter-item');

            filters.removeClass('mkdf-tour-list-current-filter');
            filters.eq(0).addClass('mkdf-tour-list-current-filter');

            listFeed.find('.mkdf-tours-list-holder-inner').isotope({
                filter: '*'
            });
        };

        var initPagination = function(listObject) {
            var paginationDataHolder = listObject.find('.mkdf-tours-list-pagination-data');
            var itemsHolder = listObject.find('.mkdf-tours-list-holder-inner');

            var fetchData = function(callback) {
                var data = {
                    action: 'mkdf_tours_list_ajax_pagination',
                    fields: paginationDataHolder.find('input').serialize()
                };

                $.ajax({
                    url: mkdfToursAjaxURL,
                    data: data,
                    dataType: 'json',
                    type: 'POST',
                    success: function(response) {
                        if(response.havePosts) {
                            paginationDataHolder.find('[name="next_page"]').val(response.nextPage);
                        }

                        if(themeInstalled()) {
                            mkdf.modules.common.mkdfInitParallax();
                        }

                        callback.call(this, response);
                    }
                });
            };
            
            var loadMorePagination = function() {
                var loadMoreButton = listObject.find('.mkdf-tours-load-more-button');
                var paginationHolder = listObject.find('.mkdf-tours-pagination-holder');
                var loadingInProgress = false;

                if(loadMoreButton.length) {
                    loadMoreButton.on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();

                        var loadingLabel = loadMoreButton.data('loading-label');
                        var originalText = loadMoreButton.text();
                        
                        loadMoreButton.text(loadingLabel);
                        resetFilter(listObject);

                        if(!loadingInProgress) {
                            loadingInProgress = true;

                            fetchData(function(response) {
                                if(response.havePosts === true) {
                                    loadMoreButton.text(originalText);

                                    var responseHTML = $(response.html);

                                    itemsHolder.append(responseHTML);

                                    itemsHolder.waitForImages(function() {
                                        resizeTourItems(itemsHolder);
                                        itemsHolder.isotope('appended', responseHTML).isotope('reloadItems');
                                        mkdf.modules.tours.mkdfToursGalleryAnimation();
                                    });
                                } else {
                                    loadMoreButton.remove();

                                    paginationHolder.html(response.message);
                                }

                                loadingInProgress = false;
                            });
                        }

                    });
                }
            };

            loadMorePagination();
        };

        var resizeTourItems = function resizeTourItems(container){
            var itemsMainHolder = container.parent();
            if(itemsMainHolder.hasClass('mkdf-tours-type-masonry')) {
                var padding = parseInt(container.find('.mkdf-tours-row-item').css('padding-left')),
                    defaultMasonryItem = container.find('.mkdf-size-default'),
                    largeWidthMasonryItem = container.find('.mkdf-size-large-width'),
                    largeHeightMasonryItem = container.find('.mkdf-size-large-height'),
                    largeWidthHeightMasonryItem = container.find('.mkdf-size-large-width-height'),
                    size = container.find('.mkdf-tours-list-grid-sizer').width();

                if (mkdf.windowWidth > 680) {
                    defaultMasonryItem.css('height', size - 2 * padding);
                    largeHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                    largeWidthHeightMasonryItem.css('height', Math.round(2 * size) - 2 * padding);
                    largeWidthMasonryItem.css('height', size - 2 * padding);
                } else {
                    defaultMasonryItem.css('height', size);
                    largeHeightMasonryItem.css('height', size);
                    largeWidthHeightMasonryItem.css('height', size);
                    largeWidthMasonryItem.css('height', Math.round(size / 2));
                }
            }
        };

        return {
            init: function() {
                if(listItem.length && typeof $.fn.isotope !== 'undefined') {
                    listItem.each(function() {
                        initList($(this).find('.mkdf-tours-list-holder-inner'));
                        initFilter($(this));
                        initPagination($(this));
                    });
                }
            }
        }
    }
    
    return toursListSC;
})(jQuery);
