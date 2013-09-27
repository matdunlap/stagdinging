/*Set the following variables*/
var instaUserName       = "Stagdining";
var instaUserID         = "54330142";    //Lookup your numeric user id here: http://jelled.com/instagram/lookup-user-id
var instaClientID       = "e60a5d35fcc6400b8a2270a2f88b4577";          //Obtain an instagram client ID from http://instagram.com/developer/
var instaRedirectURI    = "http://dinestag.com/instafollow-redirect-uri.html";       //Should point to the location of "instagram-follow-redirect-uri.html"


$(function(){
$("#instaFollow").click(function(){instaFollowClick(instaClientID, instaRedirectURI);});
});

function instaFollowClick(id, uri){
    window.open ("https://instagram.com/oauth/authorize/?client_id="+id+"&redirect_uri="+uri+"&response_type=token&scope=relationships","mywindow","menubar=1,resizable=1,width=500,height=400");
}

function instaFollowRequest(id, username){
    if(window.location.hash) {
        $('#response').html('<h4>You are now following '+username+'!</h4>');
        var hash = window.location.hash.substring(1);
        var regexp = /=(.*)/g;
        var token = regexp.exec(hash);
        $.post("https://api.instagram.com/v1/users/"+id+"/relationship?callback=?",{action: 'follow',access_token:token[1]}, "json");
    }
}



  
$(document).ready(function() {
    $("a.anchorLink").anchorAnimate()
});

jQuery.fn.anchorAnimate = function(settings) {

 	settings = jQuery.extend({
		speed : 1100
	}, settings);	
	
	return this.each(function(){
		var caller = this
		$(caller).click(function (event) {	
			event.preventDefault()
			var locationHref = window.location.href
			var elementClick = $(caller).attr("href")
			
			var destination = $(elementClick).offset().top;
			$("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination}, settings.speed, function() {
				window.location.hash = elementClick
			});
		  	return false;
		})
	})
}

    	$(document).ready(function() {
			$('.fancybox').fancybox();	
		});



	$(window).load(function() {
if( $(window).width() > 768 ) {
        
        if ($('#primary #content').height() > $('#secondary').height())
			$('#secondary').height($('#primary #content').height());
	
	$(window).resize(function() {
		if ($('#primary #content').height() > $('#secondary').height())
			$('#secondary').height($('#primary #content').height());
	});	

}

});
	
	
	
