$(document).ready(function(){
	$(document).foundation();

	init();

});

function init(){

	if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		initMobile();
	}

	if(!/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		// opacity menu on scroll
		$(window).scroll(function(){
	    $(".hide-on-scoll").css("opacity", 1 - $(window).scrollTop() / 250);
	  });

		//calcule le padding du main
		$(window).on('load', function(){
			if($("body").attr("data-template")!="home"){
			  var breadH = $('.breadcrumb').outerHeight();
				var subH = $('.submenu').outerHeight();
				$('main').css({
					'padding-top': breadH+subH+30+'px'
				})
			}
		});
			// show / hide menu on click 
			$('.menu-btn').on('mouseenter', function(){
				$('header').fadeIn(100);
				setTimeout(function(){
					$('header').addClass('active');
				}, 100);
			});

			//$('.siteName').on('click', function(){
			$('header').on('mouseleave', function(){
				$('header').removeClass('active');
				setTimeout(function(){
					$('header').fadeOut(100);
				}, 100);
			});
			// ----


		//random position of icons on home page 
		if($("body").attr("data-template")=="home"){
			var mainH = $('main').height() - 150;
			var windowW = $('main').width() - 100;
			$(".icone-wrapper").each(function(){
				var randomX = Math.random() * (windowW - 100);
				var randomY = Math.random() * (mainH - 100);
				console.log(randomX, randomY);
				$(this).css({
					"top": randomY,
					"left": randomX
				});
			});
		}
		// ----

	}

	// ----


	// color of background
	if($('main').data('color')){
		var color = $('main').data('color');
		$('body').css({
			"background": color
		});
	}
	// ----

	// Sépare la page à partir des hr et cache une partie
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
	// ----

	// Random position of picto sur toutes les pages qui ne sont pas la home
	if($("body").attr("data-template")!="home"){
		var mainH = $('main').height();
		if(mainH < $(window).height()){
			mainH = $(window).height();
		}
		var windowW = $('.icones-wrapper-text').width();
		$(".picto-wrapper").each(function(){
			var randomX = Math.random() * (windowW - 100);
			var randomY = Math.random() * (mainH - 100);
			$(this).css({
				"top": randomY,
				"left": randomX
			});
		});
	}

	// Ouvre les éléments sur la page liste
	if($("body").attr("data-template")=="list"){
		$(".liste-module .liste-element").on('click', function(){
			$(this).next('.liste-text').slideToggle(400);
		});
	}

	// Ouvre les éléments sur la page accueils studio
	if($("body").attr("data-template")=="accueils"){
		$(".accueils-module .accueils-element").on('click', function(){
			$(this).next('.accueils-text').slideToggle(400);
		});
	}

	$('.creations li a').mouseenter(function() {
		$(this).parent('li').find('.thumb-wrapper').show();
	});
	$('.creations li a').mouseleave(function() {
		$(this).parent('li').find('.thumb-wrapper').hide();
	});

	//AGENDA
	$('.click---past-events').on('click', function(){
		$('.pastEvents-wrapper').slideToggle(400);
		$('.nextEvents').slideToggle(400);
		$(this).toggleClass('active');
		$('.title--next-events').toggleClass('active');
	});

	$('.title--next-events').on('click', function(){
		$('.pastEvents-wrapper').slideToggle(400);
		$('.nextEvents').slideToggle(400);
		$(this).toggleClass('active');
		$('.click---past-events').toggleClass('active');
	});

	//init slider
	$('.slider').slick({  
		dots: true,
	  infinite: true,
	  speed: 300,
	  slidesToShow: 1,
	  prevArrow: '<button type="button" class="slick-prev"><</button>',
	  nextArrow: '<button type="button" class="slick-next">></button>'
	});

}

function initMobile(){

	$('.menu-mobile-btn').on('click', function(){
		$('header').fadeIn(100);
		setTimeout(function(){
			$('header').addClass('active');
		}, 100);
	});

	$('.close-menu-button').on('click', function(){
		$('header').fadeOut(100);
		setTimeout(function(){
			$('header').removeClass('active');
		}, 100);
	});

	$('.menu-btn').on('click', function(){
		$('header').fadeIn(100);
		setTimeout(function(){
			$('header').addClass('active');
		}, 100);
	});

	$('.tablet-close-menu-button').on('click', function(){
		$('header').fadeOut(100);
		setTimeout(function(){
			$('header').removeClass('active');
		}, 100);
	});

	//random position of icons on home page 
	if($("body").attr("data-template")=="home"){
		var mainH = $('main').height()-50;
		var windowW = $('main').width();
		$(".icone-wrapper").each(function(){
			var randomX = Math.random() * (windowW - 100);
			var randomY = Math.random() * (mainH - 80);
			console.log(randomX, randomY);
			$(this).css({
				"top": randomY,
				"left": randomX
			});
		});
	}
	// ----
	$(window).on('load', function(){
		var headerH = $('.header-mobile').outerHeight();
		var navH = $('.module--navigation-in-page').outerHeight();
		//console.log(headerH + navH);
		$('main').css({
			'padding-top': headerH+navH+'px'
		})
	});


}
