<?php
function include_all_php($folder){
    foreach (glob("{$folder}/*.php") as $filename)
        include $filename;    
}
include_all_php("../app/helpers");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>GoldStarCine M | Rạp chiếu phim tại Long Xuyên</title>
    <meta name="Category" content="threater, theatre, movies showing" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="description" content="Rạp chiếu phim GoldStarCine Long Xuyên" />
    <meta name="Keywords" content="goldstarcine, rạp chiếu phim, Long Xuyên, Nhà thiếu nhi An Giang, 108 Điện Biên Phủ, phim sắp chiếu, phim 3D chiếu rạp, gold star cine" />
	<meta name="viewport" content="width=device-width, initial-scale=0.5, minimum-scale=0.5, user-scalable=yes"/>    
    <link rel="icon" href="images/iconPage.png" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="css/main_styleM.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/font_external.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" />

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <!-- jqwidgets -->
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.base.css" />
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.metro.css" />
    <script type="text/javascript" src="js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxwindow.js"></script>
    
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
    
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.min.js"></script>    
    <script>
        (function($){
            $(window).load(function(){
                $("#menu-mobile-bottom").mCustomScrollbar({
                    autoHideScrollbar: true
                });
            });
        })(jQuery);
    </script>

    <script type="text/javascript">
        $(document).ready(function($) {
            $.getScript("js/jqxwindowMap.js");
            $("#jqxwindowMap").jqxWindow({ width: 600, height: 400, theme: 'metro', isModal: true, autoOpen: false });
            
            $("#lnkViewMap").click(function () {
                var x = ($(window).width() - $("#jqxwindowMap").jqxWindow('width')) / 2 + $(window).scrollLeft();
                var y = ($(window).height() - $("#jqxwindowMap").jqxWindow('height')) / 2 + $(window).scrollTop();
                $("#jqxwindowMap").jqxWindow({ position: { x: x, y: y} });
                $("#jqxwindowMap").jqxWindow('open');
                //initialize();
				return false; // prevent default click action from happening!
            });
        });
    </script>
</head>
<?php flush(); ?>
<body onload="loaded()">
    <div id="header" class="transparent">
        <div id="h-content">
            <ul id="h-nav" style="text-align: center;">
                <li id="btmenu" style="display: inline-block; float: left;"><a href="#"><i class="fa fa-bars"></i></a></li>
                <li class="site-name2" style="display: inline-block;"><a href="index.php?act=home"><span>GOLDSTARCINE</span></a></li>
                <li id="btmenu" style="display: inline-block; float: right;"><a href="#" style="float: right;"><i class="fa fa-search"></i></a></li>
            </ul>
        </div>
    </div>
    <div id="menu-mobile" class="transparent hidden">
        <div id="menu-mobile-top">
            <div style="float: left; padding: 20px 0 0 25px;"><img src="images/iconPage-large.png" /></div>
            <div style="float: left; padding: 25px 0 0 25px;"><h2 style="font-size: 25pt; font-weight: bold; color: #ffffff;">GoldStarCine</h2><h2 style="font-weight: bold; color: #ffffff;">Rạp chiếu phim tại Long Xuyên</h2></div>
        </div>
        <div id="menu-mobile-bottom">
            <ul class="h-navM">
                <li><a href="index.php?act=introduce"><i class="fa fa-info-circle"></i>Giới thiệu</a></li>
                <li><a href="index.php?act=schedule"><i class="fa fa-calendar-o"></i>Lịch chiếu</a></li>
                <li><a href="index.php?act=tickettable"><i class="fa fa-ticket"></i>Giá vé</a></li>
                <li><a href="index.php?act=movielist"><i class="fa fa-film"></i>Phim</a></li>
                <li style="border: 0px;"><a href="index.php?act=reviewlist"><i class="fa fa-file-text"></i>Tin tức</a></li>
            </ul>
            <h3>Thành viên</h3>
            <ul class="h-navM">
                <li><a href="#"><i class="fa fa-user"></i>Đăng nhập</a></li>
                <li style="border: 0px;"><a href="#"><i class="fa fa-user-plus"></i>Đăng ký</a></li>
            </ul>
            <h3>Hỗ trợ</h3>
            <ul class="h-navM" style="padding-bottom: 240px;">
                <li><a href="index.php?act=tuyendung"><i class="fa fa-paperclip"></i>Tuyển dụng</a></li>
                <li><a href="#"><i class="fa fa-at"></i>Liên hệ</a></li>
                <li><a href="#"><i class="fa fa-globe"></i>Vị trí chúng tôi trên bản đồ</a></li>
                <li style="border: 0px;"><a href="#"><i class="fa fa-envelope"></i>Đăng ký nhận mail</a></li>
            </ul>
            <!-- <ul class="h-navM-small">
                <li class="active"><a href="index.php?act=tuyendung">Tuyển dụng</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Vị trí chúng tôi trên bản đồ</a></li>
                <li style="border: 0px;"><a href="#">Đăng ký nhận tin</a></li>
            </ul> -->
        </div>        
    </div>
    <div id="wrapper">
        <?php include ('../config/routes.php'); ?>
    </div>
    <div id="footer">
        <div class="top">
            <!-- <div style="border-top: 2px solid #D8DFEA; margin-bottom: 15px;"></div> -->
            <h3>Giao diện: Điện thoại&nbsp;|&nbsp;Máy tính</h3>
            <h3>Địa chỉ: 108 Điện Biên Phủ, P. Mỹ Long, TP. Long Xuyên, An Giang</h3>
            <h3>Số điện thoại: 0763-958-958</h3>
            <h3>Email: saovanglongxuyen@gmail.com</h3>
        </div>
        <div class="bottom">
            <h3>Công ty TNHH Sao Vàng Long Xuyên &copy; 2015</h3>
            <h3>Powered by <a href="http://fb.com/masterlam2">Lý Quế Lâm</a></h3>
        </div>
    </div>
    <div id="jqxwindowMap">
        <div>Vị trí chúng tôi trên bản đồ</div>
        <div id="map_canvas"></div>
        <!-- Maps -->
        <!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
    </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
    var ele   = $('#menu-mobile');
    ele.scrollTop(0);
    
    var IMG_WIDTH = 500;
    var currentImg = 0;
    var maxImages = 3;
    var speed = 500;

    var imgs;

    var swipeOptions = {
        triggerOnTouchEnd: true,
        swipeStatus: swipeStatus,
        allowPageScroll: "vertical",
        threshold: 75
    };
    
    //Enable swiping...
    $('#menu-mobile').swipe({swipeLeft:swipe1, swipeRight:swipe2, swipeUp:swipe3, swipeDown:swipe4});
   // $('#menu-mobile').swipe({swipeStatus: swipeStatus2, allowPageScroll: "none"});
    $('body *:not(#menu-mobile)').swipe(swipeOptions);
    
    //Generic swipe handler for all directions
    function swipe1() {
        if($('#menu-mobile').hasClass('visible'))
            $('#btmenu').trigger('click');
    }
    function swipe2() {
        if($('#menu-mobile').hasClass('hidden'))
            $('#btmenu').trigger('click');
    }
    function swipe3(event, phase, direction, distance) {
        //var ele   = $('#menu-mobile');
        //var speed = 25, scroll = 200, scrolling;
        //ele.animate({scrollTop: ele.scrollTop() + distance});
        //$('body').css({'overflow':"hidden"});
        $('#menu-mobile').bringToTop();
    }
    function swipe4(event, phase, direction, distance) {
        //var ele   = $('#menu-mobile');
        //var speed = 25, scroll = 200, scrolling;
        //ele.animate({scrollTop: ele.scrollTop() - distance});
        //$('body').css({'overflow':"hidden"});
        $('#menu-mobile').bringToTop();
    }
    function swipeStatus(event, phase, direction, distance) {
        //If we are moving before swipe, and we are going L or R in X mode, or U or D in Y mode then drag.
        if (phase == "move" && (direction == "left" || direction == "right" || direction == "up" || direction == "down")) {
            var duration = 0;

            if (direction == "left") {
                if(distance > 150)
                    swipe1();
            } else if (direction == "right") {
                if(distance > 150)
                    swipe2();
            } else if (direction == "up") {
                //$('body').css({'overflow':"auto"});
            } else if (direction == "down") {
                //$('body').css({'overflow':"auto"});
            }

        } else if (phase == "cancel") {
            //swipe1();
        } else if (phase == "end") {
            if (direction == "right") {
                if(distance > 150)
                    swipe2();
            } else if (direction == "left") {
                if(distance > 150)
                    swipe1();
            }
        }
    }
    function swipeStatus2(event, phase, direction, distance) {
        //If we are moving before swipe, and we are going L or R in X mode, or U or D in Y mode then drag.
        if (phase == "move" && (direction == "left" || direction == "right" || direction == "up" || direction == "down")) {
            var duration = 0;

            if (direction == "left") {
                swipe1();
            } else if (direction == "right") {
                swipe2();
            }

        } else if (phase == "cancel") {
            //swipe1();
        } else if (phase == "end") {
            if (direction == "right") {
                swipe2();
            } else if (direction == "left") {
                swipe1();
            }
        }
    }
    function scrollImages(distance, duration) {
        imgs.css("transition-duration", (duration / 1000).toFixed(1) + "s");

        //inverse the number we set in the css
        var value = (distance < 0 ? "" : "-") + Math.abs(distance).toString();
        imgs.css("transform", "translate(" + value + "px,0)");
    }
    
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#menu-mobile ul li a").click(function () {
            $("#menu-mobile ul li").find(".selected").removeClass("selected");
    		$(this).addClass("selected");        
        });
        
        $('#btmenu').click(function() {
            var $moving = $('#menu-mobile');
            var $followMoving = $('#header, #wrapper, #footer');
        	//$moving.animate({left: parseInt($moving.css('left'),10) == 0 ? -$moving.outerWidth() : 0});
            $moving.animate({left: parseInt($moving.css('left'),10) == 0 ? -461 : 0});
            $followMoving.animate({left: parseInt($moving.css('left'),10) != 0 ? 430 : 0});
        	if($moving.hasClass("hidden"))
        	{
        		$(this).find("a").removeClass("not-selected");
        		$(this).find("a").addClass("selected");
        		$moving.removeClass("hidden");
        		$moving.addClass("visible");
        		$('body').css({'overflow':"hidden"});
        	}
        	else
        	{
        		$(this).find("a").removeClass("selected");
        		$(this).find("a").addClass("not-selected");
        		$moving.removeClass("visible");
        		$moving.addClass("hidden");
        		$('body').css({'overflow':"auto"});
        	}
        	return false;
        });
    });
</script>