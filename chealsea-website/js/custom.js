/*------------------------------
 * Copyright 2014 Pixelized
 * http://www.pixelized.cz
 *
 * Freelancer theme v1.1
------------------------------*/

$(window).scroll(function(){
	if($(window).scrollTop() > 600) {
		$('.navbar-default').fadeIn(300);
	}
	else {
		$('.navbar-default').fadeOut(300);
	}
	
	if($(window).width() > 767) {
		if ($(this).scrollTop() > 600) {
			$('.scroll-up').fadeIn(300);
		} else {
			$('.scroll-up').fadeOut(300);
		}		
	}
});

$(document).ready(function() {

	$("a.scroll[href^='#']").on('click', function(e) {
		e.preventDefault();
		var hash = this.hash;
		$('html, body').animate({ scrollTop: $(this.hash).offset().top}, 1000, function(){window.location.hash = hash;});
	});
	
	$('#skills-toggle').click(function() {
        $('#skills').slideToggle(500);
		$('.chart').easyPieChart({
			barColor: '#1ABC9C',
			trackColor: '#2F4254',
			scaleColor: false,
			lineCap: 'butt',
			lineWidth: 12,
			size:110,
			animate: 2000
		});
    });
	
	$('#overlay-hide').click(function() {
		$('#reference .reference-overlay').animate({opacity:0},1000);
		$('#reference-text').animate({opacity:0},1000);
	});
		
	$('.overlay-wrapper').mouseenter(function() {
		$(this).find('.overlay a:first-child').addClass('animated slideInLeft');
		$(this).find('.overlay a:last-child').addClass('animated slideInRight');
    });
	
	$('.overlay-wrapper').mouseleave(function() {
		$(this).find('.overlay a:first-child').removeClass('animated slideInLeft');
		$(this).find('.overlay a:last-child').removeClass('animated slideInRight');
    });
	
	$('.carousel').mouseenter(function() {
		$('.carousel-control').fadeIn(300);
	});
	
	$('.carousel').mouseleave(function() {
		$('.carousel-control').fadeOut(300);
	});
	
	$('#separator').waypoint(function(){$('#separator .number').countTo();},{offset:'85%'});
	
	if($(window).width() > 767) {
		$('.service').mouseenter(function(e) {
			$(this).find('img').animate({paddingBottom: "15px"},500);
		});
		
		$('.service').mouseleave(function(e) {
			$(this).find('img').stop().animate({paddingBottom: "0px"},500);
		});
	}
	
	if($(window).width() > 767) {
		$('.scrollpoint.sp-effect1').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInLeft');},{offset:'90%'});
		$('.scrollpoint.sp-effect2').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInRight');},{offset:'90%'});
		$('.scrollpoint.sp-effect3').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeInDown');},{offset:'90%'});
		$('.scrollpoint.sp-effect4').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('animated fadeIn');},{offset:'70%'});
		
		$('.macbook-inner').waypoint(function(){$(this).toggleClass('active');$(this).toggleClass('black');},{offset:'70%'});
	}
	
    /*var feed = new Instafeed({
    	get: 'user',
        userId: '1815280812',
        clientId: '221ce80614bc4a8aa49c85c9f4a6523d',
        accessToken: '5719344345.1677ed0.c8369d318b034a58863489cecc956ab7',
    });
    feed.run();*/
	/*$.ajax({
		url: "insta.php",
		type: "GET",
		success: function(data) {
			// Success message
			console.log('success! data:');
			console.log(data);
		},
		error: function(err) {
			console.log(err);
		},
	})*/
	function reqListener () {
      console.log(this.responseText);
    }
	
	function formatDate(theDate) {
		return (theDate.getMonth() + 1) + 
	    "/" +  theDate.getDate() +
	    "/" +  theDate.getFullYear();
	}

    var oReq = new XMLHttpRequest(); //New request object
    oReq.onload = function() {
        //This is where you handle what to do with the response.
        //The actual data is found on this.responseText
    	console.log('heres the response from the parser');
        console.log(JSON.stringify(this.responseText)); //Will alert: 42
        if (this.responseText !== undefined && this.responseText !== null && this.responseText !== '') {
        	var instaPicsArr = this.responseText.split(',');
        	$('#insta-1').append('<img src="' + instaPicsArr[0] + '" class="scale invisible" />');
        	$('#insta-2').append('<img src="' + instaPicsArr[3] + '" class="scale invisible" />');
        	$('#insta-3').append('<img src="' + instaPicsArr[6] + '" class="scale invisible" />');
        	$('#insta-1').css('background-image', 'url(' + instaPicsArr[0] + ')');
        	$('#insta-2').css('background-image', 'url(' + instaPicsArr[3] + ')');
        	$('#insta-3').css('background-image', 'url(' + instaPicsArr[6] + ')');
        	$('#insta-1-likes').text(instaPicsArr[2]);
        	var d1 = new Date(0); // The 0 there is the key, which sets the date to the epoch
        	d1.setUTCSeconds(instaPicsArr[1]);
        	$('#insta-1-date').text(formatDate(d1));
        	// ------------- 2
        	$('#insta-2-likes').text(instaPicsArr[5]);
        	var d2 = new Date(0); // The 0 there is the key, which sets the date to the epoch
        	d2.setUTCSeconds(instaPicsArr[4]);
        	$('#insta-2-date').text(formatDate(d2));
        	// -------------- 3
        	$('#insta-3-likes').text(instaPicsArr[8]);
        	var d3 = new Date(0); // The 0 there is the key, which sets the date to the epoch
        	d3.setUTCSeconds(instaPicsArr[7]);
        	$('#insta-3-date').text(formatDate(d3));
        }
    };
    oReq.open("get", "insta.php", true);
    //                               ^ Don't block the rest of the execution.
    //                                 Don't wait until the request finishes to 
    //                                 continue.
    oReq.send();
});


