<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script>
    jQuery(document).ready(function ($) {
        //Reference http://www.jssor.com/development/slider-with-slideshow-jquery.html
        //Reference http://www.jssor.com/development/tool-slideshow-transition-viewer.html

        var _SlideshowTransitions = [
        //Fade in R
        {$Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
        //Fade out L
        , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
        ];

        var options = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
            $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
            //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 10                                    //[Optional] Vertical space between each item in pixel, default value is 0
            },

            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 2,                                //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            },

            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                $ActionMode: 0,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $DisableDrag: true                              //[Optional] Disable drag or not, default value is false
            }
        };

        var jssor_sliderb = new $JssorSlider$("sliderb_container", options);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_sliderb.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_sliderb.$ScaleWidth(Math.min(parentWidth, 464));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);
        //responsive code end
    });
</script>
<script type="text/javascript">
    $(document).ready(function($) {
        $("#jqxwindowRegis").jqxWindow({ width: 600, height: 400, theme: 'metro', isModal: true, autoOpen: false });
        
        $("#lnkRegis").click(function () {
            var x = ($(window).width() - $("#jqxwindowRegis").jqxWindow('width')) / 2 + $(window).scrollLeft();
            var y = ($(window).height() - $("#jqxwindowRegis").jqxWindow('height')) / 2 + $(window).scrollTop();
            $("#jqxwindowRegis").jqxWindow({ position: { x: x, y: y} });
            $("#jqxwindowRegis").jqxWindow('open');
			return false; // prevent default click action from happening!
        });
    });
</script>
<script type="text/javascript">
    var url = "schedules.json";
    $.getJSON(url,
    function (arr) {
        var out = "";
        for(i = 0; i < arr[0].movies.length; i++) {
            var Title;
            arr[0].movies[i]._id[0].Title==''?Title=arr[0].movies[i]._id[0].IntTitle:Title=arr[0].movies[i]._id[0].Title;
            var intTitleNoSpace = arr[0].movies[i]._id[0].IntTitle.split(':').join('_');
            intTitleNoSpace = intTitleNoSpace.split(' ').join('-');
    		out += "<li>" +
    			"<span class=\"tenPhim\"><a href=\"index.php?act=movie&inttitle="+intTitleNoSpace+"\">"+Title+"</a></span>" +
                "<span class=\"suatChieu\" style=\"display: block;\">";
                for(j = 0; j < arr[0].movies[i].schedule.length; j=j+2) {
    			    out += "<a room=\""+arr[0].movies[i].schedule[j+1].room+"\" class=\"notLink\">"+arr[0].movies[i].schedule[j].start+"</a>";
                }
                out += "</span>";
    		out += "</li>";
        }
        out += "";
        $(".lichChieu ul:first").append(out);           
    });
</script>

<script type="text/javascript">
$(document).ready(function () {    
    $(".lnkMovies").click(function () {
        $(".w-tab-menu ul li").find(".selected").removeClass("selected");
		$(this).addClass("selected");
        
        if($(".w-tab-menu ul li a[role=moviesshowing]").hasClass("selected"))
            var url = "movies_showing.json";
        else
            var url = "movies_next.json";
            
        if($(".views .view-grid").hasClass("selected"))
            var mode = "grid";
        else
            var mode = "list";
        GetMovies(url,mode);
    });
    
    $('.lnkMovies:first').trigger('click');
    //var fullURL = $(location).attr('href');
    //var hash = fullURL.substring(fullURL.indexOf('#'));
    
    $(".views a").click(function () {
        //$('.lnkMovies').trigger('click');
        $(".views").find(".selected").removeClass("selected");
        $(this).addClass("selected");
        
        if($(".w-tab-menu ul li a[role=moviesshowing]").hasClass("selected"))
            var url = "movies_showing.json";
        else
            var url = "movies_next.json";
            
        if($(".views .view-grid").hasClass("selected"))
            var mode = "grid";
        else
            var mode = "list";
        GetMovies(url,mode);
    });
    
    function GetMovies(url, mode) {
        $.getJSON(url, function (arr) {
            var out = "";
            if(mode == "grid")
                for(i = 0; i < arr.length; i++) {
                    var arrstr = arr[i].Format.split(',');
                    //console.log(arr[0]);
                    if(arrstr[0]==null) arrstr[0]='';
                    //if(arrstr[1]==null) arrstr[1]='';
                    if(typeof arrstr[1]=='undefined') arrstr[1]='';
                    var intTitleNoSpace = arr[i].IntTitle.split(':').join('_');
                    intTitleNoSpace = intTitleNoSpace.split(' ').join('-');
                    var Title;
                    arr[i].Title==''?Title=arr[i].IntTitle:Title=arr[i].Title;
                    out += "<div class=\"b-items-grid\">" +
                        "<a href=\"index.php?act=movie&inttitle="+intTitleNoSpace+"\"><img class=\"posterPhim\" src=\"img/movie/"+"thumb-"+arr[i]._id.$id+".jpg\" /></a>" +
                        "<h2><a href=\"index.php?act=movie&inttitle="+intTitleNoSpace+"\">"+Title+"</a></h2>" +
                        "<h3 class=\"formatmovies formatmovies_2D\">"+arrstr[0]+"</h3>" +
                        "<h3 class=\"formatmovies formatmovies_3D\">"+arrstr[1]+"</h3>" +           
                        "<h3 style=\"float: right;\"></h3>" +
                    "</div>";
                }
            else
                for(i = 0; i < arr.length; i++) {
                    var arrstr = arr[i].Format.split(',');
                    //console.log(arr[0]);
                    if(arrstr[0]==null) arrstr[0]='';
                    //if(arrstr[1]==null) arrstr[1]='';
                    if(typeof arrstr[1]=='undefined') arrstr[1]='';
                    var intTitleNoSpace = arr[i].IntTitle.split(':').join('_');
                    var intTitleNoSpace = intTitleNoSpace.split(' ').join('-');
                    var title;
                    arr[i].Title==''?title='':title='&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'+arr[i].Title;
                    var releaseDate = new Date(arr[i].ReleaseDate.sec*1000).getDate();
                    releaseDate += "/"+new Date(arr[i].ReleaseDate.sec*1000).getMonth();
                    releaseDate += "/"+new Date(arr[i].ReleaseDate.sec*1000).getFullYear();
                    out += "<div class=\"b-items-list\">" +
                        "<h3><a href=\"index.php?act=movie&inttitle="+intTitleNoSpace+"\">"+arr[i].IntTitle+title+"</a></h3>" +
                        "<h3>Ngày khởi chiếu: <span class=\"fntGrey\">"+releaseDate+"</span></h3>" +
                        "<h3>Thể loại: <span class=\"fntGrey\">"+arr[i].Genres+"</span></h3>" +
                        "<p>Nội dung: <span class=\"fntGrey\">"+arr[i].Storyline.substr(0,150)+"..."+"</span></p>" +
                    "</div>";
                }
            out+="";
            $('#box_movies_ext').empty().append(out);
        });
    }
});
</script>
<div id="w-left">
	<div id="w-left-top">
        <div id="sliderb_container" style="position: relative; top: 0px; left: 0px; width: 464px; height: 230px; overflow: hidden; float: left;">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block; background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(../img/loading.gif) no-repeat center center; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>
    
            <!-- Slides Container -->
            <div u="slides" style="position: absolute; left: 0px; top: 0px; width: 464px; height: 230px; overflow: hidden;">
                <div>
                    <a href="#">
                        <img u=image src="userfiles/01.jpg" />
                    </a>
                    <div u="thumb">Do you notice it is draggable by mouse/finger?</div>
                </div>
                <div>
                    <img u=image src="userfiles/02.jpg" />
                    <div u="thumb">Did you drag by either horizontal or vertical?</div>
                </div>
                <div>
                    <img u=image src="userfiles/03.jpg" />
                    <div u="thumb">Do you notice navigator responses when drag?</div>
                </div>
                <div>
                    <img u=image src="userfiles/02.jpg" />
                    <div u="thumb">Do you notice arrow responses when click?</div>
                </div>
            </div>
            
            <!-- thumbnail navigator container -->
            <div u="thumbnavigator" style="position: absolute; bottom: 0px; left: 0px; height:45px; width:464px;">
                <div style="filter: alpha(opacity=40); opacity:0.4; position: absolute; display: block; background-color: #000000; top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <!-- Thumbnail Item Skin Begin -->
                <div u="slides">
                    <div u="prototype" style="position: absolute; width: 464px; height: 45px; top: 0; left: 0;">
                    <div u="thumbnailtemplate" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; color:#fff; line-height: 45px; font-size:18px; padding-left:10px;"></div>
                    </div>
                </div>
            </div>
                    
            <style>
                /* jssor slider bullet navigator skin 01 css */
                /*
                .jssorb01 div           (normal)
                .jssorb01 div:hover     (normal mouseover)
                .jssorb01 .av           (active)
                .jssorb01 .av:hover     (active mouseover)
                .jssorb01 .dn           (mousedown)
                */
                .jssorb01 {
                    position: absolute;
                }
                .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
                    position: absolute;
                    /* size of bullet elment */
                    width: 12px;
                    height: 12px;
                    filter: alpha(opacity=70);
                    opacity: .7;
                    overflow: hidden;
                    cursor: pointer;
                    border: #000 1px solid;
                }
                .jssorb01 div { background-color: gray; }
                .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
                .jssorb01 .av { background-color: #fff; }
                .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }
            </style>
            <!-- bullet navigator container -->
            <div u="navigator" class="jssorb01" style="bottom: 16px; right: 10px;">
                <div u="prototype"></div>
            </div>
            <style>
                .jssora05l, .jssora05r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 50px;
                    height: 50px;
                    cursor: pointer;
                    background: url(img/a19.png) no-repeat;
                    overflow: hidden;
                }
                .jssora05l { background-position: -5px -35px; }
                .jssora05r { background-position: -65px -35px; }
                .jssora05l:hover { background-position: -125px -35px; }
                .jssora05r:hover { background-position: -185px -35px; }
                .jssora05l.jssora05ldn { background-position: -245px -35px; }
                .jssora05r.jssora05rdn { background-position: -305px -35px; }
            </style>
            <!-- Arrow Left -->
            <span u="arrowleft" class="jssora05l" style="top: 123px; left: 8px;">
            </span>
            <!-- Arrow Right -->
            <span u="arrowright" class="jssora05r" style="top: 123px; right: 8px;">
            </span>
        </div>
        <div class="ads" style="position: relative; top: 0px; right: 0px; height: 230px; background: #000; float: right; width: 306px;">
        </div>
	</div>
	<div id="w-left-middle">
		<div class="w-tab">
			<div class="w-tab-menu">
                <div>
    				<div class="views">
    					<a class="view-grid selected" href="#view-grid">view-poster-movies</a>
    					<a class="view-list" href="#view-list">view-textcolumn-movies</a>
    				</div>
    				<ul>
    					<li><a href="#section=moviesshowing" role="moviesshowing" class="lnkMovies selected">Phim đang chiếu</a></li>
    					<li><a href="#section=moviesnext" role="moviesnext" class="lnkMovies" onclick="">Phim sắp chiếu</a></li>
    				</ul>
                </div>
			</div>
			<div class="w-tab-wrapper">
				<div class="pagenav">
				</div>
				<div class="box" id="box_movies_ext">
                <!-- -->
				</div>
			</div>
		</div>

		<div class="w-tab">
			<div class="w-tab-menu">
                <div>
    				<div class="views">
    					<a class="view-grid selected" href="#view-grid">view-poster-reviews</a>
    					<a class="view-list" href="#view-list">view-textcolumn-reviews</a>
    				</div>
    				<ul>
    					<li><a>Tin bên lề</a></li>
    					<li><a>Tin khuyến mãi</a></li>
    				</ul>
                </div>
			</div>
			<div class="w-tab-wrapper">
				<div class="pagenav">
				</div>
				<div class="box">
					<div class="b-items-grid">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Thế giới khủng long</h2></a>
					</div>
					<div class="b-items-grid">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Ngủ Với Hồn Ma</h2></a>
					</div>
					<div class="b-items-grid">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Lật Mặt</h2></a>
					</div>
					<div class="b-items-grid">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Kiếm Rồng</h2></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="w-right">
	<div style="margin-bottom: 15px;">
		<img width="190px" height="230px" src="userfiles/eden_itunes_187x228.jpg" />
	</div>
	<div class="boxHelper thanhVien" style="text-align: center;">
		<h3>Thành viên</h3>
		<ul>
			<li>
				<h2><a href="#">Đăng nhập</a></h2>
			</li>
		</ul>
		<div style="border-top: 1px solid #D8DFEA;"></div>
		<ul>
			<li>
				<a id="lnkRegis" style="float: right; font-size: 14px;" href="#"><span>Đăng ký </span><i class="fa fa-chevron-circle-right"></i></a>
			</li>
		</ul>
	</div>
	<div class="boxHelper datVe" style="text-align: center;">
		<h3>Đặt vé</h3>
		<ul>
			<li>
				<select name="cmbPhim">
					<option value="0" selected="selected">Phim</option>
					<option value="1">Avengers</option>
					<option value="2">2</option>
				</select>
			</li>
			<li>
				<select name="cmbSuatChieu">
					<option value="0" selected="selected">Suất chiếu</option>
					<option value="1">Avengers</option>
					<option value="2">2</option>
				</select>
			</li>
			<li>
				<select name="cmbNgay">
					<option value="0" selected="selected">Ngày</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
			</li>
			<li>
				<input type="submit" name="datVe" value="Đồng ý" />
			</li>
		</ul>
	</div>
	<div class="boxHelper lichChieu">
		<h3>Lịch chiếu hôm nay</h3>
		<ul>
			<!-- -->
		</ul>
		<div style="border-top: 1px solid #D8DFEA;"></div>
		<ul>
			<li>
				<a style="float: right; font-size: 14px;" href="index.php?act=schedule">Xem thêm <i class="fa fa-chevron-circle-right"></i></a>
			</li>
		</ul>
	</div>
	<!-- Quảng cáo -->
	<div style="margin-bottom: 15px;">
		<img style="margin-bottom: 5px;" width="190px" src="userfiles/focus_187x94.jpg" />
		<img width="190px" src="userfiles/welcometome_187x94.jpg" />
	</div>
</div>

<div id="jqxwindowRegis">
    <div>Đăng ký tài khoản</div>
    <div>
        <input value="" placeholder="Tên đăng nhập" />
        <input value="" placeholder="Mật khẩu (lần 1)" />
        <input value="" placeholder="Mật khẩu (lần 2)" />
        <input value="" placeholder="Họ và tên" />
        <input value="" placeholder="Số điện thoại" />
        <input value="" placeholder="Email" />
    </div>
</div>