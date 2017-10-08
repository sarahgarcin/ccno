$(document).ready(function(){
	$(document).foundation();

	init();

});

function init(){

	$(window).scroll(function(){
    $(".hide-on-scoll").css("opacity", 1 - $(window).scrollTop() / 250);
  });

	$('.menu-btn').on('click', function(){
		$('header').fadeIn(400);
		setTimeout(function(){
			$('header').addClass('active');
		}, 400);
	});
	$('.siteName').on('click', function(){
		
		$('header').removeClass('active');
		setTimeout(function(){
			$('header').fadeOut(400);
		}, 400);
	});

	if($('main').data('color')){
		var color = $('main').data('color');
		$('body').css({
			"background": color
		});
	}

	if($("body").attr("data-template")=="home"){
		var mainH = $('main').height() - 150;
		var windowW = $('main').width() - 200;
		$(".icone-wrapper").each(function(){
			var randomX = Math.random() * (windowW - 200);
			var randomY = Math.random() * (mainH - 200);
			console.log(randomX, randomY);
			$(this).css({
				"top": randomY,
				"left": randomX
			});
		});

	}

	if($("body").attr("data-template")=="actu"){
		var str = $('main .text').html();
		str = str.split('<hr>');
		$('main .text').html(str[0]);
		for(var i = 1; i < str.length; i++){
			$('main .text').append(
			'<div class="prog">' + 
			   str[i] + 
			'</div>');
		}

		$(".prog h3, .prog h4").on('click', function(){
			console.log($(this).parent('.prog').find('p'));
			$(this).parent('.prog').find('p').slideToggle(400);
		});

	}

	if($("body").attr("data-template")!="home"){
		var mainH = $('main').height();
		var windowW = $('.text').width();
		$(".picto-wrapper").each(function(){
			var randomX = Math.random() * (windowW - 100);
			var randomY = Math.random() * (mainH - 100);
			$(this).css({
				"top": randomY,
				"left": randomX
			});
		});
	}


	if($("body").attr("data-template")=="list"){
		$(".liste-module .liste-element").on('click', function(){
			$(this).next('.liste-text').slideToggle(400);
		});
	}

	if($("body").attr("data-template")=="accueils"){
		$(".accueils-module .accueils-element").on('click', function(){
			$(this).next('.accueils-text').slideToggle(400);
		});
	}



}
