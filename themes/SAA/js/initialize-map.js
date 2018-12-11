(function() {
    var myLatlng = new google.maps.LatLng(37.122985,138.595158);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scale_control: true,
      scrollwheel: false,
      draggable: false
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title:"Salix & Associates, Architects"
    });

    google.maps.event.addListener(marker, 'click', function(){
      location.href = "http://maps.google.com/maps?q=" + myLatlng;
    });
})();
