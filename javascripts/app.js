$(document).ready( function(){
    
    /**
    * Social Float
    **/
    var $ul_social = $('.social_share');
    var ul_social_top = $ul_social.offset().top;

    $(window).scroll(sticky_social);

    function sticky_social(){
        if ( $('.social_share').length > 0 ) {

            var windowTop = $(window).scrollTop();            

            if ( ul_social_top < windowTop ){
                $ul_social.addClass('fixed');
                // $ul_social.width($ul_social.parent().width());
            }else {
                $ul_social.removeClass('fixed');
            }

        }  
    };

    /**
    * Share links
    **/
    var $social_links= $('.social_share li a');
    $social_links.on('click', function(e){
        e.preventDefault();
        popitup($(this).attr('href'));
    });

    function popitup(url) {
        newwindow=window.open(url,'Share','height=300,width=500');
        if (window.focus) {newwindow.focus()}
        return false;
    }
    
});