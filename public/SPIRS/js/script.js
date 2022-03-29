$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

function select2() {
    $('.js-select-2').each(function(){
        if (!$(this).hasClass('select2-hidden-accessible')) {
            $(this).select2();
        }
    })
}

function select2Countries() {
    var countriesForSelect2 = [];
    countries.forEach(function(country){
        countriesForSelect2.push({
            id:country.ru,
            text:country.ru,
        });
    })
    $('.js-select-2-countries').each(function(){
        if (!$(this).hasClass('select2-hidden-accessible')) {
            $(this).select2({
                data: countriesForSelect2,
            });
        }
    })
}

function showModal(modal) {
        modal.fadeIn();
        $('body').addClass('openModal');
    }
function hideModal(modal) {
    modal.fadeOut();
    $('body').removeClass('openModal');
}

function enjoyhint(enjoyhint_script_steps) {
    //initialize instance
    var enjoyhint_instance = new EnjoyHint({});

    //simple config. 
    //Only one step - highlighting(with description) "New" button 
    //hide EnjoyHint after a click on the button.
    //set script config
    enjoyhint_instance.set(enjoyhint_script_steps);

    //run Enjoyhint script
    enjoyhint_instance.run();
}

function combodate() {
    $('.combodate').each(function(){
        if ($(this).css('display') != 'none') {
            $(this).combodate({
                maxYear: (new Date()).getFullYear(),
                format: 'DD MM YYYY',
                template: 'DD MM YYYY',
            });
        }
    })
}

function phoneFormat() {
    $('.jq-phone-mask').each(function(){
        if (!$(this).hasClass('jq-phone-mask-inited')) {
            $(this).addClass("jq-phone-mask-inited");
            $(this).inputmask("00 000 00 00");
        }
    })
}

$(document).ready(function() {

	select2();
    select2Countries();
    combodate();
    phoneFormat();

    // enjoyhint([
    //   {
    //     'next .logo' : 'Click the "New" button to start creating your project',
    //     'showSkip' : false,
    //     "selector": ".logo",
    //     "event_type": "next",
    //     "description": "Choose issue type by selecting one or more labels"
    //   },{
    //     selector: ".langs",
    //     event: "next",
    //     description: "Choose issue type by selecting one or more labels"
    //   }
    // ])

	$('a, button').click(function(e){
		if ($(this).hasAttr('data-modal')) {
			e.preventDefault();
			var modal = $(this).attr('data-modal');
			if ($(modal).length > 0) {
                showModal($(modal));
			}else{
				console.log('Объект не найден!')
			}
		}
	});

    $('.modalWindowMask, .modalWindowClose').click(function(){
        hideModal($(this).parents('.modalWindow'));
    });

    $(document).keyup(function(e) {
        if (e.keyCode == 27) {
            hideModal($('.modalWindow'));
        }
    });

});