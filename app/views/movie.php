<img src="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg" width="980px" height="490px" alt="" />
<div id="thumb-tray">
    <div id="fade-left"></div>
    <div id="fade-right"></div>
    <div id="thumb-tray-content">
        <div class="thumb-tray-content-items">
			<a href="#" data-image="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg" data-zoom-image="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg">
				<img src="userfiles/11048-the-avengers-1920x1080-movie-wallpaper.jpg" width="160px" height="90px" />
			</a>
        </div>
        <div class="thumb-tray-content-items">
        
        </div>
        <div class="thumb-tray-content-items">
        </div>
        <div class="thumb-tray-content-items">
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

<style type="text/css">
body {
    background: #000000;
}
</style>