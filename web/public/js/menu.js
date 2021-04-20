
(function ($) {

	$('a[href="#!"]').on('click', function(event){
		event.preventDefault();
		return false;
		return;
	});

	$('[data-nav-menu]').on('click', function(event){

		var $this = $(this),
			visibleHeadArea = $this.data('nav-menu');

		$(visibleHeadArea).toggleClass('visible');

	});



})(jQuery);

var winWidth = $(window).width();
dropdownMenu(winWidth);


function dropdownMenu(winWidth){

	if(winWidth > 767){

		$('.main-menu li').on('mouseover', function(){
			var $this = $(this),
				menuAnchor = $this.children('a');

			menuAnchor.addClass('mouseover');

		}).on('mouseleave', function(){
			var $this = $(this),
				menuAnchor = $this.children('a');

			menuAnchor.removeClass('mouseover');
		});

	}else{

		$('.main-menu li > a').on('click', function(){


			if($(this).hasClass('mouseover')){ $(this).removeClass('mouseover'); }
			else{ $(this).addClass('mouseover'); }

		});
	}

}
