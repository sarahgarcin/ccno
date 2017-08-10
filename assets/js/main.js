var windowW = $(window).width();
var windowH = $(window).height();

$(document).ready(function(){
	$(document).foundation();

	init();

});

function init(){

	console.log('INIT');

  $.pjax.defaults.timeout = 2000;

	$('.module--menu--mainNav > ul > li').on('click', function(){
		if($(this).hasClass('sub-open')){
			$(this).find('.module--menu--submenu').slideUp(600);
			$(this).removeClass('sub-open');
		}
		else {
			$('.module--menu--mainNav ul > li').find('.module--menu--submenu').slideUp(600);
			$('.module--menu--mainNav ul > li').removeClass('sub-open');
			$(this).find('.module--menu--submenu').slideDown(600);
			$(this).addClass('sub-open');
		}
	});
	var elementsHome = {
		//element1: $("nav"), 
	};
	$(".icone-wrapper").amac(elementsHome, 100);

	$('.module--menu--submenu a').on('click', function() {
		// var r = $t.data('rubrique');
	 //  $('body').attr('data-rubrique', r);
	 event.preventDefault();
	 //  closeMenu();
	  var url = $(this).attr('href');
	  loadInPjax(url);
	});

	$(document).on('pjax:success', function (e) {
    	$('body').removeClass('is--loading');

    	console.log('finish loading');
	});
  $(document).on('pjax:end', function(event, content) {
  	console.log('end loading', content);
    // closeMenu();
    var r = $(event.target).find('meta').data('rubrique');
    //$('li[data-rubrique='+r+']').find('.module--menu--submenu').hide();
    $('li').removeClass('is--active').removeClass('active--rubrique');
    $('.module--menu--submenu').slideUp(100);
    $('body').attr('data-rubrique', r);
    $('li[data-rubrique='+r+']').addClass('active--rubrique');
    
    var position = $('li[data-rubrique='+r+']').attr('data-position');
    var last = $('body').data('count') - position;
    var firstElement = $(".module--menu--mainNav > ul > li").slice(0,position);
    var lastElement = $(".module--menu--mainNav > ul > li").slice(-last);
    $.each(firstElement, function( i, el ) {
    	console.log("first", $(el));
		  $(el).appendTo('#menu-top-list');
		});
		$.each(lastElement, function( i, el ) {
    	console.log("last", $(el));
		  $(el).appendTo('#menu-bottom-list');
		});
  });


}

function loadInPjax(url) {
	$('body').addClass('is--loading');
	console.log('yo', 'is--loading');

	// check if home is asked
	if(url === window.homeURL) {
  	  openMenu();
	} else {
    setTimeout(function() {
      $.pjax({
    	    'url': url,
    	    'fragment': '#pjax-container',
    	    'container': '#pjax-container',
    	  });
    }, 1000);
	}
}


(function( $ ) {

	  $.fn.amac = function(elements, out) {
	  	// console.log(windowH);
	  	var positions = [];
	  	var elementsData = [];

	  	for (var element in elements) {
			  if (elements.hasOwnProperty(element)) {
			    //console.log(elements[element]);
			    var w = elements[element].outerWidth(true);
			    var h = elements[element].outerHeight(true);
			    var x = elements[element].offset().left;
			    var y = elements[element].offset().top;
			    var data = {w:w,h:h,x:x,y:y};

			    elementsData.push(data);
			  }
			}
			// console.log(windowW, windowH);

    	this.filter( "div" ).each(function() {
      	var coords = {
            w: $(this).outerWidth(true),
            h: $(this).outerHeight(true)
        };
        var success = false;
        while (!success){
        	//var random = Math.floor(Math.random() * (max - min + 1)) + min;
        	var Xmax = (windowW - (coords.w - out));
        	var Xmin = -out;
        	var Ymax = (windowH-(coords.h - out));
        	var Ymin = -out;
          coords.x = Math.floor(Math.random() * (Xmax - Xmin + 1)) + Xmin;
          coords.y = Math.floor(Math.random() * (Ymax - Ymin + 1)) + Xmin;
          //console.log(Xmax, Xmin, Ymax, Ymin, coords.x, coords.y);
          success = true;
          for(var i=0; i<elementsData.length; i++){
          	if (
		              coords.x <= (elementsData[i].x + elementsData[i].w) &&
		              (coords.x + coords.w) >= elementsData[i].x &&
               		(coords.y + coords.h) >= elementsData[i].y &&
               		coords.y <= (elementsData[i].y + elementsData[i].h)
              )
              {
              		//console.log('NON');
                  success = false;
              }
          }
          //$.each(positions, function(){
		        if (
		          coords.x <= ((this.x /2 + this.w /2)+(this.w*(50/100))) &&
		          (coords.x + coords.w) >= (this.x+(this.w*(50/100))) &&
		          coords.y <= ((this.y + this.h)+(this.w*(50/100))) &&
		          (coords.y + coords.h) >= (this.y+(this.w*(50/100)))
		        )
		        {
		        	// console.log("OVERLAPP");
		          success = false;
		        }
		      //});
        }
        
        positions.push(coords);
        //console.log(coords);
	        
        $(this).css({
            top: coords.y + 'px',
            left: coords.x + 'px',
            //"margin-left": '15px'
        });
      });

      return this;

	  };
	 
	}( jQuery ));