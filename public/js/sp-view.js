/**
 * Created by Azamat Mirvosiqov on 29.01.2015.
 */

var min = 14,
    max = 30;

function setFontSize(size) {
    if (size < min) {
        size = min;
    }
    if (size > max) {
        size = max;
    }
    $('body, .onlineServices li a, .newsList ul li').css({'font-size': size+'px'});/*14*/
    $('.title-22').css({'font-size': (size+8)+'px'});/*22*/
    $('.title-18').css({'font-size': (size+4)+'px'});/*18*/
    $('.footerList ul li .li-text').css({'font-size': (size-2)+'px'});/*12*/

}

function restFontSize(){
    $('body, .onlineServices li a, .newsList ul li, .title-22, .title-18, .footerList ul li .li-text').css('font-size','');
}

function makeNormal() {
    $('html').removeClass('blackAndWhite blackAndWhiteInvert');
    $.removeCookie('specialView', {path: '/'});
}

function makeBlackAndWhite() {
    makeNormal();
    $('html').addClass('blackAndWhite');
    $.cookie("specialView", 'blackAndWhite', {path: '/'});
}

function makeBlackAndWhiteDark() {
    makeNormal();
    $('html').addClass('blackAndWhiteInvert');
    $.cookie("specialView", 'blackAndWhiteInvert', {path: '/'});
}

function saveFontSize(size) {
    $.cookie("fontSize", size, {path: '/'});
}
function changeSliderText(sliderId, value) {
    var position = Math.round(Math.abs((value - min) * (100 / (max - min))));
    $('#' + sliderId).prev('.sliderText').children('.range').text(position);
}



var minzoom = 0,
    maxzoom = 50; /** максимум 5 **/

function savezoomSizer(size) {
    $.cookie("zoomSizer", size, {path: '/'});
}

function changeSliderTextZoom(sliderId, value) {
    var position = Math.round(Math.abs(100 - (20 * (maxzoom - value))));
    $('#' + sliderId).prev('.sliderZoom').children('.range').text(position);
}
function setzoomSizer(size) {
    if (size < minzoom) {
        size = minzoom;
    }
    if (size > maxzoom) {
        size = maxzoom;
    }
    // console.log(size);
    $('body').css({
        // 'zoom': '1.' + parseInt(size),
        // '-ms-zoom': '1.' + parseInt(size),
        // '-webkit-zoom': '1.' + parseInt(size),
        // '-moz-zoom': '1.' + parseInt(size),
        // '-o-zoom': '1.' + parseInt(size),
        '-webkit-transform': 'scale(1.'+size+')',
        '-moz-transform': 'scale(1.'+size+')',
        '-ms-transform': 'scale(1.'+size+')',
        'transform': 'scale(1.'+size+')',
        '-webkit-transform-origin': 'top center',
        '-moz-transform-origin': 'top center',
        '-ms-transform-origin': 'top center',
        'transform-origin': 'top center',
        // '-webkit-transform': 'scale(1.'+parseInt(size)+')',
        // 'transform': "scale(1."+parseInt(size)+")",
        // 'margin-top': ""+ (parseInt(size) + 20) +"%",
    });

}

function parseValueZoomSlider(value){
    return (value/20).toString().replace(/[^\d]/g, "").substring(0,2);
}

$(document).ready(function () {
    var appearance = $.cookie("specialView");
    switch (appearance) {
        case 'blackAndWhite':
            makeBlackAndWhite();
            break;
        case 'blackAndWhiteInvert':
            makeBlackAndWhiteDark();
            break;
    }

    $('.no-propagation').click(function (e) {
        e.stopPropagation();
    });

    $('.spcNormal').click(function () {
        makeNormal();
    });
    $('.spcWhiteAndBlack').click(function () {
        makeBlackAndWhite();

    });
    $('.spcDark').click(function () {
        makeBlackAndWhiteDark();
    });


    $('#fontSizer').slider({
        min: 0,
        max: 100,
        range: "min",
        create: function() {
            $( this ).find('.ui-slider-handle').attr('data-step',$( this ).slider( "value" )+'%');
        },
        slide: function (event, ui) {
            $( this ).find('.ui-slider-handle').attr('data-step',ui.value+'%');
            setFontSize(min+(ui.value/10));
            changeSliderText('fontSizer', min+(ui.value/10));
        },
        change: function (event, ui) {
            saveFontSize(ui.value);
        }
    });

    var fontSize = $.cookie("fontSize");
    if (typeof(fontSize) != 'undefined') {
        $("#fontSizer").slider('value', fontSize);
        $("#fontSizer").find('.ui-slider-handle').attr('data-step',fontSize+'%');
        setFontSize(min+(fontSize/10));
        changeSliderText('fontSizer', min+(fontSize/10));
    }

    /****************zoomSizer********************/
    $('#zoomSizer').slider({
        min: 0,
        max: 100,
        range: "min",
        create: function() {
            $( this ).find('.ui-slider-handle').attr('data-step',$( this ).slider( "value" )+'%');
        },
        slide: function (event, ui) {
            $( this ).find('.ui-slider-handle').attr('data-step',ui.value+'%');
            setzoomSizer(parseValueZoomSlider(ui.value));
            changeSliderTextZoom('zoomSizer', parseValueZoomSlider(ui.value));
        },
        change: function (event, ui) {
            savezoomSizer(ui.value);
        }
    });

    var zoomSizer = $.cookie("zoomSizer");
    if (typeof(zoomSizer) != 'undefined') {
        $("#zoomSizer").slider('value', zoomSizer);
        $("#zoomSizer").find('.ui-slider-handle').attr('data-step',zoomSizer+'%');
        setzoomSizer(parseValueZoomSlider(zoomSizer));
        changeSliderTextZoom('zoomSizer', parseValueZoomSlider(zoomSizer));
    }

    $('.resetSpecialView').click(function(e){
        e.preventDefault();
        $("#zoomSizer").slider('value', 0);
        $("#zoomSizer").find('.ui-slider-handle').attr('data-step','0%');
        $.removeCookie("zoomSizer", {path: '/'});

        $("#fontSizer").slider('value', 0);
        $("#fontSizer").find('.ui-slider-handle').attr('data-step','0%');
        $.removeCookie("fontSize", {path: '/'});

        $.removeCookie("specialView", {path: '/'});
        $('body').removeAttr('style').removeAttr('class');
        $('html').removeAttr('class');
        restFontSize();
    });

});