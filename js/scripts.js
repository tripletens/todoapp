$(document).ready(function() {
         
		//  function parallaxScroll(){
		// 	var scrolled = $(window).scrollTop();
		// 	$('#parallax-bg1').css('top',(0-(scrolled*.25))+'px');
		// 	$('#parallax-bg2').css('top',(0-(scrolled*.5))+'px');
		// 	$('#parallax-bg3').css('top',(0-(scrolled*.75))+'px');
		// }
		 	
		// $('#contact').click(function(){
		// 	$('html, body').animate({
		// 		scrollTop:$('.contact').offset().top-70
		// 	}, 1000, function() {
		// 		parallaxScroll(); // Callback is required for iOS
		// 	});
		// 	$('.active').removeClass('active');
		// 	$(this).parent().addClass("active");
		// 	return false;
		// });
		 
		var top = document.getElementsByTagName('nav').innerHeight ;
		var browserheight =  window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
			console.log("it is " + browserheight + "top :" + top );
	});