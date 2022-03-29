$(document).ready(function() {
	$('#print').click(function(e) {
		e.preventDefault();
		window.print();
	})

	$(function(){
		setTimeout(function(){
			$('.alert').slideUp(200,function(){
				$(this).remove();
			})
		},5000);
	});

	if ($('.fancybox').length > 0) {
	  $('.fancybox').fancybox({
	      openEffect : 'elastic',
	      openSpeed  : 150,

	      closeEffect : 'elastic',
	      closeSpeed  : 150,

	      padding: 0,
	      margin: 30,
	  });
	};

	$('.staticPageContent a').each(function(){
		var href = $(this).attr('href');
		var search = String(href).search("/uploads/filemanager/");
		if (search >= 0) {
			$(this).fancybox({
		      openEffect : 'elastic',
		      openSpeed  : 150,

		      closeEffect : 'elastic',
		      closeSpeed  : 150,

		      padding: 0,
		      margin: 30,
		  });
		}
	})

	$(".staticPageContent table").each(function(e){
		$(this).wrap("<div class='tableWrap'></div>");
	});

})