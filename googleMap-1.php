<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html { width: 100%; height: 100%; }
body { width: 100%; height: 100%; margin: 0; }
#map { width: 100%; height: 100%; }
</style>

</head>
<body>

<div id="map"></div>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcVxWeW6kBqQ6XENAwv7N3qRVYjrlYr4A"></script>
<script>
(function(){
  "use strict";
  var mapData    = { pos: { lat: 30.3748331, lng: 130.9574997 }, zoom: 14 };
  var markerData = [
    { 
      pos: { lat: 30.3748331, lng: 130.9574997 }, 
      title: "popup-title1", 
      icon: "", 
      infoWindowOpen: true , 
      infoWindowContent: "<h3>test1</h3><p>hogehoge</p>" 
    },
    { 
      pos: { lat: 30.4010111, 
      lng: 130.9775733 }, 
      title: "popup-title2", 
      icon: "", 
      infoWindowOpen: false, 
      infoWindowContent: "<h3>test2</h3><p>piyopiyo</p>"
    },
  ];
  var map = new google.maps.Map(document.getElementById('map'), {
        center: mapData.pos,
        zoom:   mapData.zoom
    });
    var infoWindow = new google.maps.InfoWindow();
    for( var i=0; i < markerData.length; i++ )
    {
        (function(){
            var marker = new google.maps.Marker({
                position: markerData[i].pos,
                title:    markerData[i].title,
                icon:     markerData[i].icon,
                map: map
            });
            if( markerData[i].infoWindowContent )
            {
                var infoWindowContent = markerData[i].infoWindowContent;
                marker.addListener('click', function(){
                    infoWindow.setContent(infoWindowContent);
                    infoWindow.open(map, marker);
                });
                if( markerData[i].infoWindowOpen )
                {
                    infoWindow.setContent(infoWindowContent);
                    infoWindow.open(map, marker);
                }
            }
        }());
    }
}());
</script>
</body>
</html>