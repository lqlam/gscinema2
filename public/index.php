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

    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <!-- jqwidgets -->
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.base.css" />
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.metro.css" />
    <script type="text/javascript" src="js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxwindow.js"></script>
    
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $("a").click(function () {
            });
        });
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

<body>
    <div id="header">
        <div id="h-content">
            <ul id="h-nav">
                <li class="site-name"><a href="index.php"></a></li>
                <li class=""><a href="index.php?act=gioithieu">Giới thiệu</a></li>
                <li class=""><a href="index.php?act=lichchieu">Lịch chiếu</a></li>
                <li class=""><a href="index.php?act=banggiave">Giá vé</a></li>
                <li class=""><a href="index.php?act=phimds">Phim</a></li>
                <li class=""><a href="index.php?act=tintucds">Tin tức</a></li>
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
            <div id="f-top-content">
                <div class="f-left" style="float: left">
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /><h3 class="fntGrey">108 Điện Biên Phủ, P. Mỹ Long, TP. Long Xuyên, An Giang</h3></div>
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /><h3 class="fntGrey">0763 958 958</h3></div>
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /><h3 class="fntGrey">saovanglongxuyen@gmail.com</h3></div>
                </div>
                <div class="f-right" style="float: right">
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /></div>
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /></div>
                    <div><img src="images/email.svg" width="20px" height="20px" alt="" /></div>
                </div>
            </div>
            <div id="f-bottom-content">
                <div class="f-left" style="float: left">
                    <div><h3 class="fntGrey">Copyright &copy; 2015 Công ty TNHH Sao Vàng Long Xuyên</h3></div>
                </div>
                <div class="f-right" style="float: right">
                    <div>
                        <h3><a id="lnkViewMap" href="#">Vị trí chúng tôi trên bản đồ</a><b class="fntGrey"> &middot; </b><a href="#">Đăng ký nhận tin từ chúng tôi</a><b class="fntGrey"> &middot; </b><a href="#">Liên hệ</a></h3>
                    </div>
                </div>
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