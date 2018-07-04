$(document).ready(function(){
	$(document).foundation();

	init();

});

function init(){
	console.log('ready');
	$(window).load(function(){
		$('main').fadeIn(600);
		$('.left-col').fadeIn(600);
	});


	


	//mobile menu functions
	$('.menu-mobile-btn').on('click', function(){
		$('header').fadeIn(100);
		setTimeout(function(){
			$('header').addClass('active');
		}, 100);
	});

	// $('.close-menu-button').on('click', function(){
	// 	$('header').fadeOut(100);
	// 	setTimeout(function(){
	// 		$('header').removeClass('active');
	// 	}, 100);
	// });

	// $('.menu-btn').on('click', function(){
	// 	$('header').fadeIn(100);
	// 	setTimeout(function(){
	// 		$('header').addClass('active');
	// 	}, 100);
	// });
	$('.module--menu--mainNav .menu-top-list > li').on('click', function(e){
		console.log($(this));
		if($(this).hasClass('active') &&$ (this).find('ul').hasClass('active')){
			$(this).removeClass('active').find('ul').slideUp(400);
			$(this).find('ul').removeClass('active');
		}else{
			$('.module--menu--mainNav > ul > li').removeClass('active').find('ul').slideUp(400);
			$(this).addClass('active').find('ul').slideDown(400);
			$(this).find('ul').addClass('active');
		}
		
	});

	$('.tablet-close-menu-button').on('click', function(){
		$('header').fadeOut(100);
		setTimeout(function(){
			$('header').removeClass('active');
		}, 100);
	});

	if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		initMobile();
	}

	if(!/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		// opacity menu on scroll
		// $(window).scroll(function(){
	 //    $(".hide-on-scoll").css("opacity", 1 - $(window).scrollTop() / 250);
	 //  });

		//calcule le padding du main
		// $(window).on('load', function(){
		// 	if($("body").attr("data-template")!="home" && $("body").attr("data-template")!="menu"){
		// 	  var breadH = $('.breadcrumb').outerHeight();
		// 		var subH = $('.submenu').outerHeight();
		// 		$('main').css({
		// 			'padding-top': breadH+subH+30+'px'
		// 		})
		// 	}
		// });
			// show / hide menu on click 
			// $('.menu-btn').on('mouseenter', function(){
			// 	$('header').fadeIn(100);
			// 	setTimeout(function(){
			// 		$('header').addClass('active');
			// 	}, 100);
			// });

			//$('.siteName').on('click', function(){
			// $('header').on('mouseleave', function(){
			// 	$('header').removeClass('active');
			// 	setTimeout(function(){
			// 		$('header').fadeOut(100);
			// 	}, 100);
			// });
			// ----


		//random position of icons on home page 
		if($("body").attr("data-template")=="home"){
			setTimeout(function(){
				$('.big-image-wrapper').fadeOut(600);
				$('.col-wrapper').fadeIn(1000);
			}, 5000);
			$('.big-image-wrapper').on('click', function(){
				$('.big-image-wrapper').fadeOut(600);
				$('.col-wrapper').fadeIn(1000);
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
		if(!$(this).hasClass('active')){
			insertParam('events', 'past');
		}
	});

	$('.title--next-events').on('click', function(){
		if(!$(this).hasClass('active')){
			insertParam('events', 'next')
		}
	});

	if($("body").attr("data-template")=="agenda"){
		if(window.location.search.indexOf('events=next') > -1){
			console.log($('.agenda-next'));
			$('.agenda-next').addClass('active');
			if(!$('.title--next-events').hasClass('active')){
				$('.pastEvents-wrapper').slideToggle(400);
				$('.nextEvents').slideToggle(400);
				$('.title--next-events').addClass('active');
				$('.click---past-events').removeClass('active');
			}
		}
		if(window.location.search.indexOf('events=past') > -1){
			$('.agenda-past').addClass('active');
			if(!$('.click---past-events').hasClass('active')){
				$('.pastEvents-wrapper').slideToggle(400);
				$('.nextEvents').slideToggle(400);
				$('.click---past-events').addClass('active');
				$('.title--next-events').removeClass('active');
			}
		}
		// Trier par tags
		$('.tags li').on('click', function(){
			$tag = $(this).attr('class');
			if($tag == 'all'){
				$('table').css('display', 'table');
				$('.tags li').removeClass('active');
				$(this).addClass('active');
			}
			else{
				if($(this).hasClass('active')){
					$('table').css('display', 'table');
					$(this).removeClass('active');
					$('.tags li.all').addClass('active');
				}
				else{
					$('.tags li').removeClass('active');
					$(this).addClass('active');
					$('table').css('display', 'none');
					$('table.'+$tag).css('display', 'table');
				}

			}

		});
	}


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

function insertParam(key, value){
  key = encodeURI(key); value = encodeURI(value);
  var kvp = document.location.search.substr(1).split('&');
  var i=kvp.length; var x; while(i--) {
    x = kvp[i].split('=');

    if (x[0]==key){
      x[1] = value;
      kvp[i] = x.join('=');
      break;
    }
  }
  if(i<0) {kvp[kvp.length] = [key,value].join('=');}
  //this will reload the page, it's likely better to store this until finished
  document.location.search = kvp.join('&'); 
}
