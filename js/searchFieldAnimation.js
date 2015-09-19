/**
 * Created by Rafal on 2015-09-19.
 */

$('.searchField').focus(function() {
    $('.search').animate({width: '450px'});
});
$('.searchField').blur(function() {
    $('.search').animate({width: '150px'});
});