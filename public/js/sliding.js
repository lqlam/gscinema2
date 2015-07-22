$(document).ready(function() {
  $('#slidebottom button').click(function() {
    $(this).next().slideToggle();
  });

  $('#btmenu').click(function() {
    $('#menu-mobile1').animate({width: 'toggle'});
  });
  
  $('#btmenu').click(function() {
    var $lefty = $('#menu-mobile');
    $lefty.animate({left: parseInt($lefty.css('left'),10) == 0 ? -$lefty.outerWidth() : 0});
	if($lefty.hasClass("hidden"))
	{
		$(this).find("a").removeClass("not-selected");
		$(this).find("a").addClass("selected");
		$lefty.removeClass("hidden");
		$lefty.addClass("visible");
	}
	else
	{
		$(this).find("a").removeClass("selected");
		$(this).find("a").addClass("not-selected");
		$lefty.removeClass("visible");
		$lefty.addClass("hidden");
	}
	return false;
  });

  $('#slidemarginleft button').click(function() {
    var $marginLefty = $(this).next();
    $marginLefty.animate({marginLeft: parseInt($marginLefty.css('marginLeft'),10) == 0 ? $marginLefty.outerWidth() : 0});
  });
  
  $('#slidewidthsome button').click(function() {
    var $some = $(this).next(),
    someWidth = $some.outerWidth(),
    parentWidth = $some.parent().width();
    $some.animate({width: someWidth === parentWidth ? someWidth/2 : parentWidth - (parseInt($some.css('paddingLeft'),10) + parseInt($some.css('paddingRight'),10))});
  });  
});

