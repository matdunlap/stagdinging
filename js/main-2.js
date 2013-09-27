$(document).ready( function(){

	$('#show_menu').on("click", function(e){
		e.preventDefault();
		$('.event-menu').animate({"height": "toggle", "opacity": "toggle"}, "slow");
	});
	
		$('#choose-gallery').on("click", function(e){
					e.preventDefault();
					$('#tags').animate({"height": "toggle", "opacity": "toggle"}, "slow");
				});
	
});
