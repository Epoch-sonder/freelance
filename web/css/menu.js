var winWidth = $(window).width();
dropdownMenu(winWidth);

$(window).on('resize', function(){
    dropdownMenu(winWidth);

});

// Circular Progress Bar

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

            if($(this).attr('href') == '#') return false;
            if($(this).hasClass('mouseover')){ $(this).removeClass('mouseover'); }
            else{ $(this).addClass('mouseover'); }
            return false;
        });
    }

}
