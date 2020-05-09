$(document).ready(function()
{
$('.left, .content input, .content textarea, .content select').focus(function(){
$(this).parents('.row').addClass("over");
}).blur(function(){
$(this).parents('.row').removeClass("over");
});
});