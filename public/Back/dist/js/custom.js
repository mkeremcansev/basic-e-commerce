// jQuery

$(function() {

    "use strict";
    $(function() {
        $(".preloader").fadeOut();
    });

    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown({
        alignment: 'left',
        coverTrigger: false,
        hover: false,
        closeOnClick: false
    });
    $('.collapsible').collapsible();
    $("body").trigger("resize");

    // ============================================================== 
    // This is for the top header part and sidebar part
    // ==============================================================  
    var set = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 75;
        if (width < 1170) {
            //$("#main-wrapper").addClass("mini-sidebar");
            $('#topsubnav').sidenav({
                onOpenStart: function() {
                    $('body').addClass('overlay');
                },
                onCloseStart: function() {
                    $('body').removeClass('overlay');
                }
            });
        } else {
            //$("#main-wrapper").removeClass("mini-sidebar");
        }
    };
    $(window).ready(set);
    $(window).on("resize", set);

    // ============================================================== 
    // active menu js
    // ============================================================== 
    $(function() {
        var url = window.location;
        var element = $('ul.collapsible a').filter(function() {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().parent().css({
                    "display": "block"
                }).parent().addClass('active');
            } else {
                break;
            }
        }
    });
    $(".sidebar-toggle").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
    });
    // ============================================================== 
    // sidebar-hover
    // ============================================================== 
    $(".left-sidebar").hover(
        function() {
            $(".brand-logo").addClass("full-logo");
        },
        function() {
            $(".brand-logo").removeClass("full-logo");
        }
    );
    // ============================================================== 
    // Right Sidebar
    // ============================================================== 
    $('.right-sidenav').sidenav({
        edge: 'right',
        onOpenStart: function() {
            $('.chat-windows').addClass('show-chat');
            $('.chat-windows').removeClass('hide-chat');
        },
        onCloseStart: function() {
            $('.chat-windows').addClass('hide-chat');
            $('.chat-windows').removeClass('show-chat');
        }
    });
    // ============================================================== 
    // Perfect Scrollbar
    // ============================================================== 
    $('#main-wrapper[data-layout="vertical"] #slide-out, #right-slide-out, .message-center, .scrollable, .pre-scroll').perfectScrollbar();
    // ============================================================== 
    // FAB Buttons
    // ============================================================== 
    $('.fixed-action-btn').floatingActionButton();
    $('.fixed-action-btn.horizontal').floatingActionButton({
        direction: 'left'
    });
    $('.fixed-action-btn.click-to-toggle').floatingActionButton({
        direction: 'left',
        hoverEnabled: false
    });
    // ============================================================== 
    // Set checkbox on forms.html to indeterminate
    // ============================================================== 
    var indeterminateCheckbox = document.getElementById('indeterminate-checkbox');
    if (indeterminateCheckbox !== null)
        indeterminateCheckbox.indeterminate = true;
    // ============================================================== 
    // Navbar Tabs 
    // ============================================================== 
    $('.tabs').tabs();
    // ============================================================== 
    // Auto-complete
    // ============================================================== 
    $('input.autocomplete').autocomplete({
        data: {
            "Apple": null,
            "Microsoft": null,
            "Google": 'http://placehold.it/250x250'
        },
    });
    // ============================================================== 
    // Chips
    // ============================================================== 
    $('.chips').chips();
    $('.chips-initial').chips({
        readOnly: true,
        data: [{
            tag: 'Apple',
        }, {
            tag: 'Microsoft',
        }, {
            tag: 'Google',
        }]
    });
    $('.chips-placeholder').chips({
        placeholder: 'Enter a tag',
        secondaryPlaceholder: '+Tag',
    });
    $('.chips-autocomplete').chips({
        autocompleteOptions: {
            data: {
                'Apple': null,
                'Microsoft': null,
                'Google': null
            }
        }
    });
    // ============================================================== 
    // date-time picker
    // ============================================================== 
    $('.datepicker').datepicker();
    $('.timepicker').timepicker();
    // ============================================================== 
    // select
    // ============================================================== 
    $('select').not('.disabled').formSelect();
    // ============================================================== 
    // character counter
    // ============================================================== 
    $('input[data-length], textarea[data-length]').characterCounter();
    // ============================================================== 
    // carousel
    // ============================================================== 
    $('.carousel').carousel();
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
        onCycleTo: function(item, dragged) {}
    });
    // ============================================================== 
    // collapsible
    // ============================================================== 
    $('.collapsible.expandable').collapsible({
        accordion: false
    });
    // ============================================================== 
    // feature discovery
    // ============================================================== 
    $('.tap-target').tapTarget();
    // ============================================================== 
    // material-box
    // ============================================================== 
    $('.materialboxed').materialbox();
    $('.slider').slider();
    // ============================================================== 
    // Swipeable Tabs Demo Init
    // ============================================================== 
    if ($('#tabs-swipe-demo').length) {
        $('#tabs-swipe-demo').tabs({
            'swipeable': true
        });
    }
    // ============================================================== 
    // modal
    // ============================================================== 
    $('.modal').modal();
    // ============================================================== 
    // tooltip
    // ============================================================== 
    $('.tooltipped').tooltip();
    // ============================================================== 
    // parallax
    // ============================================================== 
    $('.parallax').parallax();
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label span").on('click', function() {
        $(this).toggleClass("task-done");
    });
    // ============================================================== 
    // dynamic color
    // ============================================================== 
    // convert rgb to hex value string
    function rgb2hex(rgb) {
        if (/^#[0-9A-F]{6}$/i.test(rgb)) {
            return rgb;
        }

        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

        if (rgb === null) {
            return "N/A";
        }

        function hex(x) {
            return ("0" + parseInt(x).toString(16)).slice(-2);
        }

        return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    $('.dynamic-color .col').each(function() {
        $(this).children().each(function() {
            var color = $(this).css('background-color'),
                classes = $(this).attr('class');
            $(this).html('<span>' + rgb2hex(color) + " " + classes + '</span>');
            if (classes.indexOf("darken") >= 0 || $(this).hasClass('black')) {
                $(this).css('color', 'rgba(255,255,255,.9');
            }
        });
    });
    // ============================================================== 
    // Toggle Containers on page
    // ============================================================== 
    var toggleContainersButton = $('#container-toggle-button');
    toggleContainersButton.click(function() {
        $('body .browser-window .container, .had-container').each(function() {
            $(this).toggleClass('had-container');
            $(this).toggleClass('container');
            if ($(this).hasClass('container')) {
                toggleContainersButton.text("Turn off Containers");
            } else {
                toggleContainersButton.text("Turn on Containers");
            }
        });
    });
    // ============================================================== 
    // CSS Transitions Demo Init
    // ==============================================================                                                                                                                 
    if ($('#scale-demo').length &&
        $('#scale-demo-trigger').length) {
        $('#scale-demo-trigger').click(function() {
            $('#scale-demo').toggleClass('scale-out');
        });
    }
    // ============================================================== 
    // Toggle Flow Text
    // ============================================================== 
    var toggleFlowTextButton = $('#flow-toggle');
    toggleFlowTextButton.click(function() {
        $('#flow-text-demo').children('p').each(function() {
            $(this).toggleClass('flow-text');
        });
    });

    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // This is for the innerleft sidebar
    // ==============================================================
    $(".show-left-part").on('click', function() {
        $('.left-part').toggleClass('show-panel');
        $('.show-left-part').toggleClass('ti-menu');
    });
});