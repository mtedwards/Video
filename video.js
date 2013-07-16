$(document).ready(function () {
	if($('.videos').length){
		$(function(){
			thumbs = $('.videos li a');
			vid = $(thumbs).first().data("vid");
			$('.video-object iframe').attr('src',vid);
			$(thumbs).click(function(){
			  vid = $(this).data("vid");
			  $('.video-object iframe').attr('src',vid);
			  return false;
			});
		});
	}
});