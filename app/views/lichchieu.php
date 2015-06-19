<script type="text/javascript">   
    function MarginSchedule(){
        var divCount = $("#lc-box > div").length;
        var width = $("#lichChieu-container").width();
        $(".lc-b-items").css({'width': (width-((divCount-1)*15.1))/divCount+'px'});
        $(".lc-b-items a img").css({'height': ((width-((divCount-1)*15.1))/divCount)*1.419+'px'});
        /*alert((width-((divCount-1)*15))/divCount);*/
        if(divCount==7){
            $(".lc-b-items h3.duration").css({'margin-left': '70px'});
            $(".lc-b-items h3.mmarating").css({'float': 'left', 'margin-right': '-70px'});
        }
    };
</script>

<script type="text/javascript">
    var xmlhttp = new XMLHttpRequest();
    var url = "../public/schedules.json";
    function GetSchedule(index){
        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                myFunction(xmlhttp.responseText, index, function (res){
                    $("#lc-box").empty().append(res);
                    MarginSchedule();
                });
            }
        }
    }
    
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
    function myFunction(response, index, callback) {
        var arr = JSON.parse(response);
        var i;
        var out = "";
        for(i = 0; i < arr[index].movies.length; i++) {
            var date = arr[index].date.slice(-2)+arr[index].date.slice(4,7);
            
            var arrstr = arr[index].movies[i]._id[0].Format.split(',');
            if(arrstr[0]==null) arrstr[0]='';
            //if(arrstr[1]==null) arrstr[1]='';
            if(typeof arrstr[1]=='undefined') arrstr[1]='';
            out += "<div class=\"lc-b-items\">" +
                "<a><img width=\"100%\" src=\"img/movie/"+"thumb-"+arr[index].movies[i]._id[0]._id.$id+".jpg\" /></a>" +
                "<h3 class=\"titlemovies\" style=\"background: #8B0A15\"><a>"+arr[index].movies[i]._id[0].IntTitle+"<br /></a></h3>" +
                "<h3 class=\"titlemovies\" style=\"background: #8B0A15\"><a>"+arr[index].movies[i]._id[0].Title+"<br /></a></h3>" +
                "<h3 class=\"formatmovies formatmovies_2D\">"+arrstr[0]+"</h3>" +
                "<h3 class=\"formatmovies formatmovies_3D\">"+arrstr[1]+"</h3>" +
                "<h3 class=\"duration fntLightGrey\" style=\"float: right;\">"+arr[index].movies[i]._id[0].Runtime+" phút</h3>" +
                "<h3 class=\"mmarating fntLightGrey\"  style=\"float: right;\">13+&nbsp;&nbsp;|&nbsp;&nbsp;</h3>" +
                "<div style=\"clear: both;\"></div>" +
                "<div style=\"border-top: 1px solid rgba(69, 69, 69, 0.8); margin: 0;\"></div>" +
                "<h3 class=\"datemovies\">"+date+"</h3>" +
                "<div class=\"clear\"></div>" +
                "<h3 class=\"timemovies\">";
                for(j = 0; j < arr[index].movies[i].schedule.length; j=j+2) {
                    out += "<a href=\"#\">"+arr[index].movies[i].schedule[j].start+"</a><a style=\"color: #0088CC;\"></a>";
                }
                out += "</h3>"+
            "</div>";
        }
        out += "";
        //$("#lc-box").empty().append(out);
        callback(out);
    }
</script>
<script>
    // run the currently selected effect
    function runEffect() {
        // get effect type from
        var myArray = ['clip','fade','slide','drop'];
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

<script type="text/javascript">
    $(document).ready(function () {
        //khoi tao
        var index = 0;
        GetSchedule(index);
        $(".thumb-tray-content-items-image").first().find(".dayofmonth").addClass("selected");
        $(".thumb-tray-content-items-image").first().find(".day").addClass("selected");
        
        $(".thumb-tray-content-items-image").click(function () {
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
            var id = $(this).attr("data-id");
            GetSchedule(id);
			$(".thumb-tray-content-items-image").find(".selected").removeClass("selected");
			$(this).find(".dayofmonth").addClass("selected");
            $(this).find(".day").addClass("selected");
            runEffect();
        });
    });
    
    
    $(".timemovies a").click(function jump() {
        alert("fe");
		$('body').scrollTo('#c-h-title');
    });
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $("[role=seat]").click(function(e) {
		if($(this).hasClass("selected")) {
			$(this).removeClass("selected");
			$(this).children(".dot-tmp").removeClass("reserve");
        }
		else {
			$(this).addClass("selected");
			$(this).children(".dot-tmp").addClass("reserve");
        }
    });
});
</script>

<div id="lichChieu-container">
    <div id="lc-box" class="effect" class="ui-widget-content ui-corner-all">
        <!-- -->
    </div>
</div>
<div id="thumb-tray">
    <div id="fade-left"></div>
    <div id="fade-right"></div>
    <div id="thumb-tray-content">
        <?php echo $resultDateOfSchedule; ?>
    </div>
</div>
<div id="w-left">
    <div id="w-left-middle">
        <div class="content-header">
            <div id="c-h-title">
                <div>
                    <h4>Avengers: Age of Ultron</h4>
                </div>
            </div>
            <div id="c-h-subtitle">
                <h2 class="fntLightGrey">Ngày chiếu 24 tháng 05, 2015</h2>
                <h2 class="fntLightGrey">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Suất 11:00</h2>
                <h2 class="fntLightGrey">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Định dạng 3D</h2>
            </div>
            <div id="c-h-tabnav">
                <h2>Chi tiết</h2>
            </div>
        </div>
        <div style="border-top: 1px solid rgba(69, 69, 69, 0.8);"></div>
        <div class="content-swap">
            <div id="content-swap-left" style="width: 500px;">
                <div role="room">
        			<div role="seat" id="A1">
                        <span>A1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A2">
                        <span>A2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A3">
                        <span>A3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A4">
                        <span>A4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A5">
                        <span>A5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A6">
                        <span>A6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A7">
                        <span>A7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A8">
                        <span>A8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A9">
                        <span>A9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A10">
                        <span>A10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A11">
                        <span>A11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A12">
                        <span>A12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A13">
                        <span>A13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A14">
                        <span>A14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A15">
                        <span>A15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A16">
                        <span>A16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="A17">
                        <span>A17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="B1">
                        <span>B1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B2">
                        <span>B2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B3">
                        <span>B3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B4">
                        <span>B4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B5">
                        <span>B5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B6">
                        <span>B6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B7">
                        <span>B7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B8">
                        <span>B8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B9">
                        <span>B9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B10">
                        <span>B10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B11">
                        <span>B11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B12">
                        <span>B12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B13">
                        <span>B13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B14">
                        <span>B14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B15">
                        <span>B15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B16">
                        <span>B16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="B17">
                        <span>B17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="C1">
                        <span>C1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C2">
                        <span>C2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C3">
                        <span>C3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C4">
                        <span>C4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C5">
                        <span>C5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C6">
                        <span>C6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C7">
                        <span>C7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C8">
                        <span>C8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C9">
                        <span>C9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C10">
                        <span>C10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C11">
                        <span>C11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C12">
                        <span>C12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C13">
                        <span>C13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C14">
                        <span>C14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C15">
                        <span>C15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C16">
                        <span>C16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="C17">
                        <span>C17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="D1">
                        <span>D1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D2">
                        <span>D2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D3">
                        <span>D3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D4">
                        <span>D4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D5">
                        <span>D5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D6">
                        <span>D6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D7">
                        <span>D7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D8">
                        <span>D8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D9">
                        <span>D9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D10">
                        <span>D10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D11">
                        <span>D11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D12">
                        <span>D12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D13">
                        <span>D13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D14">
                        <span>D14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D15">
                        <span>D15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D16">
                        <span>D16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="D17">
                        <span>D17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="E1">
                        <span>E1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E2">
                        <span>E2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E3">
                        <span>E3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E4">
                        <span>E4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E5">
                        <span>E5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E6">
                        <span>E6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E7">
                        <span>E7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E8">
                        <span>E8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E9">
                        <span>E9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E10">
                        <span>E10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E11">
                        <span>E11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E12">
                        <span>E12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E13">
                        <span>E13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E14">
                        <span>E14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E15">
                        <span>E15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E16">
                        <span>E16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="E17">
                        <span>E17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="F1">
                        <span>F1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F2">
                        <span>F2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F3">
                        <span>F3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F4">
                        <span>F4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F5">
                        <span>F5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F6" type="VIP">
                        <span>F6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F7" type="VIP">
                        <span>F7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F8" type="VIP">
                        <span>F8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F9" type="VIP">
                        <span>F9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F10" type="VIP">
                        <span>F10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F11" type="VIP">
                        <span>F11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F12" type="VIP">
                        <span>F12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F13" type="VIP">
                        <span>F13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F14">
                        <span>F14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F15">
                        <span>F15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F16">
                        <span>F16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="F17">
                        <span>F17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="G1">
                        <span>G1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G2">
                        <span>G2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G3">
                        <span>G3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G4">
                        <span>G4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G5">
                        <span>G5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G6" type="VIP">
                        <span>G6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G7" type="VIP">
                        <span>G7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G8" type="VIP">
                        <span>G8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G9" type="VIP">
                        <span>G9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G10" type="VIP">
                        <span>G10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G11" type="VIP">
                        <span>G11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G12" type="VIP">
                        <span>G12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G13" type="VIP">
                        <span>G13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G14">
                        <span>G14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G15">
                        <span>G15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G16">
                        <span>G16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="G17">
                        <span>G17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    <div role="seat" id="H1">
                        <span>H1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H2">
                        <span>H2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H3">
                        <span>H3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H4">
                        <span>H4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H5">
                        <span>H5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H6" type="VIP">
                        <span>H6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H7" type="VIP">
                        <span>H7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H8" type="VIP">
                        <span>H8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H9" type="VIP">
                        <span>H9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H10" type="VIP">
                        <span>H10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H11" type="VIP">
                        <span>H11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H12" type="VIP" type="selled" class="selled">
                        <span>H12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H13" type="VIP" type="selled" class="selled">
                        <span>H13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H14">
                        <span>H14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H15">
                        <span>H15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H16">
                        <span>H16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="H17">
                        <span>H17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="I1">
                        <span>I1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I2">
                        <span>I2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I3">
                        <span>I3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I4">
                        <span>I4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I5">
                        <span>I5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I6">
                        <span>I6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I7">
                        <span>I7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I8">
                        <span>I8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I9">
                        <span>I9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I10">
                        <span>I10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I11">
                        <span>I11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I12">
                        <span>I12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I13">
                        <span>I13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I14">
                        <span>I14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I15">
                        <span>I15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I16">
                        <span>I16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="I17">
                        <span>I17</span>
                        <div class="dot-tmp"></div>
                    </div>
                    
                    <div role="seat" id="J1">
                        <span>J1</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J2">
                        <span>J2</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J3">
                        <span>J3</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J4">
                        <span>J4</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J5">
                        <span>J5</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J6">
                        <span>J6</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J7">
                        <span>J7</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J8">
                        <span>J8</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J9">
                        <span>J9</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J10">
                        <span>J10</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J11">
                        <span>J11</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J12">
                        <span>J12</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J13">
                        <span>J13</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J14">
                        <span>J14</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J15" type="selled">
                        <span>J15</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J16" type="selled">
                        <span>J16</span>
                        <div class="dot-tmp"></div>
                    </div>
        			<div role="seat" id="J17" type="selled">
                        <span>J17</span>
                        <div class="dot-tmp"></div>
                    </div>
        		</div>
                <div>                    
                    <div role="room-info" style="margin-right: 89.1px;">
                        <div role="seat">
                            <span></span>
                            <div></div>
                        </div>
                        <h3 class="fntLightGrey">Ghế thường</h3>
                    </div>
                    <div role="room-info" style="margin-right: 89.4px;">
                        <div role="seat" type="VIP">
                            <span></span>
                            <div></div>
                        </div>
                        <h3 class="fntLightGrey">Ghế VIP</h3>
                    </div>
                    <div role="room-info" style="margin-right: 89.4px;">
                        <div role="seat">
                            <span></span>
                            <div class="reserve" style="background: #676767;"></div>
                        </div>
                        <h3 class="fntLightGrey">Ghế đã đặt</h3>
                    </div>
                    <div role="room-info">
                        <div role="seat" type="selled">
                            <span></span>
                            <div class="reserve"></div>
                        </div>
                        <h3 class="fntLightGrey">Ghế đã bán</h3>
                    </div>
                </div>
            </div>
            <div id="content-swap-right">
                <div id="reserve-info" style="height: 150px;">
                    <h3 style="line-height: 24.7px; margin-bottom: 5px;" class="fntLightGrey">Thời gian giữ ghế: 05:00</h3>
                    <div role="room-info">
                        <div role="seat" type="forVIP" style="background-color: #0F9317;">
                            <span></span>
                            <div class="reserve" style="background: #676767;"></div>
                        </div>
                        <h3 class="fntLightGrey" style="line-height: 24.7px;">VIP</h3>
                        <div style="position: absolute; left: 110px; width: 45px;"><span style="font-size: 13px;">1</span></div>
                    </div>
                    <div role="room-info">
                        <div role="seat" type="forAdult" style="background-color: #0088CC;">
                            <span></span>
                            <div class="reserve" style="background: #676767;"></div>
                        </div>
                        <h3 class="fntLightGrey" style="line-height: 24.7px;">Người lớn</h3>
                        <div style="position: absolute; left: 110px; width: 45px;"><span style="font-size: 13px;">2</span></div>
                    </div>
                    <div role="room-info">
                        <div role="seat" type="forChild" style="background-color: #FF6CF7;">
                            <span></span>
                            <div class="reserve" style="background: #676767;"></div>
                        </div>
                        <h3 class="fntLightGrey" style="line-height: 24.7px;">Trẻ em</h3>
                        <select name="cmbSoLuongVeTreEm" style="position: absolute; left: 110px; width: 45px;">
        					<option value="0" selected="selected">0</option>
        					<option value="1">1</option>
        					<option value="2">2</option>
        				</select>
                    </div>
                    <div role="room-info">
                        <div role="seat" type="forStudent" style="background-color: #FFFFFF;">
                            <span></span>
                            <div class="reserve" style="background: #676767;"></div>
                        </div>
                        <h3 class="fntLightGrey" style="line-height: 24.7px;">Sinh viên</h3>
                        <select name="cmbSoLuongVeTreEm" style="position: absolute; left: 110px; width: 45px;">
        					<option value="0" selected="selected">0</option>
        					<option value="1">1</option>
        					<option value="2">2</option>
        				</select>
                    </div>
                </div>
                <div style="border-top: 1px solid rgba(69, 69, 69, 0.8);"></div>
                <div>
                    <h3 style="line-height: 24.7px; margin-bottom: 5px;" class="fntLightGrey">Thành tiền: 200.000đ</h3>
                </div>
                <div style="float: right; margin-top: 115px;">
                    <h3 style="line-height: 24.7px; margin-bottom: 5px;" class="fntLightGrey"><a>Thanh toán</a></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="w-right">
    <div class="content-header">
        <div class="c-h-menu-null"></div>
        <div class="c-h-menu">
            <h2>Links</h2>
        </div>
    </div>
    <div style="border-top: 1px solid rgba(69, 69, 69, 0.8);"></div>
    <div class="content-swap">
        <ul>
            <li><p><a href="#">Hướng dẫn đặt vé</a></p></li>
        </ul>
    </div>
</div>

<style type="text/css">
body {
    background: #000000;
}
</style>