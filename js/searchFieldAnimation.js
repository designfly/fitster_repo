/**
 * Created by Rafal on 2015-09-19.
 */

$('.searchField button').mouseover(function() {
    $('.second-level .searchField input').animate({width: '450px'});
    $('.second-level .searchField select').css('visibility','visible');
});
$('.navbar').mouseleave(function() {
    $('.second-level .searchField input').animate({width: '0px'});
    $('.second-level .searchField select').css('visibility','hidden');
});
