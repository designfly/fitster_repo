/**
 * Created by Rafal on 2015-09-20.
 */

(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.4";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

jQuery(function($) {
        $(".col-md-6").mouseout(function() {$(".fb_iframe_widget").css('z-index','-2'); });
        $(".col-md-6").mouseover(function() {$(this).find(".fb-like").css('z-index','2'); });
});

