/**
 * Created by Rafal on 2015-09-19.
 */


jQuery.noConflict();
$('.searchField input').click(function() {
    $('.second-level .searchField input').animate({width: '450px'});
    $('.second-level .searchField select').css('visibility','visible');
});
jQuery.noConflict();
$('.navbar').mouseleave(function() {
    $('.second-level .searchField input').animate({width: '130px'});
    $('.second-level .searchField select').css('visibility','hidden');
});
jQuery.noConflict();
