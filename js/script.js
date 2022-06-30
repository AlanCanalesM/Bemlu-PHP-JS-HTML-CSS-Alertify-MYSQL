$(document).ready(function(){

	$("#banner").css({"height": $(window).height() + "px"});

	var flag = false;
	var scroll;

	$(window).scroll(function(){

		scroll = $(window).scrollTop();


		if (scroll > 250 ) {

			if (!flag) {


				$("#logo").css({"margin-top": "-5px", "width": "50px", "height": "50px"});
				$("header").css({"background-color": "#FFFF"});
				$("a").css({"color": "#000000"});
				$("#set").css({"display": "none"});
				$("#set2").css({"display": "none"});
				$("#set3").css({"display": "none"});
			





				flag = true;
		}

			
		}

		else{

			if (flag) {

				$("#logo").css({"margin-top": "150px", "width": "250px", "height": "250px"});
				$("header").css({"background-color": "transparent"});
				$("a").css({"color": "#F3F3F3"});
				$("#set").css({"display": "block"});
				$("#set2").css({"display": "block"});
				$("#set3").css({"display": "block"});


				flag = false;
			}

			
		}
	})
});