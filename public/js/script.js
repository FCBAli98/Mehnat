$.fn.tabs = function( body){
	var boddy = $(body);
	var navs = $(this).find('a');
	navs.click(function(e){
		e.preventDefault();
		var id = $(this).attr('href');
		$(this).parent().addClass('active').parent().find('li').not($(this).parent()).removeClass('active');
		boddy.each(function(){
			$(this).hide();
		});
		$(body+id).show();
		$('body, html').animate({scrollTop:($(body+id).offset().top-150)});
	});
}
$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};
$(document).ready(function() {

	// $('.toggleBtn').click(function(e){
	// 	e.preventDefault();
	// 	var target = $(this).attr('href');
	// 	if ($(target).length) {
	// 		if ($(this).hasClass('active')) {
	// 			$(this).removeClass('active');
	// 			$(target).hide();
	// 		}else{
	// 			$(this).addClass('active');
	// 			$(target).show();
	// 			hideTarget(target, $(this));
	// 		}
	// 	}
	// 	return false;
	// });

	// function hideTarget(target, btn){
	// 	$(document).click(function(event) {
	// 		console.log($(event.target));
	// 	    if (!$(event.target).is(target)) {
	// 	        $(target).hide();
	// 	        btn.removeClass('active');
	// 	    }
	// 	});
	// }

	// $('.specialViewBtn').click(function(e){
	// 	e.preventDefault();
	// 	$('body').toggleClass('opened-special-view');
	// 	$('body').removeClass('operand-mob-nav');
	// });

	// $('.specialViewCloseBtn, .submitSpecialView').click(function(e){
	// 	e.preventDefault();
	// 	$('#mask').click();
	// });

	$('#mask').click(function(){
		$(this).removeAttr('style');
		$('body').removeClass('opened-special-view');
		$('body').removeClass('operand-mob-nav');
		$('body').removeClass('openedSearchBlock');
		return false;
	});
		
	$('img.svg').each(function(){
	    var $img = $(this);
	    var imgID = $img.attr('id');
	    var imgClass = $img.attr('class');
	    var imgURL = $img.attr('src');

	    $.get(imgURL, function(data) {
	        // Get the SVG tag, ignore the rest
	        var $svg = $(data).find('svg');

	        // Add replaced image's ID to the new SVG
	        if(typeof imgID !== 'undefined') {
	            $svg = $svg.attr('id', imgID);
	        }
	        // Add replaced image's classes to the new SVG
	        if(typeof imgClass !== 'undefined') {
	            $svg = $svg.attr('class', imgClass+' replaced-svg');
	        }

	        // Remove any invalid XML tags as per http://validator.w3.org
	        $svg = $svg.removeAttr('xmlns:a');

	        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
	        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
	            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
	        }

	        // Replace image with new SVG
	        $img.replaceWith($svg);

	    }, 'xml');

	});

	$('.mainBannersSlider').owlCarousel({
	    items: 1,
	    loop: true,
		dots: true,
		nav: false,
	    autoHeight: false,
		smartSpeed: 800,
		autoplay: true,
		autoplayTimeout: 5000,
	});

	$('.sliderSites').owlCarousel({
	    items: 3,
	    loop: true,
		dots: false,
		navText: [
			'<i class="icon-dots-arrow-left"></i>',
			'<i class="icon-dots-arrow-right"></i>'
		],
		nav: true,
	    autoHeight: false,
		smartSpeed: 800,
		responsive: {
			0:{
				items: 1
			},
			605:{
				items: 2
			},
			1005:{
				items: 3
			}
		},
	});

	$(window).scroll(function(){
		var headerHeight = $('.header').height();
		if ($(this).scrollTop() >= headerHeight) {
			$('.topHeaderWrap').addClass('fixed');
		}else{
			$('.topHeaderWrap').removeClass('fixed');
		}
	});

	$('.btnNav').click(function(e){
		e.preventDefault();
		$('body').removeClass('opened-special-view');
		$('body').toggleClass('operand-mob-nav');
	});

	$('#mobMainNav .headerNav li ul').parent().find('>a').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parent().find('>ul').stop().slideToggle();
	})

	$('#searchBtn').click(function(e){
		e.preventDefault();
		$('body').addClass('openedSearchBlock');
	});
	$('#closeSearch').click(function(e){
		e.preventDefault();
		$('body').removeClass('openedSearchBlock');
	});

	$('#sideNavTabs').tabs('.contentItem');
	$('.servicesTabsNav').tabs('.servicesTabsBody');

	$('.jq-datapicker').datepicker({
        format: "dd.mm.yyyy",
        language: "ru",
        autoclose: true,
        todayHighlight: true,
        orientation: "bottom auto"
    });

	$('.bannerButtons a').click(function(e){
		var block = $(this).attr('href');
		if ($(block).length) {
			e.preventDefault();
			$('body').addClass('openModalPage');
			$(block).show();
		}
	});

	$('.closeModalPage').click(function(e){
		e.preventDefault();
		$(this).parents('.modalPage').hide();
		$('body').removeClass('openModalPage');
	})

	// $(window).on('load',function(){
	// 	$(window).on('scroll resize',function(){
	// 		var top = $('#header').height();
	// 		var maxH = ($(window).height()-top);
	// 		$('.subMenu').css({maxHeight:maxH+'px'});
	// 	})
	// })

	$(window).on('load',function(){
		$('.headerNav ul li').each(function(){
			var subMenu = $(this).find('.subMenu');
			if (subMenu.length > 0) {
				var left = ($(this).offset().left - $(this).parents('.headerNav').offset().left);
				subMenu.find('.subMenuNav').css({marginLeft: left+'px'});
			}
		})
	})
	$('.headerNav ul li').hover(function(){
		var subMenu = $(this).find('.subMenu');
		if (subMenu.length > 0) {
			var left = ($(this).offset().left - $(this).parents('.headerNav').offset().left);
			subMenu.find('.subMenuNav').css({marginLeft: left+'px'});
		}
	})

	$('.personalBlock .js-toggleLinks a').click(function(e){
		e.preventDefault();
		var block = $(this).attr('href');
		block = $(this).parents('.personalBlock').find(block);
		$('.personalBiography').not(block).stop(true).slideUp(200);
		block.stop(true).slideToggle(200);
	})

	$('.headerNav li .subMenu').prev('a').hover(function(){
		$(this).parents('li').find('.subMenu').show();
	},function(){
		$('.subMenu ul').hover(function(){
			$(this).parents('.subMenu').show();
		},function(){
			$(this).parents('.subMenu').hide();
		})
	})
	$('.headerNav li').mouseleave(function(){
		$(this).find('.subMenu').hide();
	})

	$('.specialViewModalBtn').click(function(){
		$('.specialViewModalWrap').addClass('opened');
	});
	$('.specialViewCloseBtn, .specialViewModalMask, .submitSpecialView, .resetSpecialView').click(function(e){
		e.preventDefault();
		$('#mask').click();
		$('.specialViewModalWrap').removeClass('opened');
	});


})