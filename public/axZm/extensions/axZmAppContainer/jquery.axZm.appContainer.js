/*!
* Extension: jQuery AJAX-ZOOM, jquery.axZm.appContainer.js
* Copyright: Copyright (c) 2010-2021 Vadim Jacobi
* License Agreement: https://www.ajax-zoom.com/index.php?cid=download
* Extension Version: 1.0.0
* Extension Date: 2021-04-20
* URL: https://www.ajax-zoom.com
* Extension usage: https://www.ajax-zoom.com/examples/example32_modal.php
*/

;(function($) {
/*
'use strict';
*/

// Console log and errors
var consoleLog = function(mgs, type)
{
    if (typeof window.console !== undefined) {
        console[type || 'log'](mgs);
    }
};

// Test jQuery core is available
if (typeof $ != 'function' || typeof $.fn != 'object' || !$.fn.jquery) {
    consoleLog('This plugin requires jQuery to be loaded first.', 'error');
    return;
}

// Create random id
var makeID = function(l, prefix)
{
    l = l || 12;
    var t = '';
    var str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    for (var i = 0; i < l; i++) {
        t += str.charAt(Math.floor(Math.random() * str.length));
    }

    return (prefix || 'appContainer_') + t + (new Date()).getTime();
};

// Count properties of an object
var countObj = function(obj)
{
    if (obj && typeof obj == 'object') {
        if (window.Object && window.Object.keys) {
            return Object.keys(obj).length;
        }

        var n = 0;
        if (isObject(obj)) {
            $.each(obj, function(i) {
                n++;
            });
        }

        return n;
    } else {
        return null;
    }
};

// Remove AJAX-ZOOM completely
var removeAZ = function()
{
    $.fn.axZm.spinStop();
    if ($.fn.axZm.killInternalGalleries) {
        $.fn.axZm.killInternalGalleries();
    }

    $.fn.axZm.remove();
    $('#axZmTempBody').axZmRemove(true);
    $('#axZmTempLoading').axZmRemove(true);
    $('#axZmWrap').axZmRemove(true);
};

// Create $.axZmAppContainer.getTemplate method if you want to extend this.
// $.axZmAppContainer.getTemplate gets called prioritized.
// The correspondig CSS is in jquery.axZm.appContainerTemplates.css
// You can also use "contentHtml", "contentOverflowTopHtml", "contentOverflowBottomHtml"
var defineDefaultTemplates = function(op, ref, cID)
{
    var number = op.defaultTemplate;

    if (number == 1) {
        ref[1] = {};
        ref[1].main = '<div class="axZmAppContainer_tpl1-head">';
        ref[1].main += '<div class="axZmAppContainerTitle axZmAppContainer_tpl1-title"></div>';
        ref[1].main += '<div class="axZmAppContainerCloseElement axZmAppContainer_tpl1-closeButton"></div>';
        ref[1].main += '</div>';
        ref[1].main += '<div id="' + cID + '" class="axZmAppContainerMain axZmAppContainer_tpl1-main"></div>';

        ref[1].top = '';
        ref[1].bottom = '';

        return true;
    } else if (number == 2) {
        ref[2] = {};
        ref[2].main = '<div class="axZmAppContainer_tpl2-head">';
        ref[2].main += '<div class="axZmAppContainerCounterElement axZmAppContainer_tpl2-counter"></div>';
        ref[2].main += '<div class="axZmAppContainerCloseElement axZmAppContainer_tpl2-closeButton"></div>';
        ref[2].main += '</div>';
        ref[2].main += '<div id="' + cID + '" class="axZmAppContainerMain axZmAppContainer_tpl2-main"></div>';
        ref[2].main += '<div class="axZmAppContainer_tpl2-foot">';
        ref[2].main += '<div class="axZmAppContainerTitle axZmAppContainer_tpl2-title"></div>';
        ref[2].main += '</div>';

        ref[2].top = '';
        ref[2].bottom = '';

        return true;
    }

    return false;
};

// Plugin
$.axZmAppContainer = function(event, ell, options)
{
    // Element that triggered the overlay
    var jEll = ell ? $(ell) : (event && typeof event == 'object' && event.target ? $(event.target) : null);

    if (!ell && jEll && jEll[0]) {
        ell = jEll[0];
    }

    // No event or object, only options
    if (!jEll && $.isPlainObject(event) && !$.isEmptyObject(event)) {
        options = $.extend({}, event);
        jEll = $();
    }

    if (!event || (typeof event == 'object' && !event.type)) {
        try {
            event = $.axZmAppContainer.caller.arguments[0];
        }catch(e) {
            event = null;
        }
    }

    options = options || {};

    // Defaults
    var defaults = {
        // Additional CSS class(es) added to the outer "axZmAppContainerOverlay" for easy overriding the internal "axZmApp*" CSS classes.
        outerClass: '',

        // If enabled, the script adds the value of the "modalClass" option to the element with "axZmAppContainerBox".
        modalMode: true,

        // CSS class added for the modal functionality.
        // Try "axZmAppContainerWindow" for a slightly different appearance
        modalClass: 'axZmAppContainerModal',

        // Border radius of the modal window if you don't want to mess with CSS rules
        modalBorderRadius: null,

        // Inner padding of the modal box if you don't want to mess with CSS rules
        modalPadding: null,

        // Enable fade-in effect of the overlay.
        fadeIn: true,

        // Enable fade-out effect of the overlay.
        fadeOut: true,

        // Enable a fly-in effect of the container box.
        flyIn: false,

        // Enable a fly-out effect of the container box.
        flyOut: true,

        // Enable closing the APP container with the escape button.
        escape: true,

        // Reference to an HTML snippet, a jQuery selector to find the snippet, or a valid HTML as string.
        contentHtml: null,

        // Reference to an HTML snippet, a jQuery selector to find the snippet, or valid HTML as string to place at the top of the content.
        contentOverflowTopHtml: null,

        // Reference to an HTML snippet, a jQuery selector to find the snippet, or valid HTML as string to place at the bottom of the content.
        contentOverflowBottomHtml: null,

        // APP's container parent selector
        parent: 'body',

        // When scrollbar is hidden, center the modal box within the layout as if the bar is still there.
        centerOffset: true,

        // Function that can be executed when the DOM for the APP container is built.
        onShow: null,

        //////////// init AJAX-ZOOM without extensions ////////////
        // Path to the axZm folder
        axZmPath: '',

        // AJAX-ZOOM query string, e.g. example=11&zoomDir=/pic/zoom/animals
        // or example=17&zoomData=/path/to/image1.jpg|/path/to/image2.jpg
        // or example=spinIpad&3dDir=/pic/zoom3d/Uvex_Occhiali
        queryString: '',

        // Load an iframe
        iframe: '',

        // Use one of the default templates
        defaultTemplate: 1,

        // Position of the close button when defaultTemplate is used
        closeButtonPosition: null, // "left", "right", "auto"

        // Only required if you define a custom template via "contentHtml" option
        // Otherwise, a default template applies automatically
        playerContainerID: '',

        // First ID that should be loaded
        zoomID: '',

        // First image by file name that should load first
        zoomFile: '',

        // Optional title of the box
        title: '',

        // Optional AJAX-ZOOM callbacks
        // See https://www.ajax-zoom.com/examples/example14.php
        ajaxZoomCallbacks: {},

        // Use fullscreen API if possible
        fullScreenApi: true,

        // Use POST instead of GET
        postMode: false,

        // A temp image that may show when first image is generated on-the-fly
        tmpImg: ''
    };

    // Extend default options
    var op = $.extend(true, {}, defaults, options);

    // Internal variables
    var overlay,
        backContainer,
        modalContainer,
        contentContainer,
        contentOverflowTopContainer,
        contentOverflowBottomContainer,
        axZmPlayerContainerID,
        copyHtml = {},
        isShown = false,
        hiding = false,
        defaultTemplateHtml = {},
        bodyPadChanged = false,
        bodyPadding = 0;

    // Close with escape button
    var escape = function()
    {
        if (op.escape && op.parent == 'body') {
            $('body')
            .on('keyup.axZmAppContainer', function(e) {
                if (e.which == 27) {
                    // Trigger with delay to let other events to react to escape first
                    removeOverlay(e, 2);
                }
            });
        }
    };

    // Add closing to the overlay on click
    var overlayClick = function()
    {
        overlay
            .off('click.axZmAppContainer')
            .on('click.axZmAppContainer', function(e) {
                removeOverlay(e);
            });
    };

    // Add closing the APP container to any buttons having the CSS class "axZmAppContainerCloseButton"
    var closeIconClick = function()
    {
        $('.axZmAppContainerCloseElement', overlay)
            .off('click.axZmAppContainer')
            .on('click.axZmAppContainer', function(e) {
                removeOverlay(e);
            });
    };

    // Calculate the width of the scrollbar
    var getScrollBarWidth = function(test)
    {
        var winFullWidth = window.innerWidth;
        if (!winFullWidth) {
            var documentElementRect = document.documentElement.getBoundingClientRect();
            winFullWidth = documentElementRect.right - Math.abs(documentElementRect.left);
        }

        var scrollbarWidth = winFullWidth - document.body.offsetWidth;
        if (!scrollbarWidth && test) {
            var outer = document.createElement('div');
            outer.style.visibility = 'hidden';
            outer.style.overflow = 'scroll';
            outer.style.msOverflowStyle = 'scrollbar';
            document.body.appendChild(outer);

            var inner = document.createElement('div');
            outer.appendChild(inner);
            scrollbarWidth = parseInt(outer.offsetWidth - inner.offsetWidth);

            outer.parentNode.removeChild(outer);
        }

        return scrollbarWidth;
    };

    // Hide scrollbar and add padding to body to prevent layout shift
    var handleScrollbar = function()
    {
        bodyPadChanged = false;
        bodyPadding = parseInt(($('body').css('padding-right') || 0), 10);
        var scrollbarWidth = getScrollBarWidth(false);

        if (scrollbarWidth) {
            bodyPadChanged = true;
            var paddingSum = bodyPadding + scrollbarWidth;
            $('body').css('padding-right', paddingSum);

            // Create a style tag to center the container
            if (op.centerOffset && op.modalClass != 'axZmAppContainerWindow' && !$('#axZmAppContainerStyleOffset').length) {
                var newCss = '<style id="axZmAppContainerStyleOffset">';
                newCss += 'body > .axZmAppContainerOverlay{left: -' + paddingSum + 'px; width: calc(100% + ' + paddingSum + 'px);}';
                newCss += '</style>';

                $(newCss).appendTo($('head').length ? 'head' : 'body');
            }
        }

        $('body').addClass('axZmAppContainer');
    };

    // Restore padding of the body after closing
    var restoreScrollbar = function()
    {
        $('body').removeClass('axZmAppContainer');

        if (bodyPadChanged) {
            $('body').css('padding-right', '');
            $('#axZmAppContainerStyleOffset').remove();
            bodyPadChanged = false;
        }
    };

    // Close overlay container triggerd by several elements
    var removeOverlay = function(e, delay)
    {
        if (!isShown || hiding) {
            return false;
        }

        hiding = true;

        // Optional function before closing
        if (typeof op.onHide == 'function') {
            op.onHide(e);
        }

        var removeFunc = function()
        {
            var removeAct = function()
            {
                if (op.parent == 'body') {
                    restoreScrollbar();
                }

                $.fn.axZm.spinStop();
                $.fn.axZm.removeAZ();

                // Remove everything
                overlay.axZmRemove();

                // Restore HTML markup template that has been cloned on build
                if (!$.isEmptyObject(copyHtml)) {
                    $.each(copyHtml, function(k, v) {
                        if (v && typeof v == 'object') {
                            v.css('display', 'none').appendTo('body');
                        }
                    });
                }

                isShown = false;
                hiding = false;

                if (typeof op.onRemove == 'function') {
                    op.onRemove(e);
                }
            }

            if (op.fadeOut || op.flyOut) {
                if (op.flyOut) {
                    modalContainer
                        .removeClass('axZmAppContainerFlyIn axZmAppContainerFlyInPrepare')
                        .addClass('axZmAppContainerFlyOut');
                }

                if (op.fadeOut) {
                    backContainer
                        .removeClass('axZmAppContainerFadeIn')
                        .addClass('axZmAppContainerFadeOut');
                }

                setTimeout(removeAct, op.fadeOut === true ? 150 : parseInt(op.fadeOut));
            } else {
                removeAct();
            }
        };

        if (delay) {
            setTimeout(removeFunc, delay === true ? 1 : parseInt(op.delay));
        } else {
            removeFunc();
        }
    };

    // Add content from the default templates
    var addDefaultTemplate = function(templateNumber, clb)
    {
        // Get the default HTML for the template
        var tplObj = defaultTemplateHtml[templateNumber];
        if (!tplObj) {
            var errorMsg = 'A default template ("defaultTemplate" option) with the number ' + templateNumber + ' is not defined. ';
                errorMsg += 'Use the "contentHtml" option to define your HTML template.';
            consoleLog(errorMsg, 'error');
            contentContainer.html('<div style="color: red; padding: 10px;">' + errorMsg + '</div>');
            return;
        }

        if (tplObj.main) {
            addTemplate(contentContainer, 'main', tplObj.main);
        }

        if (tplObj.top) {
            addTemplate(contentOverflowTopContainer, 'top', tplObj.top);
        }

        if (tplObj.bottom) {
            addTemplate(contentOverflowBottomContainer, 'bottom', tplObj.bottom);
        }

        var closeBtnPos = op.closeButtonPosition;

        if (closeBtnPos && typeof closeBtnPos == 'string' && ['auto', 'left', 'right'].indexOf(closeBtnPos) != -1) {
            if (closeBtnPos == 'auto') {
                if (window.navigator && navigator.platform.toLowerCase().indexOf('mac') != -1) {
                    closeBtnPos = 'left';
                }
            }

            if (closeBtnPos == 'left') {
                var closeEll = $('.axZmAppContainerCloseElement', contentContainer);
                if (closeEll.length) {
                    closeEll.parent().addClass('axZmAppContainerSwapHead');
                }
            }
        }

        if (typeof clb == 'function') {
            clb();
        }
    };

    // Evaluate the content (template, reference, etc.) and append it to containers
    var addTemplate = function(container, key, content)
    {
        var contentHtml = op[key] || content;
        copyHtml[key] = null;

        // Evaluate the contentHtml option with a heuristic approach:
        // The "contentHtml" option is of type string
        if (typeof contentHtml == 'string') {
            // Consider the string as valid HTML (as "text")
            if (contentHtml.indexOf('<') != -1 && contentHtml.indexOf('>') != 1) {
                // Use jQuery HTML to build content
                container.html($(contentHtml).css('display', 'block'));
            } else {
                // Try to interpret as selector
                var selObj;

                if (contentHtml.indexOf('#') === 0) {
                    // If it is not HTML, it must be a selector
                    try {
                        selObj = $(contentHtml);
                    } catch(err) {}
                } else {
                    // Try with # (id)
                    try {
                        selObj = $('#' + contentHtml);
                    } catch(err) {
                        try {
                            selObj = $(contentHtml + ':eq(0)');
                        } catch(err) {}
                    }
                }

                if (selObj && typeof selObj == 'object' && selObj.length === 1) {
                    // Deep copy
                    copyHtml[key] = selObj.clone(true);
                    container.append(selObj.css('display', 'block'));
                } else {
                    return false;
                }
            }
        } else if (contentHtml instanceof jQuery) {
            // Is already jQuery selector
            copyHtml[key] = contentHtml.clone(true);
            container.append(contentHtml.css('display', 'block'));
        } else if (contentHtml && typeof contentHtml == 'object' && $.isPlainObject(contentHtml) === false) {
            // JS object
            copyHtml[key] = $(contentHtml).clone(true);
            container.append($(contentHtml).css('display', 'block'));
        } else {
            return false;
        }

        return true;
    };

    // Set initial title passed by the title option
    var setTitle = function(ttl)
    {
        var titleEll =  $('.axZmAppContainerTitle', contentContainer);

        if (titleEll.length && (ttl || op.title)) {
            titleEll.html(ttl || op.title);
        }
    };

    // Build and init APP Container
    var build = function()
    {
        var errorMsg = '';
        if (typeof op.parent != 'string' || !op.parent.length || $(op.parent).length !== 1) {
            errorMsg = 'The parent container with the selector "' + op.parent + '" is not present or is not unique.';
            consoleLog(errorMsg, 'error');
            op.parent = 'body';
        }

        if (isShown) {
            return false;
        }

        // Flag that the app container is started.
        isShown = true;

        // Init AJAX-ZOOM by a query string without extensions
        var conditionPlainAjaxZoom = op.axZmPath && op.queryString;

        var noHtmlTemplate = false;

        // A random ID
        var mainContentID = makeID(12, 'appContainer_');

        // Hide scrollbars if visible
        if (op.parent == 'body') {
            handleScrollbar();
        }

        // Most outer container, which is the background overlay as well.
        // The fade-in effect transforms color from transparent to any other (opaque) color allowing different transition times.
        overlay = $('<div class="axZmAppContainerOverlay' + (op.outerClass ? (' ' + op.outerClass) : '') + '"></div>');

        // Separate container with a background color for fading
        backContainer = $('<div class="axZmAppContainerBack"></div>').appendTo(overlay);

        // Inner container
        modalContainer = $('<div class="axZmAppContainerBox" data-id="' + mainContentID + '"></div>').appendTo(overlay);

        // Make that container behave as modal window if such an option is set.
        if (op.modalMode) {
            modalContainer.addClass(op.modalClass);
        }

        // Content container. Here we add the contents.
        contentContainer = $('<div class="axZmAppContainerContent" id="' + mainContentID + '">')
            .appendTo(modalContainer);

        // Add border-radius by option
        if (typeof op.modalBorderRadius == 'string') {
            contentContainer.css('border-radius', op.modalBorderRadius);
        }

        // Add padding by option
        if (typeof op.modalPadding == 'string') {
            contentContainer.css('padding', op.modalPadding);
        }

        // Add HTML, selector, or instance to contentContainer
        if (addTemplate(contentContainer, 'contentHtml') === false) {
            if (conditionPlainAjaxZoom || op.iframe) {
                noHtmlTemplate = true;
            } else {
                errorMsg = 'The contentHtml option cold not be resolved as valid content. Please refer to the documentation of the jQuery.axZmAppContainer extension.';
                consoleLog(errorMsg, 'error');
                contentContainer.html('<div style="color: red; padding: 10px;">' + errorMsg + '</div>');
            }
        }

        // A helper conainer which content may overflow the box
        contentOverflowTopContainer = $('<div class="axZmAppContainerOverflowTopContent"><!-- Use the contentOverflowTopHtml option to add content to this div --></div>')
            .prependTo(modalContainer);

        // Add template, e.g., with a close button if present
        addTemplate(contentOverflowTopContainer, 'contentOverflowTopHtml');

        // A helper conainer which content may overflow the box
        contentOverflowBottomContainer = $('<div class="axZmAppContainerOverflowBottomContent"><!-- Use the contentOverflowBottomHtml option to add content to this div --></div>')
            .appendTo(modalContainer);

        // Add template, e.g., with a close button if present
        addTemplate(contentOverflowBottomContainer, 'contentOverflowBottomHtml');

        // Prevent event propagation for the backgound
        contentContainer.on('click scroll', function(e) {
            e.stopPropagation();
            e.preventDefault();
            return false;
        });

        // Add a class defining the initial position and other CSS before fly-in
        if (op.flyIn) {
            modalContainer.addClass('axZmAppContainerFlyInPrepare');
        }

        // Append container to body
        overlay.appendTo(op.parent);

        // Add a class for the fade-in effect of the background
        if (op.fadeIn) {
            setTimeout(function() {
                backContainer.addClass('axZmAppContainerFadeIn');
            }, 1)
        }

        // Trigger AJAX-ZOOM from queryString
        if (conditionPlainAjaxZoom && !op.iframe) {

            if (!op.defaultTemplate) {
                op.defaultTemplate = 1;
            }

            axZmPlayerContainerID = noHtmlTemplate ? makeID(12, 'axZmPlayerContainer_') : op.playerContainerID;

            if (!axZmPlayerContainerID) {
                errorMsg = 'If you define a custom template, then you also must define the ID for the viewer, which is the "playerContainerID" option.';
                consoleLog(errorMsg, 'error');
                contentContainer.html('<div style="color: red; padding: 10px;">' + errorMsg + '</div>');
                return;
            }

            if (typeof $.axZmAppContainer.getTemplate == 'function') {
                // Let define default templates from outside by window.axZmAppContainerTemplate function
                $.axZmAppContainer.getTemplate(op, defaultTemplateHtml, axZmPlayerContainerID);
            } else {
                // Grab to defualt templates
                defineDefaultTemplates(op, defaultTemplateHtml, axZmPlayerContainerID);
            }

            var init = function()
            {
                if (!$('#' + axZmPlayerContainerID).length) {
                    errorMsg = 'Something went wrong with the default templates. The container with ID ' + axZmPlayerContainerID + ' is missing in the DOM.';
                    consoleLog(errorMsg, 'error');
                    contentContainer.html('<div style="color: red; padding: 10px;">' + errorMsg + '</div>');
                    return;
                }

                var counterEll = $('.axZmAppContainerCounterElement', contentContainer);
                setTitle();

                var azCallBacks = $.fn.axZm.mergeCallBackObj({}, op.ajaxZoomCallbacks);

                if (counterEll.length) {
                    var objLength = 0;
                    var setCounter = function() {
                        counterEll.html('<span class="axZmAppContainerCounterImage"></span>' + $.axZm.zoomID + '<span class="axZmAppContainerCounterDivider"></span>' + objLength);
                    };

                    azCallBacks = $.fn.axZm.mergeCallBackObj(azCallBacks, {
                        onLoad: function() {
                            objLength = countObj($.axZm.zoomGA);
                            setCounter();
                        },
                        onImageChangeEnd: function() {
                            setCounter();
                        }
                    });
                }

                if (op.zoomID && op.queryString.indexOf('zoomID=') === -1) {
                    op.queryString += '&zoomID=' + op.zoomID;
                } else if (op.zoomFile && op.queryString.indexOf('zoomFile=') === -1) {
                    op.queryString += '&zoomFile=' + op.zoomFile;
                }

                var delayInitTime = 0;
                var delayInitUnit = 's';

                if (op.flyIn) {
                    delayInitTime = parseFloat(modalContainer.css('transitionDuration') || 0);
                    delayInitUnit = modalContainer.css('transitionDuration').indexOf('ms') != -1 ? 'ms' : 's';
                }

                var initAjaxZoom = function()
                {
                    $.fn.axZm.openResponsive(
                        event,
                        op.axZmPath,
                        op.queryString,
                        azCallBacks,
                        axZmPlayerContainerID,
                        op.fullScreenApi,
                        false,
                        op.postMode,
                        op.tmpImg
                    );
                };

                if (delayInitTime > 0) {
                    setTimeout(initAjaxZoom, (delayInitUnit == 'ms' ? delayInitTime : delayInitTime * 1000))
                } else {
                    initAjaxZoom();
                }
            };

            if (noHtmlTemplate) {
                addDefaultTemplate(op.defaultTemplate, init);
            } else {
                init();
            }
        } else if (op.iframe) {
            // To-do: refactor
            var iframeContainerID = makeID(12, 'axZmPlayerIframeContainer_');
            var iframeID = makeID(12, 'axZmPlayerIframe_');
            var frameSrc = op.iframe;
            if (frameSrc.indexOf('&') != -1 || frameSrc.indexOf('?') != -1) {
                frameSrc += '&iframeID=' + iframeID;
            } else {
                frameSrc += '?iframeID=' + iframeID;
            }

            if (typeof $.axZmAppContainer.getTemplate == 'function') {
                // Let define default templates from outside by window.axZmAppContainerTemplate function
                $.axZmAppContainer.getTemplate(op, defaultTemplateHtml, iframeContainerID);
            } else {
                // Grab to defualt templates
                defineDefaultTemplates(op, defaultTemplateHtml, iframeContainerID);
            }

            var init = function()
            {
                setTitle();
                var iframeHtml = '<iframe id="' + iframeID + '" src="' + frameSrc + '" style="width: 100%; height: 100%; position: relative;" frameborder="0" hspace="0" scrolling="no" allowfullscreen="true"></iframe>';
                if ($('.axZmAppContainerMain', contentContainer).length) {
                    $('.axZmAppContainerMain', contentContainer).append(iframeHtml);
                } else {
                    errorMsg = 'If you define a custom HTML template with an iframe and use the iframe option, please add the "axZmAppContainerMain" css class to the container to which the iframe should be appended.';
                    consoleLog(errorMsg, 'error');
                    contentContainer.html('<div style="color: red; padding: 10px;">' + errorMsg + '</div>');
                }
            }

            if (noHtmlTemplate) {
                addDefaultTemplate(op.defaultTemplate, init);
            } else {
                init();
            }
        }

        // A function that my trigger AJAX-ZOOM instead of onShow
        if (typeof op.onBuild == 'function') {
            op.onBuild(event);
        }

        var delayTime = 0;
        var delayUnit = 's';

        if (op.flyIn) {
            delayTime = parseFloat(modalContainer.css('transitionDuration') || 0);
            delayUnit = modalContainer.css('transitionDuration').indexOf('ms') != -1 ? 'ms' : 's';
            modalContainer.addClass('axZmAppContainerFlyIn');
        }

        // A function that triggers AJAX-ZOOM
        if (typeof op.onShow == 'function') {
            // Do not use transitionend, it is still unstable
            if (delayTime > 0) {
                setTimeout(function() {op.onShow(event)}, (delayUnit == 'ms' ? delayTime : delayTime * 1000));
            } else {
                op.onShow(event);
            }
        }

        // Add closing actions with a small delay
        setTimeout(function() {
            // Background overlay
            overlayClick();

            // Icon
            closeIconClick();

            // Escape button on the keyboard
            escape();

            // Add a CSS class to modal container if it should be closed with an animation.
            if (op.flyOut) {
                modalContainer
                    .addClass('axZmAppContainerFlyOutPrepare');
            }

        }, 200);

        return overlay;
    };

    return build();
};

$.fn.axZmAppContainer = function(options) {
    return this.each(function() {
        var _this = $(this);
        _this
            .off('click.axZmAppContainer')
            .on('click.axZmAppContainer', function(event) {
                $.axZmAppContainer(event, _this, options);
            });
    });
};

})(window.jQuery);
