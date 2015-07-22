<script type="text/javascript">
$(document).ready(function () {
    if(screen.availWidth <= 1180)
        $("#thumb-tray").css({'overflow': 'hidden'});
});
</script>
<style type="text/css">
    body {
        background: #000000;
    }
</style>
<script src="http://www.youtube.com/player_api"></script>
<script type="text/javascript">    
    function onYouTubePlayerAPIReady() {
        // create the global player from the specific iframe (#video)
        player = new YT.Player('player', {
            events: {
                // call this function when player is ready to use
                'onReady': onPlayerReady
            }
        });
    }
    
    function onPlayerReady() {
        //bind events
        $(".lnkThumb1").bind('click', function() {
            if($(this).hasClass("selected")) {
    			$(this).removeClass("selected");
                player.pauseVideo();
            }
    		else {
    			$(this).addClass("selected");
                player.playVideo();
            }
        });
    }
    
    //function onPlayerReady() {
//        // bind events
//        document.getElementById("lnkThumb").addEventListener("click", function() {
//            if($(this).hasClass("selected")) {
//    			$(this).removeClass("selected");
//                player.pauseVideo();
//            }
//    		else {
//    			$(this).addClass("selected");
//                player.playVideo();
//            }
//        });
//    }
    

</script>
<script type="text/javascript">
$(document).ready(function () {
    $(".lnkThumb").click(function () {
            var out = "";
            if($(this).hasClass("video")) {
                out += "<iframe src=\""+$(this).attr("data")+"\" scrolling=\"no\" frameborder=\"0\" id=\"player\" width=\"980px\" height=\"490px\" style=\"display: block;\"></iframe>";
            }else
                out += "<img src=\""+$(this).attr("data")+"\" width=\"980px\" height=\"490px\" alt=\"\" />";
            $('#mv-box').empty().append(out);
            $(".thumb-tray-content-items").find(".selected").removeClass("selected");
        	$(this).find("img").addClass("selected");
            runEffect();
        });
    $('.lnkThumb:first').trigger('click');    
});
</script>
<script>
    // run the currently selected effect
    function runEffect() {
        // get effect type from
        var myArray = ['fade'];
        var rand = myArray[Math.floor(Math.random() * myArray.length)];
        var selectedEffect = rand;
        // most effect types need no options passed by default
        var options = {};
        // run the effect
        $(".effect").effect( selectedEffect, options, 500, callback );
    };
    // callback function to bring a hidden box back
    function callback() {
        setTimeout(function() {
        $(".effect").removeAttr("style").hide().fadeIn();
        }, 200 );
    };
</script>
<div id="movie-container">
    <div id="mv-box" class="effect">
        <!-- -->
    </div>
</div>
<div id="thumb-tray">
    <div id="fade-left"></div>
    <div id="fade-right"></div>
    <div id="thumb-tray-content">
        <div class="thumb-tray-content-items">
            <a class="lnkThumb image" data="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg">
				<img class="image-opaque" src="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg" width="160px" height="90px"/>
			</a>
        </div>
        <div class="thumb-tray-content-items">
			<a class="lnkThumb video" data="//www.youtube.com/embed/JAUoeqvedMo?enablejsapi=1">
				<img class="image-opaque" src="https://img.youtube.com/vi/JAUoeqvedMo/mqdefault.jpg" width="160px" height="90px" />
			</a>
        </div>
    </div>
</div>
<div id="w-left">
    <div id="w-left-middle">
        <div class="content-header">
            <div id="c-h-title">
                <div>
                    <h4><?php echo $resultMovie['intTitle']; ?></h4>
                    <h4><?php echo $resultMovie['title']==''?'':"&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;".$resultMovie['title']; ?></h4>
                </div>
            </div>
            <div id="c-h-subtitle">
                <h2 class="fntLightGrey"><a class="lnkXemSuatChieu" href="#">Xem suất chiếu</a></h2>
                <h2 class="fntLightGrey">Ngày khởi chiếu <?php echo $resultMovie['date']." tháng ".$resultMovie['month'].", ".$resultMovie['year'] ?></h2>
                <h2 class="fntLightGrey">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Định dạng <?php echo $resultMovie['format']; ?></h2>
            </div>
            <div id="c-h-tabnav">
                <h2>Chi tiết</h2>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(69, 69, 69, 0.8);"></div>
        <div class="content-swap">
            <div id="content-swap-left" style="width: 500px;">
                <p class="fntLightGrey"><?php echo $resultMovie['storyline']; ?></p>
            </div>
            <div id="content-swap-right">
                <p class="fntLightGrey"><span class="fntGrey">Thể loại:</span> <?php echo $resultMovie['genres']; ?></p>
                <p class="fntLightGrey"><span class="fntGrey">Thời lượng:</span> <?php echo $resultMovie['runtime']; ?> phút</p>
                <p class="fntLightGrey"><span class="fntGrey">Ngôn ngữ:</span> tiếng Anh phụ đề tiếng Việt</p>
                <p class="fntLightGrey"><span class="fntGrey">Giới hạn độ tuổi:</span> <?php echo $resultMovie['restricted']; ?></p>
                <p class="fntLightGrey"><span class="fntGrey">Quốc gia:</span> Mỹ</p>
                <p class="fntLightGrey"><span class="fntGrey">Hãng sản xuất:</span> <?php echo $resultMovie['studio']; ?></p>
                <p class="fntLightGrey"><span class="fntGrey">Nhà phát hành:</span> <?php echo $resultMovie['distributor']; ?></p>
                <p class="fntLightGrey"><span class="fntGrey">Đạo diễn:</span> Joss Whedon</p>
                <p class="fntLightGrey"><span class="fntGrey">Diễn viên:</span> Chris Evans, Samuel L. Jackson, Robert Downey Jr., Mark Ruffalo, Thomas Kretschmann, Jeremy Renner, Paul Bettany, Stellan Skarsgård, Scarlett Johansson, Idris Elba, Cobie Smulders, Chris Hemsworth, Tom Hiddleston, James Spader, Elizabeth Olsen, Aaron Taylor-Johnson</p>
            </div>
        </div>
    </div>
</div>
<div id="w-right">
    <div class="content-header">
        <div class="c-h-menu-null">
        </div>
        <div class="c-h-menu">
            <h2>Phim đang chiếu</h2>
        </div>
    </div>
    <div style="border-top: 1px solid rgba(69, 69, 69, 0.8);"></div>
    <div class="content-swap">
        <ul>
            <li><p><a href="phim-1.html">Avengers: Đế Chế Ultron</a></p></li>
            <li><p><a href="#">Max Điên: Cuộc Đua Tử Thần</a></p></li>
            <li><p><a href="#">Thế Giới Bí Ẩn</a></p></li>
            <li><p><a href="#">Ngủ Với Hồn Ma</a></p></li>
            <li><p><a href="#">Quá Nhanh Quá Nguy Hiểm 7: Báo Thù</a></p></li>
        </ul>
    </div>
</div>