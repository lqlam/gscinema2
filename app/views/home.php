<script type="text/javascript">
    var xmlhttp = new XMLHttpRequest();
    var url = "../public/movies_showing.json";
    
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            myFunction(xmlhttp.responseText);
        }
    }
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    
    function myFunction(response) {
        var arr = JSON.parse(response);
        var i;
        var out = "";
        for(i = 0; i < arr.length; i++) {
            var arrstr = arr[i].Format.split(',');
            //console.log(arr[0]);
            if(arrstr[0]==null) arrstr[0]='';
            //if(arrstr[1]==null) arrstr[1]='';
            if(typeof arrstr[1]=='undefined') arrstr[1]='';
            out += "<div class=\"b-items\">" +
                "<a href=\"phim-1.html\"><img class=\"posterPhim\" src=\"img/movie/"+"thumb-"+arr[i]._id.$id+".jpg\" /></a>" +
                "<h2><a href=\"phim-1.html\">"+arr[i].IntTitle+"</a></h2>" +
                "<h3 class=\"formatmovies formatmovies_2D\">"+arrstr[0]+"</h3>" +
                "<h3 class=\"formatmovies formatmovies_3D\">"+arrstr[1]+"</h3>" +                                                                        
                "<h3 style=\"float: right;\"></h3>" +
            "</div>";                
        }
        out += "";
        $("#box_movies_ext").empty().append(out);                
    }                
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
var xmlhttp2 = new XMLHttpRequest();
var url = "../public/schedules.json";

xmlhttp2.onreadystatechange=function() {
    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
        myFunction2(xmlhttp2.responseText);
    }
}
xmlhttp2.open("GET", url, true);
xmlhttp2.send();

function myFunction2(response) {
    var arr = JSON.parse(response);
    var i;
    var out = "";
    for(i = 0; i < arr[0].movies.length; i++) {
        //alert(arr[1].movies.length);
		out += "<li>" +
			"<span class=\"tenPhim\"><a>"+arr[0].movies[i]._id[0].Title+"</a></span>" +
            "<span class=\"suatChieu\" style=\"display: block;\">";
            for(j = 0; j < arr[0].movies[i].schedule.length; j=j+2) {
			    out += "<a room=\""+arr[0].movies[i].schedule[j+1].room+"\" class=\"notLink\">"+arr[0].movies[i].schedule[j].start+"</a>";
            }
            out += "</span>"; 
		out += "</li>";
    }
    out += "";
    $(".lichChieu #list_movies_showing_tmp").append(out);                
}  
</script>
<div id="w-left">
	<div id="w-left-top">
		<img width="780px" height="230px" src="userfiles/eden_itunes_187x228.jpg" />
	</div>
	<div id="w-left-middle">
		<div class="w-tab">
			<div class="w-tab-menu">
				<div class="views">
					<a class="view-poster" href="#view-poster-movies">view-poster-movies</a>
					<a class="view-textcolumn" href="#view-textcolumn-movies">view-textcolumn-movies</a>
				</div>
				<ul>
					<li><a>Phim đang chiếu</a></li>
					<li><a>Phim sắp chiếu</a></li>
				</ul>
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
				<div class="views">
					<a class="view-poster" href="#view-poster-reviews">view-poster-reviews</a>
					<a class="view-textcolumn" href="#view-textcolumn-reviews">view-textcolumn-reviews</a>
				</div>
				<ul>
					<li><a>Tin bên lề</a></li>
					<li><a>Tin khuyến mãi</a></li>
				</ul>
			</div>
			<div class="w-tab-wrapper">
				<div class="pagenav">
				</div>
				<div class="box">
					<div class="b-items">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Thế giới khủng long</h2></a>
					</div>
					<div class="b-items">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Ngủ Với Hồn Ma</h2></a>
					</div>
					<div class="b-items">
						<a><img class="posterTin" src="userfiles/poster.jpg" /></a>
						<a><h2>Lật Mặt</h2></a>
					</div>
					<div class="b-items">
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
				<a id="lnkRegis" class="fntGrey" style="float: right; font-size: 14px;" href="#"><span>Đăng ký</span><img style="float: right;" src="images/sidebox_arrow.png" alt="" /></a>
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
		<ul id="list_movies_showing_tmp">
			<!-- -->
		</ul>
		<div style="border-top: 1px solid #D8DFEA;"></div>
		<ul>
			<li>
				<a class="fntGrey" style="float: right; font-size: 14px;" href="index.php?act=lichchieu"><span>Xem thêm</span><img style="float: right;" src="images/sidebox_arrow.png" alt="" /></a>
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