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
    <title>GoldStarCine | Rạp chiếu phim tại Long Xuyên</title>
    <meta name="Category" content="threater, theatre, movies showing" />
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="description" content="Rạp chiếu phim GoldStarCine Long Xuyên" />
    <meta name="Keywords" content="goldstarcine, rạp chiếu phim, Long Xuyên, Nhà thiếu nhi An Giang, 108 Điện Biên Phủ, phim sắp chiếu, phim 3D chiếu rạp, gold star cine" />
        
    <link rel="icon" href="images/iconPage.png" type="image/x-icon"/>

    <link rel="stylesheet" type="text/css" href="css/main_style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/font_external.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" media="all" />

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <!-- jqwidgets -->
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.base.css" />
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.metro.css" />
    <script type="text/javascript" src="js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxwindow.js"></script>
    
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.min.js"></script>    
    <script>
        (function($){
            $(window).load(function(){
                $("#lichChieu-container").mCustomScrollbar({
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
<body>
    <div id="header" class="transparent">
        <div id="h-content">
            <ul id="h-nav">
                <li class="site-name"><a href="index.php?act=home"></a></li>
                <li class=""><a href="index.php?act=introduce">Giới thiệu</a></li>
                <li class=""><a href="index.php?act=schedule">Lịch chiếu</a></li>
                <li class=""><a href="index.php?act=tickettable">Giá vé</a></li>
                <li class=""><a href="index.php?act=movielist">Phim</a></li>
                <li class=""><a href="index.php?act=reviewlist">Tin tức</a></li>
                <li class=""><a href="index.php?act=tuyendung">Tuyển dụng</a></li>
                <li class=""><a href="#">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <div id="wrapper">
        <?php include ('../config/routes.php'); ?>
    </div>
    <div id="footer">
        <div id="f-content">
            <div style="border-top: 1px solid #D8DFEA; margin-bottom: 15px;"></div>
            <div class="top">
				<h3><a id="lnkViewMap" href="#">Vị trí chúng tôi trên bản đồ</a><b>&nbsp;&nbsp;&middot;&nbsp;&nbsp;</b><a href="#">Đăng ký nhận tin từ chúng tôi</a><b>&nbsp;&nbsp;&middot;&nbsp;&nbsp;</b><a href="#">Liên hệ</a></h3>
                <div class="left" style="float: left">
                    <h3>108 Điện Biên Phủ, P. Mỹ Long, TP. Long Xuyên, An Giang<b>&nbsp;&nbsp;&middot;&nbsp;&nbsp;</b></h3>
                    <h3>0763-958-958<b>&nbsp;&nbsp;&middot;&nbsp;&nbsp;</b></h3>
                    <h3>saovanglongxuyen@gmail.com</h3>
                </div>
                <div class="right" style="float: right">
                    <h3><a href="#" style=" font-size: 25px;"><i class="fa fa-facebook-square"></i></a></h3>
                    <h3><a href="#" style=" font-size: 25px;"><i class="fa fa-google-plus-square"></i></a></h3>
                    <h3><a href="#" style=" font-size: 25px;"><i class="fa fa-youtube-square"></i></a></h3>
                </div>
			</div>
            <div class="bottom">
                <h3>Công ty TNHH Sao Vàng Long Xuyên &copy; 2015</h3>
                <h3 style="float: right;">Powered by <a href="http://fb.com/masterlam2">Lý Quế Lâm</a></h3>
			</div>
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