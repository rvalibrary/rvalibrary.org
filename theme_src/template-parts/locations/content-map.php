<div id="map" style="height: 500px;"></div>
<div class="legend_table_container" style="position: absolute; bottom: 0; left: 0; background-color: #003652; padding: 10px;">
  <table class="legend_table" style="margin-bottom: 0;width: 150px; color: white;">
    <tr>
      <td>A</td>
      <td class="locations_map_link" id="marker0">Main Library</td>
    </tr>
    <tr>
      <td>B</td>
      <td class="locations_map_link" id="marker1">Belmont</td>
    </tr>
    <tr>
      <td>C</td>
      <td class="locations_map_link" id="marker2">Broad Rock</td>
    </tr>
    <tr>
      <td>D</td>
      <td class="locations_map_link" id="marker3">East End</td>
    </tr>
    <tr>
      <td>E</td>
      <td class="locations_map_link" id="marker4">Ginter Park</td>
    </tr>
    <tr>
      <td>F</td>
      <td class="locations_map_link" id="marker5">Hull Street</td>
    </tr>
    <tr>
      <td>G</td>
      <td class="locations_map_link" id="marker6">North Avenue</td>
    </tr>
    <tr>
      <td>H</td>
      <td class="locations_map_link" id="marker7">West End</td>
    </tr>
    <tr>
      <td>I</td>
      <td class="locations_map_link" id="marker8">Westover Hills</td>
    </tr>
  </table>
</div>

<?php get_template_part( 'template-parts/locations/content', 'info_array' );?>
<script>
  var infoArray = [];
  var markers = [];
  var map;

  function initMap() {
    var mainbranch = [{lat: 37.5428458, lng: -77.442493}, 'Main Library', 'A', main_addr];
    var belmont = [{lat: 37.5543459, lng: -77.4818177}, 'Belmont', 'B', belmont_addr];
    var broadrock = [{lat: 37.4828499, lng: -77.4813976}, 'Broad Rock', 'C', broadrock_addr];
    var eastend = [{lat: 37.5396983, lng: -77.413489}, 'East End', 'D', eastend_addr];
    var ginterpark = [{lat: 37.5970737, lng: -77.4563122}, 'Ginter Park', 'E', ginterpark_addr];
    var hullstreet = [{lat: 37.5196079, lng: -77.4479009}, 'Hull Street', 'F', hullstreet_addr];
    var northavenue = [{lat: 37.570172, lng: -77.4346805}, 'North Avenue', 'G', northave_addr];
    var westend = [{lat: 37.5776385, lng: -77.5133911}, 'West End', 'H', westend_addr];
    var westoverhills = [{lat: 37.5219987, lng: -77.4907205}, 'Westover Hills', 'I', westoverhills_addr];

    var branches = [mainbranch, belmont, broadrock, eastend, ginterpark, hullstreet, northavenue, westend, westoverhills]

    var mapOptions = {
      center: mainbranch[0],
      zoom: 11
    }
    map = new google.maps.Map(document.getElementById('map'), mapOptions);

    function drop() {
      for (var i = 0; i < branches.length; i++) {
        addMarkerWithTimeout(branches[i][0], i * 200, branches[i][1], branches[i][2], i);
      }
    }
    drop();

    for (var i = 0; i < branches.length; i++) {
      infoArray.push(new google.maps.InfoWindow({content: branches[i][3]}));
    }

    function addMarkerWithTimeout(position, timeout, title, label, iterator) {
      window.setTimeout(function() {
        var newMarker = new google.maps.Marker({
          position: position,
          map: map,
          title: title,
          label: label,
          animation: google.maps.Animation.DROP
        })
        newMarker.addListener('click', function() {
          infoArray[iterator].open(map, newMarker);
        });
        markers.push(newMarker);
      }, timeout);
    }




    function toggleBounce() {
      if (marker.getAnimation() !== null) {
        marker.setAnimation(null);
      } else {
        marker.setAnimation(google.maps.Animation.BOUNCE);
      }
    }



    ///CREATED MY FIRST CLOSURE!//
    function createCallback( i ){
      return function(){
        //close all other dialogs
        for (j=0; j<branches.length; j++){
          infoArray[j].close();
        }
        //open clicked dialog
        infoArray[i].open(map, markers[i]);
      }
    }

  //closes all open dialogs on window click
    google.maps.event.addListener(map, "click", function(event) {
        for (var i = 0; i < infoArray.length; i++ ) {  //I assume you have your infoboxes in some array
             infoArray[i].close();
        }
    });

  //jquery to help with clicking
    jQuery( document ).ready(function() {
      for (k=0; k < branches.length; k++){
        jQuery('#marker'+String(k)).click(createCallback(k));
      }
    });


  }//initMap()





</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxalrJGVsevc8qZEPSs1nLIDsu0a9wvrg&callback=initMap"
async defer></script>
