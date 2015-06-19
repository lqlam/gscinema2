function initialize() {
	var latlng = new google.maps.LatLng(10.378303, 105.442872);
	var settings = {
		zoom: 16,
		center: latlng,
		mapTypeControl: true,
		mapTypeControlacts: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		navigationControl: true,
		navigationControlacts: {style: google.maps.NavigationControlStyle.SMALL},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
//                    var companyPos = new google.maps.LatLng(57.0442, 9.9116);
//                    var companyMarker = new google.maps.Marker({
//                        position: companyPos,
//                        map: map,
//                        title:"Some title"
//                    });
	var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
	var companyLogo = new google.maps.MarkerImage('images/mapPosition.png',
		new google.maps.Size(100,50),
		new google.maps.Point(0,0),
		new google.maps.Point(50,50)
	);
	var companyShadow = new google.maps.MarkerImage('images/mapPosition_shadow.png',
		new google.maps.Size(130,50),
		new google.maps.Point(0,0),
		new google.maps.Point(65, 50)
	);
	var companyPos = new google.maps.LatLng(10.378746, 105.447679);
	var companyMarker = new google.maps.Marker({
		position: companyPos,
		map: map,
		icon: companyLogo,
		shadow: companyShadow,
		title:"GoldStarCine | Rạp chiếu phim tại Long Xuyên",
		zIndex: 4
	});
	//Infoboxes
	var contentString = '<div id="content_googlemap">'+
		'<div id="siteNotice">'+
		'</div>'+
		'<h4 class="fontexternal" id="firstHeading" class="firstHeading">Thông tin về chúng tôi</h4>'+
		'<div id="bodyContent">'+
		'<p><h2><b> &middot; </b>Địa chỉ: 108 Điện Biên Phủ, P. Mỹ Long, TP. Long Xuyên, An Giang</h2><h2><b> &middot; </b>Số điện thoại: 0763.958958</h2><h2><b> &middot; </b>Email: saovanglongxuyen@gmail.com</h2><h2><b> &middot; </b>Facebook: <a href="http://fb.com/goldstarcine">http://fb.com/goldstarcine</a></h2></p>'+
		'</div>'+
		'</div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	google.maps.event.addListener(companyMarker, 'click', function() {
	  infowindow.open(map,companyMarker);
	});
}