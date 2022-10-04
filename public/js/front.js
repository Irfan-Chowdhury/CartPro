/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function () {
    $('nav.side-navbar').addClass('shrink');

    'use strict';

    // Main Template Color
    var brandPrimary = '#33b35a';

    $('[data-toggle="tooltip"]').tooltip();

    // ------------------------------------------------------- //
    // Custom Scrollbar
    // ------------------------------------------------------ //

    if ($(window).outerWidth() > 992) {
        $("nav.side-navbar, .right-sidebar").mCustomScrollbar({
            theme: "light",
            scrollInertia: 200
        });
    }


    // ------------------------------------------------------- //
    // Side Navbar Functionality
    // ------------------------------------------------------ //
    if ($(window).outerWidth() > 1199) {
        $('nav.side-navbar').removeClass('shrink');
    }
    $('#toggle-btn').on('click', function (e) {

        e.preventDefault();

        if ($(window).outerWidth() > 1199) {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active');
        } else {
            $('nav.side-navbar').toggleClass('shrink');
            $('.page').toggleClass('active-sm');
        }
    });


    // ------------------------------------------------------- //
    // Login  form validation
    // ------------------------------------------------------ //
    // $('#login-form').validate({
    //     messages: {
    //         loginUsername: 'please enter your username',
    //         loginPassword: 'please enter your password'
    //     }
    // });

    // ------------------------------------------------------- //
    // Material Inputs
    // ------------------------------------------------------ //

    var materialInputs = $('input.input-material');

    // activate labels for prefilled values
    materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');

    // move label on focus
    materialInputs.on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
    });

    // remove/keep label on blur
    materialInputs.on('blur', function () {
        $(this).siblings('.label-material').removeClass('active');

        if ($(this).val() !== '') {
            $(this).siblings('.label-material').addClass('active');
        } else {
            $(this).siblings('.label-material').removeClass('active');
        }
    });

    // ------------------------------------------------------- //
    // External links to new window
    // ------------------------------------------------------ //

    $('.external').on('click', function (e) {

        e.preventDefault();
        window.open($(this).attr("href"));
    });


    // ------------------------------------------------------- //
    // Header Dropdown / Right Sidebar
    // ------------------------------------------------------ //
    $('header .dropdown-item').on('click', function(){
        $('.right-sidebar.open').removeClass('open');
        $(this).siblings('.right-sidebar').addClass('open');
        $('.content').on('click', function(){
            $('.right-sidebar.open').removeClass('open');
        })
    })

    // ------------------------------------------------------- //
    // full screen button
    // ------------------------------------------------------ //

    function toggleFullscreen(elem) {
        elem = elem || document.documentElement;
        if (!document.fullscreenElement && !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }
    if(('#btnFullscreen').length > 0) {
        document.getElementById('btnFullscreen').addEventListener('click', function() {
            toggleFullscreen();
        });
    }

    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //

    var stylesheet = $('link#theme-stylesheet');
    $( "<link id='new-stylesheet' rel='stylesheet'>" ).insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');

    // if ($.cookie("theme_csspath")) {
    //     alternateColour.attr("href", $.cookie("theme_csspath"));
    // }

    $("#colour").change(function () {

        if ($(this).val() !== '') {

            var theme_csspath = 'css/style.' + $(this).val() + '.css';

            alternateColour.attr("href", theme_csspath);

            $.cookie("theme_csspath", theme_csspath, { expires: 365, path: document.URL.substr(0, document.URL.lastIndexOf('/')) });

        }

        return false;
    });


});
