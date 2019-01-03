<?php
$longitude    =       get_field('longitude');
$latitude     =       get_field('latitude');
?>


<div id="location_map" style="height: 350px; z-index: 0; position: relative;"></div>
<script>
  var map;
  function initMap() {
    var mapOptions = {
      center: {lat:<?php echo $latitude;?>, lng:<?php echo $longitude;?>},
      zoom: 16
    }
    map = new google.maps.Map(document.getElementById('location_map'), mapOptions);
    var marker = new google.maps.Marker({
      position: {lat:<?php echo $latitude;?>, lng:<?php echo $longitude;?>},
      map: map,
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxalrJGVsevc8qZEPSs1nLIDsu0a9wvrg&callback=initMap"
async defer></script>
