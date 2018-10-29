<div id="mapcontainer">
  <div id="map"></div>
  <div class="info" style="font-size:200%"><strong>Core Value: </strong> The Right People, Enterprise, Energy, Performance</div>
  <div class="info" style="font-size:200%"><strong>Location: </strong>No. 307, Section 1, Xinglong Road, Zhubei City, Hsinchu County, 302</div>
  <div class="info" style="font-size:200%"><strong>Phone: </strong>0987654321</div>
  <div class="info" style="font-size:200%"><strong>Open: </strong>9:00am</div>
  <div class="info" style="font-size:200%"><strong>Close: </strong>12:00pm</div>
</div>

<script>
  function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition, showError);
      }
  }
  function showPosition(position) {
    var LatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
    var mapOptions = {
        center: LatLng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map"), mapOptions);
    var marker = new google.maps.Marker({
      position: LatLng,
      map: map,
      title: 'pizza'
    });
  }
  function showError(){

  }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa6Ly7B_jOG4p6r9uK1Aw4je5BWnoqPtY&callback=getLocation"></script>
