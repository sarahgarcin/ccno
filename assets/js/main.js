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

	$('#gcaptcha').css('transform', 'scale(1)');

	var randomTop = Math.floor(Math.random()* (window.innerHeight-100));
	var randomLeft = Math.floor(Math.random()* (window.innerWidth-100));
	$('.flottant').css({
		'top': randomTop,
		'left': randomLeft
	})
	.draggable();


	//mobile menu functions
	$('.mobile-menu_btn').on('click', function(){
		if($('.nav').hasClass('active')){
			$('.nav').slideUp(500);
			$('.nav').removeClass('active');
			// $('.nav').fadeOut(500);
			// setTimeout(function(){
			// 	$('.nav').removeClass('active');
			// }, 100);
		}
		else{
			$('.nav').slideDown(500);
			$('.nav').addClass('active');
			// $('.nav').fadeIn(500);
			// setTimeout(function(){
			// 	$('.nav').addClass('active');
			// }, 100);
		}

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
	$('.main-nav_first-level > li').on('click', function(e){
		if($(this).hasClass('active') && $(this).find('ul').hasClass('active')){
			// $(this).removeClass('active').find('ul').slideUp(400);
			// $(this).find('ul').removeClass('active');
			$(this).removeClass('active');
			$(this).find('ul').removeClass('active');
		}else{
			// $('.main-nav_first-level > li').removeClass('active').find('ul').slideUp(400);
			// $(this).addClass('active').find('ul').slideDown(400).addClass('active');
			$('.main-nav_first-level > li').removeClass('active').find('ul').removeClass('active');
			$(this).addClass('active')
			$(this).find('ul').addClass('active');
		}
		
	});

	$('.menu-top-list > li').on('click', function(e){
		if($(this).hasClass('active') && $(this).find('ul').hasClass('active')){
			$(this).removeClass('active').find('ul').slideUp(400);
			$(this).find('ul').removeClass('active');
			// $(this).removeClass('active');
			// $(this).find('ul').removeClass('active');
		}else{
			$('.menu-top-list > li').removeClass('active').find('ul').slideUp(400);
			$(this).addClass('active').find('ul').slideDown(400).addClass('active');
			// $('.menu-top-list > li').removeClass('active').find('ul').removeClass('active');
			// $(this).addClass('active')
			// $(this).find('ul').addClass('active');
		}
		
	});


	$('.open-newsletter-form').on('click',function(){
		console.log('open newsletter');
		$('.modal-newsletter').css('display', 'block').addClass('active');
		$(window).on('click', function(e){
			if(e.target == $('.modal-newsletter')[0]){
				$('.modal-newsletter').css('display', 'none').removeClass('active');
				$('.open-newsletter-form').removeClass('active');
			}
		});
	});

	$('.close-modal').on('click',function(){
		console.log('close newsletter');
		$('.modal-newsletter').css('display', 'none').removeClass('active');
		$('.modal-alert').css('display', 'none');
		$('.module--menu--mainNav .menu-top-list > .open-newsletter-form').removeClass('active');
	});


	// $('.tablet-close-menu-button').on('click', function(){
	// 	$('header').fadeOut(100);
	// 	setTimeout(function(){
	// 		$('header').removeClass('active');
	// 	}, 100);
	// });

	if(/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		initMobile();
	}

	if(!/Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {

	}

	// ----

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

	if($("body").attr("data-template")=="jgm"){
		var outlinecolor = $('.main-content').attr('data-fontcolor');
		console.log(outlinecolor);
		$('.main-content h1').css('text-shadow', '-1px -1px 0 '+outlinecolor+', 1px -2px 0 '+outlinecolor+', -1px 1px 0 '+outlinecolor+', 3px 1px 0 '+outlinecolor+'')
	}

	// console.log($(window).width());
	// if($(window).width() > 720){
	// 	$('.list-with-images li a').mouseenter(function() {
	// 		$(this).parent('li').find('.thumb-wrapper').show();
	// 	});
	// 	$('.list-with-images li a').mouseleave(function() {
	// 		$(this).parent('li').find('.thumb-wrapper').hide();
	// 	});
	// }

	// $(window).resize(function(){
	// 	if($(window).width() > 720){
	// 		$('.list-with-images li a').mouseenter(function() {
	// 			$(this).parent('li').find('.thumb-wrapper').show();
	// 		});
	// 		$('.list-with-images li a').mouseleave(function() {
	// 			$(this).parent('li').find('.thumb-wrapper').hide();
	// 		});
	// 	}
	// });

	//AGENDA
	$('.click---past-events').on('click', function(){
		if(!$(this).hasClass('active')){
			insertParam('events', 'past');
		}
	});

	$('.title--next-events').on('click', function(){
		if(!$(this).hasClass('active')){
			insertParam('events', 'next');
		}
	});

	if($("body").attr("data-template")=="agenda"){
		if(window.location.search.indexOf('events=next') > -1){
			console.log($('.agenda-next'));
			$('.agenda-next').addClass('active');
			if(!$('.title--next-events').hasClass('active')){
				$('.pastEvents-wrapper').hide();
				$('.nextEvents').show();
				$('.title--next-events').addClass('active');
				$('.click---past-events').removeClass('active');
				$('.title--next-events').hide();
			}
		}
		if(window.location.search.indexOf('events=past') > -1){
			$('.agenda-past').addClass('active');
			if(!$('.click---past-events').hasClass('active')){
				$('.pastEvents-wrapper').show();
				$('.nextEvents').hide();
				$('.click---past-events').addClass('active');
				$('.title--next-events').removeClass('active');
				$('.click---past-events').html('Rendez-vous passés');
				$('.title--next-events').css("display", "inline-block");
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
	  adaptiveHeight: true,
	  prevArrow: '<button type="button" class="slick-prev"><</button>',
	  nextArrow: '<button type="button" class="slick-next">></button>'
	});

}

function initMobile(){
	$(window).load(function(){
		if($("body").attr("data-template")!="home"){
			$('.address').fadeIn(600);
		}
	});

	if($("body").attr("data-template")=="home"){
		setTimeout(function(){
			$('.address').fadeIn(1000);
		}, 5000);
		$('.big-image-wrapper').on('click', function(){
			$('.address').fadeIn(1000);
		});
	}

	// ----
	// $(window).on('load', function(){
	// 	var headerH = $('.header-mobile').outerHeight();
	// 	var navH = $('.module--navigation-in-page').outerHeight();
	// 	//console.log(headerH + navH);
	// 	$('main').css({
	// 		'padding-top': headerH+navH+'px'
	// 	});
	// });


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
