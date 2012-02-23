$(function(){
	// zen button hover
	$("#productAdditionalImages .additionalImages a").hover(function(){
		$(this).find("img").stop().animate({opacity:0.7}, "fast") 
	}, function(){
		$(this).find("img").stop().animate({opacity:1}, "fast")
	});
});


$(function(){
	// zen button hover
	$(" #productTellFriendLink, #productReviewLink, .navNextPrevList").hover(function(){
		$(this).find("a").stop().animate({opacity:0.7}, "fast") 
	}, function(){
		$(this).find("a").stop().animate({opacity:1}, "fast")
	});
});
$(function(){
	// zen button hover
	$(".buttonRow, .bbt").hover(function(){
		$(this).find("input").stop().animate({opacity:0.7}, "fast") 
	}, function(){
		$(this).find("input").stop().animate({opacity:1}, "fast")
	});
});

$(function(){
	// zen button hover
	$(".rev-but a, .button-padding a, .button a, .btn1 a, .buttons a, .button, .inf a, .buttonRow.forward a, .buttonRow.back a").hover(function(){
		$(this).find("img").stop().animate({opacity:0.7}, "fast") 
	}, function(){
		$(this).find("img").stop().animate({opacity:1}, "fast")
	});
});

$(function(){
	// zen button hover
	$(".image").hover(function(){
		$(this).find(".zoom").stop().animate({opacity:0.7}, "fast") 
	}, function(){
		$(this).find(".zoom").stop().animate({opacity:1}, "normal")
	});
});
